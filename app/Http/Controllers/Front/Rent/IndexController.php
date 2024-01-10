<?php

namespace App\Http\Controllers\Front\Rent;

use App\Http\Controllers\Controller;

//CMS
use App\Models\Page;
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
        $rents = $this->repository->allSort('ASC');
        return view('front.rent.index', compact('page', 'rents'));
    }

    public function show($lang, $slug, $id){
        $page = Page::find(8);
        $rent = $this->repository->find($id);
        return view('front.rent.show', compact('page', 'rent'));
    }
}
