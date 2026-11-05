<?php

namespace App\Http\Controllers\Front\Map;

use App\Http\Controllers\Controller;

//CMS
use App\Models\Building;
use App\Models\Investment;
use App\Models\RodoRules;
use App\Models\RodoSettings;
use App\Models\City;
use App\Models\Page;

class IndexController extends Controller
{
    /** Zakladka "Wszystkie" — pseudo-slug, nie jest miastem w CMS. */
    public const ALL_SLUG = 'wszystkie';

    public function index($language, $slug)
    {
        $page = Page::where('id', 18)->first();
        $city = $slug === self::ALL_SLUG ? null : City::whereSlug($slug)->firstOrFail();

        /* Kolejnosc kart: zawsze grupami statusow (w sprzedazy, wkrotce,
           planowane, zrealizowane), a w obrebie grupy:
           - wybrane miasto: recznie, wedlug pola "Pozycja w miescie" (city_sort)
             z formularza inwestycji w CMS-ie; city_sort = 0 to pozycja
             nieustawiona (np. swiezo dodana inwestycja) — taka karta ma ladowac
             na koncu swojej grupy, a nie na jej poczatku,
           - zakladka "Wszystkie": alfabetycznie, bez zmian. city_sort numeruje
             sie od 1 w kazdym miescie osobno, wiec po zmieszaniu miast jedynka
             z malego miasta wskakiwalaby nad Olsztyn. */
        $investments = Investment::query()
            ->when($city, fn($q) => $q->where('city', '=', $city->id))
            ->where('status', '!=', 5)          // 5 = inwestycja ukryta
            ->orderByRaw('FIELD(status, 1, 4, 3, 2)')
            ->when(
                $city,
                fn($q) => $q->orderByRaw('city_sort = 0')->orderBy('city_sort')
            )
            ->orderBy('name')
            ->get();

        $investments = $this->groupForMap($investments);

        return view('front.map.index', [
            'page' => $page,
            'markers' => City::all(),
            'city' => $city,
            'mapCities' => City::where('active', 1)->orderBy('sort')->get(),
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
            'investments' => $investments
        ]);
    }

    /**
     * Uwagi klienta 5.11.2026: jedna karta i jedna pinezka na osiedle.
     *
     * - Etapy ("Osiedle Aurora, etap 1" ... "etap 4") i powtorzone rekordy tego samego
     *   osiedla ("Osiedle Slow" aktualne + "Osiedle Slow" zrealizowane) skladamy w jedna
     *   pozycje. Prowadzi ta z najlepszym statusem - zapytanie jest juz posortowane
     *   statusami, wiec to pierwszy rekord grupy. Pinezka bierze wspolrzedne z pierwszego
     *   rekordu, ktory ma wlaczony znacznik.
     * - Osiedle z budynkami, ktore maja ustawiony "Status na mapie inwestycji" (CMS,
     *   edycja budynku), dostaje liste budynkow ze statusami (Slow: B3.x, B4.x).
     *
     * Na modelu prowadzacym ustawiamy tylko pola pomocnicze map_* (nie sa zapisywane).
     */
    protected function groupForMap($investments)
    {
        return $investments
            ->groupBy(fn ($i) => $i->city.'|'.mb_strtolower($this->baseName($i->name)))
            ->map(function ($group) {
                $lead = $group->first();
                $pin  = $group->first(fn ($i) => $i->marker && $i->lat && $i->lng);

                $lead->map_name   = $group->count() > 1 ? $this->baseName($lead->name) : $lead->name;
                $lead->map_marker = (bool) $pin;
                $lead->map_lat    = $pin?->lat;
                $lead->map_lng    = $pin?->lng;

                // etapy - liczba mieszkan calego osiedla; ten sam rekord powtorzony - bez sumowania
                $isStages = $group->count() > 1 && $group->every(fn ($i) => $i->name !== $lead->map_name);
                $lead->map_areas = $isStages ? ($group->sum(fn ($i) => (int) $i->areas_amount) ?: null) : $lead->areas_amount;

                $lead->map_buildings = $lead->developro
                    ? Building::where('investment_id', $lead->id)
                        ->where('active', 1)
                        ->whereNotNull('status')
                        ->orderByRaw('FIELD(status, 1, 4, 3, 2)')
                        ->orderBy('number')
                        ->get(['id', 'name', 'number', 'status'])
                        ->groupBy('status')
                    : collect();

                return $lead;
            })
            ->values();
    }

    /** "Osiedle Aurora, etap 3.1" -> "Osiedle Aurora" */
    protected function baseName(string $name): string
    {
        return trim(preg_replace('/[,\s]+etap\b.*$/iu', '', $name));
    }
}
