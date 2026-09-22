@extends('layouts.page', ['body_class' => 'ip-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

{{-- ==== STARY KOD — wylaczony, do usuniecia po odbiorze ==== --}}
@if(1 == 2)
@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <section class="p-0">
        <div class="container">
            <div class="row left-right">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        @if($current_locale == 'pl')
                        <h2>Czas buduje wartość.</h2>
                        <p>Ippon Group Sp. z o.o. działa na rynku od 2017 roku, zaś jej spółki zależne od 2013 roku. Początkowo zajmowaliśmy się budową i wynajmem powierzchni handlowo-usługowych. W ciągu kolejnych kilku lat rozszerzyliśmy swoją działalność również o branżę deweloperską. Intensywny rozwój działalności w różnych projektach wymógł na nas stworzenie jednej wiodącej marki jaką stała się Spółka Ippon Group. Większościowym i dominującym udziałowcem IPPON GROUP jest luksemburski fundusz inwestycyjny <b>ALFA 1 CEE INVESTMENTS S.A., SICAV-SIF</b>. Pozostała część udziałów należy do członków Zarządu Spółki Ippon Group.</p>
                        <p>&nbsp;</p>
                        <p>Założyciele firmy już w chwili tworzeniu mogli się pochwalić swoim doświadczeniem w branży, dzięki czemu dziś Ippon Group rozwija się dynamicznie i konsekwentnie realizuje założoną strategię. Główny nacisk firma kładzie na ekologię, zaawansowane rozwiązania i jakość.</p>
                        @else
                        <h2>Time builds value.</h2>
                        <p>Ippon Group Sp. z o.o. has been operating in the market since 2017, while its subsidiaries have been operating since 2013. Initially, we were involved in the construction and leasing of commercial and service premises. Over the next few years, we expanded our business to include the development industry as well. The intensive development of activities in various projects necessitated the creation of a leading brand, which became Ippon Group Company. The majority and controlling shareholder of Ippon Group is the Luxembourg-based investment fund <b>ALFA 1 CEE INVESTMENTS S.A., SICAV-SIF</b>. The remaining shares are held by members of the Management Board of Ippon Group.</p>
                        <p>&nbsp;</p>
                        <p>The founders of the company were already able to boast of their experience in the industry at the time of its creation, which is why today Ippon Group is growing dynamically and consistently implementing its established strategy. The company places a primary emphasis on ecology, advanced solutions, and quality.</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/czas-buduje-wartosci.jpg') }}" alt="" class="golden-border w-100" width="840" height="650">
                </div>
            </div>
            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="200" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <h2>Jakość</h2>
                        <p>Dbanie o najwyższą jakość przejawia się w każdym miejscu działalności naszych spółek: w codziennej pracy, w relacjach z Klientami, w zastosowaniu wysokiej klasy materiałów i technologii przy realizacji projektów. Dzięki temu wiemy, że dostarczamy produkty najwyższej jakości, które podążają za współczesnymi trendami i ochroną środowiska.</p>
                        @else
                        <h2>Quality</h2>
                        <p>Ensuring the highest quality is evident in every aspect of our companies' operations: in our daily work, in our relationships with customers, and in the use of high-quality materials and technologies in project implementation. As a result, we know that we deliver products of the highest quality that align with contemporary trends and environmental protection.</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="200" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/o-nas/jakosc.jpg') }}" alt="" class="golden-border w-100" width="840" height="650">
                </div>
            </div>

            <div class="row mt-0 mt-xl-5 pt-5">
                <div class="col-12">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/HQe0jLv8t8s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

            <div class="row left-right mt-5">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="200" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <h2>Zaawansowane rozwiązania</h2>
                        <p>We wszystkich naszych projektach, stosujemy zaawansowane rozwiązania technologiczne. Współpracujemy tylko z z najlepszymi architektami i dekoratorami wnętrz. Każde mieszkanie, dopracowane jest w najmniejszych szczegółach, by zagwarantować komfort i wygodę przyszłych mieszkańców. Z myślą o ekologii, wdrażamy rozwiązania, które realnie wpływają na środowisko. Stosujemy m.in.: kolektory słoneczne, oświetlenie LED oraz zbiorniki retencyjne, które wykorzystują wody opadowe do podlewania roślinności w częściach wspólnych na osiedlu. Takie działania to nie tylko ochrona środowiska, ale także realne oszczędności na rachunkach naszych mieszkańców.</p>
                        @else
                        <h2>Advanced solutions</h2>
                        <p>In all our projects, we employ advanced technological solutions. We only collaborate with the best architects and interior designers. Each apartment is meticulously crafted down to the smallest detail to guarantee the comfort and convenience of future residents. With ecology in mind, we implement solutions that have a real impact on the environment. These include solar collectors, LED lighting, and retention tanks that utilize rainwater for watering vegetation in common areas within the neighborhood. Such initiatives not only contribute to environmental protection but also result in real savings on our residents' bills.</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="200" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/o-nas/zaawansowane-rozwiazania-2.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="650">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="200" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <h2>Deweloper mieszkaniowy</h2>
                        <p>Realizujemy projekty mieszkaniowe w całej Polsce. W Olsztynie wybudowaliśmy osiedle wielorodzinne – Aurora, składające się z 9 nowoczesnych budynków o łącznej ilości 658 mieszkań. Nowe osiedle zbudowane zostało z najwyższej jakości materiałów. Wyróżnia się na tle innych olsztyńskich inwestycji oryginalnym designem, wpisującym się w najnowsze trendy architektoniczne. (<a href="https://www.aurora.olsztyn.pl" target="_blank">www.aurora.olsztyn.pl</a>)</p>
                        @else
                        <h2>Residential developer</h2>
                        <p>We specialize in residential projects throughout Poland. In Olsztyn, we've completed a multi-family housing estate called Aurora, comprising 9 modern buildings with a total of 658 apartments. The new estate was constructed using the highest quality materials. It stands out from other investments in Olsztyn with its original design, reflecting the latest architectural trends. (<a href="https://www.aurora.olsztyn.pl" target="_blank">www.aurora.olsztyn.pl</a>)</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="200" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/o-nas/deweloper-mieszkaniowy.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="650">
                </div>
            </div>
        </div>

        <div class="container mt-5 pt-0 pt-sm-5">
            @if($current_locale == 'pl')
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-uppercase"><span class="text-gold">Nagrody </span> <br>i wyróżnienia</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8 text-center">
                    <p>Nasza praca i realizowane projekty doceniane są w ogólnopolskich konkursach i zestawieniach. Zdobyliśmy tytuł Lidera Nieruchomości OtoDom 2022 oraz znaleźliśmy się w czołówce Ogólnopolskiego Rankingu Najlepszych Deweloperów Mieszkaniowych, opublikowanym w „Dzienniku Gazecie Prawnej”. Pięciokrotnie zostaliśmy nagrodzeni tytułem Deweloper Roku 2024 oraz w latach 2023,2022,2021,2020.</p>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-uppercase"><span class="text-gold">Prizes </span> <br>and awards</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8 text-center">
                    <p>Our work and projects have been recognized in nationwide competitions and rankings. We were awarded the title of Real Estate Leader by OtoDom in 2022 and ranked among the top in the National Ranking of the Best Residential Developers, published by Dziennik Gazeta Prawna. We have been honored with the title of Developer of the Year five times — in 2024, as well as in 2023, 2022, 2021, and 2020.</p>
                </div>
            </div>
            @endif
        </div>

        <div id="awardsCarousel" class="container-fluid mt-3 mt-xl-5 pt-4 mb-5 pb-0 pb-xl-5">
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

        <div class="container">
            <div class="row left-right">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <h2>Społecznie odpowiedzialni</h2>
                        <p>Od wielu lat angażujemy się również w życie Polaków w ramach społecznej odpowiedzialności biznesu. Jesteśmy m.in. ambasadorem Fundacji „Przyszłość dla Dzieci”, opiekującej się ponad 400 dziećmi z całego regionu. Ippon Group jest ponadto jednym z Najbardziej Hojnych Darczyńców Wielkiej Orkiestry Świątecznej Pomocy, mogącym pochwalić się podsiadaniem wielu Złotych Serduszek.</p>
                        <p>&nbsp;</p>
                        <p>Na wsparcie mogą również liczyć szpitale i Domy Pomocy Społecznej. Ippon przekazał szpitalom darowizny, które umożliwiają większe możliwości badań specjalistycznych i opieki nad pacjentami wyposażając szpitale w sprzęt zwiększający komfort pacjentów.</p>
                        @else
                        <h2>Social responsible</h2>
                        <p>For many years, we have also been engaged in the lives of Poles as part of our corporate social responsibility. We are, among other things, an ambassador of the "Future for Children" Foundation, which takes care of over 400 children from the entire region. Ippon Group is also one of the Most Generous Donors of the Great Orchestra of Christmas Charity, boasting the possession of many Golden Hearts.</p>
                        <p>&nbsp;</p>
                        <p>Hospitals and Care Homes can also count on our support. Ippon has donated to hospitals, enabling greater possibilities for specialized tests and patient care by equipping them with equipment that enhances patient comfort.</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/o-nas/spolecznie-odpowiedzialni.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="650">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <h2>Projekty komercyjne</h2>
                        <p>Firma Ippon Group, to nie tylko deweloper mieszkaniowy. W swoim portfolio posiada także obiekty handlowe oraz punkty street mall . Takie obiekty znajdują się już m.in. w : Olsztynie, Koszalinie, Bydgoszczy, Mrągowie i innych miejscowościach. Priorytetem spółki jest jej dalszy rozwój. Również aktywnie rozbudowujemy bank ziemi pod nowe inwestycje oraz dynamicznie rozszerzamy działalność parków handlowych.</p>
                        @else
                        <h2>Commercial projects</h2>
                        <p>Ippon Group is not just a residential developer. In its portfolio, it also includes commercial properties and street mall points. Such properties are already located in places like Olsztyn, Koszalin, Bydgoszcz, Mrągowo, and other towns. The company's priority is its further development. We also actively expand our land bank for new investments and dynamically broaden the operations of retail parks.</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-6" data-aos="fade-up" data-aos-offset="500" data-aos-delay="0">
                    <img src="{{ asset('/uploads/files/o-nas/projekty-komercyjne-2.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="650">
                </div>
            </div>
        </div>

        <div class="inwestycja-lokalizacja mt-5 pt-0 pt-xl-5 rwd-fullwidth">
            <div class="paralaxa" style="background: url('{{ asset('images/o-nas-paralaxa.jpg') }}') no-repeat center fixed;background-size: cover"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="container paralaxa-bottom paralaxa-bottom-more inline pt-4 pt-lg-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="{{ asset('/images/deweloper-roku-2024.png') }}" alt="Deweloper godny zaufania" class="d-block m-auto">
                                    @if($current_locale == 'pl')
                                    <h2 class="section-title text-uppercase mt-5"><span class="text-gold">Deweloper </span> <br>godny zaufania</h2>
                                    @else
                                    <h2 class="section-title text-uppercase mt-5"><span class="text-gold">A Trustworthy </span> <br>developer</h2>
                                    @endif
                                </div>

                                <div class="col-12 text-start text-xl-center col-mobile">
                                    @if($current_locale == 'pl')
                                    <p data-aos="fade-left" data-aos-offset="200" data-aos-delay="0">Gwarancją jakości naszych realizacji jest współpraca z najlepszymi architektami i generalnymi wykonawcami, którzy sprostają oczekiwaniom naszym i naszych klientów. Tworzymy niezwykłe projekty z zachowaniem zasad funkcjonalności i wykorzystania naturalnego światła. Doskonale koordynujemy projekty czego efektem jest oddanie naszych inwestycji w terminie.</p>
                                    <p>&nbsp;</p>
                                    <p data-aos="fade-right" data-aos-offset="200" data-aos-delay="0">Z każdym rokiem liczba naszych inwestycji rośnie, a wraz z nią zwiększa się liczba zadowolonych klientów. Naszą wizytówką jest wybudowane i oddane do użytkowania Osiedle Aurora w Olsztynie. Oprócz osiedli mieszkaniowych realizujemy projekty komercyjne. Nasze budynki znajdują się na terenie całego kraju.</p>
                                    @else
                                        <p data-aos="fade-left" data-aos-offset="200" data-aos-delay="0">The guarantee of the quality of our projects is our collaboration with the best architects and general contractors who meet both our and our clients' expectations. We create exceptional projects while adhering to principles of functionality and natural light utilization. We coordinate projects excellently, which results in delivering our investments on time.</p>
                                        <p>&nbsp;</p>
                                        <p data-aos="fade-right" data-aos-offset="200" data-aos-delay="0">With each passing year, the number of our investments grows, and along with it, the number of satisfied customers increases. Our flagship is the completed and handed over Aurora Estate in Olsztyn. In addition to residential developments, we undertake commercial projects. Our buildings can be found throughout the country.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-5 pt-0 pt-lg-5">
            <div class="row">
                <div class="col-12 text-center">
                    @if($current_locale == 'pl')
                    <h2 class="section-title text-uppercase"><span class="text-gold">Budujemy </span> <br>zaufanie</h2>
                    @else
                    <h2 class="section-title text-uppercase"><span class="text-gold">Building </span> <br>trust</h2>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <img src="{{ asset('images/wykres_pl.png') }}" alt="" class="m-auto">
                </div>
                <div class="col-12 col-xl-6">
                    <div class="pe-0 pe-xl-5 ps-0 ps-xl-5" data-aos="fade-left" data-aos-offset="200" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <p>W naszym działaniu wykorzystujemy model zintegrowanego biznesu, na który składają się różne etapy procesu inwestycyjnego: od zarządzania nieruchomościami, po zakup gruntu, projektowanie i budowę nieruchomości, na wynajmie i sprzedaży powierzchni kończąc. Realizujemy inwestycje wykonane według własnych projektów, gdzie czynnikiem decydującym jest aktualne zapotrzebowanie rynku i dostosowanie projektów do wymagań naszych klientów.</p>
                        @else
                        <p>In our operations, we employ an integrated business model, encompassing various stages of the investment process: from property management and land acquisition to property design and construction, ending with leasing and selling of spaces. We carry out investments based on our own designs, where the determining factor is the current market demand and adaptation of projects to our clients' requirements.</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-6 mt-4 mt-xl-0">
                    <div class="pe-0 pe-xl-5 ps-0 ps-xl-5" data-aos="fade-right" data-aos-offset="200" data-aos-delay="0">
                        @if($current_locale == 'pl')
                        <p>Każdy z wymienionych wyżej etapów przebiega w ściśle określony i ustandaryzowany sposób, co pozwala nam przewidzieć ewentualne wyzwania i zareagować w najkrótszym możliwym czasie. Stawiamy sobie jasny cel: zbudowanie wiodącej marki w branży deweloperskiej, kojarzonej z jakością, prestiżem i oryginalnością. Mamy świadomość wpływu naszej pracy na kreowanie przestrzeni miejskiej. Dlatego tak ważna jest dla nas wysoka jakość inwestycji.</p>
                        @else
                        <p>Each of the aforementioned stages is carried out in a precisely defined and standardized manner, allowing us to anticipate potential challenges and respond in the shortest possible time. We set ourselves a clear goal: to build a leading brand in the development industry, associated with quality, prestige, and originality. We are aware of the impact of our work on shaping urban space. Therefore, the high quality of our investments is so crucial to us.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — makieta Figma "O NAS"
     Ustalenia z Jackiem/klientem:
       - "Stabilnosc i doswiadczenie" oraz wiersze z "Architektura, Natura,
         Czlowiek" ida na pelna szerokosc ekranu (zdjecie dochodzi do krawedzi,
         bez bialego pasa z boku) — czyli komponent .ip-invrow z podstron
         mieszkaniowych,
       - karuzela nagrod zostaje na danych z CMS-u (model Award) i na slicku,
         tak jak dotad — zmienia sie tylko oprawa.
     Teksty siedza w tablicy ponizej: ta podstrona nie ma ich w CMS-ie.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    /* Film z YouTube — ten sam, ktory byl na starej wersji podstrony. */
    $ipVideoId = 'HQe0jLv8t8s';

    $T = [
        'lead' => [
            'pl' => 'Projektujemy i realizujemy bezpieczne, funkcjonalne inwestycje w standardzie premium, które redefiniują pojęcie komfortu. Poznaj naszą filozofię.',
            'en' => 'We design and deliver safe, functional premium developments that redefine the notion of comfort. Get to know our philosophy.',
        ],
        'stab_title' => ['pl' => 'Stabilność i doświadczenie', 'en' => 'Stability and Experience'],
        'stab_p1' => [
            'pl' => 'Budujemy zaufanie na rynku nieruchomości od 2013 roku. Zaczynaliśmy od wymagających obiektów komercyjnych, by inżynieryjny rygor i najwyższe standardy przenieść na rynek <strong>nowoczesnego budownictwa mieszkaniowego</strong>.',
            'en' => 'We have been building trust in the real estate market since 2013. We started with demanding commercial developments, bringing the same engineering discipline and highest standards to <strong>modern residential development</strong>.',
        ],
        'stab_p2' => [
            'pl' => 'Dziś działamy w oparciu o model zintegrowanego biznesu. Samodzielnie i restrykcyjnie kontrolujemy każdy etap inwestycji:',
            'en' => 'Today, we operate through a fully integrated business model, independently maintaining rigorous control over every stage of the development process:',
        ],
        'stab_list' => [
            'pl' => [
                'Precyzyjny <strong>dobór i zakup gruntów</strong> w strategicznych lokalizacjach.',
                'Współpracę z topowymi <strong>pracowniami architektonicznymi</strong>.',
                '<strong>Generalne wykonawstwo</strong> i rzetelne przekazanie kluczy w terminie.',
            ],
            'en' => [
                'Precise <strong>selection and acquisition of land</strong> in strategic locations.',
                'Collaboration with leading <strong>architectural practices</strong>.',
                '<strong>General contracting</strong> and reliable, on-time handover of completed properties.',
            ],
        ],
        'stab_p3' => [
            'pl' => 'Większościowym i dominującym udziałowcem IPPON GROUP jest luksemburski fundusz inwestycyjny <strong>ALFA 1 CEE INVESTMENTS S.A., SICAV-SIF</strong>. Pozostała część udziałów należy do członków Zarządu Spółki Ippon Group.',
            'en' => 'The majority and controlling shareholder of IPPON GROUP is the Luxembourg investment fund <strong>ALFA 1 CEE INVESTMENTS S.A., SICAV-SIF</strong>. The remaining shares are held by members of the Management Board of Ippon Group.',
        ],
        'cert_title_1' => ['pl' => 'Certyfikat Jakości Ippon:', 'en' => 'Ippon Quality Certificate:'],
        'cert_title_2' => ['pl' => 'Bezkompromisowy Standard Premium', 'en' => 'An Uncompromising Premium Standard'],
        'cert_p1' => [
            'pl' => 'Każdy nasz projekt sygnujemy <strong>autorskim Certyfikatem Jakości Ippon</strong>, który stanowi oficjalną gwarancję dbałości o każdy, nawet najmniejszy detal. Wybieramy wyłącznie <strong>certyfikowane materiały najwyższej klasy</strong>, co zapewnia ponadstandardową izolację akustyczną oraz maksymalną trwałość budynków na lata.',
            'en' => 'Every development we create bears our proprietary <strong>Ippon Quality Certificate</strong>, providing a formal guarantee of our meticulous attention to every detail, no matter how small. We use only <strong>certified, top-quality materials</strong>, ensuring superior acoustic insulation and exceptional long-term durability.',
        ],
        'cert_p2' => [
            'pl' => 'Łączymy codzienną ergonomię i architekturę bez barier z głębokim szacunkiem dla środowiska, wdrażając <strong>energooszczędne technologie i rozwiązania proekologiczne</strong>, które realnie obniżają koszty eksploatacji mieszkań.',
            'en' => 'We combine everyday functionality and barrier-free architecture with a deep respect for the environment, implementing <strong>energy-efficient technologies and sustainable solutions</strong> that deliver tangible reductions in the running costs of your home.',
        ],
        'cert_p3' => [
            'pl' => 'Certyfikat Jakości Ippon to nasz dowód na to, że tworzymy bezpieczną, cichą i zrównoważoną przestrzeń, w której zyskujesz upragniony <strong>komfort, spokój i bezpieczeństwo</strong>.',
            'en' => 'The Ippon Quality Certificate is our commitment to creating safe, quiet and sustainable living spaces where you can enjoy the <strong>comfort, peace of mind and security</strong> you deserve.',
        ],
        'cert_f1' => ['pl' => 'Certyfikowane materiały najwyższej klasy', 'en' => 'Certified, top-quality materials'],
        'cert_f2' => ['pl' => 'Energooszczędne technologie', 'en' => 'Energy-efficient technologies'],
        /* Opisy pod piktogramami — z propozycji klienta (propozycja-piktogramy.png).
           Makieta ma tylko wersje polska; angielska nasza, do potwierdzenia. */
        'cert_d1' => [
            'pl' => 'Starannie wyselekcjonowane materiały od renomowanych dostawców, które zapewniają trwałość, bezpieczeństwo i komfort na lata.',
            'en' => 'Carefully selected materials from established suppliers, delivering durability, safety and comfort for years to come.',
        ],
        'cert_d2' => [
            'pl' => 'Nowoczesne rozwiązania ograniczające zużycie energii, obniżające koszty eksploatacji i wspierające ochronę środowiska.',
            'en' => 'Modern solutions that reduce energy consumption, lower running costs and support environmental protection.',
        ],
        'val_title_1' => ['pl' => 'Architektura, Natura, Człowiek.', 'en' => 'Architecture. Nature. People.'],
        'val_title_2' => ['pl' => 'Poznaj nasze wartości', 'en' => 'Discover Our Values.'],
        'awards_title' => ['pl' => 'Wiarygodność i sukces', 'en' => 'Credibility and Success'],
        'awards_lead' => [
            'pl' => 'Przynależność Ippon Group do Polskiego Związku Firm Deweloperskich (PZFD) to dla naszych klientów gwarancja najwyższej kultury organizacyjnej, przejrzystości prawnej oraz etyki biznesowej. Nasza stabilna pozycja na rynku oraz bezkompromisowe podejście do jakości znajdują odzwierciedlenie w kluczowych nagrodach branżowych:',
            'en' => 'Ippon Group’s membership in the Polish Association of Developers (PZFD) provides our clients with the assurance of the highest standards of corporate governance, legal transparency and business ethics. Our strong market position and uncompromising commitment to quality are reflected in prestigious industry awards and distinctions:',
        ],
        'sport_title' => ['pl' => 'Wspieramy najlepszych', 'en' => 'Supporting the Best'],
        'contact_title' => ['pl' => 'Porozmawiajmy o Twoim nowym mieszkaniu', 'en' => 'Let’s talk about your new apartment'],
        'contact_lead' => [
            'pl' => 'Wyjątkowe inwestycje wymagają dedykowanej opieki. Jeśli chcesz poznać szczegóły naszych projektów, umówić się na prezentację apartamentu lub zapytać o niestandardowe rozwiązania – <strong>jesteśmy do Twojej dyspozycji.</strong>',
            'en' => 'Exceptional developments call for dedicated care. If you would like to learn the details of our projects, arrange a viewing or ask about bespoke solutions – <strong>we are at your disposal.</strong>',
        ],
    ];

    /* Wiersze sekcji "Architektura, Natura, Czlowiek" — pelna szerokosc,
       zdjecie na przemian po prawej i po lewej stronie ekranu. */
    $wartosci = [
        [
            'img'     => 'images/about/architektura.jpg',
            'reverse' => true,
            'title'   => ['pl' => 'Architektura i materiały najwyższej jakości', 'en' => 'Architecture and the Highest-Quality Materials'],
            'desc'    => [
                'pl' => '<p>Dla nas <strong>standard premium</strong> to codzienna praktyka wykonawcza. Współpracujemy wyłącznie z wybitnymi architektami oraz dekoratorami wnętrz.</p>
                         <p>Wybieramy <strong>szlachetne, certyfikowane materiały</strong> budowlane i wykończeniowe, które gwarantują trwałość na pokolenia.</p>
                         <p>Każdy projekt optymalizujemy pod kątem maksymalnego wykorzystania <strong>naturalnego światła</strong> oraz ergonomii przestrzeni, zapewniając mieszkańcom bezkompromisową wygodę.</p>',
                'en' => '<p>For us, <strong>premium standards</strong> are an integral part of our everyday approach to construction. We work exclusively with outstanding architects and interior designers.</p>
                         <p>We select <strong>premium, certified construction and finishing materials</strong> that ensure lasting quality for generations.</p>
                         <p>Every project is optimised to maximise <strong>natural light</strong> and spatial ergonomics, providing residents with uncompromising comfort.</p>',
            ],
        ],
        [
            'img'     => 'images/about/ekologia-las.jpg',
            'reverse' => false,
            'title'   => ['pl' => 'Ekologia i zaawansowane rozwiązania technologiczne', 'en' => 'Sustainability and Advanced Technology'],
            'desc'    => [
                'pl' => '<p>Nie traktujemy ekologii jako dodatku, lecz jako fundament projektu. Na naszych osiedlach standardem stają się zaawansowane systemy technologiczne:</p>',
                'en' => '<p>We do not treat sustainability as an optional feature, but as a fundamental part of every project. Advanced technological solutions are becoming standard across our residential developments:</p>',
            ],
            'list'    => [
                'pl' => [
                    '<strong>Kolektory słoneczne</strong> wspierające zasilanie energetyczne części wspólnych.',
                    '<strong>Systemy retencji wód opadowych</strong>, które gromadzą deszczówkę do automatycznego podlewania bogatej zieleni osiedlowej.',
                    'Energooszczędne <strong>oświetlenie LED</strong> redukujące ślad węglowy i koszty eksploatacji.',
                ],
                'en' => [
                    '<strong>Solar collectors</strong> supporting the energy needs of common areas.',
                    '<strong>Rainwater retention systems</strong> that collect rainwater for the automatic irrigation of extensive landscaped green areas.',
                    'Energy-efficient <strong>LED lighting</strong> that reduces both the carbon footprint and operating costs.',
                ],
            ],
        ],
        [
            'img'     => 'images/about/csr-dziecko.jpg',
            'reverse' => true,
            'title'   => ['pl' => 'Odpowiedzialność społeczna (CSR)', 'en' => 'Corporate Social Responsibility (CSR)'],
            'desc'    => [
                'pl' => '<p>Wierzymy, że miarą sukcesu silnej marki jest dobro, jakim dzieli się ze swoim otoczeniem. Jako deweloper odpowiedzialny społecznie, od lat systemowo wspieramy lokalne społeczności. Jesteśmy dumnym <strong>Ambasadorem Fundacji „Przyszłość dla Dzieci”</strong>, niosąc pomoc ponad 400 podopiecznym wymagającym leczenia.</p>
                         <p>Należymy do grona <strong>Najbardziej Hojnych Darczyńców WOŚP</strong> (w naszej kolekcji znajduje się już 8 Złotych Serduszek). Ponadto regularnie <strong>doposażamy szpitale i Domy Pomocy Społecznej</strong> oraz wspieramy polskich sportowców w ich drodze po mistrzowskie tytuły.</p>',
                'en' => '<p>We believe that the true measure of a strong brand’s success is the positive impact it makes on the community around it. As a socially responsible developer, we have been consistently supporting local communities for many years. We are proud to be an <strong>Ambassador of the “Przyszłość dla Dzieci” Foundation</strong>, helping more than 400 children who require medical treatment.</p>
                         <p>We are also among the <strong>most generous donors to the Great Orchestra of Christmas Charity (WOŚP)</strong>, with eight Golden Hearts already in our collection. In addition, we regularly <strong>provide equipment to hospitals and social care homes</strong> and support Polish athletes on their journey towards championship titles.</p>',
            ],
        ],
    ];
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl' ? 'Czas buduje wartość' : 'Time Builds Value',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'O nas' : 'About us', 'url' => null],
        ],
        'lead'   => $T['lead'][$L],
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    {{-- Stabilnosc i doswiadczenie — pelna szerokosc, zdjecie do krawedzi --}}
    <section class="ip-section ip-about-section pb-0">
        <div class="container">
            <x-section-head>{{ $T['stab_title'][$L] }}</x-section-head>
        </div>
    </section>

    <section class="ip-invrows ip-about-rows" style="padding-top: 0;">
        <article class="ip-invrow is-reverse">
            {{-- Bez align-items-center: kolumna ze zdjeciem ma sie rozciagnac do
                 wysokosci tekstu (tekst jest tu dluzszy niz proporcja kadru).
                 Pionowe wysrodkowanie tekstu przejmuje .ip-invrow-body w LESS. --}}
            <div class="row g-0">
                <div class="col-12 col-lg-7 ip-invrow-media">
                    <img src="{{ asset('images/about/stabilnosc.jpg') }}" alt="{{ $T['stab_title'][$L] }}">
                </div>
                <div class="col-12 col-lg-5 ip-invrow-body">
                    <div class="ip-invrow-inner">
                        <div class="ip-invrow-desc">
                            <p>{!! $T['stab_p1'][$L] !!}</p>
                            <p>{!! $T['stab_p2'][$L] !!}</p>
                        </div>

                        <ul class="ip-check-list list-unstyled">
                            @foreach($T['stab_list'][$L] as $item)
                                <li>
                                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m3.5 10.5 4 4 9-9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    <span>{!! $item !!}</span>
                                </li>
                            @endforeach
                        </ul>

                        <div class="ip-invrow-desc">
                            <p>{!! $T['stab_p3'][$L] !!}</p>
                        </div>

                        <a href="{{ route('developro.completed', ['locale' => $L]) }}" class="ip-btn-gold-lg">
                            {{ $L == 'pl' ? 'Zobacz więcej' : 'See more' }}
                        </a>
                    </div>
                </div>
            </div>
        </article>
    </section>

    {{-- Film — pelna szerokosc. Klikniecie podmienia plakat na odtwarzacz,
         zeby YouTube nie ladowal sie przy wejsciu na strone. --}}
    <div class="ip-video" data-video="{{ $ipVideoId }}" role="button" tabindex="0"
         aria-label="{{ $L == 'pl' ? 'Odtwórz film o Ippon Group' : 'Play the Ippon Group film' }}">
        <img src="{{ asset('images/about/video-ippon.jpg') }}" alt="Ippon Group">
    </div>

    {{-- Certyfikat Jakosci — zdjecie w kontenerze, tak jak w makiecie --}}
    <section class="ip-section ip-about-section">
        <div class="container">

            <x-section-head>
                {{ $T['cert_title_1'][$L] }}
                    <span>{{ $T['cert_title_2'][$L] }}</span>
            </x-section-head>

            <div class="row align-items-center ip-about-cert-row">
                <div class="col-12 col-xl-6">
                    <div class="ip-about-photo">
                        <img src="{{ asset('images/about/certyfikat.jpg') }}"
                             alt="{{ $T['cert_title_1'][$L] }}" width="704" height="586">
                    </div>
                </div>

                <div class="col-12 col-xl-6 mt-4 mt-xl-0">
                    <div class="ip-about-text">
                        <p>{!! $T['cert_p1'][$L] !!}</p>
                        <p>{!! $T['cert_p2'][$L] !!}</p>
                        <p>{!! $T['cert_p3'][$L] !!}</p>
                    </div>

                    {{-- Piktogramy wg propozycji klienta (materialy_klienta/propozycja-piktogramy.png).
                         Numer 01/02 to znak wodny pod tekstem — dlatego aria-hidden i z-index 0,
                         czytnik ekranu ma przeczytac tytul, nie "zero jeden". Kreska pod ikona
                         jest krotka (w makiecie 54 px), nie na cala szerokosc karty. --}}
                    <div class="ip-cert-cards">
                        <article class="ip-cert-card">
                            <span class="ip-cert-num" aria-hidden="true">01</span>

                            <div class="ip-cert-top">
                                <span class="ip-cert-icon">
                                    {{-- Trzy zamkniete romby jeden na drugim, rysowane od dolu.
                                         Wypelnienie biele jest czescia rysunku, nie ozdoba: to ono
                                         zaslania gorne polowy nizszych warstw i daje efekt stosu.
                                         Tlo karty tez jest biale — przy zmianie tla podmienic fill. --}}
                                    <svg viewBox="0 0 48 48" fill="none" aria-hidden="true">
                                        <path d="M24 25 44 34 24 43 4 34Z" fill="#fff" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/>
                                        <path d="M24 14.5 44 23.5 24 32.5 4 23.5Z" fill="#fff" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/>
                                        <path d="M24 4 44 13 24 22 4 13Z" fill="#fff" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <h3>{{ $T['cert_f1'][$L] }}</h3>
                            </div>

                            <p>{{ $T['cert_d1'][$L] }}</p>
                        </article>

                        <article class="ip-cert-card">
                            <span class="ip-cert-num" aria-hidden="true">02</span>

                            <div class="ip-cert-top">
                                <span class="ip-cert-icon">
                                    {{-- Lisc: dwa luki schodzace sie w czubku u gory z prawej,
                                         plus prosty nerw, ktory wychodzi ponizej nasady jako ogonek. --}}
                                    <svg viewBox="0 0 48 48" fill="none" aria-hidden="true">
                                        <path d="M9 41C9 21 20 9 43 5c-4 23-16 36-34 36Z" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/>
                                        <path d="M3 46 37 12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                                    </svg>
                                </span>
                                <h3>{{ $T['cert_f2'][$L] }}</h3>
                            </div>

                            <p>{{ $T['cert_d2'][$L] }}</p>
                        </article>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Architektura, Natura, Czlowiek — wiersze na pelna szerokosc --}}
    <section class="ip-section ip-about-section pb-0 pt-0">
        <div class="container">
            <x-section-head>
                {{ $T['val_title_1'][$L] }}
                    <span>{{ $T['val_title_2'][$L] }}</span>
            </x-section-head>
        </div>
    </section>

    <section class="ip-invrows ip-about-rows ip-about-values">
        @foreach($wartosci as $row)
            <article class="ip-invrow is-half @if($row['reverse']) is-reverse @endif">
                <div class="row g-0 align-items-center">
                    <div class="col-12 col-lg-6 ip-invrow-media">
                        <img src="{{ asset($row['img']) }}" alt="{{ $row['title'][$L] }}">
                    </div>
                    <div class="col-12 col-lg-6 ip-invrow-body">
                        <div class="ip-invrow-inner">
                            <h2>{{ $row['title'][$L] }}</h2>
                            <div class="ip-rule"></div>

                            <div class="ip-invrow-desc">{!! $row['desc'][$L] !!}</div>

                            @if(!empty($row['list']))
                                <ul class="ip-check-list list-unstyled mb-0">
                                    @foreach($row['list'][$L] as $item)
                                        <li>
                                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m3.5 10.5 4 4 9-9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            <span>{!! $item !!}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </section>

    {{-- Wiarygodnosc i sukces — karuzela nagrod z CMS-u (model Award) --}}
    <section class="ip-section ip-about-section ip-awards-section pb-0">
        <div class="container">
            <x-section-head>{{ $T['awards_title'][$L] }}</x-section-head>

            <p class="ip-about-lead">{{ $T['awards_lead'][$L] }}</p>
        </div>

        <div id="awardsCarousel" class="container-fluid">
            <div class="row">
                @foreach($awards as $award)
                    <div class="col-4">
                        <div class="award">
                            <img src="{{ asset('/uploads/awards/'.$award->file) }}" alt="{{ $award->name }}">
                            <h3>{{ $award->name }}</h3>
                            {!! $award->text !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Wspieramy najlepszych --}}
    <section class="ip-section ip-about-section pb-0 pt-0">
        <div class="container">
            <x-section-head>{{ $T['sport_title'][$L] }}</x-section-head>

            <div class="row align-items-center">
                <div class="col-12 col-xl-6">
                    <div class="ip-about-text">
                        <h3 class="ip-about-subtitle">{{ $L == 'pl' ? 'Ippon Group w sporcie' : 'Ippon Group in sport' }}</h3>
                        <div class="ip-rule"></div>

                        @if($L == 'pl')
                            <p>W budownictwie, tak jak w sporcie, o sukcesie decydują milimetry, sekundy i bezkompromisowa precyzja. Dumą napawa nas fakt, że jako sponsor <strong>wspieramy sportowca Marcina Tausiewicza</strong>. Wspólnie udowadniamy, że pasja połączona z determinacją pozwala sięgać po najwyższe trofea.</p>
                            <p>Marcin Tausiewicz to jeden z najbardziej utytułowanych polskich zawodników strzelectwa dynamicznego IPSC, reprezentujący Legię Warszawa. Jest <strong>wielokrotnym mistrzem Polski</strong> oraz zwycięzcą prestiżowych zawodów międzynarodowych. Do jego największych sukcesów należą <strong>wicemistrzostwo Europy</strong> w pistolecie IPSC oraz <strong>indywidualne wicemistrzostwo świata</strong> i <strong>drużynowe mistrzostwo świata</strong> w strzelbie IPSC, zdobyte w 2023 roku.</p>
                        @else
                            <p>In construction, just as in sport, success is determined by millimetres, seconds and uncompromising precision. We are proud to sponsor athlete <strong>Marcin Tausiewicz</strong>. Together, we demonstrate that passion combined with determination makes it possible to reach the highest levels of achievement.</p>
                            <p>Marcin Tausiewicz is one of Poland’s most accomplished <strong>IPSC practical shooting competitors</strong>, representing Legia Warsaw. He is a multiple Polish Champion and a winner of prestigious international competitions. His greatest achievements include becoming <strong>European Vice-Champion in IPSC Handgun</strong>, as well as winning an <strong>individual World Vice-Championship title and a team World Championship title in IPSC Shotgun in 2023</strong>.</p>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-xl-6 mt-4 mt-xl-0">
                    {{-- UWAGA: to kadr z makiety z wpalonym przyciskiem play.
                         Gdy klient poda film, wystarczy dodac data-video="ID". --}}
                    <div class="ip-about-photo">
                        <img src="{{ asset('images/about/sport.jpg') }}"
                             alt="{{ $L == 'pl' ? 'Marcin Tausiewicz' : 'Marcin Tausiewicz' }}" width="851" height="527">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Porozmawiajmy o Twoim nowym mieszkaniu — wspolny komponent --}}
    @include('layouts.partials.ip-contact-section', [
        'title'     => $T['contact_title'][$L],
        'lead'      => $T['contact_lead'][$L],
        'form'      => 'front.contact.ip-form',
        'page_name' => 'O nas',
    ])

@endsection
@push('scripts')
    <script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        AOS.init({disable: 'mobile'});

        $(document).ready(function(){
            $('#awardsCarousel .row').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 4000,
                centerMode: true,
                centerPadding: '80px',
                arrows: true,
                dots: false,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerPadding: '120px',
                        }
                    },
                    {
                        breakpoint: 577,
                        settings: {
                            centerMode: false,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerPadding: '10px',
                        }
                    }
                ]
            });

            // Plakat filmu: YouTube laduje sie dopiero po klliknieciu.
            $('.ip-video[data-video]').on('click keydown', function (e) {
                if (e.type === 'keydown' && e.key !== 'Enter' && e.key !== ' ') return;
                e.preventDefault();

                const id = $(this).data('video');
                if (!id || $(this).find('iframe').length) return;

                $(this).html(
                    '<iframe src="https://www.youtube.com/embed/' + id + '?autoplay=1" ' +
                    'title="Ippon Group" frameborder="0" allow="accelerometer; autoplay; clipboard-write; ' +
                    'encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'
                );
            });
        });
    </script>
@endpush
