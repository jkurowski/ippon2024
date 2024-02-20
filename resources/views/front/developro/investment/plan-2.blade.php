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
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    {!! $investment_page->content !!}
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    @if($building->file)
                        <div id="plan">
                            <div id="plan-holder"><img src="{{ asset('/investment/building/'.$building->file.'') }}" alt="{{$building->name}}" id="invesmentplan" usemap="#invesmentplan"></div>
                            <map name="invesmentplan">
                                <map name="invesmentplan">
                                    @foreach($investment->buildingFloors as $floor)
                                        @if($floor->html)
                                            <area shape="poly" href="{{route('developro.floor', [$investment->slug, $floor, Str::slug($floor->name)])}}" data-item="{{$floor->id}}" title="{{$floor->name}}" alt="floor-{{$floor->id}}" data-floornumber="{{$floor->id}}" data-floortype="{{$floor->type}}" coords="{{cords($floor->html)}}">
                                        @endif
                                    @endforeach
                                </map>
                            </map>
                        </div>
                    @endif

                    @include('front.developro.investment_shared.filtr', ['area_range' => $investment->area_range,  'floors' => $floors, 'floorFiltr' => 1])
                    @include('front.investment_shared.sort')

                    @include('front.developro.investment_shared.list', ['investment' => $investment])
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/plan.js') }}" charset="utf-8"></script>
@endpush
