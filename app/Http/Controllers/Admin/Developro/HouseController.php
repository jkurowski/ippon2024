<?php

namespace App\Http\Controllers\Admin\Developro;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

// CMS
use App\Models\Investment;
use App\Models\Property;
use App\Http\Requests\PropertyFormRequest;
use App\Repositories\PropertyRepository;
use App\Services\PropertyService;

class HouseController extends Controller
{
    private $repository;
    private $service;

    public function __construct(PropertyRepository $repository, PropertyService $service)
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

    public function index(Investment $investment)
    {
        return view('admin.investment_house.index', ['investment' => $investment]);
    }

    public function create(Investment $investment)
    {
        return view('admin.investment_house.form', [
            'cardTitle' => 'Dodaj dom',
            'backButton' => route('admin.developro.investment.house.index', $investment),
            'investment' => $investment,
        ])->with('entry', Property::make());
    }

    public function store(PropertyFormRequest $request, Investment $investment)
    {
        $property = $this->repository->create($request->validated());

        if ($request->hasFile('file')) {
            $this->service->upload($request->name, $request->file('file'), $property);
        }

        if ($request->hasFile('file_pdf')) {
            $this->service->uploadPdf($request->name, $request->file('file_pdf'), $property);
        }

        return redirect(route('admin.developro.investment.house.index', ['investment' => $investment]))->with('success', 'Dom poprawnie zapisany');
    }

    public function edit(Investment $investment, $id)
    {
        return view('admin.investment_house.form', [
            'cardTitle' => 'Edytuj dom',
            'backButton' => route('admin.developro.investment.house.index', $investment),
            'investment' => $investment,
            'entry' => Property::find($id)
        ]);
    }

    public function update(PropertyFormRequest $request, Investment $investment, int $id)
    {
        $property = $this->repository->find($id);
        $this->repository->update($request->validated(), $property);

        if ($request->hasFile('file')) {
            $this->service->upload($request->name, $request->file('file'), $property, true);
        }

        if ($request->hasFile('file_pdf')) {
            $this->service->uploadPdf($request->name, $request->file('file_pdf'), $property, true);
        }

        return redirect(route('admin.developro.investment.house.index', ['investment' => $investment->id]))->with('success', 'Dom zaktualizowany');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }
}
