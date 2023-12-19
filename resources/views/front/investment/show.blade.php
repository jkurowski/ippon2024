@extends('layouts.page', ['body_class' => 'investments no-top'])

@section('meta_title', 'Inwestycje - '.$investment->name)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'rooms.jpg'])
@stop

@section('content')
    @if($investment->plan)
    <div id="plan-holder">
        <div class="plan-info">Z planu budynku wybierz piętro. Z <a href="#roomsList" class="scroll-to" data-offset="80">listy poniżej</a> wybierz mieszkanie.</div>
        <img src="{{ asset('/investment/plan/'.$investment->plan->file.'') }}" alt="{{$investment->name}}" id="invesmentplan" usemap="#invesmentplan" class="w-100">
        <map name="invesmentplan">
            @foreach($investment->floors as $floor)
                @if($floor->html)
                    <area
                        shape="poly"
                        href="{{route('front.investment.floor.index', [$investment->slug, $floor])}}"
                        title="{{$floor->name}}"
                        alt="floor-{{$floor->id}}"
                        data-item="{{$floor->id}}"
                        data-floornumber="{{$floor->id}}"
                        data-floortype="{{$floor->type}}"
                        coords="@if($floor->html) {{cords($floor->html)}} @endif">
                @endif
            @endforeach
        </map>
    </div>
    @endif

    @include('front.investment_shared.filtr', ['area_range' => $investment->area_range])
    @include('front.investment_shared.sort')

    @include('front.investment_shared.list', ['investment' => $investment])

@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/plan.js') }}" charset="utf-8"></script>
@endpush
