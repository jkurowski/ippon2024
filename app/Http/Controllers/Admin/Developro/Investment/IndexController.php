<?php

namespace App\Http\Controllers\Admin\Developro\Investment;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvestmentFormRequest;
use App\Models\City;
use App\Models\Gallery;
use App\Models\Investment;
use App\Repositories\InvestmentRepository;
use App\Services\InvestmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// CMS

class IndexController extends Controller
{
    private InvestmentRepository $repository;
    private InvestmentService $service;

    public function __construct(InvestmentRepository $repository, InvestmentService $service)
    {
//        $this->middleware('permission:investment-list|investment-create|investment-edit|investment-delete', [
//            'only' => ['index','store']
//        ]);
//        $this->middleware('permission:investment-create', [
//            'only' => ['create','store']
//        ]);
//        $this->middleware('permission:investment-edit', [
//            'only' => ['edit','update']
//        ]);
//        $this->middleware('permission:investment-delete', [
//            'only' => ['destroy']
//        ]);

        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.developro.investment.index', ['list' => $this->repository->all()]);
    }

    public function create()
    {
        return view('admin.developro.investment.form', [
            'citiesMenu' => City::pluck('name', 'id'),
            'galleryList' => Gallery::pluck('name', 'id')->prepend('Brak', 0),
            'cardTitle' => 'Dodaj inwestycje',
            'backButton' => route('admin.developro.investment.index')
        ])->with('entry', Investment::make());
    }

    public function store(InvestmentFormRequest $request)
    {
        $investment = $this->repository->create($request->validated());

        if ($request->hasFile('file')) {
            $this->service->uploadThumb($request->name, $request->file('file'), $investment);
        }

        if ($request->hasFile('logo')) {
            $this->service->uploadLogo($request->name, $request->file('logo'), $investment);
        }

        if ($request->hasFile('header')) {
            $this->service->uploadHeader($request->name, $request->file('header'), $investment);
        }

        return redirect(route('admin.developro.investment.index'))->with('success', 'Inwestycja zapisana');
    }

    public function edit(int $id)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        return view('admin.developro.investment.form', [
            'entry' => $this->repository->find($id),
            'citiesMenu' => City::pluck('name', 'id'),
            'galleryList' => Gallery::pluck('name', 'id')->prepend('Brak', 0),
            'cardTitle' => 'Edytuj inwestycję',
            'backButton' => route('admin.developro.investment.index')
        ]);
    }

    public function update(InvestmentFormRequest $request, int $id)
    {
        if(request()->get('lang')) {
            app()->setLocale(request()->get('lang'));
        }

        $investment = $this->repository->find($id);
        $this->repository->update($request->validated(), $investment);

        if ($request->hasFile('file')) {
            $this->service->uploadThumb($request->name, $request->file('file'), $investment, true);
        }

        if ($request->hasFile('logo')) {
            $this->service->uploadLogo($request->name, $request->file('logo'), $investment, true);
        }

        if ($request->hasFile('header')) {
            $this->service->uploadHeader($request->name, $request->file('header'), $investment, true);
        }

        return redirect(route('admin.developro.investment.index'))->with('success', 'Inwestycja zaktualizowana');
    }

    public function log(Investment $investment){
        return view('admin.developro.investment.log', ['investment' => $investment]);
    }
    public function events(Investment $investment){
        return view('admin.developro.investment.events', ['investment' => $investment]);
    }
    public function eventtable(Investment $investment, Request $request)
    {
        return $this->repository->getEventsAsTable($investment, $request);
    }
    public function datatable(Investment $investment, Request $request)
    {
        return $this->repository->getDataTable($investment, $request->input('minDate'), $request->input('maxDate'));
    }
    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json(['status' => 'deleted'], 201);
    }

    function isFileUploadAllowed() {
        // Check if file uploads are allowed by checking the value of 'file_uploads' directive
        $fileUploadsEnabled = ini_get('file_uploads');

        // Check if both 'upload_max_filesize' and 'post_max_size' directives allow file uploads
        $uploadMaxFilesize = ini_get('upload_max_filesize');
        $postMaxSize = ini_get('post_max_size');
        $uploadMaxFilesizeBytes = $this->return_bytes($uploadMaxFilesize);
        $postMaxSizeBytes = $this->return_bytes($postMaxSize);
        $maxUploadSize = min($uploadMaxFilesizeBytes, $postMaxSizeBytes);

        return [
            'file_uploads_enabled' => $fileUploadsEnabled,
            'max_upload_size' => $maxUploadSize
        ];
    }

// Helper function to convert ini sizes to bytes
    function return_bytes($val) {
        $val = trim($val);
        $last = strtolower($val[strlen($val)-1]);
        $val = (int)$val; // Cast the value to integer
        switch($last) {
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }
        return $val;
    }

    public function test(){
        $uploadStatus = $this->isFileUploadAllowed();
        if ($uploadStatus['file_uploads_enabled']) {
            echo "File uploads are allowed. Maximum upload size: " . $uploadStatus['max_upload_size'] . " bytes";
        } else {
            echo "File uploads are not allowed on this server.";
        }
    }

    public function translate(){
        $defaultLocale = 'pl';

        $news = DB::table('investments')->get();

        foreach ($news as $n) {
            $existing = Investment::find($n->id);

            // If the entry exists, update its attributes
            if ($existing) {

                // Existing data
                $existing->fill([
                    'type' => $n->type,
                    'status' => $n->status,
                    'address' => $n->address,
                    'marker' => $n->marker,
                    'city' => $n->city,
                    'lat' => $n->lat,
                    'lng' => $n->lng,
                    'zoom' => $n->zoom,
                    'date_start' => $n->date_start,
                    'date_end' => $n->date_end,
                    'areas_amount' => $n->areas_amount,
                    'area_range' => $n->area_range,
                    'office_address' => $n->office_address,
                    'contact_form' => $n->contact_form,
                    'contact_form_text' => $n->contact_form_text,
                    'file_thumb' => $n->file_thumb,
                    'file_header' => $n->file_header,
                    'file_logo' => $n->file_logo,
                    'carousel_id' => $n->carousel_id,
                    'developro' => $n->developro,
                    'meta_robots' => $n->meta_robots,
                    'created_at' => $n->created_at,
                    'updated_at' => $n->updated_at
                ]); //23

                // Update translations for translatable attributes
                $existing->setTranslation('name', $defaultLocale, $n->name);
                $existing->setTranslation('entry_content', $defaultLocale, $n->entry_content);
                $existing->setTranslation('content', $defaultLocale, $n->content);
                $existing->setTranslation('end_content', $defaultLocale, $n->end_content);
                $existing->setTranslation('meta_title', $defaultLocale, $n->meta_title);
                $existing->setTranslation('meta_description', $defaultLocale, $n->meta_description);
                // 6

                // Save
                $existing->save();
            }
        }

        return redirect(route('admin.developro.investment.index'))->with('success', 'Wpisy przetłumaczone');
    }
}
