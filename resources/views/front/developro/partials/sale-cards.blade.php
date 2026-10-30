{{-- Kafle "Inwestycje w sprzedazy" (.ip-card) — uklad z poprzedniej wersji
     strony glownej, o ktory klient poprosil na podstronie "Mieszkania
     w sprzedazy" (mail 15.10.2026, image004). Po 3 w rzedzie, wszystkie tej
     samej wielkosci, niepelny ostatni rzad wysrodkowany.
     Parametr: $cards — wynik saleCards() (app/Helpers/SaleCards.php) --}}
<section class="ip-section ip-sale-cards">
    <div class="container">
        <div class="row ip-cards-row justify-content-center">

            @foreach ($cards as $card)
                <div class="col-12 col-md-6 col-xl-4" data-nh-reveal style="--nh-i: {{ $loop->index % 3 }}">
                    <article class="ip-card">

                        <div class="ip-card-media">
                            {{-- obrazek prowadzi do opisu, gdy link jest; dla czytnikow ekranu
                                 wystarczy link w nazwie, stad tabindex/aria-hidden --}}
                            @if($card['link_description'])
                                <a href="{{ $card['link_description'] }}" class="ip-card-media-link" tabindex="-1" aria-hidden="true">
                            @endif
                            @if($card['photo'] && $card['photo_webp'])
                                {{-- WebP z uploadu boksu, oryginalny plik jako fallback --}}
                                <picture>
                                    <source srcset="{{ $card['photo_webp'] }}" type="image/webp">
                                    <img src="{{ $card['photo'] }}" alt="{{ $card['name'] }}" loading="lazy" decoding="async">
                                </picture>
                            @elseif($card['photo'])
                                <img src="{{ $card['photo'] }}" alt="{{ $card['name'] }}" loading="lazy" decoding="async">
                            @endif
                            @if($card['link_description'])
                                </a>
                            @endif

                            {{-- napis na obrazku (Boksy: "Napis na obrazku"); puste = bez plakietki --}}
                            @if($card['badge'])
                                <span class="ip-card-badge">{{ $card['badge'] }}</span>
                            @endif
                        </div>

                        <div class="ip-card-body">
                            <h3 class="ip-card-title">
                                @if($card['link_description'])
                                    <a href="{{ $card['link_description'] }}">{{ $card['name'] }}</a>
                                @else
                                    {{ $card['name'] }}
                                @endif
                            </h3>
                            @if($card['location'])
                                <span class="ip-card-address mt-2">{{ $card['location'] }}</span>
                            @endif

                            @if($card['desc'])
                                <p class="ip-card-desc">{{ $card['desc'] }}</p>
                            @endif

                            {{-- Parametry pokazujemy tylko te, ktore klient wypelnil w CMS-ie —
                                 kafel z pustym wierszem wyglada gorzej niz kafel krotszy. --}}
                            @php $area = $card['area']; @endphp
                            @if($area || $card['handover'] || $card['advantage'])
                                <ul class="ip-card-params list-unstyled mb-0">
                                    @if($area)
                                        <li>
                                            <svg viewBox="0 0 29 29" fill="none" aria-hidden="true"><path d="M25.375 1.8125H3.625C2.62812 1.8125 1.8125 2.62812 1.8125 3.625V25.375C1.8125 26.3719 2.62812 27.1875 3.625 27.1875H17.2188V25.375C17.2188 22.8375 19.2125 20.8438 21.75 20.8438V19.0312C18.2156 19.0312 15.4062 21.8406 15.4062 25.375H12.6875V21.75H10.875V25.375H3.625V3.625H10.875V16.3125H12.6875V11.7812H16.3125V9.96875H12.6875V3.625H25.375V9.96875H21.75V11.7812H25.375V25.375H21.75V27.1875H25.375C26.3719 27.1875 27.1875 26.3719 27.1875 25.375V3.625C27.1875 2.62812 26.3719 1.8125 25.375 1.8125Z" fill="currentColor"/></svg>
                                            {!! $area !!}
                                        </li>
                                    @endif

                                    @if($card['handover'])
                                        <li>
                                            <svg viewBox="0 0 29 29" fill="none" aria-hidden="true"><path d="M23.5625 3.625H19.9375V1.8125H18.125V3.625H10.875V1.8125H9.0625V3.625H5.4375C4.44062 3.625 3.625 4.44062 3.625 5.4375V23.5625C3.625 24.5594 4.44062 25.375 5.4375 25.375H23.5625C24.5594 25.375 25.375 24.5594 25.375 23.5625V5.4375C25.375 4.44062 24.5594 3.625 23.5625 3.625ZM23.5625 23.5625H5.4375V10.875H23.5625V23.5625ZM23.5625 9.0625H5.4375V5.4375H9.0625V7.25H10.875V5.4375H18.125V7.25H19.9375V5.4375H23.5625V9.0625Z" fill="currentColor"/></svg>
                                            {{ $current_locale == 'pl' ? 'Odbiór: ' : 'Handover: ' }}{{ $card['handover'] }}
                                        </li>
                                    @endif

                                    @if($card['advantage'])
                                        <li>
                                            <svg viewBox="0 0 29 29" fill="none" aria-hidden="true"><path d="M3.625 25.375H25.375M6.04167 25.375V8.45833L15.7083 3.625V25.375M22.9583 25.375V13.2917L15.7083 8.45833M10.875 10.875V10.8871M10.875 14.5V14.5121M10.875 18.125V18.1371M10.875 21.75V21.7621" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            {{ $card['advantage'] }}
                                        </li>
                                    @endif
                                </ul>
                            @endif

                            @if($card['link_apartments'] || $card['link_description'])
                                <div class="ip-card-actions">
                                    @if($card['link_apartments'])
                                        <a {!! investmentLinkAttrs($card['link_apartments']) !!} class="ip-btn-outline">
                                            {{ $current_locale == 'pl' ? 'Zobacz mieszkania' : 'See apartments' }}
                                        </a>
                                    @endif
                                    @if($card['link_description'])
                                        <a {!! investmentLinkAttrs($card['link_description']) !!} class="ip-btn-outline">
                                            {{ $current_locale == 'pl' ? 'Opis inwestycji' : 'About the project' }}
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>

                    </article>
                </div>
            @endforeach

        </div>
    </div>
</section>
