<?php

namespace App\Http\Controllers\Front\Developro\Completed;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Image;
use App\Models\Investment;
use App\Models\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $page = Page::find(10);
        $customOrder = [1, 2, 3, 11, 4];
        $customOrderString = implode(',', $customOrder);

        $investments = Investment::where('status', 2)
            ->with('carousel')
            ->orderByRaw("FIELD(id, $customOrderString)")
            ->get();

        /* Filtr miast budujemy z danych, a nie ze slownika miast: przyciski
           dostaja tylko te miasta, ktore maja zrealizowane inwestycje. Dzis
           wychodzi z tego sam Olsztyn — kolejne miasta dolozą sie same, gdy
           klient oznaczy inwestycje jako zrealizowane. */
        $filterCities = City::whereIn('id', $investments->pluck('city')->filter()->unique())
            ->orderBy('sort', 'ASC')
            ->get();

        $activeCity = $filterCities->firstWhere('slug', $request->query('miasto'));

        if ($activeCity) {
            $investments = $investments->where('city', $activeCity->id);
        }

        return view('front.developro.completed.index', compact(
            'page',
            'investments',
            'filterCities',
            'activeCity'
        ));
    }
}
