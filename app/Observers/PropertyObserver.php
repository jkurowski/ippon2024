<?php

namespace App\Observers;

use App\Models\Property;
use App\Models\PropertyPrice;
use Illuminate\Support\Facades\Auth;

class PropertyObserver
{
    /**
     * Handle the Property "updated" event.
     *
     * @param Property $property
     * @return void
     */
    public function updated(Property $property)
    {
        $originalPrice = $property->getOriginal('price_brutto');

        // Handle price change
        if ($property->wasChanged(['price_brutto', 'promotion_price', 'highlighted'])) {

            $newPrice = $property->price_brutto;
            $originalPrice = $property->getOriginal('price_brutto');
            $originalPromotionPrice = $property->getOriginal('promotion_price');
            $originalHighlighted = $property->getOriginal('highlighted');

            $promotionPrice = $property->promotion_price;
            $highlighted = $property->highlighted;

            // ✅ Case 1: Promotion added or changed
            if (
                $highlighted &&
                $promotionPrice !== null &&
                $promotionPrice != $newPrice
            ) {
                $this->logPriceChange($property, $originalPrice, $promotionPrice, true);

                // ✅ Case 2: Promotion removed (highlighted was true, now false)
            } elseif (
                !$highlighted &&
                $originalHighlighted &&
                $originalPromotionPrice !== null &&
                $originalPromotionPrice != $newPrice
            ) {
                $this->logPriceChange($property, $originalPromotionPrice, $newPrice, false);

                // ✅ Case 3: Regular price change (no promotion involved)
            } elseif ($originalPrice !== $newPrice) {

                $this->logPriceChange($property, $originalPrice, $newPrice, false);

            }
        }
    }
    protected function logPriceChange(Property $property, $old, $new, bool $promotion): void
    {
        PropertyPrice::create([
            'property_id' => $property->id,
            'price_brutto' => is_numeric($old) ? $old : 0,
            'new_price_brutto' => $new,
            'area' => $property->area,
            'promotion' => $promotion,
            'changed_at' => now(),
            'changed_by' => Auth::id(),
        ]);
    }
}
