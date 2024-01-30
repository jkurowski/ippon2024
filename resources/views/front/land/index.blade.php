@extends('layouts.page', ['body_class' => 'land-page no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => 'contact.jpg'])
@stop

@section('content')
<section class="pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Ippon Group systematycznie wprowadza do sprzedaży nowe inwestycje. Polityka spółki polega na ekspansji o unikalne lokalizacje, których grunty są nabywane od ich właścicieli w cenach rynkowych. Pozwala to na realizowanie unikalnych, wartościowych projektów inwestycyjnych, które ze względu na atrakcyjność swojej lokalizacji, walory architektoniczne, jakość wykonania i ceny są sprzedawane w stosunkowo krótkim czasie. Dlatego na bieżąco monitorujemy sytuację na rynku działek budowlanych.</p>
                <p>&nbsp;</p>
                <p>Jeśli planujesz sprzedać grunty, skontaktuj się z nami. Naszym nadrzędnym celem jest zagwarantowanie kontrahentom w pełni profesjonalnej transakcji, zapewniającej bezpieczeństwo oraz uczciwą cenę. Nasi specjaliści zapewniają kompleksowe wsparcie podczas całego procesu sprzedaży.</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row left-right">
            <div class="col-6 d-flex align-items-center">
                <div class="left-right-text">
                    <p>Bezpłatnie wyceniamy grunty oraz zapewniamy pomoc prawną. Mamy elastyczne podejście do każdej nieruchomości oraz do jej właściciela, co sprzyja zawarciu umowy opartej na obustronnej korzyści. Decydując się na współpracę z nami, nie musisz zastanawiać się nad tym, czy działka znajduje się w złej lokalizacji lub nie została odrolniona.</p>
                    <p>&nbsp;</p>
                    <p>Pomożemy Ci ustalić jej status prawny oraz ocenić jej potencjał inwestycyjny. Jesteśmy deweloperem godnym Twojego zaufania.</p>
                    <a href="#contact-form" data-offset="-60" class="bttn bttn-icon mt-5 scroll-to">WYPEŁNIJ FORMULARZ <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
            </div>
            <div class="col-6">
                <div class="p-3">
                    <img src="{{ asset('/images/grunty-1.jpg') }}" alt="" class="golden-border" width="840" height="650">
                </div>
            </div>
        </div>
        <div class="row left-right flex-row-reverse row-offset-up">
            <div class="col-6 d-flex align-items-center">
                <div class="left-right-text">
                    <p>Nasza nieprzerwana obecność w branży deweloperskiej pozwoliła zdobyć doświadczenie, które jest gwarancją, że przeprowadzane przez nas transakcje są całkowicie zgodne z obowiązującymi przepisami prawa.</p>
                    <p>&nbsp;</p>
                    <p>Wypełnij poniższy formularz, a nasz ekspert skontaktuje się z Tobą w ciągu kilku godzin w celu umówienia spotkania.</p>
                    <a href="#contact-form" data-offset="-60" class="bttn bttn-icon mt-5 scroll-to">WYPEŁNIJ FORMULARZ <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
            </div>
            <div class="col-6">
                <div class="p-3">
                    <img src="{{ asset('/images/grunty-2.jpg') }}" alt="" class="golden-border" width="840" height="650">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact-form">
    <div class="container">
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
                        <div class="col-3 form-input">
                            <label for="form_name">Imię <span class="text-danger">*</span></label>
                            <input name="form_name" id="form_name" class="validate[required] form-control @error('form_name') is-invalid @enderror" type="text" value="{{ old('form_name') }}">

                            @error('form_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-3 form-input">
                            <label for="form_surname">Nazwisko</label>
                            <input name="form_surname" id="form_surname" class="form-control @error('form_surname') is-invalid @enderror" type="text" value="{{ old('form_surname') }}">

                            @error('form_surname')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-3 form-input">
                            <label for="form_email">E-mail <span class="text-danger">*</span></label>
                            <input name="form_email" id="form_email" class="validate[required] form-control @error('form_email') is-invalid @enderror" type="text" value="{{ old('form_email') }}">

                            @error('form_email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-3 form-input">
                            <label for="form_phone">Telefon <span class="text-danger">*</span></label>
                            <input name="form_phone" id="form_phone" class="validate[required] form-control @error('form_phone') is-invalid @enderror" type="text" value="{{ old('form_phone') }}">

                            @error('form_phone')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-3 form-input mt-5">
                            <label for="form_city">Miasto</label>
                            <input name="form_city" id="form_city" class="form-control @error('form_city') is-invalid @enderror" type="text" value="{{ old('form_city') }}">

                            @error('form_city')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-3 form-input mt-5">
                            <label for="form_street">Ulica</label>
                            <input name="form_street" id="form_street" class="form-control @error('form_street') is-invalid @enderror" type="text" value="{{ old('form_street') }}">

                            @error('form_street')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-3 form-input mt-5">
                            <label for="form_price">Oczekiwana cena</label>
                            <input name="form_price" id="form_price" class="form-control @error('form_price') is-invalid @enderror" type="text" value="{{ old('form_price') }}">

                            @error('form_price')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-3 form-input mt-5">
                            <label for="form_date">Oczekiwana data sprzedaży</label>
                            <input name="form_date" id="form_date" class="form-control @error('form_date') is-invalid @enderror" type="text" value="{{ old('form_date') }}">

                            @error('form_date')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-6 form-input mt-5">
                            <label for="form_book">Numer księgi wieczystej</label>
                            <input name="form_book" id="form_book" class="form-control @error('form_book') is-invalid @enderror" type="text" value="{{ old('form_book') }}">

                            @error('form_book')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-6 form-input mt-5">
                            <label for="form_land">Przeznaczenie terenu</label>
                            <input name="form_land" id="form_land" class="form-control @error('form_land') is-invalid @enderror" type="text" value="{{ old('form_land') }}">

                            @error('form_land')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-12 mt-4 form-input">
                            <label for="form_message">Dodatkowe informacje <span class="text-danger">*</span></label>
                            <textarea rows="5" cols="1" name="form_message" id="form_message" class="validate[required] form-control @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>

                            @error('form_message')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-8">
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
                        <div class="col-4 d-flex justify-content-end align-items-end">
                            <div class="form-submit">
                                <input name="form_page" type="hidden" value="homepage">
                                <script type="text/javascript">
                                    document.write("<button class=\"bttn bttn-icon\" type=\"submit\">WYŚLIJ FORMULARZ<i class=\"ms-2 las la-chevron-circle-right\"></i></button>");
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
