<?php

namespace App\Http\Controllers\Front\Developro\Plan;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Page;
use App\Models\Property;
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
        $menu_page = Page::where('id', $this->pageId)->first();
        $investmentPage = $investment->investmentPage()->where('slug', 'mieszkania')->first();

        if ($investment->type == 1) {
            $buildings = $investment->buildings; // Get all buildings related to the investment

            $investment_room = $investment->load([
                'buildingRooms' => function ($query) use ($investment, $request) {
                    if ($request->input('rooms')) {
                        $query->where('rooms', $request->input('rooms'));
                    }
                    if ($request->input('status')) {
                        $query->where('status', $request->input('status'));
                    }

                    if ($request->exists('floor')) {
                        $floorValue = $request->input('floor');

                        if (ctype_digit($floorValue) || $floorValue === '0') {
                            $floor = Floor::where('number', '=', $floorValue)
                                ->where('investment_id', '=', $investment->id)
                                ->first();

                            if ($floor) {
                                $query->where('floor_id', $floor->id);
                            }
                        }
                    }

                    if ($request->input('area')) {
                        $area_param = explode('-', $request->input('area'));
                        $min = $area_param[0];
                        $max = $area_param[1];
                        $query->whereBetween('area', [$min, $max]);
                    }

                    if ($request->input('sort')) {
                        $order_param = explode(':', $request->input('sort'));
                        $column = $order_param[0];
                        $direction = $order_param[1];
                        $query->orderBy($column, $direction);
                    }
                },
                'buildingFloors' => function ($query) use ($buildings) {
                    $query->whereIn('building_id', $buildings->pluck('id')); // Use all building IDs
                }
            ]);

            return view('front.developro.investment.plan-2', [
                'investment' => $investment,
                'buildings' => $buildings, // Pass multiple buildings
                'properties' => $investment->buildingRooms, // Get properties from all buildings
                'investment_page' => $investmentPage,
                'page' => $menu_page,
                'floors' => $request->input('floor'),
                'uniqueRooms' => $this->repository->getUniqueRooms($investment_room->properties),
            ]);
        }

        if($investment->type == 2){

            $investment_room = $investment->load(array(
                'floorRooms' => function ($query) use ($request, $investment) {
                    $query->orderBy('highlighted', 'DESC');
                    $query->orderBy('number_order', 'ASC');

                    if ($request->input('rooms')) {
                        $query->where('rooms', $request->input('rooms'));
                    }
                    if ($request->input('status')) {
                        $query->where('status', $request->input('status'));
                    }
//                    if ($request->input('area')) {
//                        $area_param = explode('-', $request->input('area'));
//                        $min = $area_param[0];
//                        $max = $area_param[1];
//                        $query->whereBetween('area', [$min, $max]);
//                    }

                    if ($request->exists('floor')) {
                        $floorValue = $request->input('floor');

                        // Check if $floorValue is a positive integer
                        if (ctype_digit($floorValue) || $floorValue === '0') {
                            $floor = Floor::where('number', '=', $floorValue)->where('investment_id', '=', $investment->id)->first();

                            // Check if $floor is not null before using its id
                            if ($floor) {
                                $query->where('floor_id', $floor->id);
                            }
                        }
                    }
                    if ($request->input('area')) {
                        $area_param = explode('-', $request->input('area'));
                        $min = $area_param[0];
                        $max = $area_param[1];
                        $query->whereBetween('area', [$min, $max]);
                    }
                    if ($request->input('sort')) {
                        $order_param = explode(':', $request->input('sort'));
                        $column = $order_param[0];
                        $direction = $order_param[1];
                        $query->orderBy($column, $direction);
                    }
                }
            ));

            $properties = $investment_room->floorRooms;

            return view('front.developro.investment.plan', [
                'investment' => $investment,
                'properties' => $properties,
                'page' => $menu_page,
                'floors' => $request->input('floor'),
                'uniqueRooms' => $this->repository->getUniqueRooms($investment_room->properties)
            ]);
        }
    }

    public function json($language, $slug)
    {
        $investment = $this->repository->findBySlug($slug);

        $properties = Property::with('investment:id,name')
            ->select('id', 'name', 'investment_id', 'number')
            ->where('investment_id', $investment->id)
            ->get()
            ->makeHidden(['investment_id']);

        // Return filtered properties as JSON
        return response()->json($properties);
    }
}
