@extends('layouts.page', ['body_class' => 'news'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

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
                                <a href="{{route('front.news.show', $article->slug)}}" class="bttn mt-4 mt-xl-5">CZYTAJ WIĘCEJ</a>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection