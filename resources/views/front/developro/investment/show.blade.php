@extends('layouts.page', ['body_class' => 'investments'])

@section('meta_title', 'Inwestycje - '.$investment->name)
@if($page)
    @section('seo_title', $page->meta_title)
    @section('seo_description', $page->meta_description)
    @section('pageheader')
        @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'rooms.jpg'])
    @stop
@endif

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if($investment->plan)
                <div id="plan-holder">
                    <div class="plan-holder-info">Z planu budynku wybierz piętro lub <a href="#filtr" class="scroll-link" data-offset="90"><b>użyj wyszukiwarki</b></a></div>
                    <img src="{{ asset('/investment/plan/'.$investment->plan->file) }}" alt="{{$investment->name}}" id="invesmentplan" usemap="#invesmentplan">
                    <map name="invesmentplan">
                        @foreach($investment->floors as $floor)
                            @if($floor->html)
                                <area
                                    shape="poly"
                                    href="#"
                                    title="{{$floor->name}}"
                                    alt="floor-{{$floor->id}}"
                                    data-item="{{$floor->id}}"
                                    data-floornumber="{{$floor->id}}"
                                    data-floortype="{{$floor->type}}"
                                    coords="{{cords($floor->html)}}">
                            @endif
                        @endforeach
                    </map>
                </div>
            @endif

            @include('front.developro.investment_shared.filtr', ['area_range' => $investment->area_range])
            @include('front.developro.investment_shared.sort')
            @include('front.developro.investment_shared.list', ['investment' => $investment])

        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/plan.js') }}" charset="utf-8"></script>
@endpush
