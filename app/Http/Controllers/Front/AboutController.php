<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Page;

class AboutController extends Controller
{
    public function index()
    {
        return view('front.about.index', [
            'page' => Page::where('id', 17)->first(),
            'awards' => Award::orderBy('sort')->get()
        ]);
    }

}
