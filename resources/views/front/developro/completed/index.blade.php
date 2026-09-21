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
                <div class="col-12 mb-2 mb-lg-5">
                    {!! parse_text($page->content) !!}
                </div>
            </div>
            <div class="row justify-content-center">



                @foreach($investments as $r)
                    <div class="col-12 col-lg-6">
                        <div class="invest-item-holder">
                            <div class="invest-item position-relative">
                                <span class="img-badge">{{ investmentStatus(2) }}</span>
                                <div class="invest-item-thumb">
                                    @if($r->carousel->count() > 0)
                                        <div class="textSlider commercial-slider">
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($r->carousel as $p)
                                                    <li>
                                                        <picture>
                                                            <source type="image/webp" srcset="{{asset('uploads/gallery/images/webp/'.$p->file_webp) }}">
                                                            <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/'.$p->file) }}">
                                                            <img src="{{asset('uploads/gallery/images/'.$p->file) }}" alt="{{ $p->name }}">
                                                        </picture>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                    <div class="img-overflow">
                                        <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                    </div>
                                    @endif
                                </div>
                                <div class="invest-item-desc">
                                    <div class="invest-item-header">
                                        <h2 class="mb-0">{{ $r->name }}</h2>
                                        @if($r->address)
                                            <div class="invest-item-city">{{ $r->address }}</div>
                                        @else
                                            <div class="invest-item-city"> &nbsp;</div>
                                        @endif
                                    </div>
                                    @if($r->file_logo)
                                        <img src="{{ asset('investment/logo/'.$r->file_logo) }}" alt="Logo {{ $r->name }}">
                                    @endif
                                    <p>{!! $r->entry_content !!}</p>
                                </div>
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
     NOWY WIDOK — makieta Figma "MIESZKANIA ZREALIZOWANE V2"
     Rozne wzgledem makiety, ustalone z Jackiem/klientem:
       - nie ma sekcji nad przyciskami miast (tresc zaczyna sie od filtra),
       - nie ma dropdownu "Sortuj" — patrz komentarz przy filtrze,
       - zamiast trzech piktogramow (budynki / mieszkania / powierzchnie)
         leci krotki opis; adres i rok zakonczenia zostaja,
       - zdjecia w kartach maja karuzele, tak jak na obecnej stronie.
     ========================================================================== --}}
@php
    $ipBadge = $current_locale == 'pl' ? 'Zrealizowane' : 'Completed';
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $current_locale == 'pl' ? 'Inwestycje zrealizowane' : 'Completed investments',
        'crumbs' => [
            ['label' => $current_locale == 'pl' ? 'Inwestycje zrealizowane' : 'Completed investments', 'url' => null],
        ],
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')
    <section class="ip-done-section">
        <div class="container">

            {{-- Filtr miast. Przyciski buduje kontroler z danych, wiec dopoki
                 zrealizowane inwestycje sa tylko w Olsztynie, widac sam Olsztyn.
                 "Wszystkie" ma sens dopiero przy drugim miescie i wtedy pojawia
                 sie samo. Sortowania z makiety swiadomie nie ma — `date_end`
                 jest wolnym tekstem i u wszystkich rekordow jest puste. --}}
            @if($filterCities->count() > 0)
                <nav class="ip-city-tabs ip-city-tabs-left">
                    @if($filterCities->count() > 1)
                        <a href="{{ route('developro.completed', ['locale' => $current_locale]) }}"
                           class="{{ !$activeCity ? 'is-active' : '' }}">Wszystkie</a>
                    @endif

                    @foreach($filterCities as $c)
                        <a href="{{ route('developro.completed', ['locale' => $current_locale, 'miasto' => $c->slug]) }}"
                           class="{{ ($activeCity && $activeCity->id == $c->id) || $filterCities->count() == 1 ? 'is-active' : '' }}">{{ $c->name }}</a>
                    @endforeach
                </nav>
            @endif

            <div class="row ip-done-row">

                @foreach($investments as $r)
                    @php $url = investmentUrl($r); @endphp
                    <div class="col-12 col-md-6 col-xl-4">
                        <article class="ip-card ip-done-card">

                            <div class="ip-card-media ip-done-media">
                                @if($r->carousel->count() > 0)
                                    <div class="textSlider commercial-slider">
                                        <ul class="list-unstyled mb-0">
                                            @foreach($r->carousel as $p)
                                                <li>
                                                    <picture>
                                                        <source type="image/webp" srcset="{{ asset('uploads/gallery/images/webp/'.$p->file_webp) }}">
                                                        <source type="image/jpeg" srcset="{{ asset('uploads/gallery/images/'.$p->file) }}">
                                                        <img src="{{ asset('uploads/gallery/images/'.$p->file) }}" alt="{{ $p->name }}">
                                                    </picture>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @elseif($r->file_thumb)
                                    <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                @endif
                                <span class="ip-done-badge">{{ $ipBadge }}</span>
                            </div>

                            <div class="ip-card-body ip-done-body">
                                <div class="ip-done-head">
                                    <div class="ip-done-head-main">
                                        {{-- Zrealizowane maja wlasna podstrone tylko wtedy,
                                             gdy klient wpisze ja w polu "Adres URL" (np. Aurora
                                             ma osobny serwis) — inaczej sam tytul, bez linku. --}}
                                        <h2 class="ip-done-title">
                                            @if($url)<a {!! investmentLinkAttrs($url) !!}>{{ $r->name }}</a>@else{{ $r->name }}@endif
                                        </h2>
                                        @if($r->address)
                                            <span class="ip-done-address">
                                                @include('layouts.partials.ip-pin')
                                                {{ $r->address }}
                                            </span>
                                        @endif

                                        {{-- Etap: budynki oddane w tym etapie. Osobne pole w CMS-ie,
                                             bo wczesniej klient wpisywal je w adres. --}}
                                        @if($r->stage)
                                            <span class="ip-done-stage">
                                                @include('layouts.partials.ip-building')
                                                {{ $r->stage }}
                                            </span>
                                        @endif
                                    </div>

                                    {{-- rok z pola "Termin zakonczenia inwestycji" (CMS) --}}
                                    @if($r->date_end)
                                        <div class="ip-done-end">
                                            <span>{{ $current_locale == 'pl' ? 'Zakończenie' : 'Completion' }}</span>
                                            <strong>{{ $r->date_end }}</strong>
                                        </div>
                                    @endif
                                </div>

                                @if($r->entry_content)
                                    <div class="ip-done-desc">{!! $r->entry_content !!}</div>
                                @endif
                            </div>

                        </article>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
