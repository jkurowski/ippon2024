@extends('layouts.page', ['body_class' => 'investment-contact no-bottom'])

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
    <div id="page-content">
        <div class="container">
            @if($investment->id <> 5)
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="contact-box">
                        {!! $investment_page->content !!}
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="ps-0 ps-xl-3 ps-xxl-5">
                        @include('front.contact.form', ['page_name' => $investment->name.' - Kontakt'])
                        <style>#contactForm {background:none}</style>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="rostemary brown"><span>Kontakt</span></h1>
                </div>
            </div>

            <div class="row mt-3 mt-sm-5">
                <div class="col-12 col-xxl-4 order-2 order-xxl-1">
                    <div class="contact-box">
                        <h2>BIURO SPRZEDAŻY</h2>
                        <p>ul. Żelazna 4,</p>
                        <p>10-419 Olsztyn</p>
                        <p>&nbsp;</p>
                        <p>Godziny otwarcia:</p>
                        <p>pn.-pt. 9:00 - 17:00</p>
                        <ul class="mb-0 list-unstyled icon-list-contact">
                            <li><img src="{{ asset('images/envelop-icon-svg.svg') }}" alt=""> <a href="mailto:mieszkania@ippon.group">mieszkania@ippon.group</a></li>
                        </ul>
                        <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5" target="_blank">JAK DOJECHAĆ <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xxl-8 order-1 order-xxl-2 mb-4 mb-xxl-0">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                        <img src="{{ asset('/images/contact-img.jpg') }}" class="golden-border d-none d-lg-block" alt="">
                        <div class="ps-0 ps-lg-5 sellers text-center text-lg-start">
                            <h2>Sylwia Sokal</h2>
                            <a href="mailto:s.sokal@ippon.Group">s.sokal@ippon.group</a>
                            <a href="tel:+48724222323"><strong>+48 724 222 323</strong></a>
                            <hr>
                            <h2>Elżbieta Kalinowska</h2>
                            <a href="mailto:e.kalinowska@ippon.group">e.kalinowska@ippon.group</a>
                            <a href="tel:+48609884219"><strong>+48 609 884 219</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        @if($investment->id == 5)
            <div id="contactForm">
                <div class="container">
                    <div class="row pt-5 mt-0 mt-sm-5">
                        <div class="col-12 text-center">
                            <h2 class="slow-header"><span class="abuget brown">Masz pytania?</span> <span class="rostemary">Napisz do nas!</span></h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            @include('front.contact.form', ['page_name' => $investment->name.' - Kontakt'])
                        </div>
                        <style>#contactForm #contactForm {background:none}</style>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
