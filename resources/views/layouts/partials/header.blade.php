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
                                    <a href="{{ route('map', $city->slug) }}" class="city-item">
                                        <div class="city-key">

                                        </div>
                                        <div>
                                            <p>MIESZKANIA</p>
                                            <p><strong>{{ $city->name }}</strong></p>
                                            <span>SPRAWDŹ</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <div id="topCta">
                                <div>
                                    <p>INFOLINIA</p>
                                    <a href="{{ route('contact.index') }}">89 526 55 58</a>
                                    <span>MASZ PYTANIA? NAPISZ DO NAS!</span>
                                </div>
                            </div>

                            <div id="lang" class="d-none">
                                <ul class="mb-0 list-unstyled d-flex">
                                    <li><a href=""><img src="{{ asset('/images/flag-en.png') }}" alt=""></a></li>
                                    <li><a href=""><img src="{{ asset('/images/flag-de.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 d-flex align-items-center justify-content-end">
                        <nav>
                            <ul class="mb-0 list-unstyled d-flex justify-content-end">
                                <li>
                                    <a href="">O grupie <i class="ms-2 las la-angle-down"></i></a>
                                    <ul class="mb-0 list-unstyled subnav">
                                        <li><a href="{{ route('about') }}">O nas</a></li>
                                        <li><a href="{{ url($current_locale.'/zarzad') }}">Zarząd</a></li>
                                        <li><a href="{{ route('front.articles.index') }}">Aktualności</a></li>
                                        <li><a href="{{ route('career') }}">Kariera</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('land') }}">Zakup gruntu</a></li>
                                <li>
                                    <a href="">Mieszkania <i class="ms-2 las la-angle-down"></i></a>
                                    <ul class="mb-0 list-unstyled subnav">
                                        <li><a href="{{ route('developro.current') }}">W sprzedaży</a></li>
                                        <li><a href="{{ route('developro.soon') }}">Już wkrótce</a></li>
                                        <li><a href="{{ route('developro.planned') }}">Planowane</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Doświadczenie <i class="ms-2 las la-angle-down"></i></a>
                                    <ul class="mb-0 list-unstyled subnav">
                                        <li><a href="{{ route('commercial') }}">Obiekty komercyjne</a></li>
                                        <li><a href="{{ route('rent') }}">Wynajem</a></li>
                                        <li><a href="{{ route('developro.completed') }}">Zrealizowane inwestycje</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Strefa klienta <i class="ms-2 las la-angle-down"></i></a>
                                    <ul class="mb-0 list-unstyled subnav">
                                        <li class="d-none"><a href="">Panel klienta</a></li>
                                        <li><a href="{{ route('static.howbuy') }}">Jak kupić mieszkanie?</a></li>
                                        <li><a href="{{ route('promotion') }}">Rabaty</a></li>
                                        <li><a href="{{ url($current_locale.'/pod-klucz') }}">Mieszkanie pod klucz</a></li>
                                        <li><a href="{{ url($current_locale.'/blog') }}">Blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact.index') }}">Kontakt</a></li>
                            </ul>
                        </nav>
                        <div id="triggermenu" class="d-flex d-xl-none"><i class="las la-bars me-4"></i> MENU</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
