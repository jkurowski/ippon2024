{{-- Inwestycje jako duze zdjecia z wysuwanym opisem (layouts/partials/ip-feature).
     Planowane i Juz wkrotce — uwagi klienta z 15.10.2026, wzor z paczki Marka.
     Zastepuje tam naprzemienne wiersze .ip-invrows (partials/investment-rows).
     Parametry:
       $investments
       $status — napis w rogu zdjecia ("W przygotowaniu", "Juz wkrotce") --}}
@php
    /* Zdjecie: "Duza miniatura" z CMS-u (WebP + wersja na telefon), bez niej
       naglowek inwestycji (wiekszy niz miniatura), na koncu miniatura. */
    $ipFeaturePhoto = function ($inv) {
        foreach ([['investment/header', $inv->file_header], ['investment/thumbs', $inv->file_thumb]] as [$dir, $file]) {
            if ($file && is_file(public_path($dir.'/'.$file))) {
                return asset($dir.'/'.$file);
            }
        }
        return null;
    };
@endphp

<section class="ip-features-section">
    <div class="ip-features">
        @foreach($investments as $inv)
            @php
                $tr   = fn ($f) => $inv->getTranslation($f, $current_locale, false) ?: $inv->getTranslation($f, 'pl', false);
                $city = $cities->firstWhere('id', $inv->city);
                $url  = investmentUrl($inv);
                $addr = $inv->address && optional($city)->name && str_contains($inv->address, $city->name)
                            ? $inv->address
                            : trim(optional($city)->name.($inv->address ? ' · '.$inv->address : ''), ' ·');

                /* haslo z CMS-u ("Juz wkrotce: tytul") bywa wpisane wersalikami —
                   pod nazwa idzie jako zwykle zdanie */
                $teaser = $tr('soon_title');
                if ($teaser && mb_strtoupper($teaser) === $teaser) {
                    $teaser = mb_strtoupper(mb_substr($teaser, 0, 1)).mb_strtolower(mb_substr($teaser, 1));
                }
            @endphp

            @include('layouts.partials.ip-feature', [
                'photos'  => [[
                    'picture' => investmentLargeImage($inv, 'list') ?: investmentLargeImage($inv, 'slide'),
                    'photo'   => $ipFeaturePhoto($inv),
                    'alt'     => $inv->name,
                ]],
                'status'  => $status ?? null,
                'eyebrow' => $addr,
                'title'   => $inv->name,
                'teaser'  => $teaser,
                'desc'    => $inv->entry_content,
                'url'     => $url,
                'ext'     => $url ? investmentUrlExternal($url) : false,
                'first'   => $loop->first,
            ])
        @endforeach
    </div>
</section>
