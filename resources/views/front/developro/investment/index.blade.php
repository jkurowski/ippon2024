@extends('layouts.page', ['body_class' => 'no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => $investment->name, 'page' => $page, 'header_file' => 'zrealizowane.jpg'])
@stop

@section('content')
    <div id="page-content">
        <div class="container">
            <div class="col-12">
                {!! $investment->content !!}
            </div>
        </div>
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
    </div>
@endsection
