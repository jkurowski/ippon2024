<?php

namespace App\Http\Controllers\Admin\Rodo;

use App\Http\Controllers\Controller;
use App\Http\Requests\RodoRulesFormRequest;

use App\Repositories\RodoRulesRepository;
use App\Models\RodoRules;
use Illuminate\Support\Facades\DB;

class RulesController extends Controller
{
    private $repository;

    public function __construct(RodoRulesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('admin.rodo_rules.index', ['list' => $this->repository->allSort('ASC')]);
    }

    public function create()
    {
        return view('admin.rodo_rules.form', [
            'cardTitle' => 'Dodaj regułkę',
            'backButton' => route('admin.rodo.rules.index')
        ])->with('entry', RodoRules::make());
    }

    public function store(RodoRulesFormRequest $request)
    {
        $this->repository->create($request->validated());
        return redirect(route('admin.rodo.rules.index'))->with('success', 'Nowa regułka dodana');
    }

    public function edit(int $id)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        return view('admin.rodo_rules.form', [
            'entry' => RodoRules::find($id),
            'cardTitle' => 'Edytuj regułkę',
            'backButton' => route('admin.rodo.rules.index')
        ]);
    }

    public function update(RodoRulesFormRequest $request, RodoRules $rule)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        $this->repository->update($request->validated(), $rule);
        return redirect(route('admin.rodo.rules.index'))->with('success', 'Regułka zaktualizowana');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }

    public function translate(){
        $defaultLocale = 'pl';

        $news = DB::table('rodo_rules')->get();

        foreach ($news as $n) {
            $existingNews = RodoRules::find($n->id);

            // If the entry exists, update its attributes
            if ($existingNews) {

                // Existing data
                $existingNews->fill([
                    'title' => $n->title,
                    'required' => $n->required,
                    'time' => $n->time,
                    'status' => $n->status,
                    'sort' => $n->sort,
                    'created_at' => $n->created_at,
                    'updated_at' => $n->updated_at
                ]);

                // Update translations for translatable attributes
                $existingNews->setTranslation('text', $defaultLocale, $n->text);

                // Save
                $existingNews->save();
            }
        }

        return redirect(route('admin.rodo.rules.index'))->with('success', 'Wpisy przetłumaczone');
    }
}
