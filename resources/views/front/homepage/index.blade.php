@extends('layouts.homepage', ['body_class' => 'homepage ip-page'])

@section('content')

    @if(1 == 2)
<div class="slider-holder position-relative">
    <ul id="slider" class="mb-0 list-unstyled">
        @foreach($sliders as $panel)
            <li>
                @if($panel->link)
                    <a href="{{ $panel->link }}" target="{{ $panel->link_target }}">
                        @endif
                        <picture>
                            <!-- Use webp and jpeg images above 800px -->
                            <source type="image/webp" srcset="{{ asset('/uploads/slider/webp/'.$panel->file_webp) }}" media="(min-width: 801px)">
                            <source type="image/jpeg" srcset="{{ asset('/uploads/slider/'.$panel->file) }}" media="(min-width: 801px)">

                            <!-- Use mobile image below 800px -->
                            <source type="image/jpeg" srcset="{{ asset('/uploads/slider/mobile/'.$panel->file_mobile) }}" media="(max-width: 800px)">

                            <img src="{{asset('/uploads/slider/'.$panel->file) }}" width="700" height="394" class="w-100" alt="{{ $panel->file_alt }}">
                        </picture>
                        @if($panel->link)
                    </a>
                @endif
            </li>
        @endforeach
    </ul>

    <div id="filtr" class="homepage">
        <div class="container-fluid">
            <form method="get" class="row" action="/pl/i/osiedle-slow/mieszkania#filtr" id="dynamic-form">
                <div class="col-12 col-sm-6 col-md">
                    <div class="select-border">
                        <select name="invest" id="filtr-invest">
                            <option value="">@lang('website.select-option-investment')</option>
                            <option value="osiedle-slow" >Osiedle Slow</option>
                            <option value="osiedle-synergia" >Osiedle Synergia</option>
                            <option value="osiedle-tempo" >Osiedle Tempo</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="select-border">
                    <select name="floor" id="filtr-floor">
                        <option value="">@lang('website.select-option-floor')</option>
                        <option value="0" >@lang('website.select-option-floor-groundfloor')</option>
                        <option value="1" >@lang('website.select-option-floor-1')</option>
                        <option value="2" >@lang('website.select-option-floor-2')</option>
                        <option value="3" >@lang('website.select-option-floor-3')</option>
                        <option value="4" >@lang('website.select-option-floor-4')</option>
                        <option value="5" >@lang('website.select-option-floor-5')</option>
                    </select>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="select-border">
                    <select name="rooms" id="filtr-rooms">
                        <option value="">@lang('website.select-option-rooms')</option>
                        <option value="1" class="osiedle-synergia" style="display: none">@lang('website.select-option-rooms-1')</option>
                        <option value="2" >@lang('website.select-option-rooms-2')</option>
                        <option value="3" >@lang('website.select-option-rooms-3')</option>
                        <option value="4" class="osiedle-synergia" style="display: none">@lang('website.select-option-rooms-4')</option>
                    </select>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="select-border">
                    <select name="status" id="filtr-status">
                        <option value="">Status</option>
                        <option value="1" >@lang('website.property-status-1')</option>
                        <option value="2" >@lang('website.property-status-2')</option>
                        <option value="3" >@lang('website.property-status-3')</option>
                    </select>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md">
                    <div class="select-border">
                    <select name="area" id="filtr-area">
                        <option value="">@lang('website.property-area')</option>
                        <option value="35-36">35-36 m²</option>
                        <option value="49-56"> 49-56 m²</option>
                    </select>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <button type="submit" id="filtr-button" class="bttn bttn-icon pt-3 pt-sm-0 pb-3 pb-sm-0">@lang('website.button-search') <i class="ms-3 las la-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<section class="pe-3 pe-sm-0 ps-3 ps-sm-0">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                <h2 class="section-title text-uppercase"><span class="text-gold">Poznaj inwestycje</span> w sprzedaży</h2>
                @else
                <h2 class="section-title text-uppercase"><span class="text-gold">Discover investments</span> <br>on sale</h2>
                @endif
            </div>
        </div>

        @auth()
        <div class="row">
            <div class="col-4 p-4">
                <div class="main-investbox" style="border:2px solid #ba8b41;border-radius: 10px;">
                    <div class="main-investbox-header">
                        <h2 class="mb-0">OSIEDLE SLOW</h2>
                        <div class="invest-item-city">Olsztyn, ul.Kordeckiego</div>
                    </div>
                    <div class="main-investbox-thumb">
                        <img src="{{ asset('/uploads/files/osiedle-slow/osiedle-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                    </div>
                    <div class="main-investbox-state">
                        OSTATNIE MIESZKANIA
                    </div>
                    <div class="main-investbox-features">
                        <div class="row">
                            <div class="col-4">
                                <div style="width:40px;height:40px;background:black;margin:0 auto;border-radius:4px"></div>
                                <p>35 - 56 m<sup>2</sup></p>
                            </div>
                            <div class="col-4">
                                <div style="width:40px;height:40px;background:black;margin:0 auto;border-radius:4px"></div>
                                <p>2 piętra<br>winda</p>
                            </div>
                            <div class="col-4">
                                <div style="width:40px;height:40px;background:black;margin:0 auto;border-radius:4px"></div>
                                <p>Odbiór Q4 2026</p>
                            </div>
                        </div>
                        <p class="mt-3">Zielone i ekologiczne osiedle na Gutowie</p>
                    </div>
                    <div class="main-investbox-footer">
                        <a href="/pl/i/osiedle-slow/mieszkania" class="bttn bttn-icon">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-4 p-4">
                <div class="main-investbox" style="border:2px solid #ba8b41;border-radius: 10px;">
                    <div class="main-investbox-header">
                        <h2 class="mb-0">OSIEDLE SLOW</h2>
                        <div class="invest-item-city">Olsztyn, ul.Kordeckiego</div>
                    </div>
                    <div class="main-investbox-thumb">
                        <img src="{{ asset('/uploads/files/osiedle-slow/osiedle-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                    </div>
                    <div class="main-investbox-state">
                        OSTATNIE MIESZKANIA
                    </div>
                    <div class="main-investbox-features">
                        <div class="row">
                            <div class="col-4">
                                <div style="width:40px;height:40px;background:black;margin:0 auto;border-radius:4px"></div>
                                <p>35 - 56 m<sup>2</sup></p>
                            </div>
                            <div class="col-4">
                                <div style="width:40px;height:40px;background:black;margin:0 auto;border-radius:4px"></div>
                                <p>2 piętra<br>winda</p>
                            </div>
                            <div class="col-4">
                                <div style="width:40px;height:40px;background:black;margin:0 auto;border-radius:4px"></div>
                                <p>Odbiór Q4 2026</p>
                            </div>
                        </div>
                        <p class="mt-3">Zielone i ekologiczne osiedle na Gutowie</p>
                    </div>
                    <div class="main-investbox-footer">
                        <a href="/pl/i/osiedle-slow/mieszkania" class="bttn bttn-icon">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-4 p-4">
                <div class="main-investbox" style="border:2px solid #ba8b41;border-radius: 10px;">
                    <div class="main-investbox-header">
                        <h2 class="mb-0">OSIEDLE SLOW</h2>
                        <div class="invest-item-city">Olsztyn, ul.Kordeckiego</div>
                    </div>
                    <div class="main-investbox-thumb">
                        <img src="{{ asset('/uploads/files/osiedle-slow/osiedle-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760">
                    </div>
                    <div class="main-investbox-state">
                        OSTATNIE MIESZKANIA
                    </div>
                    <div class="main-investbox-features">
                        <div class="row">
                            <div class="col-4">
                                <div style="width:40px;height:40px;background:black;margin:0 auto;border-radius:4px"></div>
                                <p>35 - 56 m<sup>2</sup></p>
                            </div>
                            <div class="col-4">
                                <div style="width:40px;height:40px;background:black;margin:0 auto;border-radius:4px"></div>
                                <p>2 piętra<br>winda</p>
                            </div>
                            <div class="col-4">
                                <div style="width:40px;height:40px;background:black;margin:0 auto;border-radius:4px"></div>
                                <p>Odbiór Q4 2026</p>
                            </div>
                        </div>
                        <p class="mt-3">Zielone i ekologiczne osiedle na Gutowie</p>
                    </div>
                    <div class="main-investbox-footer">
                        <a href="/pl/i/osiedle-slow/mieszkania" class="bttn bttn-icon">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .main-investbox {
                text-align: center;
            }
            .main-investbox h2 {
                font-size: 36px;
                line-height: 1;
            }
            .main-investbox-header {
                padding: 20px;
            }
            .main-investbox-features {
                padding: 30px 0;
            }
            .main-investbox-features p {
                padding: 0 20px;
                line-height: 1.2;
                margin-top: 10px;
                font-size: 19px;
            }
            .main-investbox-thumb img {
                height: 300px;
            }
            .main-investbox .invest-item-city {
                font-size: 18px;
                font-family: "Georgia",serif;
                font-style: oblique;
                margin-bottom: 0;
            }
            .main-investbox-state {
                margin: -31px auto 0;
                width: 300px;
                background: #b88940;
                color: white;
                font-size: 20px;
                font-weight: 500;
                padding: 11px 0;
                border-radius: 3px;
                z-index: 99;
                position: relative;
            }
            .main-investbox-footer {
                padding: 0 20px 20px;
            }
            .main-investbox-footer .bttn {
                border-radius: 5px;
                width: 100%;
                text-align: center;
                justify-content: center;
            }
        </style>
        @endauth

        <div class="row left-right flex-row-reverse">
            <div data-aos="fade-left" data-aos-offset="400" data-aos-delay="0" class="order-2 order-xl-1 col-12 col-xl-6 d-flex align-items-center">
                @if($current_locale == 'pl')
                <div class="left-right-text current-item">
                    <h2 class="mb-0"><a href="/en/i/osiedle-slow/mieszkania">OSIEDLE SLOW</a></h2>
                    <div class="invest-item-city">Olsztyn, ul.Kordeckiego</div>
                    <p>Osiedle SLOW położone jest w zielonej i malowniczej części Olsztyna, dzielnicy Gutkowo. W ofercie mieszkania z ogródkiem oraz z prywatnym poddaszem o metrażu, nawet do 27 m2. Niska, kameralna zabudowa z windą. Dla mieszkańców powstaną wyjątkowe strefy relaksu – przestrzeń do jogi, boisko wielofunkcyjne oraz wiaty grillowe z miejscami do siedzenia. W sprzedaży mieszkania z różnych etapów inwestycji. Sprawdź szczegóły w biurze sprzedaży.</p>
                    <div class="row mt-3 mt-sm-5">
                        <div class="col-4">
                            <div class="current-stat text-center">
                                <span>117</span>
                                ilość mieszkań
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="current-stat text-center">
                                <span>2</span>
                                liczba pięter
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="current-stat text-center">
                                <span>35-56 m<sup>2</sup></span>
                                powierzchnia
                            </div>
                        </div>
                    </div>
                    <a href="/pl/i/osiedle-slow/mieszkania" class="bttn bttn-icon mt-3 mt-sm-5">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                </div>
                @else
                    <div class="left-right-text current-item">
                        <h2 class="mb-0"><a href="/en/i/osiedle-slow/mieszkania">SLOW ESTATE</a></h2>
                        <div class="invest-item-city">Olsztyn, ul.Kordeckiego</div>
                        <p>The SLOW housing estate is located in the green and picturesque part of Olsztyn, in the Gutkowo district. The offer includes apartments with gardens as well as private attics with an area of up to 27 m². The development features low-rise, intimate buildings with elevators. Residents will enjoy unique relaxation zones – a yoga area, a multifunctional sports field, and barbecue shelters with seating areas. Apartments from various stages of the development are available for sale. Check the details at the sales office.</p>
                        <div class="row mt-3 mt-sm-5">
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>117</span>
                                    apartments
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>2</span>
                                    floors
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>35-56 m<sup>2</sup></span>
                                    square
                                </div>
                            </div>
                        </div>
                        <a href="/pl/i/osiedle-slow/mieszkania" class="bttn bttn-icon mt-3 mt-sm-5">CHECK APARTMENTS <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                @endif
            </div>
            <div data-aos="fade-right" data-aos-offset="400" data-aos-delay="0" class="mb-4 mb-xl-0 order-1 order-xl-2 col-12 col-xl-6">
                <div class="invest-item-thumb">
                    <span class="img-badge">{{ investmentStatus(1) }}</span>
                    <a href="/pl/i/osiedle-slow"><img src="{{ asset('/uploads/files/osiedle-slow/osiedle-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760"></a>
                </div>
            </div>
        </div>

        <div class="row right-left mt-lg-3 mt-5">
            <div data-aos="fade-left" data-aos-offset="400" data-aos-delay="0" class="order-2 order-xl-1 col-12 col-xl-6 d-flex align-items-center">
                @if($current_locale == 'pl')
                    <div class="left-right-text current-item">
                        <h2 class="mb-0"><a href="/pl/i/osiedle-synergia">OSIEDLE SYNERGIA</a></h2>
                        <div class="invest-item-city">Olsztyn ul.Kanta</div>
                        <p>Osiedle SYNERGIA powstanie w samym centrum dzielnicy mieszkaniowej – Jaroty, przy ul. Kanta. W miejscu dawnego sklepu spożywczo-przemysłowego wybudowany zostanie <b>nowoczesny budynek mieszkalny</b> z lokalami handlowo-usługowymi na parterze i <b>garażem podziemnym</b>. W pobliżu osiedla znajduje się <b>wiele punktów handlowo – usługowych</b>, przystanki autobusowe, placówki edukacyjne oraz medyczne. W sprzedaży dostępne są mieszkania -1,-2,-3,-4 pokojowe o metrażu od 27 m<sup>2</sup> do 80 m<sup>2</sup>.</p>
                        <div class="row mt-3 mt-sm-5">
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>95</span>
                                    ilość mieszkań
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>5</span>
                                    liczba pięter
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>27-80 m<sup>2</sup></span>
                                    powierzchnia
                                </div>
                            </div>
                            <div class="col-3 d-none">
                                <div class="current-stat text-center">
                                    <span>Q3 2025</span>
                                    termin oddania
                                </div>
                            </div>
                        </div>
                        <a href="/pl/i/osiedle-synergia" class="bttn bttn-icon mt-3 mt-sm-5">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                @else
                    <div class="left-right-text current-item">
                        <h2 class="mb-0"><a href="/en/i/osiedle-synergia">SYNERGIA ESTATE</a></h2>
                        <div class="invest-item-city">Olsztyn, Kanta Street</div>
                        <p>The SYNERGIA Estate will be built in the heart of the Jaroty residential district, on Kanta Street. A modern residential building with commercial and service premises on the ground floor and an underground garage will replace the former grocery and industrial store. The estate is conveniently located near numerous shops, service points, bus stops, educational institutions, and medical facilities. Available for sale are 1-, 2-, 3-, and 4-room apartments, ranging in size from 27 m<sup>2</sup> to 80 m<sup>2</sup>.</p>
                        <div class="row mt-3 mt-sm-5">
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>95</span>
                                    apartments
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>5</span>
                                    floors
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>27-80 m<sup>2</sup></span>
                                    square
                                </div>
                            </div>
                            <div class="col-3 d-none">
                                <div class="current-stat text-center">
                                    <span>Q3 2025</span>
                                    hand and over date
                                </div>
                            </div>
                        </div>
                        <a href="/en/i/osiedle-synergia" class="bttn bttn-icon mt-3 mt-sm-5">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                @endif
            </div>
            <div data-aos="fade-right" data-aos-offset="400" data-aos-delay="0" class="mb-4 mb-xl-0 order-1 order-xl-2 col-12 col-xl-6">
                <div class="invest-item-thumb">
                    <span class="img-badge">{{ investmentStatus(1) }}</span>
                    <a href="/pl/i/osiedle-synergia"><img src="{{ asset('/uploads/files/synergia/osiedle-synergia-homepage-2.jpg') }}" alt="" class="golden-border w-100" width="840" height="760"></a>
                </div>
            </div>
        </div>

        <div class="row left-right flex-row-reverse">
            <div data-aos="fade-left" data-aos-offset="400" data-aos-delay="0" class="order-2 order-xl-1 col-12 col-xl-6 d-flex align-items-center">
                @if($current_locale == 'pl')
                    <div class="left-right-text current-item">
                        <h2 class="mb-0"><a href="/pl/i/osiedle-tempo/mieszkania">OSIEDLE TEMPO</a></h2>
                        <div class="invest-item-city">Olsztyn ul. Sikorskiego / ul. Wilczyńskiego</div>
                        <p>TEMPO to nowoczesne osiedle, skierowane dla osób aktywnych, które chcą mieć wszędzie blisko. Blisko do komunikacji miejskiej, ścieżek rowerowych i sklepów. Jedyne osiedle w Olsztynie z pakietem Smart Home w standardzie do każdego mieszkania. Metraże mieszkań od 28 – 86 m2, klamki elektroniczne oraz panele fotowoltaiczne do zasilania części wspólnych osiedla. Do dyspozycji mieszkańców dwu poziomowa hala garażowa, obszerna rowerownia oraz komórki lokatorskie. </p>
                        <div class="row mt-3 mt-sm-5">
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>264</span>
                                    ilość mieszkań
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>5</span>
                                    liczba pięter
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>28-86 m<sup>2</sup></span>
                                    powierzchnia
                                </div>
                            </div>
                        </div>
                        <a href="/pl/i/osiedle-tempo/mieszkania" class="bttn bttn-icon mt-3 mt-sm-5">ZOBACZ MIESZKANIA <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                @else
                    <div class="left-right-text current-item">
                        <h2 class="mb-0"><a href="/en/i/osiedle-tempo/mieszkania">TEMPO ESTATE</a></h2>
                        <div class="invest-item-city">Olsztyn ul. Sikorskiego / ul. Wilczyńskiego</div>
                        <p>TEMPO is a modern residential development designed for active people who want to have everything within easy reach—close to public transport, cycling paths, and shops. It is the only estate in Olsztyn that offers a Smart Home package as a standard feature in every apartment. The apartments range from 28 to 86 m², and the estate includes electronic door handles as well as photovoltaic panels that power the common areas. Residents have access to a two-level underground garage, a spacious bicycle room, and individual storage units.</p>
                        <div class="row mt-3 mt-sm-5">
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>264</span>
                                    apartments
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>5</span>
                                    floors
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="current-stat text-center">
                                    <span>28-86 m<sup>2</sup></span>
                                    square
                                </div>
                            </div>
                        </div>
                        <a href="/pl/i/osiedle-tempo/mieszkania" class="bttn bttn-icon mt-3 mt-sm-5">CHECK APARTMENTS <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                @endif
            </div>
            <div data-aos="fade-right" data-aos-offset="400" data-aos-delay="0" class="mb-4 mb-xl-0 order-1 order-xl-2 col-12 col-xl-6">
                <div class="invest-item-thumb">
                    <span class="img-badge">{{ investmentStatus(1) }}</span>
                    <a href="/pl/i/osiedle-tempo/mieszkania"><img src="{{ asset('/uploads/files/tempo/osiedle-tempo.jpg') }}" alt="" class="golden-border w-100" width="840" height="760"></a>
                </div>
            </div>
        </div>

        <div class="row left-right">
            <div data-aos="fade-left" data-aos-offset="400" data-aos-delay="0" class="order-2 order-xl-1 col-12 col-xl-6 d-flex align-items-center">
                @if($current_locale == 'pl')
                    <div class="left-right-text current-item pb-0">
                        <h2 class="mb-3"><a href="http://www.boxolsztyn.pl/" target="_blank">BOX Self Storage</a></h2>
                        <p>BOX self storage to pierwszy w Olsztynie obiekt oferujący nowoczesne, samoobsługowe boksy magazynowe. To idealne rozwiązanie dla osób prywatnych i firm, które potrzebują dodatkowej przestrzeni na przechowanie swoich rzeczy.</p>
                        <p>&nbsp;</p>
                        <p>W ofercie znajdują się boksy o powierzchni od 1 do 20 m², dostępne w elastycznym systemie wynajmu już od 30 dni. Każdy wynajmujący otrzymuje indywidualny kod PIN, który umożliwia dostęp do boksa 24/7 przez cały rok.</p>
                        <p>&nbsp;</p>
                        <p>Obiekt jest bezpieczny i monitorowany, wyposażony w całodobowy system monitoringu oraz zaawansowane zabezpieczenia. Wynajem boksu odbywa się w pełni online – wystarczy wejść na stronę www.boxolsztyn.pl, wybrać odpowiedni boks i rozpocząć przechowywanie.</p>
                        <a href="http://www.boxolsztyn.pl/" target="_blank" class="bttn bttn-icon mt-3 mt-sm-5">ZOBACZ WIĘCEJ <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                @else
                    <div class="left-right-text current-item pb-0">
                        <h2 class="mb-3"><a href="http://www.boxolsztyn.pl/" target="_blank">BOX Self Storage</a></h2>
                        <p>BOX Self Storage is the first facility in Olsztyn offering modern, self-service storage units. It’s an ideal solution for individuals and businesses who need extra space to store their belongings.</p>
                        <p>&nbsp;</p>
                        <p>We offer storage units ranging from 1 to 20 m², available with flexible rental terms starting from just 30 days. Each renter receives a unique PIN code, providing 24/7 access all year round.</p>
                        <p>&nbsp;</p>
                        <p>The facility is safe and fully monitored, equipped with round-the-clock video surveillance and advanced security systems. You can rent your storage unit entirely online – simply visit www.boxolsztyn.pl, choose the right unit, and start storing your items today.</p>
                        <a href="http://www.boxolsztyn.pl/" target="_blank" class="bttn bttn-icon mt-3 mt-sm-5">SEE MORE <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                @endif
            </div>
            <div data-aos="fade-right" data-aos-offset="400" data-aos-delay="0" class="mb-4 mb-xl-0 order-1 order-xl-2 col-12 col-xl-6">
                <div class="invest-item-thumb">
                    <span class="img-badge">{{ investmentStatus(1) }}</span>
                    <a href="http://www.boxolsztyn.pl/" target="_blank"><img src="{{ asset('/uploads/files/box-olsztyn.jpg') }}" alt="" class="golden-border w-100" width="840" height="630"></a>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="pe-3 pe-sm-0 ps-3 ps-sm-0">
    @if($investments_soon->count() > 0)
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                <h2 class="section-title text-uppercase"><span class="text-gold">Już</span> <br>wkrótce</h2>
                @else
                <h2 class="section-title text-uppercase"><span class="text-gold">Soon</span></h2>
                @endif
            </div>
        </div>

        <div class="row justify-content-center mt-0 mt-lg-3">
            @foreach($investments_soon as $r)
                <div class="col-12 col-lg-6">
                    <div class="invest-item-holder">
                        <div class="invest-item position-relative">
                            <span class="img-badge">{{ investmentStatus(4) }}</span>
                            <div class="invest-item-thumb img-overflow">
                                @if($r->developro)
                                    <a href="{{ route('developro.investment.index', $r->slug) }}">
                                        <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                    </a>
                                @else
                                    @if($r->id == 13)
                                        <a href="https://boxolsztyn.pl/" target="_blank"><img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}"></a>
                                    @else
                                        <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                    @endif
                                @endif
                            </div>
                            <div class="invest-item-desc">
                                <div class="invest-item-header">
                                    @if($r->developro)
                                        <h2 class="mb-0">
                                            <a href="{{ route('developro.investment.index', $r->slug) }}">{{ $r->name }}</a>
                                        </h2>
                                    @else
                                        @if($r->id == 13)
                                            <h2 class="mb-0"><a href="https://boxolsztyn.pl/" target="_blank">{{ $r->name }}</a></h2>
                                        @else
                                            <h2 class="mb-0">{{ $r->name }}</h2>
                                        @endif
                                    @endif
                                    @if($r->address)
                                        <div class="invest-item-city">{{ $r->address }}</div>
                                    @else
                                        <div class="invest-item-city"> &nbsp;</div>
                                    @endif
                                </div>
                                @if($r->file_logo)
                                    <img src="{{ asset('investment/logo/'.$r->file_logo) }}" alt="Logo {{ $r->name }}">
                                @endif
                                <p>{!! $r->entry_content !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                <h2 class="section-title text-uppercase"><span class="text-gold">Inwestycje</span> <br>planowane</h2>
                @else
                <h2 class="section-title text-uppercase"><span class="text-gold">Planned </span> <br>investments</h2>
                @endif
            </div>
        </div>
    </div>

    @if($investments_planned->count() > 0)
    <div class="container-fluid">
        <div class="row mt-3" id="plannedCarousel">
            @foreach($investments_planned as $ip)
            <div class="col-12">
                <div class="planned-item row no-gutters">
                    <div class="col-12 col-xxl-8">
                        <div class="img-overflow">
                            @if($ip->developro)
                                <a href="{{ route('developro.investment.index', $ip->slug) }}">
                                    <img src="{{ asset('investment/thumbs/'.$ip->file_thumb) }}" alt="{{ $ip->name }}" class="w-100">
                                </a>
                            @else
                                <img src="{{ asset('investment/thumbs/'.$ip->file_thumb) }}" alt="{{ $ip->name }}" class="w-100">
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-xxl-4">
                        <div class="planned-item-gold">
                            <div class="planned-item-desc">
                                @if($ip->developro)
                                <h2><a href="{{ route('developro.investment.index', $ip->slug) }}">{{ $ip->name }}</a></h2>
                                @else
                                    <h2>{{ $ip->name }}</h2>
                                @endif
                                <p>{!! $ip->entry_content !!}</p>
                                @if($ip->developro)
                                <a href="{{ route('developro.investment.index', $ip->slug) }}" class="bttn-link">@lang('website.button-see-more')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                <h2 class="section-title text-uppercase"><span class="text-gold">Dostępne</span> <br>mieszkania</h2>
                @else
                <h2 class="section-title text-uppercase"><span class="text-gold">Available </span> <br>apartments</h2>
                @endif
            </div>
        </div>
    </div>
    <div class="light-bg pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0 d-none d-sm-block">
                    <div data-aos="fade-up" data-aos-offset="200" data-aos-delay="0" class="main-room">
                        <div class="main-room-header text-center">
                            @if($current_locale == 'pl')
                                <h2 class="poppins"><a href="{{ route('search') }}/?rooms=1&status=1,2">MIESZKANIA <br><b>1 POKOJOWE</b></a></h2>
                            @else
                                <h2 class="poppins"><a href="{{ route('search') }}/?rooms=1&status=1,2">1-room <br><b>APARTMENTS</b></a></h2>
                            @endif

                            <p>@lang('website.property-area'): <span>27 m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="{{ route('search') }}/?rooms=1&status=1,2"><img src="{{ asset('/uploads/files/mieszkania-1-pokoje.jpg') }}" alt="Dostępne mieszkania 1-pokojowe" class="m-auto"></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="{{ route('search') }}/?rooms=1&status=1,2" class="bttn bttn-icon">@lang('website.button-show-properties') <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div data-aos="fade-up" data-aos-offset="200" data-aos-delay="100" class="main-room">
                        <div class="main-room-header text-center">
                            @if($current_locale == 'pl')
                                <h2 class="poppins"><a href="{{ route('search') }}/?rooms=2&status=1,2">MIESZKANIA <br><b>2 POKOJOWE</b></a></h2>
                            @else
                                <h2 class="poppins"><a href="{{ route('search') }}/?rooms=2&status=1,2">2-room <br><b>APARTMENTS</b></a></h2>
                            @endif

                            <p>@lang('website.property-area'): <span>31-40 m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="{{ route('search') }}/?rooms=2&status=1,2"><img src="{{ asset('/uploads/files/mieszkania-2-pokoje.jpg') }}" alt="Dostępne mieszkania 2-pokojowe" class="m-auto"></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="{{ route('search') }}/?rooms=2&status=1,2" class="bttn bttn-icon">@lang('website.button-show-properties') <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div data-aos="fade-up" data-aos-offset="200" data-aos-delay="200" class="main-room">
                        <div class="main-room-header text-center">
                            @if($current_locale == 'pl')
                                <h2 class="poppins"><a href="{{ route('search') }}/?rooms=3&status=1,2">MIESZKANIA <br><b>3 POKOJOWE</b></a></h2>
                            @else
                                <h2 class="poppins"><a href="{{ route('search') }}/?rooms=3&status=1,2">3-room <br><b>APARTMENTS</b></a></h2>
                            @endif

                            <p>@lang('website.property-area'): <span>45–56 m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="{{ route('search') }}/?rooms=3&status=1,2"><img src="{{ asset('/uploads/files/mieszkania-3-pokoje.jpg') }}" alt="Dostępne mieszkania 3-pokojowe" class="m-auto"></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="{{ route('search') }}/?rooms=3&status=1,2" class="bttn bttn-icon">@lang('website.button-show-properties') <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 d-none d-sm-block">
                    <div data-aos="fade-up" data-aos-offset="200" data-aos-delay="300" class="main-room">
                        <div class="main-room-header text-center">
                            @if($current_locale == 'pl')
                                <h2 class="poppins"><a href="{{ route('search') }}/?rooms=4&status=1,2">MIESZKANIA <br><b>4 POKOJOWE</b></a></h2>
                            @else
                                <h2 class="poppins"><a href="{{ route('search') }}/?rooms=4&status=1,2">4-room <br><b>APARTMENTS</b></a></h2>
                            @endif

                            <p>@lang('website.property-area'): <span>58–80 m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="{{ route('search') }}/?rooms=4&status=1,2"><img src="{{ asset('/uploads/files/mieszkania-4-pokoje.jpg') }}" alt="Dostępne mieszkania 4-pokojowe" class="m-auto"></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="{{ route('search') }}/?rooms=4&status=1,2" class="bttn bttn-icon">@lang('website.button-show-properties') <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pe-3 pe-sm-0 ps-3 ps-sm-0">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase"><span class="text-gold">Deweloper</span> <br>godny zaufania</h2>
                @else
                    <h2 class="section-title text-uppercase"><span class="text-gold">A Reliable</span> <br>developer</h2>
                @endif
            </div>
            <div class="col-12 col-lg-6" data-aos="fade-right" data-aos-offset="500">
                <img src="{{ asset('images/deweloper-roku-2024.jpg') }}" alt="Nagroda Deweloper Roku - Ippon Group" width="840" height="600">
            </div>
            <div class="col-12 col-lg-6 d-flex align-items-center" data-aos="fade-left" data-aos-offset="500">
                <div class="section-text ps-0 ps-lg-5 mt-4 mt-lg-0">
                    @if($current_locale == 'pl')
                    <p>Jesteśmy wiodącą firmą deweloperską specjalizującą się w realizacji projektów branży mieszkaniowej oraz komercyjnej. Pięciokrotnie zostaliśmy nagrodzeni tytułem Deweloper Roku. Budujemy mieszkania, apartamenty oraz domy na terenie całego kraju.</p>
                    <p>&nbsp;</p>
                    <p>W naszych projektach wprowadzamy innowacyjne rozwiązania i kreujemy nowe standardy na rynku. Jako jedyny deweloper zaoferowaliśmy apartamenty z ogrodami zimowymi w Olsztynie. Dbamy o jakość użytych materiałów oraz o komfort i funkcjonalność naszych mieszkań.</p>
                    @else
                        <p>We are a leading property development company specializing in residential and commercial projects. We have been awarded the Developer of the Year title five times. We build apartments, condominiums, and houses throughout the country.</p>
                        <p>&nbsp;</p>
                        <p>In our projects, we introduce innovative solutions and set new standards in the market. As the only developer, we have offered apartments with winter gardens in Olsztyn. We prioritize the quality of materials used and the comfort and functionality of our residences.</p>
                    @endif
                    <a href="{{ route('about') }}" class="bttn bttn-icon mt-5">@lang('website.button-see-more') <i class="ms-5 las la-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row flex-row-reverse mt-5 pt-5">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase">Wspieramy Polskich Sportowców</h2>
                @else
                    <h2 class="section-title text-uppercase">We Support Polish Athletes</h2>
                @endif
            </div>
            <div class="col-12 col-xl-6" data-aos="fade-left" data-aos-offset="500">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Oxn9APVs3v0?si=KGZIjUBr5VbI0M8n" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="col-12 col-xl-6 d-flex align-items-center" data-aos="fade-right" data-aos-offset="500">
                <div class="section-text pe-0 pe-xl-5 mt-1 mt-xl-0">
                    @if($current_locale == 'pl')
                        <p>W Ippon Group wierzymy w ludzi, którzy dzięki swojej ambicji, zaangażowaniu i wytrwałości sięgają po wyjątkowe osiągnięcia. Dlatego z dumą wspieramy zarówno osoby pełne pasji, jak i polskich sportowców, którzy każdego dnia udowadniają, że ciężka praca prowadzi do sukcesu.</p>
                        <p>&nbsp;</p>
                        <p>Jednym z nich jest Marcin Tausiewicz – utytułowany zawodnik, wielokrotny Mistrz Polski oraz medalista Mistrzostw Europy i Świata. Współpraca z takimi osobami to dla nas nie tylko wyróżnienie, ale także potwierdzenie, że warto inwestować w ludzi ambitnych i konsekwentnie dążących do celu.</p>
                    @else
                        <p>At Ippon Group, we believe in people who, through their ambition, commitment, and perseverance, achieve exceptional results. That’s why we are proud to support both passionate individuals and Polish athletes who prove every day that hard work leads to success.</p>
                        <p>&nbsp;</p>
                        <p>One of them is Marcin Tausiewicz – an accomplished competitor, multiple-time Polish Champion, and a medalist at the European and World Championships. Working with such individuals is not only an honor for us, but also a confirmation that it is worth investing in ambitious people who consistently strive toward their goals.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="numbers">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="number">
                        <div class="number-icon">
                            <img src="{{ asset('/images/icons/wysoka-jakosc-icon.png') }}" alt="" width="170" height="170">
                        </div>
                        <div class="number-value"><span data-value="92">92</span>%</div>
                        <div class="number-text">
                            <p>@lang('website.numbers-text-1')</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="number">
                        <div class="number-icon">
                            <img src="{{ asset('/images/icons/polecenie-zakupu-icon.png') }}" alt="" width="170" height="170">
                        </div>
                        <div class="number-value"><span data-value="95">95</span>%</div>
                        <div class="number-text">
                            <p>@lang('website.numbers-text-2')</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="number">
                        <div class="number-icon">
                            <img src="{{ asset('/images/icons/atrakcyjna-lokalizacja.png') }}" alt="" width="170" height="170">
                        </div>
                        <div class="number-value"><span data-value="97">97</span>%</div>
                        <div class="number-text">
                            <p>@lang('website.numbers-text-3')</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="number">
                        <div class="number-icon">
                            <img src="{{ asset('/images/icons/oddane-mieszkania-icon.png') }}" alt="" width="170" height="170">
                        </div>
                        <div class="number-value"><span data-value="100">100</span>%</div>
                        <div class="number-text">
                            <p>@lang('website.numbers-text-4')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="d-none d-xxl-block">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase"><span class="text-gold">Opinie</span> <br>klientów</h2>
                @else
                    <h2 class="section-title text-uppercase"><span class="text-gold">Clients </span> <br>opinions</h2>
                @endif
            </div>
        </div>
    </div>

    <div id="reviewCarousel" class="container-fluid">
        <div class="row">
            @foreach($reviews as $review)
            <div class="col-3">
                <div class="review">
                    <img src="{{ asset('images/quote.svg') }}" alt="Opinia klienta" class="review-quote">
                    <div class="review-name">{{ $review->author }}</div>
                    <div class="review-star">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <img src="{{ asset('images/quote-star.svg') }}" alt="Filled Rate icon">
                            @else
                                <img src="{{ asset('images/quote-star.svg') }}" alt="Empty Rate icon">
                            @endif
                        @endfor
                    </div>

                    <div class="review-content">
                        {!! $review->content !!}
                    </div>
                    <div class="review-source">
                        {!! reviewType($review->type) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase"><span class="text-gold">Poznaj</span> <br>nas lepiej</h2>
                @else
                    <h2 class="section-title text-uppercase"><span class="text-gold">Know </span> <br>us better</h2>
                @endif
            </div>
        </div>
    </div>

    <div id="awardsCarousel" class="container-fluid">
        <div class="row">
            @foreach($awards as $award)
                <div class="col-4">
                    <div class="award">
                        <img src="{{asset('/uploads/awards/'.$award->file) }}" alt="">
                        <h3>{{ $award->name }}</h3>
                        {!! $award->text !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase"><span class="text-gold">Aktualności</span></h2>
                @else
                    <h2 class="section-title text-uppercase"><span class="text-gold">News</span></h2>
                @endif
            </div>
        </div>
    </div>

    <div id="mainNews" class="container-fluid news-list">
        <div class="row">
            @foreach($news as $n)
            <div class="col-4">
                <article class="border-article">
                    <div class="article-thumb">
                        <span class="article-date">{{ $n->date }}</span>
                        @if($n->file)
                            <a href="{{route('front.articles.show', $n->slug)}}">
                                <picture>
                                    <source type="image/webp" srcset="{{asset('/uploads/news/thumbs/webp/'.$n->file_webp) }}">
                                    <source type="image/jpeg" srcset="{{asset('/uploads/news/thumbs/'.$n->file) }}">
                                    <img src="{{asset('/uploads/news/thumbs/'.$n->file) }}" alt="{{ $n->title }}" width="700" height="394">
                                </picture>
                            </a>
                        @endif
                        <div class="img-gradient"></div>
                    </div>
                    <div class="article-content">
                        <h2><a href="{{route('front.articles.show', $n->slug)}}">{{ $n->title }}</a></h2>
                        <p>{{ $n->content_entry }}.</p>
                        <a href="{{route('front.articles.show', $n->slug)}}" class="bttn-link">@lang('website.button-see-more')</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="container pt-5">
    <div class="row">
        <div class="col-12 text-center">
            @if($current_locale == 'pl')
                <h2 class="section-title text-uppercase"><span class="text-gold">Masz pytania?</span> <br>Napisz do nas!</h2>
            @else
                <h2 class="section-title text-uppercase"><span class="text-gold">Have more questions?</span> <br>Write to us!</h2>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            @include('front.contact.form', [ 'page_name' => 'Strona główna'])
        </div>
    </div>
</div>
@endif

{{-- ==========================================================================
     NOWA STRONA GLOWNA — makieta Figma 2026
     Etap 1: hero + wyszukiwarka (statyczny szablon, bez podpiecia danych)
     ========================================================================== --}}

{{-- Hero leci z CMS-u (Admin > Slider). Kazdy slajd ma seria kadrow z
     SliderService, komponent <x-slider-picture> sklada z nich <picture>. --}}
@php
    /* Slajd bez pliku na dysku pomijamy — inaczej karuzela dostaje pusty kadr
       i "przewija" w nicosc. Gdy nie zostanie zaden (pusty slider albo lokalna
       kopia bazy bez zdjec), wchodzi zestaw z makiety. */
    $heroSlides = $sliders
        ->filter(fn ($s) => $s->file && is_file(public_path('uploads/slider/'.$s->file)))
        ->map(function ($s) {
            $thumb = 'uploads/slider/thumbs/'.$s->file;

            return [
                'slider' => $s,
                'thumb'  => asset(is_file(public_path($thumb)) ? $thumb : 'uploads/slider/'.$s->file),
                'link'   => $s->link,
                'target' => $s->link_target ?: '_self',
            ];
        })
        ->values()
        ->all();

    if (!$heroSlides) {
        /* UWAGA: placeholder — zdjecia z makiety, widoczne tylko gdy slider w CMS
           jest pusty. Na produkcji powinien go przykryc material klienta. */
        $heroSlides = array_map(fn ($n) => [
            'slider' => null,
            'img'    => asset('images/homepage/hero-'.$n.'.jpg'),
            'thumb'  => asset('images/homepage/hero-thumb-'.$n.'.jpg'),
            'link'   => null,
            'target' => '_self',
        ], [1, 2, 3]);
    }
@endphp

<section class="ip-hero">
    <div id="ipHero" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner">
            @foreach ($heroSlides as $i => $slide)
                <div class="carousel-item @if($i === 0) active @endif" data-thumb="{{ $slide['thumb'] }}">
                    @if($slide['link'])
                        <a href="{{ $slide['link'] }}" target="{{ $slide['target'] }}">
                    @endif

                    @if($slide['slider'])
                        <x-slider-picture :slider="$slide['slider']" :eager="$i === 0" />
                    @else
                        <img src="{{ $slide['img'] }}" alt="Inwestycja IPPON Group"
                             fetchpriority="{{ $i === 0 ? 'high' : 'low' }}" decoding="async">
                    @endif

                    @if($slide['link'])
                        </a>
                    @endif
                </div>
            @endforeach
        </div>

        {{-- miniatura zapowiada NASTEPNY slajd, wiec startuje od drugiego.
             Przy jednym slajdzie nie ma czego zapowiadac. --}}
        @if(count($heroSlides) > 1)
            <button type="button" class="ip-hero-next" data-bs-target="#ipHero" data-bs-slide="next" aria-label="Następna inwestycja">
                <img data-ip-thumb src="{{ $heroSlides[1]['thumb'] }}" alt="">
                <svg class="ip-hero-next-arrow" viewBox="0 0 56 82" aria-hidden="true">
                    <polyline points="8,6 48,41 8,76"/>
                </svg>
            </button>
        @endif
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var carousel = document.getElementById('ipHero');
        if (!carousel) return;

        var items = carousel.querySelectorAll('.carousel-item');
        var thumb = carousel.querySelector('[data-ip-thumb]');
        if (!thumb || items.length < 2) return;

        // podgrzewamy cache, zeby podmiana byla natychmiastowa
        Array.prototype.forEach.call(items, function (item) {
            if (item.dataset.thumb) new Image().src = item.dataset.thumb;
        });

        carousel.addEventListener('slide.bs.carousel', function (event) {
            var next = items[(event.to + 1) % items.length];
            if (!next || !next.dataset.thumb) return;

            thumb.classList.add('is-changing');
            window.setTimeout(function () {
                thumb.src = next.dataset.thumb;
                thumb.classList.remove('is-changing');
            }, 220);
        });
    });
</script>

{{-- Pasek filtrow: byla tu atrapa (bootstrapowy dropdown i action="#").
     Teraz ten sam komponent co w wyszukiwarce — wybor leci GET-em na
     /wyszukiwarka, a opcje pochodza z realnej oferty. --}}
    <x-property-filter
        :investments="$filterInvestments"
        :rooms="$filterRooms"
        :floors="$filterFloors"
        :areas="$filterAreas"
    />

{{-- Inwestycje w sprzedazy --}}
@php
    /* Zdjecie kafla: naglowek inwestycji, potem miniatura. Sprawdzamy plik na
       dysku, bo czesc rekordow z CMS-u nie ma odpowiednikow w lokalnej kopii. */
    $ipCardPhoto = function ($inv) {
        foreach ([['investment/thumbs', $inv->file_thumb], ['investment/header', $inv->file_header]] as [$dir, $file]) {
            if ($file && is_file(public_path($dir.'/'.$file))) {
                return asset($dir.'/'.$file);
            }
        }
        return null;
    };

    /* "35-36, 49-56" (zakresy dla wyszukiwarki) -> "35-56 m2" na kaflu. */
    $ipAreaRange = function ($range) {
        preg_match_all('/\d+(?:[.,]\d+)?/', (string) $range, $m);

        if (empty($m[0])) {
            return null;
        }

        $values = array_map(fn ($v) => (float) str_replace(',', '.', $v), $m[0]);
        $min = (int) floor(min($values));
        $max = (int) ceil(max($values));

        return ($min === $max ? $min : $min.'-'.$max).' m&sup2;';
    };

    /* Kafle z modulu Boksy (admin). Gdy tabela jest jeszcze pusta, te same kafle
       buduje ze starych inwestycji — sekcja nie znika przed wgraniem danych.
       Pole bez tlumaczenia EN spada do PL. `area` to HTML (&sup2; ze starych
       inwestycji), wiec metraz z boksu jest escapowany juz tutaj. */
    $ipSaleLang = $current_locale == 'en' ? 'en' : 'pl';
    $ipSaleT = fn ($m, $f) => $m->getTranslation($f, $ipSaleLang, false) ?: $m->getTranslation($f, 'pl', false);

    $ipSaleCards = $boxes->isNotEmpty()
        ? $boxes->map(fn ($b) => [
            'photo'            => ($b->file && is_file(public_path('uploads/boxes/'.$b->file))) ? asset('uploads/boxes/'.$b->file) : null,
            'photo_webp'       => ($b->file_webp && is_file(public_path('uploads/boxes/webp/'.$b->file_webp))) ? asset('uploads/boxes/webp/'.$b->file_webp) : null,
            'badge'            => $ipSaleT($b, 'badge'),
            'location'         => $ipSaleT($b, 'location'),
            'name'             => $ipSaleT($b, 'name'),
            'desc'             => $ipSaleT($b, 'description'),
            'area'             => $b->area ? e($b->area) : null,
            'handover'         => $ipSaleT($b, 'handover'),
            'advantage'        => $ipSaleT($b, 'advantage'),
            'link_apartments'  => $ipSaleT($b, 'link_apartments'),
            'link_description' => $ipSaleT($b, 'link_description'),
        ])
        : $investments_current->map(function ($inw) use ($ipCardPhoto, $ipAreaRange, $cities) {
            $city = $cities->firstWhere('id', $inw->city);

            return [
                'photo'            => $ipCardPhoto($inw),
                'photo_webp'       => null,
                'badge'            => $inw->card_badge,
                'location'         => $inw->address ?: optional($city)->name,
                'name'             => $inw->name,
                'desc'             => $inw->entry_content ? excerpt($inw->entry_content, 120) : null,
                'area'             => $ipAreaRange($inw->area_range),
                'handover'         => $inw->date_end,
                'advantage'        => $inw->card_param,
                'link_apartments'  => route('developro.investment.plan', $inw->slug),
                'link_description' => route('developro.investment.index', $inw->slug),
            ];
        });
@endphp

<section class="ip-section">
    <div class="container">

        <x-section-head>{{ $current_locale == 'pl' ? 'Inwestycje w sprzedaży' : 'Developments for Sale' }}</x-section-head>

        {{-- Wszystkie kafle tej samej wielkosci (wiekszy wygladalby na promowany),
             niepelny ostatni rzad wysrodkowany pod pelnymi — 5 inwestycji = 3 + 2. --}}
        <div class="row ip-cards-row justify-content-center">

            @foreach ($ipSaleCards as $card)
                <div class="col-12 col-md-6 col-xl-4">
                    <article class="ip-card">

                        <div class="ip-card-media">
                            {{-- obrazek prowadzi do opisu, gdy link jest; dla czytnikow ekranu
                                 wystarczy link w nazwie, stad tabindex/aria-hidden --}}
                            @if($card['link_description'])
                                <a href="{{ $card['link_description'] }}" class="ip-card-media-link" tabindex="-1" aria-hidden="true">
                            @endif
                            @if($card['photo'] && $card['photo_webp'])
                                {{-- WebP z uploadu boksu, oryginalny plik jako fallback --}}
                                <picture>
                                    <source srcset="{{ $card['photo_webp'] }}" type="image/webp">
                                    <img src="{{ $card['photo'] }}" alt="{{ $card['name'] }}" loading="lazy" decoding="async">
                                </picture>
                            @elseif($card['photo'])
                                <img src="{{ $card['photo'] }}" alt="{{ $card['name'] }}" loading="lazy" decoding="async">
                            @endif
                            @if($card['link_description'])
                                </a>
                            @endif

                            {{-- napis na obrazku (Boksy: "Napis na obrazku"); puste = bez plakietki --}}
                            @if($card['badge'])
                                <span class="ip-card-badge">{{ $card['badge'] }}</span>
                            @endif
                        </div>

                        <div class="ip-card-body">
                            <h3 class="ip-card-title">
                                @if($card['link_description'])
                                    <a href="{{ $card['link_description'] }}">{{ $card['name'] }}</a>
                                @else
                                    {{ $card['name'] }}
                                @endif
                            </h3>
                            @if($card['location'])
                                <span class="ip-card-address mt-2">{{ $card['location'] }}</span>
                            @endif

                            @if($card['desc'])
                                <p class="ip-card-desc">{{ $card['desc'] }}</p>
                            @endif

                            {{-- Parametry pokazujemy tylko te, ktore klient wypelnil w CMS-ie —
                                 kafel z pustym wierszem wyglada gorzej niz kafel krotszy. --}}
                            @php $area = $card['area']; @endphp
                            @if($area || $card['handover'] || $card['advantage'])
                                <ul class="ip-card-params list-unstyled mb-0">
                                    @if($area)
                                        <li>
                                            <svg viewBox="0 0 29 29" fill="none" aria-hidden="true"><path d="M25.375 1.8125H3.625C2.62812 1.8125 1.8125 2.62812 1.8125 3.625V25.375C1.8125 26.3719 2.62812 27.1875 3.625 27.1875H17.2188V25.375C17.2188 22.8375 19.2125 20.8438 21.75 20.8438V19.0312C18.2156 19.0312 15.4062 21.8406 15.4062 25.375H12.6875V21.75H10.875V25.375H3.625V3.625H10.875V16.3125H12.6875V11.7812H16.3125V9.96875H12.6875V3.625H25.375V9.96875H21.75V11.7812H25.375V25.375H21.75V27.1875H25.375C26.3719 27.1875 27.1875 26.3719 27.1875 25.375V3.625C27.1875 2.62812 26.3719 1.8125 25.375 1.8125Z" fill="currentColor"/></svg>
                                            {!! $area !!}
                                        </li>
                                    @endif

                                    @if($card['handover'])
                                        <li>
                                            <svg viewBox="0 0 29 29" fill="none" aria-hidden="true"><path d="M23.5625 3.625H19.9375V1.8125H18.125V3.625H10.875V1.8125H9.0625V3.625H5.4375C4.44062 3.625 3.625 4.44062 3.625 5.4375V23.5625C3.625 24.5594 4.44062 25.375 5.4375 25.375H23.5625C24.5594 25.375 25.375 24.5594 25.375 23.5625V5.4375C25.375 4.44062 24.5594 3.625 23.5625 3.625ZM23.5625 23.5625H5.4375V10.875H23.5625V23.5625ZM23.5625 9.0625H5.4375V5.4375H9.0625V7.25H10.875V5.4375H18.125V7.25H19.9375V5.4375H23.5625V9.0625Z" fill="currentColor"/></svg>
                                            {{ $current_locale == 'pl' ? 'Odbiór: ' : 'Handover: ' }}{{ $card['handover'] }}
                                        </li>
                                    @endif

                                    @if($card['advantage'])
                                        <li>
                                            <svg viewBox="0 0 29 29" fill="none" aria-hidden="true"><path d="M3.625 25.375H25.375M6.04167 25.375V8.45833L15.7083 3.625V25.375M22.9583 25.375V13.2917L15.7083 8.45833M10.875 10.875V10.8871M10.875 14.5V14.5121M10.875 18.125V18.1371M10.875 21.75V21.7621" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            {{ $card['advantage'] }}
                                        </li>
                                    @endif
                                </ul>
                            @endif

                            @if($card['link_apartments'] || $card['link_description'])
                                <div class="ip-card-actions">
                                    @if($card['link_apartments'])
                                        <a href="{{ $card['link_apartments'] }}" class="ip-btn-outline">
                                            {{ $current_locale == 'pl' ? 'Zobacz mieszkania' : 'See apartments' }}
                                        </a>
                                    @endif
                                    @if($card['link_description'])
                                        <a href="{{ $card['link_description'] }}" class="ip-btn-outline">
                                            {{ $current_locale == 'pl' ? 'Opis inwestycji' : 'About the project' }}
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>

                    </article>
                </div>
            @endforeach

        </div>
    </div>
</section>


{{-- Nadchodzace projekty: inwestycje ze statusem "Juz wkrotce" (status 4).
     W makiecie jest jeden blok — przy kilku rekordach ukladaja sie w pionie. --}}
@if($investments_soon->count() > 0)
<section class="ip-section pb-0 pt-0">
    <div class="container">
        <x-section-head>
            {{ $current_locale == 'pl' ? 'Przyszłość pisana komfortem.' : 'A future written in comfort.' }}
                <span>{{ $current_locale == 'pl' ? 'Nadchodzące projekty' : 'Upcoming projects' }}</span>
        </x-section-head>
    </div>

    @foreach($investments_soon as $inv)
        @php
            $photo = $ipCardPhoto($inv);
            $large = investmentLargeImage($inv, 'list');
            $city  = $cities->firstWhere('id', $inv->city);
        @endphp

        <div class="ip-split">
            <div class="row g-0">
                <div class="col-12 col-lg-8">
                    <div class="ip-split-media">
                        @if($large)
                            @include('front.developro.partials.large-picture', ['img' => $large, 'alt' => $inv->name])
                        @elseif($photo)
                            <img src="{{ $photo }}" alt="{{ $inv->name }}" loading="lazy" decoding="async">
                        @endif
                        @if($city)
                            <span class="ip-city-badge">{{ $city->name }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="ip-split-panel">
                        <span class="ip-split-badge">{{ $current_locale == 'pl' ? 'Już wkrótce' : 'Coming soon' }}</span>
                        <h3 class="ip-split-title">{{ $inv->name }}</h3>
                        <hr class="ip-rule">

                        @if($inv->entry_content)
                            <p class="ip-split-desc">{{ excerpt($inv->entry_content, 140) }}</p>
                        @endif

                        @if($inv->developro)
                            <a href="{{ route('developro.investment.index', $inv->slug) }}" class="ip-btn-ghost">
                                {{ $current_locale == 'pl' ? 'Zobacz więcej' : 'See more' }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
@endif

{{-- Dlaczego warto nam zaufac --}}
<section class="ip-section ip-trust-section @if($investments_soon->count() == 0) pt-0 @endif">
    <div class="container">
        <x-section-head>
            Bezpieczeństwo transakcji, bezkompromisowa jakość.
                <span>Dlaczego warto nam zaufać?</span>
        </x-section-head>

        {{-- UWAGA: zdjecia to placeholdery (kadry z wizualizacji inwestycji).
             Do podmiany na zdjecia stockowe pasujace do opisow. --}}
        @php
            $zaufanie = [
                [
                    'img'   => 'trust-card-1.jpg',
                    'title' => 'Certyfikat jakości IPPON',
                    'desc'  => 'Autorski standard oparty na bezkompromisowym wyborze materiałów najwyższej jakości',
                ],
                [
                    'img'   => 'trust-card-2.jpg',
                    'title' => 'Technologia w służbie komfortu',
                    'desc'  => 'Wprowadzamy standardy jutra: zaawansowane systemy automatyki domowej, ekologiczne panele fotowoltaiczne redukujące koszty eksploatacji oraz architekturę dbającą o naturalne doświetlenie',
                ],
                [
                    'img'   => 'trust-card-3.jpg',
                    'title' => 'Pewność, której możesz zaufać',
                    'desc'  => 'Wszystkie inwestycje realizujemy terminowo, opierając się na silnym zapleczu kapitałowym. Kupując mieszkanie od Ippon Group, zyskujesz pełne bezpieczeństwo transakcji',
                ],
            ];
        @endphp

        <div class="row ip-cards-row">
            @foreach ($zaufanie as $item)
                <div class="col-12 col-md-6 col-xl-4">
                    <article class="ip-trust-card" tabindex="0">
                        <img src="{{ asset('images/homepage/'.$item['img']) }}" alt="{{ $item['title'] }}">
                        <div class="ip-trust-card-body">
                            <h3>{{ $item['title'] }}</h3>
                            <div class="ip-trust-card-desc">
                                <p>{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Inwestycje planowane: status "Planowana" (status 3) z CMS-u.
     Apla stoi nieruchomo — przesuwaja sie tylko zdjecia, a tresc apli
     podmienia sie z data-* aktywnego slajdu. --}}
@php
    /* Slajd bez zdjecia wypadlby jako czarna dziura w karuzeli. */
    $ipPlannedSlides = $investments_planned->filter(fn ($inv) => investmentLargeImage($inv, 'slide') || $ipCardPhoto($inv) !== null)->values();
@endphp

@if($ipPlannedSlides->count() > 0)
<section class="ip-section pt-0">
    <div class="container">
        <x-section-head>{{ $current_locale == 'pl' ? 'Sprawdź inwestycje planowane' : 'Explore planned investments' }}</x-section-head>
    </div>

    <div id="ipPlanned" class="carousel slide ip-banner" data-bs-ride="carousel" data-bs-interval="7000">

        <div class="carousel-inner">
            @foreach ($ipPlannedSlides as $i => $inv)
                @php
                    $city = $cities->firstWhere('id', $inv->city);
                    $desc = $inv->entry_content ? excerpt($inv->entry_content, 140) : '';
                    $sub  = $current_locale == 'pl' ? 'Inwestycja w przygotowaniu' : 'Investment in preparation';
                @endphp

                <div class="carousel-item @if($i === 0) active @endif"
                     data-city="{{ $city->name ?? '' }}"
                     data-title="{{ $inv->name }}"
                     data-sub="{{ $sub }}"
                     data-desc="{{ $desc }}"
                     data-url="{{ $inv->developro ? route('developro.investment.index', $inv->slug) : '' }}">
                    @php $large = investmentLargeImage($inv, 'slide'); @endphp
                    @if($large)
                        @include('front.developro.partials.large-picture', ['img' => $large, 'alt' => $inv->name])
                    @else
                        <img src="{{ $ipCardPhoto($inv) }}" alt="{{ $inv->name }}" loading="lazy" decoding="async">
                    @endif
                    {{-- badge miasta jedzie razem ze zdjeciem --}}
                    @if($city)
                        <span class="ip-city-badge">{{ $city->name }}</span>
                    @endif
                </div>
            @endforeach
        </div>

        @php
            $ipFirst = $ipPlannedSlides->first();
            $ipFirstCity = $cities->firstWhere('id', $ipFirst->city);
            $ipFirstUrl = $ipFirst->developro ? route('developro.investment.index', $ipFirst->slug) : '';
        @endphp

        <div class="ip-banner-bar">
            <button type="button" class="ip-banner-nav" data-bs-target="#ipPlanned" data-bs-slide="prev" aria-label="Poprzednia inwestycja">
                <svg viewBox="0 0 18 15" aria-hidden="true"><polyline points="7,1 1,7.5 7,14"/><line x1="1" y1="7.5" x2="17" y2="7.5"/></svg>
            </button>

            <div class="ip-banner-swap">
                <div class="ip-banner-title">
                    <h3>
                        <span data-ip-title>{{ $ipFirst->name }}</span>
                        <span class="ip-banner-sub" data-ip-sub>{{ $current_locale == 'pl' ? 'Inwestycja w przygotowaniu' : 'Investment in preparation' }}</span>
                    </h3>
                </div>

                <div class="ip-banner-text">
                    <p data-ip-desc>{{ $ipFirst->entry_content ? excerpt($ipFirst->entry_content, 140) : '' }}</p>
                </div>
            </div>

            <a href="{{ $ipFirstUrl ?: '#' }}" class="ip-banner-btn" data-ip-url @if(!$ipFirstUrl) hidden @endif>
                {{ $current_locale == 'pl' ? 'Zobacz więcej' : 'See more' }}
            </a>

            <button type="button" class="ip-banner-nav" data-bs-target="#ipPlanned" data-bs-slide="next" aria-label="Następna inwestycja">
                <svg viewBox="0 0 18 15" aria-hidden="true"><polyline points="11,1 17,7.5 11,14"/><line x1="1" y1="7.5" x2="17" y2="7.5"/></svg>
            </button>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var carousel = document.getElementById('ipPlanned');
        if (!carousel) return;

        var swap  = carousel.querySelector('.ip-banner-swap');
        var link  = carousel.querySelector('[data-ip-url]');
        var slots = {
            title: carousel.querySelector('[data-ip-title]'),
            sub:   carousel.querySelector('[data-ip-sub]'),
            desc:  carousel.querySelector('[data-ip-desc]')
        };

        carousel.addEventListener('slide.bs.carousel', function (event) {
            var data = event.relatedTarget.dataset;

            if (swap) swap.classList.add('is-changing');

            window.setTimeout(function () {
                Object.keys(slots).forEach(function (key) {
                    if (slots[key] && typeof data[key] !== 'undefined') {
                        slots[key].textContent = data[key];
                    }
                });

                /* Inwestycja bez wlasnej podstrony (developro = 0) nie ma dokad
                   linkowac — wtedy chowamy przycisk zamiast dawac martwy '#'. */
                if (link) {
                    link.href = data.url || '#';
                    link.hidden = !data.url;
                }

                if (swap) swap.classList.remove('is-changing');
            }, 250);
        });
    });
</script>

@endif

{{-- Boksy samoobslugowe --}}
<section class="ip-section pt-0">
    <div class="ip-full">
        <div class="row g-0">
            <div class="col-12 col-lg-7 col-xl-8">
                <div class="ip-split-media h-100">
                    <img src="{{ asset('images/homepage/boksy.jpg') }}" alt="Boksy samoobsługowe 24/7">
                </div>
            </div>
            <div class="col-12 col-lg-5 col-xl-4">
                <div class="ip-boxes-panel">
                    <h2>
                        Jedyne w Olsztynie
                        <span class="text-gold">boksy samoobsługowe</span>
                        czynne 24/7
                    </h2>
                    <hr class="ip-rule">
                    <p>Bezpiecznie przechowuj swoje rzeczy dokładnie wtedy, kiedy tego potrzebujesz. Dostęp do boksów masz o każdej porze – szybko, wygodnie i bez zbędnych formalności</p>
                    {{-- Boksy maja wlasny serwis, nie karte inwestycji w CMS-ie --}}
                    <a href="https://boxolsztyn.pl/" target="_blank" rel="noopener" class="ip-btn-gold-lg">Sprawdź box</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Aktualnosci: te same kafle co na /aktualnosci (front.news.ip-card),
     zeby zajawka i data mialy jedno miejsce do poprawiania. --}}
@if($news->count() > 0)
<section class="ip-section pt-0">
    <div class="container">
        <x-section-head>{{ $current_locale == 'pl' ? 'Aktualności z życia IPPON GROUP' : 'News from IPPON GROUP' }}</x-section-head>

        <div class="row ip-cards-row">
            @foreach ($news as $post)
                <div class="col-12 col-md-6 col-xl-4">
                    @include('front.news.ip-card', ['news' => $post])
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Kontakt --}}
<section class="ip-section pt-0">
    <div class="container">
        <x-section-head>Porozmawiajmy o Twoim nowym mieszkaniu</x-section-head>

        <div class="row ip-cards-row align-items-start">

            <div class="col-12 col-lg-6">
                <p class="ip-contact-lead">
                    Wyjątkowe inwestycje wymagają dedykowanej opieki. Jeśli chcesz poznać szczegóły naszych projektów,
                    umówić się na prezentację apartamentu lub zapytać o niestandardowe rozwiązania –
                    <strong>jesteśmy do Twojej dyspozycji.</strong>
                </p>

                <div class="ip-contact-sep"></div>

                <div class="ip-contact-cols">
                    <ul class="ip-contact-list list-unstyled mb-0">
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            ul. Żelazna 4
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="13" r="8"/><polyline points="12,9 12,13 15,15"/><line x1="5" y1="3" x2="2" y2="6"/><line x1="19" y1="3" x2="22" y2="6"/></svg>
                            pn.–pt. 9:00–17:00
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
                            <a href="tel:+48724222323">+48 724 222 323</a>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
                            <a href="tel:+48609084219">+48 609 084 219</a>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16"/><polyline points="2,6 12,13 22,6"/></svg>
                            <a href="mailto:mieszkania@ippon.group">mieszkania@ippon.group</a>
                        </li>
                    </ul>

                    <div class="ip-contact-people">
                        <div class="ip-person">
                            <strong>Elżbieta Kalinowska</strong>
                            <a href="mailto:e.kalinowska@ippon.group">e.kalinowska@ippon.group</a>
                            <a href="tel:+48724222323">+48 724 222 323</a>
                        </div>
                        <div class="ip-person">
                            <strong>Iwona Schubert</strong>
                            <a href="mailto:i.schubert@ippon.group">i.schubert@ippon.group</a>
                            <a href="tel:+48609884219">+48 609 884 219</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                {{-- Formularz byl makieta (action="#"), teraz idzie ten sam komponent
                     co na podstronach: te same pola, RODO i recaptcha. --}}
                @include('front.contact.ip-form', ['page_name' => 'Strona główna'])
            </div>

        </div>
    </div>
</section>

@endsection
