@extends('layouts.page', ['body_class' => 'investments'])

@section('meta_title', $investment->floor->name)
@section('seo_title', $page->meta_title.' - '.$investment->floor->name)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.developro-header', ['title' => $investment->floor->name, 'header_file' => 'rooms.jpg', 'items' => [['uri'=> 'mieszkania', 'title'=>'Mieszkania']]])
@stop

@section('content')
    <div class="container">
        <div id="planNav" class="row">
            <div class="col-12 col-sm-4 d-flex justify-content-start">@if($prev_floor) <a href="{{route('front.investment.floor.index', $prev_floor->id)}}" class="bttn">{{$prev_floor->name}}</a> @endif</div>
            <div class="col-12 col-sm-4 d-flex justify-content-center">
                <a href="{{route('front.investment.show', $investment->id)}}" class="bttn">Plan budunku</a>
            </div>
            <div class="col-12 col-sm-4 d-flex justify-content-end">@if($next_floor) <a href="{{route('front.investment.floor.index', $next_floor->id)}}" class="bttn">{{$next_floor->name}}</a> @endif</div>
        </div>
    </div>
        @if($investment->floor->file)
            <div id="plan-holder">
                <img src="{{ asset('/investment/floor/webp/'.$investment->floor->file_webp) }}" alt="{{$investment->floor->name}}" id="invesmentplan" usemap="#invesmentplan">
                <map name="invesmentplan">
                    @if($properties)
                        @foreach($properties as $r)
                            @if($r->html)
                                <area
                                    shape="poly"
                                    href="{{route('front.investment.property.index', ['floor' => $r->floor_id, 'property' => $r->id])}}"
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

        @include('front.developro.investment_shared.filtr', ['area_range' => $investment->floor->area_range])
        @include('front.developro.investment_shared.sort')

        @include('front.developro.investment_shared.list', ['investment' => $investment])
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/tip.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/floor.js') }}" charset="utf-8"></script>
@endpush
