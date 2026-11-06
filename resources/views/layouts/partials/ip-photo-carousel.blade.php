{{-- Karuzela zdjec po 3 obok siebie (2 na tablecie, 1 i kawalek na telefonie),
     przewijana strzalkami (scroll-snap w CSS, .ip-rent-gallery w ippon.less).
     Klikniecie otwiera zdjecie w swipeboksie (app.js).
     Wprowadzona dla Wynajmu (uwaga klienta 5.11.2026), od 6.11 tez we wpisach
     aktualnosci i bloga.

     Parametry:
       $photos  kolekcja App\Models\Image (file, file_webp, name)
       $rel     grupa swipeboksa (unikalna na stronie)
       $L       jezyk (pl|en) --}}
@if($photos->isNotEmpty())
    <div class="ip-rent-gallery" data-rent-gallery>
        <div class="ip-rent-gallery-track">
            @foreach($photos as $photo)
                <a href="{{ asset('uploads/gallery/images/'.$photo->file) }}" class="swipebox ip-rent-gallery-item" rel="{{ $rel }}">
                    <picture>
                        @if($photo->file_webp)
                            <source type="image/webp" srcset="{{ asset('uploads/gallery/images/webp/'.$photo->file_webp) }}">
                        @endif
                        <img src="{{ asset('uploads/gallery/images/'.$photo->file) }}" alt="{{ $photo->name }}" loading="lazy" decoding="async">
                    </picture>
                </a>
            @endforeach
        </div>
        @if($photos->count() > 3)
            <button type="button" class="ip-rent-gallery-nav is-prev" aria-label="{{ $L == 'pl' ? 'Poprzednie zdjęcia' : 'Previous photos' }}">
                <svg viewBox="0 0 18 16" aria-hidden="true"><polyline points="8,1 1,8 8,15"/><line x1="1" y1="8" x2="17" y2="8"/></svg>
            </button>
            <button type="button" class="ip-rent-gallery-nav is-next" aria-label="{{ $L == 'pl' ? 'Następne zdjęcia' : 'Next photos' }}">
                <svg viewBox="0 0 18 16" aria-hidden="true"><polyline points="10,1 17,8 10,15"/><line x1="1" y1="8" x2="17" y2="8"/></svg>
            </button>

            @once
                @push('scripts')
                    <script>
                        /* karuzela zdjec: przewijanie o jedno zdjecie, z konca wraca na poczatek */
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
    </div>
@endif
