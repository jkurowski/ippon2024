{{-- <picture> dla investmentLargeImage(): WebP + wersja na telefon (< 768 px).
     Parametry: $img (tablica z helpera), $alt, $lazy (domyslnie true).
     .ip-picture ma display: contents — style piszace do "> img" dzialaja dalej. --}}
<picture class="ip-picture">
    @if($img['mobile_webp'])
        <source media="(max-width: 767.98px)" srcset="{{ $img['mobile_webp'] }}" type="image/webp">
    @endif
    @if($img['mobile'])
        <source media="(max-width: 767.98px)" srcset="{{ $img['mobile'] }}">
    @endif
    @if($img['webp'])
        <source srcset="{{ $img['webp'] }}" type="image/webp">
    @endif
    <img src="{{ $img['src'] }}" alt="{{ $alt }}" @if($lazy ?? true) loading="lazy" decoding="async" @endif>
</picture>
