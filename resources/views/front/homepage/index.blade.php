@extends('layouts.homepage', ['body_class' => 'homepage'])

@section('content')

<div id="slider">
    <img src="{{ asset('/uploads/slider/panel-1.jpg') }}" alt="" class="w-100">
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Poznaj inwestycje</span> <br>w sprzedaży</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Już</span> <br>wkrótce</h2>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            @foreach($investments_soon as $r)
                <div class="col-6">
                    <div class="invest-item-holder">
                        <div class="invest-item">
                            <div class="invest-item-thumb">
                                <span class="img-badge">Inwestycja już wkrótce</span>
                                @if($r->developro)
                                    <a href="{{ route('developro.investment.index', $r->slug) }}">
                                        <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                    </a>
                                @else
                                    <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                @endif
                            </div>
                            <div class="invest-item-desc">
                                <div class="invest-item-header">
                                    @if($r->developro)
                                        <h2 class="mb-0">
                                            <a href="{{ route('developro.investment.index', $r->slug) }}">{{ $r->name }}</a>
                                        </h2>
                                    @else
                                        <h2 class="mb-0">{{ $r->name }}</h2>
                                    @endif
                                    @if($r->address)
                                        <div class="invest-item-city">{{ $r->address }}</div>
                                    @else
                                        <div class="invest-item-city"> &nbsp;</div>
                                    @endif
                                </div>
                                @if($r->file_logo)
                                    <img src="{{ asset('investment/logo/'.$r->file_logo) }}" alt="Logo {{ $r->name }}">
                                @endif
                                <p>{{ $r->entry_content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Inwestycje</span> <br>planowane</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-3" id="plannedCarousel">
            @foreach($investments_planned as $ip)
            <div class="col-12">
                <div class="planned-item row no-gutters">
                    <div class="col-8">
                        @if($ip->developro)
                            <a href="{{ route('developro.investment.index', $ip->slug) }}">
                                <img src="{{ asset('investment/thumbs/'.$ip->file_thumb) }}" alt="{{ $ip->name }}" class="w-100">
                            </a>
                        @else
                            <img src="{{ asset('investment/thumbs/'.$ip->file_thumb) }}" alt="{{ $r->name }}" class="w-100">
                        @endif
                    </div>
                    <div class="col-4">
                        <div class="planned-item-gold">
                            <div class="planned-item-desc">
                                @if($ip->developro)
                                <h2><a href="{{ route('developro.investment.index', $ip->slug) }}">{{ $ip->name }}</a></h2>
                                @else
                                    <h2>{{ $ip->name }}</h2>
                                @endif
                                <p>{{ $ip->entry_content }}</p>
                                @if($ip->developro)
                                <a href="{{ route('developro.investment.index', $ip->slug) }}" class="bttn-link">Zobacz więcej</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Dostępne</span> <br>mieszkania</h2>
            </div>
        </div>
    </div>
    <div class="light-bg pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="main-room">
                        <div class="main-room-header text-center">
                            <h2 class="poppins"><a href="#">MIESZKANIA <br><b>1 POKOJOWE</b></a></h2>
                            <p>Powierzchnia: <span>27m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="#"><img src="{{ asset('/uploads/files/mieszkania-1-pokoje.jpg') }}" alt="Dostępne mieszkania 1-pokojowe"></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="#" class="bttn bttn-icon">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="main-room">
                        <div class="main-room-header text-center">
                            <h2 class="poppins"><a href="#">MIESZKANIA <br><b>2 POKOJOWE</b></a></h2>
                            <p>Powierzchnia: <span>35-48m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="#"><img src="{{ asset('/uploads/files/mieszkania-2-pokoje.jpg') }}" alt="Dostępne mieszkania 2-pokojowe"></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="#" class="bttn bttn-icon">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="main-room">
                        <div class="main-room-header text-center">
                            <h2 class="poppins"><a href="#">MIESZKANIA <br><b>3 POKOJOWE</b></a></h2>
                            <p>Powierzchnia: <span>50-61m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="#"><img src="{{ asset('/uploads/files/mieszkania-3-pokoje.jpg') }}" alt="Dostępne mieszkania 3-pokojowe"></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="#" class="bttn bttn-icon">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="main-room">
                        <div class="main-room-header text-center">
                            <h2 class="poppins"><a href="#">MIESZKANIA <br><b>4 POKOJOWE</b></a></h2>
                            <p>Powierzchnia: <span>60-80m<sup>2</sup></span></p>
                            <div class="main-room-img">
                                <a href="#"><img src="{{ asset('/uploads/files/mieszkania-4-pokoje.jpg') }}" alt="Dostępne mieszkania 4-pokojowe"></a>
                            </div>
                        </div>
                        <div class="main-room-footer">
                            <a href="#" class="bttn bttn-icon">Zobacz mieszkania <i class="ms-3 las la-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Deweloper</span> <br>godny zaufania</h2>
            </div>
            <div class="col-6">
                <img src="{{ asset('images/deweloper-roku-2023.jpg') }}" alt="" width="840" height="600">
            </div>
            <div class="col-6 d-flex align-items-center">
                <div class="section-text ps-5">
                    <p>Jesteśmy wiodącą firmą deweloperską specjalizującą się w realizacji projektów branży mieszkaniowej oraz komercyjnej. Czterokrotnie zostaliśmy nagrodzeni tytułem Deweloper Roku. Budujemy mieszkania, apartamenty oraz domy na terenie całego kraju.</p>
                    <p>&nbsp;</p>
                    <p>W naszych projektach wprowadzamy innowacyjne rozwiązania i kreujemy nowe standardy na rynku. Jako jedyny deweloper zaoferowaliśmy apartamenty z ogrodami zimowymi w Olsztynie. Dbamy o jakość użytych materiałów oraz o komfort i funkcjonalność naszych mieszkań.</p>
                    <a href="{{ route('about') }}" class="bttn bttn-icon mt-5">Sprawdź <i class="ms-5 las la-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div id="numbers">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="number">
                        <div class="number-icon">
                            <img src="{{ asset('/images/icons/wysoka-jakosc-icon.png') }}" alt="" width="170" height="170">
                        </div>
                        <div class="number-value">92%</div>
                        <div class="number-text">
                            <p>mieszkańców naszego osiedla ocenia wysoką jakość wykończenia naszych mieszkań</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="number">
                        <div class="number-icon">
                            <img src="{{ asset('/images/icons/polecenie-zakupu-icon.png') }}" alt="" width="170" height="170">
                        </div>
                        <div class="number-value">95%</div>
                        <div class="number-text">
                            <p>mieszkańców zdecydowanie poleciłoby swoim znajomym zakup mieszkania na naszych osiedlach</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="number">
                        <div class="number-icon">
                            <img src="{{ asset('/images/icons/atrakcyjna-lokalizacja.png') }}" alt="" width="170" height="170">
                        </div>
                        <div class="number-value">97%</div>
                        <div class="number-text">
                            <p>mieszkańców jest zadowolonych z atrakcyjnej lokalizacji naszych inwestycji</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="number">
                        <div class="number-icon">
                            <img src="{{ asset('/images/icons/oddane-mieszkania-icon.png') }}" alt="" width="170" height="170">
                        </div>
                        <div class="number-value">100%</div>
                        <div class="number-text">
                            <p>oddanych mieszkań w terminie</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Opinie</span> <br>klientów</h2>
            </div>
        </div>
    </div>

    <div id="reviewCarousel" class="container-fluid">
        <div class="row">
            @foreach($reviews as $review)
            <div class="col-3">
                <div class="review">
                    <img src="{{ asset('images/quote.svg') }}" alt="Opinia klienta" class="review-quote">
                    <div class="review-name">{{ $review->author }}</div>
                    <div class="review-star">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <img src="{{ asset('images/quote-star.svg') }}" alt="Filled Rate icon">
                            @else
                                <img src="{{ asset('images/quote-star.svg') }}" alt="Empty Rate icon">
                            @endif
                        @endfor
                    </div>

                    <div class="review-content">
                        {!! $review->content !!}
                    </div>
                    <div class="review-source">
                        {!! reviewType($review->type) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Poznaj</span> <br>nas lepiej</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title text-uppercase"><span class="text-gold">Aktualności</span></h2>
            </div>
        </div>
    </div>

    <div id="mainNews" class="container-fluid news-list">
        <div class="row">
            @foreach($news as $n)
            <div class="col-4">
                <article class="border-article">
                    <div class="article-thumb">
                        <span class="article-date">{{ $n->date }}</span>
                        @if($n->file)
                            <a href="{{route('front.articles.show', $n->slug)}}">
                                <picture>
                                    <source type="image/webp" srcset="{{asset('/uploads/news/thumbs/webp/'.$n->file_webp) }}">
                                    <source type="image/jpeg" srcset="{{asset('/uploads/news/thumbs/'.$n->file) }}">
                                    <img src="{{asset('/uploads/news/thumbs/'.$n->file) }}" alt="{{ $n->title }}" width="700" height="394">
                                </picture>
                            </a>
                        @endif
                        <div class="img-gradient"></div>
                    </div>
                    <div class="article-content">
                        <h2><a href="">{{ $n->title }}</a></h2>
                        <p>{{ $n->content_entry }}.</p>
                        <a href="{{route('front.articles.show', $n->slug)}}" class="bttn-link">Czytaj więcej</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('front.contact.form')
@endsection
