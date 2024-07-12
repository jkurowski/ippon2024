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
                    @if($investment->plan)
                            <img src="{{ asset('/investment/plan/'.$investment->plan->file) }}" alt="{{$investment->name}}" id="invesmentplan" usemap="#invesmentplan">

                            @if($investment->type == 2)
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
                            @endif
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
