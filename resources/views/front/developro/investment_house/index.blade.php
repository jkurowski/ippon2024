@extends('layouts.page', ['body_class' => 'investments investment-house'])

@section('content')
<div id="property-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{$property->name}}`12</h1>
            </div>
        </div>
    </div>
</div>

<div class="container pt-5">
    <div class="row">
        <div class="col-4">
            <div class="property-desc">
                <ul class="list-unstyled">
                    <li>Pokoje:<span>{{$property->rooms}}</span></li>
                    <li>Powierzchnia:<span>{{$property->area}} m<sup>2</sup></span></li>
                    @if($property->garden_area)<li>Ogrórek:<span>{{$property->garden_area}}</span></li>@endif
                    @if($property->balcony_area)<li>Balkon:<span>{{$property->balcony_area}}</span></li>@endif
                    @if($property->terrace_area)<li>Taras:<span>{{$property->terrace_area}}</span></li>@endif
                    @if($property->loggia_area)<li>Loggia:<span>{{$property->loggia_area}}</span></li>@endif
                    @if($property->parking_space)<li>Miejsce postojowe:<span>{{$property->parking_space}}</span></li>@endif
                    @if($property->garage)<li>Garaż:<span>{{$property->garage}}</span></li>@endif
                </ul>
                @if($property->file_pdf)
                    <a href="/investment/property/pdf/{{$property->file_pdf}}" class="mt-4 bttn bttn-icon">Pobierz plan .pdf <i class="las la-file-pdf"></i></a>
                @endif
            </div>
        </div>
        <div class="col-8 d-flex justify-content-center pl-5">
            <div class="container">
                <div class="row pb-4">
                    <div class="col-4">@if($prev_house) <a href="{{route('front.investment.house.index', [$investment, $prev_house->id])}}" class="bttn bttn-sm">{{$prev_house->name}}</a> @endif</div>
                    <div class="col-4"></div>
                    <div class="col-4 d-flex justify-content-end">@if($next_house) <a href="{{route('front.investment.house.index', [$investment, $next_house->id])}}" class="bttn bttn-sm">{{$next_house->name}}</a> @endif</div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="property-img ps-5">
                            @if($property->file)
                                <a href="/investment/property/{{$property->file}}"><img src="{{ asset('/investment/property/thumbs/'.$property->file) }}" alt="{{$property->name}}"></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="property-form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-text text-center pb-4">
                    <h2>Wyślij zapytanie</h2>
                </div>
            </div>
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
                <form method="post" action="{{route('contact.property', $property->id)}}" class="">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-4 form-input">
                            <label for="form_name">Imię <span class="text-danger">*</span></label>
                            <input name="form_name" id="form_name" class="validate[required] form-control @error('form_name') is-invalid @enderror" type="text" value="{{ old('form_name') }}">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-4 form-input">
                            <label for="form_email">E-mail <span class="text-danger">*</span></label>
                            <input name="form_email" id="form_email" class="validate[required] form-control @error('form_email') is-invalid @enderror" type="text" value="{{ old('form_email') }}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-4 form-input">
                            <label for="form_phone">Telefon</label>
                            <input name="form_phone" id="form_phone" class="form-control" type="text" value="{{ old('form_phone') }}">
                        </div>

                        <div class="col-12 mt-2 form-input">
                            <label for="form_subject">Temat wiadomości <span class="text-danger">*</span></label>
                            <input name="form_subject" id="form_subject" class="validate[required] form-control @error('form_subject') is-invalid @enderror" type="text" value="{{ old('form_subject') }}">

                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-12 mt-3 form-input">
                            <label for="form_message">Treść wiadomości <span class="text-danger">*</span></label>
                            <textarea rows="5" cols="1" name="form_message" id="form_message" class="validate[required] form-control @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>

                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="obowiazek mt-3">
                                <p>Na podstawie z art. 13 ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. (Dz. Urz. UE L 119 z 04.05.2016) informujemy, iż przesyłając wiadomość za pomocą formularza kontaktowego wyrażacie Państwo zgodę na (<a href="" target="_blank">polityka informacyjna</a>):</p>
                            </div>
                        </div>
                        @foreach ($rules as $r)
                            <div class="col-12">
                                <div class="regulki">
                                    <input name="rule_{{$r->id}}" id="rule_{{$r->id}}" value="1" type="checkbox" @if($r->required === 1) class="validate[required]" @endif data-prompt-position="topLeft:0">
                                    <label for="zgoda_{{$r->id}}" class="rules-text">{!! $r->text !!}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row row-form-submit">
                        <div class="col-12 pt-3">
                            <div class="input text-center">
                                <input name="form_page" type="hidden" value="{{$investment->name}} - {{$property->name}}">
                                <script type="text/javascript">
                                    document.write("<button class=\"bttn\" type=\"submit\">WYŚLIJ</button>");
                                </script>
                                <noscript><p><b>Do poprawnego działania, Java musi być włączona.</b><p></noscript>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('/js/validation.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/pl.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".validateForm").validationEngine({
                validateNonVisibleFields: true,
                updatePromptsPosition:true,
                promptPosition : "topRight:-137px"
            });
        });
    </script>
@endpush
