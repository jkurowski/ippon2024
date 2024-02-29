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
                                            <p class="text-uppercase">@lang('website.properties')</p>
                                            <p><strong>{{ $city->name }}</strong></p>
                                            <span>@lang('website.top-properties-view-all')</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <div id="topCta">
                                <div>
                                    <p>@lang('website.top-cta-label')</p>
                                    <a href="{{ route('contact.index') }}">@lang('website.top-cta-phonenumber')</a>
                                    <span>@lang('website.top-cta-text')</span>
                                </div>
                            </div>

                            <div id="lang" class="d-none">
                                <ul class="mb-0 list-unstyled d-flex">
                                    @foreach($available_locales as $available_locale => $locale_name)
                                    <li><a href="#" @if($available_locale === $current_locale) class="active" @endif><img src="{{ asset('/images/flag-'.$current_locale.'.png') }}" alt=""></a></li>
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
            <a rel="nofollow" target="_blank" class="Facebook" href="https://www.facebook.com/ippongroup"><span>Facebook</span></a>
        </li>
        <li>
            <a rel="nofollow" target="_blank" class="Instagram" href="https://www.instagram.com/deweloper_ippon.group/"><span>Instagram</span></a>
        </li>
        <li>
            <a rel="nofollow" target="_blank" class="Youtube" href="https://www.youtube.com/channel/UCMq2YxcdW0AH5rZBq_KqI6w"><span>Youtube</span></a>
        </li>
    </ul>
</div>