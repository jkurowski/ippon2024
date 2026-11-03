<?php

if (! function_exists('noOrphans')) {
    /**
     * Sierotki: krotkie slowo na koncu linii ("i", "w", "przy") spina z nastepnym
     * twarda spacja, zeby przeszlo do nowej linii razem z nim.
     *
     * Uwaga klienta 2.11.2026 (opis planowanych na SG: "przy" i "i" wisialy na
     * koncu linii). Dziala na zwyklym tekscie i na HTML z CMS-u - zmienia tylko
     * tekst miedzy znacznikami, atrybutow nie dotyka.
     *
     * Zwraca HTML: w Blade {!! noOrphans($tekst) !!}. Zwykly tekst jest przy
     * tym escapowany, wiec mozna go podac wprost z pola CMS.
     *
     * @param bool $isHtml true, gdy $text to juz HTML (np. tresc z edytora)
     */
    function noOrphans(?string $text, bool $isHtml = false): string
    {
        if ($text === null || $text === '') {
            return '';
        }

        if (! $isHtml) {
            $text = e($text);
        }

        // 1-2 litery (a, i, o, u, w, z, do, na, od, po, ze, we...) + najczestsze
        // dluzsze przyimki i spojniki, ktore tez zle wygladaja na koncu linii
        $short = '[\p{L}]{1,2}|przy|przez|pod|nad|dla|bez|oraz|lub|czy|jak|nie|the|and|for|with';

        $parts = preg_split('/(<[^>]*>)/u', $text, -1, PREG_SPLIT_DELIM_CAPTURE);

        foreach ($parts as $i => $part) {
            if ($part === '' || $part[0] === '<') {
                continue;
            }

            // (?<![\p{L}\d]) - poczatek slowa; powtorka, bo dwa krotkie slowa
            // pod rzad ("i w") lapia sie dopiero w drugim przebiegu
            for ($pass = 0; $pass < 2; $pass++) {
                $part = preg_replace('/(?<![\p{L}\d&;])(' . $short . ') +(?=\S)/iu', '$1&nbsp;', $part);
            }

            $parts[$i] = $part;
        }

        return implode('', $parts);
    }
}
