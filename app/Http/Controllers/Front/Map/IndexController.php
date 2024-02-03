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
    public function index($language, $slug)
    {
        $page = Page::where('id', 18)->first();
        $city = City::whereSlug($slug)->first();

        $investments = Investment::where('city', '=', $city->id)->get();

        return view('front.map.index', [
            'page' => $page,
            'markers' => City::all(),
            'city' => $city,
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
            'investments' => $investments
        ]);
    }
}
