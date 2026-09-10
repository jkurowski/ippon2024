{{-- Slajd hero w calej serii rozmiarow (SliderService).

     Progi media pokrywaja sie z ippon.less: ponizej 768px hero jest 4/5 i leci
     kadr pionowy, ponizej 1200px jest 16/9, wyzej proporcja 1920/781.
     <picture> bierze PIERWSZY pasujacy <source>, wiec kolejnosc idzie od
     najwezszego progu.

     Slajdy wgrane przed wprowadzeniem serii maja tylko uploads/slider/<plik> —
     kazdy tier sprawdza wiec, czy plik istnieje, a gdy nie ma zadnego,
     zostaje samo <img> ze starej sciezki.

     Parametry: $slider (model Slider), $eager (true dla pierwszego slajdu) --}}
@php
    $eager = $eager ?? false;

    $webpName = fn ($file) => pathinfo($file, PATHINFO_FILENAME) . '.webp';

    /* Zwraca [jpg, webp] dla katalogu, albo null gdy kadru nie ma na dysku. */
    $tier = function ($dir, $file) use ($webpName) {
        if (!$file || !is_file(public_path($dir . $file))) {
            return null;
        }

        $webp = $dir . $webpName($file);

        return [
            'src' => asset($dir . $file),
            'webp' => is_file(public_path($webp)) ? asset($webp) : null,
        ];
    };

    $sources = array_filter([
        ['media' => '(max-width: 767.98px)',  'tier' => $tier('uploads/slider/mobile/', $slider->file_mobile)],
        ['media' => '(max-width: 1199.98px)', 'tier' => $tier('uploads/slider/1024/', $slider->file)],
        ['media' => '(max-width: 1600px)',    'tier' => $tier('uploads/slider/1440/', $slider->file)],
        ['media' => null,                     'tier' => $tier('uploads/slider/1920/', $slider->file)],
    ], fn ($row) => $row['tier'] !== null);

    /* Fallback dla <img>: najwiekszy kadr z serii, a w ostatecznosci stary plik. */
    $fallback = $tier('uploads/slider/1920/', $slider->file)
        ?? $tier('uploads/slider/', $slider->file);
@endphp

@if($fallback)
    <picture>
        @foreach($sources as $row)
            @if($row['tier']['webp'])
                <source type="image/webp" srcset="{{ $row['tier']['webp'] }}" @if($row['media']) media="{{ $row['media'] }}" @endif>
            @endif
            <source type="image/jpeg" srcset="{{ $row['tier']['src'] }}" @if($row['media']) media="{{ $row['media'] }}" @endif>
        @endforeach

        {{-- Zaden slajd nie moze byc loading="lazy": nieaktywny <li> karuzeli
             jest poza ekranem, wiec przegladarka nie zaczyna go pobierac i po
             przewinieciu hero pokazuje czarne tlo zamiast zdjecia. Kolejnosc
             zalatwia fetchpriority — pierwszy kadr to LCP, reszta dociaga sie
             w tle, nie konkurujac z nim o pasmo. --}}
        <img src="{{ $fallback['src'] }}"
             alt="{{ $slider->file_alt ?: $slider->title }}"
             width="{{ config('images.slider.big_width') }}"
             height="{{ config('images.slider.big_height') }}"
             fetchpriority="{{ $eager ? 'high' : 'low' }}"
             decoding="async">
    </picture>
@endif
