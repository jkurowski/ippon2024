@extends('layouts.page', ['body_class' => 'menu-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => 'contact.jpg'])
@stop

@section('content')
    <div id="page-content">
        <div class="container">
            <div class="row">
                @foreach($rents as $r)
                    <div class="col-6">
                        <div class="rent-item">
                            <div class="rent-thumb">
                                <span class="img-badge">{{ rentType($r->type) }}</span>
                                <a href="{{ route('rent.index.show', ['slug' => slugFromTitle($r->name), 'id' => $r->id]) }}">
                                    <img src="{{ asset('uploads/rents/'.$r->file) }}" alt="{{ $r->name }}">
                                </a>
                            </div>
                            <h2 class="mb-0">
                                <a href="{{ route('rent.index.show', ['slug' => slugFromTitle($r->name), 'id' => $r->id]) }}">{{ $r->name }}</a>
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection