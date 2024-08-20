@extends('layouts.page', ['body_class' => 'no-bottom'])

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
    <div id="page-content" class="invest-{{ $investment->slug }}">
        <div class="container">
            <div class="row">
                @foreach($sections as $s)
                    @if($s->id == 1)
                        <div class="col-12 col-xxl-5 d-flex align-items-center">
                            <div class="pe-0 pe-xxl-5 pb-5 pb-xxl-0">
                                <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                @if($s->text) {!! $s->text !!} @endif
                                @if($s->link && $s->link_button)
                                    <a href="{{ $s->link }}" class="bttn bttn-icon mt-3 mt-sm-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-7">
                            @if($s->file_webp)
                                <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="690" class="w-100" />
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row flex-row-reverse mt-0 mt-md-5 pt-5">
                @foreach($sections as $s)
                    @if($s->id == 2)
                        <div class="col-12 col-xxl-5 d-flex align-items-center">
                            <div class="ps-0 ps-xxl-5 pb-5 pb-xxl-0">
                                <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                @if($s->text) {!! $s->text !!} @endif
                                @if($s->link && $s->link_button)
                                    <a href="{{ $s->link }}" class="bttn bttn-icon mt-3 mt-sm-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-7">
                            @if($s->file_webp)
                                <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="690" class="w-100" />
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row mt-0 mt-md-5 pt-5">
                @foreach($sections as $s)
                    @if($s->id == 3)
                        <div class="col-12 col-xxl-5 d-flex align-items-center">
                            <div class="pe-0 pe-xxl-5 pb-5 pb-xxl-0">
                                <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                @if($s->text) {!! $s->text !!} @endif
                                @if($s->link && $s->link_button)
                                    <a href="{{ $s->link }}" class="bttn bttn-icon mt-3 mt-sm-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-7">
                            @if($s->file_webp)
                                <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="690" class="w-100" />
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row flex-row-reverse mt-0 mt-md-5 pt-5">
                @foreach($sections as $s)
                    @if($s->id == 4)
                        <div class="col-12 col-xxl-5 d-flex align-items-center">
                            <div class="ps-0 ps-xxl-5 pb-5 pb-xxl-0">
                                <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                @if($s->text) {!! $s->text !!} @endif
                                @if($s->link && $s->link_button)
                                    <a href="{{ $s->link }}" class="bttn bttn-icon mt-3 mt-sm-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-7">
                            @if($s->file_webp)
                                <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="690" class="w-100" />
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row mt-0 mt-md-5 pt-5">
                @foreach($sections as $s)
                    @if($s->id == 5)
                        <div class="col-12 col-xxl-4 d-flex align-items-center">
                            <div class="pe-0 pe-xxl-5 pb-0">
                                <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                @if($s->text) {!! $s->text !!} @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-8">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/LZ1nGGx3ZSY?si=8Lq8xxK0G2oABPDc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row flex-row-reverse mt-0 mt-md-5 pt-0 pt-md-5">
                @foreach($sections as $s)
                    @if($s->id == 6)
                        <div class="col-12 col-xxl-5 d-flex align-items-center">
                            <div class="ps-0 ps-xxl-5 pb-5 pb-xxl-0">
                                <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                @if($s->text) {!! $s->text !!} @endif
                                @if($s->link && $s->link_button)
                                    <a href="{{ $s->link }}" class="bttn bttn-icon mt-3 mt-sm-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-7">
                            @if($s->file_webp)
                                <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="690" class="w-100" />
                            @else
                                <img src="https://placehold.co/930x690" alt="" width="930" height="690" class="w-100"/>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row mt-0 mt-md-5 pt-5">
                @foreach($sections as $s)
                    @if($s->id == 7)
                        <div class="col-12 col-xxl-5 d-flex align-items-center">
                            <div class="pe-0 pe-xxl-5 pb-5 pb-xxl-0">
                                <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                @if($s->text) {!! $s->text !!} @endif
                                @if($s->link && $s->link_button)
                                    <a href="{{ $s->link }}" class="bttn bttn-icon mt-3 mt-sm-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-7">
                            @if($s->file_webp)
                                <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="690" class="w-100" />
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row flex-row-reverse mt-0 mt-md-5 pt-5">
                @foreach($sections as $s)
                    @if($s->id == 8)
                        <div class="col-12 col-xxl-5 d-flex align-items-center">
                            <div class="ps-0 ps-xxl-5 pb-5 pb-xxl-0">
                                <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                @if($s->text) {!! $s->text !!} @endif
                                @if($s->link && $s->link_button)
                                    <a href="{{ $s->link }}" class="bttn bttn-icon mt-3 mt-sm-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-7">
                            @if($s->file_webp)
                                <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="690" class="w-100" />
                            @else
                                <img src="https://placehold.co/930x690" alt="" width="930" height="690"/>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row mt-0 mt-md-5 pt-5">
                @foreach($sections as $s)
                    @if($s->id == 9)
                        <div class="col-12 col-xxl-5 d-flex align-items-center">
                            <div class="pe-0 pe-xxl-5 pb-5 pb-xxl-0">
                                <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                @if($s->text) {!! $s->text !!} @endif
                                @if($s->link && $s->link_button)
                                    <a href="{{ $s->link }}" class="bttn bttn-icon mt-3 mt-sm-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-7">
                            @if($s->file_webp)
                                <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="690" class="w-100" />
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row flex-row-reverse mt-0 mt-md-5 pt-5 mb-5 pb-0 pb-xxl-5">
                @foreach($sections as $s)
                    @if($s->id == 10)
                        <div class="col-12 col-xxl-5 d-flex align-items-center">
                            <div class="ps-0 ps-xxl-5 pb-5 pb-xxl-0">
                                <h2>@if($s->title){!! $s->title !!}@endif</h2>
                                @if($s->text) {!! $s->text !!} @endif
                                @if($s->link && $s->link_button)
                                    <a href="{{ $s->link }}" class="bttn bttn-icon mt-3 mt-sm-5 bttn-synergia">{{ $s->link_button }} <i class="ms-3 las la-chevron-circle-right"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-7">
                            @if($s->file_webp)
                                <img src="{{ asset('investment/sections/webp/'.$s->file_webp) }}" alt="" width="930" height="690" class="w-100" />
                            @else
                                <img src="https://placehold.co/930x690" alt="" width="930" height="690" class="w-100"/>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <link rel="stylesheet" href="https://use.typekit.net/sjn7rrp.css">
    <script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>
@endpush
