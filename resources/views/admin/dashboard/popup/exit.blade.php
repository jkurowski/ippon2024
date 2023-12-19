@extends('admin.dashboard.index')

@section('dashboard')
    <form method="POST" action="{{route('admin.dashboard.popup.update', ['popup' => 'exit'])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container-fluid p-0">
            <div class="card p-4">
                @if (session('success'))
                    <div class="alert alert-success border-0">
                        {{ session('success') }}
                        <script>window.setTimeout(function(){$(".alert").fadeTo(500,0).slideUp(500,function(){$(this).remove()})},3000);</script>
                    </div>
                @endif
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12">
                            @include('form-elements.html-select', ['label' => 'Status', 'name' => 'popup_exit_status', 'selected' => settings()->get("popup_exit_status"), 'select' => ['0' => 'Wyłączony', '1' => 'Włączony']])
                            @include('form-elements.textarea-fullwidth', ['label' => 'Wprowadź tekst', 'name' => 'popup_exit_text', 'value' => settings()->get("popup_exit_text"), 'rows' => 11, 'class' => 'tinymce'])
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-submit">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <input name="submit" id="submit" value="Zapisz" class="btn btn-primary" type="submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('form-elements.tintmce')
@endsection
