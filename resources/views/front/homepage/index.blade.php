@extends('layouts.homepage', ['body_class' => 'homepage'])

@section('content')

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
                <h2 class="section-title text-uppercase"><span class="text-gold">Poznaj inwestycje</span> <br>w sprzedaży</h2>
                @else
                <h2 class="section-title text-uppercase"><span class="text-gold">Discover investments</span> <br>on sale</h2>
                @endif
            </div>
        </div>

        <div class="row left-right flex-row-reverse">
            <div data-aos="fade-left" data-aos-offset="400" data-aos-delay="0" class="order-2 order-xl-1 col-12 col-xl-6 d-flex align-items-center">
                @if($current_locale == 'pl')
                <div class="left-right-text current-item">
                    <h2 class="mb-0"><a href="/pl/i/osiedle-slow/mieszkania">OSIEDLE SLOW - nowy etap już w sprzedaży</a></h2>
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
                    <a href="/pl/i/osiedle-slow/mieszkania"><img src="{{ asset('/uploads/files/osiedle-slow/osiedle-slow.jpg') }}" alt="" class="golden-border w-100" width="840" height="760"></a>
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
                    <a href="/pl/i/osiedle-synergia"><img src="{{ asset('/uploads/files/synergia/osiedle-synergia-homepage.jpg') }}" alt="" class="golden-border w-100" width="840" height="760"></a>
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
@endsection
