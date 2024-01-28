<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\RodoRules;
use App\Models\RodoSettings;

class LandController extends Controller
{

    public function index()
    {
        return view('front.land.index', [
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
            'page' => Page::where('id', 13)->first()
        ]);
    }

}
