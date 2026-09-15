<?php

namespace App\Http\Controllers\Admin\Box;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

// CMS
use App\Models\Boxes;
use App\Http\Requests\BoxFormRequest;
use App\Repositories\BoxRepository;
use App\Services\BoxService;

/**
 * Boksy = kafle "Inwestycje w sprzedazy" na stronie glownej.
 * Tlumaczenie EN jak w obiektach komercyjnych: edycja z ?lang=en.
 */
class IndexController extends Controller
{
    private $repository;
    private $service;

    public function __construct(BoxRepository $repository, BoxService $service)
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

    public function index()
    {
        return view('admin.box.index', ['list' => $this->repository->allSort('ASC')]);
    }

    public function create()
    {
        return view('admin.box.form', [
            'cardTitle' => 'Dodaj boks',
            'backButton' => route('admin.box.index')
        ])->with('entry', Boxes::make());
    }

    public function store(BoxFormRequest $request)
    {
        $entry = $this->repository->create($this->attributes($request));

        if ($request->hasFile('file')) {
            $this->service->upload($request->get('name', ''), $request->file('file'), $entry);
        }

        return redirect(route('admin.box.index'))->with('success', 'Nowy boks dodany');
    }

    public function edit(int $id)
    {
        if (request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        return view('admin.box.form', [
            'entry' => $this->repository->find($id),
            'cardTitle' => 'Edytuj boks',
            'backButton' => route('admin.box.index')
        ]);
    }

    public function update(BoxFormRequest $request, int $id)
    {
        if ($request->get('lang')) {
            app()->setLocale($request->get('lang'));
        }

        $box = $this->repository->find($id);
        $this->repository->update($this->attributes($request), $box);

        if ($request->hasFile('file')) {
            $this->service->upload($box->getTranslation('name', 'pl', false), $request->file('file'), $box, true);
        }

        return redirect(route('admin.box.index'))->with('success', 'Boks zaktualizowany');
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

    /** Plik idzie osobno przez BoxService — w kolumnie `file` ma wyladowac nazwa,
     *  nie obiekt UploadedFile. */
    private function attributes(BoxFormRequest $request): array
    {
        return Arr::except($request->validated(), ['file']);
    }
}
