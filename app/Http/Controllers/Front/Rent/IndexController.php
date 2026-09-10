<?php

namespace App\Http\Controllers\Front\Rent;

use App\Http\Controllers\Controller;

//CMS
use App\Models\Page;
use App\Models\RodoRules;
use App\Models\RodoSettings;
use App\Repositories\RentRepository;

class IndexController extends Controller
{
    private RentRepository $repository;

    public function __construct(RentRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        $page = Page::find(8);
        $rents = $this->repository->allSortByWhere('active', 1, 'sort','ASC');
        return view('front.rent.index', compact('page', 'rents'));
    }

    public function show($lang, $slug, $id){
        $page = Page::find(8);
        $rent = $this->repository->find($id);

        /* formularz "zapytaj o lokal" na dole strony */
        $obligation = RodoSettings::find(1);
        $rules = RodoRules::orderBy('sort')->whereStatus(1)->get();

        return view('front.rent.show', compact('page', 'rent', 'obligation', 'rules'));
    }
}
