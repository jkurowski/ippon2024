<?php

namespace App\Http\Controllers\Front\Developro\Page;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\RodoRules;
use App\Models\RodoSettings;
use App\Repositories\InvestmentRepository;

class IndexController extends Controller
{
    private InvestmentRepository $repository;
    private int $pageId;

    public function __construct(InvestmentRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 11;
    }

    public function index($language, $slug, $page)
    {
        $investment = $this->repository->findBySlug($slug);
        $investmentPage = $investment->investmentPage()->where('slug', $page)->first();
        $menu_page = Page::where('id', $this->pageId)->first();

        return view('front.developro.page.index', [
            'investment' => $investment,
            'page' => $menu_page,
            'investment_page' => $investmentPage,
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get()
        ]);
    }

    public function temp()
    {
        $investment = $this->repository->findBySlug('osiedle-tempo');
        $menu_page = Page::where('id', $this->pageId)->first();

        return view('front.developro.page.temp', [
            'investment' => $investment,
            'page' => $menu_page
        ]);
    }

    public function tempolocation()
    {
        $investment = $this->repository->findBySlug('osiedle-tempo');
        $menu_page = Page::where('id', $this->pageId)->first();

        return view('front.developro.page.location-tempo', [
            'investment' => $investment,
            'page' => $menu_page,
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get()
        ]);
    }

    public function temp2()
    {
        $investment = $this->repository->findBySlug('osiedle-synergia');
        $menu_page = Page::where('id', $this->pageId)->first();

        return view('front.developro.page.location-synergia', [
            'investment' => $investment,
            'sections' => $investment->sections(2)->get(),
            'page' => $menu_page,
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereStatus(1)->get()
        ]);
    }
}
