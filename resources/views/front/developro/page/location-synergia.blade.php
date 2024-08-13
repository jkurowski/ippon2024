@extends('layouts.page', ['body_class' => 'no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots')noindex, nofollow @endsection

@section('pageheader')
    @include('layouts.partials.developro-header', [
    'investmentName' => $investment->name,
    'investmentSlug' => $investment->slug,
    'investmentPages' => $investment->pages,
    'investmentLogo' => $investment->file_logo,
    'investmentHeader' => $investment->file_header,
    'header_file' => 'zrealizowane.jpg'
    ])
@stop

@section('content')
    <div id="page-content" class="invest-{{ $investment->slug }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
<!-- copy this to editor -->
                    <div class="row">
                        @foreach($sections as $s)
                            @if($s->id == 11)
                                <div class="col-6 d-flex align-items-center">
                                    <div class="pe-5">
                                        <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                        @if($s->text) {!! $s->text !!} @endif
                                        @if($s->link && $s->link_button)
                                            <a href="{{ $s->link }}" class="bttn bttn-icon mt-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    @if($s->file_webp)
                                        <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="654" />
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row flex-row-reverse mt-5 pt-5">
                        @foreach($sections as $s)
                            @if($s->id == 12)
                                <div class="col-6 d-flex align-items-center">
                                    <div class="ps-5">
                                        <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                        @if($s->text) {!! $s->text !!} @endif
                                        @if($s->link && $s->link_button)
                                            <a href="{{ $s->link }}" class="bttn bttn-icon mt-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    @if($s->file_webp)
                                        <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="654" />
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row mt-5 pt-5">
                        @foreach($sections as $s)
                            @if($s->id == 13)
                                <div class="col-12 text-center pb-5">
                                    <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                </div>
                                <div class="col-12">
                                    @if($s->text) {!! $s->text !!} @endif
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-12 text-center pb-5">
                            @if($current_locale == 'pl')
                                <h2 style="color: #222">W ZALEDWIE KILKA MINUT DOJDZIESZ PIESZO <br>DO M.IN.: SKLEPU, SZKOŁY, PRZEDSZKOLA <br>ORAZ PRZYSTANKU KOMUNIKACJI MIEJSKIEJ</h2>
                            @else
                                <h2 style="color: #222">IN JUST A FEW MINUTES ON FOOT, YOU CAN REACH <br>VARIOUS AMENITIES, INCLUDING A STORE, SCHOOL, <br>KINDERGARTEN, AND PUBLIC TRANSPORTATION STOP</h2>
                            @endif
                        </div>

                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/przedszkole_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Przedszkole</h3>
                                    <span>2 min pieszo</span>
                                @else
                                    <h3>Kindergarten</h3>
                                    <span>2 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/tramwaj_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Przystanek tramwajowy</h3>
                                    <span>6 min pieszo</span>
                                @else
                                    <h3>Tram stop</h3>
                                    <span>6 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/szkola_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Szkoła</h3>
                                    <span>5 min pieszo</span>
                                @else
                                    <h3>Primary school</h3>
                                    <span>5 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/sklep_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Sklep Biedronka</h3>
                                    <span>2 min autem</span>
                                @else
                                    <h3>Biedronka store</h3>
                                    <span>2 minutes by car</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/rossman_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Sklep Rosmann</h3>
                                    <span>2 min pieszo</span>
                                @else
                                    <h3>Rossmann store</h3>
                                    <span>2 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/przystanek_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Przystanek autobusowy</h3>
                                    <span>1 min pieszo</span>
                                @else
                                    <h3>Bus stop</h3>
                                    <span>1 minute on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/orlik_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Boisko</h3>
                                    <span>5 min pieszo</span>
                                @else
                                    <h3>Sports field</h3>
                                    <span>5 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/apteka_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                    <h3>Apteka</h3>
                                    <span>2 min pieszo</span>
                                @else
                                    <h3>Pharmacy</h3>
                                    <span>2 minutes on foot</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-12 text-center pb-5">
                            @if($current_locale == 'pl')
                            <h2 style="color: #222">SPRAWDŹ JAK SZYBKO DOJEDZISZ <br>DO PUNKTÓW HANDLOWYCH, SKLEPÓW <br>ORAZ PUNKTÓW ROZRYWKI</h2>
                            @else
                            <h2 style="color: #222">CHECK HOW QUICKLY YOU CAN GET <br>TO SHOPPING CENTERS, STORES, <br>AND ENTERTAINMENT VENUES.</h2>
                            @endif
                        </div>

                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/galeria_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                <h3>Galeria Warmińska</h3>
                                <span>5 min autem</span>
                                @else
                                    <h3>Galeria Warmińska</h3>
                                    <span>5 minutes by car</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/obwodnica_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                <h3>Dojazd do obwodnicy</h3>
                                <span>6 min autem</span>
                                @else
                                    <h3>City bypass</h3>
                                    <span>6 minutes by car</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/sklep_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                <h3>Decathlon</h3>
                                <span>5 min autem</span>
                                @else
                                    <h3>Decathlon store</h3>
                                    <span>5 minutes by car</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/kino_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                <h3>Kino</h3>
                                <span>5 min autem</span>
                                @else
                                    <h3>Cinema</h3>
                                    <span>5 minutes by car</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/restauracja_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                <h3>McDonald</h3>
                                <span>4 min autem</span>
                                @else
                                    <h3>McDonald’s</h3>
                                    <span>4 minutes by car</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/sklep_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                <h3>OBI</h3>
                                <span>5 min autem</span>
                                @else
                                    <h3>OBI store</h3>
                                    <span>5 minutes by car</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/silownia_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                <h3>Siłownia</h3>
                                <span>5 min autem</span>
                                @else
                                    <h3>Gym</h3>
                                    <span>5 minutes by car</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/sklep_web.jpg') }}" alt="" class="m-auto">
                                @if($current_locale == 'pl')
                                <h3>Auchan</h3>
                                <span>5 min autem</span>
                                @else
                                    <h3>Auchan store</h3>
                                    <span>5 minutes by car</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row flex-row-reverse mt-5 pt-5">
                        <div class="col-4 d-flex align-items-center">
                            <div class="ps-5">
                                @if($current_locale == 'pl')
                                <h2>W SAMYM <br>SERCU <span>JAROT</span></h2>
                                @else
                                <h2>IN THE MIDDLE <br>OF THE <span>JAROT</span></h2>
                                @endif
                            </div>
                        </div>
                        <div class="col-8"><iframe width="560" height="315" src="https://www.youtube.com/embed/LZ1nGGx3ZSY?si=8Lq8xxK0G2oABPDc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>
                    </div>
                    <div class="row mt-5 pb-5 mb-5">
                        <div class="col-4"><img src="{{ asset('uploads/files/synergia/location-1.jpg') }}" alt="" /></div>
                        <div class="col-4"><img src="{{ asset('uploads/files/synergia/location-2.jpg') }}" alt="" /></div>
                        <div class="col-4"><img src="{{ asset('uploads/files/synergia/location-3.jpg') }}" alt="" /></div>
                    </div>

<!-- end of copy this to editor -->
                </div>
            </div>
        </div>
        <div class="container mt-0 mt-sm-5 pt-5">
            <div class="row">
                <div class="col-12 text-center">
                    @if($current_locale == 'pl')
                        <h2 class="justify-content-center"><span>MASZ PYTANIA?</span> NAPISZ DO NAS!</h2>
                    @else
                        <h2 class="justify-content-center"><span>HAVE MORE QUESTIONS?</span> WRITE TO US!</h2>
                    @endif
                </div>
            </div>
        </div>

        @include('front.contact.form', [ 'page_name' => $investment->name.' - Kontakt', 'button_class' => 'bttn-synergia'])
        <style>#contactForm{background:none}</style>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://use.typekit.net/sjn7rrp.css">
    <script src="{{ asset('/js/slick.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $("#atut-tempo-carousel").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    </script>
@endpush
