<?php

namespace App\Http\Controllers\Front\Developro\Soon;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Page;

class IndexController extends Controller
{
    public function index()
    {
        $page = Page::find(14);
        $investments = Investment::whereStatus(4)->get();
        return view('front.developro.soon.index', compact('page', 'investments'));
    }
}
