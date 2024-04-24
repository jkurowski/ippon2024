@extends('layouts.page')

@section('meta_title', $rent->name)
@section('seo_title', $rent->meta_title)
@section('seo_description', $rent->meta_description)
@section('seo_robots', $rent->meta_robots)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center rent-item-detail">
            <div class="col-12 col-xxl-6">
                <img src="{{ asset('uploads/rents/'.$rent->file) }}" alt="{{ $rent->name }}" class="mt-4 mb-sm-5 w-100">
                <h2 class="mb-3">{{ $rent->name }}</h2>
                {!! parse_text($rent->text) !!}
                <a href="{{ route('rent') }}" class="bttn mt-4">@lang('website.button-back-to-list')</a>
            </div>
        </div>
    </div>
@endsection
