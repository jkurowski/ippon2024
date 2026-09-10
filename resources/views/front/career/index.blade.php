@extends('layouts.page', ['body_class' => 'ip-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

{{-- ==== STARY KOD — wylaczony, do usuniecia po odbiorze ==== --}}
@if(1 == 2)
@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <section class="pt-0">
        <div class="container">
            <div class="row left-right">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    @if($current_locale == 'pl')
                    <div class="left-right-text">
                        <h2>Pracuj z najlepszymi</h2>
                        <p>Oferujemy stabilne zatrudnienie i ciągły rozwój w strukturach jednego z najszybciej rozwijających się deweloperów w kraju.</p>
                        <p>&nbsp;</p>
                        <p>Nasz zespół to profesjonaliści dla których rynek nieruchomości jest pasją, a celem - wspólne tworzenie nowych projektów inwestycyjnych.</p>
                        <p>&nbsp;</p>
                        <p>Dołącz do nas, jeżeli cenisz sobie przyjazną atmosferę w pracy, jesteś pełen zapału i gotów na nowe wyzwania!</p>
                    </div>
                    @else
                    <div class="left-right-text">
                        <h2>Work with the best team</h2>
                        <p>We offer stable employment and continuous development within one of the fastest-growing developers in the country.</p>
                        <p>&nbsp;</p>
                        <p>Our team consists of professionals for whom the real estate market is a passion, and the goal is the collaborative creation of new investment projects.</p>
                        <p>&nbsp;</p>
                        <p>Join us if you value a friendly work atmosphere, are full of enthusiasm, and ready for new challenges!</p>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/images/inline/pracuj-z-najlepszymi.jpg') }}" alt="" class="golden-border" width="840" height="650">
                </div>
            </div>
            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    @if($current_locale == 'pl')
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2>Poznajmy się</h2>
                        <p>Proces rekrutacyjny to rozmowa, w czasie której koncentrujemy się na doświadczeniu, umiejętnościach i kompetencjach, które są związane z konkretnym stanowiskiem pracy.</p>
                        <p>&nbsp;</p>
                        <p>Chętnie odpowiadamy na wszystkie pytania, abyś mógł lepiej poznać wartości i misję Firmy.</p>
                    </div>
                    @else
                        <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                            <h2>Let's get to know each other</h2>
                            <p>The recruitment process is a conversation during which we focus on the experience, skills, and competencies related to the specific job position.</p>
                            <p>&nbsp;</p>
                            <p>We are happy to answer any questions so that you can better understand the values and mission of the Company.</p>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/images/inline/kariera-poznajmy-sie.jpg') }}" alt="" class="golden-border">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase"><span class="text-gold">Aktualnie</span> <br>poszukujemy</h2>
                    @else
                    <h2 class="section-title text-uppercase"><span class="text-gold">Currently</span> <br>we are looking for</h2>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="accordion" id="accordionJob">
                        @foreach($jobs as $key => $job)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $job->id }}" aria-expanded="@if($key == 0) true @else false @endif" aria-controls="collapse{{ $job->id }}">
                                    {{ $job->name }} <br><span>{{ $job->city }}</span>
                                </button>
                            </h2>
                            <div id="collapse{{ $job->id }}" class="accordion-collapse collapse @if($key == 0) show @endif" data-bs-parent="#accordionJob">
                                <div class="accordion-body">
                                    {!! $job->text !!}
                                    <a href="mailto:{{ $job->email }}?subject=Oferta pracy: {{ $job->name }}" class="mt-4 bttn bttn-icon">@lang('website.button-application') <i class="ms-5 las la-chevron-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase"><span class="text-gold">Oferujemy</span></h2>
                    @else
                    <h2 class="section-title text-uppercase"><span class="text-gold">We offer</span></h2>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <div data-aos="fade-up" data-aos-offset="300" data-aos-delay="100" class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/stabilne-zatrudnienie.png') }}" alt="" width="135" height="135">
                                </div>
                                @if($current_locale == 'pl')
                                <p>STABILNE <br>ZATRUDNIENIE</p>
                                @else
                                <p>STABLE <br>EMPLOYMENT</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div data-aos="fade-up" data-aos-offset="300" data-aos-delay="200" class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/praca-z-najlepszymi.png') }}" alt="" width="135" height="135">
                                </div>
                                @if($current_locale == 'pl')
                                <p>PRACA Z NAJLEPSZYMI <br>W BRANŻY</p>
                                @else
                                <p>COLLABORATION WITH <br>THE BEST IN THE INDUSTRY</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div data-aos="fade-up" data-aos-offset="300" data-aos-delay="300" class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/szkolenia.png') }}" alt="" width="135" height="135">
                                </div>
                                @if($current_locale == 'pl')
                                <p>SZKOLENIA</p>
                                @else
                                    <p>TRAINING</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div data-aos="fade-up" data-aos-offset="300" data-aos-delay="100" class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/wolne-weekendy.png') }}" alt="" width="135" height="135">
                                </div>
                                @if($current_locale == 'pl')
                                <p>WOLNE WEEKENDY</p>
                                @else
                                    <p>WEEKENDS OFF</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div data-aos="fade-up" data-aos-offset="300" data-aos-delay="200" class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/realny-wplyw.png') }}" alt="" width="135" height="135">
                                </div>
                                @if($current_locale == 'pl')
                                <p>REALNY WPŁYW <br>NA POWSTAJĄCE INWESTYCJE</p>
                                @else
                                    <p>TANGIBLE INFLUENCE <br>ON THE DEVELOPMENT OF PROJECTS</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div data-aos="fade-up" data-aos-offset="300" data-aos-delay="300" class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/swieza-kawa.png') }}" alt="" width="135" height="135">
                                </div>
                                @if($current_locale == 'pl')
                                <p>CODZIENNIE ŚWIEŻO <br>ZMIELONA KAWA</p>
                                @else
                                    <p>FRESHLY COFFEE DAILY!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-0">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase"><span class="text-gold">Przebieg</span> <br>rekrutacji</h2>
                    @else
                    <h2 class="section-title text-uppercase"><span class="text-gold">Recruitment</span> <br>process</h2>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="left-right-image pe-0 pe-lg-5" data-aos="fade-right" data-aos-offset="300" data-aos-delay="0">
                        <img src="{{ asset('/images/inline/rekrutacja-aplikacja.jpg') }}" alt="" class="golden-border w-100" width="670" height="410">
                    </div>
                </div>
                <div class="col-12 col-lg-7 d-flex align-items-center left-right-smalltext mt-4 mt-lg-0">
                    <div data-aos="fade-left" data-aos-offset="300" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <h3>APLIKACJA</h3>
                        <p>Prześlij do nas swoje CV na adres: <a href="mailto:sekretariat@ippon.group">sekretariat@ippon.group</a>. Opisz siebie i zaprezentuj swoje dotychczasowe osiągnięcia.</p>
                        @else
                            <h3>JOB APPLICATION</h3>
                            <p>Send us your CV to the following email address: <a href="mailto:sekretariat@ippon.group">sekretariat@ippon.group</a> or use the recruitment form below. Describe yourself and showcase your past achievements.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row flex-row-reverse row-offset-up-50">
                <div class="col-12 col-lg-5">
                    <div class="left-right-image ps-0 ps-lg-5" data-aos="fade-left" data-aos-offset="300" data-aos-delay="0">
                        <img src="{{ asset('/images/inline/rekrutacja-selekcja.jpg') }}" alt="" class="golden-border w-100" width="670" height="410">
                    </div>
                </div>
                <div class="col-12 col-lg-7 d-flex align-items-center left-right-smalltext text-start text-lg-end mt-4 mt-lg-0">
                    <div data-aos="fade-right" data-aos-offset="300" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <h3>SELEKCJA</h3>
                        <p>Jeżeli Twoje doświadczenie jest zgodne z naszymi oczekiwaniami, skontaktujemy się z Tobą i zaprosimy na rozmowę rekrutacyjną do siedziby firmy.</p>
                        @else
                            <h3>SELECTION</h3>
                            <p>If your experience aligns with our expectations, we will get in touch with you and invite you for a recruitment interview at our company headquarters.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row row-offset-up-50">
                <div class="col-12 col-lg-5">
                    <div class="left-right-image pe-0 pe-lg-5" data-aos="fade-right" data-aos-offset="300" data-aos-delay="0">
                        <img src="{{ asset('/images/inline/rekrutacja-rozmowa.jpg') }}" alt="" class="golden-border w-100" width="670" height="410">
                    </div>
                </div>
                <div class="col-12 col-lg-7 d-flex align-items-center left-right-smalltext mt-4 mt-lg-0">
                    <div data-aos="fade-left" data-aos-offset="300" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <h3>ROZMOWA</h3>
                        <p>Na spotkaniu poznamy się bliżej. Opowiemy o strukturze firmy, kulturze organizacyjnej oraz przybliżymy zakres obowiązków na danym stanowisku pracy. Zadamy Ci kilka pytań, by lepiej poznać Ciebie i Twoje doświadczenie zawodowe.</p>
                        @else
                            <h3>INTERVIEW</h3>
                            <p>During the meeting, we will get to know each other better. We will discuss the company's structure, organizational culture, and provide an overview of the job responsibilities for the specific position. We will also ask you a few questions to better understand you and your professional experience.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row flex-row-reverse row-offset-up-50">
                <div class="col-12 col-lg-5">
                    <div class="left-right-image ps-0 ps-lg-5" data-aos="fade-left" data-aos-offset="300" data-aos-delay="0">
                        <img src="{{ asset('/images/inline/rekrutacja-decyzja.jpg') }}" alt="" class="golden-border w-100" width="670" height="410">
                    </div>
                </div>
                <div class="col-12 col-lg-7 d-flex align-items-center left-right-smalltext text-start text-lg-end mt-4 mt-lg-0">
                    <div data-aos="fade-right" data-aos-offset="300" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <h3>DECYZJA</h3>
                        <p>Po rozmowie kwalifikacyjnej otrzymasz od nas informację zwrotną, dotyczącą ostatecznej decyzji związanej z rekrutacją. Wybranym kandydatom złożymy ofertę dopasowaną do ich profilu kompetencji, doświadczenia i stanowiska.</p>
                        @else
                            <h3>DECISION</h3>
                            <p>After the qualification interview, you will receive feedback from us regarding the final recruitment decision. To selected candidates, we will extend an offer tailored to their profile of competencies, experience, and position.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — Kariera
     Ustalenia z Jackiem:
       - bloki ze zdjeciami ida na pelna szerokosc (.ip-invrow), czyli
         "Pracuj z najlepszymi", "Poznajmy sie" i cztery kroki rekrutacji,
       - "Aktualnie poszukujemy" zostaje w kontenerze (oferty z CMS-u),
       - ikonki w "Oferujemy" zostaja te same, tylko subtelniejsze.
     Teksty przepisane ze starego widoku bez zmian.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    /* Bloki pelnej szerokosci — zdjecie do krawedzi ekranu */
    $bloki = [
        [
            'img'     => 'images/inline/pracuj-z-najlepszymi.jpg',
            'reverse' => true,
            'title'   => ['pl' => 'Pracuj z najlepszymi', 'en' => 'Work with the best team'],
            'desc'    => [
                'pl' => '<p>Oferujemy stabilne zatrudnienie i ciągły rozwój w strukturach jednego z najszybciej rozwijających się deweloperów w kraju.</p>
                         <p>Nasz zespół to profesjonaliści, dla których rynek nieruchomości jest pasją, a celem – wspólne tworzenie nowych projektów inwestycyjnych.</p>
                         <p>Dołącz do nas, jeżeli cenisz sobie przyjazną atmosferę w pracy, jesteś pełen zapału i gotów na nowe wyzwania!</p>',
                'en' => '<p>We offer stable employment and continuous development within one of the fastest-growing developers in the country.</p>
                         <p>Our team consists of professionals for whom the real estate market is a passion, and the goal is the collaborative creation of new investment projects.</p>
                         <p>Join us if you value a friendly work atmosphere, are full of enthusiasm, and ready for new challenges!</p>',
            ],
        ],
        [
            'img'     => 'images/inline/kariera-poznajmy-sie.jpg',
            'reverse' => false,
            'title'   => ['pl' => 'Poznajmy się', 'en' => 'Let’s get to know each other'],
            'desc'    => [
                'pl' => '<p>Proces rekrutacyjny to rozmowa, w czasie której koncentrujemy się na doświadczeniu, umiejętnościach i kompetencjach związanych z konkretnym stanowiskiem pracy.</p>
                         <p>Chętnie odpowiadamy na wszystkie pytania, abyś mógł lepiej poznać wartości i misję firmy.</p>',
                'en' => '<p>The recruitment process is a conversation during which we focus on the experience, skills and competencies related to the specific job position.</p>
                         <p>We are happy to answer any questions so that you can better understand the values and mission of the company.</p>',
            ],
        ],
    ];

    /* "Oferujemy" — ikonki te same co dotad, tylko subtelniejsze */
    $oferujemy = [
        ['icon' => 'stabilne-zatrudnienie.png', 'pl' => 'Stabilne zatrudnienie', 'en' => 'Stable employment'],
        ['icon' => 'praca-z-najlepszymi.png',   'pl' => 'Praca z najlepszymi w branży', 'en' => 'Collaboration with the best in the industry'],
        ['icon' => 'szkolenia.png',             'pl' => 'Szkolenia', 'en' => 'Training'],
        ['icon' => 'wolne-weekendy.png',        'pl' => 'Wolne weekendy', 'en' => 'Weekends off'],
        ['icon' => 'realny-wplyw.png',          'pl' => 'Realny wpływ na powstające inwestycje', 'en' => 'Tangible influence on the development of projects'],
        ['icon' => 'swieza-kawa.png',           'pl' => 'Codziennie świeżo zmielona kawa', 'en' => 'Freshly ground coffee daily'],
    ];

    /* Przebieg rekrutacji — cztery kroki, kazdy ze zdjeciem na pelnej szerokosci */
    $rekrutacja = [
        [
            'num'   => '01',
            'img'   => 'images/inline/rekrutacja-aplikacja.jpg',
            'title' => ['pl' => 'Aplikacja', 'en' => 'Job application'],
            'desc'  => [
                'pl' => 'Prześlij do nas swoje CV na adres: <a href="mailto:sekretariat@ippon.group">sekretariat@ippon.group</a>. Opisz siebie i zaprezentuj swoje dotychczasowe osiągnięcia.',
                'en' => 'Send us your CV to: <a href="mailto:sekretariat@ippon.group">sekretariat@ippon.group</a>. Describe yourself and showcase your past achievements.',
            ],
        ],
        [
            'num'   => '02',
            'img'   => 'images/inline/rekrutacja-selekcja.jpg',
            'title' => ['pl' => 'Selekcja', 'en' => 'Selection'],
            'desc'  => [
                'pl' => 'Jeżeli Twoje doświadczenie jest zgodne z naszymi oczekiwaniami, skontaktujemy się z Tobą i zaprosimy na rozmowę rekrutacyjną do siedziby firmy.',
                'en' => 'If your experience aligns with our expectations, we will get in touch and invite you for an interview at our company headquarters.',
            ],
        ],
        [
            'num'   => '03',
            'img'   => 'images/inline/rekrutacja-rozmowa.jpg',
            'title' => ['pl' => 'Rozmowa', 'en' => 'Interview'],
            'desc'  => [
                'pl' => 'Na spotkaniu poznamy się bliżej. Opowiemy o strukturze firmy, kulturze organizacyjnej oraz przybliżymy zakres obowiązków na danym stanowisku. Zadamy Ci kilka pytań, by lepiej poznać Ciebie i Twoje doświadczenie zawodowe.',
                'en' => 'During the meeting we will get to know each other better. We will discuss the company’s structure, organisational culture and the job responsibilities. We will also ask you a few questions to better understand your professional experience.',
            ],
        ],
        [
            'num'   => '04',
            'img'   => 'images/inline/rekrutacja-decyzja.jpg',
            'title' => ['pl' => 'Decyzja', 'en' => 'Decision'],
            'desc'  => [
                'pl' => 'Po rozmowie kwalifikacyjnej otrzymasz od nas informację zwrotną dotyczącą ostatecznej decyzji. Wybranym kandydatom złożymy ofertę dopasowaną do ich kompetencji, doświadczenia i stanowiska.',
                'en' => 'After the interview you will receive feedback regarding the final decision. Selected candidates will receive an offer tailored to their competencies, experience and position.',
            ],
        ],
    ];
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl' ? 'Kariera' : 'Career',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Kariera' : 'Career', 'url' => null],
        ],
        'lead'   => $L == 'pl'
                        ? 'Budujemy zespół tak samo starannie jak nasze inwestycje.'
                        : 'We build our team as carefully as we build our developments.',
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    {{-- Pracuj z najlepszymi / Poznajmy sie — pelna szerokosc --}}
    <section class="ip-invrows ip-career-rows">
        @foreach($bloki as $blok)
            <article class="ip-invrow is-half @if($blok['reverse']) is-reverse @endif">
                <div class="row g-0 align-items-center">
                    <div class="col-12 col-lg-6 ip-invrow-media">
                        <img src="{{ asset($blok['img']) }}" alt="{{ $blok['title'][$L] }}">
                    </div>
                    <div class="col-12 col-lg-6 ip-invrow-body">
                        <div class="ip-invrow-inner">
                            <h2>{{ $blok['title'][$L] }}</h2>
                            <div class="ip-rule"></div>
                            <div class="ip-invrow-desc">{!! $blok['desc'][$L] !!}</div>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </section>

    {{-- Aktualnie poszukujemy — oferty z CMS-u, w kontenerze --}}
    <section class="ip-section ip-jobs-section pt-0">
        <div class="container">

            <x-section-head>{{ $L == 'pl' ? 'Aktualnie poszukujemy' : 'Currently we are looking for' }}</x-section-head>

            @if($jobs->count() > 0)
                <div class="accordion ip-faq ip-jobs" id="accordionJob">
                    @foreach($jobs as $key => $job)
                        <div class="accordion-item ip-faq-item">
                            <h3 class="accordion-header" id="jobHead{{ $job->id }}">
                                <button class="accordion-button @if($key > 0) collapsed @endif" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $job->id }}"
                                        aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $job->id }}">
                                    <span class="ip-job-name">{{ $job->name }}</span>
                                    <span class="ip-job-city">{{ $job->city }}</span>
                                </button>
                            </h3>
                            <div id="collapse{{ $job->id }}" class="accordion-collapse collapse @if($key == 0) show @endif"
                                 aria-labelledby="jobHead{{ $job->id }}" data-bs-parent="#accordionJob">
                                <div class="accordion-body">
                                    {!! $job->text !!}
                                    <a href="mailto:{{ $job->email }}?subject=Oferta pracy: {{ $job->name }}" class="ip-btn-gold-lg">
                                        @lang('website.button-application')
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="ip-jobs-empty">
                    {{ $L == 'pl'
                        ? 'Aktualnie nie prowadzimy rekrutacji, ale chętnie poznamy Twoje CV — napisz na sekretariat@ippon.group.'
                        : 'We are not recruiting at the moment, but we are happy to receive your CV at sekretariat@ippon.group.' }}
                </p>
            @endif

        </div>
    </section>

    {{-- Oferujemy --}}
    <section class="ip-section ip-perks-section pt-0">
        <div class="container">

            <x-section-head>{{ $L == 'pl' ? 'Oferujemy' : 'We offer' }}</x-section-head>

            <div class="row ip-perks">
                @foreach($oferujemy as $perk)
                    <div class="col-6 col-lg-4">
                        <div class="ip-perk">
                            <span class="ip-perk-icon">
                                <img src="{{ asset('images/icons/'.$perk['icon']) }}" alt="" width="135" height="135">
                            </span>
                            <p>{{ $perk[$L] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Przebieg rekrutacji — os czasu jak na "Jak kupic mieszkanie" --}}
    <section class="ip-section ip-steps-section ip-career-steps">
        <div class="container">

            <x-section-head>{{ $L == 'pl' ? 'Przebieg rekrutacji' : 'Recruitment process' }}</x-section-head>

            @foreach($rekrutacja as $krok)
                <article class="ip-step">

                    {{-- numer kroku siedzi w kolku, wiec osobnej kolumny z numerem tu nie ma --}}
                    <div class="ip-step-rail">
                        <span class="ip-step-icon">{{ $krok['num'] }}</span>
                        <span class="ip-step-line"></span>
                    </div>

                    <div class="ip-step-body">
                        <h3 class="ip-step-title">{{ $krok['title'][$L] }}</h3>
                        <p class="ip-step-desc">{!! $krok['desc'][$L] !!}</p>
                    </div>

                    <div class="ip-step-media">
                        <img src="{{ asset($krok['img']) }}" alt="{{ $krok['title'][$L] }}" width="670" height="410">
                    </div>

                </article>
            @endforeach

        </div>
    </section>

    {{-- Formularz kontaktowy — ten sam komponent co na pozostalych podstronach --}}
    @include('layouts.partials.ip-contact-section', [
        'title'     => $L == 'pl' ? 'Porozmawiajmy o Twojej karierze' : 'Let us talk about your career',
        'lead'      => $L == 'pl'
                        ? 'Nie znalazłeś ogłoszenia dla siebie? Napisz do nas — chętnie poznamy Twoje doświadczenie i wrócimy z propozycją, gdy pojawi się pasujący projekt.'
                        : 'No matching offer? Write to us — we are happy to learn about your experience and will get back when a suitable project comes up.',
        'form'      => 'front.contact.ip-form',
        'page_name' => 'Kariera',
    ])

@endsection
