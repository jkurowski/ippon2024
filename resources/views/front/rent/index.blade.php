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
            <div class="row justify-content-center">
                @foreach($rents as $r)
                    <div class="col-12 col-lg-6">
                        <div class="rent-item">
                            <div class="rent-thumb img-overflow">
                                <span class="img-badge">{{ rentType($r->type) }}</span>
                                <a href="{{ route('rent.index.show', ['slug' => $r->slug, 'id' => $r->id]) }}">
                                    <img src="{{ asset('uploads/rents/'.$r->file) }}" alt="{{ $r->name }}">
                                </a>
                            </div>
                            <h2 class="mb-0">
                                <a href="{{ route('rent.index.show', ['slug' => $r->slug, 'id' => $r->id]) }}">{{ $r->name }}</a>
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — Wynajem (lista lokali)
     Kafle na komponencie .ip-card ze strony glownej: zdjecie, zloty badge
     z rodzajem powierzchni, tytul, metraz i przycisk do szczegolow.
     Dane bez zmian — model Rent (CMS).
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl' ? 'Wynajem' : 'For rent',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Wynajem' : 'For rent', 'url' => null],
        ],
        'lead'   => $L == 'pl'
                        ? 'Powierzchnie handlowe, usługowe i magazynowe w naszych obiektach. Sprawdź, co jest dostępne.'
                        : 'Retail, service and storage space in our buildings. See what is available.',
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')
    <section class="ip-section ip-rent-section">
        <div class="container">

            @if($rents->count() > 0)
                <div class="row ip-cards-row justify-content-center">
                    @foreach($rents as $r)
                        @php $url = route('rent.index.show', ['slug' => $r->slug, 'id' => $r->id]); @endphp

                        <div class="col-12 col-md-6 col-xl-4">
                            <article class="ip-card ip-rent-card">

                                <a href="{{ $url }}" class="ip-card-media">
                                    @if($r->file)
                                        <img src="{{ asset('uploads/rents/'.$r->file) }}" alt="{{ $r->name }}">
                                    @endif
                                    <span class="ip-card-badge">{{ rentType($r->type) }}</span>
                                </a>

                                <div class="ip-card-body">
                                    @if($r->area)
                                        <span class="ip-card-address">{{ $r->area }} m²</span>
                                    @endif

                                    <h2 class="ip-card-title">
                                        <a href="{{ $url }}">{{ $r->name }}</a>
                                    </h2>

                                    <div class="ip-card-actions">
                                        <a href="{{ $url }}" class="ip-btn-outline">
                                            {{ $L == 'pl' ? 'Zobacz szczegóły' : 'See details' }}
                                        </a>
                                    </div>
                                </div>

                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="ip-rent-empty">
                    {{ $L == 'pl'
                        ? 'Aktualnie nie mamy wolnych powierzchni — napisz na mieszkania@ippon.group, damy znać, gdy coś się zwolni.'
                        : 'There is no space available at the moment — write to mieszkania@ippon.group and we will let you know when something frees up.' }}
                </p>
            @endif

        </div>
    </section>
@endsection
