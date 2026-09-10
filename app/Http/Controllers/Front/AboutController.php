<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Page;
use App\Models\RodoRules;
use App\Models\RodoSettings;

class AboutController extends Controller
{
    public function index()
    {
        return view('front.about.index', [
            'page' => Page::where('id', 17)->first(),
            'awards' => Award::orderBy('sort')->get(),
            /* formularz kontaktowy na dole podstrony — te same dane co na /kontakt */
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
        ]);
    }

}
