@php
    $subLabel = isset($sublabel) ? '<span>' . $sublabel . '</span>' : '';
    $labelClass = 'col-12 col-form-label control-label pb-2';
    $inputClass = 'form-control';
    $divClass = $class ?? 'col-12 control-input position-relative d-flex align-items-center';
    $required = isset($required) && $required;
    /* Pola tablicowe ("url[pl]") trafiaja do worka bledow pod kluczem
       z kropka ("url.pl") — bez tej zamiany komunikat walidacji nie
       wyswietlilby sie przy polu. */
    $errorName = str_replace(['[', ']'], ['.', ''], $name);
@endphp

{!! Form::label(
    $name,
    '<div class="text-start">' . $label . ($required ? ' <span class="text-danger d-inline">*</span>' : '') . $subLabel . '</div>',
    ['class' => $labelClass . ($required ? ' required' : '')],
    false
) !!}

<div class="{{ $divClass }}">
    {!! Form::text($name, old($name, $value), ['class' => $inputClass, ($required ? ' required' : '')]) !!}
</div>
@if($errors->first($errorName))
    <div class="col-12 col-form-label control-label pb-2"></div>
    <div class="col-12 control-input invalid-feedback d-block">{{ $errors->first($errorName) }}</div>
@endif