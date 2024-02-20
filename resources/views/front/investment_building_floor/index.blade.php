@extends('layouts.page', ['body_class' => 'investment-floor'])

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
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-8">
                <h1 class="slow-header justify-content-center mb-5"><span class="rostemary brown">{{$investment->name}} - {{$investment->building->name}} - {{$investment->floor->name}}</span></h1>
            </div>
        </div>

        <div class="row pb-2 pb-sm-4 floor-nav-row">
            <div class="col-12 col-lg-4">
                @if($prev_floor)
                    <a href="{{route('developro.floor', [$investment->slug, $prev_floor, Str::slug($prev_floor->name)])}}" class="bttn bttn-icon"><i class="las la-arrow-left me-5"></i>{{$prev_floor->name}}</a>
                @endif
            </div>
            <div class="col-12 col-lg-4 d-flex justify-content-center"><a href="{{ route('developro.investment.plan', $investment->slug) }}" class="bttn ps-5 pe-5">Plan budynku</a></div>
            <div class="col-12 col-lg-4 text-end">
                @if($next_floor)
                    <a href="{{route('developro.floor', [$investment->slug, $next_floor, Str::slug($next_floor->name)])}}" class="bttn bttn-icon">{{$next_floor->name}} <i class="ms-5 las la-arrow-right"></i></a>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if($investment->floor->file)
                    <div id="plan">
                        <div id="plan-holder"><img src="{{ asset('/investment/floor/'.$investment->floor->file.'') }}" alt="{{$investment->floor->name}}" id="invesmentplan" usemap="#invesmentplan"></div>
                        <map name="invesmentplan">
                                @if($properties)
                                    @foreach($properties as $r)
                                        @if($r->html)
                                            <area
                                                    shape="poly"
                                                    href="{{ route('developro.property', [$investment->slug, $r, Str::slug($r->name), floorLevel($r->floor_number, true), number2RoomsName($r->rooms, true), round(floatval($r->area), 2).'-m2']) }}"
                                                    data-item="{{$r->id}}"
                                                    title="{{$r->name}}<br>Powierzchnia: <b class=fr>{{$r->area}} m<sup>2</sup></b><br />Pokoje: <b class=fr>{{$r->rooms}}</b><br><b>{{ roomStatus($r->status) }}</b>"
                                                    alt="{{$r->slug}}"
                                                    data-roomnumber="{{$r->number}}"
                                                    data-roomtype="{{$r->typ}}"
                                                    data-roomstatus="{{$r->status}}"
                                                    coords="{{cords($r->html)}}"
                                                    class="inline status-{{$r->status}}"
                                            >
                                        @endif
                                    @endforeach
                                @endif
                        </map>
                    </div>
                @endif
            </div>
        </div>

        @include('front.developro.investment_shared.filtr', ['area_range' => $investment->area_range, 'floorFiltr' => '', 'floors' => 1])
        @include('front.developro.investment_shared.sort')
        @include('front.developro.investment_shared.list', ['investment' => $investment])

    </div>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/tip.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/floor.js') }}" charset="utf-8"></script>
@endpush
