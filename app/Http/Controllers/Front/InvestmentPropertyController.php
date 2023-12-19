<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Floor;
use App\Models\Page;
use App\Models\Property;
use App\Models\RodoRules;

class InvestmentPropertyController extends Controller
{
    private $pageId;

    public function __construct()
    {
        $this->pageId = 2;
    }

    public function index($slug, Floor $floor, Property $property)
    {
        $investment = Investment::where('slug', '=', $slug)->firstOrFail();
        $page = Page::where('id', $this->pageId)->first();

        return view('front.investment_property.index', [
            'investment' => $investment,
            'floor' => $floor,
            'property' => $property,
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
            'next' => $property->findNext(1, $property->id),
            'prev' => $property->findPrev(1, $property->id),
            'page' => $page
        ]);
    }
}
