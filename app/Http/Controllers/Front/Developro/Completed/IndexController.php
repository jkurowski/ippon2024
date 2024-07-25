<?php

namespace App\Http\Controllers\Front\Developro\Completed;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Investment;
use App\Models\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $page = Page::find(10);
        $customOrder = [1, 2, 3, 11, 4];
        $customOrderString = implode(',', $customOrder);

        $investments = Investment::where('status', 2)
            ->with('carousel')
            ->orderByRaw("FIELD(id, $customOrderString)")
            ->get();

        return view('front.developro.completed.index', compact('page', 'investments'));
    }
}
