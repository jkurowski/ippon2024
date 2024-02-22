@extends('layouts.page', ['body_class' => ''])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <div id="page-content">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($investments as $r)
                    <div class="col-12 col-lg-6">
                        @if($r->id == 4)
                            <a href="https://www.aurora.olsztyn.pl/" target="_blank">
                        @else
                            <a href="{{ route('developro.investment.index', $r->slug) }}">
                        @endif
                        <div class="invest-item-holder">
                            <div class="invest-item position-relative">
                                <span class="img-badge">Inwestycja aktualna</span>
                                <div class="invest-item-thumb img-overflow">
                                    <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                </div>
                                <div class="invest-item-desc">
                                    <div class="invest-item-header">
                                        <h2 class="mb-0">{{ $r->name }}</h2>
                                        <div class="invest-item-city">{{ $r->address }}</div>
                                    </div>
                                    @if($r->file_logo)
                                        <img src="{{ asset('investment/logo/'.$r->file_logo) }}" alt="Logo {{ $r->name }}">
                                    @endif
                                    <p>{!! $r->entry_content !!}</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
