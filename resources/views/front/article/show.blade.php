@extends('layouts.page')

@section('meta_title', $article->title)
@section('seo_title', $article->meta_title)
@section('seo_description', $article->meta_description)
@section('seo_robots', $article->meta_robots)

@section('pageheader')
    @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'jak-kupic.jpg'])
@stop

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <div class="post-details">
                    <picture>
                        <source type="image/webp" srcset="{{asset('uploads/articles/webp/'.$article->file_webp) }}">
                        <source type="image/jpeg" srcset="{{asset('uploads/articles/'.$article->file) }}">
                        <img src="{{asset('uploads/articles/'.$article->file) }}" alt="{{ $article->title }}">
                    </picture>

                    <div class="post-details-entry mt-4 mb-3">
                        <h1 class="post-details-title mb-4">{{ $article->title }}</a></h1>
                        <p><b>{{$article->content_entry}}</b></p>
                    </div>
                    <div class="post-details-text">
                        <p>{!! parse_text($article->content) !!}</p>
                    </div>
                    <a href="{{route('front.news.index')}}" class="bttn mt-5">WRÓĆ DO LISTY</a>
                </div>
            </div>
        </div>
    </div>
@endsection
