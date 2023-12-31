@extends('layouts.page', ['body_class' => 'news'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'news.jpg'])
@stop

@section('content')
    <section id="mainNews" class="rwd-sm p-0">
        <div class="container">
            @foreach($articles as $key => $article)
                <article class="{{ $loop->even ? 'row' : 'row flex-row-reverse' }}">
                    <div class="col-5">
                        <div class="news-thumb">
                            @if($article->content)
                                <a href="{{route('front.news.show', $article->slug)}}">
                                    @endif
                                    <picture>
                                        <source type="image/webp" srcset="{{asset('/uploads/articles/thumbs/webp/'.$article->file_webp) }}">
                                        <source type="image/jpeg" srcset="{{asset('/uploads/articles/thumbs/'.$article->file) }}">
                                        <img src="{{asset('/uploads/articles/thumbs/'.$article->file) }}" alt="{{ $article->file_alt }}" width="700" height="394" class="golden-border">
                                    </picture>
                                    @if($article->content)
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="news-text">
                            <h2 class="mb-4">
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
                                <a href="{{route('front.news.show', $article->slug)}}" class="bttn mt-5">CZYTAJ WIĘCEJ</a>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection