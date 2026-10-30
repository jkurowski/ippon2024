{{-- ==========================================================================
     Duze zdjecie z wysuwanym opisem — wzor: property-feature z paczki Marka
     (#/planowane-inwestycje, #/inwestycje-juz-wkrotce). Klient 15.10.2026:
     "z duzym zdjeciem i wysuwanym tekstem" (planowane, juz wkrotce),
     "duze zdjecia, wysuwajacy sie tekst, zdjecia w karuzeli" (komercyjne).

     Nazwa zawsze na zdjeciu, opis rozwija sie po najechaniu albo gdy fokus
     jest w srodku; na dotyku i ponizej 992px widoczny od razu (ippon.less).
     Kilka zdjec = karuzela z tym samym JS co ip-gallery (ip-motion.js,
     [data-ip-gallery]) — przenikanie, strzalki, licznik, swipe.
     Kafle owijamy w <div class="ip-features">.

     Parametry:
       $photos   lista zdjec: picture (investmentLargeImage) | photo + webp, alt
       $status   plakietka w rogu (opcjonalna)
       $eyebrow  maly napis nad nazwa (opcjonalny)
       $title    nazwa
       $teaser   jedno zdanie pod nazwa, widoczne zawsze (opcjonalne)
       $desc     opis — HTML z CMS-u (opcjonalny)
       $url, $ext  link "Poznaj inwestycje" (opcjonalny)
       $btn      napis na przycisku (domyslnie "Poznaj inwestycje")
       $first    true = pierwsze zdjecie bez lazy
     ========================================================================== --}}
@php
    $photos = array_values(array_filter($photos ?? [], fn ($p) => !empty($p['picture']) || !empty($p['photo'])));
    $multi  = count($photos) > 1;
    $L      = in_array(app()->getLocale(), ['pl', 'en']) ? app()->getLocale() : 'pl';
    $btn    = $btn ?? ($L == 'pl' ? 'Poznaj inwestycję' : 'Discover the project');
    $first  = $first ?? false;
@endphp

<article class="ip-feature @if($multi) is-multi @endif"
         @if($multi) data-ip-gallery data-interval="6000" aria-roledescription="{{ $L == 'pl' ? 'karuzela' : 'carousel' }}" @endif
         aria-label="{{ $title }}">

    <div class="ip-feature-media" data-nh-img>
        @foreach ($photos as $i => $p)
            <div class="ip-gallery-img @if($i === 0) is-active @endif" data-ip-gallery-slide>
                @if(!empty($p['picture']))
                    @include('front.developro.partials.large-picture', ['img' => $p['picture'], 'alt' => $p['alt'] ?? $title, 'lazy' => !$first || $i > 0])
                @else
                    <picture>
                        @if(!empty($p['webp']))
                            <source type="image/webp" srcset="{{ $p['webp'] }}">
                        @endif
                        <img src="{{ $p['photo'] }}" alt="{{ $p['alt'] ?? $title }}" @if(!$first || $i > 0) loading="lazy" @endif decoding="async">
                    </picture>
                @endif
            </div>
        @endforeach
    </div>

    @if(!empty($status))
        <span class="ip-feature-status">{{ $status }}</span>
    @endif

    <div class="ip-feature-info container">
        <div class="ip-feature-copy" data-nh-reveal>
            @if(!empty($eyebrow))
                <p class="ip-feature-eyebrow">{{ $eyebrow }}</p>
            @endif

            <h2 class="ip-feature-title">{{ $title }}</h2>

            @if(!empty($teaser))
                <p class="ip-feature-teaser">{{ $teaser }}</p>
            @endif

            {{-- dwa poziomy: zewnetrzny animuje wysokosc (grid 0fr -> 1fr),
                 wewnetrzny przycina tresc w trakcie --}}
            @if(!empty($desc))
                <div class="ip-feature-desc"><div>{!! $desc !!}</div></div>
            @endif
        </div>

        <div class="ip-feature-side">
            @if($multi)
                <div class="ip-gallery-controls">
                    <button type="button" data-ip-gallery-prev aria-label="{{ $L == 'pl' ? 'Poprzednie zdjęcie' : 'Previous photo' }}">
                        <svg viewBox="0 0 18 15" aria-hidden="true"><polyline points="7,1 1,7.5 7,14"/><line x1="1" y1="7.5" x2="17" y2="7.5"/></svg>
                    </button>
                    <span class="ip-gallery-count" aria-live="polite" aria-atomic="true">
                        <b data-ip-gallery-current>01</b> / {{ str_pad(count($photos), 2, '0', STR_PAD_LEFT) }}
                    </span>
                    <button type="button" data-ip-gallery-next aria-label="{{ $L == 'pl' ? 'Następne zdjęcie' : 'Next photo' }}">
                        <svg viewBox="0 0 18 15" aria-hidden="true"><polyline points="11,1 17,7.5 11,14"/><line x1="1" y1="7.5" x2="17" y2="7.5"/></svg>
                    </button>
                </div>
            @endif

            @if(!empty($url))
                <a href="{{ $url }}" class="ip-gallery-btn" @if(!empty($ext)) target="_blank" rel="noopener" @endif>
                    {{ $btn }}
                    <svg viewBox="0 0 14 14" aria-hidden="true"><path d="M2 12 12 2M4 2h8v8"/></svg>
                </a>
            @endif
        </div>
    </div>

    @if($multi)
        <span class="ip-gallery-progress" style="--ip-interval: 6000ms" aria-hidden="true"><span data-ip-gallery-progress></span></span>
    @endif
</article>
