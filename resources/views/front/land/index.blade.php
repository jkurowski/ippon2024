@extends('layouts.page', ['body_class' => 'land-page no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
<section class="pt-0">
    <div class="container">
        <div class="row">
            @if($current_locale == 'pl')
            <div class="col-12">
                <p>Ippon Group systematycznie wprowadza do sprzedaży nowe inwestycje. Polityka spółki polega na ekspansji o unikalne lokalizacje, których grunty są nabywane od ich właścicieli w cenach rynkowych. Pozwala to na realizowanie unikalnych, wartościowych projektów inwestycyjnych, które ze względu na atrakcyjność swojej lokalizacji, walory architektoniczne, jakość wykonania i ceny są sprzedawane w stosunkowo krótkim czasie. Dlatego na bieżąco monitorujemy sytuację na rynku działek budowlanych.</p>
                <p>&nbsp;</p>
                <p>Jeśli planujesz sprzedać grunty, skontaktuj się z nami. Naszym nadrzędnym celem jest zagwarantowanie kontrahentom w pełni profesjonalnej transakcji, zapewniającej bezpieczeństwo oraz uczciwą cenę. Nasi specjaliści zapewniają kompleksowe wsparcie podczas całego procesu sprzedaży.</p>
            </div>
            @else
            <div class="col-12">
                <p>Ippon Group consistently introduces new investments for sale. The company's policy focuses on expansion into unique locations, acquiring land from owners at market prices. This allows for the realization of unique, valuable investment projects that, due to the attractiveness of their location, architectural qualities, quality of execution, and pricing, are sold relatively quickly. Therefore, we continuously monitor the situation in the market for building plots.</p>
                <p>&nbsp;</p>
                <p>If you are planning to sell land, please contact us. Our primary goal is to ensure our contractors a fully professional transaction, providing safety and a fair price. Our specialists provide comprehensive support throughout the entire sales process.</p>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="pt-0 pt-xl-5">
    <div class="container">
        <div class="row left-right">
            <div class="col-12 col-xl-6 d-flex align-items-center">
                <div class="left-right-text">
                    @if($current_locale == 'pl')
                    <p>Bezpłatnie wyceniamy grunty oraz zapewniamy pomoc prawną. Mamy elastyczne podejście do każdej nieruchomości oraz do jej właściciela, co sprzyja zawarciu umowy opartej na obustronnej korzyści. Decydując się na współpracę z nami, nie musisz zastanawiać się nad tym, czy działka znajduje się w złej lokalizacji lub nie została odrolniona.</p>
                    <p>&nbsp;</p>
                    <p>Pomożemy Ci ustalić jej status prawny oraz ocenić jej potencjał inwestycyjny. Jesteśmy deweloperem godnym Twojego zaufania.</p>
                    @else
                        <p>We offer free land valuation and provide legal assistance. We have a flexible approach to every property and its owner, which facilitates the conclusion of an agreement based on mutual benefit. By choosing to work with us, you don't have to worry about whether the plot is in a bad location or has not been developed for agricultural use.</p>
                        <p>&nbsp;</p>
                        <p>We will help you determine its legal status and assess its investment potential. We are a developer worthy of your trust.</p>
                    @endif
                    <a href="#contact-form" data-offset="-60" class="bttn bttn-icon mt-3 mt-sm-5 scroll-to">@lang('website.fill-form') <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="p-0 p-xl-3">
                    <img src="{{ asset('/images/grunty-1.jpg') }}" alt="" class="golden-border w-100" width="840" height="650">
                </div>
            </div>
        </div>
        <div class="row left-right flex-row-reverse row-offset-up">
            <div class="col-12 col-xl-6 d-flex align-items-center">
                <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    @if($current_locale == 'pl')
                    <p>Nasza nieprzerwana obecność w branży deweloperskiej pozwoliła zdobyć doświadczenie, które jest gwarancją, że przeprowadzane przez nas transakcje są całkowicie zgodne z obowiązującymi przepisami prawa.</p>
                    <p>&nbsp;</p>
                    <p>Wypełnij poniższy formularz, a nasz ekspert skontaktuje się z Tobą w ciągu kilku godzin w celu umówienia spotkania.</p>
                    @else
                        <p>Our uninterrupted presence in the real estate industry has allowed us to gain experience, which ensures that the transactions we conduct are fully compliant with the applicable legal regulations.</p>
                        <p>&nbsp;</p>
                        <p>Please fill out the form below, and our expert will contact you within a few hours to schedule a meeting.</p>
                    @endif
                    <a href="#contact-form" data-offset="-60" class="bttn bttn-icon mt-3 mt-sm-5 scroll-to">@lang('website.fill-form') <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="p-0 p-xl-3" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/images/grunty-2.jpg') }}" alt="" class="golden-border w-100" width="840" height="650">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact-form" class="pt-0 pt-lg-5">
    <div class="container">
        <div class="row d-flex justify-content-center mt-3 mt-sm-5">
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
                        <div class="col-12 col-sm-4 col-lg-3 form-input">
                            <label for="form_name">@lang('website.form-label-name') <span class="text-danger">*</span></label>
                            <input name="form_name" id="form_name" class="validate[required] form-control @error('form_name') is-invalid @enderror" type="text" value="{{ old('form_name') }}">

                            @error('form_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4 col-lg-3 form-input mt-4 mt-sm-0">
                            <label for="form_surname">@lang('website.form-label-lastname')</label>
                            <input name="form_surname" id="form_surname" class="form-control @error('form_surname') is-invalid @enderror" type="text" value="{{ old('form_surname') }}">

                            @error('form_surname')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4 col-lg-3 form-input mt-4 mt-sm-0">
                            <label for="form_email">@lang('website.form-label-email') <span class="text-danger">*</span></label>
                            <input name="form_email" id="form_email" class="validate[required] form-control @error('form_email') is-invalid @enderror" type="text" value="{{ old('form_email') }}">

                            @error('form_email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4 col-lg-3 form-input mt-4 mt-sm-5 mt-lg-0">
                            <label for="form_phone">@lang('website.form-label-phone') <span class="text-danger">*</span></label>
                            <input name="form_phone" id="form_phone" class="validate[required] form-control @error('form_phone') is-invalid @enderror" type="text" value="{{ old('form_phone') }}">

                            @error('form_phone')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-12 col-sm-4 col-lg-3 form-input mt-4 mt-sm-5">
                            <label for="form_city">@lang('website.form-label-city')</label>
                            <input name="form_city" id="form_city" class="form-control @error('form_city') is-invalid @enderror" type="text" value="{{ old('form_city') }}">

                            @error('form_city')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4 col-lg-3 form-input mt-4 mt-sm-5">
                            <label for="form_street">@lang('website.form-label-street')</label>
                            <input name="form_street" id="form_street" class="form-control @error('form_street') is-invalid @enderror" type="text" value="{{ old('form_street') }}">

                            @error('form_street')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 form-input mt-4 mt-sm-5">
                            <label for="form_price">@lang('website.form-label-expected-price')</label>
                            <input name="form_price" id="form_price" class="form-control @error('form_price') is-invalid @enderror" type="text" value="{{ old('form_price') }}">

                            @error('form_price')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 form-input mt-4 mt-sm-5">
                            <label for="form_date">@lang('website.form-label-expected-sale-date')</label>
                            <input name="form_date" id="form_date" class="form-control @error('form_date') is-invalid @enderror" type="text" value="{{ old('form_date') }}">

                            @error('form_date')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-12 col-sm-6 form-input mt-4 mt-sm-5">
                            <label for="form_book">@lang('website.form-label-mortgage-number')</label>
                            <input name="form_book" id="form_book" class="form-control @error('form_book') is-invalid @enderror" type="text" value="{{ old('form_book') }}">

                            @error('form_book')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6 form-input mt-4 mt-sm-5">
                            <label for="form_land">@lang('website.form-label-land-designation')</label>
                            <input name="form_land" id="form_land" class="form-control @error('form_land') is-invalid @enderror" type="text" value="{{ old('form_land') }}">

                            @error('form_land')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-12 mt-4 form-input">
                            <label for="form_message">@lang('website.form-label-additional-information') <span class="text-danger">*</span></label>
                            <textarea rows="5" cols="1" name="form_message" id="form_message" class="validate[required] form-control @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>

                            @error('form_message')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 col-xl-8">
                            @if($obligation)
                                <div class="rodo-obligation mt-3">
                                    {!! $obligation->obligation !!}
                                </div>
                            @endif
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
                        <div class="col-12 col-xl-4 d-flex justify-content-end align-items-end">
                            <div class="form-submit">
                                <input name="form_page" type="hidden" value="homepage">
                                <script type="text/javascript">
                                    document.write("<button class=\"bttn bttn-icon\" type=\"submit\">@lang('website.button-send-message') <i class=\"ms-5 las la-chevron-circle-right\"></i></button>");
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
        AOS.init({disable: 'mobile'});

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
