@extends('layouts.page', ['body_class' => 'investment-news no-bottom no-top'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

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
    <div id="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="timeline">
                        <div class="timeline-wrapper">
                            @foreach($investment_news as $news)
                            <?php
                                $newsDate = $news->date;
                                $yearMonth = \Carbon\Carbon::parse($newsDate)->format('Y-m');
                                $day = \Carbon\Carbon::parse($newsDate)->format('d');
                            ?>
                            <div class="day">
                                <a href="{{ route('developro.investment.news.show', [$investment->slug, $news->slug]) }}">
                                    <div class="day-head">
                                        <div class="day-date">
                                            <i>{{ $day }}</i>
                                            <span>{{ $yearMonth }}</span>
                                        </div>
                                        <h2>{{ $news->title }}</h2>
                                    </div>
                                    <div class="day-body">
                                        <p>{{ $news->content_entry }}</p>
                                        <picture>
                                            <source type="image/webp" srcset="{{asset('/investment/articles/thumbs/webp/'.$news->file_webp) }}">
                                            <source type="image/jpeg" srcset="{{asset('/investment/articles/thumbs/'.$news->file) }}">
                                            <img src="{{asset('/investment/articles/thumbs/'.$news->file) }}" alt="{{ $news->title }}" width="700" height="394">
                                        </picture>
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
    </div>
@endsection
