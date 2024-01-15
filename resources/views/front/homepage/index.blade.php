@extends('layouts.homepage', ['body_class' => 'homepage'])

@section('content')

<div id="slider">
    <img src="https://placehold.co/1920x820" alt="" class="w-100">
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Poznaj inwestycje</span> <br>w sprzedaży</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Już</span> <br>wkrótce</h2>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div class="invest-item">
                    <div class="invest-item-thumb">
                        <span class="img-badge">Inwestrycja planowana</span>
                        <a href="#">
                            <img src="https://placehold.co/840x520" alt="Nazwa">
                        </a>
                    </div>
                    <div class="invest-item-desc">
                        <div class="invest-item-header">
                            <h2 class="mb-0"><a href="#">Osiedle tempo</a></h2>
                            <div class="invest-item-city">Olsztyn, Sikorskiego</div>
                        </div>
                        <img src="https://placehold.co/180x80?text=Logo" alt="Nazwa">
                        <p>TEMPO to nowoczesne osiedle, skierowane do osób aktywnych, które chcą mieć wszędzie blisko. Blisko do komunikacji miejskiej, ścieżek rowerowych i sklepów. To miejsce dla osób które chcą szybko dojechać do centrum miasta, do pracy, czy na Uniwersytet Warmiński-Mazurski. Funkcjonalne mieszkania od 27 - 68 m2 wyposażone w elektroniczne klamki wejściowe</p>
                        <a href="" class="bttn bttn-icon mt-4">ZOBACZ MIESZKANIA<i class="ms-4 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="invest-item">
                    <div class="invest-item-thumb">
                        <span class="img-badge">Inwestrycja planowana</span>
                        <a href="#">
                            <img src="https://placehold.co/840x520" alt="Nazwa">
                        </a>
                    </div>
                    <div class="invest-item-desc">
                        <div class="invest-item-header">
                            <h2 class="mb-0"><a href="#">Osiedle tempo</a></h2>
                            <div class="invest-item-city">Olsztyn, Sikorskiego</div>
                        </div>
                        <img src="https://placehold.co/180x80?text=Logo" alt="Nazwa">
                        <p>TEMPO to nowoczesne osiedle, skierowane do osób aktywnych, które chcą mieć wszędzie blisko. Blisko do komunikacji miejskiej, ścieżek rowerowych i sklepów. To miejsce dla osób które chcą szybko dojechać do centrum miasta, do pracy, czy na Uniwersytet Warmiński-Mazurski. Funkcjonalne mieszkania od 27 - 68 m2 wyposażone w elektroniczne klamki wejściowe</p>
                        <a href="" class="bttn bttn-icon mt-4">ZOBACZ MIESZKANIA<i class="ms-4 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Inwestycje</span> <br>planowane</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-3" id="plannedCarousel">
            <div class="col-12">
                <div class="planned-item row no-gutters">
                    <div class="col-8">
                        <a href=""><img src="https://placehold.co/840x520" alt="Nazwa" class="w-100"></a>
                    </div>
                    <div class="col-4">
                        <div class="planned-item-gold">
                            <div class="planned-item-desc">
                                <h2><a href="">WARMIA LUXURY RESIDENCE</a></h2>
                                <p>Jedyny w Polsce projekt luksusowych apartamentów, które zostały idealnie wkomponowane w krajobraz Naterek. Położone nad jednym z najpiękniejszych jezior Warmii i Mazur, pośród zapierających dech lasów.</p>
                                <a href="" class="bttn-link">Zobacz więcej</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="planned-item row no-gutters">
                    <div class="col-8">
                        <a href=""><img src="https://placehold.co/840x520" alt="Nazwa" class="w-100"></a>
                    </div>
                    <div class="col-4">
                        <div class="planned-item-gold">
                            <div class="planned-item-desc">
                                <h2><a href="">WARMIA LUXURY RESIDENCE</a></h2>
                                <p>Jedyny w Polsce projekt luksusowych apartamentów, które zostały idealnie wkomponowane w krajobraz Naterek. Położone nad jednym z najpiękniejszych jezior Warmii i Mazur, pośród zapierających dech lasów.</p>
                                <a href="" class="bttn-link">Zobacz więcej</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="planned-item row no-gutters">
                    <div class="col-8">
                        <a href="#"><img src="https://placehold.co/840x520" alt="Nazwa" class="w-100"></a>
                    </div>
                    <div class="col-4">
                        <div class="planned-item-gold">
                            <div class="planned-item-desc">
                                <h2><a href="">WARMIA LUXURY RESIDENCE</a></h2>
                                <p>Jedyny w Polsce projekt luksusowych apartamentów, które zostały idealnie wkomponowane w krajobraz Naterek. Położone nad jednym z najpiękniejszych jezior Warmii i Mazur, pośród zapierających dech lasów.</p>
                                <a href="" class="bttn-link">Zobacz więcej</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="planned-item row no-gutters">
                    <div class="col-8">
                        <a href="#"><img src="https://placehold.co/840x520" alt="Nazwa" class="w-100"></a>
                    </div>
                    <div class="col-4">
                        <div class="planned-item-gold">
                            <div class="planned-item-desc">
                                <h2><a href="">WARMIA LUXURY RESIDENCE</a></h2>
                                <p>Jedyny w Polsce projekt luksusowych apartamentów, które zostały idealnie wkomponowane w krajobraz Naterek. Położone nad jednym z najpiękniejszych jezior Warmii i Mazur, pośród zapierających dech lasów.</p>
                                <a href="" class="bttn-link">Zobacz więcej</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Dostępne</span> <br>mieszkania</h2>
            </div>
        </div>
    </div>
    <div class="light-bg pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="main-room">
                        <div class="main-room-header text-center">
                            <h2 class="poppins"><a href="#">MIESZKANIA <br><b>1 POKOJOWE</b></a></h2>
                            <p>Powierzchnia: <span>27m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="#"><img src="https://placehold.co/600x400" alt=""></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="#" class="bttn bttn-icon">Zobacz mieszkania <i class="las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="main-room">
                        <div class="main-room-header text-center">
                            <h2 class="poppins"><a href="#">MIESZKANIA <br><b>2 POKOJOWE</b></a></h2>
                            <p>Powierzchnia: <span>27m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="#"><img src="https://placehold.co/600x400" alt=""></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="#" class="bttn bttn-icon">Zobacz mieszkania <i class="las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="main-room">
                        <div class="main-room-header text-center">
                            <h2 class="poppins"><a href="#">MIESZKANIA <br><b>3 POKOJOWE</b></a></h2>
                            <p>Powierzchnia: <span>27m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="#"><img src="https://placehold.co/600x400" alt=""></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="#" class="bttn bttn-icon">Zobacz mieszkania <i class="las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="main-room">
                        <div class="main-room-header text-center">
                            <h2 class="poppins"><a href="#">MIESZKANIA <br><b>4 POKOJOWE</b></a></h2>
                            <p>Powierzchnia: <span>27m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="#"><img src="https://placehold.co/600x400" alt=""></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="#" class="bttn bttn-icon">Zobacz mieszkania <i class="las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Deweloper</span> <br>godny zaufania</h2>
            </div>
            <div class="col-6">
                <img src="{{ asset('images/deweloper-roku-2023.jpg') }}" alt="" width="840" height="600">
            </div>
            <div class="col-6 d-flex align-items-center">
                <div class="section-text ps-5">
                    <p>Jesteśmy wiodącą firmą deweloperską specjalizującą się w realizacji projektów branży mieszkaniowej oraz komercyjnej. Czterokrotnie zostaliśmy nagrodzeni tytułem Deweloper Roku. Budujemy mieszkania, apartamenty oraz domy na terenie całego kraju.</p>
                    <p>&nbsp;</p>
                    <p>W naszych projektach wprowadzamy innowacyjne rozwiązania i kreujemy nowe standardy na rynku. Jako jedyny deweloper zaoferowaliśmy apartamenty z ogrodami zimowymi w Olsztynie. Dbamy o jakość użytych materiałów oraz o komfort i funkcjonalność naszych mieszkań.</p>
                    <a href="#" class="bttn bttn-icon mt-5">Sprawdź <i class="ms-5 las la-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div id="numbers">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="number">
                        <div class="number-icon">

                        </div>
                        <div class="number-value">92%</div>
                        <div class="number-text">
                            <p>mieszkańców naszego osiedla ocenia wysoką jakość wykończenia naszych mieszkań</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="number">
                        <div class="number-icon">

                        </div>
                        <div class="number-value">95%</div>
                        <div class="number-text">
                            <p>mieszkańców zdecydowanie poleciłoby swoim znajomym zakup mieszkania na naszych osiedlach</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="number">
                        <div class="number-icon">

                        </div>
                        <div class="number-value">97%</div>
                        <div class="number-text">
                            <p>mieszkańców jest zadowolonych z atrakcyjnej lokalizacji naszych inwestycji</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="number">
                        <div class="number-icon">

                        </div>
                        <div class="number-value">100%</div>
                        <div class="number-text">
                            <p>oddanych mieszkań w terminie</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Opinie</span> <br>klientów</h2>
            </div>
        </div>
    </div>

    <div id="reviewCarousel" class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="review">
                    <img src="{{ asset('images/quote.svg') }}" alt="Opinia klienta" class="review-quote">
                    <div class="review-name">Paulina r. Piotr g.</div>
                    <div class="review-star">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                    </div>
                    <div class="review-content">
                        <p>"Odebraliśmy klucze do naszego mieszkania i chcemy jeszcze raz z całego serca podziękować za tak cudowną obsługę i troskę o zadowolenie klientów. Jesteśmy pod ogromnym wrażeniem tego osiedla (pod każdym względem) i bardzo się cieszymy, że to właśnie u Was kupiliśmy swoje pierwsze mieszkanie.</p>
                        <p>&nbsp;</p>
                        <p>Mamy nadzieję, że zadowolenie Waszych klientów zachęci pozostałych do zakupy u Was swojego mieszkania. Jeszcze raz bardzo dziękujemy"</p>
                    </div>
                    <div class="review-source">
                        <img src="https://placehold.co/35x35" alt=""> Opinie Facebook
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="review">
                    <img src="{{ asset('images/quote.svg') }}" alt="Opinia klienta" class="review-quote">
                    <div class="review-name">Paulina r. Piotr g.</div>
                    <div class="review-star">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                    </div>
                    <div class="review-content">
                        <p>"Odebraliśmy klucze do naszego mieszkania i chcemy jeszcze raz z całego serca podziękować za tak cudowną obsługę i troskę o zadowolenie klientów. Jesteśmy pod ogromnym wrażeniem tego osiedla (pod każdym względem) i bardzo się cieszymy, że to właśnie u Was kupiliśmy swoje pierwsze mieszkanie.</p>
                        <p>&nbsp;</p>
                        <p>Mamy nadzieję, że zadowolenie Waszych klientów zachęci pozostałych do zakupy u Was swojego mieszkania. Jeszcze raz bardzo dziękujemy"</p>
                    </div>
                    <div class="review-source">
                        <img src="https://placehold.co/35x35" alt=""> Opinie Facebook
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="review">
                    <img src="{{ asset('images/quote.svg') }}" alt="Opinia klienta" class="review-quote">
                    <div class="review-name">Paulina r. Piotr g.</div>
                    <div class="review-star">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                    </div>
                    <div class="review-content">
                        <p>"Odebraliśmy klucze do naszego mieszkania i chcemy jeszcze raz z całego serca podziękować za tak cudowną obsługę i troskę o zadowolenie klientów. Jesteśmy pod ogromnym wrażeniem tego osiedla (pod każdym względem) i bardzo się cieszymy, że to właśnie u Was kupiliśmy swoje pierwsze mieszkanie.</p>
                        <p>&nbsp;</p>
                        <p>Mamy nadzieję, że zadowolenie Waszych klientów zachęci pozostałych do zakupy u Was swojego mieszkania. Jeszcze raz bardzo dziękujemy"</p>
                    </div>
                    <div class="review-source">
                        <img src="https://placehold.co/35x35" alt=""> Opinie Facebook
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="review">
                    <img src="{{ asset('images/quote.svg') }}" alt="Opinia klienta" class="review-quote">
                    <div class="review-name">Paulina r. Piotr g.</div>
                    <div class="review-star">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                    </div>
                    <div class="review-content">
                        <p>"Odebraliśmy klucze do naszego mieszkania i chcemy jeszcze raz z całego serca podziękować za tak cudowną obsługę i troskę o zadowolenie klientów. Jesteśmy pod ogromnym wrażeniem tego osiedla (pod każdym względem) i bardzo się cieszymy, że to właśnie u Was kupiliśmy swoje pierwsze mieszkanie.</p>
                        <p>&nbsp;</p>
                        <p>Mamy nadzieję, że zadowolenie Waszych klientów zachęci pozostałych do zakupy u Was swojego mieszkania. Jeszcze raz bardzo dziękujemy"</p>
                    </div>
                    <div class="review-source">
                        <img src="https://placehold.co/35x35" alt=""> Opinie Facebook
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="review">
                    <img src="{{ asset('images/quote.svg') }}" alt="Opinia klienta" class="review-quote">
                    <div class="review-name">Paulina r. Piotr g.</div>
                    <div class="review-star">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                    </div>
                    <div class="review-content">
                        <p>"Odebraliśmy klucze do naszego mieszkania i chcemy jeszcze raz z całego serca podziękować za tak cudowną obsługę i troskę o zadowolenie klientów. Jesteśmy pod ogromnym wrażeniem tego osiedla (pod każdym względem) i bardzo się cieszymy, że to właśnie u Was kupiliśmy swoje pierwsze mieszkanie.</p>
                        <p>&nbsp;</p>
                        <p>Mamy nadzieję, że zadowolenie Waszych klientów zachęci pozostałych do zakupy u Was swojego mieszkania. Jeszcze raz bardzo dziękujemy"</p>
                    </div>
                    <div class="review-source">
                        <img src="https://placehold.co/35x35" alt=""> Opinie Facebook
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="review">
                    <img src="{{ asset('images/quote.svg') }}" alt="Opinia klienta" class="review-quote">
                    <div class="review-name">Paulina r. Piotr g.</div>
                    <div class="review-star">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                    </div>
                    <div class="review-content">
                        <p>"Odebraliśmy klucze do naszego mieszkania i chcemy jeszcze raz z całego serca podziękować za tak cudowną obsługę i troskę o zadowolenie klientów. Jesteśmy pod ogromnym wrażeniem tego osiedla (pod każdym względem) i bardzo się cieszymy, że to właśnie u Was kupiliśmy swoje pierwsze mieszkanie.</p>
                        <p>&nbsp;</p>
                        <p>Mamy nadzieję, że zadowolenie Waszych klientów zachęci pozostałych do zakupy u Was swojego mieszkania. Jeszcze raz bardzo dziękujemy"</p>
                    </div>
                    <div class="review-source">
                        <img src="https://placehold.co/35x35" alt=""> Opinie Facebook
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="review">
                    <img src="{{ asset('images/quote.svg') }}" alt="Opinia klienta" class="review-quote">
                    <div class="review-name">Paulina r. Piotr g.</div>
                    <div class="review-star">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                        <img src="{{ asset('images/quote-star.svg') }}" alt="Rate icon">
                    </div>
                    <div class="review-content">
                        <p>"Odebraliśmy klucze do naszego mieszkania i chcemy jeszcze raz z całego serca podziękować za tak cudowną obsługę i troskę o zadowolenie klientów. Jesteśmy pod ogromnym wrażeniem tego osiedla (pod każdym względem) i bardzo się cieszymy, że to właśnie u Was kupiliśmy swoje pierwsze mieszkanie.</p>
                        <p>&nbsp;</p>
                        <p>Mamy nadzieję, że zadowolenie Waszych klientów zachęci pozostałych do zakupy u Was swojego mieszkania. Jeszcze raz bardzo dziękujemy"</p>
                    </div>
                    <div class="review-source">
                        <img src="https://placehold.co/35x35" alt=""> Opinie Facebook
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Poznaj</span> <br>nas lepiej</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Aktualności</span></h2>
            </div>
        </div>
    </div>

    <div id="mainNews" class="container-fluid">
        <div class="row">

            <div class="col-4">
                <article>
                    <div class="article-thumb">
                        <a href=""><img src="https://placehold.co/830x567" alt=""></a>
                        <div class="img-gradient"></div>
                    </div>
                    <div class="article-content">
                        <h2><a href="">Ippon Group Liderem Nieruchomości Otodom 2022</a></h2>
                        <p>O konkursie, obecnych i planowanych inwestycjach oraz o działaniach prospołecznych, z Prezes Za...</p>
                        <a href="" class="bttn-link">Czytaj więcej</a>
                    </div>
                </article>
            </div>

            <div class="col-4">
                <article>
                    <div class="article-thumb">
                        <a href=""><img src="https://placehold.co/830x567" alt=""></a>
                        <div class="img-gradient"></div>
                    </div>
                    <div class="article-content">
                        <h2><a href="">Ippon Group Liderem Nieruchomości Otodom 2022</a></h2>
                        <p>O konkursie, obecnych i planowanych inwestycjach oraz o działaniach prospołecznych, z Prezes Za...</p>
                        <a href="" class="bttn-link">Czytaj więcej</a>
                    </div>
                </article>
            </div>

            <div class="col-4">
                <article>
                    <div class="article-thumb">
                        <a href=""><img src="https://placehold.co/830x567" alt=""></a>
                        <div class="img-gradient"></div>
                    </div>
                    <div class="article-content">
                        <h2><a href="">Ippon Group Liderem Nieruchomości Otodom 2022</a></h2>
                        <p>O konkursie, obecnych i planowanych inwestycjach oraz o działaniach prospołecznych, z Prezes Za...</p>
                        <a href="" class="bttn-link">Czytaj więcej</a>
                    </div>
                </article>
            </div>

            <div class="col-4">
                <article>
                    <div class="article-thumb">
                        <a href=""><img src="https://placehold.co/830x567" alt=""></a>
                        <div class="img-gradient"></div>
                    </div>
                    <div class="article-content">
                        <h2><a href="">Ippon Group Liderem Nieruchomości Otodom 2022</a></h2>
                        <p>O konkursie, obecnych i planowanych inwestycjach oraz o działaniach prospołecznych, z Prezes Za...</p>
                        <a href="" class="bttn-link">Czytaj więcej</a>
                    </div>
                </article>
            </div>

        </div>
    </div>
</section>

@include('front.contact.form')
@endsection
