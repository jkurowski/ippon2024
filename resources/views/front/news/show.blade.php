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
                    @if($article->file)
                    <picture>
                        <source type="image/webp" srcset="{{asset('uploads/news/webp/'.$article->file_webp) }}">
                        <source type="image/jpeg" srcset="{{asset('uploads/news/'.$article->file) }}">
                        <img src="{{asset('uploads/news/'.$article->file) }}" alt="{{ $article->title }}" class="w-100">
                    </picture>
                    @endif
                    <div class="post-details-entry mt-4 mb-3">
                        <h1 class="post-details-title mb-4">{{ $article->title }}</a></h1>
                        <p><b>{{$article->content_entry}}</b></p>
                    </div>
                    <div class="post-details-text">
                        <p>{!! parse_text($article->content) !!}</p>
                    </div>
                    <a href="{{route('front.articles.index')}}" class="bttn mt-3 mt-md-5">@lang('website.button-back-to-list')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — Aktualności (pojedynczy wpis)
     Naglowek strony bierze tytul wpisu, pod spodem zdjecie, lead i tresc
     z CMS-u, a na dole trzy najnowsze inne wpisy (dane z kontrolera).
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';
    $other = $other ?? collect();

    /* Grafika w pionie (paczka klienta 1200x1600 z 5.11.2026, tekst wpalony w grafike):
       zamiast kadru 16:9, ktory ucinal napisy, pokazujemy kafel 3:4 z uploads/news/card -
       to cala grafika bez przycinania (NewsService::makeCard). Zdjecia poziome bez zmian. */
    $postOriginal = $article->file ? public_path('uploads/news/original/'.$article->file) : null;
    $postSize     = ($postOriginal && is_file($postOriginal)) ? @getimagesize($postOriginal) : false;
    $postCard     = $article->file ? \App\Services\NewsService::cardPath($article) : null;
    $postPortrait = $postSize && $postSize[1] > $postSize[0] && is_file(public_path($postCard));
    $postCardWebp = $postPortrait ? \App\Services\NewsService::cardPath($article, true) : null;
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $article->title,
        'class'  => 'is-tall',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Aktualności' : 'News', 'url' => route('front.articles.index', ['locale' => $L])],
            ['label' => \Carbon\Carbon::parse($article->date)->format('d.m.Y'), 'url' => null],
        ],
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    <article class="ip-section ip-post-section">
        <div class="container">
            <div class="ip-post @if($postPortrait) is-portrait @endif">

                @if($postPortrait)
                    <div class="ip-post-media">
                        <picture>
                            @if(is_file(public_path($postCardWebp)))
                                <source type="image/webp" srcset="{{ asset($postCardWebp) }}">
                            @endif
                            <img src="{{ asset($postCard) }}" alt="{{ $article->title }}" width="840" height="1120">
                        </picture>
                    </div>
                @elseif($article->file)
                    <div class="ip-post-media">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('uploads/news/webp/'.$article->file_webp) }}">
                            <source type="image/jpeg" srcset="{{ asset('uploads/news/'.$article->file) }}">
                            <img src="{{ asset('uploads/news/'.$article->file) }}" alt="{{ $article->title }}">
                        </picture>
                    </div>
                @endif

                <div class="ip-post-body">

                @if($article->content_entry)
                    <p class="ip-post-lead">{{ $article->content_entry }}</p>
                @endif

                <div class="ip-cms ip-post-text">
                    {!! parse_text($article->content) !!}
                </div>

                <a href="{{ route('front.articles.index', ['locale' => $L]) }}" class="ip-btn-outline ip-post-back">
                    @lang('website.button-back-to-list')
                </a>

                </div>

            </div>
        </div>
    </article>

    @if($other->count() > 0)
        <section class="ip-section ip-news-section pt-0">
            <div class="container">

                <x-section-head>{{ $L == 'pl' ? 'Zobacz też' : 'See also' }}</x-section-head>

                <div class="row ip-cards-row">
                    @foreach($other as $news)
                        <div class="col-12 col-md-6 col-xl-4">
                            {{-- kafel 3:4 jak na liscie aktualnosci i SG --}}
                            @include('front.news.ip-trust-card', ['news' => $news])
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

@endsection
