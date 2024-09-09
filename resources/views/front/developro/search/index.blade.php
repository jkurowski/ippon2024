@extends('layouts.page', ['body_class' => 'no-top no-bottom location-page'])

@section('meta_title', $page->name)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => $page->name, 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    @include('front.developro.investment_shared.search-list')
@endsection
