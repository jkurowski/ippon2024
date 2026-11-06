@extends('layouts.page', ['body_class' => 'ip-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

{{-- ==== STARY KOD — wylaczony, do usuniecia po odbiorze ==== --}}
@if(1 == 2)
@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <section id="mainNews" class="rwd-sm p-0 blog-list">
        <div class="container">
            @foreach($articles as $key => $article)
                <article class="{{ $loop->even ? 'row' : 'row flex-row-reverse' }}">
                    <div class="col-12 col-xl-5">
                        <div class="news-thumb mb-4 mb-xl-0">
                            @if($article->content)
                                <a href="{{route('front.news.show', $article->slug)}}">
                                    @endif
                                    <picture>
                                        <source type="image/webp" srcset="{{asset('/uploads/articles/thumbs/webp/'.$article->file_webp) }}">
                                        <source type="image/jpeg" srcset="{{asset('/uploads/articles/thumbs/'.$article->file) }}">
                                        <img src="{{asset('/uploads/articles/thumbs/'.$article->file) }}" alt="{{ $article->file_alt }}" width="700" height="394" class="golden-border w-100">
                                    </picture>
                                    @if($article->content)
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 d-flex align-items-center">
                        <div class="news-text">
                            <h2 class="mb-3 mb-sm-4">
                                @if($article->content)
                                    <a href="{{route('front.news.show', $article->slug)}}">
                                        @endif
                                        {{ $article->title }}
                                        @if($article->content)
                                    </a>
                                @endif
                            </h2>
                            <p>{{ $article->content_entry }}</p>
                            @if($article->content)
                                <a href="{{route('front.news.show', $article->slug)}}" class="bttn mt-4 mt-xl-5">@lang('website.button-read-more')</a>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — Blog (lista)
     Wpisy na pelnej szerokosci: zdjecie dochodzi do krawedzi ekranu, obok
     data, tytul i zajawka (uklad .ip-invrow z podstron mieszkaniowych).
     Zdjecia z pelnego pliku (/uploads/articles, 1060 px) - od 6.11.2026, wczesniej miniatury.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl' ? 'Blog' : 'Blog',
        'crumbs' => [
            ['label' => 'Blog', 'url' => null],
        ],
        'lead'   => $L == 'pl'
                        ? 'Poradniki i komentarze o rynku mieszkaniowym - z perspektywy dewelopera.'
                        : 'Guides and commentary on the housing market - from a developer’s perspective.',
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header)
                        // tlo zapasowe (Gemini od klienta 2.11.2026), gdy w CMS nie ma pliku
                        : asset('images/pagehead/blog.jpg'),
    ])
@stop

@section('content')

    @if($articles->count() > 0)
        <section class="ip-invrows ip-blog-rows">
            @foreach($articles as $article)
                @php $url = $article->content ? route('front.news.show', $article->slug) : null; @endphp

                <article class="ip-invrow is-half @if($loop->odd) is-reverse @endif">
                    <div class="row g-0 align-items-center">

                        <div class="col-12 col-lg-6 ip-invrow-media">
                            @if($url)<a href="{{ $url }}">@endif
                                {{-- 6.11.2026 "ciagle zdjecia sa niewyrazne": kafel ma pol ekranu
                                     (ok. 900-1300 px), a miniatury maja 700x394 - bierzemy pelny
                                     plik 1060x596. Ostrzej juz tylko z wiekszych zdjec od klienta. --}}
                                <picture>
                                    <source type="image/webp" srcset="{{ asset('/uploads/articles/webp/'.$article->file_webp) }}">
                                    <source type="image/jpeg" srcset="{{ asset('/uploads/articles/'.$article->file) }}">
                                    <img src="{{ asset('/uploads/articles/'.$article->file) }}"
                                         alt="{{ $article->file_alt ?: $article->title }}" width="1060" height="596" loading="lazy" decoding="async">
                                </picture>
                            @if($url)</a>@endif
                        </div>

                        <div class="col-12 col-lg-6 ip-invrow-body">
                            <div class="ip-invrow-inner">
                                <span class="ip-blog-date">{{ \Carbon\Carbon::parse($article->date)->format('d.m.Y') }}</span>

                                <h2>
                                    @if($url)
                                        <a href="{{ $url }}">{{ $article->title }}</a>
                                    @else
                                        {{ $article->title }}
                                    @endif
                                </h2>

                                <div class="ip-rule"></div>

                                @if($article->content_entry)
                                    <div class="ip-invrow-desc">
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($article->content_entry), 260) }}</p>
                                    </div>
                                @endif

                                @if($url)
                                    <a href="{{ $url }}" class="ip-btn-gold-lg">@lang('website.button-read-more')</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </article>
            @endforeach
        </section>
    @else
        <section class="ip-section ip-blog-empty-section">
            <div class="container">
                <p class="ip-news-empty">{{ $L == 'pl' ? 'Nie mamy jeszcze żadnych wpisów.' : 'There are no posts yet.' }}</p>
            </div>
        </section>
    @endif

@endsection
