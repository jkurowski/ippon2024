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
        $articles = News::where('status', 1)->orderBy('date', 'DESC')->get();
        return view('front.news.index', ['page' => $page, 'articles' => $articles]);
    }

    public function show($lang, $slug)
    {
        $article = News::where('slug', $slug)->first();
        $page = Page::find(16);
        return view('front.news.show', [
            'page' => $page,
            'article' => $article
        ]);
    }
}
