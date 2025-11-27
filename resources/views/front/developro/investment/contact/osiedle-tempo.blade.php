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
    <div id="page-content" class="invest-osiedle-tempo">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">

                    <h2>#kontakt<span style="color: #e03e2d;">Z</span>Nami</h2>

                </div>
            </div>

            <div class="row mt-3 mt-sm-5">
                <div class="col-12 col-xxl-4 order-2 order-xxl-1">
                    <div class="contact-box">
                        @if($current_locale == 'pl')
                            <h3 class="text-start">BIURO SPRZEDAŻY</h3>
                        @else
                            <h3 class="text-start">SALES OFFICE</h3>
                        @endif
                        <p>ul. Żelazna 4,</p>
                        <p>10-419 Olsztyn</p>
                        <p>&nbsp;</p>

                        @if($current_locale == 'pl')
                            <p>Godziny otwarcia:</p>
                        @else
                            <p>Opening hours:</p>
                        @endif

                        <p>pn.-pt. 9:00 - 17:00</p>
                        <ul class="mb-0 list-unstyled icon-list-contact">
                            <li><img src="{{ asset('images/envelop-icon-svg.svg') }}" alt=""> <a href="mailto:mieszkania@ippon.group">mieszkania@ippon.group</a></li>
                        </ul>
                        @if($current_locale == 'pl')
                            <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5" target="_blank">JAK DOJECHAĆ <i class="ms-3 las la-chevron-circle-right"></i></a>
                        @else
                            <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5" target="_blank">HOW TO GET TO US <i class="ms-3 las la-chevron-circle-right"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xxl-8 order-1 order-xxl-2 mb-4 mb-xxl-0">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                        <img src="{{ asset('/images/contact-img.jpg') }}" class="golden-border d-none d-lg-block" alt="">
                        <div class="ps-0 ps-lg-5 sellers text-center text-lg-start">
                            <h2 class="mb-0">Elżbieta Kalinowska</h2>
                            <a href="mailto:e.kalinowska@ippon.group">e.kalinowska@ippon.group</a>
                            <a href="tel:+48724222323"><strong>+48 724 222 323</strong></a>
                            <h2 class="mb-0 mt-3">Iwona Schubert</h2>
                            <a href="mailto:i.schubert@ippon.group">i.schubert@ippon.group</a>
                            <a href="tel:+48609884219"><strong>+48 609 884 219</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="contactForm">
            <div class="container">
                <div class="row pt-5 mt-0 mt-sm-5">
                    <div class="col-12 text-center">
                        @if($investment->id == 5)
                            @if($current_locale == 'pl')
                                <h2 class="slow-header justify-content-center"><span class="rostemary">Masz pytania?</span> <span class="abuget brown">Napisz do nas!</span></h2>
                            @else
                                <h2 class="slow-header justify-content-center"><span class="rostemary">Have more questions?</span> <span class="abuget brown">Write to us!</span></h2>
                            @endif
                        @endif
                        @if($investment->id == 6)
                            <div class="invest-osiedle-synergia">
                                @if($current_locale == 'pl')
                                    <h2 class="justify-content-center"><span>MASZ PYTANIA?</span> NAPISZ DO NAS!</h2>
                                @else
                                    <h2 class="justify-content-center"><span>HAVE MORE QUESTIONS?</span> WRITE TO US!</h2>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row invest-osiedle-{{$investment->slug}}">
                    <div class="col-12">
                        @include('front.contact.form', ['page_name' => $investment->name.' - Kontakt'])
                    </div>
                    <style>#contactForm #contactForm {background:none}</style>
                </div>
            </div>
        </div>
    </div>
@endsection
