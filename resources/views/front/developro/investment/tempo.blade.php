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
            <div class="row flex-row-reverse">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="pe-0 pe-xl-5">
                        <h2>#w<span style="color: #e03e2d;">Tempie</span>Miasta</h2>
                        <p>TEMPO to nowoczesne osiedle, skierowane do osób aktywnych, które chcą <b>mieć wszędzie blisko</b>. Blisko do komunikacji miejskiej, ścieżek rowerowych i sklepów. Przy osiedlu znajduje się przystanek tramwajowy i autobusowy. W kilka minut dojedziesz do centrum miasta, galerii handlowej czy na Uniwersytet Warmińsko-Mazurski.</p>
                        <a href="#" class="bttn bttn-icon mt-3 mt-xl-5 bttn-tempo">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0"><img src="{{ asset('uploads/files/tempo/wizualizacja-budynku-osiedle-tempo.jpg') }}" width="930" height="581" alt="" /></div>
            </div>

            <div class="row mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="pe-0 pe-xl-5">
                        @if($current_locale == 'pl')
                        <h2>#pakiet<span style="color: #e03e2d;">SmartHome</span></h2>
                        <p>Osiedle TEMPO to pierwsze i jedyne osiedle w Olsztynie, gdzie mieszkania już w standardzie wyposażone są w inteligentny pakiet Smart Home. W ramach wyposażenia podstawowego każdy klient otrzymuje:</p>
                        <ul>
                            <li>Matrycę sterującą zintegrowaną z instalacją mieszkania</li>
                            <li>Zdalne sterowanie ogrzewaniem dzięki inteligentnym głowicom termostatycznym</li>
                            <li>Możliwość zdalnego odcięcia wody poprzez elektrozawory bezpieczeństwa</li>
                        </ul>
                        <p>Dodatkowo system można w pełni rozbudować – np. o moduły sterowania oświetleniem, czujniki zalania czy inne rozwiązania dopasowane do stylu życia mieszkańców.</p>
                        @else
                            <h2>#<span style="color: #e03e2d;">SmartHome</span>Package</h2>
                            <p>TEMPO Estate is the first and only residential development in Olsztyn where apartments come equipped with an intelligent Smart Home package as a standard feature. As part of the basic equipment, every client receives:</p>
                            <ul>
                                <li>A control matrix integrated with the apartment’s installation</li>
                                <li>Remote heating control via smart thermostatic heads</li>
                                <li>The ability to remotely shut off water through safety electrovalves</li>
                            </ul>
                            <p>Additionally, the system can be fully expanded—for example, with lighting control modules, leak sensors, or other solutions tailored to the residents’ lifestyles.</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0"><img src="{{ asset('uploads/files/tempo/smart-home.jpg') }}" alt="" /></div>
            </div>

            <div class="row flex-row-reverse mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="ps-0 ps-xl-5">
                        <h2>#w<span style="color: #e03e2d;">Tempie</span>Życia</h2>
                        <p>Osiedle będą tworzyć trzy budynki mieszkalne z mieszkaniami od 27 m<sup>2</sup> do 85 m<sup>2</sup> oraz tarasami aż do 66 m2. Mieszkańcy skorzystają z <b>dwu-poziomowego garażu podziemnego, komórek lokatorskich oraz rowerowni</b>. W jednym z budynków, na parterze przewidziane są lokale handlowo-usługowe. Wjazd na osiedle będzie możliwy zarówno od ulicy Sikorskiego, jak i ulicy Jarockiej.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0"><img src="{{ asset('uploads/files/tempo/w-tempie-zycia.jpg') }}" width="930" height="690" alt="" /></div>
            </div>

            <div class="row mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="pe-0 pe-xl-5">
                        <h2><span style="color: #e03e2d;">#Nowoczesne</span>Rozwiązania</h2>
                        <p>Osiedle Tempo wyznacza nowe standardy na rynku. Zamiast zwykłej klamki w drzwiach wejściowych do mieszkań, zamontujemy nowoczesne <b>klamki elektroniczne</b> z wejściem na kod. Wszystkie kondygnacje w budynku będą obsługiwać <b>bliźniacze windy</b>, a do dyspozycji mieszkańców będzie <b>paczkomat</b> oraz strefa "<b>zero waste</b>", która umożliwi sąsiedzką wymianę rzeczy.</p>
                        <a href="#" class="bttn bttn-icon mt-3 mt-xl-5 bttn-tempo">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0"><img src="{{ asset('uploads/files/tempo/nowoczesne-rozwiazania.jpg') }}" alt="" /></div>
            </div>

            <div class="row flex-row-reverse mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="ps-0 ps-xl-5">
                        <h2>#panele<span style="color: #e03e2d;">Fotowoltaiczne</span></h2>
                        <p>Zastosowane panele fotowoltaiczne, realnie wpłyną na niższe opłaty za energię dla mieszkańców. Instalacja będzie zasilać oświetlenie komunikacji wspólnej, pomieszczeń technicznych, komórek lokatorskich, windy oraz wentylację.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0">
                    <img src="{{ asset('uploads/files/tempo/panele-fotowoltaiczne.jpg') }}" alt="Panele fotowoltaiczne" />
                </div>
            </div>

            <div class="row flex-row-reverse mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-4 d-flex align-items-center">
                    <div class="ps-0 ps-xl-5">
                        <h2>#ŻyjwSwoim<span style="color: #e03e2d;">Tempie</span> na nowoczesnym osiedlu.</h2>
                        <p><strong>Nie trać czasu. Korzystaj z urok&oacute;w mieszkania blisko komunikacji miejskiej, punkt&oacute;w handlowych, restauracji i miejsc rozrywki.</strong></p>
                    </div>
                </div>
                <div class="col-12 col-xl-8"><iframe title="YouTube video player" src="https://www.youtube.com/embed/186E3NV8Q6k" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
            </div>

            <div class="row mt-0 mt-xl-5 pt-2 pt-xl-5 justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="mb-3"><span style="color: #e03e2d;">#atuty</span>Osiedla</h2>
                </div>
            </div>

            <div class="row justify-content-center" id="atut-tempo-carousel">
                <div class="col-3 mt-4">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/klamki-elektroniczne.jpg') }}" alt="Ikonka klamki elektronicznej" width="180" height="180"/>
                        <h3><span>klamki elektroniczne</span> <br>w mieszkaniach</h3>
                    </div>
                </div>
                <div class="col-3 mt-4 napis-dol">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/mieszkania-z-ogrodkami.jpg') }}" alt="Ikonka ogródków" width="180" height="180"/>
                        <h3>mieszkania<span> <br>z ogródkami</span></h3>
                    </div>
                </div>
                <div class="col-3 mt-4">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/parking-podziemny.jpg') }}" alt="Ikonka parkingu podziemnego" width="180" height="180"/>
                        <h3><span>dwupoziomowy</span> <br>parking podziemny</h3>
                    </div>
                </div>
                <div class="col-3 mt-4 napis-dol">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/mieszkania-z-tarasami.jpg') }}" alt="Ikonka tarasów" width="180" height="180"/>
                        <h3>mieszkania<span> <br>z tarasami</span></h3>
                    </div>
                </div>
                <div class="col-3 mt-4">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/komorki-lokatorskie.jpg') }}" alt="Ikonka komórek lokatorskich" width="180" height="180"/>
                        <h3><span>komórki lokatorskie</span> <br>na poziomie -1</h3>
                    </div>
                </div>
                <div class="col-3 mt-4 napis-dol">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/zero-waste.jpg') }}" alt="Ikonka zero waste" width="180" height="180"/>
                        <h3>strefa<span> <br>zero waste</span></h3>
                    </div>
                </div>
                <div class="col-3 mt-4">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/rowerownie.jpg') }}" alt="Ikonka rowerowni" width="180" height="180"/>
                        <h3><span>rowerownie z wyjściem</span> <br>na ścieżkę rowerową</h3>
                    </div>
                </div>
                <div class="col-3 mt-4 napis-dol">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/drzwi-antywlamaniowe.jpg') }}" alt="Ikonka drzwi" width="180" height="180"/>
                        <h3>drzwi<span> <br>antywłamaniowe</span></h3>
                    </div>
                </div>
                <div class="col-3 mt-4">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/skrzynki-paczkowe.jpg') }}" alt="Ikonka skrzynek paczkowych" width="180" height="180"/>
                        <h3><span>skrzynki paczkowe</span> <br>dla kuriera</h3>
                    </div>
                </div>
                <div class="col-3 mt-4 napis-dol">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/cichobiezzne-windy.jpg') }}" alt="Ikonka windy" width="180" height="180"/>
                        <h3>cichobieżne<span> <br>windy</span></h3>
                    </div>
                </div>
                <div class="col-3 mt-4">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/place-zabaw.jpg') }}" alt="Ikonka placu zabaw" width="180" height="180"/>
                        <h3><span>plac zabaw</span> <br>dla dzieci</h3>
                    </div>
                </div>
                <div class="col-3 mt-4 napis-dol">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/mieszkania-z-balkonami.jpg') }}" alt="Ikonka balkonu" width="180" height="180"/>
                        <h3>mieszkania<span> <br>z balkonami</span></h3>
                    </div>
                </div>
                <div class="col-3 mt-4">
                    <div class="atut-tempo text-center">
                        <img src="{{ asset('images/icons/tempo/monitoring.jpg') }}" alt="Ikonka monitoringu" width="180" height="180"/>
                        <h3><span>monitoring</span> <br>na całym osiedlu</h3>
                    </div>
                </div>

            </div>

            <div class="row flex-row-reverse mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="ps-0 ps-xl-5">
                        <h2>#osiedle<span style="color: #e03e2d;">wTempie</span>Życia</h2>
                        <p>Zamieszkaj w <b>handlowej części miasta</b>. W kilka minut dojedziesz do Galerii Warmińskiej, Auchan, OBI, Jysk, Mc Donald oraz wielu innych punktów znajdujących się wzdłuż ulicy Sikorskiego. <b>Wszystko czego potrzebujesz, nigdy nie było tak blisko</b>.</p>
                        <a href="#" class="bttn bttn-icon mt-3 mt-xl-5 bttn-tempo">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0">
                    <img src="{{ asset('images/tempo/handlowa-czesc-miasta.jpg') }}" alt="Zadowoleni klienci z zakupów blisko osiedla" width="930" height="690"/>
                </div>
            </div>

            <div class="row mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="pe-0 pe-xl-5">
                        <h2>#mieszkaj<span style="color: #e03e2d;">Wygodnie</span></h2>
                        <p>Klatki schodowe w naszym budynku zostały zaprojektowane z dbałością o każdy detal. Ich <b>nowoczesna aranżacja</b> wpływa nie tylko na estetykę przestrzeni wspólnych, ale również na codzienny komfort mieszkańców. Użyliśmy trwałych, <b>wysokiej jakości materiałów</b> oraz dopasowanego oświetlenia, które podkreśla elegancki charakter wnętrza. Dla większej wygody i sprawnej komunikacji w budynku dostępne będą aż dwie windy, co pozwoli płynnie obsługiwać wszystkie piętra.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0"><img src="{{ asset('uploads/files/tempo/wizualizacja-klatka-schodowa-2-osiedle-tempo.jpg') }}" width="930" height="651" alt="" /></div>
            </div>

            <div class="row flex-row-reverse mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="ps-0 ps-xl-5">
                        <h2>#nowoczesne<span style="color: #e03e2d;">Osiedle</span></h2>
                        <p>Przy drzwiach antywłamaniowych do mieszkań zamontowaliśmy <b>nowoczesne klamki elektroniczne</b>. Zamki elektroniczne są bardziej bezpieczne niż tradycyjne zamki z kluczem. Wejście do mieszkania umożliwia wpisanie indywidualnego kodu lub przyłożenie karty. W przypadku błędnego wpisania kodu, system nie otworzy się.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0">
                    <img src="{{ asset('images/tempo/zamki-elektroniczne.jpg') }}" alt="Zamki elektroniczne" width="930" height="690"/>
                </div>
            </div>

            <div class="row mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="pe-0 pe-xl-5">
                        <h2>#strefa<span style="color: #e03e2d;">Zero</span>Waste</h2>
                        <p>Każdy posiada w mieszkaniu rzeczy z których nie korzysta, a które szkoda wyrzucić, typu: książki, zabawki, elementy wyposażenia. <b>Daj przedmiotom drugie życie</b>. Zostaw je w specjalnej strefie zero waste, by ktoś inny mógł z nich skorzystać. To co dla ciebie jest bezużyteczne, dla kogoś innego może być bardzo poszukiwanym przedmiotem.</p>
                        <a href="#" class="bttn bttn-icon mt-3 mt-xl-5 bttn-tempo">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0"><img src="{{ asset('uploads/files/tempo/wizualizacja-klatka-schodowa-osiedle-tempo.jpg') }}" width="930" height="651" alt="" /></div>
            </div>

            <div class="row flex-row-reverse mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="ps-0 ps-xl-5">
                        <h2>#dla<span style="color: #e03e2d;">Twojej</span>Wygody</h2>
                        <p>Skrzynki paczkowe przeznaczone do obsługi przesyłek kurierskich. Dzięki automatom <b>odbierzesz przesyłki bez kontaktu z dostawcą</b>, bez kolejek, we własnym budynku. Nie musisz być w domu aby odebrać przesyłkę, kurier zostawi ją dla ciebie w skrzynce paczkowej.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0">
                    <img src="{{ asset('images/tempo/kurier-z-paczka.jpg') }}" alt="Kurier odbierający paczkę" width="930" height="690"/>
                </div>
            </div>

            <div class="row mt-0 mt-xl-5 pt-5">
                <div class="col-12 col-xl-5 d-flex align-items-center">
                    <div class="pe-0 pe-xl-5">
                        <h2>#żyj<span style="color: #e03e2d;">Komfortowo</span></h2>
                        <p>Wszystkie kondygnacje budynku będą obsługiwane przez dwie, bliźniacze windy, które zostały zaprojektowane z myślą o komforcie i sprawnej komunikacji mieszkańców. Dzięki temu niezależnie od tego, czy mieszkasz na ostatnim piętrze, czy wybierasz się do garażu podziemnego, dotrzesz tam szybko i bez zbędnego oczekiwania. Dwie windy znacząco zwiększą komfort codziennego życia.</p>
                        <a href="#" class="bttn bttn-icon mt-3 mt-xl-5 bttn-tempo">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-7 mt-4 mt-lx-0">
                    <img src="{{ asset('uploads/files/tempo/osiedle-tempo-korytarz-windy.jpg') }}" alt="Nowoczesne, bliźniacze windy" width="930" height="690"/>
                </div>
            </div>

            <div class="row mt-5 pt-5 pb-5">
                <div class="col-12 text-center">
                    <h2>#wTrosce<span style="color: #e03e2d;">oŚrodowisko</span></h2>
                </div>
                <div class="col-12 col-xl-4">
                    <img src="{{ asset('images/tempo/nie-marnuj-wody.jpg') }}" alt="Zarówka, zielona trawa, eko" width="520" height="420" class="m-auto"/>
                    <div class="p-0 p-sm-4">
                        <h3>#nieMarnuj<span style="color: #e03e2d;">Wody</span></h3>
                        <p class="text-justify">Proekologiczne osiedle to nie tylko tereny zielone ale także odpowiednie gospodarowanie wodą opadową. Dwa zbiorniki retencyjne zbiorą nadmiar wody po opadach deszczu, by wykorzystać ją później do podlewania roślinności na osiedlu.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <img src="{{ asset('images/tempo/badz-eko.jpg') }}" alt="Zarówka, zielona trawa, eko" width="520" height="420" class="m-auto"/>
                    <div class="p-0 p-sm-4">
                        <h3>#bądź<span style="color: #e03e2d;">Eko</span></h3>
                        <p class="text-justify">Z myślą o ekologii i zdrowym trybie życia  zaprojektowaliśmy ogromne rowerownie z bezpośrednim wyjazdem na ścieżkę rowerową, wzdłuż ul. Sikorskiego. Możesz więc w wygodny sposób korzystać z wielokilometrowych ścieżek w mieście i na terenie województwa.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <img src="{{ asset('images/tempo/niskie-rachunki-za-prad.jpg') }}" alt="Zarówka, zielona trawa, eko" width="520" height="420" class="m-auto"/>
                    <div class="p-0 p-sm-4">
                        <h3>#<span style="color: #e03e2d;">niższe</span>Rachunki</h3>
                        <p class="text-justify">Zastosowanie paneli fotowoltaicznych oraz oświetlenia LED na klatkach schodowych, pozwala na mniejsze zużycie prądu oraz niższe opłaty za energię.</p>
                    </div>
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
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
@endpush
