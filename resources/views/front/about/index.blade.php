@extends('layouts.page', ['body_class' => 'no-top no-bottom about-page'])

@section('meta_title', 'O nas')
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page' => $page])
@stop

@section('content')
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-12 col-xl-6 d-flex align-items-center justify-content-center">
                <div class="block-text">
                    <p><strong>Nadrzędnym celem SG Development jest profesjonalna realizacja inwestycji mieszkaniowych, usługowych i handlowych.</strong></p>
                    <p>&nbsp;</p>
                    <p>Wszystkie oferowane przez nas mieszkania i lokale usługowe wykonywane są zgodnie z zasadami najwyższej staranności, fachowości oraz troską o każdy detal.</p>
                    <p>&nbsp;</p>
                    <p>Zależy nam, aby klienci korzystający z naszych usług czuli się komfortowo.</p>
                    <p class="pt-5 pb-3"><strong>Współpracujemy z:</strong></p>
                    <div class="row">
                        <div class="col-4">
                            <div class="border-gradient">
                                <div class="partner-logo">
                                    <img src="{{ asset('/uploads/unibep-logo.png') }}" width="332" height="221" alt="Unibep logo">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border-gradient">
                                <div class="partner-logo">
                                    <img src="{{ asset('/uploads/orlik-jantar.png') }}" width="332" height="221" alt="Orlik Jantar logo">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border-gradient">
                                <div class="partner-logo">
                                    <img src="{{ asset('/uploads/wsm-ochota-logo.png') }}" width="332" height="221" alt="WSM Ochota logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="block-img">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('/uploads/o-nas.webp') }}">
                        <source type="image/jpeg" srcset="{{ asset('/uploads/o-nas.jpg') }}">
                        <img src="{{ asset('/uploads/o-nas.jpg') }}" alt="Widok budynku, zielone otoczenia, ludzie" width="960" height="680">
                    </picture>
                </div>
            </div>
        </div>
        <div class="row flex-row-reverse no-gutters">
            <div class="col-12 col-xl-6 d-flex align-items-center justify-content-center">
                <div class="block-text">

                    <p><strong>Gwarantujemy im bezpieczeństwo i spokój poprzez kreowanie wysokiej jakości życia. Zadowolenie naszych klientów i zaufanie, którym nas obdarzyli, są nagrodą za naszą pracę.</strong></p>
                    <p>&nbsp;</p>
                    <p>Dbamy o wysoki poziom architektoniczny budynków, o estetykę wnętrz i stworzenie przyjaznego mieszkańcom otoczenia. Dążymy do utrzymania najwyższych standardów w relacjach z klientem.</p>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="icon-box icon-box-white d-flex">
                                <div class="icon-box-img">
                                    <img src="/uploads/about/1.png" alt="2 atrakcyjne lokalizacje do wyboru">
                                </div>
                                <div class="icon-box-text ps-4 pe-3 d-flex align-items-center">
                                    <p>Atrakcyjne lokalizacje</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="icon-box icon-box-white d-flex">
                                <div class="icon-box-img">
                                    <img src="/uploads/about/2.png" alt="Szeroki wybór mieszkań">
                                </div>
                                <div class="icon-box-text ps-4 pe-3 d-flex align-items-center">
                                    <p>Szeroki wybór mieszkań</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="icon-box icon-box-white d-flex">
                                <div class="icon-box-img">
                                    <img src="/uploads/about/3.png" alt="Zaufani partnerzy">
                                </div>
                                <div class="icon-box-text ps-4 pe-3 d-flex align-items-center">
                                    <p>Zaufani partnerzy</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="icon-box icon-box-white d-flex">
                                <div class="icon-box-img">
                                    <img src="/uploads/about/4.png" alt="Duże balkony">
                                </div>
                                <div class="icon-box-text ps-4 pe-3 d-flex align-items-center">
                                    <p>Duże balkony</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="icon-box icon-box-white d-flex">
                                <div class="icon-box-img">
                                    <img src="/uploads/about/5.png" alt="Panoramiczne okna">
                                </div>
                                <div class="icon-box-text ps-4 pe-3 d-flex align-items-center">
                                    <p>Panoramiczne okna</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="icon-box icon-box-white d-flex">
                                <div class="icon-box-img">
                                    <img src="/uploads/about/6.png" alt="Dbałość o ergonomię">
                                </div>
                                <div class="icon-box-text ps-4 pe-3 d-flex align-items-center">
                                    <p>Dbałość o ergonomię</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="block-img">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('/uploads/o-nas-2.webp') }}">
                        <source type="image/jpeg" srcset="{{ asset('/uploads/o-nas-2.jpg') }}">
                        <img src="{{ asset('/uploads/o-nas-2.jpg') }}" alt="Widok budynku, zielone otoczenia, ludzie" width="960" height="680">
                    </picture>
                </div>
            </div>
        </div>
    </div>

    <div id="cta" class="m-0 bg-blue">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 col-xxl-9 d-flex align-items-center text-center text-lg-start">
                    <h4>ZOBACZ NASZE DOTYCHCZASOWE <span>REALIZACJE</span></h4>
                </div>
                <div class="col-12 col-lg-4 col-xxl-3 text-center text-lg-end mt-4 mt-lg-0">
                    <a href="{{ route('completed') }}" class="bttn bttn-border">Zrealizowane inwestycje</a>
                </div>
            </div>
        </div>
    </div>

    <section id="investCTA">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="invest-cta">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <a href="{{ route('front.investment.show', ['slug' => 'abrahama-14']) }}">
                                    <picture>
                                        <source type="image/webp" srcset="{{asset('/uploads/box/project-abrahama.webp') }}">
                                        <source type="image/jpeg" srcset="{{asset('/uploads/box/project-abrahama.jpg') }}">
                                        <img src="{{asset('/uploads/box/project-abrahama.jpg') }}" alt="Zdjecie biura sprzedaży" width="600" height="493">
                                    </picture>
                                </a>
                            </div>
                            <div class="col-12 col-md-7 d-flex align-items-center justify-content-center">
                                <div class="invest-cta-text ps-4 pe-5 w-100">
                                    <h2><a href="{{ route('front.investment.show', ['slug' => 'abrahama-14']) }}">Abrahama</a></h2>
                                    <ul class="mb-0 list-unstyled mt-4">
                                        <li>
                                            Oddanie inwestycji: <span class="float-end">Q4 2024</span>
                                        </li>
                                        <li>
                                            DOSTĘPNYCH MIESZKAŃ: <span class="float-end">67</span>
                                        </li>
                                    </ul>
                                    <a href="{{ route('front.investment.show', ['slug' => 'abrahama-14']) }}" class="bttn bttn-sm mt-4">ZOBACZ INWESTYCJE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                    <div class="invest-cta">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <a href="{{ route('front.investment.show', ['slug' => 'radarowa']) }}">
                                    <picture>
                                        <source type="image/webp" srcset="{{asset('/uploads/box/project-radarowa.webp') }}">
                                        <source type="image/jpeg" srcset="{{asset('/uploads/box/project-radarowa.jpg') }}">
                                        <img src="{{asset('/uploads/box/project-radarowa.jpg') }}" alt="Zdjęcie inwestycji Radarowa" width="600" height="493">
                                    </picture>
                                </a>
                            </div>
                            <div class="col-12 col-md-7 d-flex align-items-center justify-content-center">
                                <div class="invest-cta-text ps-4 pe-5 w-100">
                                    <h2><a href="{{ route('front.investment.show', ['slug' => 'radarowa']) }}">Budynek mieszkalny z lokalami usługami przy ul. Radarowej</a></h2>
                                    <ul class="mb-0 list-unstyled mt-4">
                                        <li>INWESTYCJA W PRZYGOTOWANIU.</li>
                                    </ul>
                                    <a href="{{ route('front.investment.show', ['slug' => 'radarowa']) }}" class="bttn bttn-sm mt-4">DOWIEDZ SIĘ WIĘCEJ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <span>KONTAKT Z NAMI</span>
                        <h2>MASZ PYTANIA? NAPISZ DO NAS!</h2>
                    </div>
                </div>
            </div>
            <div class="row row-apla">
                <div class="col-12 col-md-6">
                    <div class="contact-text">
                        <img src="/images/logo-sg.png" alt="">
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <h2>Siedziba firmy</h2>
                        <p>tel. <a href="tel:+48605433401">+48 605 433 401</a></p>
                        <p>ul. Śliska 3 lok. 1B</p>
                        <p>00-127 Warszawa</p>
                        <p>&nbsp;</p>
                        <h2>Kontakt do Biura Sprzedaży</h2>
                        <p>tel. <a href="tel:+48607823400">+48 607 823 400</a></p>
                        <p>e-mail: <a href="mailto:kontakt@sgdevelopment.pl">kontakt@sgdevelopment.pl</a></p>
                        <p>Biuro sprzedaży bezpośrednio przy inwestycji ul. Abrahama 14</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-5 mt-md-0">
                    <form method="post" id="homepage-form" action="{{ route('contact.index') }}" class="validateForm">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-sm-6 col-xl-4 form-input">
                                <label for="form_name">Imię <span class="text-danger">*</span></label>
                                <input name="form_name" id="form_name" class="validate[required] form-control @error('form_name') is-invalid @enderror" type="text" value="{{ old('form_name') }}">

                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 col-xl-4 form-input col-input-important">
                                <label for="form_surname">Nazwisko <span class="text-danger">*</span></label>
                                <input name="form_surname" id="form_surname" class="form-control" type="text" value="{{ old('form_surname') }}">
                            </div>
                            <div class="col-12 col-sm-6 col-xl-4 form-input">
                                <label for="form_email">E-mail <span class="text-danger">*</span></label>
                                <input name="form_email" id="form_email" class="validate[required] form-control @error('form_email') is-invalid @enderror" type="text" value="{{ old('form_email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-xl-4 form-input">
                                <label for="form_phone">Telefon <span class="text-danger">*</span></label>
                                <input name="form_phone" id="form_phone" class="validate[required] form-control @error('form_phone') is-invalid @enderror" type="text" value="{{ old('form_phone') }}">

                                @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 mt-1 form-input">
                                <label for="form_message">Treść wiadomości <span class="text-danger">*</span></label>
                                <textarea rows="5" cols="1" name="form_message" id="form_message" class="validate[required] form-control @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>

                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="rodo-rules">
                                @foreach ($rules as $r)
                                    <div class="col-12">
                                        <div class="rodo-rule clearfix">
                                            <input name="rule_{{$r->id}}" id="rule_{{$r->id}}" value="1" type="checkbox" @if($r->required === 1) class="validate[required]" @endif data-prompt-position="topLeft:0">
                                            <label for="zgoda_{{$r->id}}" class="rules-text">{!! $r->text !!}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row row-form-submit">
                            <div class="col-12 pt-3">
                                <div class="input text-center">
                                    <input name="form_page" type="hidden" value="homepage">
                                    <button class="bttn" type="submit">WYŚLIJ WIADOMOŚĆ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">

    </script>
@endpush
