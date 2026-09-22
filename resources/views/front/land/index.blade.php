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
        <div class="row">
            @if($current_locale == 'pl')
            <div class="col-12">
                <p>Ippon Group systematycznie wprowadza do sprzedaży nowe inwestycje. Polityka spółki polega na ekspansji o unikalne lokalizacje, których grunty są nabywane od ich właścicieli w cenach rynkowych. Pozwala to na realizowanie unikalnych, wartościowych projektów inwestycyjnych, które ze względu na atrakcyjność swojej lokalizacji, walory architektoniczne, jakość wykonania i ceny są sprzedawane w stosunkowo krótkim czasie. Dlatego na bieżąco monitorujemy sytuację na rynku działek budowlanych.</p>
                <p>&nbsp;</p>
                <p>Jeśli planujesz sprzedać grunty, skontaktuj się z nami. Naszym nadrzędnym celem jest zagwarantowanie kontrahentom w pełni profesjonalnej transakcji, zapewniającej bezpieczeństwo oraz uczciwą cenę. Nasi specjaliści zapewniają kompleksowe wsparcie podczas całego procesu sprzedaży.</p>
            </div>
            @else
            <div class="col-12">
                <p>Ippon Group consistently introduces new investments for sale. The company's policy focuses on expansion into unique locations, acquiring land from owners at market prices. This allows for the realization of unique, valuable investment projects that, due to the attractiveness of their location, architectural qualities, quality of execution, and pricing, are sold relatively quickly. Therefore, we continuously monitor the situation in the market for building plots.</p>
                <p>&nbsp;</p>
                <p>If you are planning to sell land, please contact us. Our primary goal is to ensure our contractors a fully professional transaction, providing safety and a fair price. Our specialists provide comprehensive support throughout the entire sales process.</p>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="pt-0 pt-xl-5">
    <div class="container">
        <div class="row left-right">
            <div class="col-12 col-xl-6 d-flex align-items-center">
                <div class="left-right-text">
                    @if($current_locale == 'pl')
                    <p>Bezpłatnie wyceniamy grunty oraz zapewniamy pomoc prawną. Mamy elastyczne podejście do każdej nieruchomości oraz do jej właściciela, co sprzyja zawarciu umowy opartej na obustronnej korzyści. Decydując się na współpracę z nami, nie musisz zastanawiać się nad tym, czy działka znajduje się w złej lokalizacji lub nie została odrolniona.</p>
                    <p>&nbsp;</p>
                    <p>Pomożemy Ci ustalić jej status prawny oraz ocenić jej potencjał inwestycyjny. Jesteśmy deweloperem godnym Twojego zaufania.</p>
                    @else
                        <p>We offer free land valuation and provide legal assistance. We have a flexible approach to every property and its owner, which facilitates the conclusion of an agreement based on mutual benefit. By choosing to work with us, you don't have to worry about whether the plot is in a bad location or has not been developed for agricultural use.</p>
                        <p>&nbsp;</p>
                        <p>We will help you determine its legal status and assess its investment potential. We are a developer worthy of your trust.</p>
                    @endif
                    <a href="#contact-form" data-offset="-60" class="bttn bttn-icon mt-3 mt-sm-5 scroll-to">@lang('website.fill-form') <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="p-0 p-xl-3">
                    <img src="{{ asset('/images/grunty-1.jpg') }}" alt="" class="golden-border w-100" width="840" height="650">
                </div>
            </div>
        </div>
        <div class="row left-right flex-row-reverse row-offset-up">
            <div class="col-12 col-xl-6 d-flex align-items-center">
                <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    @if($current_locale == 'pl')
                    <p>Nasza nieprzerwana obecność w branży deweloperskiej pozwoliła zdobyć doświadczenie, które jest gwarancją, że przeprowadzane przez nas transakcje są całkowicie zgodne z obowiązującymi przepisami prawa.</p>
                    <p>&nbsp;</p>
                    <p>Wypełnij poniższy formularz, a nasz ekspert skontaktuje się z Tobą w ciągu kilku godzin w celu umówienia spotkania.</p>
                    @else
                        <p>Our uninterrupted presence in the real estate industry has allowed us to gain experience, which ensures that the transactions we conduct are fully compliant with the applicable legal regulations.</p>
                        <p>&nbsp;</p>
                        <p>Please fill out the form below, and our expert will contact you within a few hours to schedule a meeting.</p>
                    @endif
                    <a href="#contact-form" data-offset="-60" class="bttn bttn-icon mt-3 mt-sm-5 scroll-to">@lang('website.fill-form') <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="p-0 p-xl-3" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/images/grunty-2.jpg') }}" alt="" class="golden-border w-100" width="840" height="650">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact-form" class="pt-0 pt-lg-5">
    <div class="container">
        <div class="row d-flex justify-content-center mt-3 mt-sm-5">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success border-0">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning border-0">
                        {{ session('warning') }}
                    </div>
                @endif
                <form method="post" id="land-form" action="" class="validateForm">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12 col-sm-4 col-lg-3 form-input">
                            <label for="form_name">@lang('website.form-label-name') <span class="text-danger">*</span></label>
                            <input name="form_name" id="form_name" class="validate[required] form-control @error('form_name') is-invalid @enderror" type="text" value="{{ old('form_name') }}">

                            @error('form_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4 col-lg-3 form-input mt-4 mt-sm-0">
                            <label for="form_surname">@lang('website.form-label-lastname')</label>
                            <input name="form_surname" id="form_surname" class="form-control @error('form_surname') is-invalid @enderror" type="text" value="{{ old('form_surname') }}">

                            @error('form_surname')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4 col-lg-3 form-input mt-4 mt-sm-0">
                            <label for="form_email">@lang('website.form-label-email') <span class="text-danger">*</span></label>
                            <input name="form_email" id="form_email" class="validate[required] form-control @error('form_email') is-invalid @enderror" type="text" value="{{ old('form_email') }}">

                            @error('form_email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4 col-lg-3 form-input mt-4 mt-sm-5 mt-lg-0">
                            <label for="form_phone">@lang('website.form-label-phone') <span class="text-danger">*</span></label>
                            <input name="form_phone" id="form_phone" class="validate[required] form-control @error('form_phone') is-invalid @enderror" type="text" value="{{ old('form_phone') }}">

                            @error('form_phone')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-12 col-sm-4 col-lg-3 form-input mt-4 mt-sm-5">
                            <label for="form_city">@lang('website.form-label-city')</label>
                            <input name="form_city" id="form_city" class="form-control @error('form_city') is-invalid @enderror" type="text" value="{{ old('form_city') }}">

                            @error('form_city')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4 col-lg-3 form-input mt-4 mt-sm-5">
                            <label for="form_street">@lang('website.form-label-street')</label>
                            <input name="form_street" id="form_street" class="form-control @error('form_street') is-invalid @enderror" type="text" value="{{ old('form_street') }}">

                            @error('form_street')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 form-input mt-4 mt-sm-5">
                            <label for="form_price">@lang('website.form-label-expected-price')</label>
                            <input name="form_price" id="form_price" class="form-control @error('form_price') is-invalid @enderror" type="text" value="{{ old('form_price') }}">

                            @error('form_price')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 form-input mt-4 mt-sm-5">
                            <label for="form_date">@lang('website.form-label-expected-sale-date')</label>
                            <input name="form_date" id="form_date" class="form-control @error('form_date') is-invalid @enderror" type="text" value="{{ old('form_date') }}">

                            @error('form_date')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-12 col-sm-6 form-input mt-4 mt-sm-5">
                            <label for="form_book">@lang('website.form-label-mortgage-number')</label>
                            <input name="form_book" id="form_book" class="form-control @error('form_book') is-invalid @enderror" type="text" value="{{ old('form_book') }}">

                            @error('form_book')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 form-input mt-4 mt-sm-5">
                            <label for="form_land">@lang('website.form-label-land-designation')</label>
                            <input name="form_land" id="form_land" class="form-control @error('form_land') is-invalid @enderror" type="text" value="{{ old('form_land') }}">

                            @error('form_land')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-12 mt-4 form-input">
                            <label for="form_message">@lang('website.form-label-additional-information') <span class="text-danger">*</span></label>
                            <textarea rows="5" cols="1" name="form_message" id="form_message" class="validate[required] form-control @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>

                            @error('form_message')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-xl-8">
                            @if($obligation)
                                <div class="rodo-obligation mt-3">
                                    {!! $obligation->obligation !!}
                                </div>
                            @endif
                            <div class="rodo-rules">
                                @foreach ($rules as $r)
                                    <div class="col-12 @error('rule_'.$r->id) is-invalid @enderror">
                                        <div class="rodo-rule clearfix">
                                            <input name="rule_{{$r->id}}" id="rule_{{$r->id}}" value="1" type="checkbox" @if($r->required === 1) class="validate[required]" @endif data-prompt-position="topLeft:0">
                                            <label for="rule_{{$r->id}}" class="rules-text">
                                                {!! $r->text !!}
                                                @error('rule_'.$r->id)
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 col-xl-4 d-flex justify-content-end align-items-end">
                            <div class="form-submit">
                                <input name="form_page" type="hidden" value="land-form">
                                <script type="text/javascript">
                                    document.write("<button type=\"submit\" class=\"g-recaptcha bttn bttn-icon\" data-sitekey=\"{{ config('services.recaptcha_v3.siteKey') }}\" data-callback=\"onRecaptchaSuccess\" data-action=\"submitContact\">@lang('website.button-send-message') <i class=\"ms-5 las la-chevron-circle-right\"></i></button>");
                                </script>
                                <noscript>Do poprawnego działania, Java musi być włączona.</noscript>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — makieta Figma "ZAKUP GRUNTÓW"
     Rozne wzgledem makiety, ustalone z Jackiem:
       - w sekcjach "Zyskaj pewnosc..." i "Prosta i bezpieczna sciezka..."
         zamiast ikonek leci rozwiazanie ze strony glownej: zdjecie + tytul,
         a opis wysuwa sie po najechaniu (.ip-trust-card),
       - reszta sekcji jak w makiecie; formularz zostaje z pelnym kompletem
         pol, bo pod te nazwy podpieta jest walidacja, RODO i wysylka maila.
     Teksty siedza w tablicach ponizej — ta podstrona nie ma ich w CMS-ie,
     tak samo jak stary widok mial je wpisane na sztywno.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    /* UWAGA: placeholder — makieta ma w tych miejscach ikonki, wiec zdjec do
       kart "Zyskaj pewnosc..." jeszcze nie ma. Do podmiany na fotografie gruntow. */
    $korzysci = [
        [
            'img'   => 'images/grunty-1.jpg',
            'title' => ['pl' => 'Bezpłatna wycena i audyt prawny', 'en' => 'Free valuation and legal audit'],
            'desc'  => [
                'pl' => 'Nasi analitycy bezpłatnie ocenią potencjał inwestycyjny Twojej działki i pomogą ustalić jej dokładny status formalno-prawny',
                'en' => 'Our analysts will assess the investment potential of your land free of charge and help determine its exact legal and administrative status',
            ],
        ],
        [
            'img'   => 'images/grunty-2.jpg',
            'title' => ['pl' => 'Wsparcie w formalnościach', 'en' => 'Support with formalities'],
            'desc'  => [
                'pl' => 'Interesują nas również grunty o nieunormowanej sytuacji. Przeprowadzimy Cię przez skomplikowane procedury urzędowe',
                'en' => 'We are also interested in land with unresolved legal or administrative issues. We will guide you through even the most complex official procedures',
            ],
        ],
        [
            'img'   => 'images/homepage/trust-card-3.jpg',
            'title' => ['pl' => 'Współpraca na równych warunkach', 'en' => 'Partnership on equal terms'],
            'desc'  => [
                'pl' => 'Każda nieruchomość jest inna. Dostosowujemy strukturę transakcji i terminy do indywidualnych potrzeb właściciela',
                'en' => 'Every property is unique. We tailor the transaction structure and timeline to the individual needs of each landowner',
            ],
        ],
    ];

    /* Zdjecia krokow: materialy_klienta/zakup_gruntow_1234 (09.2026), przyciete
       ze srodka do 3/4 i przeskalowane do 840x1120 — tyle maja karty .ip-trust-card.
       Wygenerowane przez AI, stad 'ai' => true i plakietka na karcie. */
    $sciezka = [
        [
            'num'   => '01.',
            'img'   => 'images/land/krok-1.jpg',
            'ai'    => true,
            'title' => ['pl' => 'Zgłoszenie gruntu', 'en' => 'Submit Your Land'],
            'desc'  => [
                'pl' => 'Wypełnij krótki formularz na dole strony, podając podstawowe parametry działki',
                'en' => 'Complete the short form at the bottom of the page and provide the basic details of your property',
            ],
        ],
        [
            'num'   => '02.',
            'img'   => 'images/land/krok-2.jpg',
            'ai'    => true,
            'title' => ['pl' => 'Bezpłatna analiza', 'en' => 'Free Analysis'],
            'desc'  => [
                'pl' => 'Nasz zespół ekspertów przeanalizuje potencjał terenu, dokumentację i przygotuje rynkową ofertę cenową',
                'en' => 'Our team of experts will assess the development potential of your land, review the relevant documentation, and prepare a competitive market-based offer',
            ],
        ],
        [
            'num'   => '03.',
            'img'   => 'images/land/krok-3.jpg',
            'ai'    => true,
            'title' => ['pl' => 'Decyzja i umowa', 'en' => 'Decision and Agreement'],
            'desc'  => [
                'pl' => 'Po akceptacji warunków przystępujemy do przygotowania transparentnej umowy notarialnej. Ty zyskujesz gwarancję szybkiej i bezpiecznej zapłaty',
                'en' => 'Once the terms have been accepted, we proceed with preparing a clear and transparent notarial agreement. You benefit from the assurance of fast and secure payment',
            ],
        ],
        [
            'num'   => '04.',
            'img'   => 'images/land/krok-4.jpg',
            'ai'    => true,
            'title' => ['pl' => 'Finalizacja', 'en' => 'Completion'],
            'desc'  => [
                'pl' => 'Nie musisz się martwić skomplikowanymi procedurami ani brakiem kompletnej dokumentacji',
                'en' => 'You do not need to worry about complex procedures or incomplete documentation',
            ],
        ],
    ];
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl'
                        ? 'Rozwiń potencjał swojej ziemi. Bezpieczna sprzedaż gruntów z Ippon Group'
                        : 'Unlock the potential of your land. A secure land sale with Ippon Group',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Zakup gruntu' : 'Land purchase', 'url' => null],
        ],
        'class'  => 'is-tall',
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    {{-- Korzysci — karty ze zdjeciem, opis wysuwa sie po najechaniu --}}
    <section class="ip-section ip-land-section">
        <div class="container">

            <x-section-head>
                {{ $L == 'pl' ? 'Zyskaj pewność, profesjonalizm i uczciwą wycenę' : 'Gain confidence, professional service, and a fair valuation' }}
            </x-section-head>

            <p class="ip-land-lead">
                @if($L == 'pl')
                    Sprzedaż działki deweloperowi to proces, który wymaga specjalistycznej wiedzy.<br>
                    Decydując się na współpracę z Ippon Group, zyskujesz pełne wsparcie ekspertów i unikalne korzyści:
                @else
                    Selling land to a property developer is a process that requires specialist expertise.<br>
                    By choosing to work with Ippon Group, you benefit from comprehensive expert support and a range of unique advantages:
                @endif
            </p>

            <div class="row ip-cards-row">
                @foreach($korzysci as $item)
                    <div class="col-12 col-md-6 col-xl-4">
                        <article class="ip-trust-card" tabindex="0">
                            <img src="{{ asset($item['img']) }}" alt="{{ $item['title'][$L] }}">
                            <div class="ip-trust-card-body">
                                <h3>{{ $item['title'][$L] }}</h3>
                                <div class="ip-trust-card-desc">
                                    <p>{{ $item['desc'][$L] }}</p>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Obszar naszego zainteresowania — tu ikonki zostaja, tak jak w makiecie --}}
    <section class="ip-section ip-land-section ip-land-area">
        <div class="container">

            <x-section-head>{{ $L == 'pl' ? 'Obszar naszego zainteresowania' : 'Areas of Interest' }}</x-section-head>

            <div class="row align-items-center">
                <div class="col-12 col-xl-6">
                    <p class="ip-land-intro">
                        @if($L == 'pl')
                            W ramach dynamicznej ekspansji na rynku nieruchomości poszukujemy gruntów spełniających poniższe kryteria:
                        @else
                            As part of our dynamic expansion in the real estate market, we are looking for land that meets the following criteria:
                        @endif
                    </p>

                    <ul class="ip-crit-list list-unstyled mb-0">
                        <li class="ip-crit-item">
                            <span class="ip-crit-icon">
                                <svg viewBox="0 0 32 32" fill="none" aria-hidden="true">
                                    <path d="M16 4.5c-4.2 0-7.6 3.35-7.6 7.5 0 5.65 6.8 13.8 7.1 14.15a.65.65 0 0 0 1 0c.3-.35 7.1-8.5 7.1-14.15 0-4.15-3.4-7.5-7.6-7.5Z" stroke="currentColor" stroke-width="1.4"/>
                                    <circle cx="16" cy="12" r="2.9" stroke="currentColor" stroke-width="1.4"/>
                                </svg>
                            </span>
                            <div class="ip-crit-text">
                                <h3>{{ $L == 'pl' ? 'Lokalizacja' : 'Location' }}</h3>
                                <p>
                                    @if($L == 'pl')
                                        Interesują nas atrakcyjne działki w miastach takich jak Olsztyn, Warszawa, Trójmiasto oraz w ich bezpośrednich okolicach
                                    @else
                                        We are interested in attractive development sites in cities such as Olsztyn, Warsaw and the Tri-City area, as well as in their immediate surroundings
                                    @endif
                                </p>
                            </div>
                        </li>

                        <li class="ip-crit-item">
                            <span class="ip-crit-icon">
                                <svg viewBox="0 0 32 32" fill="none" aria-hidden="true">
                                    <path d="M6 27V9.5l8-4.5 8 4.5V27M22 27V14h4v13M6 27h20M10.5 13h3M10.5 18h3M17 18h1.5M10.5 23h3M17 23h1.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <div class="ip-crit-text">
                                <h3>{{ $L == 'pl' ? 'Przeznaczenie' : 'Intended Use' }}</h3>
                                <p>
                                    @if($L == 'pl')
                                        Grunty pod wielorodzinne budownictwo mieszkaniowe (osiedla bloków, apartamentowce) oraz nieruchomości o potencjale komercyjnym (pod parki handlowe i obiekty street mall)
                                    @else
                                        Land designated for multi-family residential development (housing estates and apartment buildings), as well as properties with commercial potential for retail parks and street mall developments
                                    @endif
                                </p>
                            </div>
                        </li>

                        <li class="ip-crit-item">
                            <span class="ip-crit-icon">
                                <svg viewBox="0 0 32 32" fill="none" aria-hidden="true">
                                    <path d="M5 27h13M8.5 9.5l6-6 4.5 4.5-6 6-4.5-4.5ZM17 12l7.5 7.5M21.5 7.5 27 13M12.5 5.5 15 3M23 21.5 20.5 24" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <div class="ip-crit-text">
                                <h3>{{ $L == 'pl' ? 'Status' : 'Status' }}</h3>
                                <p>
                                    @if($L == 'pl')
                                        Działki objęte Miejscowym Planem Zagospodarowania Przestrzennego (MPZP), z wydanymi Warunkami Zabudowy (WZ), jak również tereny o statusie rolnym, leśnym lub poprzemysłowym wymagające transformacji
                                    @else
                                        Land covered by a Local Spatial Development Plan (MPZP), with valid Development Conditions (WZ), as well as agricultural, forest, or post-industrial land requiring redevelopment or a change of designated use
                                    @endif
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-xl-6">
                    <div class="ip-land-photo">
                        <img src="{{ asset('images/land/obszar-zainteresowania.jpg') }}"
                             alt="{{ $L == 'pl' ? 'Działka z zaznaczonymi granicami' : 'Plot with marked boundaries' }}"
                             width="851" height="700">
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Sciezka do finalizacji — karty ze zdjeciem, opis po najechaniu --}}
    <section class="ip-section ip-land-section">
        <div class="container">

            <x-section-head>
                {{ $L == 'pl' ? 'Prosta i bezpieczna ścieżka do finalizacji' : 'A Simple and Secure Path to Completion' }}
            </x-section-head>

            <div class="row ip-cards-row">
                @foreach($sciezka as $step)
                    <div class="col-12 col-md-6 col-xl-3">
                        <article class="ip-trust-card ip-step-card" tabindex="0">
                            {{-- ?v=filemtime: zdjecia krokow byly juz raz podmieniane pod ta sama
                                 nazwa, bez tego przegladarka trzyma stare z cache --}}
                            <img src="{{ asset($step['img']) }}?v={{ @filemtime(public_path($step['img'])) }}"
                                 alt="{{ $step['title'][$L] }}" width="840" height="1120">
                            {{-- Zdjecia krokow sa wygenerowane przez AI. Przy prawdziwej
                                 fotografii usun 'ai' z tablicy $sciezka.
                                 Wariant jasny, bo dol karty przykrywa gradient
                                 (.ip-trust-card:after, na dole rgba(0,0,0,.88)) —
                                 ciemna plakietka znika tam niezaleznie od zdjecia. --}}
                            @if(!empty($step['ai']))
                                <x-ai-badge light />
                            @endif
                            <div class="ip-trust-card-body">
                                <span class="ip-step-num">{{ $step['num'] }}</span>
                                <h3>{{ $step['title'][$L] }}</h3>
                                <div class="ip-trust-card-desc">
                                    <p>{{ $step['desc'][$L] }}</p>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Zglos swoja nieruchomosc — wspolny komponent sekcji kontaktowej --}}
    @include('layouts.partials.ip-contact-section', [
        'title'     => $L == 'pl' ? 'Zgłoś swoją nieruchomość' : 'Submit Your Property',
        'lead'      => $L == 'pl'
                        ? 'Nie musisz martwić się skomplikowanymi procedurami ani brakiem kompletnej dokumentacji. Zostaw nam podstawowe informacje – nasz ekspert skontaktuje się z Tobą, aby omówić szczegóły i zaproponować wstępną, <strong>bezpłatną wycenę</strong>.'
                        : 'You do not need to worry about complex procedures or incomplete documentation. Simply provide us with some basic information, and one of our experts will contact you to discuss the details and provide a <strong>preliminary valuation free of charge</strong>.',
        'form'      => 'front.land.ip-form',
        'page_name' => 'land-form',
        'class'     => 'pt-0',
    ])

@endsection
