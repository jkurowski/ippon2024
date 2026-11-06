<?php
if (! function_exists('parse_text')) {
    function parse_text($string)
    {
        $output = preg_replace_callback('/\[galeria=(.*)](.*)\[\/galeria\]/', 'makeGallery', $string);
        return str_replace(
            array("</div>\n</p>","<p><div"),
            array("</div>", "<div"),
            $output
        );
    }
}
if (! function_exists('makeGallery')) {
    function makeGallery($input)
    {
        $photos = \App\Models\Image::all()->sortBy("sort")->where('gallery_id', $input[2]);

        if ($input[1] == 'gallery') {
            return view('front.parse.gallery', ['list' => $photos])->render();
        }

        if ($input[1] == 'slider') {
            return view('front.parse.slider', ['list' => $photos])->render();
        }

        if ($input[1] == 'commercial') {
            return view('front.parse.commercial', ['list' => $photos])->render();
        }

        if ($input[1] == 'carousel') {
            return view('front.parse.slick-carousel', ['list' => $photos])->render();
        }
    }
}

if (! function_exists('extract_gallery')) {
    /**
     * Wycina z tresci CMS-u pierwsza galerie ([galeria=slider]N[/galeria], tez
     * carousel/gallery) i zwraca [tresc bez galerii, zdjecia galerii].
     * Widok pokazuje wtedy zdjecia osobno, karuzela po 3 na cala szerokosc
     * (layouts.partials.ip-photo-carousel) - uwagi klienta z 5 i 6.11.2026.
     */
    function extract_gallery(?string $text): array
    {
        $text = (string) $text;

        if (! preg_match('/\[galeria=(?:slider|carousel|gallery)\](\d+)\[\/galeria\]/', $text, $m)) {
            return [$text, collect()];
        }

        $photos = \App\Models\Image::where('gallery_id', (int) $m[1])->orderBy('sort')->get();

        return [str_replace($m[0], '', $text), $photos];
    }
}
