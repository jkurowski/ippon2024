@extends('layouts.page', ['body_class' => 'ip-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

{{-- ==== STARY KOD — wylaczony, do usuniecia po odbiorze ==== --}}
@if(1 == 2)
@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => $page->title, 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    @include('front.developro.investment_shared.search-list')
@endsection
@endif
{{-- ==== KONIEC STAREGO KODU ==== --}}

{{-- ==========================================================================
     NOWY WIDOK — Wyszukiwarka lokali
     Stara wersja renderowala wszystkie lokale naraz, bez filtra na stronie
     (parametry dalo sie podac tylko z reki w URL-u). Teraz doszedl pasek
     filtrow (ten sam komponent co na stronie glownej) i wspolny wiersz
     lokalu; podzial na inwestycje i cala lista na jednej stronie zostaja
     jak dotad — bez stronicowania.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl' ? 'Wyszukiwarka mieszkań' : 'Apartment search',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Wyszukiwarka' : 'Search', 'url' => null],
        ],
        'lead'   => $L == 'pl'
                        ? 'Przeszukaj ofertę wszystkich inwestycji w sprzedaży — metraż, liczba pokoi, piętro.'
                        : 'Search the offer across all investments on sale — area, rooms, floor.',
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    <x-property-filter
        :investments="$investments"
        :rooms="$rooms"
        :floors="$floors"
        :areas="$areas"
        :submit="$L == 'pl' ? 'Szukaj' : 'Search'"
        class="ip-filter ip-filter-search"
    />

    <section class="ip-section ip-search-section">
        <div class="container">

            <div class="ip-search-bar">
                <p class="ip-search-count">
                    @if($properties->count() > 0)
                        {{ $L == 'pl' ? 'Znaleziono' : 'Found' }}
                        <strong>{{ $properties->count() }}</strong>
                        {{ $L == 'pl' ? 'lokali' : 'units' }}
                    @else
                        {{ $L == 'pl' ? 'Brak lokali spełniających kryteria' : 'No units match your criteria' }}
                    @endif
                </p>

                @if(request()->hasAny(['inwestycja', 'rooms', 'status', 'floor', 'area']))
                    <a href="{{ route('search', ['locale' => $L]) }}" class="ip-search-reset">
                        {{ $L == 'pl' ? 'Wyczyść filtry' : 'Clear filters' }}
                    </a>
                @endif
            </div>

            @if($properties->count() > 0)
                @foreach($grouped as $group)
                    <div class="ip-search-group">
                        <h2 class="ip-search-group-title">
                            {{ $group['investment']->name }}
                            <span>{{ $group['properties']->count() }}
                                {{ $L == 'pl' ? 'lokali' : 'units' }}</span>
                        </h2>

                        <div class="ip-prop-list">
                            @foreach($group['properties'] as $room)
                                <x-property-row :room="$room" :investment="$group['investment']" />
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <p class="ip-news-empty">
                    {{ $L == 'pl'
                        ? 'Zmień kryteria wyszukiwania albo zajrzyj do pełnej oferty.'
                        : 'Change your criteria or browse the full offer.' }}
                </p>

                <div class="text-center">
                    <a href="{{ route('developro.current', ['locale' => $L]) }}" class="ip-btn-gold-lg">
                        {{ $L == 'pl' ? 'Zobacz inwestycje' : 'See investments' }}
                    </a>
                </div>
            @endif

        </div>
    </section>

@endsection

@push('scripts')
    <script>
        /* dymki przy ikonkach atutow lokalu */
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));
    </script>
@endpush
