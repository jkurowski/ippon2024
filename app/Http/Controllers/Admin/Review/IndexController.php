<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;

//CMS
use App\Repositories\ReviewRepository as Repository;
use App\Http\Requests\ReviewFormRequest as FormRequest;
use App\Models\Review as Model;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    private Repository $repository;
    private $viewName;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
        $this->viewName = 'review';
    }

    public function index()
    {
        return view('admin.'.$this->viewName.'.index', ['list' => $this->repository->all()]);
    }

    public function create()
    {
        return view('admin.'.$this->viewName.'.form', [
            'cardTitle' => 'Dodaj wpis',
            'backButton' => route('admin.review.index')
        ])->with('entry', Model::make());
    }

    public function store(FormRequest $request)
    {
        $this->repository->create($request->validated());
        return redirect(route('admin.review.index'))->with('success', 'Nowy wpis dodany');
    }

    public function edit(Model $review)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        return view('admin.'.$this->viewName.'.form', [
            'entry' => $review,
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route('admin.review.index')
        ]);
    }

    public function update(FormRequest $request, Model $review)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        $this->repository->update($request->validated(), $review);
        return redirect(route('admin.review.index'))->with('success', 'Wpis zaktualizowany');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }
    public function translate(){
        $defaultLocale = 'pl';

        $news = DB::table('reviews')->get();

        foreach ($news as $n) {
            $existingNews = Model::find($n->id);

            // If the entry exists, update its attributes
            if ($existingNews) {

                $existingNews->fill([
                    'author' => $n->author,
                    'rating' => $n->rating,
                    'type' => $n->type,
                    'created_at' => $n->created_at,
                    'updated_at' => $n->updated_at
                ]);

                // Update translations for translatable attributes
                $existingNews->setTranslation('content', $defaultLocale, $n->content);

                // Save
                $existingNews->save();
            }
        }

        return redirect(route('admin.review.index'))->with('success', 'Wpisy przetłumaczone');
    }
}
