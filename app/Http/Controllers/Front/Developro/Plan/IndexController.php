<?php

namespace App\Http\Controllers\Front\Developro\Plan;

use App\Http\Controllers\Controller;
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
        $investment_room = $investment->load(array(
            'floorRooms' => function ($query) use ($request) {
                //$query->orderBy('highlighted', 'DESC');
                $query->orderBy('status', 'ASC');

                if ($request->input('rooms')) {
                    $query->where('rooms', $request->input('rooms'));
                }
                if ($request->input('status')) {
                    $query->where('status', $request->input('status'));
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

        $menu_page = Page::where('id', $this->pageId)->first();
        $investmentPage = $investment->investmentPage()->where('slug', 'mieszkania')->first();

        return view('front.developro.investment.plan-2', [
            'investment' => $investment,
            'properties' => $properties,
            'investment_page' => $investmentPage,
            'page' => $menu_page,
            'uniqueRooms' => $this->repository->getUniqueRooms($investment_room->properties)
        ]);
    }
}
