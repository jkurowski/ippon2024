@extends('layouts.page', ['body_class' => 'no-bottom contact-page'])

@section('meta_title', 'Kontakt')
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => 'contact.jpg'])
@stop

@section('content')
    <div class="container">
        <div class="row pb-5">
            <div class="col-4 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="" width="224" height="233">
            </div>
            <div class="col-4">
                <div class="contact-box">
                    <h2>IPPON GROUP</h2>
                    <p>Ippon Group Sp. z o.o.</p>
                    <p>ul. Warecka 11 a,</p>
                    <p>00-034 Warszawa</p>
                </div>
            </div>
            <div class="col-4">
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
            <div class="col-4">
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
            <div class="col-8">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('/images/contact-img.jpg') }}" class="golden-border" alt="">
                    <div class="ps-5 sellers">
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

    @include('front.contact.form')
@endsection
