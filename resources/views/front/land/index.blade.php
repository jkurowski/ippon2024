@extends('layouts.page', ['body_class' => 'no-top no-bottom land-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'jak-kupic.jpg'])
@stop

@section('content')
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                <div class="block-text">
                    {!! parse_text($page->content) !!}
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="block-img">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('/uploads/kupimy-grunty.webp') }}">
                        <source type="image/jpeg" srcset="{{ asset('/uploads/kupimy-grunty.jpg') }}">
                        <img src="{{ asset('/uploads/kupimy-grunty.jpg') }}" alt="Widok budynku, zielone otoczenia, ludzie" width="960" height="680">
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
                                        <img src="{{asset('/uploads/box/project-abrahama.jpg') }}" alt="Zdjęcie inwestycji Abrahama" width="600" height="493">
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
                        <p>ul. Abrahama 14 (parking przy budowie)</p>
                        <p>03-982 Warszawa</p>
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
