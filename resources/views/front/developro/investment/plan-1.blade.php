@extends('layouts.page', ['body_class' => 'investment-contact'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.developro-header', [
    'investmentName' => $investment->name,
    'investmentSlug' => $investment->slug,
    'investmentPages' => $investment->pages,
    'investmentLogo' => $investment->file_logo,
    'investmentHeader' => $investment->file_header,
    'header_file' => 'zrealizowane.jpg'
    ])
@stop

@section('content')
    <div id="page-content">

    </div>
@endsection
