@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.commercial.edit'))
        <form method="POST" action="{{route('admin.commercial.update', $entry->id)}}">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.commercial.store')}}">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-home"></i><a href="{{route('admin.commercial.index')}}" class="p-0">Obiekty komercyjne</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            @include('form-elements.back-route-button')
                            <div class="card-body control-col12">
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Nazwa', 'name' => 'name', 'value' => $entry->name, 'required' => 1])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-select', [
                                            'label' => 'Galeria',
                                            'name' => 'gallery_id',
                                            'selected' => $entry->gallery_id,
                                            'select' => $selectMenu
                                        ])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.textarea-fullwidth', ['label' => 'Opis', 'name' => 'text', 'value' => $entry->text, 'rows' => 21, 'class' => 'tinymce', 'required' => 1])
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
                @include('form-elements.tintmce')
                @endsection
