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
    <div class="container">
        <div class="row">
            <div class="col-12 text-center inline">
                @if($current_locale == 'pl')
                <h2 class="section-title">Jak wygląda proces zakupu mieszkania od dewelopera krok po kroku?</h2>
                <p>Jeżeli zdecydowałeś się na zakup mieszkania od dewelopera, sprawdź jak wygląda cały proces, od momentu wyboru mieszkania do odebrania kluczy do wymarzonego lokalu.</p>
                @else
                <h2 class="section-title">Process of purchasing an apartment from a developer - step by step. </h2>
                <p>If you've decided to purchase an apartment from a developer, learn about the entire process, from selecting an apartment to receiving the keys to your dream property.</p>
                @endif
            </div>
        </div>
        <section class="row">
            <div class="col-12 col-lg-4">
                <img src="/uploads/inline/krok-1.jpg" alt="Ustalenie potrzeb" class="golden-border w-100">
            </div>
            <div class="col-12 col-lg-8 d-flex align-items-center inline">
                <div class="ps-0 ps-lg-5 pt-4 pt-lg-0">
                    @if($current_locale == 'pl')
                    <h2 data-modaltytul="6">Ustalenie potrzeb</h2>
                    <div data-modaleditortext="6">
                        <p>Na tym etapie warto odpowiedzieć sobie na kilka najważniejszych pytań i określić swoje potrzeby.</p>
                        <p>&nbsp;</p>
                        <p><b>W jakiej części miasta chcę zamieszkać?</b></p>
                        <p>Nasze inwestycje cechuje zawsze jedno – najlepsza lokalizacja. Są świetnie skomunikowane, dzięki czemu łączą zalety mieszkania w ciszy i zieleni z możliwością szybkiego dotarcia do centrum. Jeżeli lubisz czuć rytm miasta i doskonałą infrastrukturę okolicy to idealnym wyborem będzie Osiedle Aurora. Osoby ceniące spokój, zieleń oraz ruch na świeżym powietrzu z pewnością docenią Osiedle Slow.</p>
                        <p>&nbsp;</p>
                        <p><b>Czego oczekujesz od osiedla i od mieszkania?</b></p>
                        <p>Sprawdź, czy w pobliżu osiedla znajdują się: sklepy, przedszkola, szkoły, park, czy plenerowa siłownia. Te wszystkie udogodnienia podnoszą jakość i wpływają na komfort życia.</p>
                        <p>Nasze osiedla dają wiele możliwości. Masz do wyboru różnorodne mieszkania w budynkach wielorodzinnych z przestronnymi balkonami, tarasami, ogródkami oraz ogrodami zimowymi. Usiądź wygodnie na kanapie i zapoznaj się z rzutami mieszkań oraz domów, które są dostępne na naszej stronie internetowej, aby dowiedzieć się, jaki układ pomieszczeń oraz metraż najbardziej odpowiadają Twoim oczekiwaniom.</p>
                    </div>
                    @else
                        <h2 data-modaltytul="6">Defining Your Needs</h2>
                        <div data-modaleditortext="6">
                            <p>At this stage, it's crucial to answer a few key questions and determine your needs.</p>
                            <p>&nbsp;</p>
                            <p><b>Where in the city do I want to live?</b></p>
                            <p>Our developments always have one thing in common - the best location. They are excellently connected, combining the benefits of living in tranquility and greenery with quick access to the city center. If you prefer the rhythm of the city and excellent local infrastructure, Osiedle Aurora is an ideal choice. Individuals valuing peace, greenery, and outdoor activities will surely appreciate Osiedle Slow.</p>
                            <p>&nbsp;</p>
                            <p><b>What do you expect from the estate and the apartment?</b></p>
                            <p>At the begining, consider which elements will be crucial when selecting a new estate. If you're looking for a city center estate, check whether there are shops, kindergartens, schools, parks, or outdoor fitness areas nearby. Access to public transportation like buses, trams, and bike paths is also essential. If you're looking for an apartment on the outskirts, away from the city hustle, pay attention to the surroundings, resident amenities, and proximity to nature. All these conveniences enhance the quality of life.</p>
                            <p>Our estates offer various possibilities. You can choose from diverse apartments in multi-story buildings with spacious balconies, terraces, gardens, and winter gardens. Sit comfortably on your couch and review the apartment and house plans available on our website to find the layout and size that align with your expectations.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="row flex-row-reverse">
            <div class="col-12 col-lg-4">
                <img src="/uploads/inline/krok-2.jpg" alt="Kontakt z biurem sprzedaży" class="golden-border w-100">
            </div>
            <div class="col-12 col-lg-8 d-flex align-items-center inline">
                <div class="pe-0 pe-lg-5 pt-4 pt-lg-0">
                    @if($current_locale == 'pl')
                    <h2 data-modaltytul="7">Kontakt z biurem sprzedaży</h2>
                    <div data-modaleditortext="7">
                        <p>Zakup mieszkania to jedna z najważniejszych zakupowych w Twoim życiu, dlatego zawsze pojawia się w tym momencie wiele pytań. Z pewnością zechcesz poznać ofertę w najdrobniejszych szczegółach, obejrzeć zdjęcia, wizualizacje i plany. Wszystkich informacji udzielą Ci nasi doradcy, którzy pozostają do Twojej dyspozycji. Zapraszamy do biura sprzedaży na spotkanie lub jeśli wolisz, jesteśmy do dyspozycji w rozmowie telefonicznej lub internetowej.</p>
                        <p>&nbsp;</p>
                        <p>Zapytaj doradcę, kiedy Twoje mieszkanie będzie gotowe do odbioru i dowiedz się, czy prace budowlane przebiegają zgodnie z harmonogramem. Śledź uważnie naszą stronę internetową oraz profile w mediach społecznościowych, gdzie systematycznie pojawiają się informacje na ten temat. Dokładamy wszelkich starań, by prace budowlane realizowane były zawsze na czas.</p>
                    </div>
                    @else
                        <h2 data-modaltytul="7">Contacting with the Sales Office</h2>
                        <div data-modaleditortext="7">
                            <p>Buying an apartment is one of the most important purchases in your life, so it naturally comes with many questions. You'll definitely want to explore the offer in detail, view photos, visualizations, and plans. Our advisors are here to provide all the information you need and remain at your service. Feel free to visit our sales office for a meeting, or if you prefer, you can connect with us over the phone or through email.</p>
                            <p>&nbsp;</p>
                            <p>Ask the advisor when your apartment will be ready for handover and inquire about the progress of construction. Keep a close eye on our website and social media profiles, where we systematically share updates on this topic. We make every effort to ensure construction works are always on schedule.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 col-lg-4 d-flex align-items-center">
                <img src="/uploads/inline/krok-3.jpg" alt="Wstępna rezerwacja mieszkania" class="golden-border w-100">
            </div>
            <div class="col-12 col-lg-8 d-flex align-items-center inline">
                <div class="ps-0 ps-lg-5 pt-4 pt-lg-0">
                    @if($current_locale == 'pl')
                    <h2 data-modaltytul="8">Wstępna rezerwacja mieszkania</h2>
                    <div data-modaleditortext="8">
                        <p>W trakcie spotkania z doradcą możesz bezpłatnie dokonać rezerwacji na 3 dni. Mieszkanie można zarezerwować także telefonicznie lub e-mailowo. Dzięki temu zyskasz czas na podjęcie ostatecznej decyzji. Po 3 dniach należy skontaktować się ponownie z doradcą i podjąć decyzję w sprawie mieszkania.</p>
                    </div>
                    @else
                        <h2 data-modaltytul="8">Initial Reservation of the Apartment</h2>
                        <div data-modaleditortext="8">
                        <p>During the meeting with the advisor, you can make a free reservation for 3 days. You can also reserve an apartment over the phone or by email. This gives you time to make a final decision. After 3 days, contact the advisor again and decide on the apartment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="row flex-row-reverse">
            <div class="col-12 col-lg-4">
                <img src="/uploads/inline/krok-4.jpg" alt="Umowa rezerwacyjna" class="golden-border w-100">
            </div>
            <div class="col-12 col-lg-8 d-flex align-items-center inline">
                <div class="pe-0 pe-lg-5 pt-4 pt-lg-0">
                    @if($current_locale == 'pl')
                    <h2 data-modaltytul="9">Umowa rezerwacyjna</h2>
                    <div data-modaleditortext="9">
                        <p>Jeśli podjąłeś już ostateczną decyzję o zakupie mieszkania, nadszedł czas by podpisać z nami tzw. umowę rezerwacyjną. Dopełnieniem rezerwacji jest dokonanie wpłaty w wysokości 1% ceny mieszkania, do 3 dni roboczych od zawarcia umowy. Dbamy o bezpieczeństwo naszych Klientów dlatego nasza umowa zawiera klauzulę, dającą Ci prawo do zwrotu części środków, jeśli uzyskasz decyzje odmowne w sprawie kredytu od przynajmniej dwóch banków. Nasi doradcy pomogą Ci wypełnić komplet dokumentów niezbędnych do zakupu i sfinalizowania umowy.</p>
                    </div>
                    @else
                        <h2 data-modaltytul="9">Reservation Agreement</h2>
                        <div data-modaleditortext="9">
                            <p>If you've made your final decision to purchase the apartment, it's time to sign a so-called reservation agreement with us. Completing the reservation involves making a payment of 1% of the apartment's price within 3 business days of signing the agreement. Ensuring our customers' security, our agreement includes a clause that grants you the right to a partial refund if you receive loan rejections from at least two banks. Our advisors will assist you in completing the necessary documentation for the purchase and finalizing the agreement.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 col-lg-4">
                <img src="/uploads/inline/krok05.jpg" alt="Umowa deweloperska – akt notarialny" class="golden-border w-100">
            </div>
            <div class="col-12 col-lg-8 d-flex align-items-center inline">
                <div class="ps-0 ps-lg-5 pt-4 pt-lg-0">
                    @if($current_locale == 'pl')
                    <h2 data-modaltytul="10">Umowa deweloperska – akt notarialny</h2>
                    <div data-modaleditortext="10">
                        <p>Kolejną umową, którą podpisujemy z deweloperem jest tzw. umowa deweloperska. Na 2 dni przed jej podpisaniem musi nastąpić wyrównanie opłaty do 10% wartości mieszkania. W przeciwieństwie do umowy rezerwacyjnej, umowa deweloperska jest podpisywana w kancelarii notarialnej, a za czynności notariusza należy opłacić tzw. taksę (zgodnie z ustawą deweloperską, cena taksy obciąża po połowie nabywcę mieszkania oraz dewelopera).</p>
                        <p>&nbsp;</p>
                        <p>Gdy już podpiszemy umowę deweloperską, aktualizuje się obowiązek płatności rat. Raty płacimy zgodnie z harmonogramem płatności zapisanym w umowie deweloperskiej. Dbając o bezpieczeństwo środków naszych nabywców – harmonogram jest zawsze kompatybilny z postępami prac na budowie – płacisz za tyle, ile zrealizowaliśmy!</p>
                    </div>
                    @else
                        <h2 data-modaltytul="10">Developer Agreement - Notarial Deed</h2>
                        <div data-modaleditortext="10">
                            <p>The next agreement we sign with the developer is the so-called developer agreement. It's necessary to balance the payment to 10% of the apartment's value within 2 days before signing this agreement. Unlike the reservation agreement, the developer agreement is signed in a notary's office, and the notary's fee (in accordance with the developer law) is split between the apartment buyer and the developer.</p>
                            <p>&nbsp;</p>
                            <p>Once the developer agreement is signed, the payment schedule is updated. Payments are made according to the payment schedule outlined in the developer agreement. Ensuring the safety of our buyers' funds, the payment schedule is always aligned with the progress of construction - you pay for what we've completed!</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="row flex-row-reverse">
            <div class="col-12 col-lg-4">
                <img src="/uploads/inline/krok-6.jpg" alt="Przekazanie kluczy i przejęcie własności" class="golden-border w-100">
            </div>
            <div class="col-12 col-lg-8 d-flex align-items-center inline">
                <div class="pe-0 pe-lg-5 pt-4 pt-lg-0">
                    @if($current_locale == 'pl')
                    <h2 data-modaltytul="11">Przekazanie kluczy i przejęcie własności</h2>
                    <div data-modaleditortext="11">
                        <p>Gdy budynek jest gotowy a deweloper dysponuje pozwoleniem na użytkowanie, odbywa się tzw. odbiór techniczny stanu deweloperskiego domu lub mieszkania oraz przekazanie kluczy nowemu właścicielowi.</p>
                        <p>&nbsp;</p>
                        <p>Ostatni etap to podpisanie umowy przenoszącej własność. Umowa podpisywana jest u notariusza a jej koszty pokrywa nowy właściciel mieszkania.</p>
                    </div>
                    @else
                        <h2 data-modaltytul="11">Keys Handover and Property Acquisition</h2>
                        <div data-modaleditortext="11">
                            <p>When the building is ready and the developer has obtained an occupancy permit, a technical acceptance of the developer's state of the house or apartment takes place, along with the handover of keys to the new owner.</p>
                            <p>&nbsp;</p>
                            <p>The final stage involves signing a contract that transfers ownership. This contract is signed with a notary, and the costs are covered by the new apartment owner.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — makieta "JAK KUPIĆ MIESZKANIE V1"
     Makieta jest wygenerowana przez AI (nie ma jej w Figmie), wiec uklad
     odtworzony ze zrzutu. Rozne wzgledem obrazka, swiadomie:
       - tytuly krokow i pytania FAQ w Playfair, jak reszta serwisu (makieta
         miala grotesk — typografia calego frontu jest wazniejsza),
       - zdjecia krokow NIE sa z makiety (ta byla tylko podgladem, a wycinki
         mialy 785 px i pikselowaly sie po dosunieciu do krawedzi karty).
         09.2026 wygenerowane pod tresc krokow (Higgsfield, GPT Image 2.5,
         21:9, 2k) w zywych kolorach — uwaga klientki; w public/images/howbuy/
         przeskalowane do 1650 px (2x szerokosci wyswietlania). Klucz 'pos'
         przesuwa kadr tam, gdzie waski pas 4:1 na tablecie ucinal glowy.
     Tresc krokow spisana z makiety, EN od klienta ("Jak kupic mieszkanie
     09.2026.docx"). FAQ nie jest juz tutaj — od 09.2026 siedzi w module FAQ
     w CMS-ie. Przeniesione zostaly oba zestawy: 7 pytan PL (na bazie starej
     podstrony, DO POTWIERDZENIA PRZEZ KLIENTA) i 14 pytan EN z pliku klienta.
     Nie sa swoimi tlumaczeniami — kazdy wpis ma na razie jeden jezyk.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    $kroki = [
        [
            'num' => '01', 'ico' => '01', 'media' => 'foto', 'img' => 'images/howbuy/krok-1.jpg', 'pos' => 'center 30%', 'ai' => true,
            'title' => ['pl' => 'Wybór mieszkania', 'en' => 'Choosing an apartment'],
            'sub'   => ['pl' => 'dopasowanego do Twoich potrzeb', 'en' => 'that fits your needs'],
            'desc'  => [
                'pl' => 'Rozmawiamy o Twoich potrzebach i oczekiwaniach. Prezentujemy plany, układy pomieszczeń i standardy wykończenia. Dzięki makiecie 3D zobaczysz całe osiedle, swoje mieszkanie i widok z balkonu.',
                'en' => 'We talk about your needs and expectations. We show you the plans, apartment layouts and finishing standards. With our 3D model, you can see the whole development, your apartment and the view from your balcony.',
            ],
        ],
        [
            'num' => '02', 'ico' => '02', 'media' => 'panel',
            'title' => ['pl' => 'Umowa rezerwacyjna', 'en' => 'Reservation agreement'],
            'sub'   => ['pl' => 'oraz opłata', 'en' => 'and fee'],
            'desc'  => [
                /* PL zmieniony przez klienta 09.2026 (zwrot przy negatywnej decyzji
                   kredytowej). W docx EN zostalo jeszcze "if the purchase does not go
                   ahead" — koncowka EN dopasowana do nowego PL, DO POTWIERDZENIA. */
                'pl' => 'Podpisujemy umowę rezerwacyjną i wpłacasz opłatę rezerwacyjną w wysokości 1% ceny brutto mieszkania. Środki są w pełni bezpieczne – jeśli otrzymasz negatywną decyzję kredytową, otrzymasz zwrot.',
                'en' => 'We sign a reservation agreement and you pay a reservation fee equal to 1% of the gross price of the apartment. Your money is fully protected – if your mortgage application is declined, the fee will be refunded.',
            ],
            'panel' => [
                'pl' => 'Otrzymasz od nas Prospekt Informacyjny – jednolity dokument prawny, który opisuje status działki, parametry techniczne budynku oraz planowane inwestycje w okolicy.',
                'en' => 'You will receive an Information Prospectus from us – an official document that provides information about the legal status of the land, the technical details of the building and planned developments in the area.',
            ],
        ],
        [
            'num' => '03', 'ico' => '03', 'media' => 'foto', 'img' => 'images/howbuy/krok-3.jpg', 'ai' => true,
            'title' => ['pl' => 'Czas na finansowanie –', 'en' => 'Time to arrange financing –'],
            'sub'   => ['pl' => 'formalności kredytowe', 'en' => 'mortgage formalities'],
            'desc'  => [
                'pl' => 'Masz czas na dopełnienie formalności kredytowych. Przygotowujemy komplet dokumentów prawnych i technicznych potrzebnych do złożenia wniosku kredytowego w wybranym banku.',
                'en' => 'You have time to complete the mortgage formalities. We prepare all the legal and technical documents you need to apply for a mortgage at the bank of your choice.',
            ],
        ],
        [
            'num' => '04', 'ico' => '04', 'media' => 'foto', 'img' => 'images/howbuy/krok-4.jpg', 'ai' => true, 'ai_light' => true,
            'title' => ['pl' => 'Umowa deweloperska', 'en' => 'Development agreement'],
            'sub'   => ['pl' => 'w formie aktu notarialnego', 'en' => 'signed before a notary'],
            'desc'  => [
                'pl' => 'Po potwierdzeniu finansowania podpisujemy umowę deweloperską u notariusza. Koszty taksy i wpisów dzielone są po połowie.',
                'en' => 'Once your financing is confirmed, we sign the development agreement before a notary. The notary fees and registration costs are shared equally between you and the developer.',
            ],
        ],
        [
            'num' => '05', 'ico' => '05', 'media' => 'schemat',
            'title' => ['pl' => 'Bezpieczne wpłaty', 'en' => 'Secure payments'],
            'sub'   => ['pl' => 'na Mieszkaniowy Rachunek Powierniczy', 'en' => 'to a Housing Escrow Account'],
            'desc'  => [
                'pl' => 'Twoje pieniądze są maksymalnie chronione zgodnie z nową ustawą deweloperską.',
                'en' => 'Your money is fully protected in line with the new Developer Act.',
            ],
        ],
        [
            'num' => '06', 'ico' => '06', 'media' => 'foto', 'img' => 'images/howbuy/krok-6.jpg', 'pos' => 'center 25%', 'ai' => true,
            'title' => ['pl' => 'Pozwolenie na użytkowanie', 'en' => 'Occupancy permit'],
            'sub'   => ['pl' => 'i Odbiór Techniczny', 'en' => 'and technical inspection'],
            'desc'  => [
                'pl' => 'Po zakończeniu budowy i uzyskaniu pozwolenia na użytkowanie zapraszamy na odbiór techniczny mieszkania. Usterki wpisujemy do protokołu – mamy 14 dni na ustosunkowanie się do nich i 30 dni na ich usunięcie. Po podpisaniu protokołu otrzymujesz klucze do mieszkania.',
                'en' => 'Once construction is complete and the occupancy permit has been issued, we invite you to inspect your apartment. Any defects are recorded in the inspection report. We have 14 days to respond and 30 days to fix them. After you sign the report, you receive the keys to your apartment.',
            ],
        ],
        [
            'num' => '07', 'ico' => '07', 'media' => 'foto', 'img' => 'images/howbuy/krok-7.jpg', 'ai' => true,
            'title' => ['pl' => 'Przeniesienie własności', 'en' => 'Transfer of ownership –'],
            'sub'   => ['pl' => '(Umowa przyrzeczona)', 'en' => 'final agreement'],
            'desc'  => [
                'pl' => 'Ostatnim krokiem jest podpisanie u notariusza umowy przeniesienia własności. Koszty podpisania aktu pokrywa nowy właściciel. Od tej chwili stajesz się pełnoprawnym właścicielem nieruchomości.',
                'en' => 'The final step is signing the ownership transfer agreement before a notary. The new owner covers the costs of the notarial deed. From that moment, you become the legal owner of the property.',
            ],
        ],
    ];

    /* Schemat przy kroku 05 */
    $schemat = [
        ['icon' => 'bank', 'title' => ['pl' => 'Wpłata', 'en' => 'Payment'],
         'desc' => ['pl' => 'Środki trafiają na Mieszkaniowy Rachunek Powierniczy prowadzony przez niezależny bank.',
                    'en' => 'Your money is paid into a Housing Escrow Account managed by an independent bank.']],
        ['icon' => 'dzwig', 'title' => ['pl' => 'Kontrola', 'en' => 'Control'],
         'desc' => ['pl' => 'Bank wypłaca środki deweloperowi dopiero po zakończeniu etapu budowy, co potwierdza niezależny inspektor budowlany.',
                    'en' => 'The bank transfers the money to the developer only after a stage of construction has been completed and confirmed by an independent building inspector.']],
        ['icon' => 'tarcza', 'title' => ['pl' => 'Dodatkowe zabezpieczenie', 'en' => 'Additional protection'],
         'desc' => ['pl' => 'Wszystkie wpłaty są dodatkowo zabezpieczone przez Deweloperski Fundusz Gwarancyjny (DFG).',
                    'en' => 'All payments are also protected by the Developer Guarantee Fund (DFG).']],
    ];


    /* FAQ nie jest juz w widoku — pytania i odpowiedzi siedza w module FAQ
       w CMS-ie (tabela `faqs`, kolejnosc przeciaganiem wiersza). Kolekcja
       $faq przychodzi z Static\IndexController@howbuy, juz przefiltrowana
       do aktywnego jezyka, jako lista ['q' => ..., 'a' => ...]. */
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl' ? 'Jak wygląda proces zakupu mieszkania?' : 'What does buying an apartment look like?',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Strefa Klienta' : 'Customer Zone', 'url' => null],
            ['label' => $L == 'pl' ? 'Jak kupić mieszkanie?' : 'How to buy an apartment?', 'url' => null],
        ],
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    {{-- Kroki procesu — os czasu z ikonami, numerem i trescia po prawej --}}
    <section class="ip-section ip-steps-section">
        <div class="container">
            @foreach($kroki as $krok)
                <article class="ip-step">

                    <div class="ip-step-rail">
                        {{-- Ikonki krokow od klienta (09.2026), zrodla w
                             public/materialy_klienta/jak_kupic_mieszkanie_kroki.
                             Przyciete do tresci i wyrownane dluzszym bokiem na plotnie
                             160 px, zeby w kolku mialy te sama wage — surowe pliki mialy
                             rozne marginesy (od 630 do 1095 px tresci na 1254 px).
                             Dekoracyjne: krok ma juz numer i tytul, stad puste alt. --}}
                        <span class="ip-step-icon">
                            <img src="{{ asset('images/howbuy/ikony/'.$krok['ico'].'.png') }}?v={{ @filemtime(public_path('images/howbuy/ikony/'.$krok['ico'].'.png')) }}"
                                 alt="" aria-hidden="true" width="160" height="160">
                        </span>
                        <span class="ip-step-line"></span>
                    </div>

                    <div class="ip-step-num">{{ $krok['num'] }}</div>

                    <div class="ip-step-body">
                        <h2 class="ip-step-title">
                            {{ $krok['title'][$L] }}
                            <span>{{ $krok['sub'][$L] }}</span>
                        </h2>
                        <p class="ip-step-desc">{{ $krok['desc'][$L] }}</p>
                    </div>

                    <div class="ip-step-media @if($krok['media'] == 'foto') is-photo @endif">
                        @switch($krok['media'])
                            @case('foto')
                                {{-- ?v=filemtime: plik podmieniany pod ta sama nazwa, bez tego przegladarki trzymaja stare zdjecie z cache --}}
                                <img src="{{ asset($krok['img']) }}?v={{ @filemtime(public_path($krok['img'])) }}" alt="{{ $krok['title'][$L] }}" width="1650" height="707"
                                     @if(!empty($krok['pos'])) style="object-position: {{ $krok['pos'] }}" @endif>
                                {{-- Oznaczenie zdjec wygenerowanych przez AI (przejrzystosc wobec
                                     odwiedzajacych). Przy prawdziwym zdjeciu usun 'ai' z tablicy.
                                     'ai_light' tam, gdzie prawy dolny rog zdjecia jest ciemny
                                     i ciemna plakietka by w nim zginela (zmierzone: krok-4). --}}
                                @if(!empty($krok['ai']))
                                    <x-ai-badge :light="!empty($krok['ai_light'])" />
                                @endif
                                @break

                            @case('panel')
                                <div class="ip-step-note">
                                    <span class="ip-step-note-icon">@include('front.static.howbuy-icon', ['name' => 'tarcza'])</span>
                                    <p>{{ $krok['panel'][$L] }}</p>
                                </div>
                                @break

                            @case('schemat')
                                <ul class="ip-step-flow list-unstyled mb-0">
                                    @foreach($schemat as $etap)
                                        <li>
                                            <span class="ip-step-flow-icon">@include('front.static.howbuy-icon', ['name' => $etap['icon']])</span>
                                            <strong>{{ $etap['title'][$L] }}</strong>
                                            <span class="ip-step-flow-desc">{{ $etap['desc'][$L] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                @break
                        @endswitch
                    </div>

                </article>
            @endforeach
        </div>
    </section>

    {{-- Ciemny pas: rekojmia --}}
    <section class="ip-section ip-guard-section pt-0">
        <div class="container">
            <div class="ip-guard">

                <div class="ip-guard-main">
                    <span class="ip-guard-shield">
                        <svg viewBox="0 0 120 130" fill="none" aria-hidden="true">
                            <path d="M60 6 12 26v39c0 32 21 51 48 59 27-8 48-27 48-59V26L60 6Z" stroke="currentColor" stroke-width="3" stroke-linejoin="round"/>
                        </svg>
                        <b>5</b>
                        <i>{{ $L == 'pl' ? 'LAT' : 'YEARS' }}</i>
                    </span>

                    <div class="ip-guard-text">
                        <h2>{{ $L == 'pl' ? 'Pełna ochrona także po zakupie' : 'Full protection after your purchase' }}</h2>
                        <p>
                            @if($L == 'pl')
                                Na zakupione mieszkanie przysługuje Ci 5 lat rękojmi, która obejmuje odpowiedzialność
                                dewelopera za wszelkie wady fizyczne i konstrukcyjne lokalu oraz budynku.
                            @else
                                Your apartment comes with a <strong>5-year statutory warranty</strong>. During this period,
                                the developer is responsible for physical and structural defects in both the apartment and the building.
                            @endif
                        </p>
                    </div>
                </div>

                <ul class="ip-guard-list list-unstyled mb-0">
                    <li>
                        @include('front.static.howbuy-icon', ['name' => 'tarcza'])
                        {{ $L == 'pl' ? 'Odpowiedzialność dewelopera' : 'Developer’s responsibility' }}
                    </li>
                    <li>
                        @include('front.static.howbuy-icon', ['name' => 'kalendarz'])
                        {{ $L == 'pl' ? '5 lat ochrony' : '5 years of protection' }}
                    </li>
                    <li>
                        @include('front.static.howbuy-icon', ['name' => 'dom'])
                        {{ $L == 'pl' ? 'Spokój na długie lata' : 'Peace of mind for years to come' }}
                    </li>
                </ul>

            </div>
        </div>
    </section>

    {{-- Pasek CTA --}}
    <section class="ip-section ip-cta-strip pt-0">
        <div class="container">
            <div class="ip-cta-inner">
                <div class="ip-cta-text">
                    <h2>{{ $L == 'pl' ? 'Teraz czas na Twój adres.' : 'Now it is time for your address.' }}</h2>
                    <p>{{ $L == 'pl' ? 'Znajdź mieszkanie, które będzie Twoje.' : 'Find the apartment that will be yours.' }}</p>
                </div>

                {{-- UWAGA: makieta nie mowi, dokad prowadzi przycisk — na razie wyszukiwarka --}}
                <a href="{{ route('search', ['locale' => $L]) }}" class="ip-btn-gold-lg ip-btn-arrow">
                    {{ $L == 'pl' ? 'Zobacz dostępne mieszkania' : 'See available apartments' }}
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 12h15m-5.5-5.5L19 12l-5.5 5.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- FAQ — tresc z modulu FAQ w CMS-ie. Gdy dla aktywnego jezyka nie ma
         ani jednego wpisu, cala sekcja znika zamiast zostawiac sam naglowek. --}}
    @if($faq->isNotEmpty())
    <section class="ip-section ip-faq-section">
        <div class="container">

            <x-section-head>{{ $L == 'pl' ? 'FAQ – Pytania i odpowiedzi' : 'Frequently Asked Questions' }}</x-section-head>

            <div class="accordion ip-faq" id="faqAccordion">
                @foreach($faq as $i => $item)
                    <div class="accordion-item ip-faq-item">
                        <h3 class="accordion-header" id="faqHead{{ $i }}">
                            <button class="accordion-button @if($i > 0) collapsed @endif" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faqBody{{ $i }}"
                                    aria-expanded="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="faqBody{{ $i }}">
                                {{ $item['q'] }}
                            </button>
                        </h3>
                        <div id="faqBody{{ $i }}" class="accordion-collapse collapse @if($i === 0) show @endif"
                             aria-labelledby="faqHead{{ $i }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">{!! $item['a'] !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    @endif

@endsection
