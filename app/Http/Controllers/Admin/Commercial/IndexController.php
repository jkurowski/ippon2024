<?php

namespace App\Http\Controllers\Admin\Commercial;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommercialFormRequest;
use App\Models\Commercial;
use App\Models\Gallery;
use App\Repositories\CommercialRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private CommercialRepository $repository;

    public function __construct(CommercialRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('admin.commercial.index', ['list' => $this->repository->allSort('ASC')]);
    }

    public function create()
    {
        return view('admin.commercial.form', [
            'selectMenu' => Gallery::pluck('name', 'id'),
            'cardTitle' => 'Dodaj wpis',
            'backButton' => route('admin.commercial.index')
        ])->with('entry', Commercial::make());
    }

    public function store(CommercialFormRequest $request)
    {
        $this->repository->create($request->validated());
        return redirect(route('admin.commercial.index'))->with('success', 'Nowy wpis dodany');
    }

    public function edit(Commercial $commercial)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        return view('admin.commercial.form', [
            'selectMenu' => Gallery::where('id', '!=', $commercial->gallery_id)->pluck('name', 'id'),
            'entry' => $this->repository->find($commercial->id),
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route('admin.commercial.index')
        ]);
    }

    public function update(CommercialFormRequest $request, int $id)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        $entry = $this->repository->find($id);
        $this->repository->update($request->validated(), $entry);
        return redirect(route('admin.commercial.index'))->with('success', 'Wpis zaktualizowany');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }
}
