@extends('admin.layout')
@section('content')
@if(Route::is('admin.developro.investment.edit'))
    <form method="POST" action="{{route('admin.developro.investment.update', $entry->id)}}" enctype="multipart/form-data">
        @method('PUT')
@else
    <form method="POST" action="{{route('admin.developro.investment.store')}}" enctype="multipart/form-data">
@endif
        @csrf
        <div class="container">
            <div class="card">
                <div class="card-head container">
                    <div class="row">
                        <div class="col-12 pl-0">
                            <h4 class="page-title row"><i class="fe-book-open"></i><a href="{{route('admin.developro.investment.index')}}" class="p-0">Inwestycje</a><span class="d-inline-flex ml-2 mr-2">/</span>{{ $cardTitle }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                @include('form-elements.back-route-button')
                <div class="card-body control-col12">

                    <div class="row w-100 mb-4">
                        <div class="col-6">
                            @include('form-elements.html-select', [
                                'label' => 'Typ inwestycji',
                                'name' => 'type',
                                'selected' => $entry->type,
                                'select' => [
                                    '1' => 'Inwestycja osiedlowa',
                                    '2' => 'Inwestycja budynkowa',
                                    '3' => 'Inwestycja z domami'
                            ]])
                        </div>
                        <div class="col-6">
                            @include('form-elements.html-select', [
                                'label' => 'Status inwestycji',
                                'name' => 'status',
                                'selected' => $entry->status,
                                'select' => [
                                    '1' => 'Inwestycja w sprzedaży',
                                    '2' => 'Inwestycja zakończona',
                                    '3' => 'Inwestycja planowana',
                                    '4' => 'Inwestycja ukryta'
                            ]])
                        </div>
                    </div>

                    <div class="row w-100 mb-4">
                        <div class="col-12">
                            @include('form-elements.html-input-text', ['label' => 'Nazwa inwestycji', 'name' => 'name', 'value' => $entry->name, 'required' => 1])
                        </div>
                    </div>

                    <div class="row w-100 mb-4">
                        <div class="col-6">
                            @include('form-elements.html-input-text', ['label' => 'Adres inwestycji', 'name' => 'address', 'value' => $entry->address])
                        </div>
                        <div class="col-6">
                            @include('form-elements.html-input-text', ['label' => 'Miasto inwestycji', 'name' => 'city', 'value' => $entry->city])
                        </div>
                    </div>

                    <div class="row w-100 mb-4">
                        <div class="col-6">
                            @include('form-elements.html-input-text', ['label' => 'Termin rozpoczęcia inwestycji', 'name' => 'date_start', 'value' => $entry->date_start])
                        </div>
                        <div class="col-6">
                            @include('form-elements.html-input-text', ['label' => 'Termin zakończenia inwestycji', 'name' => 'date_end', 'value' => $entry->date_end])
                        </div>
                    </div>

                    <div class="row w-100 mb-4">
                        <div class="col-6">
                            @include('form-elements.html-input-text', ['label' => 'Ilość lokali', 'sublabel' => '(tylko liczby)', 'name' => 'areas_amount', 'value' => $entry->areas_amount])
                        </div>
                        <div class="col-6">
                            @include('form-elements.input-text', ['label' => 'Zakres powierzchni w wyszukiwarce xx-xx', 'sublabel' => '(zakresy oddzielone przecinkiem)', 'name' => 'area_range', 'value' => $entry->area_range])
                        </div>
                    </div>

                    <div class="row w-100 mb-4">
                        <div class="col-12">
                            @include('form-elements.html-input-text', ['label' => 'Adres biura sprzedaży', 'name' => 'office_address', 'value' => $entry->office_address])
                        </div>
                    </div>

                    <div class="row w-100 mb-5">
                        <div class="col-4">
                            @include('form-elements.html-input-text-count', ['label' => 'Nagłówek strony', 'sublabel'=> 'Meta tag - title', 'name' => 'meta_title', 'value' => $entry->meta_title, 'maxlength' => 60])
                        </div>
                        <div class="col-4">
                            @include('form-elements.html-input-text-count', ['label' => 'Opis strony', 'sublabel'=> 'Meta tag - description', 'name' => 'meta_description', 'value' => $entry->meta_description, 'maxlength' => 158])
                        </div>
                        <div class="col-4">
                            @include('form-elements.html-input-text', ['label' => 'Indeksowanie', 'sublabel'=> 'Meta tag - robots', 'name' => 'meta_robots', 'value' => $entry->meta_robots])
                        </div>
                    </div>

                    <div class="row w-100 mb-4">
                        @include('form-elements.html-input-text', ['label' => 'Krótki opis na liście', 'name' => 'entry_content', 'value' => $entry->entry_content])
                    </div>

                    <div class="row w-100 mb-4">
                        @include('form-elements.html-input-file', [
                            'label' => 'Miniaturka',
                            'sublabel' => '(wymiary: '.config('images.investment.thumb_width').'px / '.config('images.investment.thumb_height').'px)',
                            'name' => 'file',
                            'file' => $entry->file_thumb,
                            'file_preview' => config('images.investment.preview_file_path')
                            ])
                    </div>

                    <div class="row w-100 mb-4">
                        @include('form-elements.textarea-fullwidth', ['label' => 'Opis inwestycji', 'name' => 'content', 'value' => $entry->content, 'rows' => 11, 'class' => 'tinymce', 'required' => 1])
                    </div>

                    <div class="row w-100 mb-4">
                        @include('form-elements.textarea-fullwidth', ['label' => 'Opis inwestycji po zakończeniu', 'name' => 'end_content', 'value' => $entry->end_content, 'rows' => 11, 'class' => 'tinymce'])
                    </div>
                </div>
            </div>
        </div>
        @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
    </form>
    @include('form-elements.tintmce')
@endsection
