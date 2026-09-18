<?php

if (!function_exists('investmentLargeImage')) {
    /**
     * Zdjecie inwestycji wgrane pod konkretne miejsce na froncie, razem z WebP
     * i wersja na telefon — do <picture> z front/developro/partials/large-picture.
     *
     *   'list'  — "Duza miniatura na listach" (+ automatyczna wersja mobile/)
     *   'slide' — "Karuzela" (+ osobno wgrywane "Karuzela – telefon")
     *
     * Zwraca null, gdy pole jest puste albo pliku brak na dysku — wtedy front
     * bierze naglowek / miniature jak wczesniej.
     */
    function investmentLargeImage($investment, string $slot): ?array
    {
        [$dir, $file, $mobileDir, $mobileFile] = match ($slot) {
            'list'  => ['list', $investment->file_list_thumb, 'list/mobile', $investment->file_list_thumb],
            'slide' => ['slide', $investment->file_slide, 'slide/mobile', $investment->file_slide_mobile],
        };

        $url = function (string $dir, ?string $file, bool $webp = false) {
            if (!$file) {
                return null;
            }
            $path = $webp
                ? 'investment/'.$dir.'/webp/'.pathinfo($file, PATHINFO_FILENAME).'.webp'
                : 'investment/'.$dir.'/'.$file;

            return is_file(public_path($path)) ? asset($path) : null;
        };

        $src = $url($dir, $file);
        if (!$src) {
            return null;
        }

        return [
            'src'         => $src,
            'webp'        => $url($dir, $file, true),
            'mobile'      => $url($mobileDir, $mobileFile),
            'mobile_webp' => $url($mobileDir, $mobileFile, true),
        ];
    }
}
