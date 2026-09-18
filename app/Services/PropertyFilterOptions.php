<?php

namespace App\Services;

use App\Models\Investment;
use App\Models\Property;
use Illuminate\Support\Collection;

/**
 * Opcje filtra lokali — jedno zrodlo dla wyszukiwarki i dla paska na stronie
 * glownej. Wszystko liczone z rzeczywistych danych, wiec w selectach nie ma
 * pozycji, ktore nic nie znajduja.
 *
 * Wyniki sa zapamietywane na czas zadania: pasek filtrow bywa renderowany
 * dwa razy na stronie, a to sa te same zapytania.
 */
class PropertyFilterOptions
{
    private ?Collection $investments = null;
    private ?array $rooms = null;
    private ?array $floors = null;
    private ?array $areas = null;

    /** krok progow metrazu w metrach */
    private const AREA_STEP = 20;

    /** properties.type = 1 to mieszkanie (2 — komorka, 3 — miejsce postojowe) */
    private const TYPE_FLAT = 1;

    /** inwestycje w sprzedazy, ktore maja jakiekolwiek lokale */
    public function investments(): Collection
    {
        return $this->investments ??= Investment::where('status', 1)
            ->whereHas('properties')
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);
    }

    public function investmentIds(): Collection
    {
        return $this->investments()->pluck('id');
    }

    /** liczby pokoi wystepujace w ofercie */
    public function rooms(): array
    {
        return $this->rooms ??= Property::whereIn('investment_id', $this->investmentIds())
            ->where('rooms', '>', 0)
            ->distinct()
            ->orderBy('rooms')
            ->pluck('rooms')
            ->all();
    }

    /**
     * Numery pieter, na ktorych sa mieszkania.
     *
     * Warunek na `properties.type` jest tu istotny: bez niego do listy
     * wchodzily poziomy -1 i -2, czyli garaze podziemne. Nie ma tam ani
     * jednego mieszkania — same komorki lokatorskie i miejsca postojowe —
     * wiec w wyszukiwarce byly to pozycje, ktore dla klienta nic nie znacza
     * (uwaga klienta, wrzesien 2026). Analogicznie rooms() liczy tylko lokale
     * z pokojami.
     */
    public function floors(): array
    {
        return $this->floors ??= Property::whereIn('properties.investment_id', $this->investmentIds())
            ->join('floors', 'floors.id', '=', 'properties.floor_id')
            ->where('properties.type', self::TYPE_FLAT)
            ->distinct()
            ->orderBy('floors.number')
            ->pluck('floors.number')
            ->all();
    }

    /** progi metrazu co 20 m2, policzone z najmniejszego i najwiekszego lokalu */
    public function areas(): array
    {
        if ($this->areas !== null) {
            return $this->areas;
        }

        $range = Property::whereIn('investment_id', $this->investmentIds())
            ->selectRaw('MIN(area) as min_area, MAX(area) as max_area')
            ->first();

        if (!$range || !$range->min_area) {
            return $this->areas = [];
        }

        $from = (int) (floor($range->min_area / self::AREA_STEP) * self::AREA_STEP);
        $to = (int) (ceil($range->max_area / self::AREA_STEP) * self::AREA_STEP);

        $options = [];
        for ($i = $from; $i < $to; $i += self::AREA_STEP) {
            $options[] = $i . '-' . ($i + self::AREA_STEP);
        }

        return $this->areas = $options;
    }

    /** komplet danych dla komponentu <x-property-filter> */
    public function all(): array
    {
        return [
            'investments' => $this->investments(),
            'rooms' => $this->rooms(),
            'floors' => $this->floors(),
            'areas' => $this->areas(),
        ];
    }
}
