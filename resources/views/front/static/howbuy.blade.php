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
       - zdjecia z makiety maja podbite nasycenie (uwaga klienta: "zdjecia
         powinny byc w zywszych kolorach") — patrz public/images/howbuy/.
     Tresc krokow spisana z makiety; odpowiedzi FAQ poza pierwsza sa nasze,
     na bazie starej wersji podstrony — DO POTWIERDZENIA PRZEZ KLIENTA.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    $kroki = [
        [
            'num' => '01', 'icon' => 'budynek', 'media' => 'foto', 'img' => 'images/howbuy/krok-1.jpg',
            'title' => ['pl' => 'Wybór mieszkania', 'en' => 'Choosing an apartment'],
            'sub'   => ['pl' => 'dopasowanego do Twoich potrzeb', 'en' => 'matched to your needs'],
            'desc'  => [
                'pl' => 'Rozmawiamy o Twoich potrzebach i oczekiwaniach. Prezentujemy plany, układy pomieszczeń i standardy wykończenia. Dzięki makiecie 3D zobaczysz całe osiedle, swoje mieszkanie i widok z balkonu.',
                'en' => 'We talk about your needs and expectations. We present the plans, room layouts and finishing standards. Thanks to the 3D model you will see the whole estate, your apartment and the view from the balcony.',
            ],
        ],
        [
            'num' => '02', 'icon' => 'umowa', 'media' => 'panel',
            'title' => ['pl' => 'Umowa rezerwacyjna', 'en' => 'Reservation agreement'],
            'sub'   => ['pl' => 'oraz opłata', 'en' => 'and the fee'],
            'desc'  => [
                'pl' => 'Podpisujemy umowę rezerwacyjną i wpłacasz opłatę rezerwacyjną w wysokości 1% ceny brutto mieszkania. Środki są w pełni bezpieczne – jeśli nie dojdzie do zakupu, otrzymasz zwrot.',
                'en' => 'We sign the reservation agreement and you pay a reservation fee of 1% of the gross price of the apartment. The money is fully safe – if the purchase does not go ahead, you get it back.',
            ],
            'panel' => [
                'pl' => 'Otrzymasz od nas Prospekt Informacyjny – jednolity dokument prawny, który opisuje status działki, parametry techniczne budynku oraz planowane inwestycje w okolicy.',
                'en' => 'You will receive an Information Prospectus – a single legal document describing the status of the plot, the technical parameters of the building and planned developments in the neighbourhood.',
            ],
        ],
        [
            'num' => '03', 'icon' => 'dokument', 'media' => 'foto', 'img' => 'images/howbuy/krok-3.jpg',
            'title' => ['pl' => 'Czas na finansowanie –', 'en' => 'Time for financing –'],
            'sub'   => ['pl' => 'formalności kredytowe', 'en' => 'mortgage formalities'],
            'desc'  => [
                'pl' => 'Masz czas na dopełnienie formalności kredytowych. Przygotowujemy komplet dokumentów prawnych i technicznych potrzebnych do złożenia wniosku kredytowego w wybranym banku.',
                'en' => 'You have time to complete the mortgage formalities. We prepare the full set of legal and technical documents needed to file a loan application with the bank of your choice.',
            ],
        ],
        [
            'num' => '04', 'icon' => 'pioro', 'media' => 'foto', 'img' => 'images/howbuy/krok-4.jpg',
            'title' => ['pl' => 'Umowa deweloperska', 'en' => 'Developer agreement'],
            'sub'   => ['pl' => 'w formie aktu notarialnego', 'en' => 'as a notarial deed'],
            'desc'  => [
                'pl' => 'Po potwierdzeniu finansowania podpisujemy umowę deweloperską u notariusza. Koszty taksy i wpisów dzielone są po połowie.',
                'en' => 'Once the financing is confirmed we sign the developer agreement before a notary. The notarial fee and entry costs are split in half.',
            ],
        ],
        [
            'num' => '05', 'icon' => 'klodka', 'media' => 'schemat',
            'title' => ['pl' => 'Bezpieczne wpłaty', 'en' => 'Secure payments'],
            'sub'   => ['pl' => 'na Mieszkaniowy Rachunek Powierniczy', 'en' => 'to the escrow account'],
            'desc'  => [
                'pl' => 'Twoje pieniądze są maksymalnie chronione zgodnie z nową ustawą deweloperską.',
                'en' => 'Your money is protected to the maximum under the new developer act.',
            ],
        ],
        [
            'num' => '06', 'icon' => 'klucz', 'media' => 'foto', 'img' => 'images/howbuy/krok-6.jpg',
            'title' => ['pl' => 'Pozwolenie na użytkowanie', 'en' => 'Occupancy permit'],
            'sub'   => ['pl' => 'i Odbiór Techniczny', 'en' => 'and technical handover'],
            'desc'  => [
                'pl' => 'Po zakończeniu budowy i uzyskaniu pozwolenia na użytkowanie zapraszamy na odbiór techniczny mieszkania. Usterki wpisujemy do protokołu – mamy 14 dni na ustosunkowanie się do nich i 30 dni na ich usunięcie. Po podpisaniu protokołu otrzymujesz klucze do mieszkania.',
                'en' => 'After construction is finished and the occupancy permit obtained, we invite you to the technical handover. Any defects go into the report – we have 14 days to respond to them and 30 days to remove them. Once the report is signed, you receive the keys.',
            ],
        ],
        [
            'num' => '07', 'icon' => 'dom', 'media' => 'foto', 'img' => 'images/howbuy/krok-7.jpg',
            'title' => ['pl' => 'Przeniesienie własności', 'en' => 'Transfer of ownership'],
            'sub'   => ['pl' => '(Umowa przyrzeczona)', 'en' => '(final agreement)'],
            'desc'  => [
                'pl' => 'Ostatnim krokiem jest podpisanie u notariusza umowy przeniesienia własności. Koszty podpisania aktu pokrywa nowy właściciel. Od tej chwili stajesz się pełnoprawnym właścicielem nieruchomości.',
                'en' => 'The last step is signing the transfer of ownership before a notary. The cost of the deed is covered by the new owner. From that moment you become the full owner of the property.',
            ],
        ],
    ];

    /* Schemat przy kroku 05 */
    $schemat = [
        ['icon' => 'bank', 'title' => ['pl' => 'Wpłata', 'en' => 'Payment'],
         'desc' => ['pl' => 'Środki trafiają na Mieszkaniowy Rachunek Powierniczy prowadzony przez niezależny bank.',
                    'en' => 'The money goes to an escrow account run by an independent bank.']],
        ['icon' => 'dzwig', 'title' => ['pl' => 'Kontrola', 'en' => 'Control'],
         'desc' => ['pl' => 'Bank wypłaca środki deweloperowi dopiero po zakończeniu etapu budowy, co potwierdza niezależny inspektor budowlany.',
                    'en' => 'The bank releases the money to the developer only after a construction stage is completed and confirmed by an independent inspector.']],
        ['icon' => 'tarcza', 'title' => ['pl' => 'Dodatkowe zabezpieczenie', 'en' => 'Extra protection'],
         'desc' => ['pl' => 'Wszystkie wpłaty są dodatkowo zabezpieczone przez Deweloperski Fundusz Gwarancyjny (DFG).',
                    'en' => 'All payments are additionally covered by the Developer Guarantee Fund (DFG).']],
    ];

    /* FAQ — pierwsza odpowiedz z makiety, pozostale napisane na bazie starej
       wersji podstrony. DO POTWIERDZENIA PRZEZ KLIENTA. */
    $faq = [
        [
            'q' => ['pl' => 'Jak wybrać nowe mieszkanie? Od czego zacząć?', 'en' => 'How to choose a new apartment? Where to start?'],
            'a' => [
                'pl' => 'Wybór nowego mieszkania to decyzja, której nie należy podejmować pochopnie – liczy się nie tylko cena, ale dziesiątki czynników wpływających na komfort życia przez kolejne lata. Zanim zaczniesz przeglądać oferty, warto określić swoje priorytety: co jest dla Ciebie absolutnie najważniejsze, a z czego jesteś w stanie zrezygnować. Dobrym punktem startowym jest odpowiedź na trzy fundamentalne pytania dotyczące lokalizacji, metrażu i budżetu.',
                'en' => 'Choosing a new apartment is not a decision to rush – it is not only about price, but about dozens of factors that shape your comfort for years. Before you start browsing offers, set your priorities: what is absolutely essential for you and what you can give up. A good starting point is answering three fundamental questions about location, size and budget.',
            ],
        ],
        [
            'q' => ['pl' => 'Rynek pierwotny czy wtórny? Krótkie porównanie', 'en' => 'New-build or resale? A short comparison'],
            'a' => [
                'pl' => 'Mieszkanie z rynku pierwotnego kupujesz bez pośrednika i bez podatku od czynności cywilnoprawnych, w standardzie deweloperskim, który wykańczasz po swojemu. Budynek jest nowy, energooszczędny i objęty gwarancją oraz pięcioletnią rękojmią. Rynek wtórny daje szybsze wprowadzenie i znaną okolicę, ale zwykle wyższe koszty eksploatacji i konieczność remontu.',
                'en' => 'A new-build apartment is bought without an agent and without transfer tax, in developer standard that you finish your own way. The building is new, energy-efficient and covered by a warranty and a five-year statutory guarantee. The resale market means moving in faster and a known neighbourhood, but usually higher running costs and renovation work.',
            ],
        ],
        [
            'q' => ['pl' => 'Zakup pierwszego mieszkania. Jak do tego podejść?', 'en' => 'Buying your first apartment. How to approach it?'],
            'a' => [
                'pl' => 'Zacznij od budżetu: sprawdź zdolność kredytową i policz wkład własny razem z kosztami okołozakupowymi (notariusz, wpisy, wykończenie). Dopiero potem szukaj mieszkania – będziesz oglądać oferty, na które realnie Cię stać. Na każdym etapie możesz liczyć na naszego doradcę, który wytłumaczy zapisy umowy i przeprowadzi przez formalności.',
                'en' => 'Start with the budget: check your creditworthiness and count the down payment together with the additional costs (notary, entries, finishing). Only then look for an apartment – you will be viewing offers you can actually afford. At every stage our advisor will explain the contract and guide you through the formalities.',
            ],
        ],
        [
            'q' => ['pl' => 'Jak oglądać nowe mieszkanie? Praktyczny przewodnik', 'en' => 'How to view a new apartment? A practical guide'],
            'a' => [
                'pl' => 'Sprawdź układ pomieszczeń i to, czy meble, których używasz, zmieszczą się bez kompromisów. Zwróć uwagę na strony świata i doświetlenie, wysokość pomieszczeń, miejsce na pralkę i szafy oraz na to, co widać z okien. Obejrzyj też części wspólne i otoczenie osiedla o różnych porach dnia – to one decydują o codziennym komforcie.',
                'en' => 'Check the layout and whether the furniture you use will fit without compromises. Look at the orientation and daylight, ceiling height, space for a washing machine and wardrobes, and at the view from the windows. Also see the common areas and the surroundings at different times of day – they decide your everyday comfort.',
            ],
        ],
        [
            'q' => ['pl' => 'Ile wkładu własnego potrzebuję, żeby kupić mieszkanie?', 'en' => 'How much down payment do I need?'],
            'a' => [
                'pl' => 'Banki zwykle wymagają od 10 do 20% wartości nieruchomości. Do tego warto doliczyć koszty okołozakupowe: taksę notarialną, wpisy sądowe, prowizję banku i wykończenie mieszkania. Wysokość wkładu i dostępne programy najlepiej potwierdzić u doradcy kredytowego – chętnie polecimy sprawdzonego.',
                'en' => 'Banks usually require between 10 and 20% of the property value. Add the additional costs: notarial fee, court entries, bank commission and finishing the apartment. The exact amount and available programmes are best confirmed with a mortgage advisor – we are happy to recommend one.',
            ],
        ],
        [
            'q' => ['pl' => 'Czy mogę negocjować cenę mieszkania z deweloperem?', 'en' => 'Can I negotiate the price with the developer?'],
            'a' => [
                'pl' => 'Ceny mieszkań wynikają z aktualnego cennika inwestycji, ale zawsze warto porozmawiać z biurem sprzedaży. Pole do rozmowy bywa przy konkretnych lokalach, formie płatności czy pakiecie wykończeniowym. Nasi doradcy przedstawią wszystkie dostępne warunki wprost, bez ukrytych kosztów.',
                'en' => 'Prices follow the current price list of the development, but it is always worth talking to the sales office. There may be room for discussion on particular units, the payment schedule or a finishing package. Our advisors present all available terms openly, with no hidden costs.',
            ],
        ],
        [
            'q' => ['pl' => 'Jakie miesięczne koszty ponoszę po zakupie mieszkania?', 'en' => 'What are the monthly costs after the purchase?'],
            'a' => [
                'pl' => 'Na miesięczne koszty składają się czynsz administracyjny (utrzymanie części wspólnych, fundusz remontowy), media rozliczane według liczników oraz rata kredytu, jeśli korzystasz z finansowania. Do tego dochodzi roczny podatek od nieruchomości. Wysokość czynszu dla konkretnej inwestycji poda Ci biuro sprzedaży.',
                'en' => 'Monthly costs consist of the administrative charge (common area upkeep, repair fund), utilities billed by meter and the loan instalment if you use financing. On top of that there is the annual property tax. The sales office will give you the exact charge for a given development.',
            ],
        ],
    ];
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl' ? 'Jak wygląda proces zakupu mieszkania?' : 'What does buying an apartment look like?',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Strefa Klienta' : 'Client zone', 'url' => null],
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

                    <div class="ip-step-media">
                        @switch($krok['media'])
                            @case('foto')
                                <img src="{{ asset($krok['img']) }}" alt="{{ $krok['title'][$L] }}" width="785" height="270">
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
                        <h2>{{ $L == 'pl' ? 'Pełna ochrona także po zakupie' : 'Full protection also after the purchase' }}</h2>
                        <p>
                            @if($L == 'pl')
                                Na zakupione mieszkanie przysługuje Ci 5 lat rękojmi, która obejmuje odpowiedzialność
                                dewelopera za wszelkie wady fizyczne i konstrukcyjne lokalu oraz budynku.
                            @else
                                Your apartment comes with a 5-year statutory guarantee covering the developer's liability
                                for any physical and structural defects of the unit and the building.
                            @endif
                        </p>
                    </div>
                </div>

                <ul class="ip-guard-list list-unstyled mb-0">
                    <li>
                        @include('front.static.howbuy-icon', ['name' => 'tarcza'])
                        {{ $L == 'pl' ? 'Odpowiedzialność dewelopera' : 'Developer liability' }}
                    </li>
                    <li>
                        @include('front.static.howbuy-icon', ['name' => 'kalendarz'])
                        {{ $L == 'pl' ? '5 lat ochrony' : '5 years of protection' }}
                    </li>
                    <li>
                        @include('front.static.howbuy-icon', ['name' => 'dom'])
                        {{ $L == 'pl' ? 'Spokój na długie lata' : 'Peace of mind for years' }}
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

            <x-section-head>{{ $L == 'pl' ? 'FAQ – Pytania i odpowiedzi' : 'FAQ – Questions and answers' }}</x-section-head>

            <div class="accordion ip-faq" id="faqAccordion">
                @foreach($faq as $i => $item)
                    <div class="accordion-item ip-faq-item">
                        <h3 class="accordion-header" id="faqHead{{ $i }}">
                            <button class="accordion-button @if($i > 0) collapsed @endif" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faqBody{{ $i }}"
                                    aria-expanded="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="faqBody{{ $i }}">
                                {{ $item['q'][$L] }}
                            </button>
                        </h3>
                        <div id="faqBody{{ $i }}" class="accordion-collapse collapse @if($i === 0) show @endif"
                             aria-labelledby="faqHead{{ $i }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">{{ $item['a'][$L] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

@endsection
