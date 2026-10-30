{{-- ==========================================================================
     Galeria na caly ekran — wzor: "Sprawdz inwestycje planowane" z paczki Marka
     (public/materialy_klienta/2026-10/marek-new-page-2.html). Klient 10.2026:
     "duza wizualizacja na caly ekran bez dodatkowych paskow lub tabel",
     "duze zdjecie i wysuwany tekst".

     Naglowek sekcji lezy na zdjeciu (gora), opis slajdu na dole. Kazdy slajd
     ma wlasny opis w HTML-u (prawdziwe linki, bez podmiany tekstu w JS) —
     widoczny jest tylko aktywny, wjezdza od dolu przy zmianie.
     Przelaczanie, autoplay, klawiatura i swipe: public/js/ip-motion.js.

     Parametry:
       $id        id sekcji (kotwica)
       $eyebrow   maly napis nad tytulem (opcjonalny)
       $title     tytul sekcji (opcjonalny — bez niego sam slajd)
       $more      ['url' => ..., 'label' => ...] link "Wszystkie ..." (opcjonalny)
       $items     tablica slajdow:
                    picture  tablica z investmentLargeImage() albo null
                    photo    zwykly URL zdjecia (gdy brak picture)
                    alt, eyebrow, title, desc, url, ext (link zewnetrzny)
       $interval  ms miedzy slajdami (domyslnie 7000)
       $class     dodatkowa klasa sekcji
     ========================================================================== --}}
@php
    $items    = array_values($items ?? []);
    $count    = count($items);
    $interval = $interval ?? 7000;
    $L        = in_array(app()->getLocale(), ['pl', 'en']) ? app()->getLocale() : 'pl';
    $pad      = fn ($n) => str_pad($n, 2, '0', STR_PAD_LEFT);
@endphp

@if($count > 0)
<section class="ip-gallery {{ $class ?? '' }}" id="{{ $id }}"
         data-ip-gallery data-interval="{{ $interval }}"
         aria-roledescription="{{ $L == 'pl' ? 'karuzela' : 'carousel' }}"
         @if(!empty($title)) aria-label="{{ strip_tags($title) }}" @endif>

    <div class="ip-gallery-media">
        @foreach ($items as $i => $item)
            <div class="ip-gallery-img @if($i === 0) is-active @endif" data-ip-gallery-slide>
                @if(!empty($item['picture']))
                    @include('front.developro.partials.large-picture', ['img' => $item['picture'], 'alt' => $item['alt'] ?? $item['title'], 'lazy' => $i > 0])
                @elseif(!empty($item['photo']))
                    <img src="{{ $item['photo'] }}" alt="{{ $item['alt'] ?? $item['title'] }}" @if($i > 0) loading="lazy" @endif decoding="async">
                @endif
            </div>
        @endforeach
    </div>

    <div class="ip-gallery-inner container">
        @if(!empty($title))
            <div class="ip-gallery-head" data-nh-reveal>
                <div>
                    @if(!empty($eyebrow))
                        <p class="ip-gallery-eyebrow">{{ $eyebrow }}</p>
                    @endif
                    <h2 class="ip-gallery-title">{!! $title !!}</h2>
                </div>

                @if(!empty($more['url']))
                    <a href="{{ $more['url'] }}" class="ip-gallery-more">
                        {{ $more['label'] }}
                        <svg viewBox="0 0 14 14" aria-hidden="true"><path d="M2 12 12 2M4 2h8v8"/></svg>
                    </a>
                @endif
            </div>
        @endif

        <div class="ip-gallery-foot">
            <div class="ip-gallery-captions">
                @foreach ($items as $i => $item)
                    <div class="ip-gallery-cap @if($i === 0) is-active @endif" data-ip-gallery-cap
                         @if($i !== 0) aria-hidden="true" inert @endif>
                        <div class="ip-gallery-cap-name">
                            @if(!empty($item['eyebrow']))
                                <p class="ip-gallery-cap-eyebrow">{{ $item['eyebrow'] }}</p>
                            @endif
                            <h3 class="ip-gallery-cap-title">{{ $item['title'] }}</h3>
                        </div>

                        @if(!empty($item['desc']))
                            <p class="ip-gallery-cap-desc">{{ $item['desc'] }}</p>
                        @endif

                        @if(!empty($item['url']))
                            <a href="{{ $item['url'] }}" class="ip-gallery-btn"
                               @if(!empty($item['ext'])) target="_blank" rel="noopener" @endif>
                                {{ $L == 'pl' ? 'Zobacz więcej' : 'See more' }}
                                <svg viewBox="0 0 14 14" aria-hidden="true"><path d="M2 12 12 2M4 2h8v8"/></svg>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>

            @if($count > 1)
                <div class="ip-gallery-controls">
                    <button type="button" data-ip-gallery-prev aria-label="{{ $L == 'pl' ? 'Poprzedni slajd' : 'Previous slide' }}">
                        <svg viewBox="0 0 18 15" aria-hidden="true"><polyline points="7,1 1,7.5 7,14"/><line x1="1" y1="7.5" x2="17" y2="7.5"/></svg>
                    </button>
                    <span class="ip-gallery-count" aria-live="polite" aria-atomic="true">
                        <b data-ip-gallery-current>01</b> / {{ $pad($count) }}
                    </span>
                    <button type="button" data-ip-gallery-next aria-label="{{ $L == 'pl' ? 'Następny slajd' : 'Next slide' }}">
                        <svg viewBox="0 0 18 15" aria-hidden="true"><polyline points="11,1 17,7.5 11,14"/><line x1="1" y1="7.5" x2="17" y2="7.5"/></svg>
                    </button>
                </div>
            @endif
        </div>
    </div>

    @if($count > 1)
        {{-- czas do nastepnego slajdu, ten sam motyw co w hero --}}
        <span class="ip-gallery-progress" style="--ip-interval: {{ $interval }}ms" aria-hidden="true"><span data-ip-gallery-progress></span></span>
    @endif
</section>
@endif
