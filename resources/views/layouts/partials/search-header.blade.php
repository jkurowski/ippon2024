@if($investmentHeader)
    <div id="page-header" class="investment-header h-auto mt-5" style="background:#22283c url('/investment/header/{{ $investmentHeader }}') no-repeat top center;background-size: cover">
@else
    <div id="page-header" class="investment-header h-auto mt-5" style="background:#22283c">
@endif
        <div class="container border-0 p-4">
            <div class="row">
                <div class="col-4 col-sm-3 d-flex align-items-center justify-content-center">
                    @if($investmentLogo)
                        <div class="investment-header-logo d-flex justify-content-center align-items-center pt-4 pb-4">
                            <img src="{{ asset('investment/logo/'.$investmentLogo) }}" alt="Logo {{ $investmentName }}">
                        </div>
                    @endif
                </div>
                <div class="col-8 col-sm-9">
                    <div class="row align-items-center h-100">
                        <div class="col-12 h-100 d-flex align-items-center justify-content-end pe-5">
                            <h1 class="m-0">{{ $investmentName }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>