@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.promotion.edit'))
        <form method="POST" action="{{route('admin.promotion.update', $entry->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.promotion.store')}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-shopping-bag"></i><a href="{{route('admin.promotion.index')}}" class="p-0">Promocje</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            @include('form-elements.back-route-button')
                            <div class="card-body control-col12">
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-select', ['label' => 'Pokaż na liście', 'name' => 'active', 'selected' => $entry->active, 'select' => [
                                            '1' => 'Tak',
                                            '2' => 'Nie'
                                        ]])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Nazwa', 'name' => 'name', 'value' => $entry->name, 'required' => 1])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Rabat', 'name' => 'discount', 'value' => $entry->discount, 'required' => 1])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.textarea-fullwidth', ['label' => 'Wstęp', 'name' => 'text', 'value' => $entry->text, 'rows' => 5, 'required' => 1, 'class' => 'tinymce'])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.textarea-fullwidth', ['label' => 'Rozwinięcie', 'name' => 'description', 'value' => $entry->description, 'rows' => 5, 'required' => 1, 'class' => 'tinymce'])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-file', ['label' => 'Obrazek', 'sublabel' => '(wymiary: '.config('images.promotion.width').'px / '.config('images.promotion.height').'px)', 'name' => 'file'])
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
        @include('form-elements.tintmce')
        @endsection
