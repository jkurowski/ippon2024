@extends('layouts.page', ['body_class' => 'no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.developro-header', [
    'investmentName' => $investment->name,
    'investmentSlug' => $investment->slug,
    'investmentPages' => $investment->pages,
    'investmentLogo' => $investment->file_logo,
    'investmentHeader' => $investment->file_header,
    'header_file' => 'zrealizowane.jpg'
    ])
@stop

@section('content')
    <div id="page-content" class="invest-{{ $investment->slug }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! $investment->content !!}
                </div>
            </div>
        </div>
        @if($investment->id <> 6 && $investment->id <> 7)
        <div id="cta">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="georgia text-center">Zainteresowany? Sprawdź naszą ofertę</h3>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 d-flex justify-content-center align-items-start">
                        <a href="#" class="bttn mb-0 mt-3">Lokalizacja <i class="ms-5 las la-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection