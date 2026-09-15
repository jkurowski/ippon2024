@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

{{-- Boksy = kafle "Inwestycje w sprzedazy" na stronie glownej.
     Wersja EN (?lang=en) pokazuje tylko pola tlumaczone — metraz i obrazek sa
     wspolne dla obu jezykow i edytuje sie je w wersji PL. --}}
@php
    $isTranslation = (bool) Request::get('lang');
@endphp

@section('content')
    @if(Route::is('admin.box.edit'))
        <form method="POST" action="{{route('admin.box.update', $entry->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.box.store')}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-grid"></i><a href="{{route('admin.box.index')}}" class="p-0">Boksy</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}@if($isTranslation) <span class="d-inline-flex ms-2">(tłumaczenie EN)</span>@endif</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            @include('form-elements.back-route-button')
                            <div class="card-body control-col12">
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Napis na obrazku', 'sublabel' => '(np. W SPRZEDAŻY)', 'name' => 'badge', 'value' => $entry->badge, 'required' => 1])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Lokalizacja', 'name' => 'location', 'value' => $entry->location, 'required' => 1])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Nazwa', 'name' => 'name', 'value' => $entry->name, 'required' => 1])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-textarea', ['label' => 'Krótki opis', 'sublabel' => '(maks. 300 znaków)', 'name' => 'description', 'value' => $entry->description, 'rows' => 3, 'cols' => 1, 'required' => 1])
                                </div>

                                @unless($isTranslation)
                                    <div class="row w-100 form-group">
                                        @include('form-elements.html-input-text', ['label' => 'Metraż', 'sublabel' => '(niewymagane, np. 35-56 m²)', 'name' => 'area', 'value' => $entry->area])
                                    </div>
                                @endunless

                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Odbiór', 'sublabel' => '(niewymagane, np. Q4 2026 r.)', 'name' => 'handover', 'value' => $entry->handover])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Atut', 'sublabel' => '(niewymagane, np. 2 piętra, winda)', 'name' => 'advantage', 'value' => $entry->advantage])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Link do mieszkań', 'sublabel' => '(niewymagane, np. /pl/i/osiedle-slow/plan)', 'name' => 'link_apartments', 'value' => $entry->link_apartments])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Link do opisu', 'sublabel' => '(niewymagane — gdy jest, nazwa i obrazek w boksie prowadzą do opisu)', 'name' => 'link_description', 'value' => $entry->link_description])
                                </div>

                                @unless($isTranslation)
                                    <div class="row w-100 form-group">
                                        @if(Route::is('admin.box.create'))
                                            @include('form-elements.html-input-file', ['label' => 'Obrazek', 'sublabel' => ' (min. 1700 px szerokości; kadr przycina się do boksu)', 'name' => 'file', 'required' => 1])
                                        @else
                                            @include('form-elements.html-input-file', ['label' => 'Obrazek', 'sublabel' => ' (min. 1700 px szerokości; kadr przycina się do boksu)', 'name' => 'file', 'file' => $entry->file, 'file_preview' => 'uploads/boxes/', 'file_preview_style' => 'max-width:100%'])
                                        @endif
                                    </div>
                                @endunless
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="lang" value="{{ $isTranslation ? Request::get('lang') : '' }}">
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
@endsection
