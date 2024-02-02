<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;

// CMS
use App\Models\Page;
use App\Repositories\InvestmentRepository;

class InvestmentController extends Controller
{
    private $repository;
    private $pageId;

    public function __construct(InvestmentRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 11;
    }

    public function index(Request $request, $language, $slug)
    {
        $investment = $this->repository->findBySlug($slug);
        $investment_room = $investment->load(array(
            'floorRooms' => function ($query) use ($request) {
                $query->orderBy('highlighted', 'DESC');
                $query->orderBy('number_order', 'ASC');

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

        $page = Page::where('id', $this->pageId)->first();

        if($investment->id == 5){
            return view('front.developro.investment.slow', [
                'investment' => $investment,
                'page' => $page
            ]);
        } else {
            return view('front.developro.investment.index', [
                'investment' => $investment,
                'page' => $page
            ]);
        }
    }
}
