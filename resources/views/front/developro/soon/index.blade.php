@extends('layouts.page', ['body_class' => ''])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => 'zrealizowane.jpg'])
@stop

@section('content')
    <div id="page-content">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($investments as $r)
                    <div class="col-6">
                        <div class="invest-item-holder">
                            <div class="invest-item">
                                <div class="invest-item-thumb">
                                    <span class="img-badge">Inwestycja już wkrótce</span>
                                    @if($r->developro)
                                        <a href="{{ route('developro.investment.index', $r->slug) }}">
                                            <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                        </a>
                                    @else
                                        <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                    @endif
                                </div>
                                <div class="invest-item-desc">
                                    <div class="invest-item-header">
                                        @if($r->developro)
                                            <h2 class="mb-0">
                                                <a href="{{ route('developro.investment.index', $r->slug) }}">{{ $r->name }}</a>
                                            </h2>
                                        @else
                                            <h2 class="mb-0">{{ $r->name }}</h2>
                                        @endif
                                        @if($r->address)
                                            <div class="invest-item-city">{{ $r->address }}</div>
                                        @else
                                            <div class="invest-item-city"> &nbsp;</div>
                                        @endif
                                    </div>
                                    @if($r->file_logo)
                                        <img src="{{ asset('investment/logo/'.$r->file_logo) }}" alt="Logo {{ $r->name }}">
                                    @endif
                                    <p>{{ $r->entry_content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection