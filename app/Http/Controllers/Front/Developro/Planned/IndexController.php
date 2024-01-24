<?php

namespace App\Http\Controllers\Front\Developro\Planned;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Page;

class IndexController extends Controller
{
    public function index()
    {
        $page = Page::find(11);
        $investments = Investment::whereStatus(3)->get();
        return view('front.developro.planned.index', compact('page', 'investments'));
    }

    public function show($id)
    {
        //
    }

}
