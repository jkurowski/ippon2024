{{--[
    'label' => 'Label',
    'name' => 'input_name',
    'value' => $form->value,
    'rows' => $rows,
    'cols' => $cols,
    'class' => $class,
    'sublabel' => 'Sub-label'
]--}}
@php
    /* Pola tablicowe ("answer[pl]") trafiaja do worka bledow pod kluczem
       z kropka ("answer.pl") — bez tej zamiany komunikat walidacji nie
       wyswietlilby sie przy polu. Dla zwyklych nazw zamiana nic nie zmienia. */
    $errorName = str_replace(['[', ']'], ['.', ''], $name);
@endphp
<label for="form_{{$name}}" class="col-12 col-form-label control-label justify-content-start pb-3"><div class="text-right">{{$label}} @isset($required) <span class="text-danger d-inline">*</span>@endisset @isset($sublabel)<br><span>{{$sublabel}}</span>@endisset</div></label>
<div class="col-12">
    <textarea class="form-control @isset($class){{$class}}@endisset @error($errorName) is-invalid @enderror" id="form_{{$name}}" name="{{$name}}" @isset($rows)rows="{{$rows}}"@endisset @isset($cols)cols="{{$cols}}"@endisset>{{ old($errorName, $value) }}</textarea>
    @if($errors->first($errorName))<div class="invalid-feedback d-block">{{ $errors->first($errorName) }}</div>@endif
</div>
