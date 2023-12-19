<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

class CareerController extends Controller
{
    function index()
    {
        $page = Page::where('id', 1)->first();

        return view('front.career.index', [
            'page' => $page
        ]);
    }
}
