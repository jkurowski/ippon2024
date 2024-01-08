@extends('layouts.page', ['body_class' => 'menu-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'contact.jpg'])
@stop

@section('content')
    <div id="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! parse_text($page->content) !!}
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="col-12 mt-5">
                        <div class="accordion" id="discounts">
                            @foreach ($list as $item)
                                <div class="accordion-item">
                                    <div class="accordion-header" id="heading{{$item->id}}" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="false" aria-controls="collapse{{$item->id}}">
                                        <div class="row">
                                            <div class="col-12 col-sm-3 d-flex justify-content-center align-items-center">
                                                <img src="/uploads/promotions/{{$item->file}}" alt="{{$item->name}}">
                                            </div>
                                            <div class="col-12 col-sm-9">
                                                <div class="accordion-text">
                                                    <h2>{{ $item->name }}</h2>
                                                    <p>{{$item->text}}</p>
                                                    <p class="bttn bttn-icon mt-3">Zobacz kod <i class="ms-3 las la-plus-circle"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="collapse{{$item->id}}" class="collapse" aria-labelledby="heading{{$item->id}}" data-bs-parent="#discounts">
                                        <div class="row">
                                            <div class="col-12 col-sm-3 col-accordion-code">
                                                <div class="accordion-code">{{$item->discount}}</div>
                                            </div>
                                            <div class="col-12 col-sm-9">
                                                <div class="accordion-desc">{!! $item->description !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
