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
            <div class="row">
                <div class="col-5 d-flex align-items-center">
                    <div class="pe-5">
                        <h2>W SAMYM SERCU <span>JAROT</span></h2>
                        <p>Osiedle SYNERGIA powstanie w samym centrum dzielnicy mieszkaniowej – Jaroty, przy ul. Kanta. W miejscu dawnego sklepu spożywczo-przemysłowego wybudowany zostanie nowoczesny budynek mieszkalny z lokalami handlowo-usługowymi na parterze. Do jego budowy zostaną użyte materiały najwyższej jakości. Budynek w jasnej kolorystyce z elementami strukturalnej mozaiki na parterze, odświeży i wzbogaci krajobraz dzielnicy Jaroty.</p>
                    </div>
                </div>
                <div class="col-7">
                    <img src="{{ asset('uploads/files/synergia/wizualizacja-budynku-inwestycja-synergia.jpg') }}" alt="" width="930" height="690" />
                </div>
            </div>

            <div class="row flex-row-reverse mt-5 pt-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="ps-5">
                        <h2>MIESZKANIA <br><span>DLA CAŁYCH RODZIN</span></h2>
                        <p>Dostępne są mieszkania od 27 - 80 m2, od kawalerek poprzez mieszkania -2, -3 oraz 4 pokojowe. Mieszkańcy zagwarantowane będą mieli miejsca parkingowe w garażu podziemnym, miejsca parkingowe naziemne oraz dostęp do komórek lokatorskich. Wszystkie kondygnacje w budynku będą obsługiwane przez cichobieżne windy.</p>
                    </div>
                </div>
                <div class="col-7"><img src="https://placehold.co/930x690" alt="" /></div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="pe-5">
                        <h2><span>GARAŻ PODZIEMNY</span> <br>DLA MIESZKAŃCÓW</h2>
                        <p>Mieszkańcy będą mieli do dyspozycji indywidualne miejsca parkingowe na wielostanowiskowym parkingu podziemnym. Bezpośrednio do poziomu garażu zjeżdża winda, która ułatwi transportowanie np. zakupów, wprost do mieszkania. Dodatkowo mieszkańcy i ich goście, mogą korzystać z zewnętrznych miejsc postojowych, znajdujących się przed budynkiem.</p>
                    </div>
                </div>
                <div class="col-7"><img src="https://placehold.co/930x690" alt="" /></div>
            </div>

            <div class="row flex-row-reverse mt-5 pt-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="ps-5">
                        <h2>ZIELONE <span>PATIO</span></h2>
                        <p>SYNERGIA to nowoczesny budynek z wewnętrznym, zielonym dziedzińcem. Będzie to teren wyłącznie dla mieszkańców budynku. Skorzystają oni z alejek spacerowych, miejsc wypoczynku ze strefą rekreacji oraz bezpiecznego placu zabaw dla dzieci. Pojawią się drzewa i roślinność. Na teren patio będą także wychodzić mieszkania z prywatnymi ogródkami. Będzie więc to miejsce zielone, kameralne i bezpieczne.</p>
                    </div>
                </div>
                <div class="col-7">
                    <img src="{{ asset('uploads/files/synergia/zielone-patio.jpg') }}" alt="" width="930" height="690" />
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-4 d-flex align-items-center">
                    <div class="pe-5">
                        <h2>WSZĘDZIE <span>BLISKO</span></h2>
                        <p>Jaroty to największa dzielnica miasta. W pobliżu osiedla znajduje się wiele punktów handlowo – usługowych. Po sąsiedzku mieszkańcy będą mieli dostęp do piekarni, aptek, poczty, przychodni, siłowni, restauracji, drogerii czy sklepów odzieżowych. W 2 minuty można dojść do przystanku autobusowego. W kilka minut dojechać do szkoły podstawowej, przedszkola oraz Galerii Warmińskiej.</p>
                    </div>
                </div>
                <div class="col-8"><iframe title="YouTube video player" src="https://www.youtube.com/embed/5OleowHAz7k?si=r9R-kaftgCff8ZXu" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
            </div>

            <div class="row flex-row-reverse mt-5 pt-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="ps-5">
                        <h2><span>BEZ BARIER</span> <br>ARCHITEKTONICZNYCH</h2>
                        <p>Każde mieszkanie zostało dopracowane w najmniejszym szczególe, by zagwarantować komfort i wygodę użytkowania dla przyszłych mieszkańców. Lokale zostały odpowiednio doświetlone i wyciszone. Każde mieszkanie posiada do wybory balkon, ogródek lub duży taras. Budynek został zaprojektowany bez barier architektonicznych. Oznacza to, że wszystkie mieszkania oraz kondygnacje z komórkami lokatorskimi są dostępne dla osób starszych i niepełnosprawnych.</p>
                    </div>
                </div>
                <div class="col-7">
                    <img src="https://placehold.co/930x690" alt="Zadowoleni klienci z zakupów blisko osiedla" width="930" height="690"/>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="pe-5">
                        <h2>STREFY <span>REKREACJI</span></h2>
                        <p>Na wewnętrznym dziedzińcu znajdzie się nie tylko plac zabaw dla dzieci, ale także alejki spacerowe, ławki oraz drzewa i roślinność. Powstaną także specjalne strefy rekreacji, które będą miejscem spotkań oraz odpoczynku. Dostęp do patio będzie wyłącznie dla mieszkańców osiedla SYNERGIA.</p>
                    </div>
                </div>
                <div class="col-7">
                    <img src="{{ asset('uploads/files/synergia/strefa-rekreacji.jpg') }}" alt="" width="930" height="690" />
                </div>
            </div>

            <div class="row flex-row-reverse mt-5 pt-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="ps-5">
                        <h2><span>NOWOCZESNY I ELEGANCKI</span> PROJEKT</h2>
                        <p>Klatki schodowe to połączenie nowoczesności i elegancji. Pojawiły się fototapety nawiązujące do aktywnego życia w mieście, duże lustra oraz oryginalne oświetlenie w postaci niesymetrycznych lamp. Modne połączenie kolorystyczne bieli, szarości oraz szałwii, dodało wnętrzu ponadczasowego wyglądu.</p>
                    </div>
                </div>
                <div class="col-7">
                    <img src="{{ asset('uploads/files/synergia/nowoczesny-i-elegancki-projekt.jpg') }}" alt="" width="930" height="690" />
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="pe-5">
                        <h2>WYKOŃCZONY <span>TARAS</span> <br>W STANDARDZIE</h2>
                        <p>Do wybranych mieszkań na poziomie +1 dodatkowo przynależą tarasy, które osiągają powierzchnię do 63 m2. Dla wygody mieszkańców, zostaną one wykończone w standardzie, płytą gresową. Tarasy oddzielone będą od siebie, przegrodami, które zapewnią większą intymność i dodadzą kameralnego charakteru.</p>
                    </div>
                </div>
                <div class="col-7">
                    <img src="{{ asset('uploads/files/synergia/taras.jpg') }}" alt="" width="930" height="690" />
                </div>
            </div>

            <div class="row flex-row-reverse mt-5 pt-5 mb-5 pb-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="ps-5">
                        <h2>HANDEL I <span>USŁUGI</span></h2>
                        <p>Na poziomie parteru przewidziane są lokale handlowo-usługowe. Dla klientów sklepów powstaną dodatkowe miejsca parkingowe, chodniki oraz oświetlenie. Mieszkańcy będą więc mieli szybki dostęp do sklepu spożywczego i punktów usługowych.</p>
                    </div>
                </div>
                <div class="col-7">
                    <img src="{{ asset('uploads/files/synergia/lokale-uslugowe.jpg') }}" alt="" width="930" height="690" />
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <link href="https://fonts.cdnfonts.com/css/modern-age" rel="stylesheet">
    <script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>
@endpush
