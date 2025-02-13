@extends('layouts.page', ['body_class' => 'about-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

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
                        <p>Ippon Group Sp. z o.o. działa na rynku od 2017 roku, zaś jej spółki zależne od 2013 roku. Początkowo zajmowaliśmy się budową i wynajmem powierzchni handlowo-usługowych. W ciągu kolejnych kilku lat rozszerzyliśmy swoją działalność również o branżę deweloperską. Intensywny rozwój działalności w różnych projektach wymógł na nas stworzenie jednej wiodącej marki jaką stała się Spółka Ippon Group.</p>
                        <p>&nbsp;</p>
                        <p>Założyciele firmy już w chwili tworzeniu mogli się pochwalić swoim doświadczeniem w branży, dzięki czemu dziś Ippon Group rozwija się dynamicznie i konsekwentnie realizuje założoną strategię. Główny nacisk firma kładzie na ekologię, zaawansowane rozwiązania i jakość.</p>
                        @else
                        <h2>Time builds value.</h2>
                        <p>Ippon Group Sp. z o.o. has been operating in the market since 2017, while its subsidiaries have been operating since 2013. Initially, we were involved in the construction and leasing of commercial and service premises. Over the next few years, we expanded our business to include the development industry as well. The intensive development of activities in various projects necessitated the creation of a leading brand, which became Ippon Group Company.</p>
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
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/FIE_1mJakt0?si=yD9AYH2w5EOjMd6a" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
                    <p>Nasza praca i realizowane projekty doceniane są w ogólnopolskich konkursach i zestawieniach. Zdobyliśmy tytuł Lidera Nieruchomości OtoDom 2022 oraz znaleźliśmy się w czołówce Ogólnopolskiego Rankingu Najlepszych Deweloperów Mieszkaniowych, opublikowanym w „Dzienniku Gazecie Prawnej”. Czterokrotnie zostaliśmy nagrodzeni tytułem Deweloper Roku 2023 oraz w latach 2022,2021,2020.</p>
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
                    <p>Our work and executed projects are recognized in nationwide competitions and rankings. We were awarded the title of Real Estate Leader by OtoDom in 2022, and we were featured in the top tier of the Nationwide Ranking of Best Residential Developers, published in "Dziennik Gazeta Prawna". We have been honored four times with the Developer of the Year title for 2023, 2022, 2021, and 2020.</p>
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
                    <img src="{{ asset('/uploads/files/o-nas/projekty-komercyjne.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="650">
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
        });
    </script>
@endpush