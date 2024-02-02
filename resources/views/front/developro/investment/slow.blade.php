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
                        <p>&nbsp;</p>
                        <p>Skorzystaj z <b>wiat grillowych</b> lub <b>miejsc na ognisko</b> z miejscami do siedzenia. Odpocznij na hamakach wśród drzew oraz odpręż się <b>ćwicząc jogę</b>. Teren dookoła osiedla zachęca do spacerów oraz jazdy na rowerze.</p>
                        <p>&nbsp;</p>
                        <p>Do twojej dyspozycji jest <b>boisko wielofunkcyjne</b> do gry w piłkę nożną, koszykówkę, tenisa, a dla dzieci <b>place zabaw</b>.</p>
                        <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/zyj-w-rytmie-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>
            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Ekologiczne</span> <span class="rostemary">rozwiązania</span></h2>
                        <p>Osiedle SLOW to aż 2,14 ha powierzchni terenów zielonych. Zostało zaprojektowane z myślą o środowisku, niskich kosztach eksploatacyjnych i oszczędności przyszłych mieszkańców. Zainstalowane zostaną kolektory słoneczne do ogrzewania ciepłej wody użytkowej. Ich zastosowanie znacząco wpłynie na zmniejszenie kwoty miesięcznych rachunków oraz pozytywnie wpłynie na środowisko.
                        <p>&nbsp;</p>
                        <p>W zależności od piętra mieszkania posiadają balkon, loggie lub ogródek.</p>
                        <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/ekologiczne-rozwiazania.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">life</span></h2>
                        <p>Czym jest slow life? To życie w równowadze z otaczającym światem, przyrodą, a przede wszystkim życie w spokoju z samym sobą. To dbanie o siebie, o innych, o środowisko.</p>
                        <p>&nbsp;</p>
                        <p>Slow life to filozofia życia. To realizacja swoich pasji, spotkania z rodziną i przyjaciółmi, wsłuchiwanie się w odgłosy otaczającej natury. Ciesz się życiem, znajdź czas na aktywność i na odpoczynek.</p>
                        <p>&nbsp;</p>
                        <p>Najważniejsze, abyś był szczęśliwy</p>
                        <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-life.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Zobacz jak <br>wygląda życie w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        <p>Osiedle SLOW to miejsce dla osób które w myśl filozofii slow life, chcą mieszkać na cichym, kameralnym osiedlu, blisko przyrody i terenów rekreacyjnych.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <iframe title="YouTube video player" src="https://www.youtube.com/embed/5OleowHAz7k?si=r9R-kaftgCff8ZXu" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                </div>
            </div>
        </div>

        <section class="mt-5 pt-5 mb-5 pb-5">
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
                        <div class="slow-carousel-item"></div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI SPACEROWE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item"></div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI SPACEROWE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item"></div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI SPACEROWE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item"></div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI SPACEROWE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item"></div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI SPACEROWE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item"></div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI SPACEROWE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item"></div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI SPACEROWE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item"></div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI SPACEROWE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item"></div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI SPACEROWE</h3>
                    </li>
                    <li>
                        <div class="slow-carousel-item"></div>
                        <h3 class="mb-0 text-center">ŚCIEŻKI SPACEROWE</h3>
                    </li>
                </ul>
            </div>
        </section>

        <section class="mt-5 pt-5 mb-5 pb-5">
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
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Spotkania w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        <p>Wiemy jak istotne jest budowanie relacji z drugim człowiekiem. Wspólnie spędzony czas z rodziną i przyjaciółmi poprawia samopoczucie i wprawia w pozytywny nastrój.</p>
                        <p>&nbsp;</p>
                        <p>W przygotowanych strefach spotkań, zadbaliśmy o miejsce na ognisko oraz wiaty grillowe. Mile spędzisz czas na towarzyskich rozmowach, słuchając śpiewu ptaków i odgłosów natury.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/spotkania-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>
            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">relaks</span></h2>
                        <p>Zanurz się w kojących odgłosach natury. Odnajdź swoją prywatną przestrzeń w specjalnie dla Ciebie przygotowanych strefach relaksu.
                        <p>&nbsp;</p>
                        <p>Lubisz czytać? Idealnym miejscem będzie strefa z hamakami, gdzie wygodnie położysz się ze swoją ulubioną książką.
                        <p>&nbsp;</p>
                        <p>Relaksuje Cię joga, lubisz medytować? Skorzystaj z przygotowanej przestrzeni do ćwiczeń, na której wygodnie rozłożysz matę i wśród szumu drzew, oddasz się treningowi dla ciała i umysłu.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-relaks.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">sport</span></h2>
                        <p>Zwierzęta domowe także znajdą na osiedlu swoje radosne miejsce. Specjalnie dla psów powstanie tor agility.</p>
                        <p>&nbsp;</p>
                        <p>Ta psia dyscyplina sportu, wpływa pozytywnie na zwinność zwierząt oraz rozwija ich koncentrację. Stwórz zgrany zespół ze swoim pupilem i razem pokonujcie przygotowane przeszkody.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-sport.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">nature</span></h2>
                        <p>Quisque viverra, nisi non viverra pulvinar, velit nulla tempor turpis, egestas pretium lacus lorem quis ante. Nunc mollis quis nisl eget convallis. Maecenas a odio hendrerit, egestas nisl ac, fermentum purus. Proin eleifend fermentum velit vel scelerisque. Nullam lacinia laoreet viverra. Duis at rhoncus purus, ac bibendum odio. Nullam sodales gravida diam.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-nature.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Aktywność <br>w rytmie</span><span class="abuget brown">Slow</span></h2>
                        <p>Skorzystaj z sieci chodników oplatających całe osiedle, by w cieniu drzew: pospacerować, pobiegać, lub pojeździć na rowerze.</p>
                        <p>&nbsp;</p>
                        <p>Wybierz się na romantyczny spacer wzdłuż brzegu jeziora, wsłuchując się w odgłosy natury.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/aktywnosc-w-rytmie-slow.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Zabawa w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        <p>Osiedle Slow to idealne miejsce dla rodzin z dziećmi.</p>
                        <p>&nbsp;</p>
                        <p>Dla najmłodszych przygotowaliśmy specjalne place zabaw oraz miejsca z grami edukacyjnymi i zręcznościowymi.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/zabawa-w-rytmie-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>
        </div>

        <section class="mt-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="slow-header justify-content-center"><span class="rostemary">W</span> <span class="abuget brown">trosce</span> <span class="rostemary">o środowisko</span></h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5 pb-5">
            <div id="slowEcoCarousel">
                <ul class="mb-0 list-unstyled">
                    <li>
                        <div class="slow-ecocarousel-item">
                            <img src="https://placehold.co/600x400" alt="">
                            <div class="slow-ecocarousel-desc">
                                <h3>Kolektory słoneczne</h3>
                                <p>W trosce o środowisko zastosowaliśmy kolektory słoneczne do podgrzewania ciepłej wody użytkowej.</p>
                                <p>&nbsp;</p>
                                <p>Jest to rozwiązanie całkowicie przyjazne dla środowiska. Umożliwia wykorzystanie zasobów energii odnawialnej, nie emitując przy tym hałasu.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <img src="https://placehold.co/600x400" alt="">
                            <div class="slow-ecocarousel-desc">
                                <h3>Kolektory słoneczne</h3>
                                <p>W trosce o środowisko zastosowaliśmy kolektory słoneczne do podgrzewania ciepłej wody użytkowej.</p>
                                <p>&nbsp;</p>
                                <p>Jest to rozwiązanie całkowicie przyjazne dla środowiska. Umożliwia wykorzystanie zasobów energii odnawialnej, nie emitując przy tym hałasu.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <img src="https://placehold.co/600x400" alt="">
                            <div class="slow-ecocarousel-desc">
                                <h3>Kolektory słoneczne</h3>
                                <p>W trosce o środowisko zastosowaliśmy kolektory słoneczne do podgrzewania ciepłej wody użytkowej.</p>
                                <p>&nbsp;</p>
                                <p>Jest to rozwiązanie całkowicie przyjazne dla środowiska. Umożliwia wykorzystanie zasobów energii odnawialnej, nie emitując przy tym hałasu.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <img src="https://placehold.co/600x400" alt="">
                            <div class="slow-ecocarousel-desc">
                                <h3>Kolektory słoneczne</h3>
                                <p>W trosce o środowisko zastosowaliśmy kolektory słoneczne do podgrzewania ciepłej wody użytkowej.</p>
                                <p>&nbsp;</p>
                                <p>Jest to rozwiązanie całkowicie przyjazne dla środowiska. Umożliwia wykorzystanie zasobów energii odnawialnej, nie emitując przy tym hałasu.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <img src="https://placehold.co/600x400" alt="">
                            <div class="slow-ecocarousel-desc">
                                <h3>Kolektory słoneczne</h3>
                                <p>W trosce o środowisko zastosowaliśmy kolektory słoneczne do podgrzewania ciepłej wody użytkowej.</p>
                                <p>&nbsp;</p>
                                <p>Jest to rozwiązanie całkowicie przyjazne dla środowiska. Umożliwia wykorzystanie zasobów energii odnawialnej, nie emitując przy tym hałasu.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <img src="https://placehold.co/600x400" alt="">
                            <div class="slow-ecocarousel-desc">
                                <h3>Kolektory słoneczne</h3>
                                <p>W trosce o środowisko zastosowaliśmy kolektory słoneczne do podgrzewania ciepłej wody użytkowej.</p>
                                <p>&nbsp;</p>
                                <p>Jest to rozwiązanie całkowicie przyjazne dla środowiska. Umożliwia wykorzystanie zasobów energii odnawialnej, nie emitując przy tym hałasu.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <img src="https://placehold.co/600x400" alt="">
                            <div class="slow-ecocarousel-desc">
                                <h3>Kolektory słoneczne</h3>
                                <p>W trosce o środowisko zastosowaliśmy kolektory słoneczne do podgrzewania ciepłej wody użytkowej.</p>
                                <p>&nbsp;</p>
                                <p>Jest to rozwiązanie całkowicie przyjazne dla środowiska. Umożliwia wykorzystanie zasobów energii odnawialnej, nie emitując przy tym hałasu.</p>
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
                                <div class="col-8">
                                    <img src="https://placehold.co/1920x960" alt="">
                                </div>
                                <div class="col-4">
                                    <div class="slowLast-desc d-flex align-items-center">
                                        <div class="pe-5 ps-5">
                                            <h3>LEPSZE ZDROWIE</h3>
                                            <p>Zwalniając, łatwiej poradzić sobie z lękiem i stresem, które towarzyszą codziennym obowiązkom.</p>
                                            <p>&nbsp;</p>
                                            <p>Jeszcze więcej korzyści przynosi świadome jedzenie oraz ruch.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container-fluid p-0">
                            <div class="row no-gutters">
                                <div class="col-8">
                                    <img src="https://placehold.co/1920x960" alt="">
                                </div>
                                <div class="col-4">
                                    <div class="slowLast-desc d-flex align-items-center">
                                        <div class="pe-5 ps-5">
                                            <h3>LEPSZE ZDROWIE</h3>
                                            <p>Zwalniając, łatwiej poradzić sobie z lękiem i stresem, które towarzyszą codziennym obowiązkom.</p>
                                            <p>&nbsp;</p>
                                            <p>Jeszcze więcej korzyści przynosi świadome jedzenie oraz ruch.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container-fluid p-0">
                            <div class="row no-gutters">
                                <div class="col-8">
                                    <img src="https://placehold.co/1920x960" alt="">
                                </div>
                                <div class="col-4">
                                    <div class="slowLast-desc d-flex align-items-center">
                                        <div class="pe-5 ps-5">
                                            <h3>LEPSZE ZDROWIE</h3>
                                            <p>Zwalniając, łatwiej poradzić sobie z lękiem i stresem, które towarzyszą codziennym obowiązkom.</p>
                                            <p>&nbsp;</p>
                                            <p>Jeszcze więcej korzyści przynosi świadome jedzenie oraz ruch.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container-fluid p-0">
                            <div class="row no-gutters">
                                <div class="col-8">
                                    <img src="https://placehold.co/1920x960" alt="">
                                </div>
                                <div class="col-4">
                                    <div class="slowLast-desc d-flex align-items-center">
                                        <div class="pe-5 ps-5">
                                            <h3>LEPSZE ZDROWIE</h3>
                                            <p>Zwalniając, łatwiej poradzić sobie z lękiem i stresem, które towarzyszą codziennym obowiązkom.</p>
                                            <p>&nbsp;</p>
                                            <p>Jeszcze więcej korzyści przynosi świadome jedzenie oraz ruch.</p>
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
        $(document).ready(function(){
            $('#slowCarousel ul').slick({
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '0',
                arrows: false,
                dots: false
            });

            $('#slowEcoCarousel ul').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '290px',
                arrows: false,
                dots: true
            });

            $('#slowLastCarousel ul').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: false,
                centerPadding: '0',
                arrows: true,
                dots: false
            });
        });
    </script>
@endpush
