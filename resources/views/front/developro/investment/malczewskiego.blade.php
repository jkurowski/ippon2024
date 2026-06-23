@extends('layouts.page', ['body_class' => 'no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', "noindex, nofollow")

@section('content')
    <div id="page-content" class="invest-malczewskiego">

        <div id="hero">
            <div class="hero-apla">
                @if($current_locale == 'pl')
                <h1>PRESTIŻ MIERZY SIĘ SPOKOJEM.</h1>
                <h5>Luksus ciszy, prestiż lokalizacji w kameralnej części Gdańska</h5>
                <a href="#contact" class="bttn bttn-icon mt-5">FORMULARZ KONTAKTOWY <i class="ms-3 las la-chevron-circle-right"></i></a>
                @else
                    <h1>PRESTIGE BEGINS WITH PEACE.</h1>
                    <h5>The luxury of quiet living in a prestigious and intimate part of Gdańsk</h5>
                    <a href="#contact" class="bttn bttn-icon mt-5">CONTACT FORM <i class="ms-3 las la-chevron-circle-right"></i></a>
                @endif
            </div>
            <img src="{{ asset('images/hero-malczewskiego.jpg') }}" alt="" class="w-100">
        </div>

        <nav id="invest-nav">
            <ul>
                @if($current_locale == 'pl')
                <li><a href="#about">Opis inwestycji</a></li>
                <li><a href="#premium">Premium</a></li>
                <li><a href="#location">Lokalizacja</a></li>
                <li><a href="#standard">Standard</a></li>
                <li><a href="#nature">Spójnie z naturą</a></li>
                <li><a href="#contact">Kontakt</a></li>
                @else
                    <li><a href="#about">About</a></li>
                    <li><a href="#premium">Premium</a></li>
                    <li><a href="#location">Location</a></li>
                    <li><a href="#standard">Standard</a></li>
                    <li><a href="#nature">Consistent with nature</a></li>
                    <li><a href="#contact">Contact</a></li>
                @endif
            </ul>
        </nav>


        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('gdansk/wizualizacja-inwestycji-1.jpg') }}" alt="Wizualizacja inwestycji" class="w-100" width="790" height="650">
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="section-text ps-0 ps-lg-5 mt-4 mt-lg-0">
                            @if($current_locale == 'pl')
                            <h3>O inwestycji</h3>
                            <h2>Nowoczesna <br>interpretacja klasyki</h2>
                            <p>Architektura naszego osiedla w subtelny sposób nawiązuje do historycznej tkanki Gdańska. Wyważone proporcje, przemyślany rytm elewacji oraz starannie dobrane, szlachetne materiały tworzą nowoczesną interpretację tradycyjnych miejskich kamienic.</p>
                            <p>&nbsp;</p>
                            <p>To unikalny projekt, w dzielnicy Siedlce, składający się z zaledwie 3 kameralnych budynków, w których łącznie zaplanowano 118 apartamentów.</p>
                            <a href="#contact" class="bttn bttn-icon mt-4">FORMULARZ KONTAKTOWY <i class="ms-3 las la-chevron-circle-right"></i></a>
                            @else
                                <h3>About the Development</h3>
                                <h2>A Contemporary Interpretation <br>of Timeless Architecture</h2>
                                <p>The architecture of the development draws subtle inspiration from Gdańsk’s historic urban fabric. Balanced proportions, a carefully composed façade rhythm, and a refined palette of noble materials create a contemporary interpretation of the city’s traditional townhouses.</p>
                                <p>&nbsp;</p>
                                <p>Located in the Siedlce district, this distinctive residential development consists of just three intimate buildings, offering a total of 118 apartments. The limited scale of the project ensures a sense of privacy and exclusivity while remaining closely connected to the vibrant character of Gdańsk.</p>
                                <a href="#contact" class="bttn bttn-icon mt-4">CONTACT FORM <i class="ms-3 las la-chevron-circle-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('gdansk/wizualizacja-inwestycji-2.jpg') }}" class="w-100" width="1600" height="720" alt="Wizualizacja inwestycji">
                    </div>
                </div>
            </div>
        </section>

        <section id="premium">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        @if($current_locale == 'pl')
                        <h2>Udogodnienia Premium</h2>
                        <h3>Twój prywatny azyl. Czas na regenerację.</h3>
                        @else
                            <h2>Premium Amenities</h2>
                            <h3>Your Private Sanctuary. A Space to Recharge.</h3>
                        @endif
                    </div>
                </div>
                <div class="row row-premium">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('gdansk/wizualizacja-inwestycji-3.jpg') }}" class="w-100" width="775" height="520" alt="Wizualizacja inwestycji">
                    </div>
                    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                        <div class="ps-0 ps-lg- 5 d-flex justify-content-center gap-5 align-items-center h-100">
                            <div class="premium-icon">
                                <img src="{{ asset('gdansk/strefa-fitness.png') }}" class="w-100" width="244" height="200" alt="Ikonka strefy fitness">
                                @if($current_locale == 'pl')
                                    <p>PRYWATNA<br>STREFA FITNESS</p>
                                @else
                                    <p>PRYWATNA<br>STREFA FITNESS</p>
                                @endif
                            </div>
                            <div class="premium-icon">
                                <img src="{{ asset('gdansk/silownia.png') }}" class="w-100" width="244" height="200" alt="Ikonka strefy fitness">
                                @if($current_locale == 'pl')
                                    <p>W PEŁNI WYPOSAŻONA<br>SIŁOWNIA</p>
                                @else
                                    <p>W PEŁNI WYPOSAŻONA<br>SIŁOWNIA</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row flex-row-reverse">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('gdansk/wizualizacja-inwestycji-4.jpg') }}" class="w-100" width="775" height="520" alt="Wizualizacja inwestycji">
                    </div>
                    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                        <div class="pe-0 pe-lg-5 d-flex justify-content-center gap-5 align-items-center h-100">
                            <div class="premium-icon">
                                <img src="{{ asset('gdansk/strefa-relaksu.png') }}" class="w-100" width="244" height="200" alt="Ikonka strefy fitness">
                                @if($current_locale == 'pl')
                                    <p>ZEWNĘTRZNA<br>STREFA RELAKSU</p>
                                @else
                                    <p>ZEWNĘTRZNA<br>STREFA RELAKSU</p>
                                @endif
                            </div>
                            <div class="premium-icon">
                                <img src="{{ asset('gdansk/ochrona.png') }}" class="w-100" width="244" height="200" alt="Ikonka strefy fitness">
                                @if($current_locale == 'pl')
                                    <p>REPREZENTACYJNE<br>LOBBY Z OCHRONĄ</p>
                                @else
                                    <p>REPREZENTACYJNE<br>LOBBY Z OCHRONĄ</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="location">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('gdansk/mapa-lokalizacji-malczewskiego.jpg') }}" class="w-100" width="790" height="600" alt="Wizualizacja inwestycji">
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="section-text ps-0 ps-lg-5 mt-4 mt-lg-0">
                            @if($current_locale == 'pl')
                            <h3>Lokalizacja</h3>
                            <h2>Wszystko, czego potrzebujesz. Dokładnie tam, gdzie chcesz.</h2>
                            <p>Lokalizacja przy ul. Malczewskiego to idealny kompromis między dynamicznym rytmem miasta a kojącym spokojem. Gdańskie Siedlce to rejon, który w przeciwieństwie do przesyconego turystami Śródmieścia, zachował znacznie więcej przestrzeni, naturalnej zieleni i kameralnego charakteru.</p>
                            @else
                                <h3>Location</h3>
                                <h2>Everything You Need. Exactly Where You Want It.</h2>
                                <p>Located on Malczewskiego Street, the development offers the perfect balance between the energy of the city and the comfort of a more peaceful setting. Siedlce is one of Gdańsk’s most desirable residential districts—an area that, unlike the bustling and tourist-filled city centre, has preserved its spacious character, abundant greenery, and sense of privacy.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('gdansk/wizualizacja-silowni-malczewskiego.jpg') }}" class="w-100" width="1600" height="720" alt="Wizualizacja inwestycji">
                    </div>
                </div>
            </div>
        </section>

        <section id="standard">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('gdansk/wizualizacja-inwestycji-5.jpg') }}" class="w-100" width="790" height="520" alt="Wizualizacja inwestycji">
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="section-text ps-0 ps-lg-5 mt-4 mt-lg-0">
                            @if($current_locale == 'pl')
                            <h3>Standard</h3>
                            <h2>Zadbaj o zdrowie i relaks bez wychodzenia z domu</h2>
                            <p>Prywatna strefa fitness z saunami pozwala zadbać o zdrowie i regenerację bez wychodzenia z domu, a w pełni wyposażona siłownia spełni oczekiwania nawet najbardziej wymagających.</p>
                            @else
                                <h3>Standard</h3>
                                <h2>Prioritize Wellness and Relaxation Without Leaving Home</h2>
                                <p>A private fitness and sauna area allows residents to focus on their well-being and recovery without stepping outside, while the fully equipped gym has been designed to meet the expectations of even the most discerning fitness enthusiasts.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('gdansk/wygoda-codziennego-zycia.jpg') }}" class="w-100" width="790" height="520" alt="Wizualizacja inwestycji">
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="section-text pe-0 pe-lg-5 mt-4 mt-lg-0">
                            @if($current_locale == 'pl')
                            <h3>Standard</h3>
                            <h2>Wygoda codziennego życia.</h2>
                            <p>W zaledwie 5 minut spacerem dotrzesz do kluczowych punktów usługowych, sklepów, a także renomowanych szkół i przedszkoli. Mieszkasz w cichej enklawie, zachowując pełną kontrolę nad swoim czasem i logistyką dnia.</p>
                            <a href="#contact" class="bttn bttn-icon mt-4">FORMULARZ KONTAKTOWY <i class="ms-3 las la-chevron-circle-right"></i></a>
                            @else
                                <h3>Standard</h3>
                                <h2>Everyday Convenience, Effortlessly Within Reach</h2>
                                <p>Within just a five-minute walk, you can access essential services, shops, as well as respected schools and kindergartens. Enjoy the comfort of living in a peaceful enclave while maintaining complete control over your time and the rhythm of your day.</p>
                                <a href="#contact" class="bttn bttn-icon mt-4">CONTACT FORM <i class="ms-3 las la-chevron-circle-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="nature">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('gdansk/kolory-inwestycji.jpg') }}" class="w-100" width="790" height="498" alt="Wizualizacja inwestycji">
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="section-text ps-0 ps-lg-5 mt-4 mt-lg-0">
                            @if($current_locale == 'pl')
                            <h3>O inwestycji</h3>
                            <h2>Spójnie z naturą.</h2>
                            <p>Kolorystyka osiedla została starannie dobrana, aby harmonijnie wpisywać się w otaczającą naturę. Barwy użyte w materiałach elewacyjnych, detalach architektonicznych i elementach małej architektury nawiązują do tonów ziemi, piasku i zieleni, tworząc spójną i relaksującą wizję całego osiedla.</p>
                            <a href="#contact" class="bttn bttn-icon mt-4">FORMULARZ KONTAKTOWY <i class="ms-3 las la-chevron-circle-right"></i></a>
                            @else
                                <h3>About the Development</h3>
                                <h2>In Harmony with Nature</h2>
                                <p>The colour palette of the development has been carefully selected to blend seamlessly with its natural surroundings. The tones used in the façade materials, architectural details, and landscape elements draw inspiration from the colours of earth, sand, and greenery, creating a cohesive and calming vision throughout the entire community.</p>
                                <a href="#contact" class="bttn bttn-icon mt-4">CONTACT FORM <i class="ms-3 las la-chevron-circle-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('gdansk/standard-inwestycji-malczewskiego.jpg') }}" class="w-100" width="790" height="520" alt="Wizualizacja inwestycji">
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="section-text pe-0 pe-lg-5 mt-4 mt-lg-0">
                            @if($current_locale == 'pl')
                            <h3>Inwestycja w przygotowaniu</h3>
                            <h2>Tworzymy standard bez kompromisów</h2>
                            <p>Obecnie doopracowujemy detale architektury oraz standard wykończenia, tak aby bezwzględnie sprostać wysokim wymaganiaom przyszłych mieszkańców.</p>
                            <p>&nbsp;</p>
                            <p>Napisz do Nas. Listę apartamentów oraz penthousów udostepnimy w pierwszej kolejności osobom zapisanym na listę oczekujących.</p>
                            @else
                                <h3>Development in Preparation</h3>
                                <h2>Creating a Standard Without Compromise</h2>
                                <p>We are currently refining every architectural detail and carefully defining the specification of the development to ensure it fully meets the expectations of future residents and delivers an uncompromising living experience.</p>
                                <p>&nbsp;</p>
                                <p>Contact us today. The list of available apartments and penthouses will be released first to those who join our priority waiting list.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center section-text">
                        @if($current_locale == 'pl')
                            <h3>Masz pytania?</h3>
                            <h2>Napisz do nas!</h2>
                        @else
                            <h3>Have more questions?</h3>
                            <h2>Write to us!</h2>
                        @endif
                    </div>
                </div>
            </div>

            @include('front.contact.form', [ 'page_name' => 'Malczewskiego'])
        </section>
    </div>

    <style>

        @font-face {
            font-family: 'Maharlika';
            src: url('{{ asset('fonts/Maharlika-Regular.woff2') }}') format('woff2'),
            url('{{ asset('fonts/Maharlika-Regular.woff') }}') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        #page {
            padding-top: 0;
        }
        #hero {
            position: relative;
            min-height: calc(100vh - 238px);
        }
        @media (max-width: 1399.98px) {
            #hero {
                min-height: calc(100vh - 170px);
            }
        }
        @media (max-width: 1199.98px) {
            #hero {
                position: relative;
                min-height: calc(100vh - 100px);
            }
        }
        #hero img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
            object-position: center;
            object-fit: cover;
        }
        #hero .hero-apla {
            position: absolute;
            left: 50px;
            bottom: 50px;
            width: 50%;
        }
        #hero h1 {
            font-size: 110px;
            line-height: 110px;
            color: #ba8b41;
            font-family: 'Maharlika', sans-serif;
            font-style: normal;
        }
        #hero h5 {
            font-size: 30px;
            line-height: 48px;
            color: white;
            font-weight: 500;
        }
        section {
            padding: 95px 0 0 !important;
        }
        section#premium {
            padding: 95px 0 !important;
            background: black;
            margin-top: 95px;
        }
        section#premium h2, section#premium h3 {
            font-family: 'Maharlika', sans-serif;
            font-style: normal;
        }
        section#premium h2 {
            font-size: 48px;
            color: #ba8b41;
        }
        section#premium h3 {
            font-size: 64px;
            color: white;
        }
        .section-text h3, .section-text h2 {
            font-family: 'Maharlika', sans-serif;
            font-style: normal;
        }
        .section-text h2 {
            font-size: 57px;
            line-height: 64px;
            margin-bottom: 30px;
        }
        .section-text h3 {
            font-size: 24px;
            line-height: 40px;
            text-transform: uppercase;
            color: #ba8b41;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }
        .section-text p {
            font-size: 18px;
            line-height: 34px;
        }
        #page-content nav {
            background: black;
            padding: 25px 0;
            position: sticky;
            top: 136px;
            z-index: 99;
        }
        #page-content nav ul {
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        #page-content nav ul a {
            color: white;
            font-size: 20px;
            margin: 0 20px;
        }
        .row-premium {
            margin: 95px 0;
        }
        .premium-icon {
            border:1px solid #ba8b41;
            padding: 30px;
            width: 50%;
            height: 360px;
        }
        .premium-icon p {
            font-family: 'Maharlika', sans-serif;
            font-style: normal;
            font-size: 22px;
            line-height: 36px;
            color: white;
            text-align: center;
        }
        @media (max-width: 1639.98px) {
            .section-text p {
                font-size: 17px;
                line-height: 29px;
            }
            .section-text h2 {
                font-size: 49px;
                line-height: 49px;
                margin-bottom: 20px;
            }
            .section-text h3 {
                font-size: 18px;
                line-height: 24px;
                text-transform: uppercase;
                color: #ba8b41;
                margin-bottom: 10px;
                letter-spacing: 2px;
            }
            section#premium h2 {
                font-size: 35px
            }
            section#premium h3 {
                font-size: 47px;
                color: white;
            }
            .row-premium {
                margin: 45px 0;
            }
            .premium-icon img {
                width: 140px !important;
                height: auto !important;
                margin: 0 auto;
            }
            .premium-icon {
                height: 240px;
            }
            .premium-icon p {
                font-size: 16px;
                line-height: 26px;
            }
            #hero h1 {
                font-size: 90px;
                line-height: 90px;
            }
            #hero h5 {
                font-size: 26px;
                line-height: 42px;
            }
        }
        @media (max-width: 1399.98px) {
            .section-text p {
                font-size: 16px;
                line-height: 26px;
            }
            .section-text h2 {
                font-size: 40px;
                line-height: 40px;
                margin-bottom: 15px;
            }
            .section-text h3 {
                font-size: 16px;
                line-height: 18px;
                letter-spacing: 1px;
            }
        }
        @media (max-width: 1199.98px) {
            .bttn {
                font-size: 15px;
                padding: 11px;
            }
            .section-text h2 {
                font-size: 34px;
                line-height: 37px;
                margin-bottom: 15px;
            }
            .premium-icon {
                padding: 10px;
                height: 360px;
            }
            .premium-icon img {
                width: 120px !important;
            }
            .premium-icon p {
                font-size: 13px;
                line-height: 19px;
                font-family: "Poppins",sans-serif;
            }
            .premium-icon {
                height: 170px;
            }
            section {
                padding: 55px 0 0 !important;
            }
            section#premium {
                padding: 55px 0 !important;
                margin-top: 55px;
            }
            #page-content nav ul a {
                font-size: 16px;
                margin: 0 15px;
            }
            #hero {
                min-height: calc(100vh - 180px);
            }
            #hero h1 {
                font-size: 60px;
                line-height: 60px;
            }
            #hero h5 {
                font-size: 21px;
                line-height: 30px;
            }
            #hero .bttn {
                margin-top: 20px !important;
            }
            #page-content nav {
                padding: 13px 0;
                top: 100px;
            }
        }
        @media (max-width: 767px) {
            #hero .hero-apla {
                left: 30px;
                bottom: 30px;
                width: calc(100% - 120px);
            }
            #hero h1 {
                font-size: 40px;
                line-height: 40px;
            }
            #hero h5 {
                font-size: 18px;
                line-height: 27px;
            }
            .section-text h2 {
                font-size: 24px;
                line-height: 30px;
            }
            .section-text p {
                font-size: 16px;
                line-height: 23px;
            }
            section#premium h2 {
                font-size: 26px;
            }
            section#premium h3 {
                font-size: 40px;
                color: white;
            }
        }
        @media (max-width: 575.98px) {
            #hero h1 {
                font-size: 35px;
                line-height: 36px;
            }
            #hero h5 {
                font-size: 15px;
                line-height: 21px;
            }
            .bttn {
                font-size: 11px;
                padding: 8px;
            }
            #page-content nav {
                padding: 10px 0;
                top: 85px;
            }
            #page-content nav ul {
                display: flex;
                flex-wrap: wrap;
            }
            #page-content nav li {
                line-height: 1;
                margin: 5px 0;
                padding: 0 10px;
            }
            #page-content nav li a {
                font-size: 12px;
                margin: 0;
            }
            #hero .hero-apla {
                left: 15px;
                bottom: 15px;
                width: calc(100% - 70px);
            }
        }
    </style>

@endsection

@push('scripts')
    <script>
        document.querySelectorAll('#invest-nav a[href^="#"], a[href="#contact"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    const nav = document.querySelector('#page-content nav');
                    const navHeight = nav ? nav.offsetHeight : 0;
                    const headerHeight = 136; // Odstęp od góry (top: 136px w CSS)
                    const offsetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navHeight - headerHeight;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
@endpush

