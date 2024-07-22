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
                        <p>Osiedle SYNERGIA powstanie w samym centrum dzielnicy mieszkaniowej – Jaroty, przy ul. Kanta. W miejscu dawnego sklepu spożywczo-przemysłowego wybudowany zostanie <b>nowoczesny budynek mieszkalny</b> z lokalami handlowo-usługowymi na parterze. Do jego budowy zostaną użyte <b>materiały najwyższej jakości</b>. Budynek w <b>jasnej kolorystyce</b> z elementami strukturalnej mozaiki na parterze, odświeży i wzbogaci krajobraz dzielnicy Jaroty.</p>
                        <a href="#" class="bttn bttn-icon mt-5 bttn-synergia">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
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
                        <p>Dostępne są mieszkania od 27 - 80 m<sup>2</sup>, <b>od kawalerek poprzez mieszkania -2, -3 oraz 4 pokojowe</b>. Mieszkańcy zagwarantowane będą mieli miejsca parkingowe w <b>garażu podziemnym</b>, miejsca parkingowe naziemne oraz dostęp do komórek lokatorskich. Wszystkie kondygnacje w budynku będą obsługiwane przez cichobieżne <b>windy</b>.</p>
                        <a href="#" class="bttn bttn-icon mt-5 bttn-synergia">Mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-7"><img src="{{ asset('uploads/files/synergia/mieszkania-dla-calych-rodzin.jpg') }}" alt="" width="930" height="654" /></div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="pe-5">
                        <h2><span>GARAŻ PODZIEMNY</span> <br>DLA MIESZKAŃCÓW</h2>
                        <p>Mieszkańcy będą mieli do dyspozycji indywidualne miejsca parkingowe na <b>wielostanowiskowym parkingu podziemnym</b>. Bezpośrednio do poziomu garażu zjeżdża winda, która ułatwi transportowanie np. zakupów, wprost do mieszkania. Dodatkowo mieszkańcy i ich goście, mogą korzystać z <b>zewnętrznych miejsc postojowych</b>, znajdujących się przed budynkiem.</p>
                        <a href="#" class="bttn bttn-icon mt-5 bttn-synergia">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-7"><img src="{{ asset('uploads/files/synergia/garaz.jpg') }}" alt="" width="930" height="654" /></div>
            </div>

            <div class="row flex-row-reverse mt-5 pt-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="ps-5">
                        <h2>ZIELONE <span>PATIO</span></h2>
                        <p>SYNERGIA to nowoczesny budynek z <b>wewnętrznym, zielonym dziedzińcem</b>. Będzie to teren wyłącznie dla mieszkańców budynku. Skorzystają oni z alejek spacerowych, miejsc wypoczynku ze <b>strefą rekreacji</b> oraz bezpiecznego <b>placu zabaw</b> dla dzieci. Pojawią się drzewa i <b>roślinność</b>. Na teren patio będą także wychodzić mieszkania z prywatnymi ogródkami. Będzie więc to miejsce <b>zielone, kameralne i bezpieczne</b>.</p>
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
                        <p>Jaroty to największa dzielnica miasta. W pobliżu osiedla znajduje się <b>wiele punktów handlowo – usługowych</b>. Po sąsiedzku mieszkańcy będą mieli dostęp do piekarni, aptek, poczty, przychodni, siłowni, restauracji, drogerii czy sklepów odzieżowych. W 2 minuty można dojść do przystanku autobusowego. W kilka minut dojechać do szkoły podstawowej, przedszkola oraz Galerii Warmińskiej.</p>
                    </div>
                </div>
                <div class="col-8"><iframe title="YouTube video player" src="https://www.youtube.com/embed/5OleowHAz7k?si=r9R-kaftgCff8ZXu" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
            </div>

            <div class="row flex-row-reverse mt-5 pt-5">
                <div class="col-5 d-flex align-items-center">
                    <div class="ps-5">
                        <h2><span>BEZ BARIER</span> <br>ARCHITEKTONICZNYCH</h2>
                        <p>Każde mieszkanie zostało dopracowane w najmniejszym szczególe, by zagwarantować <b>komfort i wygodę</b> użytkowania dla przyszłych mieszkańców. Lokale zostały odpowiednio doświetlone i wyciszone. Każde mieszkanie posiada do wybory <b>balkon, ogródek lub duży taras</b>. Budynek został zaprojektowany <b>bez barier architektonicznych</b>. Oznacza to, że wszystkie mieszkania oraz kondygnacje z komórkami lokatorskimi są <b>dostępne dla osób starszych i niepełnosprawnych</b>.</p>
                        <a href="#" class="bttn bttn-icon mt-5 bttn-synergia">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
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
                        <p>Na wewnętrznym dziedzińcu znajdzie się nie tylko plac zabaw dla dzieci, ale także <b>alejki spacerowe</b>, ławki oraz <b>drzewa</b> i <b>roślinność</b>. Powstaną także specjalne <b>strefy rekreacji</b>, które będą miejscem spotkań oraz odpoczynku. Dostęp do patio będzie <b>wyłącznie dla mieszkańców</b> osiedla SYNERGIA.</p>
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
                        <p>Klatki schodowe to połączenie <b>nowoczesności i elegancji</b>. Pojawiły się <b>fototapety</b> nawiązujące do aktywnego życia w mieście, <b>duże lustra</b> oraz oryginalne oświetlenie w postaci niesymetrycznych lamp. Modne <b>połączenie</b> kolorystyczne <b>bieli, szarości oraz szałwii</b>, dodało wnętrzu ponadczasowego wyglądu.</p>
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
                        <p>Do wybranych mieszkań na poziomie +1 dodatkowo przynależą tarasy, które osiągają powierzchnię do 63 m2. Dla wygody mieszkańców, zostaną one <b>wykończone w standardzie</b>, płytą gresową. Tarasy oddzielone będą od siebie, przegrodami, które zapewnią większą intymność i dodadzą kameralnego charakteru.</p>
                        <a href="#" class="bttn bttn-icon mt-5 bttn-synergia">Sprawdź mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
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
                        <p>Na poziomie parteru przewidziane są <b>lokale handlowo-usługowe</b>. Dla klientów sklepów powstaną <b>dodatkowe miejsca parkingowe</b>, chodniki oraz oświetlenie. Mieszkańcy będą więc mieli szybki dostęp do sklepu spożywczego i punktów usługowych.</p>
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
    <link rel="stylesheet" href="https://use.typekit.net/sjn7rrp.css">
    <script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>
@endpush
