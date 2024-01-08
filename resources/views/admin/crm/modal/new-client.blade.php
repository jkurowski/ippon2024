<div class="modal fade modal-form" id="portletModal" tabindex="-1" aria-labelledby="portletModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="modalForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="portletModalLabel">Nowy klient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fe-x"></i></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-form container">
                        <div class="form-group row">

                            <div class="col-6">
                                <div class="row">
                                    <label for="inputName" class="col-12 col-form-label control-label required justify-content-start">Imię<span class="text-danger d-inline w-auto ps-1">*</span>
                                    </label>
                                    <div class="col-12">
                                        <input type="text" class="validate[required] form-control @error('title') is-invalid @enderror" id="inputName" name="name" value="" required>
                                        @if($errors->first('name'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row">
                                    <label for="inputSurname" class="col-12 col-form-label control-label required justify-content-start">Nazwisko<span class="text-danger d-inline w-auto ps-1">*</span>
                                    </label>
                                    <div class="col-12">
                                        <input type="text" class="validate[required] form-control @error('surname') is-invalid @enderror" id="inputSurname" name="surname" value="{{$entry->surname}}" required>
                                        @if($errors->first('surname'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('surname') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-5 mt-3">
                                <div class="row">
                                    <label for="inputEmail" class="col-12 col-form-label control-label required justify-content-start">E-mail<span class="text-danger d-inline w-auto ps-1">*</span>
                                    </label>
                                    <div class="col-12">
                                        <input type="text" class="validate[required] form-control @error('mail') is-invalid @enderror" id="inputEmail" name="mail" value="{{$entry->mail}}" required>
                                        @if($errors->first('mail'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('mail') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 mt-3">
                                <label for="" class="col-12 col-form-label control-label required mb-2 justify-content-start">&nbsp;</label>
                                <div class="col-12 text-center">
                                    <p style="font-size: 17px"><i class="las la-arrow-left"></i> lub <i class="las la-arrow-right"></i></p>
                                </div>
                            </div>
                            <div class="col-5 mt-3">
                                <div class="row">
                                    <label for="inputPhone" class="col-12 col-form-label control-label required justify-content-start">Telefon<span class="text-danger d-inline w-auto ps-1">*</span></label>
                                    <div class="col-12">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" name="phone" value="{{$entry->phone}}" required>
                                        @if($errors->first('phone'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mt-3">
                                <div class="row">
                                    <label for="inputInvestment" class="col-12 col-form-label control-label required justify-content-start">Inwestycja</label>
                                    <div class="col-12">
                                        <select class="form-select" id="inputInvestment" name="investment_id">
                                            <option value="">Nazwa inwestycji</option>
                                            <option value="">Nazwa inwestycji</option>
                                            <option value="">Nazwa inwestycji</option>
                                            <option value="">Nazwa inwestycji</option>
                                            <option value="">Nazwa inwestycji</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7 mt-3">
                                <div class="row">
                                    <label for="" class="col-12 col-form-label control-label required justify-content-start">&nbsp;</label>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Wyrażam zgodę na kontakt telefoniczny
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Wyrażam zgodę na kontakt e-mail
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const modalElement = document.getElementById('portletModal'),
        bootstrapModal = new bootstrap.Modal(modalElement),
        form = document.getElementById('modalForm'),
        inputInvestment = $('#inputInvestment'),

        inputProperty = $('#inputProperty'),
        inputStorage = $('#inputStorage'),
        inputParking = $('#inputParking'),

        inputDate = $('#inputDate'),
        inputClient = $('#inputClient'),
        inputClientId = $('#inputClientId'),
        inputNote = $('#inputNote'),
        inputTitle = $('#inputTitle');
    inputStatus = $('#inputStatus');
    inputType = $('#inputType');

    bootstrapModal.show();
    modalElement.addEventListener('shown.bs.modal', function () {
  
    });

    modalElement.addEventListener('hidden.bs.modal', function () {
        $('#portletModal').remove();
    })

    const alert = $('.alert-danger');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        $.ajax({
            @isset($entry->title)
            url: '',
            method: 'PUT',
            @else
            url: '',
            method: 'POST',
            @endif
            data: {
                '_token': '{{ csrf_token() }}',
                'investment_id': inputInvestment.val() !== 0 ? inputInvestment.val() : null,
                'property_id': inputProperty.val() !== 0 ? inputProperty.val() : null,
                'parking_id': inputParking.val() !== 0 ? inputParking.val() : null,
                'storage_id': inputStorage.val() !== 0 ? inputStorage.val() : null,
                'title': inputTitle.val(),
                'start': inputDate.val(),
                'note': inputNote.val(),
                'status': inputStatus.val(),
                'type': inputType.val(),
                'contact_id': inputClientId.val()
            },
            success: function () {
                bootstrapModal.hide();
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
