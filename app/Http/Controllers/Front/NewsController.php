<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Page;

class NewsController extends Controller
{
    public function index()
    {
        $page = Page::find(16);
        /* 48 wpisow na jednej stronie robilo bardzo dluga liste — dzielimy po 12 */
        $articles = News::where('status', 1)->orderBy('date', 'DESC')->paginate(12);
        return view('front.news.index', ['page' => $page, 'articles' => $articles]);
    }

    public function show($lang, $slug)
    {
        $article = News::where('slug', $slug)->firstOrFail();
        $page = Page::find(16);

        /* "Zobacz tez" — trzy najnowsze wpisy poza tym otwartym */
        $other = News::where('status', 1)
            ->where('id', '!=', $article->id)
            ->orderBy('date', 'DESC')
            ->take(3)
            ->get();

        return view('front.news.show', [
            'page' => $page,
            'article' => $article,
            'other' => $other
        ]);
    }
}
