@if(1 == 2)
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 d-flex justify-content-center text-center">
                <div class="f-logo">
                    <img src="{{ asset('/images/logo-ippon-footer.png') }}" alt="">
                    <h5>Czas buduje wartość.</h5>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <div class="footer-box ps-0 ps-lg-5">
                    <h4>IPPON GROUP</h4>
                    <p>Ippon Group Sp. z o.o.</p>
                    <p>ul. Aleja Armii Ludowej 26, 8 piętro</p>
                    <p>00-609 Warszawa</p>
                    <img src="{{ asset('/images/pzfd-logo-white.png') }}" class="pzfd-logo" alt="PZFD logo" width="290" height="99">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5 mb-md-0">
                <div class="footer-box">
                    <h4>@lang('website.footer-label-contact')</h4>
                    <p>ul. Żelazna 4</p>
                    <p>10-419 Olsztyn</p>
                    <p>&nbsp;</p>
                    <p>@lang('website.footer-opening-hours-label'):</p>
                    <p>@lang('website.footer-opening-hours-text')</p>
                    <ul class="mb-0 list-unstyled icon-list-contact">
                        <li><img src="{{ asset('images/phone-icon-svg.svg') }}" alt=""> <a href="tel:+48895265558">+48 89 526 55 58</a></li>
                        <li><img src="{{ asset('images/envelop-icon-svg.svg') }}" alt=""> <a href="mailto:sekretariat@ippon.group">sekretariat@ippon.group</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="footer-box">
                    <h4>@lang('website.footer-label-sales-office')</h4>
                    <p>ul. Żelazna 4</p>
                    <p>@lang('website.footer-opening-hours-label'):</p>
                    <p>@lang('website.footer-opening-hours-text-2')</p>
                    <ul class="mb-0 list-unstyled icon-list-contact">
                        <li><img src="{{ asset('images/phone-icon-svg.svg') }}" alt=""> <a href="tel:+48724222323">+48 724 222 323</a></li>
                        <li><img src="{{ asset('images/phone-icon-svg.svg') }}" alt=""> <a href="tel:+48609884219">+48 609 884 219</a></li>
                        <li><img src="{{ asset('images/envelop-icon-svg.svg') }}" alt=""> <a href="mailto:mieszkania@ippon.group">mieszkania@ippon.group</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mt-3 mt-lg-5">
            <div class="col-12">
                <div class="text-center">
                    <a href="/pl/polityka-prywatnosci">@lang('website.privacy-policy')</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
@endif


{{-- ==========================================================================
     NOWA STOPKA — makieta Figma 2026
     Napisy PL/EN w tablicy, jak w menu naglowka. Adresy zostaja w polskiej
     formie — to adresy pocztowe. EN godzin/etykiet jak w starej stopce
     (resources/lang/en/website.php, footer-*).
     ========================================================================== --}}
@php
    $ipLang = in_array(app()->getLocale(), ['pl', 'en']) ? app()->getLocale() : 'pl';

    $ipF = [
        'claim'    => ['pl' => 'Czas buduje wartość', 'en' => 'Time Builds Value'],
        'member'   => ['pl' => 'Jesteśmy członkiem', 'en' => 'We are a member of'],
        'pzfd'     => ['pl' => 'Polski Związek Firm Deweloperskich', 'en' => 'Polish Association of Developers'],
        'contact'  => ['pl' => 'Kontakt', 'en' => 'Contact'],
        'sales'    => ['pl' => 'Biuro sprzedaży', 'en' => 'Sales office'],
        'hours_1'  => ['pl' => 'Godziny otwarcia: pn.-pt. 08:00-16:00', 'en' => 'Opening hours: Mon-Fri 08:00-16:00'],
        'hours_2'  => ['pl' => 'Godziny otwarcia: pn.-pt. 09:00-17:00', 'en' => 'Opening hours: Mon-Fri 09:00-17:00'],
        'disclaimer' => [
            'pl' => 'Wizualizacje i wszelkie prezentacje graficzne zamieszczone na stronie mają charakter wyłącznie poglądowy
                     i nie stanowią zapewnień o właściwościach przedmiotów wizualizacji i/lub prezentacji.
                     Wygląd wewnętrzny i zewnętrzny budynku, zagospodarowania terenu oraz poszczególnych lokali
                     mogą ulec zmianie w toku procesu inwestycyjnego i po jego zakończeniu.',
            'en' => 'All visualisations and graphic presentations on this website are for illustrative purposes only
                     and do not constitute a representation of the properties of the items shown.
                     The interior and exterior appearance of the buildings, the landscaping and individual units
                     may change during the course of the development process and after its completion.',
        ],
        'credits'  => ['pl' => 'Projekt i wykonanie:', 'en' => 'Design and development:'],
        'privacy'  => ['pl' => 'Polityka prywatności', 'en' => 'Privacy policy'],
        'news'     => ['pl' => 'Aktualności', 'en' => 'News'],
    ];
@endphp
<footer class="ip-footer">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-3">
                {{-- jak w naglowku: logo musi trzymac aktywny jezyk --}}
                <a href="{{ route('index', ['locale' => app()->getLocale()]) }}">
                    <img class="ip-footer-logo" src="{{ asset('images/homepage/logo-footer.png') }}" width="268" height="97" alt="IPPON GROUP">
                </a>
                <p class="ip-footer-claim">{{ $ipF['claim'][$ipLang] }}</p>

                <div class="ip-footer-social">
                    <span>Social media:</span>
                    {{-- ikonki z fontu (Line Awesome Brands) — @font-face siedzi w ippon.less --}}
                    <a href="https://www.instagram.com/deweloper_ippon.group/" target="_blank" rel="nofollow noopener" aria-label="Instagram">
                        <i class="ip-ico ip-ico-ig" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.facebook.com/ippongroup" target="_blank" rel="nofollow noopener" aria-label="Facebook">
                        <i class="ip-ico ip-ico-fb" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.youtube.com/@ippongroupsp.zo.o.3650" target="_blank" rel="nofollow noopener" aria-label="YouTube">
                        <i class="ip-ico ip-ico-yt" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <h4>Ippon Group</h4>
                <div class="ip-footer-line"></div>
                <p>
                    Ippon Group Sp. z o.o.<br>
                    ul. Aleja Armii Ludowej 26, 8 piętro<br>
                    00-609 Warszawa
                </p>

                <div class="ip-footer-member">
                    <span>{{ $ipF['member'][$ipLang] }}</span>
                    <img src="{{ asset('images/homepage/pzfd.png') }}" width="175" height="62" alt="{{ $ipF['pzfd'][$ipLang] }}">
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <h4>{{ $ipF['contact'][$ipLang] }}</h4>
                <div class="ip-footer-line"></div>
                <p>
                    ul. Żelazna 4<br>
                    10-419 Olsztyn<br>
                    {{ $ipF['hours_1'][$ipLang] }}
                </p>

                <div class="ip-footer-rule"></div>

                <ul class="ip-footer-contact list-unstyled mb-0">
                    <li>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
                        <a href="tel:+48895265558">+48 89 526 55 58</a>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16"/><polyline points="2,6 12,13 22,6"/></svg>
                        <a href="mailto:sekretariat@ippon.group">sekretariat@ippon.group</a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-lg-3">
                <h4>{{ $ipF['sales'][$ipLang] }}</h4>
                <div class="ip-footer-line"></div>
                <p>
                    ul. Żelazna 4<br>
                    10-419 Olsztyn<br>
                    {{ $ipF['hours_2'][$ipLang] }}
                </p>

                <div class="ip-footer-rule"></div>

                <ul class="ip-footer-contact list-unstyled mb-0">
                    <li>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
                        <a href="tel:+48724222323">+48 724 222 323</a>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
                        <a href="tel:+48609884219">+48 609 884 219</a>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16"/><polyline points="2,6 12,13 22,6"/></svg>
                        <a href="mailto:mieszkania@ippon.group">mieszkania@ippon.group</a>
                    </li>
                </ul>
            </div>

        </div>

        <p class="ip-footer-disclaimer">
            {{ $ipF['disclaimer'][$ipLang] }}
        </p>
    </div>

    <div class="ip-footer-bottom">
        <div class="container">
            <p>
                Copyright &copy; {{ date('Y') }} IPPON GROUP All Rights Reserved &nbsp;|&nbsp;
                {{ $ipF['credits'][$ipLang] }} <a class="ip-devlink" href="https://developro.pl" target="_blank" rel="noopener">DeveloPro.pl</a>
            </p>
            <nav>
                <a href="#">{{ $ipF['privacy'][$ipLang] }}</a>
                <i>|</i>
                <a href="#">{{ $ipF['news'][$ipLang] }}</a>
                <i>|</i>
                <a href="#">{{ $ipF['contact'][$ipLang] }}</a>
            </nav>
        </div>
    </div>
</footer>
