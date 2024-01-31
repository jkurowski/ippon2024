@extends('layouts.page', ['body_class' => 'news no-top no-bottom'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

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