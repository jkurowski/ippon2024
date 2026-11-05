{{-- Szczegoly lokalu na wynajem: zdjecie, parametry, opis z CMS-u.
     Uzywane na karcie lokalu i od 2.11.2026 tez na liscie /wynajem - klient:
     lista z kaflami "wyglada bardzo biednie", ma sie od razu pokazywac to,
     co po kliknieciu "zobacz szczegoly".
     Parametry: $rent, $back (true = przycisk "wroc do listy"), $class,
     $title (true = nazwa lokalu nad opisem; na karcie nazwa jest w naglowku) --}}
@php
    $back = $back ?? true;
    $class = $class ?? '';
    $title = $title ?? false;

    /* 5.11.2026: "zdjecia rozjezdzaja strone, mozna ustawic 3 zdjecia obok siebie
       w karuzeli". Galeria wpieta w opis z CMS-u ([galeria=slider]N[/galeria])
       szla jednym duzym, pionowym zdjeciem w waskiej kolumnie tekstu. Wycinamy
       ja z opisu i pokazujemy pod spodem na cala szerokosc kontenera. */
    $rentText = (string) $rent->text;
    $rentPhotos = collect();
    if (preg_match('/\[galeria=(?:slider|carousel|gallery)\](\d+)\[\/galeria\]/', $rentText, $gm)) {
        $rentPhotos = \App\Models\Image::where('gallery_id', (int) $gm[1])->orderBy('sort')->get();
        $rentText = str_replace($gm[0], '', $rentText);
    }
@endphp
    <section class="ip-section ip-rent-detail {{ $class }}">
        <div class="container">
            <div class="row align-items-start ip-rent-row">

                <div class="col-12 col-xl-6">
                    <div class="ip-rent-photo">
                        @if($rent->file)
                            <img src="{{ asset('uploads/rents/'.$rent->file) }}" alt="{{ $rent->name }}">
                        @endif
                        <span class="ip-card-badge">{{ rentType($rent->type) }}</span>
                    </div>

                    @if($rent->area)
                        <ul class="ip-rent-params list-unstyled mb-0">
                            <li>
                                <span>{{ $L == 'pl' ? 'Powierzchnia' : 'Area' }}</span>
                                <strong>{{ $rent->area }} m²</strong>
                            </li>
                            <li>
                                <span>{{ $L == 'pl' ? 'Rodzaj' : 'Type' }}</span>
                                <strong>{{ rentType($rent->type) }}</strong>
                            </li>
                        </ul>
                    @endif
                </div>

                <div class="col-12 col-xl-6 mt-4 mt-xl-0">
                    @if($title)
                        <h2 class="ip-rent-name">{{ $rent->name }}</h2>
                    @endif

                    <div class="ip-cms ip-rent-text">
                        {!! parse_text($rentText) !!}
                    </div>

                    @if($back)
                        <a href="{{ route('rent', ['locale' => $L]) }}" class="ip-btn-outline ip-rent-back">
                            @lang('website.button-back-to-list')
                        </a>
                    @endif
                </div>

            </div>

            @if($rentPhotos->isNotEmpty())
                <div class="ip-rent-gallery" data-rent-gallery>
                    <div class="ip-rent-gallery-track">
                        @foreach($rentPhotos as $photo)
                            <a href="{{ asset('uploads/gallery/images/'.$photo->file) }}" class="swipebox ip-rent-gallery-item" rel="rent-{{ $rent->id }}">
                                <picture>
                                    @if($photo->file_webp)
                                        <source type="image/webp" srcset="{{ asset('uploads/gallery/images/webp/'.$photo->file_webp) }}">
                                    @endif
                                    <img src="{{ asset('uploads/gallery/images/'.$photo->file) }}" alt="{{ $photo->name }}" loading="lazy" decoding="async">
                                </picture>
                            </a>
                        @endforeach
                    </div>
                    @if($rentPhotos->count() > 3)
                        <button type="button" class="ip-rent-gallery-nav is-prev" aria-label="{{ $L == 'pl' ? 'Poprzednie zdjęcia' : 'Previous photos' }}">
                            <svg viewBox="0 0 18 16" aria-hidden="true"><polyline points="8,1 1,8 8,15"/><line x1="1" y1="8" x2="17" y2="8"/></svg>
                        </button>
                        <button type="button" class="ip-rent-gallery-nav is-next" aria-label="{{ $L == 'pl' ? 'Następne zdjęcia' : 'Next photos' }}">
                            <svg viewBox="0 0 18 16" aria-hidden="true"><polyline points="10,1 17,8 10,15"/><line x1="1" y1="8" x2="17" y2="8"/></svg>
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </section>

    @if($rentPhotos->count() > 3)
        @once
            @push('scripts')
                <script>
                    /* karuzela galerii lokalu: przewijanie o jedno zdjecie (scroll-snap w CSS) */
                    document.querySelectorAll('[data-rent-gallery]').forEach(function (g) {
                        var track = g.querySelector('.ip-rent-gallery-track');
                        g.querySelectorAll('.ip-rent-gallery-nav').forEach(function (btn) {
                            btn.addEventListener('click', function () {
                                var item = track.querySelector('.ip-rent-gallery-item');
                                var step = item ? item.getBoundingClientRect().width + parseFloat(getComputedStyle(track).columnGap || 0) : track.clientWidth;
                                var dir = btn.classList.contains('is-prev') ? -1 : 1;
                                var max = track.scrollWidth - track.clientWidth - 2;
                                if (dir > 0 && track.scrollLeft >= max) { track.scrollTo({ left: 0, behavior: 'smooth' }); return; }
                                if (dir < 0 && track.scrollLeft <= 2) { track.scrollTo({ left: max + 2, behavior: 'smooth' }); return; }
                                track.scrollBy({ left: dir * step, behavior: 'smooth' });
                            });
                        });
                    });
                </script>
            @endpush
        @endonce
    @endif
