@extends('layouts.page', ['body_class' => 'no-bottom contact-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <div class="container">
        <div class="row pb-4 pb-md-5">
            <div class="col-12 col-xl-4 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="" width="224" height="233" class="contact-logo">
            </div>
            <div class="col-12 col-md-6 col-xl-4 mb-4 mb-md-0">
                <div class="contact-box">
                    <h2>IPPON GROUP</h2>
                    <p>Ippon Group Sp. z o.o.</p>
                    <p>ul. Aleja Armii Ludowej 26, 8 piętro</p>
                    <p>00-609 Warszawa</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="contact-box">
                    <h2>KONTAKT</h2>
                    <p>ul. Żelazna 4,</p>
                    <p>10-419 Olsztyn</p>
                    <p>&nbsp;</p>
                    <p>Godziny otwarcia:</p>
                    <p>pn.-pt. 8:00 - 16:00</p>
                    <ul class="mb-0 list-unstyled icon-list-contact">
                        <li><img src="{{ asset('images/phone-icon-svg.svg') }}" alt=""> <a href="tel:+48895265558">+48 89 526 55 58</a></li>
                        <li><img src="{{ asset('images/envelop-icon-svg.svg') }}" alt=""> <a href="mailto:sekretariat@ippon.group">sekretariat@ippon.group</a></li>
                    </ul>
                    <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5" target="_blank">JAK DOJECHAĆ <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-md-6 col-xl-4 mb-4 mb-md-0">
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
            <div class="col-12 col-md-6 col-xl-8 d-flex align-items-center">
                <div class="d-flex align-items-center w-100">
                    <img src="{{ asset('/images/contact-img.jpg') }}" class="golden-border" alt="">
                    <div class="ps-4 ps-xxl-5 sellers">
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
    </div>

    <div class="container pt-4 mt-4 pt-md-5 mt-md-5">
        <div class="row">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase"><span class="text-gold">Masz pytania?</span> <br>Napisz do nas!</h2>
                @else
                    <h2 class="section-title text-uppercase"><span class="text-gold">Have more questions?</span> <br>Write to us!</h2>
                @endif
            </div>
        </div>
    </div>

    @include('front.contact.form', [ 'page_name' => 'Kontakt'])
@endsection
