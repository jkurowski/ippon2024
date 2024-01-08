@isset($required)
    {!! Form::label($name, '<div class="text-start">'.$label.' <span class="text-danger d-inline">*</span></div>', ['class' => 'col-12 col-form-label control-label pb-2 required'], false) !!}
@else
    {!! Form::label($name, '<div class="text-start">'.$label.'</div>', ['class' => 'col-12 col-form-label control-label pb-2'], false) !!}
@endisset
<div class="col-12 control-input position-relative d-flex align-items-center">
    @if(isset($selected))
        {!! Form::select($name, $select, $selected, array('class' => 'form-select')) !!}
    @else
        {!! Form::select($name, $select, [], array('class' => 'form-select')) !!}
    @endif
    @if($errors->first($name))<div class="invalid-feedback d-block">{{ $errors->first($name) }}</div>@endif
</div>