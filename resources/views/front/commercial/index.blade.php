@extends('layouts.page', ['body_class' => 'menu-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'contact.jpg'])
@stop

@section('content')
    <div id="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! parse_text($page->content) !!}
                </div>
            </div>
        </div>

        <div id="commercials">
            <div class="container">
                @foreach($commercials as $c)
                    <div class="{{ $loop->even ? 'row' : 'row flex-row-reverse' }}">
                        <div class="col-6">
                            @if($c->gallery_id)
                                {!! parse_text('[galeria=commercial]'.$c->gallery_id.'[/galeria]') !!}
                            @else
                                <div class="empty-ippon"></div>
                            @endif
                        </div>
                        <div class="col-6 d-flex align-items-center">
                            <div class="commercials-text">
                                <h2>{{ $c->name }}</h2>
                                {!! $c->text !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection