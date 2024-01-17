<?php

namespace App\Http\Controllers\Front\Static;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function howbuy()
    {
        $page = Page::find(9);
        return view('front.static.howbuy', compact('page'));
    }
}
