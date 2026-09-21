<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;

//CMS
use App\Repositories\FaqRepository as Repository;
use App\Http\Requests\FaqFormRequest as FormRequest;
use App\Models\Faq as Model;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('admin.faq.index', ['list' => $this->repository->allSort('ASC')]);
    }

    public function create()
    {
        return view('admin.faq.form', [
            'cardTitle' => 'Dodaj pytanie',
            'backButton' => route('admin.faq.index')
        ])->with('entry', Model::make());
    }

    public function store(FormRequest $request)
    {
        $this->repository->create($request->validated());

        return redirect(route('admin.faq.index'))->with('success', 'Nowy wpis dodany');
    }

    public function edit(Model $faq)
    {
        return view('admin.faq.form', [
            'entry' => $faq,
            'cardTitle' => 'Edytuj pytanie',
            'backButton' => route('admin.faq.index')
        ]);
    }

    public function update(FormRequest $request, Model $faq)
    {
        $this->repository->update($request->validated(), $faq);

        return redirect(route('admin.faq.index'))->with('success', 'Wpis zaktualizowany');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }

    /**
     * Zapis kolejnosci po przeciagnieciu wiersza na liscie. Ta kolejnosc
     * steruje akordeonem FAQ na podstronie "Jak kupic mieszkanie".
     */
    public function sort(Request $request)
    {
        $this->repository->updateOrder($request->get('recordsArray'));
    }
}
