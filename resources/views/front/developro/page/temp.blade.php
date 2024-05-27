@extends('layouts.page', ['body_class' => 'no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots')noindex, nofollow @endsection

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
<!-- copy this to editor -->

                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <div class="pe-5">
                                <h2>#Żyjw<span style="color: #e03e2d;">Tempie</span>Miasta</h2>
                                <p><strong>Osiedle TEMPO</strong> położone jest przy skrzyżowaniu <strong>ul. Sikorskiego i ul. Wilczyńskiego w Olsztynie</strong>. Dostęp do linii tramwajowych i przystank&oacute;w autobusowych sprzyja szybkiemu poruszaniu się na terenie całego miasta.</p>
                                <p>&nbsp;</p>
                                <p><strong>W parę minut dojedziesz do centrum miasta</strong>, do pracy, czy na Uniwersytet Warmińsko-Mazurki. <strong>Sikorskiego to handlowa ulica miasta</strong>, przy kt&oacute;rej znajduje się m.in.: Galeria Warmińska, Multikino, Mc Donald, Biedronka, OBI, Jysk.</p>
                                <p>&nbsp;</p>
                                <p><strong>Czyli wszystko to co potrzebujesz w zasięgu Twojej ręki.</strong></p>
                            </div>
                        </div>
                        <div class="col-6"><img src="https://placehold.co/770x578" alt="" /></div>
                    </div>
                    <div class="row flex-row-reverse mt-5 pt-5">
                        <div class="col-6 d-flex align-items-center">
                            <div class="ps-5">
                                <h2>#wTwoim<span style="color: #e03e2d;">Tempie</span></h2>
                                <p>Jeżeli jesteś studentem, ucieszy cię <strong>bezpośrednie połączenie tramwajowe i autobusowe</strong> z Uniwersytetem Warmińsko- Mazurskim.</p>
                                <p>&nbsp;</p>
                                <p>W 7 min dojedziesz tramwajem prosto na Uczelnię. Jeżeli wolisz po mieście poruszać się rowerem, skorzystasz <strong>ze ścieżki rowerowej</strong>, kt&oacute;ra biegnie wzdłuż osiedla.</p>
                                <p>&nbsp;</p>
                                <p>Szybko dojedziesz do Parku Nag&oacute;rki-Jaroty, na siłownię czy do sklepu spożywczego.</p>
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

                    <div class="row mt-5 justify-content-center" id="atut-tempo-carousel">
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/przystanek-tramwajowy.jpg') }}" alt="Ikonka przystanku tramwajowego" width="180" height="180"/>
                                <h3><span>Przystanek tramwajowy</span><strong>1 min</strong>pieszo</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/przystanek-autobus.jpg') }}" alt="Ikonka przystanku autobusowego" width="180" height="180"/>
                                <h3><span>Przystanek autobusowy</span><strong>1 min</strong>pieszo</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/sklep.jpg') }}" alt="Ikonka sklepu" width="180" height="180"/>
                                <h3><span>Biedronka</span><strong>4 min</strong>pieszo</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/starowka.jpg') }}" alt="Ikonka starego miasta" width="180" height="180"/>
                                <h3><span>Starówka</span><strong>10 min</strong>autem</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/szkola.jpg') }}" alt="Ikonka szkoły" width="180" height="180"/>
                                <h3><span>Szkoła podstawowa</span><strong>5 min</strong>autem</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/sciezki-rowerowe.jpg') }}" alt="Ikonka ścieżek rowerowych" width="180" height="180"/>
                                <h3><span>Ścieżka rowerowa</span><strong>1 min</strong>pieszo</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/silownia.jpg') }}" alt="Ikonka siłowni" width="180" height="180"/>
                                <h3><span>Siłownia</span><strong>4 min</strong>pieszo</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/plaza-miejska.jpg') }}" alt="Ikonka plaży miejskiej" width="180" height="180"/>
                                <h3><span>Plaża miejska</span><strong>7 min</strong>autem</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/obwodnica.jpg') }}" alt="Ikonka obwodnicy" width="180" height="180"/>
                                <h3><span>Obwodnica</span><strong>6 min</strong>autem</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/kino.jpg') }}" alt="Ikonka kina" width="180" height="180"/>
                                <h3><span>Kino</span><strong>2 min</strong>autem</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/galeria.jpg') }}" alt="Ikonka galerii handlowej" width="180" height="180"/>
                                <h3><span>Galeria Warmińska</span><strong>2 min</strong>autem</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/dworzec.jpg') }}" alt="Ikonka dworca" width="180" height="180"/>
                                <h3><span>Dworzec PKP</span><strong>11 min</strong>autem</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/dworzec.jpg') }}" alt="Ikonka dworca" width="180" height="180"/>
                                <h3><span>Dworzec PKP</span><strong>11 min</strong>autem</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="atut-tempo atut-tempo-lokalizacja text-center">
                                <img src="{{ asset('images/icons/tempo-lokalizacja/szkola.jpg') }}" alt="Ikonka uniwersytetu" width="180" height="180"/>
                                <h3><span>Uniwersytet W-M</span><strong>5 min</strong>autem</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row flex-row-reverse mt-5">
                        <div class="col-4 d-flex align-items-center">
                            <div class="ps-5">
                                <h2>#ŻyjwSwoim<span style="color: #e03e2d;">Tempie</span> na nowoczesnym osiedlu.</h2>
                                <p><strong>Nie trać czasu. Korzystaj z urok&oacute;w mieszkania blisko komunikacji miejskiej, punkt&oacute;w handlowych, restauracji i miejsc rozrywki.</strong></p>
                            </div>
                        </div>
                        <div class="col-8"><iframe title="YouTube video player" src="https://www.youtube.com/embed/5OleowHAz7k?si=r9R-kaftgCff8ZXu" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <h2>#w<span style="color: #e03e2d;">Tempie</span>Miasta</h2>
                        </div>
                        <div class="col-4"><img src="https://placehold.co/520x720" alt="" /></div>
                        <div class="col-4"><img src="https://placehold.co/520x720" alt="" /></div>
                        <div class="col-4"><img src="https://placehold.co/520x720" alt="" /></div>
                    </div>

<!-- end of copy this to editor -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/js/slick.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $("#atut-tempo-carousel").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    </script>
@endpush
