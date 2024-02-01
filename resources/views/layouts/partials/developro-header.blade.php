@if($investmentHeader)
    <div id="page-header" class="investment-header" style="background:#22283c url('/investment/header/{{ $investmentHeader }}') no-repeat top center;background-size: cover">
@else
    <div id="page-header" class="investment-header" style="background:#22283c">
@endif
    <div class="container">
        <div class="row">
            <div class="col-4 col-sm-3 d-flex align-items-center justify-content-center">
                @if($investmentLogo)
                    <div class="investment-header-logo d-flex justify-content-center align-items-center">
                        <img src="{{ asset('investment/logo/'.$investmentLogo) }}" alt="Logo {{ $investmentName }}">
                    </div>
                @endif
            </div>
            <div class="col-8 col-sm-9">
                <div class="row align-items-center h-100">
                    <div class="col-12 h-100 d-flex align-items-center justify-content-end">
                        <h1>{{ $investmentName }}</h1>
                    </div>
                    <div class="col-12 invest-header-nav">
                        <nav>
                            <ul class="list-unstyled mb-0">
                                <li><a href="{{ route('developro.investment.index', $investmentSlug) }}">Opis inwestycji</a></li>
                                @foreach($investmentPages as $ipage)
                                    <li><a href="{{ route('developro.investment.page', [$investmentSlug, $ipage->slug]) }}">{{ $ipage->title }}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
