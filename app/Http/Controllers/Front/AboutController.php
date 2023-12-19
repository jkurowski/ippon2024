<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\RodoRules;

class AboutController extends Controller
{

    public function index()
    {
        return view('front.about.index', [
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
            'page' => Page::where('id', 5)->first()
        ]);
    }

}
