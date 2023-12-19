<div id="page-header" style="background:#222 url('/images/blue-bg-2.jpg') no-repeat top center">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center position-relative">
                @include('layouts.partials.breadcrumbs', ['items' => $page->ancestors, 'title' => ($page->content_header) ?: $page->title])
                <h1>{{($page->page_title) ? : $page->title}}</h1>
            </div>
        </div>
    </div>
</div>
