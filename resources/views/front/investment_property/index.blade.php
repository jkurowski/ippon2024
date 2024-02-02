@extends('layouts.page', ['body_class' => 'property'])

@section('meta_title', $property->name)
@section('seo_title', $investment->name.' - '.$floor->name.' - '.$property->name)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.property-header', [
    'title' => $property->name,
    'header_file' => 'rooms.jpg',
    'items' => [
        ['uri'=> 'i/'.$investment->slug, 'title'=> $investment->name],
        ['uri'=> 'i/'.$investment->slug.'/pietro/'.$floor->id, 'title'=>$floor->name]
        ]
    ])
@stop

@section('content')

<div id="property">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="property-desc">
                    <h2>{{ $property->name }}</h2>
                    <h4>{{ floorLevel($floor->number, false) }}</h4>
                    <ul class="mb-0 list-unstyled mt-4">
                        <li>Budynek: <span>B4.1</span></li>
                        <li>Piętro: <span> @if($floor->number == 0) parter @else {{ $floor->number }} @endif</span></li>
                        <li>Pokoje: <span>{{ $property->rooms }}</span></li>
                        <li>Powierzchnia: <span>{{ $property->area }} m<sup>2</sup></span></li>
                        <li>Aneks/Kuchnia: <span>{{ kitchenType($property->kitchen_type) }}</span></li>
                        @if($property->storeroom)<li>Spiżarnia: <span>{{ $property->storeroom }}</span></li>@endif
                        @if($property->garden_area)<li>Ogródek:<span>{{$property->garden_area}} m<sup>2</sup></span></li>@endif
                        @if($property->balcony_area)<li>Balkon:<span>{{$property->balcony_area}} m<sup>2</sup></span></li>@endif
                        @if($property->balcony_area_2)<li>Balkon 2:<span>{{$property->balcony_area_2}} m<sup>2</sup></span></li>@endif
                        @if($property->terrace_area)<li>Taras:<span>{{$property->terrace_area}} m<sup>2</sup></span></li>@endif
                        @if($property->terrace_area_2)<li>Taras 2:<span>{{$property->terrace_area_2}} m<sup>2</sup></span></li>@endif
                        @if($property->loggia_area)<li>Taras 2:<span>{{$property->loggia_area}} m<sup>2</sup></span></li>@endif
                        @if($property->parking_space)<li>Miejsce postojowe:<span>{{$property->parking_space}}</span></li>@endif
                        @if($property->garage)<li>Garaż:<span>{{$property->garage}}</span></li>@endif
                        @if($property->deadline)<li>Termin oddania: <span>{{ $property->deadline }}</span></li>@endif
                        @if($property->price)<li>Cena: <span>{{ $property->price }} zł</span></li>@endif
                    </ul>
                </div>
            </div>
            <div class="col-6">
                <div class="property-img">
                    @if($property->file)
                        <div class="property-img">
                            <a href="{{ asset('/investment/property/'.$property->file) }}" class="swipebox">
                                <picture>
                                    <source type="image/webp" srcset="{{ asset('/investment/property/thumbs/webp/'.$property->file_webp) }}">
                                    <source type="image/jpeg" srcset="{{ asset('/investment/property/thumbs/'.$property->file) }}">
                                    <img src="{{ asset('/investment/property/thumbs/'.$property->file) }}" alt="{{$property->name}}">
                                </picture>
                            </a>
                        </div>
                    @endif

                    <img src="{{ asset('/images/property-features.png') }}" alt="Atuty mieszkania" class="mt-4">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-5 pt-5">
                <h2 class="slow-header justify-content-center"><span class="rostemary">Mieszkania</span> <span class="abuget brown">Podobne</span></h2>
            </div>
        </div>

        <div class="row mt-4">
            @foreach($similar as $room)
            <div class="col-4 p-4">
                <div class="similar-rooms">
                    {!! roomStatusBadge($room->status) !!}
                    @if($room->file)
                        <a href="{{ route('developro.property', [$investment->slug, $room, Str::slug($room->name), floorLevel($room->floor_number, true), number2RoomsName($room->rooms, true), round(floatval($room->area), 2).'-m2']) }}">
                        <picture>
                            <source type="image/webp" srcset="/investment/property/list/webp/{{$room->file_webp}}">
                            <source type="image/jpeg" srcset="/investment/property/list/{{$room->file}}">
                            <img src="/investment/property/list/{{$room->file}}" alt="{{$room->name}}" class="w-100">
                        </picture>
                        </a>
                    @endif
                    <h2 class="poppins"><a href="{{ route('developro.property', [$investment->slug, $room, Str::slug($room->name), floorLevel($room->floor_number, true), number2RoomsName($room->rooms, true), round(floatval($room->area), 2).'-m2']) }}">{{$room->name}}</a></h2>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4 property-list-item-stat">
                                <img src="{{ asset('/images/floor-icon.svg') }}" alt="Ikonka piętra" class="me-3"> Piętro {{$room->floor_number}}
                            </div>
                            <div class="col-4 property-list-item-stat">
                                <img src="{{ asset('/images/room-icon.svg') }}" alt="Ikonka pokoi" class="me-3"> {{$room->rooms}}
                                @if ($room->rooms == 1)
                                    pokój
                                @else
                                    pokoje
                                @endif
                            </div>
                            <div class="col-4 property-list-item-stat">
                                <img src="{{ asset('/images/area-icon.svg') }}" alt="Ikonka powierzchni" class="me-3"> {{$room->area}} m<sup>2</sup>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('developro.property', [$investment->slug, $room, Str::slug($room->name), floorLevel($room->floor_number, true), number2RoomsName($room->rooms, true), round(floatval($room->area), 2).'-m2']) }}" class="bttn bttn-icon mt-4">POKAŻ MIESZKANIE <i class="ms-4 las la-file"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>



    <div class="container d-none">
        <div class="row">
            <div class="col-12 col-xl-5">
                <div id="propertyNav" class="row">
                    <div class="col-12 col-sm-4">
                        @if($prev) <a href="#" class="bttn">Poprzednie</a>@endif
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="#" class="bttn">Plan piętra</a>
                    </div>
                    <div class="col-12 col-sm-4">
                        @if($next) <a href="#" class="bttn">Następne</a>@endif
                    </div>
                </div>
                <div class="property-desc">
                    <div class="room-status room-status-{{$property->status}}">
                        {{ roomStatus($property->status )}}
                    </div>
                    @if($property->price)
                        <h6 class="propertyPrice"></h6>
                    @endif
                    <ul class="list-unstyled">
                        <li>Pokoje:<span>{{$property->rooms}}</span></li>
                        <li>Powierzchnia:<span>{{$property->area}} m<sup>2</sup></span></li>
                        @if($property->garden_area)<li>Ogródek:<span>{{$property->garden_area}} m<sup>2</sup></span></li>@endif
                        @if($property->balcony_area)<li>Balkon:<span>{{$property->balcony_area}} m<sup>2</sup></span></li>@endif
                        @if($property->balcony_area_2)<li>Balkon 2:<span>{{$property->balcony_area_2}} m<sup>2</sup></span></li>@endif
                        @if($property->terrace_area)<li>Taras:<span>{{$property->terrace_area}} m<sup>2</sup></span></li>@endif
                        @if($property->terrace_area_2)<li>Taras 2:<span>{{$property->terrace_area_2}} m<sup>2</sup></span></li>@endif
                        @if($property->loggia_area)<li>Taras 2:<span>{{$property->loggia_area}} m<sup>2</sup></span></li>@endif
                        @if($property->parking_space)<li>Miejsce postojowe:<span>{{$property->parking_space}}</span></li>@endif
                        @if($property->garage)<li>Garaż:<span>{{$property->garage}}</span></li>@endif
                    </ul>
                </div>

                @if($property->file && $property->status <> 3)
                    <div class="property-img">
                        <a href="{{ asset('/investment/property/'.$property->file) }}" class="swipebox">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('/investment/property/thumbs/webp/'.$property->file_webp) }}">
                                <source type="image/jpeg" srcset="{{ asset('/investment/property/thumbs/'.$property->file) }}">
                                <img src="{{ asset('/investment/property/thumbs/'.$property->file) }}" alt="{{$property->name}}">
                            </picture>
                        </a>
                    </div>
                @endif

                @if($property->file_pdf && $property->status <> 3)
                <div class="property-desc d-flex justify-content-center">
                    <a href="{{ asset('/investment/property/pdf/'.$property->file_pdf) }}" target="_blank" class="bttn">POBIERZ PLAN .PDF</a>
                </div>
                @endif
            </div>
            <div class="col-12 col-xl-7 ps-3 ps-xl-5 mt-4 mt-xl-0">
                <div id="property-form">
                    <div class="container">
                        <div class="row d-flex">
                            <div class="col-12">
                                <form method="post" id="contact-form" action="" class="validateForm">
                                    {{ csrf_field() }}
                                    <div class="col-12">
                                        <div class="text-center">
                                            <h2>Zapytaj o {{$property->name}}</h2>
                                        </div>
                                    </div>
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
                                    <div class="row">
                                        <div class="col-12 form-input">
                                            <label for="form_name">Imię <span class="text-danger">*</span></label>
                                            <input name="form_name" id="form_name" class="validate[required] form-control @error('form_name') is-invalid @enderror" type="text" value="{{ old('form_name') }}">

                                            @error('form_name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-12 form-input col-input-important">
                                            <label for="form_surname">Nazwisko <span class="text-danger">*</span></label>
                                            <input name="form_surname" id="form_surname" class="form-control" type="text" value="{{ old('form_surname') }}">
                                        </div>
                                        <div class="col-12 col-sm-6 form-input">
                                            <label for="form_email">E-mail <span class="text-danger">*</span></label>
                                            <input name="form_email" id="form_email" class="validate[required] form-control @error('form_email') is-invalid @enderror" type="text" value="{{ old('form_email') }}">

                                            @error('form_email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 form-input">
                                            <label for="form_phone">Telefon <span class="text-danger">*</span></label>
                                            <input name="form_phone" id="form_phone" class="validate[required] form-control @error('form_phone') is-invalid @enderror" type="text" value="{{ old('form_phone') }}">

                                            @error('form_phone')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-1 form-input">
                                            <label for="form_message">Treść wiadomości <span class="text-danger">*</span></label>
                                            <textarea rows="5" cols="1" name="form_message" id="form_message" class="validate[required] form-control @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>

                                            @error('form_message')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
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
                                    <div class="row row-form-submit">
                                        <div class="col-12 pt-3">
                                            <div class="input text-center">
                                                <input name="form_page" type="hidden" value="{{$property->name}}">
                                                <script type="text/javascript">
                                                    document.write("<button class=\"bttn\" type=\"submit\">WYŚLIJ WIADOMOŚĆ</button>");
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
        @if (session('success')||session('warning')||$errors->any())
        $(window).load(function() {
            const aboveHeight = $('header').outerHeight();
            $('html, body').stop().animate({
                scrollTop: $('.validateForm').offset().top-aboveHeight
            }, 1500, 'easeInOutExpo');
        });
        @endif
    </script>
@endpush
