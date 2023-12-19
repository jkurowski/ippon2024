<?php

namespace App\Http\Controllers\Admin\Developro;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvestArticlesFormRequest;
use Illuminate\Http\Request;

//CMS
use App\Models\Investment;
use App\Models\InvestmentArticles;

class ArticleController extends Controller
{

    public function index(Investment $investment)
    {
        return view('admin.investment_article.index', ['list' => InvestmentArticles::all(), 'investment' => $investment]);
    }

    public function create(Investment $investment)
    {
        return view('admin.investment_article.form', [
            'cardTitle' => 'Dodaj wpis',
            'backButton' => route('admin.developro.investment.article.index', $investment),
            'investment' => $investment,
        ])->with('entry', InvestmentArticles::make());
    }

    public function store(InvestArticlesFormRequest $request, Investment $investment)
    {
        InvestmentArticles::create($request->validated());

        return redirect(route('admin.developro.investment.article.index', $investment))->with('success', 'Nowy wpis dodany');
    }

    public function edit(Investment $investment, InvestmentArticles $article)
    {
        return view('admin.investment_article.form', [
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route('admin.developro.investment.article.index', $investment),
            'entry' => $article,
            'investment' => $investment
        ]);
    }

    public function update(InvestArticlesFormRequest $request, Investment $investment, InvestmentArticles $article)
    {

        $article->update($request->validated());

        return redirect()->route('admin.developro.investment.article.index', $investment)->with('success', 'Wpis zaktualizowany');
    }

    public function destroy(Investment $investment, InvestmentArticles $article)
    {
        $article->delete();
        return response()->json('Deleted');
    }
}
