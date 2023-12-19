<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;

// CMS
use App\Models\Page;
use OpenGraph;
use Spatie\SchemaOrg\Schema;

class ArticleController extends Controller
{

    public function index()
    {
        $page = Page::where('uri', 'aktualnosci')->firstOrFail();
        $articles = Article::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('front.article.index', ['page' => $page, 'articles' => $articles]);
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $page = Page::where('uri', 'aktualnosci')->firstOrFail();
        return view('front.article.show', [
            'page' => $page,
            'article' => $article
        ]);
    }
}
