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
                            <h2>W ZALEDWIE KILKA MINUT DOJDZIESZ PIESZO <br>DO M.IN.: SKLEPU, SZKOŁY, PRZEDSZKOLA <br>ORAZ PRZYSTANKU KOMUNIKACJI MIEJSKIEJ</h2>
                        </div>
                    </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-12 text-center pb-5">
                            <h2>SPRAWDŹ JAK SZYBKO DOJEDZISZ <br>DO PUNKTÓW HANDLOWYCH, SKLEPÓW <br>ORAZ PUNKTÓW ROZRYWKI</h2>
                        </div>

                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/galeria_web.jpg') }}" alt="" class="m-auto">
                                <h3>Galeria Warmińska</h3>
                                <span>5 min autem</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/obwodnica_web.jpg') }}" alt="" class="m-auto">
                                <h3>Dojazd do obwodnicy</h3>
                                <span>6 min autem</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/sklep_web.jpg') }}" alt="" class="m-auto">
                                <h3>Decathlon</h3>
                                <span>5 min autem</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/kino_web.jpg') }}" alt="" class="m-auto">
                                <h3>Kino</h3>
                                <span>5 min autem</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/restauracja_web.jpg') }}" alt="" class="m-auto">
                                <h3>McDonald</h3>
                                <span>4 min autem</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/sklep_web.jpg') }}" alt="" class="m-auto">
                                <h3>OBI</h3>
                                <span>5 min autem</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/silownia_web.jpg') }}" alt="" class="m-auto">
                                <h3>Siłownia</h3>
                                <span>5 min autem</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-synergia text-center">
                                <img src="{{ asset('uploads/files/synergia/icons/sklep_web.jpg') }}" alt="" class="m-auto">
                                <h3>Auchan</h3>
                                <span>5 min autem</span>
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

        @include('front.contact.form', [ 'page_name' => $investment->name.' - Kontakt'])
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
