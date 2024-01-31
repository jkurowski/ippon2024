@extends('layouts.page', ['body_class' => 'career-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <section class="pt-0">
        <div class="container">
            <div class="row left-right">
                <div class="col-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2>Pracuj z najlepszymi</h2>
                        <p>Oferujemy stabilne zatrudnienie i ciągły rozwój w strukturach jednego z najszybciej rozwijających się deweloperów w kraju.</p>
                        <p>&nbsp;</p>
                        <p>Nasz zespół to profesjonaliści dla których rynek nieruchomości jest pasją, a celem - wspólne tworzenie nowych projektów inwestycyjnych.</p>
                        <p>&nbsp;</p>
                        <p>Dołącz do nas, jeżeli cenisz sobie przyjazną atmosferę w pracy, jesteś pełen zapału i gotów na nowe wyzwania!</p>
                    </div>
                </div>
                <div class="col-6">
                    <img src="{{ asset('/images/inline/pracuj-z-najlepszymi.jpg') }}" alt="" class="golden-border" width="840" height="650">
                </div>
            </div>
            <div class="row left-right flex-row-reverse row-offset-up">
                <div class="col-6 d-flex align-items-center">
                    <div class="left-right-text">
                        <h2>Poznajmy się</h2>
                        <p>Proces rekrutacyjny to rozmowa, w czasie której koncentrujemy się na doświadczeniu, umiejętnościach i kompetencjach, które są związane z konkretnym stanowiskiem pracy.</p>
                        <p>&nbsp;</p>
                        <p>Chętnie odpowiadamy na wszystkie pytania, abyś mógł lepiej poznać wartości i misję Firmy.</p>
                    </div>
                </div>
                <div class="col-6">
                    <img src="{{ asset('/images/inline/kariera-poznajmy-sie.jpg') }}" alt="" class="golden-border">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-uppercase"><span class="text-gold">Aktualnie</span> <br>poszukujemy</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="accordion" id="accordionJob">
                        @foreach($jobs as $key => $job)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $job->id }}" aria-expanded="@if($key == 0) true @else false @endif" aria-controls="collapse{{ $job->id }}">
                                    {{ $job->name }} <br><span>{{ $job->city }}</span>
                                </button>
                            </h2>
                            <div id="collapse{{ $job->id }}" class="accordion-collapse collapse @if($key == 0) show @endif" data-bs-parent="#accordionJob">
                                <div class="accordion-body">
                                    {!! $job->text !!}
                                    <a href="mailto:{{ $job->email }}?subject=Oferta pracy: {{ $job->name }}" class="mt-4 bttn bttn-icon">APLIKUJ <i class="ms-5 las la-chevron-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="section-title text-uppercase"><span class="text-gold">Oferujemy</span></h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="row">
                        <div class="col-4">
                            <div class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/stabilne-zatrudnienie.png') }}" alt="" width="135" height="135">
                                </div>
                                <p>STABILNE <br>ZATRUDNIENIE</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/praca-z-najlepszymi.png') }}" alt="" width="135" height="135">
                                </div>
                                <p>PRACA Z NAJLEPSZYMI <br>W BRANŻY</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/szkolenia.png') }}" alt="" width="135" height="135">
                                </div>
                                <p>SZKOLENIA</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/wolne-weekendy.png') }}" alt="" width="135" height="135">
                                </div>
                                <p>WOLNE WEEKENDY</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/realny-wplyw.png') }}" alt="" width="135" height="135">
                                </div>
                                <p>REALNY WPŁYW <br>NA POWSTAJĄCE INWESTYCJE</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="career-iconbox">
                                <div class="career-iconbox-img">
                                    <img src="{{ asset('/images/icons/swieza-kawa.png') }}" alt="" width="135" height="135">
                                </div>
                                <p>CODZIENNIE ŚWIEŻO <br>ZMIELONA KAWA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-0">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="section-title text-uppercase"><span class="text-gold">Przebieg</span> <br>rekrutacji</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-5">
                    <div class="left-right-image pe-5">
                        <img src="{{ asset('/images/inline/rekrutacja-aplikacja.jpg') }}" alt="" class="golden-border" width="670" height="410">
                    </div>
                </div>
                <div class="col-7 d-flex align-items-center left-right-smalltext">
                    <div>
                        <h3>APLIKACJA</h3>
                        <p>Prześlij do nas swoje CV na adres: <a href="mailto:sekretariat@ippon.group">sekretariat@ippon.group</a>. Opisz siebie i zaprezentuj swoje dotychczasowe osiągnięcia.</p>
                    </div>
                </div>
            </div>

            <div class="row flex-row-reverse row-offset-up-50">
                <div class="col-5">
                    <div class="left-right-image ps-5">
                        <img src="{{ asset('/images/inline/rekrutacja-selekcja.jpg') }}" alt="" class="golden-border" width="670" height="410">
                    </div>
                </div>
                <div class="col-7 d-flex align-items-center left-right-smalltext text-end">
                    <div>
                        <h3>SELEKCJA</h3>
                        <p>Jeżeli Twoje doświadczenie jest zgodne z naszymi oczekiwaniami, skontaktujemy się z Tobą i zaprosimy na rozmowę rekrutacyjną do siedziby firmy.</p>
                    </div>
                </div>
            </div>

            <div class="row row-offset-up-50">
                <div class="col-5">
                    <div class="left-right-image pe-5">
                        <img src="{{ asset('/images/inline/rekrutacja-rozmowa.jpg') }}" alt="" class="golden-border" width="670" height="410">
                    </div>
                </div>
                <div class="col-7 d-flex align-items-center left-right-smalltext">
                    <div>
                        <h3>ROZMOWA</h3>
                        <p>Na spotkaniu poznamy się bliżej. Opowiemy o strukturze firmy, kulturze organizacyjnej oraz przybliżymy zakres obowiązków na danym stanowisku pracy. Zadamy Ci kilka pytań, by lepiej poznać Ciebie i Twoje doświadczenie zawodowe.</p>
                    </div>
                </div>
            </div>

            <div class="row flex-row-reverse row-offset-up-50">
                <div class="col-5">
                    <div class="left-right-image ps-5">
                        <img src="{{ asset('/images/inline/rekrutacja-decyzja.jpg') }}" alt="" class="golden-border" width="670" height="410">
                    </div>
                </div>
                <div class="col-7 d-flex align-items-center left-right-smalltext text-end">
                    <div>
                        <h3>DECYZJA</h3>
                        <p>Po rozmowie kwalifikacyjnej otrzymasz od nas informację zwrotną, dotyczącą ostatecznej decyzji związanej z rekrutacją. Wybranym kandydatom złożymy ofertę dopasowaną do ich profilu kompetencji, doświadczenia i stanowiska.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
