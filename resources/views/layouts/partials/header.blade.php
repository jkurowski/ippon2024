<div class="header-holder">
    <header id="header" class="d-flex">
        <div id="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="" width="224" height="233">
            </a>
            <p>Czas buduje wartość</p>
        </div>
        <div id="nav">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-12 p-0">
                        <div class="top d-flex justify-content-end">

                            <div id="topCta">
                                <div>
                                    <p>INFOLINIA</p>
                                    <a href="tel:">89 526 55 58</a>
                                    <span>MASZ PYTANIA? NAPISZ DO NAS!</span>
                                </div>
                            </div>

                            <div id="lang">
                                <ul class="mb-0 list-unstyled d-flex">
                                    <li><a href=""><img src="{{ asset('/images/flag-en.png') }}" alt=""></a></li>
                                    <li class="d-none"><a href=""><img src="{{ asset('/images/flag-de.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <nav>
                            <ul class="mb-0 list-unstyled d-flex justify-content-end">
                                <li>
                                    <a href="">O grupie <i class="ms-2 las la-angle-down"></i></a>
                                    <ul class="mb-0 list-unstyled subnav">
                                        <li><a href="">O nas</a></li>
                                        <li><a href="{{ url($current_locale.'/zarzad') }}">Zarząd</a></li>
                                        <li><a href="">Aktualności</a></li>
                                        <li><a href="{{ route('career') }}">Kariera</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('land') }}">Zakup gruntu</a></li>
                                <li>
                                    <a href="">Mieszkania <i class="ms-2 las la-angle-down"></i></a>
                                    <ul class="mb-0 list-unstyled subnav">
                                        <li><a href="">W sprzedaży</a></li>
                                        <li><a href="">Już wkrótce</a></li>
                                        <li><a href="">Planowane</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Doświadczenie <i class="ms-2 las la-angle-down"></i></a>
                                    <ul class="mb-0 list-unstyled subnav">
                                        <li><a href="{{ route('commercial') }}">Obiekty komercyjne</a></li>
                                        <li><a href="">Wynajem</a></li>
                                        <li><a href="">Zrealizowane inwestycje</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Strefa klienta <i class="ms-2 las la-angle-down"></i></a>
                                    <ul class="mb-0 list-unstyled subnav">
                                        <li><a href="">Panel klienta</a></li>
                                        <li><a href="">Jak kupić mieszkanie?</a></li>
                                        <li><a href="{{ route('promotion') }}">Rabaty</a></li>
                                        <li><a href="{{ url($current_locale.'/pod-klucz') }}">Mieszkanie pod klucz</a></li>
                                        <li><a href="{{ url($current_locale.'/blog') }}">Blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact.index') }}">Kontakt</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
