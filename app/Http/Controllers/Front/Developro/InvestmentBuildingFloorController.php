<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;

use App\Models\Investment;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Page;
use App\Repositories\InvestmentRepository;
use Illuminate\Http\Request;

class InvestmentBuildingFloorController extends Controller
{
    private InvestmentRepository $repository;
    private int $pageId;

    public function __construct(InvestmentRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 11;
    }

    public function index($language, $slug, Floor $floor, $floorSlug, Request $request)
    {
        $investment = Investment::where('slug', '=', $slug)->firstOrFail();
        $building = Building::find(1);

        $investment_room = $investment->load(array(
            'buildingRooms' => function($query) use ($building, $floor, $request)
            {
                $query->where('properties.floor_id', $floor->id);
                $query->where('properties.building_id', $building->id);

                if ($request->input('rooms')) {
                    $query->where('rooms', $request->input('rooms'));
                }
                if ($request->input('status')) {
                    $query->where('status', $request->input('status'));
                }
                if ($request->input('sort')) {
                    $order_param = explode(':', $request->input('sort'));
                    $column = $order_param[0];
                    $direction = $order_param[1];
                    $query->orderBy($column, $direction);
                }
            },
            'building' => function($query) use ($building)
            {
                $query->where('id', $building->id);
            },
            'floor' => function($query) use ($floor)
            {
                $query->where('id', $floor->id);
            }
        ));

        $menu_page = Page::where('id', $this->pageId)->first();
        $investmentPage = $investment->investmentPage()->where('slug', 'mieszkania')->first();

        return view('front.investment_building_floor.index', [
            'investment' => $investment_room,
            'properties' => $investment->buildingRooms,
            'next_floor' => $floor->findNext($investment->id, 1, $floor->position),
            'prev_floor' => $floor->findPrev($investment->id, 1, $floor->position),
            'uniqueRooms' => $this->repository->getUniqueRooms($investment_room->properties),
            'investment_page' => $investmentPage,
            'page' => $menu_page
        ]);
    }

}
