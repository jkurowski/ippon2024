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
    <div class="container">
        <div class="row pb-4 pb-md-5">
            <div class="col-12 col-xl-4 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="" width="224" height="233" class="contact-logo">
            </div>
            <div class="col-12 col-md-6 col-xl-4 mb-4 mb-md-0">
                <div class="contact-box">
                    <h2>IPPON GROUP</h2>
                    <p>Ippon Group Sp. z o.o.</p>
                    <p>ul. Aleja Armii Ludowej 26, 8 piętro</p>
                    <p>00-609 Warszawa</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="contact-box">
                    @if($current_locale == 'pl')
                    <h2>KONTAKT</h2>
                    @else
                        <h2>CONTACT</h2>
                    @endif
                    <p>ul. Żelazna 4,</p>
                    <p>10-419 Olsztyn</p>
                    <p>&nbsp;</p>
                        @if($current_locale == 'pl')
                    <p>Godziny otwarcia:</p>
                        @else
                    <p>Opening hours:</p>
                        @endif
                    <p>pn.-pt. 8:00 - 16:00</p>
                    <ul class="mb-0 list-unstyled icon-list-contact">
                        <li><img src="{{ asset('images/phone-icon-svg.svg') }}" alt=""> <a href="tel:+48895265558">+48 89 526 55 58</a></li>
                        <li><img src="{{ asset('images/envelop-icon-svg.svg') }}" alt=""> <a href="mailto:sekretariat@ippon.group">sekretariat@ippon.group</a></li>
                    </ul>
                        @if($current_locale == 'pl')
                    <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5" target="_blank">JAK DOJECHAĆ <i class="ms-3 las la-chevron-circle-right"></i></a>
                        @else
                    <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5" target="_blank">HOW TO GET TO US <i class="ms-3 las la-chevron-circle-right"></i></a>
                        @endif
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-md-6 col-xl-4 mb-4 mb-md-0">
                <div class="contact-box">
                    @if($current_locale == 'pl')
                    <h2>BIURO SPRZEDAŻY</h2>
                    @else
                    <h2>SALES OFFICE</h2>
                    @endif
                    <p>ul. Żelazna 4,</p>
                    <p>10-419 Olsztyn</p>
                    <p>&nbsp;</p>
                        @if($current_locale == 'pl')
                            <p>Godziny otwarcia:</p>
                        @else
                            <p>Opening hours:</p>
                        @endif
                    <p>pn.-pt. 9:00 - 17:00</p>
                    <ul class="mb-0 list-unstyled icon-list-contact">
                        <li><img src="{{ asset('images/envelop-icon-svg.svg') }}" alt=""> <a href="mailto:mieszkania@ippon.group">mieszkania@ippon.group</a></li>
                    </ul>
                        @if($current_locale == 'pl')
                            <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5" target="_blank">JAK DOJECHAĆ <i class="ms-3 las la-chevron-circle-right"></i></a>
                        @else
                            <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5" target="_blank">HOW TO GET TO US <i class="ms-3 las la-chevron-circle-right"></i></a>
                        @endif
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-8 d-flex align-items-center">
                <div class="d-flex align-items-center w-100">
                    <img src="{{ asset('/images/contact-img.jpg') }}" class="golden-border" alt="">
                    <div class="ps-4 ps-xxl-5 sellers">
                        <h2>Elżbieta Kalinowska</h2>
                        <a href="mailto:e.kalinowska@ippon.group">e.kalinowska@ippon.group</a>
                        <a href="tel:+48724222323"><strong>+48 724 222 323</strong></a>
                        <br>
                        <h2>Iwona Schubert</h2>
                        <a href="mailto:i.schubert@ippon.group">i.schubert@ippon.group</a>
                        <a href="tel:+48609884219"><strong>+48 609 884 219</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-4 mt-4 pt-md-5 mt-md-5">
        <div class="row">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase"><span class="text-gold">Masz pytania?</span> <br>Napisz do nas!</h2>
                @else
                    <h2 class="section-title text-uppercase"><span class="text-gold">Have more questions?</span> <br>Write to us!</h2>
                @endif
            </div>
        </div>
    </div>

    @include('front.contact.form', [ 'page_name' => 'Kontakt'])
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — Kontakt
     Makiety do tej podstrony nie ma, uklad zlozony z komponentow uzytych na
     pozostalych podstronach:
       - karty biur (siedziba, sekretariat, biuro sprzedazy) w rytmie kafli,
       - sekcja kontaktowa (ten sam komponent co na /o-nas i /zakup-gruntu),
         tylko w lewej kolumnie zamiast adresow leci zespol biura sprzedazy —
         adresy sa wyzej i nie ma sensu ich dublowac.
     Dane teleadresowe przepisane ze starego widoku, bez zmian.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    $mapa = 'https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87';

    $biura = [
        [
            'title' => ['pl' => 'Ippon Group', 'en' => 'Ippon Group'],
            'sub'   => ['pl' => 'Siedziba spółki', 'en' => 'Registered office'],
            'lines' => ['Ippon Group Sp. z o.o.', 'ul. Aleja Armii Ludowej 26, 8 piętro', '00-609 Warszawa'],
            /* ten kafelek nie ma przycisku "jak dojechac", wiec dol wypelnia logo */
            'logo'  => 'images/logo.png',
            'hours' => null,
            'phone' => null,
            'mail'  => null,
            'map'   => null,
        ],
        [
            'title' => ['pl' => 'Sekretariat', 'en' => 'Secretariat'],
            'sub'   => ['pl' => 'Olsztyn', 'en' => 'Olsztyn'],
            'lines' => ['ul. Żelazna 4', '10-419 Olsztyn'],
            'hours' => ['pl' => 'pn.–pt. 8:00–16:00', 'en' => 'Mon–Fri 8:00–16:00'],
            'phone' => ['label' => '+48 89 526 55 58', 'href' => 'tel:+48895265558'],
            'mail'  => ['label' => 'sekretariat@ippon.group', 'href' => 'mailto:sekretariat@ippon.group'],
            'map'   => $mapa,
        ],
        [
            'title' => ['pl' => 'Biuro sprzedaży', 'en' => 'Sales office'],
            'sub'   => ['pl' => 'Olsztyn', 'en' => 'Olsztyn'],
            'lines' => ['ul. Żelazna 4', '10-419 Olsztyn'],
            'hours' => ['pl' => 'pn.–pt. 9:00–17:00', 'en' => 'Mon–Fri 9:00–17:00'],
            /* telefony do biura sprzedazy sa nizej, przy osobach — jak na obecnej stronie */
            'phone' => null,
            'mail'  => ['label' => 'mieszkania@ippon.group', 'href' => 'mailto:mieszkania@ippon.group'],
            'map'   => $mapa,
        ],
    ];
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl' ? 'Kontakt' : 'Contact',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Kontakt' : 'Contact', 'url' => null],
        ],
        'lead'   => $L == 'pl'
                        ? 'Jesteśmy do Twojej dyspozycji — zadzwoń, napisz albo wpadnij do biura sprzedaży.'
                        : 'We are at your disposal — call us, write to us or drop by the sales office.',
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    {{-- Biura --}}
    <section class="ip-section ip-offices-section">
        <div class="container">

            <x-section-head>{{ $L == 'pl' ? 'Nasze biura' : 'Our offices' }}</x-section-head>

            <div class="row ip-cards-row">
                @foreach($biura as $biuro)
                    <div class="col-12 col-md-6 col-xl-4">
                        <article class="ip-office">
                            <span class="ip-office-sub">{{ $biuro['sub'][$L] }}</span>
                            <h3 class="ip-office-title">{{ $biuro['title'][$L] }}</h3>
                            <div class="ip-rule"></div>

                            {{-- bez .mb-0 — bootstrapowe !important zjadlo odstep nad przyciskiem --}}
                            <ul class="ip-office-list list-unstyled">
                                <li>
                                    @include('layouts.partials.ip-pin')
                                    <span>
                                        @foreach($biuro['lines'] as $line)
                                            {{ $line }}@if(!$loop->last)<br>@endif
                                        @endforeach
                                    </span>
                                </li>

                                @if($biuro['hours'])
                                    <li>
                                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5"/><path d="M12 7v5.2l3.4 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                        <span>{{ $biuro['hours'][$L] }}</span>
                                    </li>
                                @endif

                                @if($biuro['phone'])
                                    <li>
                                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6.2 3.8h3l1.5 3.7-2 1.4a11.5 11.5 0 0 0 5.4 5.4l1.4-2 3.7 1.5v3a1.8 1.8 0 0 1-2 1.8C10.8 18.9 5.1 13.2 4.4 5.8a1.8 1.8 0 0 1 1.8-2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
                                        <a href="{{ $biuro['phone']['href'] }}">{{ $biuro['phone']['label'] }}</a>
                                    </li>
                                @endif

                                @if($biuro['mail'])
                                    <li>
                                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="5.5" width="18" height="13" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="m3.8 7 8.2 6 8.2-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                        <a href="{{ $biuro['mail']['href'] }}">{{ $biuro['mail']['label'] }}</a>
                                    </li>
                                @endif
                            </ul>

                            @if(!empty($biuro['logo']))
                                <img class="ip-office-logo" src="{{ asset($biuro['logo']) }}" alt="Ippon Group" width="224" height="233">
                            @endif

                            @if($biuro['map'])
                                <a href="{{ $biuro['map'] }}" class="ip-btn-outline" target="_blank" rel="noopener">
                                    {{ $L == 'pl' ? 'Jak dojechać' : 'How to get there' }}
                                </a>
                            @endif
                        </article>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Formularz + zespol biura sprzedazy --}}
    @include('layouts.partials.ip-contact-section', [
        'title'     => $L == 'pl' ? 'Masz pytania? Napisz do nas!' : 'Any questions? Write to us!',
        'lead'      => $L == 'pl'
                        ? 'Odpowiadamy na wiadomości w dni robocze. Jeśli sprawa jest pilna – <strong>zadzwoń do biura sprzedaży.</strong>'
                        : 'We reply on business days. If the matter is urgent – <strong>call the sales office.</strong>',
        'form'      => 'front.contact.ip-form',
        'page_name' => 'Kontakt',
        'aside'     => 'front.contact.ip-sales',
        'class'     => 'pt-0',
    ])

@endsection
