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
                    @if($property->highlighted)
                        <div class="pe-0 pe-xl-4">
                            <div class="property-highlighted"><span>PROMOCJA</span></div>
                        </div>
                    @endif
                    <div class="property-desc pe-0 pe-xl-4">
                        {!! roomStatusBadge($property->status) !!}
                        <h1 class="text-uppercase">{{ $property->name }}</h1>
                        <h4>{{ floorLevel($floor->number, false) }}</h4>
                        @if($property->price)
                            <h3 class="mt-3 mb-0"><b>{{ $property->price }} PLN</b></h3>
                            @if($property->price_30)
                                <span><i>( {{ $property->price_30 }} PLN - najniższa cena z 30 dni )</i></span>
                            @endif
                        @endif
                        <ul class="mb-0 list-unstyled mt-4">
                            @if($current_locale == 'pl')
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
                            @else
                                <li>Building: <span>B4.1</span></li>
                                <li>Floor: <span> @if($floor->number == 0) Ground floor @else {{ $floor->number }} @endif</span></li>
                                <li>Rooms: <span>{{ $property->rooms }}</span></li>
                                <li>Area: <span>{{ $property->area }} m<sup>2</sup></span></li>
                                <li>Kitchen/Kitchen: <span>{{ kitchenType($property->kitchen_type) }}</span></li>
                                @if($property->storeroom)<li>Pantry: <span>{{ $property->storeroom }}</span></li>@endif
                                @if($property->garden_area)<li>Garden:<span>{{$property->garden_area}} m<sup>2</sup></span></li>@endif
                                @if($property->balcony_area)<li>Balcony:<span>{{$property->balcony_area}} m<sup>2</sup></span></li>@endif
                                @if($property->balcony_area_2)<li>Balcony 2:<span>{{$property->balcony_area_2}} m<sup>2</sup></span></li>@endif
                                @if($property->terrace_area)<li>Terrace:<span>{{$property->terrace_area}} m<sup>2</sup></span></li>@endif
                                @if($property->terrace_area_2)<li>Terrace 2:<span>{{$property->terrace_area_2}} m<sup>2</sup></span></li>@endif
                                @if($property->loggia_area)<li>Terrace 2:<span>{{$property->loggia_area}} m<sup>2</sup></span></li>@endif
                                @if($property->parking_space)<li>Parking space:<span>{{$property->parking_space}}</span></li>@endif
                                @if($property->garage)<li>Garage:<span>{{$property->garage}}</span></li>@endif
                                @if($property->deadline)<li>Due date: <span>{{ $property->deadline }}</span></li>@endif
                            @endif
                        </ul>
                    </div>

                    <div class="pe-0 pe-xl-4">
                        <div class="row mt-5">
                            @if($property->file_pdf && $property->status <> 3)
                                <div class="col-12 col-md-6">
                                    <a href="{{ asset('/investment/property/pdf/'.$property->file_pdf) }}" target="_blank" class="bttn bttn-slow w-100 justify-content-center ">@lang('website.property_pdf') <i class="ms-4 las la-download"></i></a>
                                </div>
                            @endif

                            @if($property->file_3d)
                            <div class="col-12 col-md-6 mt-2 mt-md-0">
                                <a href="{{ asset('/investment/property/pdf/'.$property->file_3d) }}" target="_blank" class="bttn bttn-slow w-100 justify-content-center ">@lang('website.property_3d')<i class="ms-4 las la-download"></i></a>
                            </div>
                            @endif

                            @if($property->virtual_walk)
                            <div class="col-12 mt-2">
                                <button type="button" class="bttn bttn-slow w-100 justify-content-center" data-bs-toggle="modal" data-bs-target="#exampleModal">@lang('website.property_3d_walk')<i class="ms-4 las la-vr-cardboard"></i></button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $property->name }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="ratio ratio-16x9">
                                            <iframe frameborder="0" src="{{ $property->virtual_walk }}" allow="fullscreen" style="min-width: 100%; height: 100%"
                                            ></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($property->view_3d)
                            <div class="col-12 mt-2">
                                <button type="button" class="bttn bttn-slow w-100 justify-content-center" data-bs-toggle="modal" data-bs-target="#3dModal">Widok 3D<i class="ms-4 las la-vr-cardboard"></i></button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="3dModal" tabindex="-1" aria-labelledby="3dModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="3dModalLabel">{{ $property->name }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="ratio ratio-16x9">
                                            <iframe frameborder="0" src="{{ $property->view_3d }}" allow="fullscreen" style="min-width: 100%; height: 100%"
                                            ></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="col-12 col-sm-6 mt-4">
                                <a href="#contactForm" data-offset="0" target="_blank" class="bttn bttn-slow w-100 justify-content-center bttn-slow-red scroll-to">@lang('website.property_ask_for')</a>
                            </div>

                            <div class="col-12 col-sm-6 mt-2 mt-sm-4">
                                <button id="addToFav" class="bttn bttn-slow w-100 justify-content-center bttn-slow-red" data-id="{{$property->id}}">@lang('website.property_clipboard')<i class="ms-4 las la-heart"></i></button>
                                <div id="clipboardmessage"></div>
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
                            @if($current_locale == 'pl')
                            <a href="{{route('developro.floor', [$investment->slug, $floor, Str::slug($floor->name)])}}" class="bttn justify-content-center bttn-slow">Wróć do planu</a>
                            @else
                            <a href="{{route('developro.floor', [$investment->slug, $floor, Str::slug($floor->name)])}}" class="bttn justify-content-center bttn-slow">Return to the plan</a>
                            @endif
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
                    @if($current_locale == 'pl')
                    <h2 class="slow-header justify-content-center"><span class="rostemary">Mieszkania</span> <span class="abuget brown">Podobne</span></h2>
                    @else
                    <h2 class="slow-header justify-content-center"><span class="rostemary">Similar</span> <span class="abuget brown">Apartments</span></h2>
                    @endif
                </div>
            </div>

            <div class="row mt-4">
                @foreach($similar as $room)
                    <div class="col-12 col-lg-4 p-0 p-sm-4">
                        <div class="similar-rooms">
                            {!! roomStatusBadge($room->status) !!}
                            @if($room->file)
                                <a href="{{ route('developro.property', [$room->investment->slug, $room, Str::slug($room->name), floorLevel($room->floor_number, true), number2RoomsName($room->rooms, true), round(floatval($room->area), 2).'-m2']) }}">
                                    <picture>
                                        <source type="image/webp" srcset="/investment/property/thumbs/webp/{{$room->file_webp}}">
                                        <source type="image/jpeg" srcset="/investment/property/thumbs/{{$room->file}}">
                                        <img src="/investment/property/thumbs/{{$room->file}}" alt="{{$room->name}}" class="w-100">
                                    </picture>
                                </a>
                            @endif
                            <h2 class="poppins"><a href="{{ route('developro.property', [$room->investment->slug, $room, Str::slug($room->name), floorLevel($room->floor_number, true), number2RoomsName($room->rooms, true), round(floatval($room->area), 2).'-m2']) }}">{{$room->name}}</a></h2>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-xl-4 property-list-item-stat d-flex justify-content-center mb-3 mb-xl-0">
                                        <img src="{{ asset('/images/floor-icon.svg') }}" alt="Ikonka piętra" class="me-3"> @lang('website.select-option-floor') {{$room->floor_number}}
                                    </div>
                                    <div class="col-12 col-xl-4 property-list-item-stat d-flex justify-content-center mb-3 mb-xl-0">
                                        <img src="{{ asset('/images/room-icon.svg') }}" alt="Ikonka pokoi" class="me-3"> {{$room->rooms}}
                                        @if ($room->rooms == 1)
                                            @lang('website.room')
                                        @else
                                            @lang('website.rooms')
                                        @endif
                                    </div>
                                    <div class="col-12 col-xl-4 property-list-item-stat d-flex justify-content-center">
                                        <img src="{{ asset('/images/area-icon.svg') }}" alt="Ikonka powierzchni" class="me-3"> {{$room->area}} m<sup>2</sup>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('developro.property', [$room->investment->slug, $room, Str::slug($room->name), floorLevel($room->floor_number, true), number2RoomsName($room->rooms, true), round(floatval($room->area), 2).'-m2']) }}" class="bttn bttn-icon mt-4 bttn-slow">@lang('website.show-room') <i class="ms-4 las la-file"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container pt-4 mt-4 pt-md-5 mt-md-5">
            <div class="row">
                <div class="col-12 text-center">
                    @if($current_locale == 'pl')
                    <h2 class="slow-header justify-content-center"><span class="rostemary">Jesteś zainteresowany?</span> <span class="abuget brown">Masz pytania?</span></h2>
                    <h2 class="slow-header justify-content-center"><span class="rostemary">Skontaktuj się z nami!</span></h2>
                    @else
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Are you interested?</span> <span class="abuget brown">Have any questions?</span></h2>
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Contact us!</span></h2>
                    @endif
                </div>
            </div>
        </div>

        <div class="container mt-4 property-contact">
            <div class="row">
                <div class="col-12 col-xxl-4 order-2 order-xxl-1">
                    <div class="contact-box">
                        @if($current_locale == 'pl')
                            <h2>BIURO SPRZEDAŻY</h2>
                        @else
                            <h2>SALES OFFICE</h2>
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
                        <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5 bttn-slow" target="_blank">JAK DOJECHAĆ <i class="ms-3 las la-chevron-circle-right"></i></a>
                            @else
                        <a href="https://maps.app.goo.gl/Sv3KkJU2Dpxm9gX87" class="bttn bttn-icon mt-5 bttn-slow" target="_blank">HOW TO GET TO US <i class="ms-3 las la-chevron-circle-right"></i></a>
                            @endif
                    </div>
                </div>
                <div class="col-12 col-xxl-8 order-1 order-xxl-2 mb-4 mb-xxl-0">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                        <img src="{{ asset('/images/contact-img.jpg') }}" class="golden-border d-none d-lg-block" alt="">
                        <div class="ps-0 ps-lg-5 sellers text-center text-lg-start">
                            <h2>Elżbieta Kalinowska</h2>
                            <a href="mailto:e.kalinowska@ippon.group">e.kalinowska@ippon.group</a>
                            <a href="tel:+48609884219"><strong>+48 609 884 219</strong></a>
                            <a href="tel:+48724222323"><strong>+48 724 222 323</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-4 mt-4 pt-md-5 mt-md-5">
            <div class="row">
                <div class="col-12 text-center m-4">
                    @if($current_locale == 'pl')
                    <h2 class="slow-header justify-content-center"><span class="abuget brown">Masz pytania?</span><span class="rostemary">Napisz do nas</span></h2>
                    @else
                    <h2 class="slow-header justify-content-center"><span class="abuget brown">Have more questions?</span><span class="rostemary">Write to us!</span></h2>
                    @endif
                </div>
            </div>
        </div>

        @include('front.contact.property-form', [ 'page_name' => $investment->name .' - '. $property->name, 'investment' => $investment, 'property' => $room ])
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        const button = document.querySelector('#addToFav');
        button.addEventListener('click', function() {
            const xhr = new XMLHttpRequest();
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const property_id = button.getAttribute('data-id');

            xhr.open('POST', '/pl/clipboard');
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            const data = { id: property_id };
            const jsonData = JSON.stringify(data);
            xhr.send(jsonData);

            xhr.addEventListener('load', function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const message = response.message;
                    const count = response.count;
                    document.querySelector('#clipboardmessage').innerHTML = message;
                    document.querySelector('#clipboardcount').innerHTML = count;
                }
            });
        });
    </script>
@endpush
