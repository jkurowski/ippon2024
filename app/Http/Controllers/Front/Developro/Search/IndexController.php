<?php

namespace App\Http\Controllers\Front\Developro\Search;

use App\Http\Controllers\Controller;
use App\Services\PropertyFilterOptions;
use Illuminate\Http\Request;

// CMS
use App\Models\Page;
use App\Models\Property;

class IndexController extends Controller
{
    public function __construct(private PropertyFilterOptions $options)
    {
    }

    /**
     * Wyszukiwarka lokali we wszystkich inwestycjach w sprzedazy.
     *
     * Poprzednia wersja pobierala wszystkie inwestycje z relacja properties
     * i renderowala je jednym ciagiem. Widok siegal potem po $room->floor
     * i $room->investment, wiec kazdy z 547 lokali dokladal dwa zapytania —
     * jedno wejscie na strone kosztowalo ~1100 zapytan i ~1 MB HTML-a.
     * Teraz leci jedno zapytanie po lokalach, z eager loadingiem relacji.
     * Wyniki zostaja na jednej stronie i sa pogrupowane inwestycjami — tak
     * jak dotad; stronicowania nie ma swiadomie.
     */
    public function index(Request $request)
    {
        $page = Page::find(11);
        $investments = $this->options->investments();

        $query = Property::query()
            ->whereIn('investment_id', $investments->pluck('id'))
            ->with(['floor:id,number', 'investment:id,name,slug'])
            ->orderBy('highlighted', 'DESC')
            ->orderBy('number_order', 'ASC');

        if ($slug = $request->input('inwestycja')) {
            $investment = $investments->firstWhere('slug', $slug);
            $query->where('investment_id', $investment?->id ?? 0);
        }

        if ($rooms = $request->input('rooms')) {
            $query->where('rooms', $rooms);
        }

        /* status przychodzi tez jako lista, np. ?status=1,2 z linkow na SG */
        if ($status = $request->input('status')) {
            $query->whereIn('status', array_filter(explode(',', $status), 'strlen'));
        }

        if ($request->filled('floor') || $request->input('floor') === '0') {
            $query->whereHas('floor', fn($q) => $q->where('number', (int) $request->input('floor')));
        }

        /* metraz w formacie "40-60" */
        if ($area = $request->input('area')) {
            [$min, $max] = array_pad(explode('-', $area), 2, null);
            if (is_numeric($min) && is_numeric($max)) {
                $query->whereBetween('area', [(float) $min, (float) $max]);
            }
        }

        $properties = $query->get();

        /* grupujemy w PHP, zeby nie mnozyc zapytan — kolejnosc inwestycji
           bierzemy z listy filtra (alfabetycznie) */
        $grouped = $investments
            ->map(fn($investment) => [
                'investment' => $investment,
                'properties' => $properties->where('investment_id', $investment->id),
            ])
            ->filter(fn($group) => $group['properties']->isNotEmpty())
            ->values();

        return view('front.developro.search.index', array_merge(
            [
                'page' => $page,
                'properties' => $properties,
                'grouped' => $grouped,
            ],
            $this->options->all()
        ));
    }
}
