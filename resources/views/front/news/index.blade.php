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
            <div class="row">
                <div class="col-12">
                    <div id="timeline">
                        <div class="timeline-wrapper">
                            @foreach($articles as $news)
                                    <?php
                                    $newsDate = $news->date;
                                    $yearMonth = \Carbon\Carbon::parse($newsDate)->format('Y-m');
                                    $day = \Carbon\Carbon::parse($newsDate)->format('d');
                                    ?>
                                <div class="day">
                                    <a href="{{route('front.articles.show', $news->slug)}}">
                                        <div class="day-head">
                                            <div class="day-date">
                                                <i>{{ $day }}</i>
                                                <span>{{ $yearMonth }}</span>
                                            </div>
                                            <h2>{{ $news->title }}</h2>
                                        </div>
                                        <div class="day-body">
                                            <p>{{ $news->content_entry }}</p>

                                            @if($news->file)
                                            <picture>
                                                <source type="image/webp" srcset="{{asset('/uploads/news/thumbs/webp/'.$news->file_webp) }}">
                                                <source type="image/jpeg" srcset="{{asset('/uploads/news/thumbs/'.$news->file) }}">
                                                <img src="{{asset('/uploads/news/thumbs/'.$news->file) }}" alt="{{ $news->title }}" width="700" height="394">
                                            </picture>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@endif

{{-- ==========================================================================
     NOWY WIDOK — Aktualności (lista)
     Kafle to ten sam komponent co w sekcji aktualnosci na stronie glownej.
     Lista ma 48 wpisow, wiec doszlo stronicowanie po 12 — gdyby mialo wrocic
     wszystko na jednej stronie, wystarczy zamienic paginate(12) na get()
     w NewsController.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl' ? 'Aktualności' : 'News',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Aktualności' : 'News', 'url' => null],
        ],
        'lead'   => $L == 'pl'
                        ? 'Co słychać w Ippon Group — inwestycje, wydarzenia i to, co robimy poza budową.'
                        : 'What is going on at Ippon Group — developments, events and what we do beyond building.',
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')
    <section class="ip-section ip-news-section">
        <div class="container">

            @if($articles->count() > 0)
                <div class="row ip-cards-row">
                    @foreach($articles as $news)
                        <div class="col-12 col-md-6 col-xl-4">
                            @include('front.news.ip-card', ['news' => $news])
                        </div>
                    @endforeach
                </div>

                @if($articles->hasPages())
                    <div class="ip-pagination">
                        {{ $articles->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            @else
                <p class="ip-news-empty">
                    {{ $L == 'pl' ? 'Nie mamy jeszcze żadnych wpisów.' : 'There are no posts yet.' }}
                </p>
            @endif

        </div>
    </section>
@endsection
