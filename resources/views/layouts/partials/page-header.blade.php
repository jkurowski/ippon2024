@if($header_file)
    <div id="page-header" style="background: #222 url('{{ asset('/uploads/header/'.$header_file) }}') no-repeat;background-size: cover">
@else
    <div id="page-header" style="background:#222">
@endif
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center position-relative">
                @include('layouts.partials.breadcrumbs', ['items' => $page->ancestors, 'title' => ($page->content_header) ?: $page->title])
                <h1>{{($page_title) ? : $page->title}}</h1>
            </div>
        </div>
    </div>
</div>
