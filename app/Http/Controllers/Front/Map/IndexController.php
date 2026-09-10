<?php

namespace App\Http\Controllers\Front\Map;

use App\Http\Controllers\Controller;

//CMS
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

        $investments = Investment::query()
            ->when($city, fn($q) => $q->where('city', '=', $city->id))
            ->where('status', '!=', 5)          // 5 = inwestycja ukryta
            ->orderByRaw('FIELD(status, 1, 4, 3, 2)')   // w sprzedazy, wkrotce, planowane, zrealizowane
            ->orderBy('name')
            ->get();

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
}
