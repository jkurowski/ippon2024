<div id="page-header" style="background:#08074f url('/images/blue-bg-2.jpg') no-repeat top center">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-end justify-content-center">
                <div class="page-header-content">
                    <div>
                        <h1>{{ $investment->name }}</h1>
                        @include('layouts.partials.breadcrumbs', ['items' => $page->ancestors, 'title' => $investment->name])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>