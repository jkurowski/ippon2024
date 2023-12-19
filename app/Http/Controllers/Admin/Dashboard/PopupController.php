<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Spatie\Valuestore\Valuestore;

use App\Http\Requests\PopupExitFormRequest;
use App\Http\Requests\PopupFormRequest;

class PopupController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.popup.index');
    }

    public function store(PopupFormRequest $request)
    {
        $settings = Valuestore::make(storage_path('app/settings.json'));
        $settings->put($request->except(['_token', 'submit']));

        return redirect(route('admin.dashboard.popup.index'))->with('success', 'Ustawienia zostały zapisane');
    }

    public function update (PopupExitFormRequest $request)
    {
        $settings = Valuestore::make(storage_path('app/settings.json'));
        $settings->put($request->except(['_token', 'submit']));

        return redirect(route('admin.dashboard.popup.show', ['popup' => 'exit']))->with('success', 'Ustawienia zostały zapisane');
    }

    public function show()
    {
        return view('admin.dashboard.popup.exit');
    }
}
