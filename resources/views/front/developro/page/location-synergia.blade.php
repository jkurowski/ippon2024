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
                        <div class="col-6 d-flex align-items-center">
                            <div class="pe-5">
                                <h2>WSZĘDZIE <span>BLISKO</span></h2>
                                <p>Osiedle SYNERGIA położone jest w centralnej części, dzielnicy mieszkaniowej - Jaroty, przy ul. Kanta w Olsztynie. Mieszkańcy będą mieli bezpośredni dostęp do wszystkich niezbędnych sklepów oraz placówek edukacyjnych i medycznych. W kilka minut pieszo dojdą do sklepów spożywczych, drogerii, sklepów odzieżowych, apteki, poczty, siłowni, przychodni czy restauracji. Szkoła podstawowa oddalona jest od osiedla zaledwie 5 minut pieszo, a przedszkole 2 minuty.</p>
                            </div>
                        </div>
                        <div class="col-6"><img src="https://placehold.co/770x578" alt="" /></div>
                    </div>
                    <div class="row flex-row-reverse mt-5 pt-5">
                        <div class="col-6 d-flex align-items-center">
                            <div class="ps-5">
                                <h2>OSIEDLE DOBRZE <br><span>SKOMUNIKOWANE</span></h2>
                                <p>Osiedle jest bardzo dobrze skomunikowane z resztą miasta. W 1 minuty pieszo można dojść do przystanku autobusowego, a w 6 minut do przystanku tramwajowego. W kilka minut dojedziesz do obwodnicy Olsztyna, by drogą ekspresową dostać się do Gdańska lub Warszawy.</p>
                            </div>
                        </div>
                        <div class="col-6"><img src="https://placehold.co/770x578" alt="" /></div>
                    </div>
                    <div class="row mt-5 pt-5">
                        <div class="col-12 text-center pb-5">
                            <h2>OBIEKTY <span>W POBLIŻU</span></h2>
                        </div>
                        <div class="col-12"><img src="/uploads/files/synergia/mapa-lokalizacji-osiedle-synergia.jpg" alt="" /></div>
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
                    </div>

                    <div class="row flex-row-reverse mt-5">
                        <div class="col-4 d-flex align-items-center">
                            <div class="ps-5">
                                <h2>W SAMYM <br>SERCU <span>JAROT</span></h2>
                            </div>
                        </div>
                        <div class="col-8"><iframe title="YouTube video player" src="https://www.youtube.com/embed/5OleowHAz7k?si=r9R-kaftgCff8ZXu" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
                    </div>
                    <div class="row mt-5 pb-5 mb-5">
                        <div class="col-4"><img src="https://placehold.co/520x720" alt="" /></div>
                        <div class="col-4"><img src="https://placehold.co/520x720" alt="" /></div>
                        <div class="col-4"><img src="https://placehold.co/520x720" alt="" /></div>
                    </div>

<!-- end of copy this to editor -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link href="https://fonts.cdnfonts.com/css/modern-age" rel="stylesheet">
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
