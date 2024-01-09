<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;

// CMS
use App\Http\Requests\ArticleFormRequest;
use App\Repositories\ArticleRepository;
use App\Services\ArticleService;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    private $repository;
    private $service;

    public function __construct(ArticleRepository $repository, ArticleService $service)
    {
//        $this->middleware('permission:box-list|box-create|box-edit|box-delete', [
//            'only' => ['index','store']
//        ]);
//        $this->middleware('permission:box-create', [
//            'only' => ['create','store']
//        ]);
//        $this->middleware('permission:box-edit', [
//            'only' => ['edit','update']
//        ]);
//        $this->middleware('permission:box-delete', [
//            'only' => ['destroy']
//        ]);

        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.article.index', ['list' => $this->repository->idDesc()]);
    }

    public function create()
    {
        return view('admin.article.form', [
            'cardTitle' => 'Dodaj artykuł',
            'backButton' => route('admin.article.index')
        ])->with('entry', Article::make());
    }

    public function store(ArticleFormRequest $request)
    {

        $article = $this->repository->create($request->validated());

        if ($request->hasFile('file')) {
            $this->service->upload($request->title, $request->file('file'), $article);
        }

        if ($request->hasFile('file_facebook')) {
            $this->service->uploadFileFacebook($request->title, $request->file('file_facebook'), $article);
        }

        return redirect(route('admin.article.index'))->with('success', 'Nowy artykuł dodany');
    }

    public function edit(int $id)
    {
        return view('admin.article.form', [
            'entry' => Article::find($id),
            'cardTitle' => 'Edytuj artykuł',
            'backButton' => route('admin.article.index')
        ]);
    }

    public function update(ArticleFormRequest $request, int $id)
    {

        $article = $this->repository->find($id);
        $this->repository->update($request->validated(), $article);

        if ($request->hasFile('file')) {
            $this->service->upload($request->title, $request->file('file'), $article, true);
        }

        if ($request->hasFile('file_facebook')) {
            $this->service->uploadFileFacebook($request->title, $request->file('file_facebook'), $article, true);
        }

        return redirect(route('admin.article.index'))->with('success', 'Artykuł zaktualizowany');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }

//    public function import(){
//        $oldSystemData = DB::table('news')->get();
//
//        foreach ($oldSystemData as $oldData) {
//            $newArticle = new Article();
//
//            $newArticle->title = $oldData->tytul;
//            $newArticle->slug = $oldData->tag;
//            $newArticle->content_entry = $oldData->wprowadzenie;
//            $newArticle->content = $oldData->tekst;
//            $newArticle->file = $oldData->plik;
//            $newArticle->date = $oldData->data;
//            $newArticle->meta_title = $oldData->meta_tytul;
//            $newArticle->meta_description = $oldData->meta_opis;
//            $newArticle->status = $oldData->status;
//
//            $newArticle->save();
//        }
//    }
}
