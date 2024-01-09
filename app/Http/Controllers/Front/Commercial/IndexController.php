<?php

namespace App\Http\Controllers\Front\Commercial;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Repositories\CommercialRepository;

class IndexController extends Controller
{
    private CommercialRepository $repository;

    public function __construct(CommercialRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $page = Page::find(7);
        $commercials = $this->repository->allSort('ASC');
        return view('front.commercial.index', compact('page', 'commercials'));
    }
}
