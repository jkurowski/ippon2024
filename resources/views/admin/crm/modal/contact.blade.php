<div class="modal fade modal-form" id="portletModal" tabindex="-1" aria-labelledby="portletModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="post" id="modalForm">
                @csrf
                <div class="modal-header">
                    @isset($entry->name)
                    <h5 class="modal-title" id="portletModalLabel">Edytuj kontakt - {{ $entry->name }} {{ $entry->surname }}</h5>
                    @else
                    <h5 class="modal-title" id="portletModalLabel">Dodaj kontakt</h5>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fe-x"></i></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-form container">
                        <div class="row">
                            <div class="col-12">

                                @include('form-elements.modal.modal-input-text', ['label' => 'Imię', 'sublabel'=> '', 'name' => 'name', 'required' => 1, 'value' => $entry->name])
                                @include('form-elements.modal.modal-input-text', ['label' => 'Nazwisko', 'sublabel'=> '', 'name' => 'surname', 'required' => 1, 'value' => $entry->surname])
                                @include('form-elements.modal.modal-input-text', ['label' => 'E-mail', 'sublabel'=> '', 'name' => 'email', 'required' => 1, 'value' => $entry->email])
                                @include('form-elements.modal.modal-input-text', ['label' => 'Telefon 1', 'sublabel'=> '', 'name' => 'phone_1', 'required' => 1, 'value' => $entry->phone_1])
                                @include('form-elements.modal.modal-input-text', ['label' => 'Telefon 2', 'sublabel'=> '', 'name' => 'phone_2', 'value' => $entry->phone_2])

                                <div class="form-group row">
                                    <label for="inputNote" class="col-3 col-form-label control-label required text-end">Notatka</label>
                                    <div class="col-9">
                                        <textarea name="note" cols="30" rows="5"
                                                  class="form-control @error('note') is-invalid @enderror"
                                                  id="inputNote" style="resize: none">@isset($entry->note) {{$entry->note}} @endisset</textarea>
                                        @if($errors->first('note'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('note') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const modal = document.getElementById('portletModal'),
        formModal = new bootstrap.Modal(modal),
        form = document.getElementById('modalForm'),
        inputName = $('#inputname'),
        inputSurname = $('#inputsurname'),
        inputEmail = $('#inputemail'),
        inputPhone1 = $('#inputphone_1'),
        inputPhone2 = $('#inputphone_2'),
        inputNote = $('#inputNote');

    formModal.show();
    modal.addEventListener('shown.bs.modal', function () {

    })

    const alert = $('.alert-danger');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        $.ajax({
            @isset($entry->name)
                url: route('admin.crm.contact.update', {{ $entry->id }}),
                method: 'PUT',
            @else
                url: route('admin.crm.contact.store'),
                method: 'POST',
            @endif
            data: {
                '_token': '{{ csrf_token() }}',
                'name': inputName.val(),
                'surname': inputSurname.val(),
                'email': inputEmail.val(),
                'phone_1': inputPhone1.val(),
                'phone_2': inputPhone2.val(),
                'note' : inputNote.val()
            },
            success: function () {
                formModal.hide();
                alert.hide().html('');
                form.reset();
                toastr.options =
                    {
                        "closeButton": true,
                        "progressBar": true
                    }
                toastr.success("Wpis został poprawnie dodany");
            },
            error: function (result) {
                if (result.responseJSON.data) {
                    alert.html('');
                    $.each(result.responseJSON.data, function (key, value) {
                        alert.show();
                        alert.append('<span>' + value + '</span>');
                    });
                }
            }
        });
    });
</script>
