<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Investment;
use App\Models\Page;
use App\Models\Property;
use App\Models\RodoRules;

class InvestmentPropertyController extends Controller
{
    private $pageId;

    public function __construct()
    {
        $this->pageId = 11;
    }

    ///{slug}/{property},{propertySlug},{propertyFloor},{propertyRooms},{propertyArea}

    public function index($language, $slug, Property $property)
    {
        $investment = Investment::where('slug', '=', $slug)->firstOrFail();
        $page = Page::where('id', $this->pageId)->first();
        $floor = Floor::find($property->floor_id);

        $similar = Property::select('properties.*', 'floors.number as floor_number')
            ->where('rooms', $property->rooms)
            ->where('id', '<>', $property->id)
            ->join('floors', 'properties.floor_id', '=', 'floors.id')
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('front.investment_property.index', [
            'investment' => $investment,
            'floor' => $floor,
            'property' => $property,
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
            'next' => $property->findNext(1, $property->id),
            'prev' => $property->findPrev(1, $property->id),
            'page' => $page,
            'similar' => $similar
        ]);
    }
}
