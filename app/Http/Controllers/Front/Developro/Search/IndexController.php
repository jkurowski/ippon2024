<?php

namespace App\Http\Controllers\Front\Developro\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// CMS
use App\Models\Investment;
use App\Models\Page;
use App\Models\Property;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $page = Page::find(11);

        $investments = Investment::where('status', 1)
            ->whereHas('properties') // Ensures only investments with at least one property are fetched
            ->with(['properties' => function($query) use ($request) {
                // Apply sorting
                $query->orderBy('highlighted', 'DESC');
                $query->orderBy('number_order', 'ASC');

                // Apply filters based on request parameters
                if ($request->input('rooms')) {
                    $query->where('rooms', $request->input('rooms'));
                }

                if ($request->input('status')) {
                    $statusValues = explode(',', $request->input('status'));
                    $query->whereIn('status', $statusValues);
                }

                if ($request->exists('floor')) {
                    $floorValue = $request->input('floor');

                    if (ctype_digit($floorValue) || $floorValue === '0') {
                        $floor = Floor::where('number', $floorValue)->first();
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
            }])
            ->get();

        return view("front.developro.search.index", compact('page', 'investments'));
    }
}
