<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

// CMS
use App\Models\Slider;
use App\Http\Requests\SliderFormRequest;
use App\Repositories\SliderRepository;
use App\Services\SliderService;

class IndexController extends Controller
{
    private $repository;
    private $service;

    public function __construct(SliderRepository $repository, SliderService $service)
    {
        $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete', [
            'only' => ['index','store']
        ]);
        $this->middleware('permission:slider-create', [
            'only' => ['create','store']
        ]);
        $this->middleware('permission:slider-edit', [
            'only' => ['edit','update']
        ]);
        $this->middleware('permission:slider-delete', [
            'only' => ['destroy']
        ]);

        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.slider.index', ['list' => $this->repository->allSort('ASC')]);
    }

    public function create()
    {
        return view('admin.slider.form', [
            'cardTitle' => 'Dodaj obrazek',
            'backButton' => route('admin.slider.index')
        ])->with('entry', Slider::make());
    }

    public function store(SliderFormRequest $request)
    {
        $slider = $this->repository->create($this->attributes($request));

        if ($request->hasFile('file')) {
            $this->service->upload($request->title, $request->file('file'), $slider);
        }

        if ($request->hasFile('file_mobile')) {
            $this->service->uploadMobile($request->title, $request->file('file_mobile'), $slider);
        }

        return redirect(route('admin.slider.index'))->with('success', 'Nowy obrazek dodany');
    }

    public function edit(int $id)
    {
        return view('admin.slider.form', [
            'entry' => $this->repository->find($id),
            'cardTitle' => 'Edytuj obrazek',
            'backButton' => route('admin.slider.index')
        ]);
    }

    public function update(SliderFormRequest $request, Slider $slider)
    {
        $this->repository->update($this->attributes($request), $slider);

        if ($request->hasFile('file')) {
            $this->service->upload($request->title, $request->file('file'), $slider, true);
        }

        if ($request->hasFile('file_mobile')) {
            $this->service->uploadMobile($request->title, $request->file('file_mobile'), $slider, true);
        }

        return redirect(route('admin.slider.index'))->with('success', 'Obrazek zaktualizowany');
    }

    public function destroy(int $id)
    {
        /* Najpierw pliki, potem rekord — po delete() nie ma juz z czego odczytac
           nazw, a bez tego cala seria rozmiarow zostawala na dysku. */
        $this->service->deleteFiles($this->repository->find($id));
        $this->repository->delete($id);

        return response()->json('Deleted');
    }

    public function sort(Request $request)
    {
        $this->repository->updateOrder($request->get('recordsArray'));
    }

    /** Pliki maja wlasne reguly walidacji, ale do mass-assignmentu isc nie moga —
     *  w kolumnach `file`/`file_mobile` ladowalby obiekt UploadedFile zamiast nazwy. */
    private function attributes(SliderFormRequest $request): array
    {
        return Arr::except($request->validated(), ['file', 'file_mobile']);
    }
}
