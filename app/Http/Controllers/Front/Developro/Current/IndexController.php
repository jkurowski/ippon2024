<?php

namespace App\Http\Controllers\Front\Developro\Current;

use App\Http\Controllers\Controller;
use App\Models\Boxes;
use App\Models\Investment;
use App\Models\Page;

class IndexController extends Controller
{
    public function index()
    {
        $page = Page::find(11);
        $investments = Investment::whereStatus(1)->get();
        // te same kafle co na stronie glownej (saleCards)
        $boxes = Boxes::orderBy('sort')->get();
        return view('front.developro.current.index', compact('page', 'investments', 'boxes'));
    }
}
