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
            <div class="row left-right">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Żyj w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        <p>Osiedle Slow powstało z myślą o tych, którzy cenią sobie spokój, <b>ekologiczne rozwiązania</b> oraz <b>aktywny wypoczynek</b>. Zadbaj o Siebie i spędzaj czas z bliskimi i rodziną w przygotowanych strefach „Slow Relaks”.</p>
                        <p>Skorzystaj z <b>wiat grillowych</b> lub <b>miejsc na ognisko</b> z miejscami do siedzenia. Odpocznij na hamakach wśród drzew oraz odpręż się <b>ćwicząc jogę</b>. Teren dookoła osiedla zachęca do spacerów oraz jazdy na rowerze.</p>
                        <p>Do twojej dyspozycji jest <b>boisko wielofunkcyjne</b> do gry w piłkę nożną, koszykówkę, tenisa, a dla dzieci <b>place zabaw</b>.</p>
                        <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4 bttn-slow">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/zyj-w-rytmie-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>
            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Ekologiczne</span> <span class="rostemary">rozwiązania</span></h2>
                        <p>Osiedle SLOW to <b>aż 2,14 ha powierzchni terenów zielonych</b>. Zostało zaprojektowane z myślą o środowisku, niskich kosztach eksploatacyjnych i <b>oszczędności</b> przyszłych mieszkańców. Zainstalowane zostaną <b>kolektory słoneczne</b> do ogrzewania ciepłej wody użytkowej. Ich zastosowanie znacząco wpłynie na zmniejszenie kwoty miesięcznych rachunków oraz pozytywnie wpłynie na środowisko.
                        <p>W zależności od piętra mieszkania posiadają balkon, loggie lub ogródek.</p>
                        <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4 bttn-slow">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/ekologiczne-rozwiazania.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">life</span></h2>
                        <p>Czym jest slow life? To życie w <b>równowadze</b> z otaczającym światem, przyrodą, a przede wszystkim życie w spokoju z samym sobą. <b>To dbanie o siebie, o innych, o środowisko</b>.</p>
                        <p>Slow life to filozofia życia. To realizacja swoich pasji, <b>spotkania</b> z rodziną i przyjaciółmi, wsłuchiwanie się w odgłosy otaczającej <b>natury</b>. Ciesz się życiem, znajdź czas na aktywność i na odpoczynek.</p>
                        <p><b>Najważniejsze, abyś był szczęśliwy</b>.</p>
                        <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4 bttn-slow">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-life.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Zobacz jak <br>wygląda życie w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        <p>Osiedle SLOW to miejsce dla osób które w myśl filozofii slow life, chcą mieszkać na cichym, kameralnym osiedlu, blisko przyrody i terenów rekreacyjnych.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <iframe title="YouTube video player" src="https://www.youtube.com/embed/5OleowHAz7k?si=r9R-kaftgCff8ZXu" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                </div>
            </div>
        </div>

        <section class="mt-0 mt-sm-5 pt-0 pt-sm-5 mb-5 pb-0 pb-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Mieszkaj w rytmie</span> <span class="abuget brown">Slow</span></h2>
                    </div>
                </div>
            </div>
            <div id="slowCarousel" class="mt-5">
                <ul class="mb-0 list-unstyled">
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/boisko-wielofunkcyjne.png') }}" alt="">
                        </div>
                        <h3 class="mb-0 text-center">BOISKO WIELOFUNKCYJNE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/kolektory-sloneczne.png') }}" alt="">
                        </div>
                        <h3 class="mb-0 text-center">KOLEKTORY SŁONECZNE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/place-zabaw.png') }}" alt="">
                        </div>
                        <h3 class="mb-0 text-center">PLACE ZABAW</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/sciezki-lesne.png') }}" alt="">
                        </div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI LEŚNE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/strefa-do-jogi.png') }}" alt="">
                        </div>
                        <h3 class="mb-0 text-center">STREFA DO JOGI</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/strefa-z-hamakami.png') }}" alt="">
                        </div>
                        <h3 class="mb-0 text-center">STREFA Z HAMAKAMI</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/tor-agility.png') }}" alt="">
                        </div>
                        <h3 class="mb-0 text-center">TOR AGILITY</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/wiaty-grillowe.png') }}" alt="">
                        </div>
                        <h3 class="mb-0 text-center">WIATY GRILLOWE</h3>
                    </li>
                </ul>
            </div>
        </section>

        <section class="mt-5 pt-5 mb-5 pb-5 d-none">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Dbaj o</span> <span class="abuget brown">Siebie</span></h2>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row left-right">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Spotkania w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        <p>Wiemy jak istotne jest <b>budowanie relacji z drugim człowiekiem</b>. Wspólnie spędzony czas z rodziną i przyjaciółmi poprawia samopoczucie i wprawia w pozytywny nastrój.</p>
                        <p>W przygotowanych <b>Strefach spotkań</b>, zadbaliśmy o miejsce na <b>ognisko</b> oraz <b>wiaty grillowe</b>. Mile spędzisz czas na towarzyskich rozmowach, słuchając śpiewu ptaków i odgłosów natury.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/spotkania-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>
            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">relaks</span></h2>
                        <p>Zanurz się w kojących odgłosach natury. Odnajdź swoją prywatną przestrzeń w specjalnie dla Ciebie przygotowanych <b>Strefach relaksu</b>.
                        <p>Lubisz czytać? Idealnym miejscem będzie <b>strefa z hamakami</b>, gdzie wygodnie położysz się ze swoją ulubioną książką.
                        <p>Relaksuje Cię joga, lubisz medytować? Skorzystaj z przygotowanej <b>przestrzeni do ćwiczeń</b>, na której wygodnie rozłożysz matę i wśród szumu drzew, oddasz się treningowi dla ciała i umysłu.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-relaks.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">sport</span></h2>
                        <p>Regularne uprawianie sportu, poprawia kondycję, samopoczucie oraz wpływa na dobry stan zdrowia.</p>
                        <p>Mieszkańcy osiedla skorzystają z <b>boiska wielofunkcyjnego</b>, gdzie na utwardzonej powierzchni będą mogli grać w piłkę nożną, tenisa czy koszykówkę.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-sport.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">nature</span></h2>
                        <p>Zwierzęta domowe także znajdą na osiedlu swoje radosne miejsce. Specjalnie dla psów powstanie <b>tor agility</b>.</p>
                        <p>Ta psia dyscyplina sportu, wpływa pozytywnie na zwinność zwierząt oraz rozwija ich koncentrację. Stwórz zgrany zespół ze swoim pupilem i razem pokonujcie przygotowane przeszkody.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-nature.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Aktywność <br>w rytmie</span><span class="abuget brown">Slow</span></h2>
                        <p>Korzystaj z ponad <b>5 kilometrów naturalnych</b>, utwardzonych ścieżek spacerowych, by w cieniu drzew: pospacerować, pobiegać, lub jeździć na rowerze.</p>
                        <p>Wybierz się na romantyczny spacer wzdłuż brzegu jeziora, wsłuchując się w odgłosy natury.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/aktywnosc-w-rytmie-slow.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Zabawa w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        <p>Osiedle Slow to idealne <b>miejsce dla rodzin z dziećmi</b>. Ilość terenów zielonych i roślinności sprzyja odpoczynkowi, a ścieżki dookoła osiedla zachęcają do spacerów lub jazdy na rowerze. Dla najmłodszych przygotowaliśmy duże i bezpieczne <b>place zabaw</b>.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/zabawa-w-rytmie-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>
        </div>

        <section class="mt-0 mt-sm-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="slow-header justify-content-center"><span class="rostemary">W</span> <span class="abuget brown">trosce</span> <span class="rostemary">o środowisko</span></h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5 pb-0 pb-sm-5">
            <div id="slowEcoCarousel">
                <ul class="mb-0 list-unstyled">
                    <li>
                        <div class="slow-ecocarousel-item">
                            <div class="img-overflow">
                                <img src="{{ asset('/uploads/files/osiedle-slow/srodowisko/kolektory-sloneczne.jpg') }}" alt="" width="630" height="420">
                            </div>
                            <div class="slow-ecocarousel-desc">
                                <h3>KOLEKTORY SŁONECZNE</h3>
                                <p>W trosce o środowisko zastosowaliśmy kolektory słoneczne do podgrzewania ciepłej wody użytkowej. Jest to rozwiązanie całkowicie przyjazne dla środowiska. Umożliwia wykorzystanie zasobów energii odnawialnej, nie emitując przy tym hałasu.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <div class="img-overflow">
                            <img src="{{ asset('/uploads/files/osiedle-slow/srodowisko/teren-zielony.jpg') }}" alt="" width="630" height="420">
                            </div>
                            <div class="slow-ecocarousel-desc">
                                <h3>TEREN ZIELONY</h3>
                                <p>Osiedle Slow to 2,14 ha powierzchni terenów zielonych. Przebywanie w lesie wzmacnia naszą odporność i pozytywnie wpływa na samopoczucie. W lesie głębiej oddychamy, obniża się poziom kortyzolu - hormonu stresu. Przebywanie w przyrodzie koi nerwy i oczyszcza umysł.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <div class="img-overflow">
                            <img src="{{ asset('/uploads/files/osiedle-slow/srodowisko/ekotransport.jpg') }}" alt="" width="630" height="420">
                            </div>
                            <div class="slow-ecocarousel-desc">
                                <h3>EKOTRANSPORT</h3>
                                <p>Korzystanie z ekologicznych środków transportu, pozytywnie wpływa na stan zdrowia i kondycję, ale także na otaczające nas środowisko. Na terenie osiedla znajdują się stojaki na rowery, oraz sieć chodników po których z łatwością można się przemieszczać, ciesząc oko widokiem terenów zielonych.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <div class="img-overflow">
                            <img src="{{ asset('/uploads/files/osiedle-slow/srodowisko/oswietlenie.jpg') }}" alt="" width="630" height="420">
                            </div>
                            <div class="slow-ecocarousel-desc">
                                <h3>OŚWIETLENIE</h3>
                                <p>Zastosowanie oświetlenia LED oraz czujników ruchu na klatkach schodowych, pozwala na mniejsze zużycie prądu oraz niższe opłaty za energię.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <div class="img-overflow">
                            <img src="{{ asset('/uploads/files/osiedle-slow/srodowisko/domki-dla-zwierzat.jpg') }}" alt="" width="630" height="420">
                            </div>
                            <div class="slow-ecocarousel-desc">
                                <h3>DOMKI DLA ZWIERZĄT</h3>
                                <p>Slow life to życie w harmonii z otaczającą nas przyrodą. Dla leśnych zwierząt powstaną domki na drzewach, które dadzą im schronienie w okresie zimowym.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="mt-0 pt-0 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Życie w rytmie</span> <span class="abuget brown">Slow</span> <span class="rostemary">to</span></h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-0 pb-0">
            <div id="slowLastCarousel">
                <ul class="mb-0 list-unstyled">
                    <li>
                        <div class="container-fluid p-0">
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-8">
                                    <img src="{{ asset('/uploads/files/osiedle-slow/zycie-slow/wiecej-szczescia.jpg') }}" alt="" width="1280" height="640" class="w-100">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="slowLast-desc d-flex align-items-center">
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>WIĘCEJ SZCZĘŚCIA</h3>
                                            <p>Uważne i świadome życie, sprawia że docenia się małe rzeczy występujące w ciągu całego dnia i dostrzega się ich ogromną wartość.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container-fluid p-0">
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-8">
                                    <img src="{{ asset('/uploads/files/osiedle-slow/zycie-slow/lepsze-zdrowie.jpg') }}" alt="" width="1280" height="640" class="w-100">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="slowLast-desc d-flex align-items-center">
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>LEPSZE ZDROWIE</h3>
                                            <p>Zwalniając, łatwiej poradzić sobie z lękiem i stresem, które towarzyszą codziennym obowiązkom. Jeszcze więcej korzyści przynosi świadome jedzenie oraz ruch.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container-fluid p-0">
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-8">
                                    <img src="{{ asset('/uploads/files/osiedle-slow/zycie-slow/lepszy-sen.jpg') }}" alt="" width="1280" height="640" class="w-100">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="slowLast-desc d-flex align-items-center">
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>LEPSZY SEN</h3>
                                            <p>Spokojny sen to czas na regenerację organizmu i walkę z wszelkiego rodzaju chorobami. Zwalniając tempo podaje się organizmowi pomocną dłoń podczas regeneracji i przyspiesza ładowanie baterii.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container-fluid p-0">
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-8">
                                    <img src="{{ asset('/uploads/files/osiedle-slow/zycie-slow/silniejsze-relacje.jpg') }}" alt="" width="1280" height="640" class="w-100">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="slowLast-desc d-flex align-items-center">
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>SILNIEJSZE RELACJE</h3>
                                            <p>Spędzanie więcej czasu z bliskimi i stawianie relacji ponad pracą lub mediami społecznościowymi wzmacnia prawdziwą komunikację i relacje.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container-fluid p-0">
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-8">
                                    <img src="{{ asset('/uploads/files/osiedle-slow/zycie-slow/zwiekszona-produktywnosc.jpg') }}" alt="" width="1280" height="640" class="w-100">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="slowLast-desc d-flex align-items-center">
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>ZWIĘKSZONA PRODUKTYWNOŚĆ</h3>
                                            <p>Od rezygnacji z wielozadaniowości do skupienia się na sensownej pracy. Work life balance to jedna z ważniejszych kwestii slow life.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        AOS.init({disable: 'mobile'});

        $(document).ready(function(){
            $('#slowCarousel ul').slick({
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '0',
                arrows: false,
                dots: false,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            $('#slowEcoCarousel ul').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '290px',
                arrows: false,
                dots: true,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            centerPadding: '120px',
                            centerMode: false,
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerPadding: '0',
                        }
                    }
                ]
            });

            $('#slowLastCarousel ul').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: false,
                centerPadding: '0',
                arrows: true,
                dots: false,
                autoplay: true,
                autoplaySpeed: 3000
            });
        });
    </script>
@endpush
