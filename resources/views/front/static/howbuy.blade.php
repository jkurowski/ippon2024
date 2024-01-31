@extends('layouts.page')

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <div class="container">
        <div class="row mt-0 mt-md-5">
            <div class="col-12 text-center inline">
                <h2 class="section-title" data-modaltytul="5">Jak wygląda proces zakupu mieszkania od dewelopera krok po kroku?</h2>
                <p data-modaleditor="5">Jeżeli zdecydowałeś się na zakup mieszkania od dewelopera, sprawdź jak wygląda cały proces, od momentu wyboru mieszkania do odebrania kluczy do wymarzonego lokalu.</p>
            </div>
        </div>
        <section class="row">
            <div class="col-12 col-sm-4">
                <img src="/uploads/inline/krok-1.jpg" alt="Ustalenie potrzeb" class="golden-border">
            </div>
            <div class="col-12 col-sm-8 d-flex align-items-center inline">
                <div class="ps-0 ps-sm-5">
                    <h2 data-modaltytul="6">Ustalenie potrzeb</h2>
                    <div data-modaleditortext="6"><p>Na tym etapie warto odpowiedzieć sobie na kilka najważniejszych pytań i określić swoje potrzeby.</p>
                        <p>&nbsp;</p>
                        <p><b>W jakiej części miasta chcę zamieszkać?</b></p>
                        <p>Nasze inwestycje cechuje zawsze jedno – najlepsza lokalizacja. Są świetnie skomunikowane, dzięki czemu łączą zalety mieszkania w ciszy i zieleni z możliwością szybkiego dotarcia do centrum. Jeżeli lubisz czuć rytm miasta i doskonałą infrastrukturę okolicy to idealnym wyborem będzie Osiedle Aurora. Osoby ceniące spokój, zieleń oraz ruch na świeżym powietrzu z pewnością docenią Osiedle Slow.</p>
                        <p>&nbsp;</p>
                        <p><b>Czego oczekujesz od osiedla i od mieszkania?</b></p>
                        <p>Sprawdź, czy w pobliżu osiedla znajdują się: sklepy, przedszkola, szkoły, park, czy plenerowa siłownia. Te wszystkie udogodnienia podnoszą jakość i wpływają na komfort życia.</p>
                        <p>Nasze osiedla dają wiele możliwości. Masz do wyboru różnorodne mieszkania w budynkach wielorodzinnych z przestronnymi balkonami, tarasami, ogródkami oraz ogrodami zimowymi. Usiądź wygodnie na kanapie i zapoznaj się z rzutami mieszkań oraz domów, które są dostępne na naszej stronie internetowej, aby dowiedzieć się, jaki układ pomieszczeń oraz metraż najbardziej odpowiadają Twoim oczekiwaniom.</p></div>
                </div>
            </div>
        </section>

        <section class="row flex-row-reverse">
            <div class="col-12 col-sm-4">
                <img src="/uploads/inline/krok-2.jpg" alt="Kontakt z biurem sprzedaży" class="golden-border">
            </div>
            <div class="col-12 col-sm-8 d-flex align-items-center inline">
                <div class="pe-0 pe-sm-5">
                    <h2 data-modaltytul="7">Kontakt z biurem sprzedaży</h2>
                    <div data-modaleditortext="7"><p>Zakup mieszkania to jedna z najważniejszych zakupowych w Twoim życiu, dlatego zawsze pojawia się w tym momencie wiele pytań. Z pewnością zechcesz poznać ofertę w najdrobniejszych szczegółach, obejrzeć zdjęcia, wizualizacje i plany. Wszystkich informacji udzielą Ci nasi doradcy, którzy pozostają do Twojej dyspozycji. Zapraszamy do biura sprzedaży na spotkanie lub jeśli wolisz, jesteśmy do dyspozycji w rozmowie telefonicznej lub internetowej.</p>
                    <p>&nbsp;</p>
                    <p>Zapytaj doradcę, kiedy Twoje mieszkanie będzie gotowe do odbioru i dowiedz się, czy prace budowlane przebiegają zgodnie z harmonogramem. Śledź uważnie naszą stronę internetową oraz profile w mediach społecznościowych, gdzie systematycznie pojawiają się informacje na ten temat. Dokładamy wszelkich starań, by prace budowlane realizowane były zawsze na czas.</p></div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 col-sm-4 d-flex align-items-center">
                <img src="/uploads/inline/krok-3.jpg" alt="Wstępna rezerwacja mieszkania" class="golden-border">
            </div>
            <div class="col-12 col-sm-8 d-flex align-items-center inline">
                <div class="ps-0 ps-sm-5">
                    <h2 data-modaltytul="8">Wstępna rezerwacja mieszkania</h2>
                    <div data-modaleditortext="8"><p>W trakcie spotkania z doradcą możesz bezpłatnie dokonać rezerwacji na 3 dni. Mieszkanie można zarezerwować także telefonicznie lub e-mailowo. Dzięki temu zyskasz czas na podjęcie ostatecznej decyzji. Po 3 dniach należy skontaktować się ponownie z doradcą i podjąć decyzję w sprawie mieszkania.</p></div>
                </div>
            </div>
        </section>

        <section class="row flex-row-reverse">
            <div class="col-12 col-sm-4">
                <img src="/uploads/inline/krok-4.jpg" alt="Umowa rezerwacyjna" class="golden-border">
            </div>
            <div class="col-12 col-sm-8 d-flex align-items-center inline">
                <div class="pe-0 pe-sm-5">
                    <h2 data-modaltytul="9">Umowa rezerwacyjna</h2>
                    <div data-modaleditortext="9"><p>Jeśli podjąłeś już ostateczną decyzję o zakupie mieszkania, nadszedł czas by podpisać z nami tzw. umowę rezerwacyjną. Dopełnieniem rezerwacji jest dokonanie wpłaty w wysokości 1% ceny mieszkania, do 3 dni roboczych od zawarcia umowy. Dbamy o bezpieczeństwo naszych Klientów dlatego nasza umowa zawiera klauzulę, dającą Ci prawo do zwrotu części środków, jeśli uzyskasz decyzje odmowne w sprawie kredytu od przynajmniej dwóch banków. Nasi doradcy pomogą Ci wypełnić komplet dokumentów niezbędnych do zakupu i sfinalizowania umowy.</p></div>
                </div>
            </div>
        </section>

        <div class="section row">
            <div class="col-12 col-sm-4">
                <img src="/uploads/inline/krok05.jpg" alt="Umowa deweloperska – akt notarialny" class="golden-border">
            </div>
            <div class="col-12 col-sm-8 d-flex align-items-center inline">
                <div class="ps-0 ps-sm-5">
                    <h2 data-modaltytul="10">Umowa deweloperska – akt notarialny</h2>
                    <div data-modaleditortext="10"><p>Kolejną umową, którą podpisujemy z deweloperem jest tzw. umowa deweloperska. Na 2 dni przed jej podpisaniem musi nastąpić wyrównanie opłaty do 10% wartości mieszkania. W przeciwieństwie do umowy rezerwacyjnej, umowa deweloperska jest podpisywana w kancelarii notarialnej, a za czynności notariusza należy opłacić tzw. taksę (zgodnie z ustawą deweloperską, cena taksy obciąża po połowie nabywcę mieszkania oraz dewelopera).</p>
                        <p>&nbsp;</p>
                        <p>Gdy już podpiszemy umowę deweloperską, aktualizuje się obowiązek płatności rat. Raty płacimy zgodnie z harmonogramem płatności zapisanym w umowie deweloperskiej. Dbając o bezpieczeństwo środków naszych nabywców – harmonogram jest zawsze kompatybilny z postępami prac na budowie – płacisz za tyle, ile zrealizowaliśmy!</p></div>
                </div>
            </div>
        </div>

        <div class="section row flex-row-reverse">
            <div class="col-12 col-sm-4">
                <img src="/uploads/inline/krok-6.jpg" alt="Przekazanie kluczy i przejęcie własności" class="golden-border">
            </div>
            <div class="col-12 col-sm-8 d-flex align-items-center inline">
                <div class="pe-0 pe-sm-5">
                    <h2 data-modaltytul="11">Przekazanie kluczy i przejęcie własności</h2>
                    <div data-modaleditortext="11"><p>Gdy budynek jest gotowy a deweloper dysponuje pozwoleniem na użytkowanie, odbywa się tzw. odbiór techniczny stanu deweloperskiego domu lub mieszkania oraz przekazanie kluczy nowemu właścicielowi.</p>
                        <p>&nbsp;</p>
                        <p>Ostatni etap to podpisanie umowy przenoszącej własność. Umowa podpisywana jest u notariusza a jej koszty pokrywa nowy właściciel mieszkania.</p></div>
                </div>
            </div>
        </div>
    </div>
@endsection
