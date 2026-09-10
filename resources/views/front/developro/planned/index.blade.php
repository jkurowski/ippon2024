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
                @foreach($investments as $r)
                    <div class="col-12 col-lg-6">
                        <div class="invest-item-holder">
                            <div class="invest-item position-relative">
                                <span class="img-badge">{{ investmentStatus(3) }}</span>
                                <div class="invest-item-thumb img-overflow">
                                    @if($r->developro)
                                    <a href="{{ route('developro.investment.index', $r->slug) }}">
                                        <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                    </a>
                                    @else
                                        <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                    @endif
                                </div>
                                <div class="invest-item-desc">
                                    <div class="invest-item-header">
                                        @if($r->developro)
                                        <h2 class="mb-0">
                                            <a href="{{ route('developro.investment.index', $r->slug) }}">{{ $r->name }}</a>
                                        </h2>
                                        @else
                                            <h2 class="mb-0">{{ $r->name }}</h2>
                                        @endif
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
     NOWY WIDOK — makieta Figma "MIESZKANIA PLANOWANE"
     ========================================================================== --}}
@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => 'Mieszkania planowane',
        'crumbs' => [
            ['label' => 'Mieszkania', 'url' => null],
            ['label' => 'Planowane',  'url' => null],
        ],
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')
    @include('front.developro.partials.investment-rows', ['investments' => $investments])
@endsection
