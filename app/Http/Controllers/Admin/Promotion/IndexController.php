<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionFormRequest;
use App\Models\Promotion;
use App\Repositories\PromotionRepository;
use App\Services\PromotionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    private PromotionRepository $repository;
    private PromotionService $service;

    public function __construct(PromotionRepository $repository, PromotionService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.promotion.index', ['list' => $this->repository->allSort('ASC')]);
    }

    public function create()
    {
        return view('admin.promotion.form', [
            'cardTitle' => 'Dodaj promocje',
            'backButton' => route('admin.promotion.index')
        ])->with('entry', Promotion::make());
    }

    public function store(PromotionFormRequest $request)
    {
        $entry = $this->repository->create($request->validated());

        if ($request->hasFile('file')) {
            $this->service->upload($request->name, $request->file('file'), $entry);
        }

        return redirect(route('admin.promotion.index'))->with('success', 'Nowy wpis dodany');
    }

    public function edit(Promotion $promotion)
    {
        return view('admin.promotion.form', [
            'entry' => $promotion,
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route('admin.promotion.index')
        ]);
    }

    public function update(PromotionFormRequest $request, Promotion $promotion)
    {
        $this->repository->update($request->validated(), $promotion);

        if ($request->hasFile('file')) {
            $this->service->upload($request->name, $request->file('file'), $promotion, true);
        }

        return redirect(route('admin.promotion.index'))->with('success', 'Wpis zaktualizowany');
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

    public function import(){
        $oldSystemData = DB::table('rabaty')->get();

        foreach ($oldSystemData as $oldData) {
            $newArticle = new Promotion();

            $newArticle->name = $oldData->nazwa;
            $newArticle->discount = $oldData->rabat;
            $newArticle->file = $oldData->plik;
            $newArticle->description = $oldData->przed;
            $newArticle->text = $oldData->po;
            $newArticle->active = $oldData->status;

            $newArticle->save();
        }
    }
}
