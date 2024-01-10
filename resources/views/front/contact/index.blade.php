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
                    <a href="#" class="bttn bttn-icon mt-5">JAK DOJECHAĆ <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-4">
                <div class="contact-box">
                    <h2>BIURO SPRZEDAŻY</h2>
                    <p>ul. Barcza 50</p>
                    <p>&nbsp;</p>
                    <p>Godziny otwarcia:</p>
                    <p>pn.-pt. 9:00 - 17:00</p>
                    <ul class="mb-0 list-unstyled icon-list-contact">
                        <li><img src="{{ asset('images/envelop-icon-svg.svg') }}" alt=""> <a href="mailto:mieszkania@ippon.group">mieszkania@ippon.group</a></li>
                    </ul>
                    <a href="#" class="bttn bttn-icon mt-5">JAK DOJECHAĆ <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
            </div>
            <div class="col-8">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('/images/contact-img.jpg') }}" class="golden-border" alt="">
                    <div class="ps-5 sellers">
                        <h2>Sylwia Sokal</h2>
                        <a href="">S.Sokal@Ippon.Group</a>
                        <a href=""><strong>+48 724 222 323</strong></a>
                        <hr>
                        <h2>Elżbieta Kalinowska</h2>
                        <a href="">E.Kalinowska@Ippon.Group</a>
                        <a href=""><strong>+48 609 884 219</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="contact-form">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-uppercase"><span class="text-gold">Masz pytania?</span> <br>Napisz do nas!</h2>
                </div>
            </div>

            <div class="row d-flex justify-content-center mt-5">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success border-0">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning border-0">
                            {{ session('warning') }}
                        </div>
                    @endif
                    <form method="post" id="contact-form" action="" class="validateForm">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-4 form-input">
                                <label for="form_name">Imię <span class="text-danger">*</span></label>
                                <input name="form_name" id="form_name" class="validate[required] form-control @error('form_name') is-invalid @enderror" type="text" value="{{ old('form_name') }}">

                                @error('form_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-4 form-input col-input-important">
                                <label for="form_surnames">Nazwisko <span class="text-danger">*</span></label>
                                <input name="form_surnames" id="form_surnames" class="form-control" type="text" value="{{ old('form_surname') }}">
                            </div>
                            <div class="col-12 col-md-4 form-input">
                                <label for="form_email">E-mail <span class="text-danger">*</span></label>
                                <input name="form_email" id="form_email" class="validate[required] form-control @error('form_email') is-invalid @enderror" type="text" value="{{ old('form_email') }}">

                                @error('form_email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-4 form-input">
                                <label for="form_phone">Telefon <span class="text-danger">*</span></label>
                                <input name="form_phone" id="form_phone" class="validate[required] form-control @error('form_phone') is-invalid @enderror" type="text" value="{{ old('form_phone') }}">

                                @error('form_phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 mt-4 form-input">
                                <label for="form_message">Treść wiadomości <span class="text-danger">*</span></label>
                                <textarea rows="5" cols="1" name="form_message" id="form_message" class="validate[required] form-control @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>

                                @error('form_message')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-8">
                                <div class="rodo-rules">
                                    @foreach ($rules as $r)
                                        <div class="col-12 @error('rule_'.$r->id) is-invalid @enderror">
                                            <div class="rodo-rule clearfix">
                                                <input name="rule_{{$r->id}}" id="rule_{{$r->id}}" value="1" type="checkbox" @if($r->required === 1) class="validate[required]" @endif data-prompt-position="topLeft:0">
                                                <label for="rule_{{$r->id}}" class="rules-text">
                                                    {!! $r->text !!}
                                                    @error('rule_'.$r->id)
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-end">
                                <div class="form-submit">
                                    <input name="form_page" type="hidden" value="homepage">
                                    <script type="text/javascript">
                                        document.write("<button class=\"bttn bttn-icon\" type=\"submit\">WYŚLIJ <i class=\"las la-chevron-circle-right\"></i></button>");
                                    </script>
                                    <noscript>Do poprawnego działania, Java musi być włączona.</noscript>
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
    <script src="{{ asset('js/validation.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/pl.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".validateForm").validationEngine({
                validateNonVisibleFields: true,
                updatePromptsPosition:true,
                promptPosition : "topRight:-137px"
            });
        });
        @if (session('success') || session('warning') || $errors->any())
        $(window).load(function() {
            const aboveHeight = $('header').outerHeight();
            $('html, body').stop().animate({
                scrollTop: $('.validateForm').offset().top-aboveHeight
            }, 1500, 'easeInOutExpo');
        });
        @endif
    </script>
@endpush
