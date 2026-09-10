<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\RodoRules;
use App\Models\RodoSettings;
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
            'list' => $this->repository->allSort('ASC'),
            /* zgody RODO dla formularza kontaktowego na dole strony */
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get(),
        ]);
    }
}
