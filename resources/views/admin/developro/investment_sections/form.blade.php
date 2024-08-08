@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.developro.investment.section.edit'))
        <form method="POST" action="{{route('admin.developro.investment.section.update', [$investment, $entry])}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.developro.investment.section.store', $investment)}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-home"></i><a href="{{route('admin.developro.investment.index')}}">Inwestycje</a><span class="d-inline-flex me-2 ms-2">/</span><a href="{{route('admin.developro.investment.section.index', $investment)}}">{{$investment->name}}: Sekcje tekstowe</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            @include('form-elements.back-route-button')
                            <div class="card-body control-col12">
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-select', ['label' => 'Status', 'name' => 'active', 'selected' => $entry->active, 'select' => ['1' => 'Pokaż na liście', '0' => 'Ukryj na liście']])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-select', ['label' => 'Status', 'name' => 'category', 'selected' => $entry->category, 'select' => ['1' => 'Opis inwestycji', '2' => 'Lokalizacja']])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Tytuł', 'name' => 'title', 'value' => $entry->title, 'required' => 1])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Sub-tytuł', 'name' => 'subtitle', 'value' => $entry->subtitle, 'required' => 0])
                                </div>
                                @if(!Request::get('lang'))
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-file', [
                                        'label' => 'Zdjęcie',
                                        'name' => 'file',
                                        'file' => $entry->file,
                                        'file_preview' => config('images.investment.section_preview_file_path')
                                    ])
                                </div>
                                @endif
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Przycisk - adres url', 'name' => 'link', 'value' => $entry->link, 'required' => 0])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Przycisk - nazwa', 'name' => 'link_button', 'value' => $entry->link_button, 'required' => 0])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.textarea-fullwidth', ['label' => 'Wprowadź tekst', 'name' => 'text', 'value' => $entry->text, 'rows' => 11, 'class' => 'tinymce', 'required' => 1])
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="lang" value="{{$current_locale}}">
                    <input type="hidden" name="investment_id" value="{{$investment->id}}">
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
                @include('form-elements.tintmce')
                @endsection
