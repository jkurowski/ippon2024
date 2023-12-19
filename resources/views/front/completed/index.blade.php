@extends('layouts.page', ['body_class' => 'completed-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'jak-kupic.jpg'])
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="completed-text position-sticky">
                    <div class="gradient-border mb-5">
                        <div class="section-title text-start mb-4">
                            <span>INWESTYCJA</span>
                            <h2>1 SIERPNIA</h2>
                        </div>
                        <p>Komfortowe mieszkania w cichej, spokojnej okolicy 10 minut od centrum Warszawy, to znakomite miejsce zarówno dla rodzin z dziećmi, jak i nowoczesnych, dynamicznych singli.</p>
                        <p>&nbsp;</p>
                        <p><b>SPRZEDAŻ MIESZKAŃ ZAKOŃCZONA</b></p>
                    </div>
                    <p>Inwestycja 1 SIERPNIA przy ul. 1 Sierpnia 32 w Warszawie została zrealizowana w okresie wrzesień 2019 - marzec 2021 jako wspólne przedsięwzięcie SG Development i WSM OCHOTA z UNIBEP S. A. jako Generalnym Wykonawcą.</p>
                    <p>&nbsp;</p>
                    <p>W 8 kondygnacyjnym budynku wybudowano 80 mieszkań o wysokim standardzie o powierzchniach od 28 do 110 m2 z podziemnym garażem i miejscami postojowymi na terenie inwestycji. Na parterze budynku znajdują się 4 lokale usługowe.</p>
                    <p>&nbsp;</p>
                    <p>Budynek został zrealizowany z dbałością o każdy szczegół. Eleganckie części wspólne utrzymane w nowoczesnej stylistyce spełniają oczekiwania najbardziej wymagających. Wykorzystane zostały szlachetne materiały najwyższej jakości, w nowoczesnym połączeniu szarości, drewna i zieleni. Inwestycja jest znakomicie zlokalizowana i skomunikowana z każdą dzielnicą Warszawy. W okolicy znajdują się liczne szkoły, przedszkola, sklepy, ośrodki kultury oraz sportu. Otoczenie pełne zieleni i sąsiedztwo kilku parków zachęca do aktywnego trybu życia.</p>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="completed-img mt-4 mt-xl-0">
                    {!! parse_text('[galeria=gallery]1[/galeria]') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
