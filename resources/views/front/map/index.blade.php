@extends('layouts.page', ['body_class' => 'no-top no-bottom location-page'])

@section('meta_title', $city->name)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => 'Inwestycje '.$city->name, 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    @if($investments->count() > 0)
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12">
                <div id="map"></div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12">
                <div id="locationInvestThumb">
                    @foreach($investments as $r)
                    <div class="locationInvest">
                        <div class="invest-item-holder p-0">
                            <div class="invest-item">
                                <div class="invest-item-thumb img-overflow">
                                    <span class="img-badge">{{ investmentStatus($r->status) }}</span>
                                    @if($r->developro)
                                        <a href="{{ route('developro.investment.index', $r->slug) }}">
                                            <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                        </a>
                                    @else
                                        <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                    @endif
                                </div>
                                <div class="invest-item-desc">
                                    <div class="invest-item-header">
                                        @if($r->developro)
                                            <h2 class="mb-0">
                                                <a href="{{ route('developro.investment.index', $r->slug) }}">{{ $r->name }}</a>
                                            </h2>
                                        @else
                                            <h2 class="mb-0">{{ $r->name }}</h2>
                                        @endif
                                        @if($r->address)
                                            <div class="invest-item-city">{{ $r->address }}</div>
                                        @else
                                            <div class="invest-item-city"> &nbsp;</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="container pt-4 mt-4 pt-md-5 mt-md-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Masz pytania?</span> <br>Napisz do nas!</h2>
            </div>
        </div>
    </div>

    @include('front.contact.form', [ 'page_name' => 'Lokalizacja - '.$city->name])
@endsection

@if($investments->count() > 0)
    @push('scripts')
        <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css') }}">
        <script type="text/javascript" src="{{ URL::asset('js/leaflet.js') }}"></script>
        <script type="text/javascript">
            var map = L.map('map').setView([52.227388, 21.011063], 13),
                zoom = map.getZoom(),
                latLng = map.getCenter();

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            @foreach ($investments as $p)
            customIcon = L.divIcon({
                className: 'custom-marker',
                html: '<img src="{{ asset('investment/logo/'.$p->file_logo) }}" alt="Logo {{ $p->name }}">',
                iconSize: [90, 90],
                iconAnchor: [45, 20]
            });
            @endforeach

            let markers = [
                @foreach ($investments as $p)
                    [{{$p->lat}}, {{$p->lng}}, '{{$p->name}}'],
                @endforeach
                ],
                route = L.featureGroup().addTo(map),
                n = markers.length;

            for (let i = 0; i < n; i++) {
                let marker = new L.Marker([markers[i][0], markers[i][1]], { icon: customIcon }).bindPopup(markers[i][2]);
                route.addLayer(marker);
            }

            map.fitBounds(route.getBounds());
        </script>

        <script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#locationInvestThumb').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    centerMode: true,
                    centerPadding: '80px',
                    arrows: true,
                    dots: false,
                    responsive: [

                    ]
                });
            });
        </script>
    @endpush
@endif
