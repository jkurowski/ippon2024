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
    {{ $investment->id }}
<div id="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                @if($investment->id == 6)
                    <div class="ratio ratio-16x9">
                        <iframe
                                frameborder="0" src="https://v4-jeff.prod.resimo.io/ippon/synergia/#/"
                                allow="fullscreen"
                                class="jeff-iframe"
                                style="border:0;margin:0;padding:0"
                        ></iframe>
                    </div>
                @else
                    @if($investment->plan)
                        <img src="{{ asset('/investment/plan/'.$investment->plan->file) }}" alt="{{$investment->name}}" id="invesmentplan" usemap="#invesmentplan">

                        @if($investment->type == 2)
                            <map name="invesmentplan">
                                @foreach($investment->floors as $floor)
                                    @if($floor->html)
                                        <area
                                                shape="poly"
                                                href="{{route('developro.floor', [$investment->slug, $floor, Str::slug($floor->name)])}}"
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
                    @endif
                @endif

                @include('front.developro.investment_shared.filtr-synergia', ['area_range' => $investment->area_range,  'floors' => $floors, 'floorFiltr' => 1])
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
