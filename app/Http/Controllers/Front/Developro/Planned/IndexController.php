<?php

namespace App\Http\Controllers\Front\Developro\Planned;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Page;

class IndexController extends Controller
{
    public function index()
    {
        $page = Page::find(12);
        $investments = Investment::whereStatus(3)->orderBy('sort')->orderBy('id', 'DESC')->get(); /* kolejnosc z adminu (uwaga klienta 2.11.2026) */
        return view('front.developro.planned.index', compact('page', 'investments'));
    }

    public function show($id)
    {
        //
    }
}
