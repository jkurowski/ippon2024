<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PakietyController extends Controller
{

    public function index()
    {
        return view('front.pakiety.index', [
            'page' => Page::where('id', 9)->first()
        ]);
    }

}
