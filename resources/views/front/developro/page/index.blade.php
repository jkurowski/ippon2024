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
                    {!! parse_text($investment_page->content) !!}
                </div>
            </div>
        </div>

        @if($investment_page->contact_form)
            <div class="container mt-0 mt-sm-5 pt-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Masz pytania?</span> <span class="abuget brown">Napisz do nas!</span></h2>
                    </div>
                </div>
            </div>
            @include('front.contact.form', [ 'page_name' => $investment->name.' - Kontakt'])
            <style>#contactForm{background:none}</style>
        @endif

        @if($investment_page->cta_text && $investment_page->cta_button && $investment_page->cta_link)
            <div id="cta">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="georgia text-center">{{ $investment_page->cta_text }}</h3>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-6 d-flex justify-content-center align-items-start">
                            <a href="{{ $investment_page->cta_link }}" class="bttn mb-0 mt-3">{{ $investment_page->cta_button }} <i class="ms-5 las la-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if(!$investment_page->contact_form)
                <div class="no-cta"></div>
            @endif
        @endif
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        AOS.init({disable: 'mobile'});
    </script>
@endpush
