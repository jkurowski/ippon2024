@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.rent.edit'))
        <form method="POST" action="{{route('admin.rent.update', $entry->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.rent.store')}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-list"></i><a href="{{route('admin.rent.index')}}" class="p-0">Wynajem</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
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
                                    @include('form-elements.html-select', ['label' => 'Typ', 'name' => 'type', 'selected' => $entry->type, 'select' => [
                                        '1' => 'Lokale mieszkalne',
                                        '2' => 'Lokale usługowe',
                                        '3' => 'Hale usługowe',
                                        '4' => 'Powierzchnia biurowa',
                                        '5' => 'Powierzchnia magazynowa',
                                        '6' => 'Powierzchnia handlowo – magazynowa',
                                        '7' => 'Parking',
                                    ]])
                                </div>

                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Nazwa', 'name' => 'name', 'value' => $entry->name, 'required' => 1])
                                </div>

                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Powierzchnia', 'name' => 'area', 'value' => $entry->area, 'required' => 1])
                                </div>

                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text-count', ['label' => 'Nagłówek strony', 'sublabel'=> 'Meta tag - title', 'name' => 'meta_title', 'value' => $entry->meta_title, 'maxlength' => 60])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text-count', ['label' => 'Opis strony', 'sublabel'=> 'Meta tag - description', 'name' => 'meta_description', 'value' => $entry->meta_description, 'maxlength' => 158])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Indeksowanie', 'sublabel'=> 'Meta tag - robots', 'name' => 'meta_robots', 'value' => $entry->meta_robots])
                                </div>

                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-file', [
                                        'label' => 'Zdjęcie',
                                        'sublabel' => '(wymiary: 840 px / 480 px)',
                                        'name' => 'file',
                                        'file' => $entry->file
                                    ])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.textarea-fullwidth', ['label' => 'Treść', 'name' => 'text', 'value' => $entry->text, 'rows' => 21, 'class' => 'tinymce', 'required' => 1])
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
                @include('form-elements.tintmce')
                @endsection
