<?php

namespace App\Http\Controllers\Admin\Awards;

use App\Http\Controllers\Controller;

//CMS
use App\Repositories\AwardRepository as Repository;
use App\Http\Requests\AwardFormRequest as FormRequest;
use App\Models\Award as Model;
use App\Services\AwardService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private Repository $repository;
    private AwardService $service;

    public function __construct(Repository $repository, AwardService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.awards.index', ['list' => $this->repository->allSort('ASC')]);
    }

    public function create()
    {
        return view('admin.awards.form', [
            'cardTitle' => 'Dodaj wpis',
            'backButton' => route('admin.awards.index')
        ])->with('entry', Model::make());
    }

    public function store(FormRequest $request)
    {
        $award = $this->repository->create($request->validated());

        if ($request->hasFile('file')) {
            $this->service->upload($request->name, $request->file('file'), $award);
        }

        return redirect(route('admin.awards.index'))->with('success', 'Nowy wpis dodany');
    }

    public function edit(Model $award)
    {
        return view('admin.awards.form', [
            'entry' => $award,
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route('admin.awards.index')
        ]);
    }

    public function update(FormRequest $request, Model $award)
    {
        $this->repository->update($request->validated(), $award);

        if ($request->hasFile('file')) {
            $this->service->upload($request->name, $request->file('file'), $award, true);
        }

        return redirect(route('admin.awards.index'))->with('success', 'Wpis zaktualizowany');
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
