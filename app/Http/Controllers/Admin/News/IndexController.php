<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;

//CMS
use App\Http\Requests\ArticleFormRequest as FormRequest;
use App\Models\News as Model;
use App\Repositories\NewsRepository as Repository;
use App\Services\NewsService;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    private $repository;
    private $service;

    public function __construct(Repository $repository, NewsService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.news.index', ['list' => $this->repository->allSortBy('date', 'DESC')]);
    }

    public function create()
    {
        return view('admin.news.form', [
            'cardTitle' => 'Dodaj artykuł',
            'backButton' => route('admin.news.index')
        ])->with('entry', Model::make());
    }

    public function store(FormRequest $request)
    {

        $article = $this->repository->create($request->validated());

        if ($request->hasFile('file')) {
            $this->service->upload($request->title, $request->file('file'), $article);
        }

        if ($request->hasFile('file_facebook')) {
            $this->service->uploadFileFacebook($request->title, $request->file('file_facebook'), $article);
        }

        return redirect(route('admin.news.index'))->with('success', 'Nowy artykuł dodany');
    }

    public function edit(int $id)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        return view('admin.news.form', [
            'entry' => Model::find($id),
            'cardTitle' => 'Edytuj artykuł',
            'backButton' => route('admin.news.index')
        ]);
    }

    public function update(FormRequest $request, int $id)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        $news = $this->repository->find($id);
        $this->repository->update($request->validated(), $news);

        if ($request->hasFile('file')) {
            $this->service->upload($request->title, $request->file('file'), $news, true);
        }

        if ($request->hasFile('file_facebook')) {
            $this->service->uploadFileFacebook($request->title, $request->file('file_facebook'), $news, true);
        }

        return redirect(route('admin.news.index'))->with('success', 'Artykuł zaktualizowany');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }

//    public function import(){
//        $oldSystemData = DB::table('wspieramy')->get();
//
//        foreach ($oldSystemData as $oldData) {
//            $newArticle = new Model();
//
//            $newArticle->title = $oldData->nazwa;
//            $newArticle->slug = Str::slug($oldData->nazwa);
//            $newArticle->content_entry = '1asdfasdfasdfasdf';
//            $newArticle->content = $oldData->tekst;
//            $newArticle->file = $oldData->thumb;
//            $newArticle->date = $oldData->data;
//            $newArticle->status = 1;
//
//            $newArticle->save();
//        }
//    }

    public function translate(){
        $defaultLocale = 'pl';

        $news = DB::table('news')->get();

        foreach ($news as $n) {
            $existingNews = Model::find($n->id);

            // If the entry exists, update its attributes
            if ($existingNews) {

                // Existing data
                $existingNews->fill([
                    'slug' => $n->slug,
                    'status' => $n->status,
                    'sort' => $n->sort,
                    'date' => $n->date,
                    'file' => $n->file,
                    'file_webp' => $n->file_webp,
                    'file_facebook' => $n->file_facebook,
                    'file_alt' => $n->file_alt,
                    'created_at' => $n->created_at,
                    'updated_at' => $n->updated_at,
                    'meta_robots' => $n->meta_robots,
                ]);

                // Update translations for translatable attributes
                $existingNews->setTranslation('title', $defaultLocale, $n->title);
                $existingNews->setTranslation('content', $defaultLocale, $n->content);
                $existingNews->setTranslation('content_entry', $defaultLocale, $n->content_entry);
                $existingNews->setTranslation('meta_title', $defaultLocale, $n->meta_title);
                $existingNews->setTranslation('meta_description', $defaultLocale, $n->meta_description);

                // Save
                $existingNews->save();
            }
        }

        return redirect(route('admin.news.index'))->with('success', 'Wpisy przetłumaczone');
    }
}
