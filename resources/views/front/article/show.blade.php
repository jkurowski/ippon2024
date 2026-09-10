@extends('layouts.page', ['body_class' => 'ip-page'])

@section('meta_title', $article->title)
@section('seo_title', $article->meta_title)
@section('seo_description', $article->meta_description)
@section('seo_robots', $article->meta_robots)

{{-- ==== STARY KOD — wylaczony, do usuniecia po odbiorze ==== --}}
@if(1 == 2)
@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="post-details">
                    <picture>
                        <source type="image/webp" srcset="{{asset('uploads/articles/webp/'.$article->file_webp) }}">
                        <source type="image/jpeg" srcset="{{asset('uploads/articles/'.$article->file) }}">
                        <img src="{{asset('uploads/articles/'.$article->file) }}" alt="{{ $article->title }}" class="w-100">
                    </picture>

                    <div class="post-details-entry mt-4 mb-3">
                        <h1 class="post-details-title mb-4">{{ $article->title }}</a></h1>
                        <p><b>{{$article->content_entry}}</b></p>
                    </div>
                    <div class="post-details-text">
                        <p>{!! parse_text($article->content) !!}</p>
                    </div>
                    <a href="{{route('front.news.index')}}" class="bttn mt-3 mt-md-5">@lang('website.button-back-to-list')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — Blog (pojedynczy wpis)
     Uklad taki sam jak w aktualnosciach: naglowek z tytulem, zdjecie, lead,
     tresc z CMS-u i trzy inne wpisy na dole.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';
    $other = $other ?? collect();
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $article->title,
        'class'  => 'is-tall',
        'crumbs' => [
            ['label' => 'Blog', 'url' => route('front.news.index', ['locale' => $L])],
            ['label' => \Carbon\Carbon::parse($article->date)->format('d.m.Y'), 'url' => null],
        ],
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    <article class="ip-section ip-post-section">
        <div class="container">
            <div class="ip-post">

                @if($article->file)
                    <div class="ip-post-media">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('uploads/articles/webp/'.$article->file_webp) }}">
                            <source type="image/jpeg" srcset="{{ asset('uploads/articles/'.$article->file) }}">
                            <img src="{{ asset('uploads/articles/'.$article->file) }}" alt="{{ $article->file_alt ?: $article->title }}">
                        </picture>
                    </div>
                @endif

                @if($article->content_entry)
                    <p class="ip-post-lead">{{ $article->content_entry }}</p>
                @endif

                <div class="ip-cms ip-post-text">
                    {!! parse_text($article->content) !!}
                </div>

                <a href="{{ route('front.news.index', ['locale' => $L]) }}" class="ip-btn-outline ip-post-back">
                    @lang('website.button-back-to-list')
                </a>

            </div>
        </div>
    </article>

    @if($other->count() > 0)
        <section class="ip-section ip-news-section pt-0">
            <div class="container">

                <x-section-head>{{ $L == 'pl' ? 'Zobacz też' : 'See also' }}</x-section-head>

                <div class="row ip-cards-row">
                    @foreach($other as $post)
                        <div class="col-12 col-md-6 col-xl-4">
                            @include('front.article.ip-card', ['news' => $post])
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

@endsection
