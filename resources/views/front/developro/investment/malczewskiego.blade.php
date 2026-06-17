@extends('layouts.page', ['body_class' => 'no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', "noindex, nofollow")

@section('content')
    <div id="page-content" class="invest-malczewskiego">

        <div id="hero">
            <div class="hero-apla">
                <h1>PRESTIŻ MIERZY SIĘ SPOKOJEM.</h1>
                <h5>Luksus ciszy, prestiż lokalizacji w kameralnej części Gdańska</h5>
                <a href="#contact" class="bttn bttn-icon mt-5">FORMULARZ KONTAKTOWY <i class="ms-3 las la-chevron-circle-right"></i></a>
            </div>
            <img src="{{ asset('images/hero-malczewskiego.jpg') }}" alt="" class="w-100">
        </div>

        <nav id="invest-nav">
            <ul>
                <li><a href="#about">Opis inwestycji</a></li>
                <li><a href="#premium">Premium</a></li>
                <li><a href="#location">Lokalizacja</a></li>
                <li><a href="#standard">Standard</a></li>
                <li><a href="#nature">Spójnie z naturą</a></li>
                <li><a href="#contact">Kontakt</a></li>
            </ul>
        </nav>


        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <img src="https://placehold.co/774x820" alt="" class="w-100">
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-center">
                        <div class="section-text ps-5">
                            <h3>O inwestycji</h3>
                            <h2>Nowoczesna interpretacja klasyki</h2>
                            <p>Architektura naszego osiedla w subtelny sposób nawiązuje do historycznej tkanki Gdańska. Wyważone proporcje, przemyślany rytm elewacji oraz starannie dobrane, szlachetne materiały tworzą nowoczesną interpretację tradycyjnych miejskich kamienic.</p>
                            <p>&nbsp;</p>
                            <p>To unikalny projekt, w dzielnicy Siedlce, składający się z zaledwie 3 kameralnych budynków, w których łącznie zaplanowano 118 apartamentów.</p>
                            <a href="#contact" class="bttn bttn-icon mt-5">FORMULARZ KONTAKTOWY <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="https://placehold.co/1600x920" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </section>

        <section id="premium">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Udogodnienia Premium</h2>
                        <h3>Twój prywatny azyl. Czas na regenerację.</h3>
                    </div>
                </div>
                <div class="row row-premium">
                    <div class="col-6">
                        <img src="https://placehold.co/774x520" alt="" class="w-100">
                    </div>
                    <div class="col-6">
                        <div class="ps-5 d-flex justify-content-center gap-5 align-items-center h-100">
                            <div class="premium-icon">
                                <p>PRYWATNA<br>STREFA FITNESS</p>
                            </div>
                            <div class="premium-icon">
                                <p>W PEŁNI<br>WYPOSAZONA<br>SIŁOWNIA</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row flex-row-reverse">
                    <div class="col-6">
                        <img src="https://placehold.co/774x520" alt="" class="w-100">
                    </div>
                    <div class="col-6">
                        <div class="pe-5 d-flex justify-content-center gap-5 align-items-center h-100">
                            <div class="premium-icon">
                                <p>ZEWNĘTRZNA<br>STREFA RELAKSU</p>
                            </div>
                            <div class="premium-icon">
                                <p>REPREZENTACYJNE<br>LOBBY Z OCHRONĄ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="location">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <img src="https://placehold.co/774x774" alt="" class="w-100">
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-center">
                        <div class="section-text ps-5">
                            <h3>Lokalizacja</h3>
                            <h2>Wszystko, czego potrzebujesz. Dokładnie tam, gdzie chcesz.</h2>
                            <p>Lokalizacja przy ul. Malczewskiego to idealny kompromis między dynamicznym rytmem miasta a kojącym spokojem. Gdańskie Siedlce to rejon, który w przeciwieństwie do przesyconego turystami Śródmieścia, zachował znacznie więcej przestrzeni, naturalnej zieleni i kameralnego charakteru.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="https://placehold.co/1600x920" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </section>

        <section id="standard">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <img src="https://placehold.co/774x774" alt="" class="w-100">
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-center">
                        <div class="section-text ps-5">
                            <h3>Standard</h3>
                            <h2>Zadbaj o zdrowie i relaks bez wychodzenia z domu</h2>
                            <p>Prywatna strefa fitness z saunami pozwala zadbać o zdrowie i regenerację bez wychodzenia z domu, a w pełni wyposażona siłownia spełni oczekiwania nawet najbardziej wymagających.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-6">
                        <img src="https://placehold.co/774x774" alt="" class="w-100">
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-center">
                        <div class="section-text pe-5">
                            <h3>Standard</h3>
                            <h2>Wygoda codziennego życia.</h2>
                            <p>W zaledwie 5 minut spacerem dotrzesz do kluczowych punktów usługowych, sklepów, a także renomowanych szkół i przedszkoli. Mieszkasz w cichej enklawie, zachowując pełną kontrolę nad swoim czasem i logistyką dnia.</p>
                            <a href="#contact" class="bttn bttn-icon mt-5">FORMULARZ KONTAKTOWY <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="nature">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <img src="https://placehold.co/774x774" alt="" class="w-100">
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-center">
                        <div class="section-text ps-5">
                            <h3>O inwestycji</h3>
                            <h2>Spójnie z naturą.</h2>
                            <p>Kolorystyka osiedla została starannie dobrana, aby harmonijnie wpisywać się w otaczającą naturę. Barwy użyte w materiałach elewacyjnych, detalach architektonicznych i elementach małej architektury nawiązują do tonów ziemi, piasku i zieleni, tworząc spójną i relaksującą wizję całego osiedla.</p>
                            <a href="#contact" class="bttn bttn-icon mt-5">FORMULARZ KONTAKTOWY <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-6">
                        <img src="https://placehold.co/774x774" alt="" class="w-100">
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-center">
                        <div class="section-text pe-5">
                            <h3>Inwestycja w przygotowaniu</h3>
                            <h2>Tworzymy standard bez kompromisów</h2>
                            <p>Obecnie doopracowujemy detale architektury oraz standard wykończenia, tak aby bezwzględnie sprostać wysokim wymaganiaom przyszłych mieszkańców.</p>
                            <p>&nbsp;</p>
                            <p>Napisz do Nas. Listę apartamentów oraz penthousów udostepnimy w pierwszej kolejności osobom zapisanym na listę oczekujących.</p>
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
            font-family: 'Maharlika';
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
            font-size: 64px;
            line-height: 72px;
            margin-bottom: 40px;
        }
        .section-text h3 {
            font-size: 24px;
            line-height: 40px;
            text-transform: uppercase;
            color: #ba8b41;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }
        .section-text p {
            font-size: 20px;
            line-height: 36px;
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
            font-size: 24px;
            line-height: 36px;
            color: white;
            text-align: center;
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

