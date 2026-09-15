<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Boxes;
use App\Models\City;
use App\Models\Investment;
use App\Models\News;
use App\Models\RodoSettings;
use Illuminate\Http\Request;

// CMS
use App\Models\Slider;
use App\Models\RodoRules;
use App\Services\PropertyFilterOptions;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    public function index(Request $request, PropertyFilterOptions $filter)
    {
        /* Hero bral wszystkie slajdy, takze oznaczone jako nieaktywne
           (active = 2 to "Nieaktywny" w adminie). */
        $sliders = Slider::where('active', 1)->orderBy('sort')->get();

        $obligation = RodoSettings::find(1);
        $rules = RodoRules::orderBy('sort')->whereStatus(1)->get();
        $popup = 0;

        /* Kafle "Inwestycje w sprzedazy" prowadza do karty inwestycji i do listy
           mieszkan, wiec biora tylko te z wlasna podstrona (developro = 1).
           Odsiewa to przy okazji BOXY, ktore maja na SG osobna sekcje. */
        $investments_current = Investment::whereStatus(1)
            ->where('developro', 1)
            ->orderBy('id')
            ->get();

        /* Kafle "Inwestycje w sprzedazy" ida z modulu Boksy (admin). Dopoki tabela
           jest pusta (np. kod wdrozony przed SQL-em), widok wraca do inwestycji wyzej. */
        $boxes = Boxes::orderBy('sort')->get();

        $investments_soon = Investment::whereStatus(4)->get();
        $investments_planned = Investment::whereStatus(3)->orderBy('id', 'DESC')->get();

        /* Miasto jest w inwestycji obcym kluczem — plakietki na zdjeciach
           biora nazwe stad, zeby nie strzelac zapytaniem w petli widoku. */
        $cities = City::whereIn(
            'id',
            $investments_current->concat($investments_soon)->concat($investments_planned)
                ->pluck('city')->filter()->unique()
        )->get();

        $news = News::where('status', 1)->orderBy('date', 'DESC')->limit(3)->get();

        if(settings()->get("popup_status") == "1") {
            if(settings()->get("popup_mode") == "1") {
                Cookie::queue('popup', null);
                $popup = 1;
            } else {
                if(Cookie::get('popup') == null){
                    $popup = 1;
                    Cookie::queue('popup', true);
                }
            }
        } else {
            Cookie::queue('popup', null);
        }

        /* opcje paska filtrow — te same, co w wyszukiwarce */
        [
            'investments' => $filterInvestments,
            'rooms' => $filterRooms,
            'floors' => $filterFloors,
            'areas' => $filterAreas,
        ] = $filter->all();

        return view('front.homepage.index', compact(
            'rules',
            'obligation',
            'sliders',
            'popup',
            'news',
            'cities',
            'boxes',
            'investments_current',
            'investments_soon',
            'investments_planned',
            'filterInvestments',
            'filterRooms',
            'filterFloors',
            'filterAreas'
        ));
    }
}
