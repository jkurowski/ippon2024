<?php

use Illuminate\Support\Facades\Cache;
use Intervention\Image\ImageManagerStatic as Image;

if (! function_exists('isLightImage')) {
    /**
     * Czy zdjecie jest jasne w miejscu, gdzie lezy tekst (srodek kadru).
     *
     * Naglowki podstron (.ip-pagehead) maja bialy tytul na ciemnym zdjeciu.
     * Klient przyslal 2.11.2026 jasne tla (cegla z bluszczem, kremowe kwiaty,
     * jasny korytarz) - na nich bialy tekst znika, wiec naglowek przelacza sie
     * na ciemny tekst (.is-light). Decyzja z pliku, nie z CMS-u: wystarczy
     * wgrac zdjecie w Admin > Strony, nic nie trzeba zaznaczac.
     *
     * Mierzymy srodkowy pas (40% wysokosci, 70% szerokosci) na miniaturze
     * 48 px - tam stoi tytul. Wynik w cache po sciezce i dacie pliku, wiec
     * podmiana zdjecia liczy sie od nowa, a kazde wejscie na strone nie
     * otwiera pliku 3600 px.
     *
     * @param string|null $url adres z asset() albo sciezka wzgledem public/
     */
    function isLightImage(?string $url, float $threshold = 0.62): bool
    {
        if (! $url) {
            return false;
        }

        $path = public_path(ltrim(rawurldecode(parse_url($url, PHP_URL_PATH) ?? ''), '/'));

        if (! is_file($path)) {
            return false;
        }

        return Cache::rememberForever('is-light:' . md5($path . filemtime($path) . $threshold), function () use ($path, $threshold) {
            try {
                $img = Image::make($path)->resize(48, null, fn ($c) => $c->aspectRatio());
            } catch (\Throwable $e) {
                return false;
            }

            $w = $img->width();
            $h = $img->height();
            $sum = 0;
            $n = 0;

            for ($y = (int) ($h * .3); $y < (int) ($h * .7); $y++) {
                for ($x = (int) ($w * .15); $x < (int) ($w * .85); $x++) {
                    [$r, $g, $b] = $img->pickColor($x, $y);
                    $sum += (0.2126 * $r + 0.7152 * $g + 0.0722 * $b) / 255;
                    $n++;
                }
            }

            return $n && ($sum / $n) >= $threshold;
        });
    }
}
