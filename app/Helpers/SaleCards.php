<?php

if (! function_exists('investmentCardPhoto')) {
    /**
     * Zdjecie kafla inwestycji: miniatura, potem naglowek. Sprawdzamy plik na
     * dysku, bo czesc rekordow z CMS-u nie ma odpowiednikow w lokalnej kopii.
     */
    function investmentCardPhoto($investment): ?string
    {
        foreach ([['investment/thumbs', $investment->file_thumb], ['investment/header', $investment->file_header]] as [$dir, $file]) {
            if ($file && is_file(public_path($dir.'/'.$file))) {
                return asset($dir.'/'.$file);
            }
        }

        return null;
    }
}

if (! function_exists('areaRangeLabel')) {
    /**
     * "35-36, 49-56" (zakresy dla wyszukiwarki) -> "35-56 m2" na kaflu.
     * Zwraca HTML (&sup2;).
     */
    function areaRangeLabel($range): ?string
    {
        preg_match_all('/\d+(?:[.,]\d+)?/', (string) $range, $m);

        if (empty($m[0])) {
            return null;
        }

        $values = array_map(fn ($v) => (float) str_replace(',', '.', $v), $m[0]);
        $min = (int) floor(min($values));
        $max = (int) ceil(max($values));

        return ($min === $max ? $min : $min.'-'.$max).' m&sup2;';
    }
}

if (! function_exists('saleCards')) {
    /**
     * Kafle "Inwestycje w sprzedazy" — jedno zrodlo dla strony glownej
     * i podstrony "Mieszkania w sprzedazy" (klient 15.10.2026: "zrobmy tak,
     * jak zaprojektowaliscie wczesniej na stronie glownej").
     *
     * Kafle z modulu Boksy (admin). Gdy tabela jest pusta, te same kafle
     * buduje ze starych inwestycji. Pole bez tlumaczenia EN spada do PL.
     * `area` to HTML (&sup2;), wiec metraz z boksu jest escapowany juz tutaj.
     */
    function saleCards($boxes, $investments, $cities)
    {
        $lang = app()->getLocale() == 'en' ? 'en' : 'pl';
        $tr   = fn ($m, $f) => $m->getTranslation($f, $lang, false) ?: $m->getTranslation($f, 'pl', false);

        if ($boxes->isNotEmpty()) {
            return $boxes->map(fn ($b) => [
                'photo'            => ($b->file && is_file(public_path('uploads/boxes/'.$b->file))) ? asset('uploads/boxes/'.$b->file) : null,
                'photo_webp'       => ($b->file_webp && is_file(public_path('uploads/boxes/webp/'.$b->file_webp))) ? asset('uploads/boxes/webp/'.$b->file_webp) : null,
                'badge'            => $tr($b, 'badge'),
                'location'         => $tr($b, 'location'),
                'name'             => $tr($b, 'name'),
                'desc'             => $tr($b, 'description'),
                'area'             => $b->area ? e($b->area) : null,
                'handover'         => $tr($b, 'handover'),
                'advantage'        => $tr($b, 'advantage'),
                'link_apartments'  => $tr($b, 'link_apartments'),
                'link_description' => $tr($b, 'link_description'),
            ]);
        }

        return $investments->map(function ($inv) use ($cities) {
            $city = $cities->firstWhere('id', $inv->city);

            return [
                'photo'            => investmentCardPhoto($inv),
                'photo_webp'       => null,
                'badge'            => $inv->card_badge,
                'location'         => $inv->address ?: optional($city)->name,
                'name'             => $inv->name,
                'desc'             => $inv->entry_content ? excerpt($inv->entry_content, 120) : null,
                'area'             => areaRangeLabel($inv->area_range),
                'handover'         => $inv->date_end,
                'advantage'        => $inv->card_param,
                /* Lista mieszkan istnieje tylko w module DeveloPro; opis
                   idzie tam, gdzie wskazuje pole "Adres URL" z CMS-u. */
                'link_apartments'  => $inv->developro ? route('developro.investment.plan', $inv->slug) : null,
                'link_description' => investmentUrl($inv),
            ];
        });
    }
}
