<?php

if (!function_exists('investmentUrl')) {
    /**
     * Adres, pod ktory linkuja listy inwestycji na froncie.
     *
     * Kolejnosc: pole "Adres URL" z CMS-u (tlumaczalne, brak EN spada do PL),
     * potem karta inwestycji z modulu DeveloPro, a na koncu null — wtedy lista
     * nie rysuje linku w ogole (tak bylo dla inwestycji bez wlasnej podstrony).
     *
     * Wczesniej adresy spoza serwisu byly zaszyte w widokach po ID rekordu
     * (`@if($r->id == 13)`), wiec przezyly przeniesienie bazy tylko do momentu,
     * w ktorym ID sie przenumerowaly.
     */
    function investmentUrl($investment): ?string
    {
        $url = trim((string) (
            $investment->getTranslation('url', app()->getLocale(), false)
                ?: $investment->getTranslation('url', 'pl', false)
        ));

        if ($url !== '') {
            return $url;
        }

        return $investment->developro
            ? route('developro.investment.index', $investment->slug)
            : null;
    }
}

if (!function_exists('investmentUrlExternal')) {
    /**
     * Czy adres wyprowadza poza serwis — tylko takie linki dostaja
     * target="_blank". Adres wzgledny ("/pl/lokalizacja/olsztyn") i adres
     * na wlasnej domenie otwieraja sie w tej samej karcie.
     */
    function investmentUrlExternal(?string $url): bool
    {
        if (!$url || !preg_match('#^https?://#i', $url)) {
            return false;
        }

        $host = parse_url($url, PHP_URL_HOST);
        $self = request()?->getHost() ?: parse_url((string) config('app.url'), PHP_URL_HOST);

        return $host && strcasecmp(preg_replace('/^www\./i', '', $host), preg_replace('/^www\./i', '', (string) $self)) !== 0;
    }
}

if (!function_exists('investmentLinkAttrs')) {
    /**
     * Gotowy komplet atrybutow linku: `<a {!! investmentLinkAttrs($url) !!}>`.
     * Trzyma decyzje o target/rel w jednym miejscu, zamiast powtarzac
     * warunek przy kazdym kaflu.
     */
    function investmentLinkAttrs(?string $url): string
    {
        if (!$url) {
            return '';
        }

        return 'href="'.e($url).'"'
            .(investmentUrlExternal($url) ? ' target="_blank" rel="noopener"' : '');
    }
}
