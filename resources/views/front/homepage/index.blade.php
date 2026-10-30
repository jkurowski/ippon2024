@extends('layouts.homepage', ['body_class' => 'homepage ip-page ip-nh'])

{{-- ==========================================================================
     STRONA GLOWNA — od 10.2026 wersja z /new-homepage (wybrana przez Zarzad,
     mail z 8.10.2026), poprzednia SG jest w historii gita.
     Zrodla: public/materialy_klienta/2026-10/ (maile 8.10 i 15.10, paczka
     Marka = "new-page-2"), wczesniej poprawki-1.odt i poprawki-2.odt.

     Zmiany z 10.2026:
       - mniejsza miniatura nastepnego slajdu w hero,
       - "Juz wkrotce" i "Planowane" jako galeria na caly ekran wg paczki
         Marka (layouts/partials/ip-gallery),
       - aktualnosci w stylu kafli "Dlaczego warto nam zaufac".
     Z 09.2026: naglowek mleczny i przezroczysty, hero na caly ekran z haslem,
     "Inwestycje w sprzedazy" po 2 duze zdjecia z wysuwanym opisem, film o
     firmie, zlote ramki w kaflach zaufania, karuzela aktualnosci.
     Ruch: public/js/ip-motion.js (bez bibliotek).
     ========================================================================== --}}

@section('content')

{{-- Klasa nh-motion wlacza stany poczatkowe animacji. Stawiana przez JS, wiec
     bez JS (albo przy "ogranicz ruch" w systemie) tresc jest widoczna od razu. --}}
<script>
    if (!window.matchMedia || !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.documentElement.classList.add('nh-motion');
    }
</script>

@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    $T = [
        'hero_eyebrow' => ['pl' => 'Olsztyn · Warszawa · Gdańsk', 'en' => 'Olsztyn · Warsaw · Gdańsk'],
        'hero_title_1' => ['pl' => 'Czas buduje',                 'en' => 'Time builds'],
        'hero_title_2' => ['pl' => 'wartość.',                    'en' => 'value.'],
        'hero_cta'     => ['pl' => 'Poznaj inwestycje',           'en' => 'Explore developments'],
        'hero_scroll'  => ['pl' => 'Przewiń',                     'en' => 'Scroll'],
        'film'         => ['pl' => 'Odtwórz film o Ippon Group',  'en' => 'Play the Ippon Group film'],
    ];

    /* Hero z CMS-u (Admin > Slider), tak jak na obecnej stronie glownej. */
    $heroSlides = $sliders
        ->filter(fn ($s) => $s->file && is_file(public_path('uploads/slider/'.$s->file)))
        ->map(function ($s) {
            $thumb = 'uploads/slider/thumbs/'.$s->file;

            return [
                'slider' => $s,
                'thumb'  => asset(is_file(public_path($thumb)) ? $thumb : 'uploads/slider/'.$s->file),
                'link'   => $s->link,
                'target' => $s->link_target ?: '_self',
            ];
        })
        ->values()
        ->all();

    if (!$heroSlides) {
        /* UWAGA: placeholder — zdjecia z makiety, widoczne tylko gdy slider w CMS
           jest pusty. */
        $heroSlides = array_map(fn ($n) => [
            'slider' => null,
            'img'    => asset('images/homepage/hero-'.$n.'.jpg'),
            'thumb'  => asset('images/homepage/hero-thumb-'.$n.'.jpg'),
            'link'   => null,
            'target' => '_self',
        ], [1, 2, 3]);
    }

    $heroInterval = 6500;
@endphp

{{-- Hero — na desktopie caly ekran, naglowek lezy na zdjeciu.
     Haslo "Czas buduje wartosc." to tagline marki (bylo pod logo w starym
     naglowku). UWAGA: jesli klient wgra do slidera grafike z wpalonym tekstem
     (np. promocje), haslo moze sie z nim gryzc — wtedy do ustalenia. --}}
<section class="ip-hero ip-nh-hero">
    <div id="ipHero" class="carousel slide carousel-fade" data-bs-ride="carousel"
         data-bs-interval="{{ $heroInterval }}" data-bs-pause="false">
        <div class="carousel-inner">
            @foreach ($heroSlides as $i => $slide)
                <div class="carousel-item @if($i === 0) active @endif" data-thumb="{{ $slide['thumb'] }}">
                    @if($slide['link'])
                        <a href="{{ $slide['link'] }}" target="{{ $slide['target'] }}">
                    @endif

                    @if($slide['slider'])
                        <x-slider-picture :slider="$slide['slider']" :eager="$i === 0" />
                    @else
                        <img src="{{ $slide['img'] }}" alt="Inwestycja IPPON Group"
                             fetchpriority="{{ $i === 0 ? 'high' : 'low' }}" decoding="async">
                    @endif

                    @if($slide['link'])
                        </a>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="ip-nh-hero-caption">
            <div class="container">
                <p class="ip-nh-eyebrow ip-nh-hero-in" style="--nh-d: 0">{{ $T['hero_eyebrow'][$L] }}</p>
                <h1 class="ip-nh-hero-title">
                    <span class="ip-nh-line"><span style="--nh-d: 1">{{ $T['hero_title_1'][$L] }}</span></span>
                    <span class="ip-nh-line"><span style="--nh-d: 2"><em>{{ $T['hero_title_2'][$L] }}</em></span></span>
                </h1>
                <div class="ip-nh-hero-actions ip-nh-hero-in" style="--nh-d: 3">
                    <a href="#nh-sale" class="ip-btn-gold-lg ip-nh-btn-arrow">
                        <span>{{ $T['hero_cta'][$L] }}</span>
                        <svg viewBox="0 0 18 15" aria-hidden="true"><polyline points="11,1 17,7.5 11,14"/><line x1="1" y1="7.5" x2="17" y2="7.5"/></svg>
                    </a>

                    @if(count($heroSlides) > 1)
                        <span class="ip-nh-count" aria-hidden="true">
                            <b data-nh-hero-current>01</b> / {{ str_pad(count($heroSlides), 2, '0', STR_PAD_LEFT) }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        @if(count($heroSlides) > 1)
            <button type="button" class="ip-hero-next" data-bs-target="#ipHero" data-bs-slide="next" aria-label="{{ $L == 'pl' ? 'Następna inwestycja' : 'Next development' }}">
                <img data-ip-thumb src="{{ $heroSlides[1]['thumb'] }}" alt="">
                <svg class="ip-hero-next-arrow" viewBox="0 0 56 82" aria-hidden="true">
                    <polyline points="8,6 48,41 8,76"/>
                </svg>
            </button>

            {{-- pasek postepu = czas do nastepnego slajdu; restartuje go ip-motion.js --}}
            <span class="ip-nh-progress" style="--nh-interval: {{ $heroInterval }}ms" aria-hidden="true"><span data-nh-progress></span></span>
        @endif

        <a href="#nh-filter" class="ip-nh-scroll" aria-label="{{ $T['hero_scroll'][$L] }}">
            <span>{{ $T['hero_scroll'][$L] }}</span>
        </a>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var carousel = document.getElementById('ipHero');
        if (!carousel) return;

        var items = carousel.querySelectorAll('.carousel-item');
        var thumb = carousel.querySelector('[data-ip-thumb]');
        if (!thumb || items.length < 2) return;

        Array.prototype.forEach.call(items, function (item) {
            if (item.dataset.thumb) new Image().src = item.dataset.thumb;
        });

        carousel.addEventListener('slide.bs.carousel', function (event) {
            var next = items[(event.to + 1) % items.length];
            if (!next || !next.dataset.thumb) return;

            thumb.classList.add('is-changing');
            window.setTimeout(function () {
                thumb.src = next.dataset.thumb;
                thumb.classList.remove('is-changing');
            }, 220);
        });
    });
</script>

<div id="nh-filter">
    <x-property-filter
        :investments="$filterInvestments"
        :rooms="$filterRooms"
        :floors="$filterFloors"
        :areas="$filterAreas"
    />
</div>

{{-- Inwestycje w sprzedazy — dane jak na obecnej stronie glownej --}}
@php
    /* Dane kafli: app/Helpers/SaleCards.php (wspolne z "Mieszkania w sprzedazy") */
    $ipCardPhoto = fn ($inv) => investmentCardPhoto($inv);
    $ipSaleCards = saleCards($boxes, $investments_current, $cities);
@endphp

<section class="ip-section ip-nh-inv-section" id="nh-sale">
    <div class="container">
        <x-section-head data-nh-reveal>{{ $current_locale == 'pl' ? 'Inwestycje w sprzedaży' : 'Developments for Sale' }}</x-section-head>
    </div>

    {{-- Po 2 duze zdjecia na cala szerokosc ekranu (uwaga klienta 09.2026:
         "za malo dynamiczna, wybrana ma sie bardziej wybijac, duze zdjecia").
         Nazwa i lokalizacja zawsze na zdjeciu, opis/parametry/przyciski
         wysuwaja sie po najechaniu — jak w "Dlaczego warto nam zaufac".
         Na dotyku i ponizej 992px wszystko widoczne od razu (ippon.less).
         Przy nieparzystej liczbie ostatni kafel bierze caly wiersz, zeby nie
         zostawiac dziury obok. --}}
    <div class="ip-nh-inv-grid">
        @foreach ($ipSaleCards as $card)
            @php
                $wide = $loop->last && $loop->count % 2 === 1;
                $area = $card['area'];
            @endphp

            <article class="ip-nh-inv @if($wide) is-wide @endif" data-nh-reveal style="--nh-i: {{ $wide ? 0 : $loop->index % 2 }}">

                <div class="ip-nh-inv-media">
                    @if($card['link_description'])
                        <a href="{{ $card['link_description'] }}" tabindex="-1" aria-hidden="true">
                    @endif
                    @if($card['photo'] && $card['photo_webp'])
                        <picture>
                            <source srcset="{{ $card['photo_webp'] }}" type="image/webp">
                            <img src="{{ $card['photo'] }}" alt="{{ $card['name'] }}" loading="lazy" decoding="async">
                        </picture>
                    @elseif($card['photo'])
                        <img src="{{ $card['photo'] }}" alt="{{ $card['name'] }}" loading="lazy" decoding="async">
                    @endif
                    @if($card['link_description'])
                        </a>
                    @endif
                </div>

                @if($card['badge'])
                    <span class="ip-card-badge">{{ $card['badge'] }}</span>
                @endif

                <div class="ip-nh-inv-body">
                    @if($card['location'])
                        <span class="ip-nh-inv-loc">{{ $card['location'] }}</span>
                    @endif

                    <h3 class="ip-nh-inv-title">
                        @if($card['link_description'])
                            <a href="{{ $card['link_description'] }}">{{ $card['name'] }}</a>
                        @else
                            {{ $card['name'] }}
                        @endif
                    </h3>

                    {{-- dwa poziomy: zewnetrzny animuje wysokosc (grid 0fr -> 1fr),
                         wewnetrzny przycina tresc w trakcie --}}
                    <div class="ip-nh-inv-more">
                        <div>
                            @if($card['desc'])
                                <p class="ip-nh-inv-desc">{{ $card['desc'] }}</p>
                            @endif

                            @if($area || $card['handover'] || $card['advantage'])
                                <ul class="ip-nh-inv-params list-unstyled mb-0">
                                    @if($area)
                                        <li>
                                            <svg viewBox="0 0 29 29" fill="none" aria-hidden="true"><path d="M25.375 1.8125H3.625C2.62812 1.8125 1.8125 2.62812 1.8125 3.625V25.375C1.8125 26.3719 2.62812 27.1875 3.625 27.1875H17.2188V25.375C17.2188 22.8375 19.2125 20.8438 21.75 20.8438V19.0312C18.2156 19.0312 15.4062 21.8406 15.4062 25.375H12.6875V21.75H10.875V25.375H3.625V3.625H10.875V16.3125H12.6875V11.7812H16.3125V9.96875H12.6875V3.625H25.375V9.96875H21.75V11.7812H25.375V25.375H21.75V27.1875H25.375C26.3719 27.1875 27.1875 26.3719 27.1875 25.375V3.625C27.1875 2.62812 26.3719 1.8125 25.375 1.8125Z" fill="currentColor"/></svg>
                                            {!! $area !!}
                                        </li>
                                    @endif
                                    @if($card['handover'])
                                        <li>
                                            <svg viewBox="0 0 29 29" fill="none" aria-hidden="true"><path d="M23.5625 3.625H19.9375V1.8125H18.125V3.625H10.875V1.8125H9.0625V3.625H5.4375C4.44062 3.625 3.625 4.44062 3.625 5.4375V23.5625C3.625 24.5594 4.44062 25.375 5.4375 25.375H23.5625C24.5594 25.375 25.375 24.5594 25.375 23.5625V5.4375C25.375 4.44062 24.5594 3.625 23.5625 3.625ZM23.5625 23.5625H5.4375V10.875H23.5625V23.5625ZM23.5625 9.0625H5.4375V5.4375H9.0625V7.25H10.875V5.4375H18.125V7.25H19.9375V5.4375H23.5625V9.0625Z" fill="currentColor"/></svg>
                                            {{ $current_locale == 'pl' ? 'Odbiór: ' : 'Handover: ' }}{{ $card['handover'] }}
                                        </li>
                                    @endif
                                    @if($card['advantage'])
                                        <li>
                                            <svg viewBox="0 0 29 29" fill="none" aria-hidden="true"><path d="M3.625 25.375H25.375M6.04167 25.375V8.45833L15.7083 3.625V25.375M22.9583 25.375V13.2917L15.7083 8.45833M10.875 10.875V10.8871M10.875 14.5V14.5121M10.875 18.125V18.1371M10.875 21.75V21.7621" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            {{ $card['advantage'] }}
                                        </li>
                                    @endif
                                </ul>
                            @endif

                            @if($card['link_apartments'] || $card['link_description'])
                                <div class="ip-nh-inv-actions">
                                    @if($card['link_apartments'])
                                        <a {!! investmentLinkAttrs($card['link_apartments']) !!} class="ip-nh-btn-line is-solid">
                                            {{ $current_locale == 'pl' ? 'Zobacz mieszkania' : 'See apartments' }}
                                        </a>
                                    @endif
                                    @if($card['link_description'])
                                        <a {!! investmentLinkAttrs($card['link_description']) !!} class="ip-nh-btn-line">
                                            {{ $current_locale == 'pl' ? 'Opis inwestycji' : 'About the project' }}
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </article>
        @endforeach
    </div>
</section>


{{-- Nadchodzace projekty (status 4) — uwaga Zarzadu z 8.10.2026: "duza
     wizualizacja na caly ekran bez dodatkowych paskow lub tabel (na wzor
     planowanych inwestycji z new-page-2)". Byl podzial zdjecie 8/12 + panel. --}}
@php
    $ipSoonItems = $investments_soon->map(function ($inv) use ($ipCardPhoto, $cities, $current_locale) {
        $tr   = fn ($f) => $inv->getTranslation($f, $current_locale, false) ?: $inv->getTranslation($f, 'pl', false);
        $city = $cities->firstWhere('id', $inv->city);
        $url  = investmentUrl($inv);

        return [
            'picture' => investmentLargeImage($inv, 'slide') ?: investmentLargeImage($inv, 'list'),
            'photo'   => $ipCardPhoto($inv),
            'alt'     => $inv->name,
            'eyebrow' => trim(($city->name ?? '').' · '.($current_locale == 'pl' ? 'Już wkrótce' : 'Coming soon'), ' ·'),
            'title'   => $tr('soon_title') ?: $tr('name'),
            'desc'    => $tr('soon_content') ?: ($inv->entry_content ? excerpt($inv->entry_content, 140) : null),
            'url'     => $url,
            'ext'     => investmentUrlExternal($url),
        ];
    })->filter(fn ($i) => $i['picture'] || $i['photo'])->values()->all();
@endphp

@include('layouts.partials.ip-gallery', [
    'id'      => 'nh-soon',
    'class'   => 'ip-nh-gallery',
    'eyebrow' => $current_locale == 'pl' ? 'Nadchodzące projekty' : 'Upcoming projects',
    'title'   => $current_locale == 'pl' ? 'Przyszłość pisana komfortem.' : 'A future written in comfort.',
    'more'    => ['url' => route('developro.soon'), 'label' => $current_locale == 'pl' ? 'Wszystkie inwestycje już wkrótce' : 'All upcoming developments'],
    'items'   => $ipSoonItems,
])

{{-- Dlaczego warto nam zaufac — bez zmian w tresci, dochodzi wejscie kafli --}}
<section class="ip-section ip-trust-section">
    <div class="container">
        <x-section-head data-nh-reveal>
            Bezpieczeństwo transakcji, bezkompromisowa jakość.
                <span>Dlaczego warto nam zaufać?</span>
        </x-section-head>

        @php
            $zaufanie = [
                [
                    'img'   => 'trust-card-1.jpg',
                    'title' => 'Certyfikat jakości IPPON',
                    'desc'  => 'Autorski standard oparty na bezkompromisowym wyborze materiałów najwyższej jakości',
                ],
                [
                    'img'   => 'trust-card-2.jpg',
                    'title' => 'Technologia w służbie komfortu',
                    'desc'  => 'Wprowadzamy standardy jutra: zaawansowane systemy automatyki domowej, ekologiczne panele fotowoltaiczne redukujące koszty eksploatacji oraz architekturę dbającą o naturalne doświetlenie',
                ],
                [
                    'img'   => 'trust-card-3.jpg',
                    'title' => 'Pewność, której możesz zaufać',
                    'desc'  => 'Wszystkie inwestycje realizujemy terminowo, opierając się na silnym zapleczu kapitałowym. Kupując mieszkanie od Ippon Group, zyskujesz pełne bezpieczeństwo transakcji',
                ],
            ];
        @endphp

        <div class="row ip-cards-row">
            @foreach ($zaufanie as $item)
                <div class="col-12 col-md-6 col-xl-4" data-nh-reveal style="--nh-i: {{ $loop->index }}">
                    <article class="ip-trust-card" tabindex="0">
                        <img src="{{ asset('images/homepage/'.$item['img']) }}" alt="{{ $item['title'] }}">
                        <div class="ip-trust-card-body">
                            <h3>{{ $item['title'] }}</h3>
                            <div class="ip-trust-card-desc">
                                <p>{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Film o firmie — klient prosi o "duze zdjecia, filmy". Ten sam film
     i plakat co na "O nas" (play jest wpalony w plakat). YouTube laduje sie
     dopiero po kliknieciu — obsluga w ip-motion.js. --}}
<section class="ip-nh-film">
    <div class="ip-video" data-video="HQe0jLv8t8s" role="button" tabindex="0" data-nh-img
         aria-label="{{ $T['film'][$L] }}">
        <img src="{{ asset('images/about/video-ippon.jpg') }}" alt="Ippon Group" loading="lazy" decoding="async">
    </div>
</section>

{{-- Inwestycje planowane — uwaga Zarzadu z 8.10.2026: "wolimy tak, jak
     zaproponowano w new-page-2" (paczka Marka). Byla karuzela Bootstrapa
     z kompaktowym panelem opisu po lewej. --}}
@php
    $ipPlannedItems = $investments_planned->map(function ($inv) use ($ipCardPhoto, $cities, $current_locale) {
        $city = $cities->firstWhere('id', $inv->city);
        $url  = investmentUrl($inv);

        return [
            'picture' => investmentLargeImage($inv, 'slide'),
            'photo'   => $ipCardPhoto($inv),
            'alt'     => $inv->name,
            'eyebrow' => trim(($city->name ?? '').' · '.($current_locale == 'pl' ? 'Inwestycja w przygotowaniu' : 'Investment in preparation'), ' ·'),
            'title'   => $inv->name,
            'desc'    => $inv->entry_content ? excerpt($inv->entry_content, 140) : null,
            'url'     => $url,
            'ext'     => investmentUrlExternal($url),
        ];
    })->filter(fn ($i) => $i['picture'] || $i['photo'])->values()->all();
@endphp

@include('layouts.partials.ip-gallery', [
    'id'      => 'nh-planned',
    'class'   => 'ip-nh-gallery',
    'eyebrow' => $current_locale == 'pl' ? 'Kolejne adresy IPPON' : 'Next IPPON addresses',
    'title'   => $current_locale == 'pl' ? 'Sprawdź inwestycje planowane' : 'Explore planned investments',
    'more'    => ['url' => route('developro.planned'), 'label' => $current_locale == 'pl' ? 'Wszystkie planowane inwestycje' : 'All planned investments'],
    'items'   => $ipPlannedItems,
])

{{-- Boksy samoobslugowe — zdjecie wyzsze. Bez paralaksy: kadr jest celowo
     zaczepiony u gory (ip-boxes-media), a przesuw odslanialby/ucinal glowe. --}}
<section class="ip-section">
    <div class="ip-full">
        <div class="row g-0">
            <div class="col-12 col-lg-7 col-xl-8">
                <div class="ip-split-media ip-boxes-media" data-nh-img>
                    <img src="{{ asset('images/homepage/boksy.jpg').'?v='.filemtime(public_path('images/homepage/boksy.jpg')) }}" alt="Boksy samoobsługowe 24/7" loading="lazy" decoding="async">
                </div>
            </div>
            <div class="col-12 col-lg-5 col-xl-4">
                <div class="ip-boxes-panel">
                    <h2 data-nh-reveal style="--nh-i: 0">
                        Jedyne w Olsztynie
                        <span class="text-gold">boksy samoobsługowe</span>
                        czynne 24/7
                    </h2>
                    <hr class="ip-rule" data-nh-reveal style="--nh-i: 1">
                    <p data-nh-reveal style="--nh-i: 2">Bezpiecznie przechowuj swoje rzeczy dokładnie wtedy, kiedy tego potrzebujesz. Dostęp do boksów masz o każdej porze – szybko, wygodnie i bez zbędnych formalności</p>
                    <div data-nh-reveal style="--nh-i: 3">
                        <a href="https://boxolsztyn.pl/" target="_blank" rel="noopener" class="ip-btn-gold-lg">Sprawdź box</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Aktualnosci — karuzela 6 wpisow, 3 widoczne na cala szerokosc ekranu
     (uwaga klienta 09.2026). Bez biblioteki: przewijany pas z przyciaganiem
     (scroll-snap), wiec dziala palcem, touchpadem i strzalkami; strzalki
     i pasek postepu obsluguje ip-motion.js. Kadr zdjec 16:9 = proporcja
     miniatur, grafiki z tekstem nie sa uciete. --}}
@if($news->count() > 0)
<section class="ip-section pt-0 ip-nh-news">
    <div class="container">
        <x-section-head data-nh-reveal>{{ $current_locale == 'pl' ? 'Aktualności z życia IPPON GROUP' : 'News from IPPON GROUP' }}</x-section-head>
    </div>

    <div class="ip-nh-rail" data-nh-rail>
        <div class="ip-nh-rail-track" data-nh-rail-track tabindex="0"
             aria-label="{{ $current_locale == 'pl' ? 'Aktualności — przewiń w bok' : 'News — scroll sideways' }}">
            @foreach ($news as $post)
                <div class="ip-nh-rail-item" data-nh-reveal style="--nh-i: {{ min($loop->index, 3) }}">
                    @include('front.news.ip-trust-card', ['news' => $post])
                </div>
            @endforeach
        </div>

        {{-- chowane przez JS, gdy wszystko miesci sie na ekranie --}}
        <div class="container">
            <div class="ip-nh-rail-controls" data-nh-rail-controls>
                <span class="ip-nh-rail-bar" aria-hidden="true"><span data-nh-rail-bar></span></span>

                <button type="button" class="ip-nh-rail-btn" data-nh-rail-prev aria-label="{{ $current_locale == 'pl' ? 'Poprzednie aktualności' : 'Previous news' }}">
                    <svg viewBox="0 0 18 15" aria-hidden="true"><polyline points="7,1 1,7.5 7,14"/><line x1="1" y1="7.5" x2="17" y2="7.5"/></svg>
                </button>
                <button type="button" class="ip-nh-rail-btn" data-nh-rail-next aria-label="{{ $current_locale == 'pl' ? 'Następne aktualności' : 'Next news' }}">
                    <svg viewBox="0 0 18 15" aria-hidden="true"><polyline points="11,1 17,7.5 11,14"/><line x1="1" y1="7.5" x2="17" y2="7.5"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Kontakt --}}
<section class="ip-section pt-0">
    <div class="container">
        @php
            $ipContactTitle = $current_locale == 'en'
                ? 'Let’s talk about your new apartment'
                : 'Porozmawiajmy o Twoim nowym mieszkaniu';

            $ipContactLead = $current_locale == 'en'
                ? 'Exceptional developments call for dedicated care. If you would like to learn the details of our projects, arrange a viewing or ask about bespoke solutions – <strong>we are at your disposal.</strong>'
                : 'Wyjątkowe inwestycje wymagają dedykowanej opieki. Jeśli chcesz poznać szczegóły naszych projektów, umówić się na prezentację apartamentu lub zapytać o niestandardowe rozwiązania – <strong>jesteśmy do Twojej dyspozycji.</strong>';
        @endphp

        <x-section-head data-nh-reveal>{{ $ipContactTitle }}</x-section-head>

        <div class="row ip-cards-row align-items-start">
            <div class="col-12 col-lg-6" data-nh-reveal style="--nh-i: 0">
                @include('layouts.partials.ip-contact-info', ['lead' => $ipContactLead, 'salesLabel' => true])
            </div>

            {{-- samo przenikanie, bez przesuniecia: transform na przodku zamienia
                 position:fixed znacznika reCAPTCHA w absolute i wypycha go
                 poza ekran (poszerza strone na telefonie) --}}
            <div class="col-12 col-lg-6" data-nh-reveal="fade" style="--nh-i: 1">
                @include('front.contact.ip-form', ['page_name' => 'Strona główna'])
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/ip-motion.js') }}?v={{ filemtime(public_path('js/ip-motion.js')) }}" defer></script>

@endsection
