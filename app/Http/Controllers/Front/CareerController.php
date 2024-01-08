<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

class CareerController extends Controller
{
    function index()
    {
        $page = Page::find(2);

        return view('front.career.index', [
            'page' => $page
        ]);
    }
}
