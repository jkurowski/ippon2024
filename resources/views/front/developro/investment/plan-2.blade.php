@extends('layouts.page', ['body_class' => 'investment-contact'])

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
            @if($investment_page->content)
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    {!! $investment_page->content !!}
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-12 mt-5">
{{--                    @if($building->file)--}}
{{--                        <div id="plan" class="d-none">--}}
{{--                            <div id="plan-holder"><img src="{{ asset('/investment/building/'.$building->file.'') }}" alt="{{$building->name}}" id="invesmentplan" usemap="#invesmentplan"></div>--}}
{{--                            <map name="invesmentplan">--}}
{{--                                <map name="invesmentplan">--}}
{{--                                    @foreach($investment->buildingFloors as $floor)--}}
{{--                                        @if($floor->html)--}}
{{--                                            <area shape="poly" href="{{route('developro.floor', [$investment->slug, $floor, Str::slug($floor->name)])}}" data-item="{{$floor->id}}" title="{{$floor->name}}" alt="floor-{{$floor->id}}" data-floornumber="{{$floor->id}}" data-floortype="{{$floor->type}}" coords="{{cords($floor->html)}}">--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </map>--}}
{{--                            </map>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    @if($investment->id == 5)
                        <div class="ratio ratio-16x9">
                    <iframe
                            frameborder="0" src="https://v4-jeff.prod.resimo.io/ippon/slow/#/?app=jeff&jeff-building=1&lang=pl"
                            allow="fullscreen"
                            class="jeff-iframe"
                            style="border:0;margin:0;padding:0"
                    ></iframe>
                        </div>
                    @endif
                    @include('front.developro.investment_shared.filtr', ['area_range' => $investment->area_range,  'floors' => $floors, 'floorFiltr' => 1])
                    <div class="mt-4"></div>
                    @include('front.investment_shared.multi', ['investment' => $investment])
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/plan.js') }}" charset="utf-8"></script>
@endpush
