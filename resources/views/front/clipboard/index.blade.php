@extends('layouts.page', ['body_class' => 'contact-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <section id="clipboard" class="p-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="clipboardmessage"></div>
                </div>
            </div>

            @include('front.developro.investment_shared.list')
        </div>
        @if($properties->count() > 0)
            @include('front.contact.clipboard-form', [ 'page_name' => 'Schowek'])
        @endif
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
        const buttons = document.querySelectorAll('#addToFav');
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                removeProperty(button.getAttribute('data-id'))
            });
        });

        function removeProperty(property_id) {
            const xhr = new XMLHttpRequest();
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            xhr.open('DELETE', '/pl/clipboard');
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            const data = { id: property_id };
            const jsonData = JSON.stringify(data);
            xhr.send(jsonData);

            xhr.addEventListener('load', function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const message = response.message;
                    const count = response.count;
                    document.querySelector('#clipboardmessage').innerHTML = message;
                    document.querySelector('#clipboardcount').innerHTML = count;
                    const item = document.querySelector(`[data-room="${property_id}"]`);
                    if (!item) {
                        return;
                    }

                    item.animate(
                        [{ opacity: 1 }, { opacity: 0 }],
                        { duration: 500 }
                    ).onfinish = () => {
                        item.remove();
                    };
                }
            });
        }
    </script>
@endpush
