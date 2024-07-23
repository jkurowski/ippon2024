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
                        @if($current_locale == 'pl')
                            <h2 class="slow-header justify-content-start"><span class="rostemary">Żyj w rytmie</span> <span class="abuget brown">Slow</span></h2>
                            <p>Osiedle Slow powstało z myślą o tych, którzy cenią sobie spokój, <b>ekologiczne rozwiązania</b> oraz <b>aktywny wypoczynek</b>. Zadbaj o Siebie i spędzaj czas z bliskimi i rodziną w przygotowanych strefach „Slow Relaks”.</p>
                            <p>Skorzystaj z <b>wiat grillowych</b> lub <b>miejsc na ognisko</b> z miejscami do siedzenia. Odpocznij na hamakach wśród drzew oraz odpręż się <b>ćwicząc jogę</b>. Teren dookoła osiedla zachęca do spacerów oraz jazdy na rowerze.</p>
                            <p>Do twojej dyspozycji jest <b>boisko wielofunkcyjne</b> do gry w piłkę nożną, koszykówkę, tenisa, a dla dzieci <b>place zabaw</b>.</p>
                            <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4 bttn-slow">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                        @else
                            <h2 class="slow-header justify-content-start"><span class="rostemary">Live in rhythm of</span> <span class="abuget brown">Slow</span></h2>
                            <p>Slow Estate was created for those who value tranquility, ecological solutions, and active relaxation.</p>
                            <p>Take care of yourself and spend time with loved ones and family in the prepared 'Slow Relax' zones. Enjoy the grill shelters or fire pits with seating areas. Relax on hammocks among the trees and unwind by practicing yoga. The area around the estate encourages walks and bike rides.</p>
                            <p>You have at your disposal a multifunctional sports field for playing football, basketball, tennis, and playgrounds for children.</p>
                            <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4 bttn-slow">CHECK APARTMENTS <i class="ms-3 las la-chevron-circle-right"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/osiedle-slow/zyj-w-rytmie-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>
            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    @if($current_locale == 'pl')
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Ekologiczne</span> <span class="rostemary">rozwiązania</span></h2>
                        <p>Osiedle SLOW to <b>aż 2,14 ha powierzchni terenów zielonych</b>. Zostało zaprojektowane z myślą o środowisku, niskich kosztach eksploatacyjnych i <b>oszczędności</b> przyszłych mieszkańców. Zainstalowane zostaną <b>kolektory słoneczne</b> do ogrzewania ciepłej wody użytkowej. Ich zastosowanie znacząco wpłynie na zmniejszenie kwoty miesięcznych rachunków oraz pozytywnie wpłynie na środowisko.
                        <p>W zależności od piętra mieszkania posiadają balkon, loggie lub ogródek.</p>
                        <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4 bttn-slow">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                    @else
                    <div class="left-right-text">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Ecological</span> <span class="rostemary">solutions</span></h2>
                        <p>SLOW estate covers an area of 2.14 hectares of green spaces. It has been designed with the environment, low operating costs, and future residents' savings in mind. Solar collectors will be installed for heating domestic hot water. Their use will significantly reduce the monthly bills and have a positive impact on the environment.
                        <p>Depending on the floor, apartments have balconies, loggias, or gardens.</p>
                        <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4 bttn-slow">CHECK APARTMENTS <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/ekologiczne-rozwiazania.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    @if($current_locale == 'pl')
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Dodatkowe metry</span> <span class="abuget brown">gratis</span></h2>
                        <p>Każde mieszkanie osiedla Slow zostało indywidualnie zaprojektowane przez architektów wnętrz, dzięki temu uzyskaliśmy ich wyjątkową funkcjonalność i ergonomię. Odkryj komfortowe mieszkania z poddaszem na drugim piętrze. Zyskaj dodatkową przestrzeń i <b>powiększ swoje mieszkanie nawet o 26 m<sup>2</sup></b>.</p>
                        <p>&nbsp;</p>
                        <p>Zamieszkaj w 2-poziomowym mieszkaniu o metrażu nawet do <b>80 m<sup>2</sup></b>.</p>
                        <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4 bttn-slow">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                    @else
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Extra Square Meters</span> <span class="abuget brown">for free</span></h2>
                        <p>Every apartment in the Slow estate has been individually designed by interior architects, which has resulted in their exceptional functionality and ergonomics. Discover comfortable apartments with attics on the second floor. Gain extra space and enlarge your apartment by up to 26 m<sup>2</sup></b>.</p>
                        <p>&nbsp;</p>
                        <p>Live in a two-level apartment with an area of up to 80 m<sup>2</sup></b>.</p>
                        <a href="{{ route('developro.investment.page', [$investment->slug, 'mieszkania']) }}" class="bttn bttn-icon mt-4 bttn-slow">CHECK APARTMENTS <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/dodatkowe-metry.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    @if($current_locale == 'pl')
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Zobacz jak <br>wygląda życie w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        <p>Osiedle SLOW to miejsce dla osób które w myśl filozofii slow life, chcą mieszkać na cichym, kameralnym osiedlu, blisko przyrody i terenów rekreacyjnych.</p>
                    </div>
                    @else
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">See how <br>looks life in rhythm of</span> <span class="abuget brown">Slow</span></h2>
                        <p>SLOW estate is a place for people who, following the slow life philosophy, want to live in a quiet, intimate neighborhood, close to nature and recreational areas</p>
                    </div>
                    @endif
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
                        @if($current_locale == 'pl')
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Mieszkaj w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        @else
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Live in rhythm of</span> <span class="abuget brown">Slow</span></h2>
                        @endif
                    </div>
                </div>
            </div>
            <div id="slowCarousel" class="mt-5">
                <ul class="mb-0 list-unstyled">
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/boisko-wielofunkcyjne.png') }}" alt="">
                        </div>
                        @if($current_locale == 'pl')
                        <h3 class="mb-0 text-center">BOISKO WIELOFUNKCYJNE</h3>
                        @else
                        <h3 class="mb-0 text-center">MULTIFUNCTIONAL PLAY COURT</h3>
                        @endif
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/kolektory-sloneczne.png') }}" alt="">
                        </div>
                        @if($current_locale == 'pl')
                        <h3 class="mb-0 text-center">KOLEKTORY SŁONECZNE</h3>
                        @else
                        <h3 class="mb-0 text-center">SOLAR COLLECTORS</h3>
                        @endif
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/place-zabaw.png') }}" alt="">
                        </div>
                        @if($current_locale == 'pl')
                        <h3 class="mb-0 text-center">PLACE ZABAW</h3>
                        @else
                        <h3 class="mb-0 text-center">PLAYGROUND</h3>
                        @endif
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/sciezki-lesne.png') }}" alt="">
                        </div>
                        @if($current_locale == 'pl')
                        <h3 class="mb-0 text-center">ŚCIEŻKI LEŚNE</h3>
                        @else
                        <h3 class="mb-0 text-center">FOREST TRAILS</h3>
                        @endif
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/strefa-do-jogi.png') }}" alt="">
                        </div>
                        @if($current_locale == 'pl')
                        <h3 class="mb-0 text-center">STREFA DO JOGI</h3>
                        @else
                        <h3 class="mb-0 text-center">YOGA ZONE</h3>
                        @endif
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/strefa-z-hamakami.png') }}" alt="">
                        </div>
                        @if($current_locale == 'pl')
                        <h3 class="mb-0 text-center">STREFA Z HAMAKAMI</h3>
                        @else
                        <h3 class="mb-0 text-center">HAMMOCKS SPACE</h3>
                        @endif
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/tor-agility.png') }}" alt="">
                        </div>
                        @if($current_locale == 'pl')
                        <h3 class="mb-0 text-center">TOR AGILITY</h3>
                        @else
                        <h3 class="mb-0 text-center">AGILITY SPACE</h3>
                        @endif
                    </li>
                    <li>
                        <div class="slow-carousel-item">
                            <img src="{{ asset('/uploads/files/osiedle-slow/piktogramy/wiaty-grillowe.png') }}" alt="">
                        </div>
                        @if($current_locale == 'pl')
                        <h3 class="mb-0 text-center">WIATY GRILLOWE</h3>
                        @else
                        <h3 class="mb-0 text-center">BARBECUE SCHEDS</h3>
                        @endif
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
                    @if($current_locale == 'pl')
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Spotkania w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        <p>Wiemy jak istotne jest <b>budowanie relacji z drugim człowiekiem</b>. Wspólnie spędzony czas z rodziną i przyjaciółmi poprawia samopoczucie i wprawia w pozytywny nastrój.</p>
                        <p>W przygotowanych <b>Strefach spotkań</b>, zadbaliśmy o miejsce na <b>ognisko</b> oraz <b>wiaty grillowe</b>. Mile spędzisz czas na towarzyskich rozmowach, słuchając śpiewu ptaków i odgłosów natury.</p>
                    </div>
                    @else
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Meetings in the rhythm of</span> <span class="abuget brown">Slow</span></h2>
                        <p>We understand the importance of Community by building relationships with others. Spending time together with family and friends improves well-being and puts us in a positive mood.</p>
                        <p>In the prepared meeting areas, we’ve taken care to provide space for bonfires and barbecue sheds. You’ll enjoy pleasant momentsof socializing, listening to the birdsong and the sounds of nature.</p>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/spotkania-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>
            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    @if($current_locale == 'pl')
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">relaks</span></h2>
                        <p>Zanurz się w kojących odgłosach natury. Odnajdź swoją prywatną przestrzeń w specjalnie dla Ciebie przygotowanych <b>Strefach relaksu</b>.
                        <p>Lubisz czytać? Idealnym miejscem będzie <b>strefa z hamakami</b>, gdzie wygodnie położysz się ze swoją ulubioną książką.
                        <p>Relaksuje Cię joga, lubisz medytować? Skorzystaj z przygotowanej <b>przestrzeni do ćwiczeń</b>, na której wygodnie rozłożysz matę i wśród szumu drzew, oddasz się treningowi dla ciała i umysłu.</p>
                    </div>
                    @else
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">relax</span></h2>
                        <p>Immerse yourself in the soothing sounds of nature. Find your private space in relaxation zones, specially prepared for you.</p>
                        <p>Do you enjoy reading? The hammock area will be the perfect spot, where you can comfortably lie down with your favourite book.</p>
                        <p>Does yoga relax you? Do you enjoy meditating? Use the dedicated exercise area, where you can lay out your mat comfortably among the rustling trees and engage in body and mind training.</p>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-relaks.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    @if($current_locale == 'pl')
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">sport</span></h2>
                        <p>Regularne uprawianie sportu, poprawia kondycję, samopoczucie oraz wpływa na dobry stan zdrowia.</p>
                        <p>Mieszkańcy osiedla skorzystają z <b>boiska wielofunkcyjnego</b>, gdzie na utwardzonej powierzchni będą mogli grać w piłkę nożną, tenisa czy koszykówkę.</p>
                    </div>
                    @else
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">sport</span></h2>
                        <p>Regular sports activities improve fitness, well-being, and contribute to good health.</p>
                        <p>Residents of the Slow Estate will benefit from a multifunctional sports field, where they can play soccer or basketball on a solid surface.</p>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-sport.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    @if($current_locale == 'pl')
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">nature</span></h2>
                        <p>Zwierzęta domowe także znajdą na osiedlu swoje radosne miejsce. Specjalnie dla psów powstanie <b>tor agility</b>.</p>
                        <p>Ta psia dyscyplina sportu, wpływa pozytywnie na zwinność zwierząt oraz rozwija ich koncentrację. Stwórz zgrany zespół ze swoim pupilem i razem pokonujcie przygotowane przeszkody.</p>
                    </div>
                    @else
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="abuget brown">Slow</span> <span class="rostemary">nature</span></h2>
                        <p>Pet animals will also find a joyful place in the neighborhood. A dedicated agility course will be created for dogs.</p>
                        <p>This canine sport discipline positively influences the agility of animals and develops their concentration. Create a harmonious team with your furry friend and together overcome the prepared obstacles.</p>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/slow-nature.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    @if($current_locale == 'pl')
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Aktywność <br>w rytmie</span><span class="abuget brown">Slow</span></h2>
                        <p>Korzystaj z ponad <b>5 kilometrów naturalnych</b>, utwardzonych ścieżek spacerowych, by w cieniu drzew: pospacerować, pobiegać, lub jeździć na rowerze.</p>
                        <p>Wybierz się na romantyczny spacer wzdłuż brzegu jeziora, wsłuchując się w odgłosy natury.</p>
                    </div>
                    @else
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Activities <br>with</span><span class="abuget brown">Slow</span></h2>
                        <p>Take advantage od the sidewalks network that encircle the entire neighborhood to walk, jog or bike in the shade of trees.</p>
                        <p>Embark on a romantic stroll along the lakeside, listening to the sounds of nature.</p>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/osiedle-slow/aktywnosc-w-rytmie-slow.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="760">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    @if($current_locale == 'pl')
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Zabawa w rytmie</span> <span class="abuget brown">Slow</span></h2>
                        <p>Osiedle Slow to idealne <b>miejsce dla rodzin z dziećmi</b>. Ilość terenów zielonych i roślinności sprzyja odpoczynkowi, a ścieżki dookoła osiedla zachęcają do spacerów lub jazdy na rowerze. Dla najmłodszych przygotowaliśmy duże i bezpieczne <b>place zabaw</b>.</p>
                    </div>
                    @else
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        <h2 class="slow-header justify-content-start"><span class="rostemary">Fun in the rhythm of</span> <span class="abuget brown">Slow</span></h2>
                        <p>Slow Estate is the perfect place for families with children. For the youngest ones, we’ve prepared special playgrounds and areas with educational and skill-based games.</p>
                    </div>
                    @endif
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
                        @if($current_locale == 'pl')
                        <h2 class="slow-header justify-content-center"><span class="rostemary">W</span> <span class="abuget brown">trosce</span> <span class="rostemary">o środowisko</span></h2>
                        @else
                        <h2 class="slow-header justify-content-center"><span class="rostemary">In</span> <span class="abuget brown">care for</span> <span class="rostemary">the environment</span></h2>
                        @endif
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
                            @if($current_locale == 'pl')
                            <div class="slow-ecocarousel-desc">
                                <h3>KOLEKTORY SŁONECZNE</h3>
                                <p>W trosce o środowisko zastosowaliśmy kolektory słoneczne do podgrzewania ciepłej wody użytkowej. Jest to rozwiązanie całkowicie przyjazne dla środowiska. Umożliwia wykorzystanie zasobów energii odnawialnej, nie emitując przy tym hałasu.</p>
                            </div>
                            @else
                            <div class="slow-ecocarousel-desc">
                                <h3>SOLAR COLLECTORS</h3>
                                <p>In our commitment to the environment, we’ve implemented solar collectors for heating domestic hot water. This is a completely eco-friendly solution that allows us to harness renewable energy resources without emitting any noise.</p>
                            </div>
                            @endif
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <div class="img-overflow">
                            <img src="{{ asset('/uploads/files/osiedle-slow/srodowisko/teren-zielony.jpg') }}" alt="" width="630" height="420">
                            </div>
                            @if($current_locale == 'pl')
                            <div class="slow-ecocarousel-desc">
                                <h3>TEREN ZIELONY</h3>
                                <p>Osiedle Slow to 2,14 ha powierzchni terenów zielonych. Przebywanie w lesie wzmacnia naszą odporność i pozytywnie wpływa na samopoczucie. W lesie głębiej oddychamy, obniża się poziom kortyzolu - hormonu stresu. Przebywanie w przyrodzie koi nerwy i oczyszcza umysł.</p>
                            </div>
                            @else
                            <div class="slow-ecocarousel-desc">
                                <h3>GREEN AREAS</h3>
                                <p>Slow Estate boasts 2.14 hectares of green space. Spending time in the forest strengthens our immune system and has a positive impact on our well-being. In the forest, we breathe more deeply, reducing the levels of cortisol, the stress hormone. Being in nature soothes the nerves and clears the mind.</p>
                            </div>
                            @endif
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <div class="img-overflow">
                            <img src="{{ asset('/uploads/files/osiedle-slow/srodowisko/ekotransport.jpg') }}" alt="" width="630" height="420">
                            </div>
                            @if($current_locale == 'pl')
                            <div class="slow-ecocarousel-desc">
                                <h3>EKOTRANSPORT</h3>
                                <p>Korzystanie z ekologicznych środków transportu, pozytywnie wpływa na stan zdrowia i kondycję, ale także na otaczające nas środowisko. Na terenie osiedla znajdują się stojaki na rowery, oraz sieć chodników po których z łatwością można się przemieszczać, ciesząc oko widokiem terenów zielonych.</p>
                            </div>
                            @else
                            <div class="slow-ecocarousel-desc">
                                <h3>ECO-TRANSPORT</h3>
                                <p>Using eco-friendly means of transportation has a positive impact on our health and fitness, as well as on the environment around us. Within the neighborhood, there are bike racks and a network of sidewalks that make it easy to move around while enjoying the green surroundings.</p>
                            </div>
                            @endif
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <div class="img-overflow">
                            <img src="{{ asset('/uploads/files/osiedle-slow/srodowisko/oswietlenie.jpg') }}" alt="" width="630" height="420">
                            </div>
                            @if($current_locale == 'pl')
                            <div class="slow-ecocarousel-desc">
                                <h3>OŚWIETLENIE</h3>
                                <p>Zastosowanie oświetlenia LED oraz czujników ruchu na klatkach schodowych, pozwala na mniejsze zużycie prądu oraz niższe opłaty za energię.</p>
                            </div>
                            @else
                            <div class="slow-ecocarousel-desc">
                                <h3>LIGHTING</h3>
                                <p>The use of LED lighting and motion sensors in stairwells allows for reduced electricity consumption and lower energy bills.</p>
                            </div>
                            @endif
                        </div>
                    </li>
                    <li>
                        <div class="slow-ecocarousel-item">
                            <div class="img-overflow">
                            <img src="{{ asset('/uploads/files/osiedle-slow/srodowisko/domki-dla-zwierzat.jpg') }}" alt="" width="630" height="420">
                            </div>
                            @if($current_locale == 'pl')
                            <div class="slow-ecocarousel-desc">
                                <h3>DOMKI DLA ZWIERZĄT</h3>
                                <p>Slow life to życie w harmonii z otaczającą nas przyrodą. Dla leśnych zwierząt powstaną domki na drzewach, które dadzą im schronienie w okresie zimowym.</p>
                            </div>
                            @else
                            <div class="slow-ecocarousel-desc">
                                <h3>ANIMAL SHELTERS</h3>
                                <p>Slow life is living in harmony with the nature that surrounds us. Treehouses will be built for forest animals, providing them with shelter during the winter months.</p>
                            </div>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="mt-0 pt-0 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if($current_locale == 'pl')
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Życie w rytmie</span> <span class="abuget brown">Slow</span> <span class="rostemary">to</span></h2>
                        @else
                        <h2 class="slow-header justify-content-center"><span class="rostemary">Life in the rhythm of</span> <span class="abuget brown">Slow</span> <span class="rostemary">gives you</span></h2>
                        @endif
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
                                        @if($current_locale == 'pl')
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>WIĘCEJ SZCZĘŚCIA</h3>
                                            <p>Uważne i świadome życie, sprawia że docenia się małe rzeczy występujące w ciągu całego dnia i dostrzega się ich ogromną wartość.</p>
                                        </div>
                                        @else
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>MORE HAPPINESS</h3>
                                            <p>Living mindfully and consciously allows one to appreciate the small things that occur throughout the day and recognize their immense value.</p>
                                        </div>
                                        @endif
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
                                        @if($current_locale == 'pl')
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>LEPSZE ZDROWIE</h3>
                                            <p>Zwalniając, łatwiej poradzić sobie z lękiem i stresem, które towarzyszą codziennym obowiązkom. Jeszcze więcej korzyści przynosi świadome jedzenie oraz ruch.</p>
                                        </div>
                                        @else
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>BETTER HEALTH</h3>
                                            <p>Slowing down makes it easier to deal with the anxiety and stress that accompany daily responsibilities. Even more benefits come from mindful eating and physical activity.</p>
                                        </div>
                                        @endif
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
                                        @if($current_locale == 'pl')
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>LEPSZY SEN</h3>
                                            <p>Spokojny sen to czas na regenerację organizmu i walkę z wszelkiego rodzaju chorobami. Zwalniając tempo podaje się organizmowi pomocną dłoń podczas regeneracji i przyspiesza ładowanie baterii.</p>
                                        </div>
                                        @else
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>BETTER SLEEPING</h3>
                                            <p>A peaceful sleep is a time for the body's regeneration and a defense against various illnesses. Slowing down the pace extends a helping hand to the body during its recovery and accelerates the recharge during this recharge period.</p>
                                        </div>
                                        @endif
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
                                        @if($current_locale == 'pl')
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>SILNIEJSZE RELACJE</h3>
                                            <p>Spędzanie więcej czasu z bliskimi i stawianie relacji ponad pracą lub mediami społecznościowymi wzmacnia prawdziwą komunikację i relacje.</p>
                                        </div>
                                        @else
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>STRONGER RELATIONSHIPS</h3>
                                            <p>Spending more time with loved ones and prioritizing relationships over work or media enhances genuine communication and connections.</p>
                                        </div>
                                        @endif
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
                                        @if($current_locale == 'pl')
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>ZWIĘKSZONA PRODUKTYWNOŚĆ</h3>
                                            <p>Od rezygnacji z wielozadaniowości do skupienia się na sensownej pracy. Work life balance to jedna z ważniejszych kwestii slow life.</p>
                                        </div>
                                        @else
                                        <div class="pe-4 pe-lg-5 ps-4 ps-lg-5 pt-4 pt-lg-0 pb-4 pb-lg-0">
                                            <h3>INCREASED PRODUCTIVITY</h3>
                                            <p>Moving away from multitasking to focusing on a meaningful work. Work-life balance is one of the key aspects of slow life.</p>
                                        </div>
                                        @endif
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
