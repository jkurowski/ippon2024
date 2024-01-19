@extends('layouts.page', ['body_class' => 'no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => 'zrealizowane.jpg'])
@stop

@section('content')
    <div id="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5 pb-3">
                    {!! parse_text($page->content) !!}
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($investments as $r)
                    <div class="col-6">
                        <div class="rent-item">
                            <div class="rent-thumb">
                                <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                            </div>
                            <h2 class="pb-4 golden-color light2-bg">{{ $r->name }}</h2>
                            <div class="rent-item-desc">
                                <p>{{ $r->entry_content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
