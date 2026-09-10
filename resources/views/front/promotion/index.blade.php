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
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="col-12 mt-5">
                        <div class="accordion" id="discounts">
                            @foreach ($list as $item)
                                <div class="accordion-item">
                                    <div class="accordion-header" id="heading{{$item->id}}" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="false" aria-controls="collapse{{$item->id}}">
                                        <div class="row">
                                            <div class="col-12 col-sm-3 d-flex justify-content-center align-items-center">
                                                <img src="/uploads/promotions/{{$item->file}}" alt="{{$item->name}}">
                                            </div>
                                            <div class="col-12 col-sm-9">
                                                <div class="accordion-text">
                                                    <h2>{{ $item->name }}</h2>
                                                    <p>{!! $item->text !!}</p>
                                                    <p class="bttn bttn-icon mt-3">@lang('website.button-discount-code') <i class="ms-3 las la-plus-circle"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="collapse{{$item->id}}" class="collapse" aria-labelledby="heading{{$item->id}}" data-bs-parent="#discounts">
                                        <div class="row">
                                            <div class="col-12 col-sm-3 col-accordion-code">
                                                <div class="accordion-code">{{$item->discount}}</div>
                                            </div>
                                            <div class="col-12 col-sm-9">
                                                <div class="accordion-desc">{!! $item->description !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
{{-- ==== KONIEC STAREGO KODU ==== --}}

{{-- ==========================================================================
     NOWY WIDOK — Rabaty
     Tresc wstepna leci z CMS-u (Page 4). Kazdy rabat to karta z rozwijanym
     kodem — kod pokazuje sie dopiero po kliknieciu, tak jak dotad.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $page->title ?: ($L == 'pl' ? 'Rabaty' : 'Discounts'),
        'crumbs' => [
            ['label' => $page->title ?: ($L == 'pl' ? 'Rabaty' : 'Discounts'), 'url' => null],
        ],
        'lead'   => $L == 'pl'
                        ? 'Zniżki dla tych, którzy budują z nami więcej niż jedno mieszkanie.'
                        : 'Discounts for those who build more than one apartment with us.',
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    @if(trim(strip_tags($page->content)) !== '')
        <section class="ip-section ip-promo-intro pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-9">
                        <div class="ip-cms text-center">
                            {!! parse_text($page->content) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="ip-section ip-promo-section">
        <div class="container">

            <x-section-head>
                {{ $L == 'pl' ? 'Dostępne rabaty' : 'Available discounts' }}
            </x-section-head>

            @if($list->count() > 0)
                <div class="accordion ip-promo-list" id="promoAccordion">
                    @foreach ($list as $item)
                        <div class="accordion-item ip-promo-item">
                            <h3 class="accordion-header" id="promoHead{{ $item->id }}">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#promoBody{{ $item->id }}"
                                        aria-expanded="false" aria-controls="promoBody{{ $item->id }}">

                                    @if($item->file)
                                        <span class="ip-promo-media">
                                            <img src="{{ asset('uploads/promotions/'.$item->file) }}" alt="{{ $item->name }}" loading="lazy">
                                        </span>
                                    @endif

                                    <span class="ip-promo-head">
                                        <span class="ip-promo-name">{{ $item->name }}</span>
                                        @if($item->text)
                                            <span class="ip-promo-text">{!! $item->text !!}</span>
                                        @endif
                                        <span class="ip-promo-cta">@lang('website.button-discount-code')</span>
                                    </span>
                                </button>
                            </h3>

                            <div id="promoBody{{ $item->id }}" class="accordion-collapse collapse"
                                 aria-labelledby="promoHead{{ $item->id }}" data-bs-parent="#promoAccordion">
                                <div class="accordion-body">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-4">
                                            <div class="ip-promo-code">{{ $item->discount }}</div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="ip-cms ip-promo-desc">{!! $item->description !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="ip-news-empty">
                    {{ $L == 'pl' ? 'Aktualnie nie prowadzimy żadnej promocji.' : 'There are no active promotions right now.' }}
                </p>
            @endif

        </div>
    </section>

    @include('layouts.partials.ip-contact-section', [
        'title'     => $L == 'pl' ? 'Chcesz skorzystać z rabatu?' : 'Want to use a discount?',
        'lead'      => $L == 'pl'
                        ? 'Napisz, którą inwestycją jesteś zainteresowany — sprawdzimy, co możemy dla Ciebie zrobić. <strong>Odpowiadamy w dni robocze.</strong>'
                        : 'Tell us which investment you are interested in and we will check what we can do. <strong>We reply on business days.</strong>',
        'form'      => 'front.contact.ip-form',
        'page_name' => 'Rabaty',
        'class'     => 'pt-0',
    ])

@endsection
