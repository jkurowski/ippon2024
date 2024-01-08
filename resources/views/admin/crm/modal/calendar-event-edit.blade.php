<div class="modal fade modal-form" id="portletModal" tabindex="-1" aria-labelledby="portletModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="post" id="modalForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="portletModalLabel">Edytuj wydarzenie
                        - {{$event->getRawOriginal('start')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fe-x"></i></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-form container">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text"
                                               class="form-control border-bottom-left-radius-0 @error('activity') is-invalid @enderror"
                                               id="inputActivity" name="activity" placeholder="Rozmowa telefoniczna"
                                               value="{{$event->name}}" required>
                                        @if($errors->first('activity'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('activity') }}</div>
                                        @endif
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Typ wydarzenia">
                                        @foreach (Config::get('events') as $ev)
                                            <input type="radio" class="btn-check" name="type" id="btnradio{{ $ev['id'] }}" autocomplete="off" @if($event->type == $ev['id'])checked @endif value="{{ $ev['id'] }}">
                                            <label class="btn btn-primary btn-events" for="btnradio{{ $ev['id'] }}" data-bs-toggle="tooltip" data-bs-title="{{ $ev['name'] }}" data-bs-placement="bottom">
                                                <i class="{{ $ev['icon'] }}"></i>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputDate" class="col-3 col-form-label control-label required text-end">Data</label>
                                    <div class="col-5">
                                        <input type="text" value="{{$event->getRawOriginal('start')}}"
                                               class="validate[required] form-control @error('date') is-invalid @enderror"
                                               id="inputDate" name="date">
                                        @if($errors->first('date'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('date') }}</div>
                                        @endif
                                    </div>
                                    @if(!$event->allday)
                                        <div class="col-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="las la-clock"></i></span>
                                                <input type="time" value="{{$event->getOriginal('time')}}"
                                                       class="form-control @error('time') is-invalid @enderror"
                                                       id="inputTime" name="time">
                                                @if($errors->first('time'))
                                                    <div
                                                        class="invalid-feedback d-block">{{ $errors->first('time') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="inputClient"
                                           class="col-3 col-form-label control-label required text-end">Klient</label>
                                    <div class="col-9">
                                        <input type="text"
                                               class="validate[required] form-control @error('client') is-invalid @enderror"
                                               id="inputClient" name="client" autocomplete="off">
                                        <input type="hidden" name="client_id" value="{{ $event->client_id }}"
                                               id="inputClientId">
                                        @if($errors->first('client'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('client') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputInvestment"
                                           class="col-3 col-form-label control-label required text-end">Inwestycja</label>
                                    <div class="col-9">
                                        <select class="form-select" id="inputInvestment" name="investment_id" onchange="fetchInvestmentProperties()">
                                            <option value="0">Inwestycja</option>
                                            @foreach($investments as $i)
                                                <option value="{{ $i->id }}" @if($event->investment_id == $i->id) selected @endif>{{ $i->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('investment_id'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('investment_id') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row dynamic-property-row d-none">
                                    <label for="inputProperty" class="col-3 col-form-label control-label required text-end">Mieszkanie</label>
                                    <div class="col-9">
                                        <select class="form-control selectpicker" data-live-search="true" name="property_id" id="inputProperty">
                                            <option value="0">Wybierz opcje</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row dynamic-storage-row d-none">
                                    <label for="inputStorage" class="col-3 col-form-label control-label required text-end">Komórka lokatorska</label>
                                    <div class="col-9">
                                        <select class="form-control selectpicker" data-live-search="true" name="storage_id" id="inputStorage">
                                            <option value="0">Wybierz opcje</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row dynamic-parking-row d-none">
                                    <label for="inputParking" class="col-3 col-form-label control-label required text-end">Miejsce parkingowe</label>
                                    <div class="col-9">
                                        <select class="form-control selectpicker" data-live-search="true" name="parking_id" id="inputParking">
                                            <option value="0">Wybierz opcje</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputNote" class="col-3 col-form-label control-label required text-end">Notatka</label>
                                    <div class="col-9">
                                        <textarea name="note" cols="30" rows="5"
                                                  class="form-control @error('note') is-invalid @enderror"
                                                  id="inputNote" style="resize: none">{{ $event->note }}</textarea>
                                        @if($errors->first('note'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('note') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-3 col-form-label"></div>
                                    <div class="col-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="activeCheck"
                                                   name="active" @if($event->active == 0)checked @endif>
                                            <label class="form-check-label" for="activeCheck">Oznacz jako
                                                wykonane</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="allday" value="{{ ($event->allday) ? 1 : 0 }}" id="inputAllDay">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('/js/typeahead.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/bootstrap-select/bootstrap-select.min.js') }}" charset="utf-8"></script>
<link href="{{ asset('/js/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
<script>
    const modal = document.getElementById('portletModal'),
        calendarEventModal = new bootstrap.Modal(modal),
        form = document.getElementById('modalForm'),
        inputInvestment = $('#inputInvestment'),
        inputProperty = $('#inputProperty'),
        inputStorage = $('#inputStorage'),
        inputParking = $('#inputParking'),
        inputDate = $('#inputDate'),
        inputTime = $('#inputTime'),
        inputActivity = $('#inputActivity'),
        inputClient = $('#inputClient'),
        inputClientId = $('#inputClientId'),
        inputNote = $('#inputNote'),
        inputAllDay = $('#inputAllDay');

    function fetchInvestmentProperties() {
        const investmentId = document.getElementById('inputInvestment').value;
        const selectPropertyRow = document.querySelector('.dynamic-property-row');
        const selectPropertyElement = document.getElementById('inputProperty');
        const selectStorageRow = document.querySelector('.dynamic-storage-row');
        const selectStorageElement = document.getElementById('inputStorage');
        const selectParkingRow = document.querySelector('.dynamic-parking-row');
        const selectParkingElement = document.getElementById('inputParking');

        if (investmentId !== '0') {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', '/admin/developro/investment/' + investmentId + '/properties', true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    const properties = JSON.parse(xhr.responseText);

                    if (Object.keys(properties).length > 0) {
                        console.log('properties exist');

                        const propertyTypes = {
                            property: 1,
                            storage: 2,
                            parking: 3
                        };

                        Object.entries(propertyTypes).forEach(([type, value]) => {
                            const selectRow = document.querySelector(`.dynamic-${type}-row`);
                            const selectElement = document.getElementById(`input${type.charAt(0).toUpperCase() + type.slice(1)}`);

                            if (properties[value] && properties[value].length > 0) {
                                console.log(`properties type:${type} exist`);

                                selectRow.classList.remove('d-none');

                                const firstOption = selectElement.options[0];
                                selectElement.innerHTML = '';
                                selectElement.appendChild(firstOption);

                                properties[value].forEach(property => {
                                    const option = document.createElement('option');
                                    option.value = property.id;
                                    option.textContent = property.name;
                                    selectElement.appendChild(option);
                                });
                                $(selectElement).selectpicker();
                            } else {
                                selectRow.classList.add('d-none');
                                selectElement.innerHTML = '';
                                $(selectElement).selectpicker('destroy');
                            }
                        });

                        @if($event->property_id)
                            console.log("Jest mieszkanie: " + {{ $event->property_id }});
                            $('.dynamic-property-row .selectpicker').selectpicker('val', '{{ $event->property_id }}');
                        @endif

                        @if($event->parking_id)
                            console.log("Jest parking: " + {{ $event->parking_id }});
                            $('.dynamic-parking-row .selectpicker').selectpicker('val', '{{ $event->parking_id }}');
                        @endif

                        @if($event->storage_id)
                            console.log("Jest komórka lokatorska" + {{ $event->storage_id }});
                            $('.dynamic-storage-row .selectpicker').selectpicker('val', '{{ $event->storage_id }}');
                        @endif

                    } else {
                        const elementsToReset = [selectPropertyRow, selectStorageRow, selectParkingRow];
                        const selectElementsToReset = [selectPropertyElement, selectStorageElement, selectParkingElement];

                        resetSelectElements(elementsToReset, selectElementsToReset);
                    }
                }
            };
            xhr.send();
        } else {
            const elementsToReset = [selectPropertyRow, selectStorageRow, selectParkingRow];
            const selectElementsToReset = [selectPropertyElement, selectStorageElement, selectParkingElement];

            resetSelectElements(elementsToReset, selectElementsToReset);
        }
    }

    function resetSelectElements(selectRows, selectElements) {
        selectRows.forEach(selectRow => selectRow.classList.add('d-none'));
        selectElements.forEach(selectElement => {
            const firstOption = selectElement.options[0];
            selectElement.innerHTML = '';
            selectElement.appendChild(firstOption);
            $(selectElement).selectpicker('destroy');
        });
    }

    const users = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.nonword(['name', 'mail', 'phone']),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: {
            url: '{{ route('admin.rodo.clients.index') }}'
        }
    });

    calendarEventModal.show();
    modal.addEventListener('shown.bs.modal', function () {
        fetchInvestmentProperties();

        inputDate.datepicker({
            format: 'yyyy-mm-dd',
        });
        users.clearPrefetchCache();
        users.initialize();
        inputClient.typeahead({
                hint: true,
                highlight: true,
                minLength: 3
            },
            {
                name: 'users',
                templates: {
                    suggestion: function (data) {
                        return '<div class="item">' +
                            '<div class="row">' +
                            '<div class="col-12"><h4>'+ data.name +'</h4></div>' +
                            '<div class="col-12">' + (data.mail ? '<span>E: ' + data.mail + '</span>' : '') + '</div>' +
                            '<div class="col-12">' + (data.phone ? '<span>T: ' + data.phone + '</span>' : '') + '</div>' +
                            '</div>' +
                            '</div>';
                    }
                },
                display: 'value',
                source: users
            });
        inputClient.bind('typeahead:select', function (ev, suggestion) {
            inputClientId.val(suggestion.id);
        });
        @if($event->client_id != 0)
        inputClient.typeahead('val', '{{ $event->client->name }}');
        @endif

        const elements = document.querySelectorAll(".btn-group label");
        for (let i = 0; i < elements.length; i++) {
            elements[i].addEventListener("click", function(e) {
                const input = document.getElementById("inputActivity");
                input.placeholder = e.currentTarget.dataset.bsTitle;
            });
        }
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl, {
                trigger : 'hover'
            })
        });
    })
    document.getElementById('inputClient').addEventListener('input', () => {
        inputClientId.val(0);
    })
    modal.addEventListener('hidden.bs.modal', function () {
        $('#portletModal').remove();
        users.clearPrefetchCache();
    })

    const alert = $('.alert-danger');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        jQuery.ajax({
            url: route('admin.crm.calendar.event.update', {{ $event->id }}),
            method: 'PUT',
            data: {
                '_token': '{{ csrf_token() }}',
                'investment_id': inputInvestment.val(),
                'property_id': inputProperty.val(),
                'parking_id': inputParking.val(),
                'storage_id': inputStorage.val(),
                'start': inputDate.val(),
                'end': inputDate.val(),
                'time': inputTime.val(),
                'name': inputActivity.val(),
                'note': inputNote.val(),
                'client_id': inputClientId.val(),
                'allday': inputAllDay.val(),
                'type': $('input[name="type"]:checked').val(),
                'active': $('input[name="active"]:checked').val() ? 0 : 1
            },
            success: function () {
                calendarEventModal.hide();
                toastr.options =
                    {
                        "closeButton": true,
                        "progressBar": true
                    }
                toastr.success("Wpis został zaktualizowany");
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
