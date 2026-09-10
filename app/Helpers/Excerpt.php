<?php

if (!function_exists('excerpt')) {
    /**
     * Zajawka z pola WYSIWYG na kafel/apla.
     *
     * Samo strip_tags() nie wystarcza: tresci z CMS-u maja w sobie encje
     * (&oacute;, &nbsp;, &amp;), ktore po strip_tags zostaja tekstem, a Blade
     * escapuje je jeszcze raz — na stronie wychodzilo "os&oacute;b aktywnych".
     * Dekodujemy je wiec PRZED przycieciem, zeby i licznik znakow liczyl
     * prawdziwa dlugosc, a nie dlugosc zapisu encji.
     */
    function excerpt(?string $html, int $limit = 140): string
    {
        if (!$html) {
            return '';
        }

        $text = html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = preg_replace('/\s+/u', ' ', str_replace("\xC2\xA0", ' ', $text));

        return \Illuminate\Support\Str::limit(trim($text), $limit);
    }
}
