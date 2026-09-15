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
     09.2026.docx"). FAQ: EN to 14 pytan klienta z tego pliku; PL to nadal
     nasze 7 pytan na bazie starej podstrony — DO POTWIERDZENIA PRZEZ KLIENTA
     (brak polskiej wersji tych 14 pytan).
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    $kroki = [
        [
            'num' => '01', 'icon' => 'budynek', 'media' => 'foto', 'img' => 'images/howbuy/krok-1.jpg', 'pos' => 'center 30%', 'ai' => true,
            'title' => ['pl' => 'Wybór mieszkania', 'en' => 'Choosing an apartment'],
            'sub'   => ['pl' => 'dopasowanego do Twoich potrzeb', 'en' => 'that fits your needs'],
            'desc'  => [
                'pl' => 'Rozmawiamy o Twoich potrzebach i oczekiwaniach. Prezentujemy plany, układy pomieszczeń i standardy wykończenia. Dzięki makiecie 3D zobaczysz całe osiedle, swoje mieszkanie i widok z balkonu.',
                'en' => 'We talk about your needs and expectations. We show you the plans, apartment layouts and finishing standards. With our 3D model, you can see the whole development, your apartment and the view from your balcony.',
            ],
        ],
        [
            'num' => '02', 'icon' => 'umowa', 'media' => 'panel',
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
            'num' => '03', 'icon' => 'dokument', 'media' => 'foto', 'img' => 'images/howbuy/krok-3.jpg', 'ai' => true,
            'title' => ['pl' => 'Czas na finansowanie –', 'en' => 'Time to arrange financing –'],
            'sub'   => ['pl' => 'formalności kredytowe', 'en' => 'mortgage formalities'],
            'desc'  => [
                'pl' => 'Masz czas na dopełnienie formalności kredytowych. Przygotowujemy komplet dokumentów prawnych i technicznych potrzebnych do złożenia wniosku kredytowego w wybranym banku.',
                'en' => 'You have time to complete the mortgage formalities. We prepare all the legal and technical documents you need to apply for a mortgage at the bank of your choice.',
            ],
        ],
        [
            'num' => '04', 'icon' => 'pioro', 'media' => 'foto', 'img' => 'images/howbuy/krok-4.jpg', 'ai' => true,
            'title' => ['pl' => 'Umowa deweloperska', 'en' => 'Development agreement'],
            'sub'   => ['pl' => 'w formie aktu notarialnego', 'en' => 'signed before a notary'],
            'desc'  => [
                'pl' => 'Po potwierdzeniu finansowania podpisujemy umowę deweloperską u notariusza. Koszty taksy i wpisów dzielone są po połowie.',
                'en' => 'Once your financing is confirmed, we sign the development agreement before a notary. The notary fees and registration costs are shared equally between you and the developer.',
            ],
        ],
        [
            'num' => '05', 'icon' => 'klodka', 'media' => 'schemat',
            'title' => ['pl' => 'Bezpieczne wpłaty', 'en' => 'Secure payments'],
            'sub'   => ['pl' => 'na Mieszkaniowy Rachunek Powierniczy', 'en' => 'to a Housing Escrow Account'],
            'desc'  => [
                'pl' => 'Twoje pieniądze są maksymalnie chronione zgodnie z nową ustawą deweloperską.',
                'en' => 'Your money is fully protected in line with the new Developer Act.',
            ],
        ],
        [
            'num' => '06', 'icon' => 'klucz', 'media' => 'foto', 'img' => 'images/howbuy/krok-6.jpg', 'pos' => 'center 25%', 'ai' => true,
            'title' => ['pl' => 'Pozwolenie na użytkowanie', 'en' => 'Occupancy permit'],
            'sub'   => ['pl' => 'i Odbiór Techniczny', 'en' => 'and technical inspection'],
            'desc'  => [
                'pl' => 'Po zakończeniu budowy i uzyskaniu pozwolenia na użytkowanie zapraszamy na odbiór techniczny mieszkania. Usterki wpisujemy do protokołu – mamy 14 dni na ustosunkowanie się do nich i 30 dni na ich usunięcie. Po podpisaniu protokołu otrzymujesz klucze do mieszkania.',
                'en' => 'Once construction is complete and the occupancy permit has been issued, we invite you to inspect your apartment. Any defects are recorded in the inspection report. We have 14 days to respond and 30 days to fix them. After you sign the report, you receive the keys to your apartment.',
            ],
        ],
        [
            'num' => '07', 'icon' => 'dom', 'media' => 'foto', 'img' => 'images/howbuy/krok-7.jpg', 'ai' => true,
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

    /* FAQ osobno dla jezykow — pytania PL i EN to rozne zestawy:
       PL: pierwsza odpowiedz z makiety, pozostale napisane na bazie starej wersji
           podstrony — DO POTWIERDZENIA PRZEZ KLIENTA,
       EN: 14 pytan od klienta ("Jak kupic mieszkanie 09.2026.docx").
       Odpowiedzi to HTML (akapity, listy) — tresc nasza, nie od uzytkownika. */
    $faq = [
        'pl' => [
            [
                'q' => 'Jak wybrać nowe mieszkanie? Od czego zacząć?',
                'a' => 'Wybór nowego mieszkania to decyzja, której nie należy podejmować pochopnie – liczy się nie tylko cena, ale dziesiątki czynników wpływających na komfort życia przez kolejne lata. Zanim zaczniesz przeglądać oferty, warto określić swoje priorytety: co jest dla Ciebie absolutnie najważniejsze, a z czego jesteś w stanie zrezygnować. Dobrym punktem startowym jest odpowiedź na trzy fundamentalne pytania dotyczące lokalizacji, metrażu i budżetu.',
            ],
            [
                'q' => 'Rynek pierwotny czy wtórny? Krótkie porównanie',
                'a' => 'Mieszkanie z rynku pierwotnego kupujesz bez pośrednika i bez podatku od czynności cywilnoprawnych, w standardzie deweloperskim, który wykańczasz po swojemu. Budynek jest nowy, energooszczędny i objęty gwarancją oraz pięcioletnią rękojmią. Rynek wtórny daje szybsze wprowadzenie i znaną okolicę, ale zwykle wyższe koszty eksploatacji i konieczność remontu.',
            ],
            [
                'q' => 'Zakup pierwszego mieszkania. Jak do tego podejść?',
                'a' => 'Zacznij od budżetu: sprawdź zdolność kredytową i policz wkład własny razem z kosztami okołozakupowymi (notariusz, wpisy, wykończenie). Dopiero potem szukaj mieszkania – będziesz oglądać oferty, na które realnie Cię stać. Na każdym etapie możesz liczyć na naszego doradcę, który wytłumaczy zapisy umowy i przeprowadzi przez formalności.',
            ],
            [
                'q' => 'Jak oglądać nowe mieszkanie? Praktyczny przewodnik',
                'a' => 'Sprawdź układ pomieszczeń i to, czy meble, których używasz, zmieszczą się bez kompromisów. Zwróć uwagę na strony świata i doświetlenie, wysokość pomieszczeń, miejsce na pralkę i szafy oraz na to, co widać z okien. Obejrzyj też części wspólne i otoczenie osiedla o różnych porach dnia – to one decydują o codziennym komforcie.',
            ],
            [
                'q' => 'Ile wkładu własnego potrzebuję, żeby kupić mieszkanie?',
                'a' => 'Banki zwykle wymagają od 10 do 20% wartości nieruchomości. Do tego warto doliczyć koszty okołozakupowe: taksę notarialną, wpisy sądowe, prowizję banku i wykończenie mieszkania. Wysokość wkładu i dostępne programy najlepiej potwierdzić u doradcy kredytowego – chętnie polecimy sprawdzonego.',
            ],
            [
                'q' => 'Czy mogę negocjować cenę mieszkania z deweloperem?',
                'a' => 'Ceny mieszkań wynikają z aktualnego cennika inwestycji, ale zawsze warto porozmawiać z biurem sprzedaży. Pole do rozmowy bywa przy konkretnych lokalach, formie płatności czy pakiecie wykończeniowym. Nasi doradcy przedstawią wszystkie dostępne warunki wprost, bez ukrytych kosztów.',
            ],
            [
                'q' => 'Jakie miesięczne koszty ponoszę po zakupie mieszkania?',
                'a' => 'Na miesięczne koszty składają się czynsz administracyjny (utrzymanie części wspólnych, fundusz remontowy), media rozliczane według liczników oraz rata kredytu, jeśli korzystasz z finansowania. Do tego dochodzi roczny podatek od nieruchomości. Wysokość czynszu dla konkretnej inwestycji poda Ci biuro sprzedaży.',
            ],
        ],
        'en' => [
            [
                'q' => '1. What does the developer standard include?',
                'a' => '<p>There is no single legal definition of the developer standard, so its exact scope is always described in the developer specification and the development agreement. In general, an apartment delivered to the developer standard is ready for finishing work. The exact scope may vary depending on the standard of the residential development.</p>
                        <p>Our standard includes, among other things, machine-applied gypsum-lime plaster on the walls, floor screeds, complete electrical, water, sewage and heating systems with radiators, as well as kitchen sockets, an RTV + LAN socket and Smart Home installations.</p>',
            ],
            [
                'q' => '2. What should you check before signing a development agreement?',
                'a' => '<p>Before signing a development agreement, you should carefully check the Information Prospectus, payment schedule and the final date for the transfer of ownership.</p>
                        <p>It is also important to check the exact size of the apartment, any additional areas or facilities included with it, such as a balcony, storage unit or parking space in the underground garage, as well as the finishing standard.</p>
                        <p>For a safe purchase of a new apartment from a developer, the development agreement must be signed in the form of a notarial deed.</p>',
            ],
            [
                'q' => '3. What additional costs are involved when buying an apartment from a developer?',
                'a' => '<p>When buying a new apartment on the primary market, you do not pay the 2% tax on civil law transactions (PCC), which generally applies to purchases on the secondary market.</p>
                        <p>However, there are some additional costs to consider:</p>
                        <ul>
                            <li><strong>Notary fees</strong> – the notary fee is shared equally between the developer and the buyer. There are also costs for copies of the notarial deed and entries in the Land and Mortgage Register.</li>
                            <li><strong>Finishing costs</strong> – you should also plan a budget for finishing the apartment and making it ready to move into.</li>
                        </ul>',
            ],
            [
                'q' => '4. What happens during the technical inspection of an apartment and what should you check?',
                'a' => '<p>The technical inspection is the moment when you check whether the apartment meets the conditions set out in the development agreement and complies with building standards.</p>
                        <p>It is a good idea to bring a spirit level and a laser distance meter or ask a professional engineer to assist you.</p>
                        <p>During the inspection, you should check the walls and angles, any scratches on the windows, ventilation, the location of electrical points and the quality of the floor screeds.</p>
                        <p>All defects should be recorded in the inspection report. The developer then has a statutory period to respond to the reported defects.</p>',
            ],
            [
                'q' => '5. Why choose a new apartment instead of one from the secondary market?',
                'a' => '<p>Buying a new apartment from a developer can save you time and money at the start and gives you the benefits of modern construction.</p>
                        <p>New apartments are built according to current building regulations and strict quality standards. When you buy on the primary market, you benefit from a 5-year statutory warranty for defects, modern architecture, underground garages, quiet lifts and energy-saving technologies such as photovoltaic panels and Smart Home systems.</p>
                        <p>You also do not pay the 2% PCC tax and have complete freedom to design and finish your new interior from scratch.</p>',
            ],
            [
                'q' => '6. How can you safely buy a new apartment? What is a Housing Escrow Account?',
                'a' => '<p>The money paid by customers buying new apartments is protected under the Developer Act.</p>
                        <p>Your payments do not go directly to the developer’s bank account. Instead, they are paid into a Housing Escrow Account managed by a bank.</p>
                        <p>In the case of an open escrow account, the bank releases the money to the developer in stages. Funds are released only after an independent inspector confirms that a specific stage of construction has been completed. This provides a high level of protection for the buyer’s money.</p>',
            ],
            [
                'q' => '7. Can I make changes to the layout of my new apartment?',
                'a' => '<p>Yes. Most developers allow buyers to make changes at an early stage of construction.</p>
                        <p>These changes allow you to adapt the apartment to your individual needs. The most common changes include moving partition walls, changing the location of electrical points such as lights and sockets, and modifying water and sewage connections, for example replacing a bathtub with a shower.</p>
                        <p>Making these changes early can help you avoid expensive modifications when finishing the apartment later.</p>',
            ],
            [
                'q' => '8. How much does it cost to finish an apartment per square metre?',
                'a' => '<p>The cost of finishing an apartment depends on the materials you choose and the rates charged by the finishing company.</p>
                        <p>As a general estimate, basic finishing costs start at around <strong>PLN 2,000 per square metre</strong>, including labour and materials.</p>
                        <p>For premium interiors with high-quality materials and custom-made furniture, the total cost can be much higher.</p>',
            ],
            [
                'q' => '9. How does buying a new apartment with a mortgage work?',
                'a' => '<p>Buying an apartment with mortgage financing can be divided into a few simple steps:</p>
                        <ol>
                            <li>Check your mortgage eligibility with a financial advisor and choose your apartment.</li>
                            <li>Sign a reservation agreement with the developer.</li>
                            <li>Apply for a mortgage and submit the required technical documents provided by the developer.</li>
                            <li>Sign the development agreement and the mortgage agreement with the bank.</li>
                            <li>The bank releases the mortgage funds in stages according to the progress of construction.</li>
                        </ol>',
            ],
            [
                'q' => '10. How long is the statutory warranty for a new apartment and what does it cover?',
                'a' => '<p>Under the Polish Civil Code, the statutory warranty for a new apartment is <strong>5 years from the date the apartment is handed over to the buyer</strong>.</p>
                        <p>The developer is responsible for physical defects in the property. If a defect is discovered during this period, the owner has the right to ask the developer to repair it.</p>',
            ],
            [
                'q' => '11. How to choose an apartment for a single person?',
                'a' => '<p>When choosing an apartment for one person, it is worth considering a compact and functional studio or a small one-bedroom apartment.</p>
                        <p>Location is very important. Good access to the city centre, public transport, shops and services makes everyday life easier.</p>
                        <p>Smart Home systems are also a great advantage, improving both comfort and security. If you are looking for an apartment for one person in Olsztyn, <strong>TEMPO at Sikorskiego Street</strong> is a good option for people with an active lifestyle.</p>',
            ],
            [
                'q' => '12. What should an apartment for a senior offer?',
                'a' => '<p>An apartment for a senior should be safe, functional and free from architectural barriers.</p>
                        <p>An important feature is a modern lift with direct access to the underground garage and storage units, as well as step-free access to the building.</p>
                        <p>Easy access to medical centres, pharmacies, shops and public transport is also important. A senior-friendly development should also offer quiet green areas with benches and monitoring for greater safety.</p>',
            ],
            [
                'q' => '13. What do families with children look for when choosing an apartment?',
                'a' => '<p>For families with children, the main priorities are safety, space and easy access to schools, kindergartens, medical centres and shops.</p>
                        <p>Safe and monitored green areas with walking paths, playgrounds and sports areas are also very important, as they provide space for families to spend time outdoors.</p>
                        <p>Families also value environmentally friendly solutions that can help reduce everyday running costs. A good example in Olsztyn is the <strong>SLOW development</strong>, designed with family comfort in mind.</p>',
            ],
            [
                'q' => '14. What green areas and shared facilities do modern residential developments offer?',
                'a' => '<p>Modern residential developments provide shared spaces designed for relaxation, recreation and spending time together.</p>
                        <p>For example, the <strong>SLOW development in Olsztyn</strong> offers an outdoor yoga area, a barbecue shelter with tables and a professional agility area for dogs.</p>
                        <p>Residents can also use safe playgrounds, rain gardens, electric vehicle charging stations and bicycle shelters.</p>',
            ],
        ],
    ];
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
                        {{-- otoczka bez ikonki — ikonki krokow wylecialy (decyzja Jacka) --}}
                        <span class="ip-step-icon"></span>
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
                                     odwiedzajacych). Przy prawdziwym zdjeciu usun 'ai' z tablicy. --}}
                                @if(!empty($krok['ai']))
                                    <x-ai-badge />
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

    {{-- FAQ --}}
    <section class="ip-section ip-faq-section">
        <div class="container">

            <x-section-head>{{ $L == 'pl' ? 'FAQ – Pytania i odpowiedzi' : 'Frequently Asked Questions' }}</x-section-head>

            <div class="accordion ip-faq" id="faqAccordion">
                @foreach($faq[$L] as $i => $item)
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

@endsection
