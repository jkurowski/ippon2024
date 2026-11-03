@extends('layouts.page', ['body_class' => 'ip-page'])

@section('meta_title', $rent->name)
@section('seo_title', $rent->meta_title)
@section('seo_description', $rent->meta_description)
@section('seo_robots', $rent->meta_robots)

{{-- ==== STARY KOD — wylaczony, do usuniecia po odbiorze ==== --}}
@if(1 == 2)
@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center rent-item-detail">
            <div class="col-12 col-xxl-6">
                <img src="{{ asset('uploads/rents/'.$rent->file) }}" alt="{{ $rent->name }}" class="mt-4 mb-sm-5 w-100">
                <h2 class="mb-3">{{ $rent->name }}</h2>
                {!! parse_text($rent->text) !!}
                <a href="{{ route('rent') }}" class="bttn mt-4">@lang('website.button-back-to-list')</a>
            </div>
        </div>
    </div>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — Wynajem (szczegoly lokalu)
     Zdjecie i opis z CMS-u, pod spodem sekcja kontaktowa — pytania o lokal
     ida tym samym formularzem co reszta serwisu (form_page = Wynajem).
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $rent->name,
        'class'  => 'is-tall',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Wynajem' : 'For rent', 'url' => route('rent', ['locale' => $L])],
            ['label' => rentType($rent->type), 'url' => null],
        ],
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    @include('front.rent.partials.detail', ['rent' => $rent])

    {{-- Zapytaj o lokal — ten sam komponent co na pozostalych podstronach --}}
    @include('layouts.partials.ip-contact-section', [
        'title'     => $L == 'pl' ? 'Zapytaj o ten lokal' : 'Ask about this space',
        'lead'      => $L == 'pl'
                        ? 'Chcesz obejrzeć powierzchnię albo poznać warunki najmu? <strong>Napisz lub zadzwoń — odpowiadamy w dni robocze.</strong>'
                        : 'Would you like to view the space or learn the terms? <strong>Write or call — we reply on business days.</strong>',
        'form'      => 'front.contact.ip-form',
        'page_name' => 'Wynajem: '.$rent->name,
        'class'     => 'pt-0',
        'info'      => 'both', /* uwaga klienta 2.11.2026: sekretariat jak na SG */
    ])

@endsection
