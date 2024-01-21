<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// CMS
use App\Http\Requests\CityFormRequest;
use App\Repositories\CityRepository;
use App\Models\City;

class IndexController extends Controller
{
    private CityRepository $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('admin.city.index', ['list' => $this->repository->allSort('ASC')]);
    }

    public function create()
    {
        return view('admin.city.form', [
            'cardTitle' => 'Dodaj wpis',
            'backButton' => route('admin.city.index')
        ])->with('entry', City::make());
    }

    public function store(CityFormRequest $request)
    {
        $this->repository->create($request->validated());
        return redirect(route('admin.city.index'))->with('success', 'Nowy wpis dodany');
    }

    public function edit(City $city)
    {
        return view('admin.city.form', [
            'entry' => $city,
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route('admin.city.index')
        ]);
    }

    public function update(CityFormRequest $request, City $city)
    {
        $this->repository->update($request->validated(), $city);
        return redirect(route('admin.city.index'))->with('success', 'Wpis zaktualizowany');
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
