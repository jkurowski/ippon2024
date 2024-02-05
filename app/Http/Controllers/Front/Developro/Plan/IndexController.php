<?php

namespace App\Http\Controllers\Front\Developro\Plan;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Page;
use App\Models\RodoRules;
use App\Models\RodoSettings;
use App\Repositories\InvestmentRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private InvestmentRepository $repository;
    private int $pageId;

    public function __construct(InvestmentRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 11;
    }

    public function index($language, $slug, Request $request)
    {
        $investment = $this->repository->findBySlug($slug);
        $building = Building::find(1);

        $investment_room = $investment->load(array(
            'buildingRooms' => function($query) use ($building, $request)
            {
                $query->where('properties.building_id', $building->id);
                if ($request->input('rooms')) {
                    $query->where('rooms', $request->input('rooms'));
                }
                if ($request->input('status')) {
                    $query->where('status', $request->input('status'));
                }

                if ($request->exists('floor')) {
                    $floorValue = $request->input('floor');

                    // Check if $floorValue is a positive integer
                    if (ctype_digit($floorValue) || $floorValue === '0') {
                        $floor = Floor::where('number', '=', $floorValue)->first();

                        // Check if $floor is not null before using its id
                        if ($floor) {
                            $query->where('floor_id', $floor->id);
                        }
                    }
                }

                if ($request->input('sort')) {
                    $order_param = explode(':', $request->input('sort'));
                    $column = $order_param[0];
                    $direction = $order_param[1];
                    $query->orderBy($column, $direction);
                }
            },
            'buildingFloors' => function($query) use ($building)
            {
                $query->where('building_id', $building->id);
            }
        ));

        $menu_page = Page::where('id', $this->pageId)->first();
        $investmentPage = $investment->investmentPage()->where('slug', 'mieszkania')->first();

        return view('front.developro.investment.plan-2', [
            'investment' => $investment,
            'building' => $building,
            'properties' => $investment->buildingRooms,
            'investment_page' => $investmentPage,
            'page' => $menu_page,
            'floors' => $request->input('floor'),
            'uniqueRooms' => $this->repository->getUniqueRooms($investment_room->properties)
        ]);
    }
}
