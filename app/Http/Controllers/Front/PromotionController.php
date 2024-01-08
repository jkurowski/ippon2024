<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Repositories\PromotionRepository;
use App\Services\PropertyService;

class PromotionController extends Controller
{
    private PromotionRepository $repository;

    public function __construct(PromotionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $page = Page::find(4);
        return view('front.promotion.index', [
            'page' => $page,
            'list' => $this->repository->allSort('ASC')
        ]);
    }
}
