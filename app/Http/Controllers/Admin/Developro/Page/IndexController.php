<?php

namespace App\Http\Controllers\Admin\Developro\Page;

use App\Http\Controllers\Controller;

//CMS
use App\Models\Investment;
use App\Repositories\InvestmentPageRepository;
use App\Http\Requests\InvestPageFormRequest;
use App\Models\InvestmentPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    private InvestmentPageRepository $repository;

    public function __construct(InvestmentPageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Investment $investment)
    {
        return view('admin.developro.investment_page.index', ['list' => $this->repository->allPageSort('ASC', $investment->id), 'investment' => $investment]);
    }

    public function create(Investment $investment)
    {
        return view('admin.developro.investment_page.form', [
            'cardTitle' => 'Dodaj wpis',
            'investment' => $investment,
            'backButton' => route('admin.developro.investment.page.index', $investment)
        ])->with('entry', InvestmentPage::make());
    }

    public function store(InvestPageFormRequest $request, Investment $investment)
    {
        $this->repository->create($request->validated());
        return redirect(route('admin.developro.investment.page.index', $investment))->with('success', 'Nowy wpis dodany');
    }

    public function edit(Investment $investment, InvestmentPage $page)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        return view('admin.developro.investment_page.form', [
            'entry' => $page,
            'investment' => $investment,
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route('admin.developro.investment.page.index', $investment)
        ]);
    }

    public function update(InvestPageFormRequest $request, Investment $investment, InvestmentPage $page)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        $this->repository->update($request->validated(), $page);
        return redirect(route('admin.developro.investment.page.index', $investment))->with('success', 'Wpis zaktualizowany');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }

    public function sort(Request $request)
    {
        $this->repository->updateOrder($request->get('recordsArray'));
    }

    public function translate(){
        $defaultLocale = 'pl';

        $news = DB::table('investment_pages')->get();

        foreach ($news as $n) {
            $existingNews = InvestmentPage::find($n->id);

            // If the entry exists, update its attributes
            if ($existingNews) {

                $existingNews->fill([
                    'investment_id' => $n->investment_id,
                    'slug' => $n->slug,
                    'active' => $n->active,
                    'contact_form' => $n->contact_form,
                    'meta_robots' => $n->meta_robots,
                    'sort' => $n->sort,
                    'cta_link' => $n->cta_link,
                    'created_at' => $n->created_at,
                    'updated_at' => $n->updated_at
                ]);

                // Update translations for translatable attributes
                $existingNews->setTranslation('title', $defaultLocale, $n->title);
                $existingNews->setTranslation('content', $defaultLocale, $n->content);
                $existingNews->setTranslation('meta_title', $defaultLocale, $n->meta_title);
                $existingNews->setTranslation('meta_description', $defaultLocale, $n->meta_description);
                $existingNews->setTranslation('meta_description', $defaultLocale, $n->meta_description);
                $existingNews->setTranslation('cta_text', $defaultLocale, $n->cta_text);
                $existingNews->setTranslation('cta_button', $defaultLocale, $n->cta_button);

                // Save
                $existingNews->save();
            }
        }

        return redirect(route('admin.awards.index'))->with('success', 'Wpisy przetłumaczone');
    }
}
