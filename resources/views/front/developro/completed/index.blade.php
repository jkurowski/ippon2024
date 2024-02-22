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
            <div class="row">
                <div class="col-12 mb-2 mb-lg-5">
                    {!! parse_text($page->content) !!}
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($investments as $r)
                    <div class="col-12 col-lg-6">
                        <div class="invest-item-holder">
                            <div class="invest-item position-relative">
                                <span class="img-badge">Inwestycja zakończona</span>
                                <div class="invest-item-thumb">
                                    @if($r->carousel->count() > 0)
                                        <div class="textSlider commercial-slider">
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($r->carousel as $p)
                                                    <li>
                                                        <picture>
                                                            <source type="image/webp" srcset="{{asset('uploads/gallery/images/webp/'.$p->file_webp) }}">
                                                            <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/'.$p->file) }}">
                                                            <img src="{{asset('uploads/gallery/images/'.$p->file) }}" alt="{{ $p->name }}">
                                                        </picture>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                    <div class="img-overflow">
                                        <img src="{{ asset('investment/thumbs/'.$r->file_thumb) }}" alt="{{ $r->name }}">
                                    </div>
                                    @endif
                                </div>
                                <div class="invest-item-desc">
                                    <div class="invest-item-header">
                                        <h2 class="mb-0">{{ $r->name }}</h2>
                                        @if($r->address)
                                            <div class="invest-item-city">{{ $r->address }}</div>
                                        @else
                                            <div class="invest-item-city"> &nbsp;</div>
                                        @endif
                                    </div>
                                    @if($r->file_logo)
                                        <img src="{{ asset('investment/logo/'.$r->file_logo) }}" alt="Logo {{ $r->name }}">
                                    @endif
                                    <p>{!! $r->entry_content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
