<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

class CompletedController extends Controller
{
    public function index()
    {
        return view('front.completed.index', [
            'page' => Page::where('id', 3)->first()
        ]);
    }
}
