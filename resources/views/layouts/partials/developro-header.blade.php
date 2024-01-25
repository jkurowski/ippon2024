@if($investmentHeader)
    <div id="page-header" class="investment-header" style="background:#22283c url('/investment/header/{{ $investmentHeader }}') no-repeat top center;background-size: cover">
@else
    <div id="page-header" class="investment-header" style="background:#22283c">
@endif
    <div class="container">
        <div class="row">
            <div class="col-3 d-flex justify-content-center align-items-center">
                @if($investmentLogo)
                    <img src="{{ asset('investment/logo/'.$investmentLogo) }}" alt="Logo {{ $investmentName }}">
                @endif
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-12">
                        <h1>{{ $investmentName }}</h1>
                    </div>
                    <div class="col-12">
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
