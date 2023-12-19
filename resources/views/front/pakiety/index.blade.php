@extends('layouts.page')

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'jak-kupic.jpg'])
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {!! parse_text($page->content) !!}
            </div>
        </div>
    </div>
@endsection
