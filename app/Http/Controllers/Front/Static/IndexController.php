<?php

namespace App\Http\Controllers\Front\Static;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function howbuy()
    {
        $page = Page::find(9);

        /* Pytania i odpowiedzi z modulu FAQ w CMS-ie, w kolejnosci ustawionej
           przeciaganiem wiersza na liscie. Wpisy bez tresci w aktywnym jezyku
           odpadaja tutaj, a nie w widoku: PL i EN to wciaz dwa rozne zestawy
           (7 polskich i 14 angielskich), wiec bez tego na polskiej wersji
           wyskoczyloby 14 pustych belek akordeonu. getTranslation(..., false)
           wylacza fallback na angielski — inaczej "pusty" PL pokazalby EN. */
        $locale = app()->getLocale();

        $faq = Faq::orderBy('sort')->get()
            ->map(fn(Faq $item) => [
                'q' => $item->getTranslation('question', $locale, false),
                'a' => $item->getTranslation('answer', $locale, false),
            ])
            ->filter(fn(array $item) => trim(strip_tags($item['q'])) !== '' && trim(strip_tags($item['a'])) !== '')
            ->values();

        return view('front.static.howbuy', compact('page', 'faq'));
    }
}
