@extends('layouts.page')

@section('meta_title', $article->title)
@section('seo_title', $article->meta_title)
@section('seo_description', $article->meta_description)
@section('seo_robots', $article->meta_robots)

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
                    <a href="{{route('front.articles.index')}}" class="bttn mt-3 mt-md-5">WRÓĆ DO LISTY</a>
                </div>
            </div>
        </div>
    </div>
@endsection
