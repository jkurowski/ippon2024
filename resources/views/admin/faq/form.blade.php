@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.faq.edit'))
        <form method="POST" action="{{route('admin.faq.update', $entry->id)}}">
            @method('PUT')
    @else
        <form method="POST" action="{{route('admin.faq.store')}}">
    @endif
        @csrf
        <div class="container">
            <div class="card-head container">
                <div class="row">
                    <div class="col-12 pl-0">
                        <h4 class="page-title"><i class="fe-grid"></i><a href="{{route('admin.faq.index')}}" class="p-0">FAQ</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                @include('form-elements.back-route-button')
                <div class="card-body control-col12">

                    {{-- Obie wersje jezykowe w jednym formularzu, zamiast zakladki ?lang=en.
                         Przy zakladce wyczyszczenie pola w PL zostawia niewidoczna wartosc
                         w EN i tresc dalej wisi na angielskim froncie; tutaj widac obie naraz.
                         Pytania PL i EN to dzis dwa rozne zestawy (7 polskich i 14 angielskich
                         od klienta), dlatego zadna z wersji nie jest wymagana z osobna —
                         wystarczy jedna, a front pomija wpisy puste w aktywnym jezyku. --}}

                    <div class="row w-100 form-group">
                        @include('form-elements.html-input-text', [
                            'label' => 'Pytanie — wersja polska',
                            'name' => 'question[pl]',
                            'value' => $entry->getTranslation('question', 'pl', false),
                        ])
                    </div>
                    <div class="row w-100 form-group">
                        @include('form-elements.html-input-text', [
                            'label' => 'Pytanie — wersja angielska',
                            'name' => 'question[en]',
                            'value' => $entry->getTranslation('question', 'en', false),
                        ])
                    </div>

                    <div class="row w-100 form-group">
                        @include('form-elements.textarea-fullwidth', [
                            'label' => 'Odpowiedź — wersja polska',
                            'name' => 'answer[pl]',
                            'value' => $entry->getTranslation('answer', 'pl', false),
                            'rows' => 12,
                            'class' => 'tinymce',
                        ])
                    </div>
                    <div class="row w-100 form-group">
                        @include('form-elements.textarea-fullwidth', [
                            'label' => 'Odpowiedź — wersja angielska',
                            'name' => 'answer[en]',
                            'value' => $entry->getTranslation('answer', 'en', false),
                            'rows' => 12,
                            'class' => 'tinymce',
                        ])
                    </div>

                </div>
            </div>
        </div>
        @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
        </form>
    @include('form-elements.tintmce')
@endsection
