@extends('layouts.page', ['body_class' => 'investment-news'])

@section('meta_title', $investment_news->title)
@section('seo_title', $investment_news->meta_title)
@section('seo_description', $investment_news->meta_description)

@section('pageheader')
    @include('layouts.partials.developro-header', [
    'investmentName' => $investment->name,
    'investmentSlug' => $investment->slug,
    'investmentPages' => $investment->pages,
    'investmentLogo' => $investment->file_logo,
    'investmentHeader' => $investment->file_header,
    'header_file' => 'zrealizowane.jpg'
    ])
@stop


@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <div class="post-details">
                    <picture>
                        <source type="image/webp" srcset="{{asset('investment/articles/webp/'.$investment_news->file_webp) }}">
                        <source type="image/jpeg" srcset="{{asset('investment/articles/'.$investment_news->file) }}">
                        <img src="{{asset('investment/articles/'.$investment_news->file) }}" alt="{{ $investment_news->title }}" class="w-100">
                    </picture>

                    <div class="post-details-entry mt-4 mb-3">
                        <h1 class="post-details-title mb-4">{{ $investment_news->title }}</a></h1>
                        <p><b>{{$investment_news->content_entry}}</b></p>
                    </div>
                    <div class="post-details-text">
                        <p>{!! parse_text($investment_news->content) !!}</p>
                    </div>
                    <a href="{{route('developro.investment.news', $investment->slug)}}" class="bttn mt-5">WRÓĆ DO LISTY</a>
                </div>
            </div>
        </div>
    </div>
@endsection
