@extends('layouts.page', ['body_class' => 'ip-page location-page'])

@section('meta_title', $city ? $city->name : 'Mapa inwestycji')
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

{{-- ==== STARY KOD — wylaczony, do usuniecia po odbiorze ==== --}}
@if(1 == 2)
@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => 'Inwestycje '.$city->name, 'page' => $page, 'header_file' => $city->file_header])
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
                <div id="locationInvestThumb" @if($investments->count() <= 3) class="container d-flex justify-content-center" @endif >
                    @foreach($investments as $r)
                    <div class="locationInvest @if($investments->count() <= 3) col-12 col-sm-10 col-lg-6 @endif">
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
                                    @if($r->file_logo)
                                        <div class="invest-item-logo">
                                            <img src="{{ asset('investment/logo/'.$r->file_logo) }}" alt="Logo {{ $r->name }}">
                                        </div>
                                    @endif
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
                                        <p>{!! $r->entry_content !!}</p>
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

            let markers = [
                @foreach ($investments as $p)
                    @if($p->marker == 1)
                    [{{$p->lat}}, {{$p->lng}}, '{{$p->name}}', '{{$p->file_logo}}', '{{$p->slug}}', {{$p->developro}}],
                    @endif
                @endforeach
                ],
                route = L.featureGroup().addTo(map),
                n = markers.length;

            for (let i = 0; i < n; i++) {
                let customIcon = L.divIcon();

                if(markers[i][5] === 1){
                    customIcon = L.divIcon({
                        className: 'custom-marker',
                        html: '<a href="/pl/i/'+markers[i][4]+'"><img src="/investment/logo/'+markers[i][3]+'" alt="Logo '+markers[i][2]+'"></a>',
                        iconSize: [90, 90],
                        iconAnchor: [45, 20]
                    });
                } else {
                    customIcon = L.divIcon({
                        className: 'custom-marker',
                        html: '<img src="/investment/logo/'+markers[i][3]+'" alt="Logo '+markers[i][2]+'">',
                        iconSize: [90, 90],
                        iconAnchor: [45, 20]
                    });
                }

                let marker = new L.Marker([markers[i][0], markers[i][1]], { icon: customIcon }).bindPopup(markers[i][2]);
                route.addLayer(marker);
            }

            map.fitBounds(route.getBounds(), {padding: [40, 40]});
        </script>
        @if($investments->count() > 3)
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
        @endif
    @endpush
@endif
@endif

{{-- ==========================================================================
     NOWA PODSTRONA MAPY — makieta Figma "MAPKA INWESTYCJI"
     ========================================================================== --}}

@php
    /** Status inwestycji → etykieta + wariant kolorystyczny (legenda ma 3 pozycje). */
    $ipStatus = function ($status) {
        return match ((int) $status) {
            1       => ['label' => 'W sprzedaży',   'variant' => 'sale'],
            4       => ['label' => 'Wkrótce',       'variant' => 'soon'],
            3       => ['label' => 'Planowana',     'variant' => 'planned'],
            2       => ['label' => 'Zrealizowane',  'variant' => 'done'],
            default => ['label' => '',              'variant' => 'soon'],
        };
    };

    /** area_range w CMS bywa zapisane jako "27-32,37-45,48-56" — bierzemy skrajne wartosci. */
    $ipAreaRange = function ($raw) {
        if (!$raw) return null;
        preg_match_all('/\d+(?:[.,]\d+)?/', $raw, $m);
        if (empty($m[0])) return null;
        $nums = array_map(fn($n) => (float) str_replace(',', '.', $n), $m[0]);
        $min = (int) round(min($nums));
        $max = (int) round(max($nums));
        return $min === $max ? $min.' m²' : $min.'–'.$max.' m²';
    };

    $ipCurrentSlug = $city?->slug ?? 'wszystkie';

    /* Czesc plikow z CMS-u nie istnieje w lokalnej kopii — bez tej kontroli
       przegladarka pokazuje ikone zepsutego obrazka zamiast czystego tla. */
    $ipFile = function ($dir, $file) {
        return $file && is_file(public_path($dir.'/'.$file)) ? asset($dir.'/'.$file) : null;
    };

    /* Punkty na mape. Budowane tutaj, bo wieloliniowy @json(...) z nawiasami
       kwadratowymi rozjezdza parser dyrektyw Blade'a. */
    $ipPoints = $investments
        ->filter(fn($i) => $i->marker && $i->lat && $i->lng)
        ->map(function ($i) use ($ipStatus) {
            $url = investmentUrl($i);

            return [
                'id'       => $i->id,
                'lat'      => (float) $i->lat,
                'lng'      => (float) $i->lng,
                'name'     => $i->name,
                'address'  => $i->address,
                'variant'  => $ipStatus($i->status)['variant'],
                'url'      => $url,
                'external' => investmentUrlExternal($url),
            ];
        })
        ->values();
@endphp

@section('pageheader')
    <div class="ip-pagehead">
        @php $ipHeader = $city ? $ipFile('uploads/header', $city->file_header) : null; @endphp
        @if($ipHeader)
            <img src="{{ $ipHeader }}" alt="">
        @endif

        <div class="container">
            <nav class="ip-breadcrumbs">
                <a href="{{ url('/'.app()->getLocale()) }}">Strona główna</a>
                <i>|</i>
                <span>Mapa inwestycji{{ $city ? ' – '.$city->name : '' }}</span>
            </nav>

            <div class="ip-pagehead-title">
                <h1>Mapa inwestycji</h1>
                <div class="ip-rule"></div>
            </div>
        </div>
    </div>
@stop

@section('content')
<section class="ip-map-section">
    <div class="container">

        <nav class="ip-city-tabs">
            @foreach($mapCities as $c)
                <a href="{{ route('map', ['locale' => app()->getLocale(), 'slug' => $c->slug]) }}"
                   class="{{ $ipCurrentSlug === $c->slug ? 'is-active' : '' }}">{{ $c->name }}</a>
            @endforeach
            <a href="{{ route('map', ['locale' => app()->getLocale(), 'slug' => 'wszystkie']) }}"
               class="{{ $ipCurrentSlug === 'wszystkie' ? 'is-active' : '' }}">Wszystkie</a>
        </nav>

        <div class="row g-0 ip-map-panel">

            <div class="col-12 col-lg-6">
                <div class="ip-inv-list">
                    @forelse($investments as $inv)
                        @php
                            $st    = $ipStatus($inv->status);
                            $area  = $ipAreaRange($inv->area_range);
                            $url   = investmentUrl($inv);
                        @endphp

                        <article class="ip-inv-card" data-inv="{{ $inv->id }}">
                            <div class="ip-inv-media">
                                @php $ipThumb = $ipFile('investment/thumbs', $inv->file_thumb); @endphp
                                @if($ipThumb)
                                    <img src="{{ $ipThumb }}" alt="{{ $inv->name }}">
                                @endif
                                @if($st['label'])
                                    <span class="ip-inv-badge is-{{ $st['variant'] }}">{{ $st['label'] }}</span>
                                @endif
                            </div>

                            <div class="ip-inv-body">
                                <span class="ip-inv-brand">Ippon</span>

                                <h2 class="ip-inv-name">
                                    @if($url)<a {!! investmentLinkAttrs($url) !!}>{{ $inv->name }}</a>@else{{ $inv->name }}@endif
                                </h2>

                                @if($inv->address)
                                    <div class="ip-inv-address">
                                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                        {{ $inv->address }}
                                    </div>
                                @endif

                                <div class="ip-inv-foot">
                                    <ul class="ip-inv-params list-unstyled">
                                        @if($inv->areas_amount)
                                            <li>
                                                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 18v-5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v5"/><path d="M5 11V7a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v4"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                                                {{ $inv->areas_amount }} mieszkań
                                            </li>
                                        @endif
                                        @if($area)
                                            <li>
                                                <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="14,3 21,3 21,10"/><line x1="21" y1="3" x2="12" y2="12"/><path d="M18 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h5"/></svg>
                                                {{ $area }}
                                            </li>
                                        @endif
                                        @if($inv->date_end)
                                            <li>
                                                <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="8" y1="3" x2="8" y2="7"/><line x1="16" y1="3" x2="16" y2="7"/></svg>
                                                {{ $inv->date_end }}
                                            </li>
                                        @endif
                                    </ul>

                                    @if($url)
                                        <a {!! investmentLinkAttrs($url) !!} class="ip-inv-go" aria-label="Zobacz inwestycję {{ $inv->name }}">
                                            <svg viewBox="0 0 18 16" aria-hidden="true"><polyline points="10,1 17,8 10,15"/><line x1="1" y1="8" x2="17" y2="8"/></svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="ip-inv-empty">Brak inwestycji w tej lokalizacji.</div>
                    @endforelse
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="ip-map-wrap">
                    <div id="map"></div>

                    <div class="ip-map-legend">
                        <span><i class="dot-sale"></i> W sprzedaży</span>
                        <span><i class="dot-soon"></i> Wkrótce</span>
                        <span><i class="dot-done"></i> Zrealizowane</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/leaflet.js') }}"></script>
    <script>
        (function () {
            var el = document.getElementById('map');
            if (!el || typeof L === 'undefined') return;

            var points = @json($ipPoints);

            var map = L.map(el, { scrollWheelZoom: false }).setView([53.7784, 20.4801], 12);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                maxZoom: 19
            }).addTo(map);

            /* pinezka w kolorze statusu, z ikona budynku */
            function pin(variant) {
                return L.divIcon({
                    className: '',
                    html: '<span class="ip-marker is-' + variant + '">' +
                          '<svg width="46" height="58" viewBox="0 0 46 58">' +
                          '<path class="ip-marker-pin" d="M23 0C10.3 0 0 10.3 0 23c0 16.4 20.4 33.4 21.3 34.1a2.7 2.7 0 0 0 3.4 0C25.6 56.4 46 39.4 46 23 46 10.3 35.7 0 23 0z"/>' +
                          '<path class="ip-marker-glyph" d="M15 30V17l7-3v16h-7zm9 0V21l7 3v6h-7zm2-6.5v1.5h3v-1.5h-3zm-9-4v1.5h3V19.5h-3zm0 4V25h3v-1.5h-3z"/>' +
                          '</svg></span>',
                    iconSize: [46, 58],
                    iconAnchor: [23, 58],
                    popupAnchor: [0, -50]
                });
            }

            var group = L.featureGroup().addTo(map);

            points.forEach(function (p) {
                var html = '<strong>' + p.name + '</strong>' +
                           (p.address ? '<br>' + p.address : '') +
                           (p.url ? '<br><a href="' + p.url + '"' + (p.external ? ' target="_blank" rel="noopener"' : '') + '>Zobacz inwestycję</a>' : '');

                var marker = L.marker([p.lat, p.lng], { icon: pin(p.variant) })
                    .bindPopup(html);

                marker.on('click', function () {
                    document.querySelectorAll('.ip-inv-card.is-active')
                        .forEach(function (c) { c.classList.remove('is-active'); });

                    var card = document.querySelector('.ip-inv-card[data-inv="' + p.id + '"]');
                    if (card) {
                        card.classList.add('is-active');
                        card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                });

                group.addLayer(marker);
            });

            if (points.length) {
                map.fitBounds(group.getBounds(), { padding: [60, 60], maxZoom: 14 });
            }

            /* najechanie na karte podswietla znacznik */
            document.querySelectorAll('.ip-inv-card').forEach(function (card) {
                card.addEventListener('mouseenter', function () {
                    var id = card.getAttribute('data-inv');
                    group.eachLayer(function (layer) {
                        var p = points.find(function (x) { return String(x.id) === id; });
                        if (p && layer.getLatLng().lat === p.lat && layer.getLatLng().lng === p.lng) {
                            layer.openPopup();
                        }
                    });
                });
            });

            /* zoom kolkiem dopiero po kliknieciu w mape — zeby nie blokowac scrolla strony */
            map.on('click', function () { map.scrollWheelZoom.enable(); });
            map.on('mouseout', function () { map.scrollWheelZoom.disable(); });
        })();
    </script>
@endpush
