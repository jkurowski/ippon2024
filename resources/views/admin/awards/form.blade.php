@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.awards.edit'))
        <form method="POST" action="{{route('admin.awards.update', $entry->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.awards.store')}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-grid"></i><a href="{{route('admin.awards.index')}}" class="p-0">Nagrody</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
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
                                    @include('form-elements.html-input-file', ['label' => 'Obrazek', 'sublabel' => '(wymiary: 380 px / 200 px)', 'name' => 'file'])
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
