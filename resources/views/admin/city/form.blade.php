@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.city.edit'))
        <form method="POST" action="{{route('admin.city.update', $entry->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.city.store')}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-grid"></i><a href="{{route('admin.city.index')}}" class="p-0">Miasta</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
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
                                    @include('form-elements.html-input-text', ['label' => 'Nazwa', 'name' => 'name', 'value' => $entry->name, 'required' => 1])
                                </div>

                                <div class="row w-100 mb-4">
                                    {{-- Podglad leci z 'uploads/header/', bo tam CityService zapisuje
                                         pliki. Wczesniej bylo tu config('images.investment.header_file_path'),
                                         czyli 'investment/header/' — sciezka naglowkow inwestycji,
                                         przez co podglad miasta zawsze byl zepsutym obrazkiem. --}}
                                    @include('form-elements.html-input-file', [
                                        'label' => 'Nagłówek',
                                        'sublabel' => '(wymiary: '.config('images.investment.header_width').'px / '.config('images.investment.header_height').'px)',
                                        'name' => 'header',
                                        'file' => $entry->file_header,
                                        'file_preview' => 'uploads/header/'
                                        ])

                                    @if($entry->file_header)
                                        {{-- Bez obrazka podstrona /lokalizacja bierze naglowek
                                             ze strony "Lokalizacja" w CMS-ie. --}}
                                        <div class="col-12 mt-3">
                                            <div class="form-check">
                                                {!! Form::checkbox('delete_header', 1, false, ['class' => 'form-check-input', 'id' => 'delete_header']) !!}
                                                {!! Form::label('delete_header', 'Usuń obrazek', ['class' => 'form-check-label']) !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
        @endsection
