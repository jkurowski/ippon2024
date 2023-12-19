@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.developro.investment.article.edit'))
        <form method="POST" action="{{route('admin.developro.investment.article.update', [$investment, $entry])}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.developro.investment.article.store', $investment)}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card">
                            <div class="card-head container">
                                <div class="row">
                                    <div class="col-12 pl-0">
                                        <h4 class="page-title"><i class="fe-book-open"></i><a href="{{route('admin.developro.investment.article.index', $investment)}}" class="p-0">Aktualności</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                                    </div>
                                </div>
                            </div>
                            @include('form-elements.back-route-button')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        @include('form-elements.html-input-text-count', ['label' => 'Tytuł', 'name' => 'title', 'value' => $entry->title, 'maxlength' => 60])
                                        @include('form-elements.html-input-text-count', ['label' => 'Data', 'name' => 'date', 'value' => $entry->date, 'maxlength' => 60])

                                        @include('form-elements.textarea-fullwidth', ['label' => 'Treść artukułu', 'name' => 'content', 'value' => $entry->content, 'rows' => 11, 'class' => 'tinymce'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="investment_id" value="{{ $investment->id }}">
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
        @include('form-elements.tintmce')
        @endsection
