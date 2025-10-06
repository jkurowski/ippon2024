@extends('layouts.page', ['body_class' => 'no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
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
    <div id="page-content" class="invest-{{ $investment->slug }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <div class="pe-5">
                                <h2>#Żyjw<span style="color: #e03e2d;">Tempie</span>Miasta</h2>
                                <p><strong>Osiedle TEMPO</strong> położone jest przy skrzyżowaniu <strong>ul. Sikorskiego i ul. Wilczyńskiego w Olsztynie</strong>. Dostęp do linii tramwajowych i przystank&oacute;w autobusowych sprzyja szybkiemu poruszaniu się na terenie całego miasta.</p>
                                <p>&nbsp;</p>
                                <p><strong>W parę minut dojedziesz do centrum miasta</strong>, do pracy, czy na Uniwersytet Warmińsko-Mazurki. <strong>Sikorskiego to handlowa ulica miasta</strong>, przy kt&oacute;rej znajduje się m.in.: Galeria Warmińska, Multikino, Mc Donald, Biedronka, OBI, Jysk.</p>
                                <p>&nbsp;</p>
                                <p><strong>Czyli wszystko to co potrzebujesz w zasięgu Twojej ręki.</strong></p>
                                <a href="#" class="bttn bttn-icon mt-3 mt-sm-5 bttn-tempo">Jak dojechać <i class="ms-3 las la-chevron-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-6"><img src="https://placehold.co/770x578" alt="" /></div>
                    </div>
                    <div class="row flex-row-reverse mt-5 pt-5">
                        <div class="col-6 d-flex align-items-center">
                            <div class="ps-5">
                                <h2>#wTwoim<span style="color: #e03e2d;">Tempie</span></h2>
                                <p>Zaledwie minuta spaceru dzieli Cię od przystanków autobusowych i tramwajowych, skąd szybko dotrzesz do najważniejszych punktów Olsztyna – Dworca Głównego PKP, olsztyńskiej starówki czy Uniwersytetu Warmińsko-Mazurskiego. Niezależnie od tego, czy wybierasz komunikację miejską, czy rower, masz pełną swobodę wyboru. Wzdłuż osiedla przebiega wygodna ścieżka rowerowa, która umożliwia sprawne i bezpieczne poruszanie się po mieście.</p>
                                <a href="#" class="bttn bttn-icon mt-3 mt-sm-5 bttn-tempo">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('images/tempo/lokalizacja-wtwoimtempie.jpg') }}" alt="Zarówka, zielona trawa, eko" width="770" height="578"/>
                        </div>
                    </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-6 d-flex align-items-center">
                            <div class="ps-5">
                                <h2>#dwa<span style="color: #e03e2d;">Wjazdy</span></h2>
                                <p>Osiedle zostało zaprojektowane z myślą o codziennej wygodzie mieszkańców – także tych poruszających się samochodem. Dojazd na teren inwestycji będzie możliwy zarówno od strony ulicy Sikorskiego, jak i od strony Jarot – przez ulicę Jarocką. Dzięki temu mieszkańcy będą mogli wybrać najdogodniejszą trasę dojazdu, w zależności od kierunku, z którego nadjeżdżają. To rozwiązanie usprawni codzienne podróże, zmniejszy natężenie ruchu w obrębie osiedla i pozwoli szybciej włączyć się do głównych arterii komunikacyjnych Olsztyna.</p>
                                <a href="#" class="bttn bttn-icon mt-3 mt-sm-5 bttn-tempo">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-6"><img src="https://placehold.co/770x578" alt="" /></div>
                    </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-12 text-center">
                            <h2>#Obiekty<span style="color: #e03e2d;">wPobliżu</span></h2>
                        </div>
                        <div class="col-12"><img src="/uploads/files/tempo/mapa-lokalizacji-osiedle-tempo.jpg" alt="" /></div>
                    </div>
                    <div class="row mt-0 mt-md-4 pt-4 justify-content-center">
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="icon-tempo text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/przystanek-autobus.jpg') }}" width="160" height="160" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Przystanek autobusowy</h3>
                                    <span>2 min pieszo</span>
                                @else
                                    <h3>Kindergarten</h3>
                                    <span>2 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="icon-tempo text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/przystanek-tramwajowy.jpg') }}" width="160" height="160" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Przystanek tramwajowy</h3>
                                    <span>2 min pieszo</span>
                                @else
                                    <h3>Tram stop</h3>
                                    <span>6 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="icon-tempo text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/dworzec.jpg') }}" width="160" height="160" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Dworzec Główny</h3>
                                    <span>10 min samochodem</span>
                                @else
                                    <h3>Primary school</h3>
                                    <span>5 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="icon-tempo text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/galeria.jpg') }}" width="160" height="160" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Galeria Warmińska</h3>
                                    <span>3 min samochodem</span>
                                @else
                                    <h3>Biedronka store</h3>
                                    <span>2 minutes by car</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="icon-tempo text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/kino.jpg') }}" width="160" height="160" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Kino</h3>
                                    <span>3 min samochodem</span>
                                @else
                                    <h3>Rossmann store</h3>
                                    <span>2 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="icon-tempo text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/obwodnica.jpg') }}" width="160" height="160" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Obwodnica miasta</h3>
                                    <span>7 min samochodem</span>
                                @else
                                    <h3>Bus stop</h3>
                                    <span>1 minute on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="icon-tempo text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/sklep.jpg') }}" width="160" height="160" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Biedronka</h3>
                                    <span>3 min pieszo</span>
                                @else
                                    <h3>Sports field</h3>
                                    <span>5 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="icon-tempo text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/plaza-miejska.jpg') }}" width="160" height="160" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Plaża miejska</h3>
                                    <span>9 min samochodem</span>
                                @else
                                    <h3>Pharmacy</h3>
                                    <span>2 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="icon-tempo text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/sciezki-rowerowe.jpg') }}" width="160" height="160" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Ścieżka rowerowa</h3>
                                    <span>1 min pieszo</span>
                                @else
                                    <h3>Pharmacy</h3>
                                    <span>2 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="icon-tempo text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/szkola.jpg') }}" width="160" height="160" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Uniwersytet</h3>
                                    <span>7 min samochodem</span>
                                @else
                                    <h3>Pharmacy</h3>
                                    <span>2 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row flex-row-reverse mt-4">
                        <div class="col-4 d-flex align-items-center">
                            <div class="ps-5">
                                <h2>#ŻyjwSwoim<span style="color: #e03e2d;">Tempie</span> na nowoczesnym osiedlu.</h2>
                                <p><strong>Nie trać czasu. Korzystaj z urok&oacute;w mieszkania blisko komunikacji miejskiej, punkt&oacute;w handlowych, restauracji i miejsc rozrywki.</strong></p>
                            </div>
                        </div>
                        <div class="col-8"><iframe title="YouTube video player" src="https://www.youtube.com/embed/186E3NV8Q6k" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <h2>#w<span style="color: #e03e2d;">Tempie</span>Miasta</h2>
                        </div>
                        <div class="col-4"><img src="{{ asset('uploads/files/tempo/osiedle-tempo-lokalizacja-1.jpg') }}" alt="Wizualizacja osiedle Tempo" width="516" height="810" /></div>
                        <div class="col-4"><img src="{{ asset('uploads/files/tempo/osiedle-tempo-lokalizacja-2.jpg') }}" alt="Wizualizacja osiedle Tempo" width="516" height="810" /></div>
                        <div class="col-4"><img src="{{ asset('uploads/files/tempo/osiedle-tempo-lokalizacja-3.jpg') }}" alt="Wizualizacja osiedle Tempo" width="516" height="810" /></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-0 mt-sm-5 pt-5">
            <div class="row">
                <div class="col-12 text-center">
                    @if($current_locale == 'pl')
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Masz pytania?</span> <span class="abuget brown">Napisz do nas!</span></h2>
                    @else
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Have more questions?</span> <span class="abuget brown">Write to us!</span></h2>
                    @endif
                </div>
            </div>
        </div>
        @include('front.contact.form', [ 'page_name' => $investment->name.' - Kontakt'])
        <style>#contactForm{background:none}</style>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        AOS.init({disable: 'mobile'});
    </script>
@endpush
