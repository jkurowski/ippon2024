@extends('layouts.page', ['body_class' => 'investments'])
@section('meta_title', $investment->name .' - '.$investment->floor->name)

@section('content')
    <div class="container">
        <div class="row border-bottom pb-3 mb-3">
            <div class="col-8">
                <h1>{{$investment->name}} - {{$investment->building->name}} - {{$investment->floor->name}}</h1>
            </div>
            <div class="col-4 text-right">
                <a href="#" class="bttn bttn-right"><i class="las la-arrow-left"></i> Wróć do listy</a>
            </div>
        </div>

        <div class="row pb-4">
            <div class="col-4">@if($prev_floor) <a href="#" class="bttn bttn-right"><i class="las la-arrow-left"></i> {{$prev_floor->name}}</a> @endif</div>
            <div class="col-4"></div>
            <div class="col-4 text-right">@if($next_floor) <a href="#" class="bttn">{{$next_floor->name}} <i class="las la-arrow-right"></i></a> @endif</div>
        </div>

        <div class="row">
            <div class="col-12">
                @if($investment->floor->file)
                    <div id="plan">
                        <div id="plan-holder"><img src="{{ asset('/investment/floor/'.$investment->floor->file.'') }}" alt="{{$investment->floor->name}}" id="invesmentplan" usemap="#invesmentplan"></div>
                        <map name="invesmentplan">
                            @if($properties)
                                @foreach($properties as $r)
                                <area shape="poly" href="{{ route('developro.property', [$investment->slug, $r, Str::slug($r->name), floorLevel($r->floor_number, true), number2RoomsName($r->rooms, true), round(floatval($r->area), 2).'-m2']) }}" data-item="{{$r->id}}" title="{{$r->name}}" alt="{{$r->slug}}" data-roomnumber="{{$r->number}}" data-roomtype="{{$r->typ}}" data-roomstatus="{{$r->status}}" coords="@if($r->html) {{cords($r->html)}} @endif">
                                @endforeach
                            @endif
                        </map>
                    </div>
                @endif
            </div>
        </div>

        @include('front.developro.investment_shared.filtr', ['area_range' => $investment->area_range])
        @include('front.developro.investment_shared.sort')
        @include('front.developro.investment_shared.list', ['investment' => $investment])

    </div>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/floor.js') }}" charset="utf-8"></script>
@endpush
