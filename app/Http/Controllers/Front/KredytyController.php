<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

class LandController extends Controller
{

    public function index()
    {
        return view('front.kredyty.index', [
            'page' => Page::where('id', 8)->first()
        ]);
    }

}
