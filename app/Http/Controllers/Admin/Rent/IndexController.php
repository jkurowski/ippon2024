<?php

namespace App\Http\Controllers\Admin\Rent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//CMS
use App\Http\Requests\RentFormRequest;
use App\Repositories\RentRepository;
use App\Services\RentService;
use App\Models\Rent;

class IndexController extends Controller
{
    private RentRepository $repository;
    private RentService $service;

    public function __construct(RentRepository $repository, RentService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.rent.index', ['list' => $this->repository->allSort('ASC')]);
    }

    public function create()
    {
        return view('admin.rent.form', [
            'cardTitle' => 'Dodaj wpis',
            'backButton' => route('admin.rent.index')
        ])->with('entry', Rent::make());
    }

    public function store(RentFormRequest $request)
    {
        $entry = $this->repository->create($request->validated());

        if ($request->hasFile('file')) {
            $this->service->upload($request->name, $request->file('file'), $entry);
        }

        return redirect(route('admin.rent.index'))->with('success', 'Nowy wpis dodany');
    }

    public function edit(Rent $rent)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        return view('admin.rent.form', [
            'entry' => $this->repository->find($rent->id),
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route('admin.rent.index')
        ]);
    }

    public function update(RentFormRequest $request, int $id)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        $entry = $this->repository->find($id);
        $this->repository->update($request->validated(), $entry);

        if ($request->hasFile('file')) {
            $this->service->upload($request->name, $request->file('file'), $entry, 1);
        }

        return redirect(route('admin.rent.index'))->with('success', 'Wpis zaktualizowany');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }

    public function sort(Request $request)
    {
        $this->repository->updateOrder($request->get('recordsArray'));
    }
}
