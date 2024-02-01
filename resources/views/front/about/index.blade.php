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
                        <h2>Czas buduje wartość.</h2>
                        <p>Ippon Group Sp. z o.o. działa na rynku od 2017 roku, zaś jej spółki zależne od 2013 roku. Początkowo zajmowaliśmy się budową i wynajmem powierzchni handlowo-usługowych. W ciągu kolejnych kilku lat rozszerzyliśmy swoją działalność również o branżę deweloperską. Intensywny rozwój działalności w różnych projektach wymógł na nas stworzenie jednej wiodącej marki jaką stała się Spółka Ippon Group.</p>
                        <p>&nbsp;</p>
                        <p>Założyciele firmy już w chwili tworzeniu mogli się pochwalić swoim doświadczeniem w branży, dzięki czemu dziś Ippon Group rozwija się dynamicznie i konsekwentnie realizuje założoną strategię. Główny nacisk firma kładzie na ekologię, zaawansowane rozwiązania i jakość.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="/images/inline/pracuj-z-najlepszymi.jpg" alt="" class="golden-border w-100" width="840" height="650">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2>Jakość</h2>
                        <p>Dbanie o najwyższą jakość przejawia się w każdym miejscu działalności naszych spółek: w codziennej pracy, w relacjach z Klientami, w zastosowaniu wysokiej klasy materiałów i technologii przy realizacji projektów. Dzięki temu wiemy, że dostarczamy produkty najwyższej jakości, które podążają za współczesnymi trendami i ochroną środowiska.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="/images/inline/kariera-poznajmy-sie.jpg" alt="" class="golden-border w-100">
                </div>
            </div>

            <div class="row left-right row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2>Zaawansowane rozwiązania</h2>
                        <p>Stawiamy na najbardziej zaawansowane rozwiązania technologiczne, które pozwalają nam uzyskać wysoką sprawność naszych aktywów i docelowo budują wizerunek grupy, która inwestuje efektywnie i przyjaźnie dla środowiska. W efekcie tych działań, nasi mieszkańcy mają zapewnione bezpieczeństwo, dostęp do nowoczesnych rozwiązań oraz gwarancję najwyższej jakości materiałów.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/o-nas/zaawansowane-rozwiazania.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="650">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2>Deweloper mieszkaniowy</h2>
                        <p>Realizujemy projekty mieszkaniowe w całej Polsce. W Olsztynie wybudowaliśmy osiedle wielorodzinne – Aurora, składające się z 9 nowoczesnych budynków o łącznej ilości 658 mieszkań. Nowe osiedle zbudowane zostało z najwyższej jakości materiałów. Wyróżnia się na tle innych olsztyńskich inwestycji oryginalnym designem, wpisującym się w najnowsze trendy architektoniczne. (<a href="https://www.aurora.olsztyn.pl" target="_blank">www.aurora.olsztyn.pl</a>)</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/o-nas/deweloper-mieszkaniowy.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="650">
                </div>
            </div>

        </div>

        <div class="container mt-5 pt-0 pt-sm-5">
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
                    <div class="left-right-text">
                        <h2>Społecznie odpowiedzialni</h2>
                        <p>Od wielu lat angażujemy się również w życie Polaków w ramach społecznej odpowiedzialności biznesu. Jesteśmy m.in. ambasadorem Fundacji „Przyszłość dla Dzieci”, opiekującej się ponad 400 dziećmi z całego regionu. Ippon Group jest ponadto jednym z Najbardziej Hojnych Darczyńców Wielkiej Orkiestry Świątecznej Pomocy, mogącym pochwalić się podsiadaniem wielu Złotych Serduszek.</p>
                        <p>&nbsp;</p>
                        <p>Na wsparcie mogą również liczyć szpitale i Domy Pomocy Społecznej. Ippon przekazał szpitalom darowizny, które umożliwiają większe możliwości badań specjalistycznych i opieki nad pacjentami wyposażając szpitale w sprzęt zwiększający komfort pacjentów.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/o-nas/spolecznie-odpowiedzialni.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="650">
                </div>
            </div>

            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2>Projekty komercyjne</h2>
                        <p>Firma Ippon Group, to nie tylko deweloper mieszkaniowy. W swoim portfolio posiada także obiekty handlowe oraz punkty street mall . Takie obiekty znajdują się już m.in. w : Olsztynie, Koszalinie, Bydgoszczy, Mrągowie i innych miejscowościach. Priorytetem spółki jest jej dalszy rozwój. Również aktywnie rozbudowujemy bank ziemi pod nowe inwestycje oraz dynamicznie rozszerzamy działalność parków handlowych.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <img src="{{ asset('/uploads/files/o-nas/projekty-komercyjne.jpg') }}" alt="Wizualizacja osiedla Aurora" class="golden-border w-100" width="840" height="650">
                </div>
            </div>
        </div>

        <div class="inwestycja-lokalizacja mt-5 pt-0 pt-xl-5 rwd-fullwidth">
            <div class="paralaxa" style="background: url('https://www.ippon.group/files/upload/o-nas-paralaxa.jpg') no-repeat center fixed;background-size: cover"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="container paralaxa-bottom paralaxa-bottom-more inline pt-4 pt-lg-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="{{ asset('/images/deweloper-roku-2023.png') }}" alt="Deweloper godny zaufania" class="d-block m-auto">
                                    <h2 class="section-title text-uppercase mt-5"><span class="text-gold">Deweloper </span> <br>godny zaufania</h2>
                                </div>

                                <div class="col-12 text-start text-xl-center col-mobile">
                                    <p>Gwarancją jakości naszych realizacji jest współpraca z najlepszymi architektami i generalnymi wykonawcami, którzy sprostają oczekiwaniom naszym i naszych klientów. Tworzymy niezwykłe projekty z zachowaniem zasad funkcjonalności i wykorzystania naturalnego światła. Doskonale koordynujemy projekty czego efektem jest oddanie naszych inwestycji w terminie.</p>
                                    <p>&nbsp;</p>
                                    <p>Z każdym rokiem liczba naszych inwestycji rośnie, a wraz z nią zwiększa się liczba zadowolonych klientów. Naszą wizytówką jest wybudowane i oddane do użytkowania Osiedle Aurora w Olsztynie. Oprócz osiedli mieszkaniowych realizujemy projekty komercyjne. Nasze budynki znajdują się na terenie całego kraju.</p>
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
                    <h2 class="section-title text-uppercase"><span class="text-gold">Budujemy </span> <br>zaufanie</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <img src="https://www.ippon.group/files/upload/wykres_pl.png" alt="" class="m-auto">
                </div>
                <div class="col-12 col-xl-6">
                    <div class="pe-0 pe-xl-5 ps-0 ps-xl-5">
                        <p>W naszym działaniu wykorzystujemy model zintegrowanego biznesu, na który składają się różne etapy procesu inwestycyjnego: od zarządzania nieruchomościami, po zakup gruntu, projektowanie i budowę nieruchomości, na wynajmie i sprzedaży powierzchni kończąc. Realizujemy inwestycje wykonane według własnych projektów, gdzie czynnikiem decydującym jest aktualne zapotrzebowanie rynku i dostosowanie projektów do wymagań naszych klientów.</p>
                    </div>
                </div>
                <div class="col-12 col-xl-6 mt-4 mt-xl-0">
                    <div class="pe-0 pe-xl-5 ps-0 ps-xl-5">
                        <p>Każdy z wymienionych wyżej etapów przebiega w ściśle określony i ustandaryzowany sposób, co pozwala nam przewidzieć ewentualne wyzwania i zareagować w najkrótszym możliwym czasie. Stawiamy sobie jasny cel: zbudowanie wiodącej marki w branży deweloperskiej, kojarzonej z jakością, prestiżem i oryginalnością. Mamy świadomość wpływu naszej pracy na kreowanie przestrzeni miejskiej. Dlatego tak ważna jest dla nas wysoka jakość inwestycji.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#awardsCarousel .row').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
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

