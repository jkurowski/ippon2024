@extends('layouts.page', ['body_class' => 'property no-bottom'])

@section('meta_title', $property->name)
@section('seo_title', $investment->name.' - '.$floor->name.' - '.$property->name)
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

<div id="property">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 order-2 order-xl-1">
                <div class="property-desc pe-0 pe-xl-4">
                    {!! roomStatusBadge($property->status) !!}
                    <h1 class="text-uppercase">{{ $property->name }}</h1>
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

                <div class="pe-0 pe-xl-4">
                    <div class="row mt-5">
                        <div class="col-12 col-sm-4">
                            @if($property->file_pdf && $property->status <> 3)
                                <a href="{{ asset('/investment/property/pdf/'.$property->file_pdf) }}" target="_blank" class="bttn bttn-slow w-100 justify-content-center ">POBIERZ KARTĘ <i class="ms-4 las la-download"></i></a>
                            @endif
                        </div>
                        <div class="col-12 col-sm-4">
                            @if($property->file_3d && $property->status <> 3)
                                <a href="{{ asset('/investment/property/pdf/'.$property->file_3d) }}" target="_blank" class="bttn bttn-slow w-100 justify-content-center ">KARTA 3D<i class="ms-4 las la-download"></i></a>
                            @endif
                        </div>
                        <div class="col-12 col-sm-4">
                            <a href="#contactForm" data-offset="0" target="_blank" class="bttn bttn-slow w-100 justify-content-center bttn-slow-red scroll-to">ZAPYTAJ O MIESZKANIE</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6 order-1 order-xl-2">
                <div id="propertyNav" class="row">
                    <div class="col-12 col-sm-4">
                        @if($prev) <a href="{{ route('developro.property', [$investment->slug, $prev, Str::slug($prev->name), $floor->number, number2RoomsName($prev->rooms, true), round(floatval($prev->area), 2).'-m2']) }}" class="bttn bttn-slow justify-content-center"><i class="las la-arrow-left me-5"></i>{{ $prev->name }}</a>@endif
                    </div>
                    <div class="col-12 col-sm-4">
                        <a href="{{route('developro.floor', [$investment->slug, $floor, Str::slug($floor->name)])}}" class="bttn justify-content-center bttn-slow">Wróć do planu</a>
                    </div>
                    <div class="col-12 col-sm-4">
                        @if($next) <a href="{{ route('developro.property', [$investment->slug, $next, Str::slug($next->name), $floor->number, number2RoomsName($next->rooms, true), round(floatval($next->area), 2).'-m2']) }}" class="bttn bttn-slow justify-content-center">{{ $next->name }} <i class="ms-5 las la-arrow-right"></i></a>@endif
                    </div>
                </div>
                <div class="property-img">
                    @if($property->file)
                        <a href="{{ asset('/investment/property/'.$property->file) }}" class="swipebox">
                            <picture>
                                <source type="image/webp" srcset="{{ asset('/investment/property/thumbs/webp/'.$property->file_webp) }}">
                                <source type="image/jpeg" srcset="{{ asset('/investment/property/thumbs/'.$property->file) }}">
                                <img src="{{ asset('/investment/property/thumbs/'.$property->file) }}" alt="{{$property->name}}" class="w-100">
                            </picture>
                        </a>
                    @endif

                    <img src="{{ asset('/images/property-features.png') }}" alt="Atuty mieszkania" class="mt-4 w-100">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-0 mt-sm-5 pt-5">
                <h2 class="slow-header justify-content-center"><span class="rostemary">Mieszkania</span> <span class="abuget brown">Podobne</span></h2>
            </div>
        </div>

        <div class="row mt-4">
            @foreach($similar as $room)
            <div class="col-12 col-lg-4 p-0 p-sm-4">
                <div class="similar-rooms">
                    {!! roomStatusBadge($room->status) !!}
                    @if($room->file)
                        <a href="{{ route('developro.property', [$investment->slug, $room, Str::slug($room->name), floorLevel($room->floor_number, true), number2RoomsName($room->rooms, true), round(floatval($room->area), 2).'-m2']) }}">
                        <picture>
                            <source type="image/webp" srcset="/investment/property/thumbs/webp/{{$room->file_webp}}">
                            <source type="image/jpeg" srcset="/investment/property/thumbs/{{$room->file}}">
                            <img src="/investment/property/thumbs/{{$room->file}}" alt="{{$room->name}}" class="w-100">
                        </picture>
                        </a>
                    @endif
                    <h2 class="poppins"><a href="{{ route('developro.property', [$investment->slug, $room, Str::slug($room->name), floorLevel($room->floor_number, true), number2RoomsName($room->rooms, true), round(floatval($room->area), 2).'-m2']) }}">{{$room->name}}</a></h2>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-xl-4 property-list-item-stat d-flex justify-content-center mb-3 mb-xl-0">
                                <img src="{{ asset('/images/floor-icon.svg') }}" alt="Ikonka piętra" class="me-3"> Piętro {{$room->floor_number}}
                            </div>
                            <div class="col-12 col-xl-4 property-list-item-stat d-flex justify-content-center mb-3 mb-xl-0">
                                <img src="{{ asset('/images/room-icon.svg') }}" alt="Ikonka pokoi" class="me-3"> {{$room->rooms}}
                                @if ($room->rooms == 1)
                                    pokój
                                @else
                                    pokoje
                                @endif
                            </div>
                            <div class="col-12 col-xl-4 property-list-item-stat d-flex justify-content-center">
                                <img src="{{ asset('/images/area-icon.svg') }}" alt="Ikonka powierzchni" class="me-3"> {{$room->area}} m<sup>2</sup>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('developro.property', [$investment->slug, $room, Str::slug($room->name), floorLevel($room->floor_number, true), number2RoomsName($room->rooms, true), round(floatval($room->area), 2).'-m2']) }}" class="bttn bttn-icon mt-4 bttn-slow">POKAŻ MIESZKANIE <i class="ms-4 las la-file"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container pt-4 mt-4 pt-md-5 mt-md-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="slow-header justify-content-center"><span class="rostemary">Jesteś zainteresowany?</span> <span class="abuget brown">Masz pytania?</span></h2>
                <h2 class="slow-header justify-content-center"><span class="rostemary">Skontaktuj się z nami!</span></h2>
            </div>
        </div>
    </div>

    <div class="container mt-4 property-contact">
        <div class="row">
            <div class="col-12 col-xxl-4 order-2 order-xxl-1">
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
                    <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5 bttn-slow" target="_blank">JAK DOJECHAĆ <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-xxl-8 order-1 order-xxl-2 mb-4 mb-xxl-0">
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                    <img src="{{ asset('/images/contact-img.jpg') }}" class="golden-border d-none d-lg-block" alt="">
                    <div class="ps-0 ps-lg-5 sellers text-center text-lg-start">
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
            <div class="col-12 text-center m-4">
                <h2 class="slow-header justify-content-center"><span class="abuget brown">Masz pytania?</span><span class="rostemary">Napisz do nas</span></h2>
            </div>
        </div>
    </div>

    @include('front.contact.form', [ 'page_name' => $investment->name .' - '. $property->name])
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
