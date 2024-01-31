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
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <img src="{{ asset('uploads/rents/'.$rent->file) }}" alt="{{ $rent->name }}" class="mb-5">
                <h2 class="mb-3">{{ $rent->name }}</h2>
                {!! parse_text($rent->text) !!}
                <a href="{{ route('rent') }}" class="bttn mt-4">WRÓĆ DO LISTY</a>
            </div>
        </div>
    </div>
@endsection
