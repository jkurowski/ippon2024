@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.slider.edit'))
        <form method="POST" action="{{route('admin.slider.update', $entry->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.slider.store')}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">

                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-airplay"></i><a href="{{route('admin.slider.index')}}" class="p-0">Slider</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            @include('form-elements.back-route-button')
                            <div class="card-body control-col12">
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-select', ['label' => 'Status', 'name' => 'active', 'selected' => $entry->active, 'select' => ['1' => 'Aktywny', '2' => 'Nieaktywny']])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-select', ['label' => 'Wyciemnienie zdjęcia', 'name' => 'opacity', 'selected' => $entry->opacity, 'select' => [
                                        '0' => '0',
                                        '0.2' => '0.2',
                                        '0.4' => '0.4',
                                        '0.6' => '0.6',
                                        '0.8' => '0.8',
                                        '1.0' => '1',
                                    ]])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-color', ['label' => 'Kolor wyciemnienia', 'name' => 'color', 'value' => $entry->color])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Nazwa', 'name' => 'title', 'value' => $entry->title, 'required' => 1])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Button: adres url', 'name' => 'link', 'value' => $entry->link])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Button: nazwa', 'name' => 'link_button', 'value' => $entry->link_button])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-select', ['label' => 'Button: target', 'name' => 'link_target', 'selected' => $entry->link_target, 'select' => [
                                        '_self' => 'To samo okno',
                                        '_blank' => 'Nowe okno'
                                    ]])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-file', ['label' => 'Zdjęcie', 'sublabel' => '(zalecane min. '.config('images.slider.big_width').'px szerokości; system sam przygotuje wersje '.implode(' / ', array_keys(config('images.slider.sizes'))).'px, WEBP oraz miniaturkę do nawigacji)', 'name' => 'file'])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-file', ['label' => 'Zdjęcie mobile', 'sublabel' => '(kadr pionowy pod telefony, proporcja 4:5 — zalecane '.config('images.slider.mobile_width').'px / '.config('images.slider.mobile_height').'px)', 'name' => 'file_mobile'])
                                </div>
                                {{-- Film w hero (16.11.2026). Zdjecie wyzej zostaje potrzebne:
                                     to kadr startowy, miniaturka "nastepny" i zapas, gdy film
                                     sie nie wczyta albo uzytkownik ma wylaczone animacje. --}}
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-file', ['label' => 'Film', 'sublabel' => '(opcjonalnie, zamiast zdjęcia w tle slajdu: MP4 lub WEBM, do 100 MB, zalecane 1920px szerokości i do ok. 15 MB. Film gra bez dźwięku, a slajd trwa tyle, ile film. Zdjęcie powyżej jest nadal wymagane - to pierwszy kadr i miniaturka)', 'name' => 'file_video'])
                                </div>
                                @if($entry->file_video)
                                    <div class="row w-100 form-group">
                                        <div class="col-12 control-input">
                                            <video src="{{ asset('uploads/slider/video/'.$entry->file_video) }}" controls muted preload="metadata" style="max-width: 420px; width: 100%; display: block;"></video>
                                            <label class="mt-2 d-inline-flex align-items-center gap-2">
                                                <input type="hidden" name="delete_video" value="0">
                                                <input type="checkbox" name="delete_video" value="1"> Usuń film (slajd wróci do samego zdjęcia)
                                            </label>
                                        </div>
                                    </div>
                                @endif
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Atrybut ALT zdjęcia', 'name' => 'file_alt', 'value' => $entry->file_alt])
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
        @endsection
