@if(1 == 2)
    <div class="header-holder">
        <header id="header" class="d-flex">
            <div id="logo">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="" width="224" height="233">
                </a>
                <p>Czas buduje wartość.</p>
            </div>
            <div id="nav">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-12 p-0">
                            <div class="top d-flex justify-content-end">
                                <div id="cities">
                                    @foreach($cities as $city)
                                        @if($city->active)
                                            <a href="{{ route('map', $city->slug) }}" class="city-item">
                                                <div class="city-key">

                                                </div>
                                                <div>
                                                    <p class="text-uppercase">@lang('website.properties')</p>
                                                    <p><strong>{{ $city->name }}</strong></p>
                                                    <span>@lang('website.top-properties-view-all')</span>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>

                                <div id="topCta">
                                    <div>
                                        <p>@lang('website.top-cta-label')</p>
                                        <a href="{{ route('contact.index') }}">@lang('website.top-cta-phonenumber')</a>
                                        <span>@lang('website.top-cta-text')</span>
                                    </div>
                                </div>

                                <div id="lang">
                                    <ul class="mb-0 list-unstyled d-flex">
                                        @php
                                            $currentLocale = app()->getLocale();
                                        @endphp
                                        @foreach($available_locales as $available_locale => $locale_name)
                                            @php
                                                $localeUrl = changeLocaleInUrl($available_locale);
                                            @endphp
                                            <li>
                                                <a href="{{ $localeUrl }}" @if($available_locale === $current_locale) class="active" @endif>
                                                    <img src="{{ asset('/images/flag-'.$available_locale.'.png') }}" alt="">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-0 d-flex align-items-center justify-content-end">
                            <nav>
                                <ul class="mb-0 list-unstyled d-block d-xl-flex justify-content-center justify-content-xl-end">
                                    <li class="nav-main">
                                        <a href="#">@lang('website.menu-about-group') <i class="ms-2 las la-angle-down"></i></a>
                                        <ul class="mb-0 list-unstyled subnav">
                                            <li><a href="{{ route('about') }}">@lang('website.menu-about-us')</a></li>
                                            <li><a href="{{ url($current_locale.'/zarzad') }}">@lang('website.menu-management')</a></li>
                                            <li><a href="{{ route('front.articles.index') }}">@lang('website.menu-news')</a></li>
                                            <li><a href="{{ route('career') }}">@lang('website.menu-career')</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-main"><a href="{{ route('land') }}">@lang('website.menu-lands')</a></li>
                                    <li class="nav-main">
                                        <a href="#">@lang('website.menu-apartaments') <i class="ms-2 las la-angle-down"></i></a>
                                        <ul class="mb-0 list-unstyled subnav">
                                            <li><a href="{{ route('developro.current') }}">@lang('website.menu-investment-in-sales')</a></li>
                                            <li><a href="{{ route('developro.soon') }}">@lang('website.menu-investment-soon')</a></li>
                                            <li><a href="{{ route('developro.planned') }}">@lang('website.menu-investment-planned')</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-main"><a href="#">@lang('website.menu-investment-experience') <i class="ms-2 las la-angle-down"></i></a>
                                        <ul class="mb-0 list-unstyled subnav">
                                            <li><a href="{{ route('commercial') }}">@lang('website.menu-commercial-buildings')</a></li>
                                            <li><a href="{{ route('rent') }}">@lang('website.menu-rent')</a></li>
                                            <li><a href="{{ route('developro.completed') }}">@lang('website.menu-completed-investments')</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-main"><a href="#">@lang('website.menu-investment-customer-zone') <i class="ms-2 las la-angle-down"></i></a>
                                        <ul class="mb-0 list-unstyled subnav">
                                            <li class="d-none"><a href="">Panel klienta</a></li>
                                            <li><a href="{{ route('static.howbuy') }}">@lang('website.menu-howtobuy')</a></li>
                                            <li><a href="{{ route('promotion') }}">@lang('website.menu-discounts')</a></li>
                                            <li><a href="{{ url($current_locale.'/pod-klucz') }}">@lang('website.menu-turnkey-apartment')</a></li>
                                            <li><a href="{{ url($current_locale.'/blog') }}">Blog</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-main"><a href="{{ route('contact.index') }}">@lang('website.menu-contact')</a></li>
                                </ul>
                            </nav>
                            <div id="triggermenu" class="d-flex d-xl-none"><i class="las la-bars me-4"></i> MENU</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div id="widget">
        <ul>
            <li class="d-none">
                <a rel="nofollow" target="_blank" class="Shield" href="#" data-toggle="modal" data-target="#covidModal"><span>Jesteśmy bezpieczni</span></a>
            </li>
            <li>
                <a rel="nofollow" target="_blank" class="Shield" href="{{ route('clipboard.index') }}"><i id="clipboardcount">{{ $itemCount }}</i><span>Schowek</span></a>
            </li>
            <li>
                <a rel="nofollow" target="_blank" class="Facebook" href="https://www.facebook.com/ippongroup"><span>Facebook</span></a>
            </li>
            <li>
                <a rel="nofollow" target="_blank" class="Instagram" href="https://www.instagram.com/deweloper_ippon.group/"><span>Instagram</span></a>
            </li>
            <li>
                <a rel="nofollow" target="_blank" class="Youtube" href="https://www.youtube.com/@ippongroupsp.zo.o.3650"><span>Youtube</span></a>
            </li>
        </ul>
    </div>
@endif

{{-- ==========================================================================
     NOWY NAGLOWEK — makieta Figma 2026
     ========================================================================== --}}
<header class="ip-header">
    {{-- Adres z prefiksem jezyka, inaczej klikniecie w logo na /en/... wyrzuca
         na polska strone glowna. Nazwana trasa, bo grupa ma prefiks {locale?}. --}}
    <a href="{{ route('index', ['locale' => app()->getLocale()]) }}" class="ip-logo">
        <img src="{{ asset('images/homepage/logo-ippon.png') }}" width="173" height="62" alt="IPPON GROUP">
    </a>

    <div class="ip-header-nav">
        {{-- $cities pochodzi z globalnego composera w AppServiceProvider --}}
        <nav class="ip-cities">
            @foreach($cities->where('active', 1) as $ipCity)
                <a href="{{ route('map', ['locale' => app()->getLocale(), 'slug' => $ipCity->slug]) }}"
                   class="{{ request()->is('*/lokalizacja/'.$ipCity->slug) ? 'active' : '' }}">{{ $ipCity->name }}</a>
            @endforeach
        </nav>

        <span class="ip-header-sep"></span>

        <button type="button" class="ip-burger" aria-label="Menu" aria-expanded="false" aria-controls="ipMenu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    {{-- Menu — wg ramki "STRONA GLOWNA - WIDOK MENU".
         Dziala na kazdej szerokosci, takze na desktopie.
         Struktura odwzorowana z produkcji (ippon.group), linki przez route().
         Etykiety PL/EN w tablicy, jak w szablonach podstron. EN wziete ze starego
         menu (resources/lang/en/website.php, menu-*), z poprawionymi bledami
         ("Comming soon", "In sales"). --}}
    @php
        $ipL    = ['locale' => app()->getLocale()];
        $ipLang = in_array(app()->getLocale(), ['pl', 'en']) ? app()->getLocale() : 'pl';

        $ipMenu = [
            [
                'key'   => 'o-grupie',
                'label' => ['pl' => 'O grupie', 'en' => 'Company'],
                'sub'   => [
                    ['label' => ['pl' => 'O nas',       'en' => 'About Us'],   'url' => route('about', $ipL)],
                    ['label' => ['pl' => 'Zarząd',      'en' => 'Management'], 'url' => route('zarzad', $ipL)],
                    ['label' => ['pl' => 'Aktualności', 'en' => 'News'],       'url' => route('front.articles.index', $ipL)],
                    ['label' => ['pl' => 'Kariera',     'en' => 'Career'],     'url' => route('career', $ipL)],
                ],
            ],
            [
                'key'   => 'zakup-gruntu',
                'label' => ['pl' => 'Zakup gruntu', 'en' => 'Land purchase'],
                'url'   => route('land', $ipL),
            ],
            [
                'key'   => 'mieszkania',
                'label' => ['pl' => 'Mieszkania', 'en' => 'Apartments'],
                'sub'   => [
                    ['label' => ['pl' => 'W sprzedaży', 'en' => 'For sale'],    'url' => route('developro.current', $ipL)],
                    ['label' => ['pl' => 'Już wkrótce', 'en' => 'Coming soon'], 'url' => route('developro.soon', $ipL)],
                    ['label' => ['pl' => 'Planowane',   'en' => 'Planned'],     'url' => route('developro.planned', $ipL)],
                ],
            ],
            [
                'key'   => 'doswiadczenie',
                'label' => ['pl' => 'Doświadczenie', 'en' => 'Experience'],
                'sub'   => [
                    ['label' => ['pl' => 'Obiekty komercyjne',      'en' => 'Commercial buildings'],  'url' => route('commercial', $ipL)],
                    ['label' => ['pl' => 'Wynajem',                 'en' => 'Rent'],                  'url' => route('rent', $ipL)],
                    ['label' => ['pl' => 'Zrealizowane inwestycje', 'en' => 'Completed investments'], 'url' => route('developro.completed', $ipL)],
                ],
            ],
            [
                'key'   => 'strefa-klienta',
                'label' => ['pl' => 'Strefa Klienta', 'en' => 'Customer Zone'],
                'sub'   => [
                    ['label' => ['pl' => 'Panel klienta',         'en' => 'Customer panel'],           'url' => '#'],
                    ['label' => ['pl' => 'Jak kupić mieszkanie?', 'en' => 'How to buy an apartment?'], 'url' => route('static.howbuy', $ipL)],
                    ['label' => ['pl' => 'Rabaty',                'en' => 'Discounts'],                'url' => route('promotion', $ipL)],
                    ['label' => ['pl' => 'Mieszkanie pod klucz',  'en' => 'Turnkey apartment'],        'url' => route('pod-klucz', $ipL)],
                    ['label' => ['pl' => 'Blog',                  'en' => 'Blog'],                     'url' => route('front.news.index', $ipL)],
                ],
            ],
            [
                'key'   => 'kontakt',
                'label' => ['pl' => 'Kontakt', 'en' => 'Contact'],
                'url'   => route('contact.index', $ipL),
            ],
        ];
    @endphp

    <nav class="ip-menu" id="ipMenu" hidden>

        <div class="ip-menu-viewport">
            <div class="ip-menu-track">

                {{-- poziom 1 --}}
                <div class="ip-menu-pane" data-pane="main">
                    <ul>
                        @foreach($ipMenu as $item)
                            <li>
                                @if(!empty($item['sub']))
                                    <button type="button" class="ip-menu-item" data-sub="{{ $item['key'] }}" aria-expanded="false">
                                        <span>{{ $item['label'][$ipLang] }}</span>
                                        <svg class="ip-menu-arrow" viewBox="0 0 5 10" aria-hidden="true">
                                            <polyline points="0.5,0.5 4.5,5 0.5,9.5"/>
                                        </svg>
                                    </button>
                                @else
                                    <a class="ip-menu-item" href="{{ $item['url'] }}">
                                        <span>{{ $item['label'][$ipLang] }}</span>
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- poziom 2 — widoczny jest tylko panel z klasa is-open --}}
                <div class="ip-menu-pane" data-pane="sub">
                    @foreach($ipMenu as $item)
                        @if(!empty($item['sub']))
                            <div class="ip-menu-subpanel" data-subpanel="{{ $item['key'] }}">
                                <button type="button" class="ip-menu-back">
                                    <svg viewBox="0 0 5 10" aria-hidden="true">
                                        <polyline points="4.5,0.5 0.5,5 4.5,9.5"/>
                                    </svg>
                                    <span>{{ $ipLang == 'pl' ? 'Wróć' : 'Back' }}</span>
                                </button>

                                <ul>
                                    @foreach($item['sub'] as $s)
                                        <li>
                                            <a class="ip-menu-item" href="{{ $s['url'] }}">
                                                <span>{{ $s['label'][$ipLang] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>

        <div class="ip-menu-foot">
            <img src="{{ asset('images/homepage/logo-ippon.png') }}" width="118" height="43" alt="IPPON GROUP">

            <div class="ip-menu-social">
                <a href="https://www.facebook.com/ippongroup" target="_blank" rel="nofollow noopener" aria-label="Facebook">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5h1.65V3.6c-.29-.04-1.27-.12-2.41-.12-2.39 0-4.03 1.46-4.03 4.14V9.9H7.5V13h2.76v8h3.24z"/></svg>
                </a>
                <a href="https://www.instagram.com/deweloper_ippon.group/" target="_blank" rel="nofollow noopener" aria-label="Instagram">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.2c3.2 0 3.6 0 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.25.07 1.62.07 4.81s0 3.56-.07 4.81c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.25.06-1.62.07-4.85.07s-3.6 0-4.85-.07c-1.17-.05-1.8-.25-2.23-.41-.56-.22-.96-.48-1.38-.9-.42-.42-.68-.82-.9-1.38-.16-.42-.36-1.06-.41-2.23C2.21 15.56 2.2 15.19 2.2 12s0-3.56.07-4.81c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41C8.44 2.21 8.8 2.2 12 2.2zm0 1.98c-3.14 0-3.51.01-4.75.07-.9.04-1.39.19-1.71.32-.43.17-.74.37-1.06.69-.32.32-.52.63-.69 1.06-.13.32-.28.81-.32 1.71-.06 1.24-.07 1.61-.07 4.75s.01 3.51.07 4.75c.04.9.19 1.39.32 1.71.17.43.37.74.69 1.06.32.32.63.52 1.06.69.32.13.81.28 1.71.32 1.24.06 1.61.07 4.75.07s3.51-.01 4.75-.07c.9-.04 1.39-.19 1.71-.32.43-.17.74-.37 1.06-.69.32-.32.52-.63.69-1.06.13-.32.28-.81.32-1.71.06-1.24.07-1.61.07-4.75s-.01-3.51-.07-4.75c-.04-.9-.19-1.39-.32-1.71a2.85 2.85 0 0 0-.69-1.06 2.85 2.85 0 0 0-1.06-.69c-.32-.13-.81-.28-1.71-.32-1.24-.06-1.61-.07-4.75-.07zm0 3.37a4.45 4.45 0 1 1 0 8.9 4.45 4.45 0 0 1 0-8.9zm0 7.34a2.89 2.89 0 1 0 0-5.78 2.89 2.89 0 0 0 0 5.78zm5.67-7.54a1.04 1.04 0 1 1-2.08 0 1.04 1.04 0 0 1 2.08 0z"/></svg>
                </a>
                <a href="https://www.youtube.com/@ippongroupsp.zo.o.3650" target="_blank" rel="nofollow noopener" aria-label="YouTube">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21.6 7.2s-.19-1.36-.78-1.96c-.75-.78-1.58-.79-1.97-.83C16.1 4.2 12 4.2 12 4.2h-.01s-4.09 0-6.84.21c-.39.05-1.22.05-1.97.83-.59.6-.78 1.96-.78 1.96S2.2 8.79 2.2 10.4v1.49c0 1.59.2 3.19.2 3.19s.19 1.36.78 1.96c.75.78 1.73.75 2.17.84 1.57.15 6.65.2 6.65.2s4.1-.01 6.85-.21c.39-.05 1.22-.06 1.97-.83.59-.6.78-1.96.78-1.96s.2-1.6.2-3.19V10.4c0-1.6-.2-3.2-.2-3.2zM9.94 14.02V8.51l5.27 2.77-5.27 2.74z"/></svg>
                </a>
                <a href="https://pl.linkedin.com/company/ippon-group" target="_blank" rel="nofollow noopener" aria-label="LinkedIn">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.94 5.5a1.94 1.94 0 1 1-3.88 0 1.94 1.94 0 0 1 3.88 0zM3.2 8.9h3.5V21H3.2V8.9zm5.7 0h3.35v1.65h.05c.47-.85 1.6-1.75 3.3-1.75 3.53 0 4.18 2.2 4.18 5.05V21h-3.5v-5.45c0-1.3-.02-2.97-1.86-2.97-1.86 0-2.15 1.4-2.15 2.87V21H8.9V8.9z"/></svg>
                </a>
            </div>
        </div>
    </nav>
</header>

{{-- naglowek jest position:fixed — ten element trzyma jego miejsce w ukladzie --}}
<div class="ip-header-spacer" aria-hidden="true"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var burger = document.querySelector('.ip-burger');
        var menu   = document.getElementById('ipMenu');
        if (!burger || !menu) return;

        function setOpen(open) {
            burger.classList.toggle('is-open', open);
            burger.setAttribute('aria-expanded', open ? 'true' : 'false');
            menu.classList.toggle('is-open', open);
            if (open) {
                menu.hidden = false;
                // otwieramy zawsze na pierwszym poziomie
                window.requestAnimationFrame(function () {
                    if (typeof showMain === 'function') showMain();
                });
            } else {
                window.setTimeout(function () {
                    if (!menu.classList.contains('is-open')) menu.hidden = true;
                }, 250);
            }
        }

        burger.addEventListener('click', function (e) {
            e.stopPropagation();
            setOpen(!menu.classList.contains('is-open'));
        });

        menu.addEventListener('click', function (e) { e.stopPropagation(); });

        document.addEventListener('click', function () {
            if (menu.classList.contains('is-open')) setOpen(false);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menu.classList.contains('is-open')) {
                setOpen(false);
                burger.focus();
            }
        });

        /* --- Submenu: panel zjezdza w lewo, wraca przyciskiem "Wróć" --- */
        var viewport = menu.querySelector('.ip-menu-viewport');
        var panes    = menu.querySelectorAll('.ip-menu-pane');

        function paneHeight(el) {
            return el ? el.scrollHeight : 0;
        }

        function fitViewport() {
            if (!viewport) return;
            var active = menu.classList.contains('is-sub')
                ? menu.querySelector('.ip-menu-subpanel.is-open')
                : panes[0];
            viewport.style.height = paneHeight(active) + 'px';
        }

        var subCleanup = null;   // opozniony sprzatacz paneli podrzednych

        function showSub(key) {
            // anulujemy sprzatanie po poprzednim powrocie, zeby nie schowalo
            // panelu otwartego w trakcie tych 350ms
            if (subCleanup) { window.clearTimeout(subCleanup); subCleanup = null; }

            menu.querySelectorAll('.ip-menu-subpanel').forEach(function (p) {
                p.classList.toggle('is-open', p.dataset.subpanel === key);
            });
            menu.querySelectorAll('.ip-menu-item[data-sub]').forEach(function (b) {
                b.setAttribute('aria-expanded', b.dataset.sub === key ? 'true' : 'false');
            });
            menu.classList.add('is-sub');
            fitViewport();
        }

        function showMain() {
            menu.classList.remove('is-sub');
            menu.querySelectorAll('.ip-menu-item[data-sub]').forEach(function (b) {
                b.setAttribute('aria-expanded', 'false');
            });
            fitViewport();

            // panel podrzedny chowamy dopiero po zakonczeniu przesuwania
            if (subCleanup) window.clearTimeout(subCleanup);
            subCleanup = window.setTimeout(function () {
                subCleanup = null;
                if (!menu.classList.contains('is-sub')) {
                    menu.querySelectorAll('.ip-menu-subpanel').forEach(function (p) {
                        p.classList.remove('is-open');
                    });
                }
            }, 350);
        }

        menu.querySelectorAll('.ip-menu-item[data-sub]').forEach(function (btn) {
            btn.addEventListener('click', function () { showSub(btn.dataset.sub); });
        });

        menu.querySelectorAll('.ip-menu-back').forEach(function (btn) {
            btn.addEventListener('click', showMain);
        });

        window.addEventListener('resize', fitViewport);

        /* Naglowek chowa sie przy scrollowaniu w dol, wraca przy scrollowaniu w gore.
           Ruch KUMULUJEMY. Przy plynnym scrollu pojedyncza klatka to czesto 2-5px,
           wiec porownywanie klatka-do-klatki z progiem gubi delikatne przewijanie. */
        var header  = document.querySelector('.ip-header');
        var lastY   = Math.max(0, window.pageYOffset);
        var acc     = 0;    // przebyta droga w biezacym kierunku
        var ticking = false;

        var HIDE_AFTER = 24;  // ile w dol, zeby schowac (chroni przed drganiem)
        var SHOW_AFTER = 5;   // ile w gore, zeby pokazac — praktycznie natychmiast

        function onScroll() {
            var y = Math.max(0, window.pageYOffset);
            var delta = y - lastY;
            lastY = y;

            if (delta !== 0) {
                // zmiana kierunku zeruje licznik
                if ((delta > 0) !== (acc > 0)) acc = 0;
                acc += delta;
            }

            if (y <= header.offsetHeight) {
                // przy samej gorze naglowek zawsze widoczny
                header.classList.remove('is-hidden');
                acc = 0;
            } else if (acc >= HIDE_AFTER) {
                if (!header.classList.contains('is-hidden')) {
                    header.classList.add('is-hidden');
                    if (menu.classList.contains('is-open')) setOpen(false);
                }
                acc = 0;
            } else if (acc <= -SHOW_AFTER) {
                header.classList.remove('is-hidden');
                acc = 0;
            }

            ticking = false;
        }

        window.addEventListener('scroll', function () {
            if (ticking) return;
            ticking = true;
            window.requestAnimationFrame(onScroll);
        }, { passive: true });
    });
</script>

<div id="widget">
    <ul>
        <li>
            <a rel="nofollow" class="Shield" href="{{ route('clipboard.index') }}"><i id="clipboardcount">{{ $itemCount }}</i><span>{{ $ipLang == 'pl' ? 'Schowek' : 'Clipboard' }}</span></a>
        </li>
        <li>
            <a rel="nofollow" target="_blank" class="Facebook" href="https://www.facebook.com/ippongroup"><span>Facebook</span></a>
        </li>
        <li>
            <a rel="nofollow" target="_blank" class="Instagram" href="https://www.instagram.com/deweloper_ippon.group/"><span>Instagram</span></a>
        </li>
        <li>
            <a rel="nofollow" target="_blank" class="Youtube" href="https://www.youtube.com/@ippongroupsp.zo.o.3650"><span>Youtube</span></a>
        </li>
    </ul>
</div>
