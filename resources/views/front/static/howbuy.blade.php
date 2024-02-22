@extends('layouts.page', ['body_class' => 'howtobuy-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

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
