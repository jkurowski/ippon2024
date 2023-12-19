<?php

namespace App\Observers;

// CMS
use App\Models\Investment;
use Illuminate\Support\Str;

class InvestmentObserver
{

    /**
     * Handle the investment "saving" event.
     *
     * @param Investment $investment
     * @return void
     */
    public function saving(Investment $investment)
    {
        $investment->slug = Str::slug($investment->name);
    }
}
