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
                        @auth
                            <div class="row">
                                <div class="col-12">
                                    @auth
                                        {{--                            @if($property->has_price_history)--}}
                                        <a href="#" class="btn bttn bttn-sm btn-history mt-3" data-id="{{ $property->id }}">Pokaż historię ceny</a>
                                        <div id="modalHistory"></div>
                                        {{--                            @endif--}}
                                    @endauth
                                </div>
                            </div>
                        @else
                            @if($property->price)
                                <h3 class="mt-3 mb-0"><b>{{ $property->price }} PLN</b></h3>
                                @if($property->price_30)
                                    <span><i>( {{ $property->price_30 }} PLN - najniższa cena z 30 dni )</i></span>
                                @endif
                            @endif
                        @endauth
                        <ul class="mb-0 list-unstyled mt-4">
                            @if($current_locale == 'pl')
                                @auth
                                    @if($property->price_brutto && $property->status == 1)
                                        <li @if($property->highlighted) class="promotion-price" @endif>Cena:
                                            <span>@money($property->price_brutto) PLN</span>
                                            @if($property->promotion_price && $property->price_brutto && $property->highlighted)
                                                <b>@money($property->promotion_price) PLN</b>
                                            @endif
                                        </li>
                                        <li @if($property->highlighted) class="promotion-price" @endif>Cena za m<sup>2</sup>:
                                            <span>@money(($property->price_brutto / $property->area)) PLN</span>
                                            @if($property->promotion_price && $property->price_brutto && $property->highlighted)
                                                <b>@money(($property->promotion_price / $property->area)) PLN</b>
                                            @endif
                                        </li>
                                    @endif
                                @endauth

                                @if($property->building)
                                    <li>Budynek: <span>{{ $property->building->name }}</span></li>
                                @endif
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

                                @php
                                    $kl_list = $investment->propertiesByType(2);
                                    $minPrice = $kl_list->isNotEmpty() ? $kl_list->min('price_brutto') : null;
                                @endphp
                                    @if($kl_list->count() > 0)
                                    <li>
                                <div>
                                    Dostępne komórki lokatorskie:<br><small>Już od <b>@money($minPrice)</b></small>
                                </div>
                                <span><button class="btn bttn bttn-sm mt-0">zobacz listę</button></span>
                                <div class="table-wrapper d-none w-100 mt-3">
                                    <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nazwa</th>
                                        <th class="text-center">Powierzchnia</th>
                                        <th class="text-center">Cena</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($kl_list as $kl)
                                        <tr>
                                            <td valign="middle">{{ $kl->name }}</td>
                                            <td class="text-center" valign="middle">{{ $kl->area }} m<sup>2</sup></td>
                                            <td class="text-center" valign="middle">
                                                @money($kl->price_brutto)
                                            </td>
                                            <td valign="middle" align="right">
    {{--                                                    @if($kl->has_price_history)--}}
                                                    <a href="#" class="btn-history" data-id="{{ $kl->id }}"><svg class="d-block" width="16px" height="16px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path fill="#000000" d="M10.6972,0.468433 C12.354,1.06178 13.7689,2.18485 14.7228,3.66372 C15.6766,5.14258 16.1163,6.89471 15.9736,8.64872 C15.8309,10.4027 15.1138,12.0607 13.9334,13.366 C12.753,14.6712 11.1752,15.5508 9.4443,15.8685 C7.71342,16.1863 5.92606,15.9244 4.35906,15.1235 C2.79206,14.3226 1.53287,13.0274 0.776508,11.4384 C0.539137,10.9397 0.750962,10.343 1.24963,10.1057 C1.74831,9.86829 2.34499,10.0801 2.58236,10.5788 C3.14963,11.7705 4.09402,12.742 5.26927,13.3426 C6.44452,13.9433 7.78504,14.1397 9.08321,13.9014 C10.3814,13.6631 11.5647,13.0034 12.45,12.0245 C13.3353,11.0456 13.8731,9.80205 13.9801,8.48654 C14.0872,7.17103 13.7574,5.85694 13.042,4.74779 C12.3266,3.63864 11.2655,2.79633 10.0229,2.35133 C8.78032,1.90632 7.42568,1.88344 6.1688,2.28624 C5.34644,2.54978 4.59596,2.98593 3.96459,3.5597 L4.69779,4.29291 C5.32776,4.92287 4.88159,6.00002 3.99069,6.00002 L1.77635684e-15,6.00002 L1.77635684e-15,2.00933 C1.77635684e-15,1.11842 1.07714,0.672258 1.70711,1.30222 L2.54916,2.14428 C3.40537,1.3473 4.43126,0.742882 5.55842,0.381656 C7.23428,-0.155411 9.04046,-0.124911 10.6972,0.468433 Z M8,4 C8.55229,4 9,4.44772 9,5 L9,7.58579 L10.7071,9.29289 C11.0976,9.68342 11.0976,10.3166 10.7071,10.7071 C10.3166,11.0976 9.68342,11.0976 9.29289,10.7071 L7,8.41421 L7,5 C7,4.44772 7.44772,4 8,4 Z"/></svg></a>
    {{--                                                    @endif--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </li>
                                    @endif
                                @php
                                    $mp_list = $investment->propertiesByType(3);
                                    $minMPPrice = $mp_list->isNotEmpty() ? $mp_list->min('price_brutto') : null;
                                @endphp
                                    @if($mp_list->count() > 0)
                                <li>
                                    <div>
                                        Dostępne miejsca parkingowe:<br><small>Już od <b>@money($minMPPrice)</b></small>
                                    </div>
                                    <span><button class="btn bttn bttn-sm mt-0" href="">zobacz listę</button></span>
                                    <div class="table-wrapper d-none w-100 mt-3">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nazwa</th>
                                            <th class="text-center">Powierzchnia</th>
                                            <th class="text-center">Cena</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mp_list as $kl)
                                            <tr>
                                                <td valign="middle">{{ $kl->name }}</td>
                                                <td class="text-center" valign="middle">{{ $kl->area }} m<sup>2</sup></td>
                                                <td class="text-center" valign="middle">
                                                    @money($kl->price_brutto)
                                                </td>
                                                <td valign="middle" align="right">
                                                    {{--                                                    @if($kl->has_price_history)--}}
                                                    <a href="#" class="btn-history" data-id="{{ $kl->id }}"><svg class="d-block" width="16px" height="16px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path fill="#000000" d="M10.6972,0.468433 C12.354,1.06178 13.7689,2.18485 14.7228,3.66372 C15.6766,5.14258 16.1163,6.89471 15.9736,8.64872 C15.8309,10.4027 15.1138,12.0607 13.9334,13.366 C12.753,14.6712 11.1752,15.5508 9.4443,15.8685 C7.71342,16.1863 5.92606,15.9244 4.35906,15.1235 C2.79206,14.3226 1.53287,13.0274 0.776508,11.4384 C0.539137,10.9397 0.750962,10.343 1.24963,10.1057 C1.74831,9.86829 2.34499,10.0801 2.58236,10.5788 C3.14963,11.7705 4.09402,12.742 5.26927,13.3426 C6.44452,13.9433 7.78504,14.1397 9.08321,13.9014 C10.3814,13.6631 11.5647,13.0034 12.45,12.0245 C13.3353,11.0456 13.8731,9.80205 13.9801,8.48654 C14.0872,7.17103 13.7574,5.85694 13.042,4.74779 C12.3266,3.63864 11.2655,2.79633 10.0229,2.35133 C8.78032,1.90632 7.42568,1.88344 6.1688,2.28624 C5.34644,2.54978 4.59596,2.98593 3.96459,3.5597 L4.69779,4.29291 C5.32776,4.92287 4.88159,6.00002 3.99069,6.00002 L1.77635684e-15,6.00002 L1.77635684e-15,2.00933 C1.77635684e-15,1.11842 1.07714,0.672258 1.70711,1.30222 L2.54916,2.14428 C3.40537,1.3473 4.43126,0.742882 5.55842,0.381656 C7.23428,-0.155411 9.04046,-0.124911 10.6972,0.468433 Z M8,4 C8.55229,4 9,4.44772 9,5 L9,7.58579 L10.7071,9.29289 C11.0976,9.68342 11.0976,10.3166 10.7071,10.7071 C10.3166,11.0976 9.68342,11.0976 9.29289,10.7071 L7,8.41421 L7,5 C7,4.44772 7.44772,4 8,4 Z"/></svg></a>
                                                    {{--                                                    @endif--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </li>
                                    @endif
                            @else
                                @auth
                                    @if($property->price_brutto && $property->status == 1)
                                        <li @if($property->highlighted) class="promotion-price" @endif>Price:
                                            <span>@money($property->price_brutto) PLN</span>
                                            @if($property->promotion_price && $property->price_brutto && $property->highlighted)
                                                <b>@money($property->promotion_price) PLN</b>
                                            @endif
                                        </li>
                                        <li @if($property->highlighted) class="promotion-price" @endif>Price per sqm:
                                            <span>@money(($property->price_brutto / $property->area)) PLN</span>
                                            @if($property->promotion_price && $property->price_brutto && $property->highlighted)
                                                <b>@money(($property->promotion_price / $property->area)) PLN</b>
                                            @endif
                                        </li>
                                    @endif
                                @endauth

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
                        @auth
                            <div class="row">
                                <div class="col-12">
                                    @if ($property->status == 1 && $property->type == 1)
                                        <div class="property-related">
                                            @if($property->relatedProperties->isNotEmpty())
                                                <h5>Przynależne powierzchnie:</h5>
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Nazwa</th>
                                                        <th class="text-center">Powierzchnia</th>
                                                        <th class="text-center">Cena</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($property->relatedProperties as $related)
                                                        <tr>
                                                            <td valign="middle">{{ $related->name }}</td>
                                                            <td class="text-center" valign="middle">{{ $related->area }} m<sup>2</sup></td>
                                                            <td class="text-center" valign="middle">
                                                                @money($related->price_brutto)
                                                            </td>
                                                            <td valign="middle" align="right">
                                                                @if($related->has_price_history)
                                                                    <a href="#" class="btn-history" data-id="{{ $related->id }}"><svg class="d-block" width="16px" height="16px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path fill="#000000" d="M10.6972,0.468433 C12.354,1.06178 13.7689,2.18485 14.7228,3.66372 C15.6766,5.14258 16.1163,6.89471 15.9736,8.64872 C15.8309,10.4027 15.1138,12.0607 13.9334,13.366 C12.753,14.6712 11.1752,15.5508 9.4443,15.8685 C7.71342,16.1863 5.92606,15.9244 4.35906,15.1235 C2.79206,14.3226 1.53287,13.0274 0.776508,11.4384 C0.539137,10.9397 0.750962,10.343 1.24963,10.1057 C1.74831,9.86829 2.34499,10.0801 2.58236,10.5788 C3.14963,11.7705 4.09402,12.742 5.26927,13.3426 C6.44452,13.9433 7.78504,14.1397 9.08321,13.9014 C10.3814,13.6631 11.5647,13.0034 12.45,12.0245 C13.3353,11.0456 13.8731,9.80205 13.9801,8.48654 C14.0872,7.17103 13.7574,5.85694 13.042,4.74779 C12.3266,3.63864 11.2655,2.79633 10.0229,2.35133 C8.78032,1.90632 7.42568,1.88344 6.1688,2.28624 C5.34644,2.54978 4.59596,2.98593 3.96459,3.5597 L4.69779,4.29291 C5.32776,4.92287 4.88159,6.00002 3.99069,6.00002 L1.77635684e-15,6.00002 L1.77635684e-15,2.00933 C1.77635684e-15,1.11842 1.07714,0.672258 1.70711,1.30222 L2.54916,2.14428 C3.40537,1.3473 4.43126,0.742882 5.55842,0.381656 C7.23428,-0.155411 9.04046,-0.124911 10.6972,0.468433 Z M8,4 C8.55229,4 9,4.44772 9,5 L9,7.58579 L10.7071,9.29289 C11.0976,9.68342 11.0976,10.3166 10.7071,10.7071 C10.3166,11.0976 9.68342,11.0976 9.29289,10.7071 L7,8.41421 L7,5 C7,4.44772 7.44772,4 8,4 Z"/>
                                                                        </svg></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @endif

                                            @auth
                                                {{-- @if($property->visitor_related_type != 1) --}}
                                                <div class="property-offer-check d-none">
                                                    <p>Dodanie powierzchni dodatkowych służy jedynie orientacyjnej wycenie. Ostateczna oferta oraz warunki zakupu zostaną przedstawione przez przedstawiciela sprzedaży.</p>
                                                    <a href="#" class="btn bttn bttn-sm btn-offer mt-3" data-id="{{ $property->id }}">Dodaj do oferty</a>
                                                    <div id="offerModal"></div>
                                                    <table class="table d-none mt-3">
                                                        <thead>
                                                        <tr>
                                                            <th>Nazwa</th>
                                                            <th class="text-center">Powierzchnia</th>
                                                            <th class="text-center">Cena</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="offerList"></tbody>
                                                    </table>
                                                </div>
                                                {{-- @endif--}}
                                            @endauth
                                        </div>

                                        @auth
                                            <div class="d-none">
                                                @if($property->highlighted && $property->promotion_price_show)
                                                    <div class="property-summary fs-5 d-flex" data-totalprice="{{ ($property->promotion_price + $property->relatedProperties->sum('price_brutto')) }}">
                                                        Cena za całość: <span class="ms-auto"><b class="fw-bold" id="totalDisplay">@money(($property->promotion_price + $property->relatedProperties->sum('price_brutto')))</b></span>
                                                    </div>
                                                @else
                                                    @if($property->price_brutto)
                                                        <div class="property-summary fs-5 d-flex" data-totalprice="{{ ($property->price_brutto + $property->relatedProperties->sum('price_brutto')) }}">
                                                            Cena za całość:
                                                            <span class="ms-auto">
                                                            <b class="fw-bold" id="totalDisplay">
                                                                @if($property->promotion_price && $property->price_brutto && $property->highlighted)
                                                                    @money(($property->promotion_price + $property->relatedProperties->sum('price_brutto')))
                                                                @else
                                                                    @money(($property->price_brutto + $property->relatedProperties->sum('price_brutto')))
                                                                @endif
                                                            </b>
                                                        </span>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                            @if($property->priceComponents)
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="price-component mb-0 list-unstyled">
                                            @foreach($property->priceComponents as $priceComponent)
                                                <li>
                                                    {{ $priceComponent->name }}
                                                    <span class="ms-auto text-end">
                                                    @if($priceComponent->pivot->value)
                                                            <span><b>@money($priceComponent->pivot->value)</b></span>
                                                        @endif
                                                            <?php if ($priceComponent->pivot->category == 1) : ?>
                                                        <span class="small">Obowiązkowy</span>
                                                    <?php elseif ($priceComponent->pivot->category == 2) : ?>
                                                        <span class="small">Opcjonalny</span>
                                                    <?php else : ?>
                                                        <span class="small">Zmienny</span>
                                                    <?php endif; ?>
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        @endauth

                        @if($property->attributes_bg && $property->attributes_text && $property->attributes_content)
                            <div class="attributes mt-4">
                                <div style="background:{{ $property->attributes_bg }}; color:{{ $property->attributes_text }};">
                                    <span>{{ $property->attributes_content }}</span>
                                </div>
                            </div>
                        @endif

                        @if($property->building && $property->building->file_brochure)
                            <div class="mt-2 text-end prospekt">
                                <a href="{{ asset('/investment/brochure/'.$property->building->file_brochure) }}" target="_blank" class="btn bttn bttn-sm mt-2">Prospekt informacyjny</a>
                            </div>
                        @endif
                        @if(!$property->building && $investment->file_brochure)
                            <div class="mt-2 text-end prospekt">
                                <a href="{{ asset('/investment/brochure/'.$investment->file_brochure) }}" target="_blank" class="btn bttn bttn-sm mt-2">Prospekt informacyjny</a>
                            </div>
                        @endif
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
                                <div class="col-12 col-md-6 mt-2">
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
                                <div class="col-12 col-md-6 mt-2">
                                    <button type="button" class="bttn bttn-slow w-100 justify-content-center" data-bs-toggle="modal" data-bs-target="#exampleModal2">Widok 3D<i class="ms-4 las la-cube"></i></button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModal2">{{ $property->name }}</h1>
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
        document.addEventListener('click', async function (e) {
            // History Button
            const btnHistory = e.target.closest('.btn-history');
            if (btnHistory) {
                e.preventDefault();

                // Disable button to prevent double click
                btnHistory.disabled = true;

                const modalHolder = document.getElementById('modalHistory');
                const dataId = btnHistory.dataset.id;
                modalHolder.innerHTML = '';

                try {
                    const url = `/pl/historia/${dataId}/`;

                    const response = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        }
                    });

                    if (!response.ok) {
                        const errorText = await response.text();
                        console.error('Błąd z backendu:', response.status, errorText);
                        throw new Error(`Błąd sieci: ${response.status}`);
                    }

                    const html = await response.text();
                    modalHolder.innerHTML = html;

                    const modalElement = document.getElementById('portletModal');
                    const bootstrapModal = new bootstrap.Modal(modalElement);
                    bootstrapModal.show();

                    modalElement.addEventListener('hidden.bs.modal', () => {
                        modalHolder.innerHTML = '';
                    }, { once: true });

                } catch (error) {
                    alert('Wystąpił błąd podczas ładowania historii.');
                    console.error(error);
                } finally {
                    // Re-enable the button after request completes
                    btnHistory.disabled = false;
                }
            }
        });
        document.querySelectorAll('.property-desc li button').forEach(button => {
            button.addEventListener('click', function () {
                const wrapper = this.closest('li').querySelector('.table-wrapper');

                if (!wrapper) return;

                if (wrapper.classList.contains('d-block')) {
                    // already visible → hide it
                    wrapper.classList.remove('d-block');
                    wrapper.classList.add('d-none');
                } else {
                    // hide all other wrappers
                    document.querySelectorAll('.property-desc li .table-wrapper').forEach(w => {
                        w.classList.remove('d-block');
                        w.classList.add('d-none');
                    });

                    // show only this one
                    wrapper.classList.remove('d-none');
                    wrapper.classList.add('d-block');
                }
            });
        });
    </script>
@endpush
