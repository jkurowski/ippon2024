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
    <div id="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! parse_text($page->content) !!}
                </div>
            </div>
        </div>

        <div id="commercials">
            <div class="container">
                @foreach($commercials as $c)
                    <div class="{{ $loop->even ? 'row' : 'row flex-row-reverse' }}">
                        <div class="col-12 col-xl-6">
                            @if($c->gallery_id)
                                {!! parse_text('[galeria=commercial]'.$c->gallery_id.'[/galeria]') !!}
                            @else
                                <div class="empty-ippon"></div>
                            @endif
                        </div>
                        <div class="col-12 col-xl-6 d-flex align-items-center mt-4 mt-xl-0">
                            <div class="commercials-text">
                                <h2>{{ $c->name }}</h2>
                                {!! $c->text !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — makieta Figma "OBIEKTY KOMERCYJNE"
     Uklad wierszy jak na podstronach mieszkaniowych (.ip-invrow), ale zamiast
     jednego zdjecia leci galeria z CMS-u — ta sama karuzela (responsiveSlides
     ze starego app.js) co na obecnej stronie, ze strzalkami.
     Miasta nie oznaczamy zlotym badge'em: jest w nazwie obiektu.
     W tablicy ponizej tylko napisy z szablonu — lead, nazwy i opisy obiektow
     tlumaczy sie w CMS-ie.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    $T = [
        /* EN jak w menu (resources/lang/en/website.php: menu-commercial-buildings) */
        'title'     => ['pl' => 'Obiekty komercyjne', 'en' => 'Commercial buildings'],
        'section_1' => ['pl' => 'Przestrzenie komercyjne i parki', 'en' => 'Commercial Spaces and'],
        'section_2' => ['pl' => 'handlowe typu street mall', 'en' => 'Street Mall Retail Parks'],
    ];
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $T['title'][$L],
        'crumbs' => [
            ['label' => $T['title'][$L], 'url' => null],
        ],
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')
    <section class="ip-com-intro">
        <div class="container">
            <x-section-head>
                {{ $T['section_1'][$L] }}
                    <span>{{ $T['section_2'][$L] }}</span>
            </x-section-head>

            {{-- lead z CMS-u (Strony → Obiekty komercyjne → tresc) --}}
            <div class="ip-com-lead">{!! parse_text($page->content) !!}</div>
        </div>
    </section>

    <section class="ip-invrows ip-comrows">
        @foreach($commercials as $c)
            <article class="ip-invrow @if($loop->even) is-reverse @endif">
                <div class="row g-0 align-items-center">

                    <div class="col-12 col-lg-7 ip-invrow-media">
                        @if($c->gallery_id)
                            {!! parse_text('[galeria=commercial]'.$c->gallery_id.'[/galeria]') !!}
                        @endif
                    </div>

                    <div class="col-12 col-lg-5 ip-invrow-body">
                        <div class="ip-invrow-inner">
                            <h2>{{ $c->name }}</h2>
                            <div class="ip-rule"></div>

                            @if($c->text)
                                <div class="ip-invrow-desc">{!! $c->text !!}</div>
                            @endif
                        </div>
                    </div>

                </div>
            </article>
        @endforeach
    </section>
@endsection
