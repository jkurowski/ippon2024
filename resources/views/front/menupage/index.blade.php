@extends('layouts.page', ['body_class' => 'ip-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

{{-- ==== STARY KOD — wylaczony, do usuniecia po odbiorze ==== --}}
@if(1 == 2)
@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <div id="page-content">
        <div class="container">
            <div class="row">
                @if($parent && $parent->id)
                    <div class="col-4 pr-5">
                        {!! App\Models\Page::sidemenu($parent->id) !!}
                    </div>
                @endif

                <div @if($parent && $parent->id) class="col-8" @else class="col-12" @endif>
                    {!! parse_text($page->content) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — uniwersalna podstrona CMS (m.in. /zarzad, /pod-klucz)
     Tresc pisze klient w edytorze, wiec nie mozemy jej przebudowac na
     komponenty — zamiast tego oprawiamy ja klasa .ip-cms, ktora nadaje
     typografii i typowym blokom (.osoba, tabele, listy) wyglad nowego frontu.
     ========================================================================== --}}
@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $page->title,
        'crumbs' => array_values(array_filter([
            ($parent && $parent->id) ? ['label' => $parent->title, 'url' => null] : null,
            ['label' => $page->title, 'url' => null],
        ])),
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')
    <section class="ip-section ip-cms-section">
        <div class="container">
            <div class="row">
                @if($parent && $parent->id)
                    <div class="col-12 col-lg-3">
                        <div class="ip-sidemenu">
                            {!! App\Models\Page::sidemenu($parent->id) !!}
                        </div>
                    </div>
                @endif

                <div class="{{ ($parent && $parent->id) ? 'col-12 col-lg-9' : 'col-12' }}">
                    @php
                        /* Edytor wstawia <p>&nbsp;</p> jako odstep miedzy akapitami. W nowej
                           typografii akapit ma swoj margines, wiec takie puste akapity
                           robia tylko dziury — wycinamy je przed wyswietleniem. */
                        $ipContent = preg_replace('~<p\b[^>]*>(?:\s|&nbsp;|\x{00a0}|<br\s*/?>)*</p>~iu', '', parse_text($page->content));

                        /* Karty osob (Zarzad) siedza w edytorze w polowkowych kolumnach.
                           Biogramy sa dlugie i w dwoch kolumnach robil sie waski slupek
                           tekstu, wiec kazda osoba dostaje wlasny rzad. */
                        if (str_contains($ipContent, 'class="osoba')) {
                            $ipContent = str_replace(['col-lg-6', 'col-xl-6', 'col-md-6'], '', $ipContent);
                            /* razem z kolumnami leca ich odstepy z edytora (ps-3, mt-5, pb-lg-0…),
                               bo rytm miedzy osobami ustawia teraz .osoba, a nie klasy w tresci */
                            $ipContent = preg_replace('~\b[mp][tbse]-(?:sm-|md-|lg-|xl-|xxl-)?\d\b~', '', $ipContent);

                            /* ostatnia osoba bez kreski i odstepu na dole — kazda .osoba
                               siedzi w osobnej kolumnie, wiec :last-child by tu nie pomogl */
                            /* uwaga: samo class="osoba lapie tez class="osoba-text",
                               stad dopasowanie do konca nazwy klasy */
                            if (preg_match_all('~class="osoba(?=[\s"])~', $ipContent, $m, PREG_OFFSET_CAPTURE)) {
                                $last = end($m[0]);
                                $ipContent = substr_replace($ipContent, 'class="osoba is-last', $last[1], strlen($last[0]));
                            }
                        }
                    @endphp

                    <div class="ip-cms">
                        {!! $ipContent !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
