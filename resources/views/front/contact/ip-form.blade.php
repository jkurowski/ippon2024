{{-- Formularz kontaktowy w oprawie ze strony glownej (.ip-form / .ip-field).
     Leci na ten sam endpoint co formularz z podstrony Kontakt — te same nazwy
     pol, RODO i recaptcha. Pole form_surnames zostaje: jest ukryte przez
     .col-input-important i sluzy za pulapke na boty.
     Parametry:
       $page_name — nazwa formularza zapisywana przy zgloszeniu
       $obligation, $rules — z kontrolera (RodoSettings / RodoRules)
       $action, $form_id — opcjonalnie; schowek wysyla ten sam formularz pod
                           wlasny endpoint (razem z lista odlozonych lokali) --}}
@php
    $formAction = $action ?? route('contact.form');
    $formId = $form_id ?? 'contact-form-el';
@endphp

@if (session('success'))
    <div class="alert alert-success border-0">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-warning border-0">{{ session('error') }}</div>
@endif

<form class="ip-form validateForm" method="post" id="{{ $formId }}" action="{{ $formAction }}">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="ip-field">
                <label for="form_name">{{ $current_locale == 'pl' ? 'Imię i nazwisko' : 'Full Name' }} <span class="text-danger">*</span></label>
                <input type="text" name="form_name" id="form_name" value="{{ old('form_name') }}"
                       class="validate[required] @error('form_name') is-invalid @enderror">
                @error('form_name')<span class="invalid-feedback d-block" role="alert">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="ip-field">
                <label for="form_phone">@lang('website.form-label-phone') <span class="text-danger">*</span></label>
                <input type="text" name="form_phone" id="form_phone" value="{{ old('form_phone') }}"
                       class="validate[required] @error('form_phone') is-invalid @enderror">
                @error('form_phone')<span class="invalid-feedback d-block" role="alert">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>

    {{-- pulapka na boty — ukryta przez .col-input-important --}}
    <div class="ip-field col-input-important">
        <label for="form_surnames">@lang('website.form-label-lastname')</label>
        <input type="text" name="form_surnames" id="form_surnames" value="{{ old('form_surnames') }}">
    </div>

    <div class="ip-field">
        <label for="form_email">@lang('website.form-label-email') <span class="text-danger">*</span></label>
        <input type="text" name="form_email" id="form_email" value="{{ old('form_email') }}"
               class="validate[required] @error('form_email') is-invalid @enderror">
        @error('form_email')<span class="invalid-feedback d-block" role="alert">{{ $message }}</span>@enderror
    </div>

    <div class="ip-field">
        <label for="form_message">@lang('website.form-label-message') <span class="text-danger">*</span></label>
        <textarea name="form_message" id="form_message" rows="4"
                  class="validate[required] @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>
        @error('form_message')<span class="invalid-feedback d-block" role="alert">{{ $message }}</span>@enderror
    </div>

    @if($obligation)
        <div class="ip-form-note">
            {!! $current_locale == 'en' ? $obligation->obligation_en : $obligation->obligation !!}
        </div>
    @endif

    @foreach ($rules as $r)
        <div class="ip-form-check @error('rule_'.$r->id) is-invalid @enderror">
            <input type="checkbox" name="rule_{{ $r->id }}" id="rule_{{ $r->id }}" value="1"
                   @if($r->required === 1) class="validate[required]" @endif data-prompt-position="topLeft:0">
            <label for="rule_{{ $r->id }}">
                {!! $r->text !!}
                @error('rule_'.$r->id)<span class="invalid-feedback d-block" role="alert">{{ $message }}</span>@enderror
            </label>
        </div>
    @endforeach

    <input name="form_page" type="hidden" value="{{ $page_name }}">
    <script type="text/javascript">
        document.write("<button type=\"submit\" class=\"g-recaptcha ip-btn-submit\" data-sitekey=\"{{ config('services.recaptcha_v3.siteKey') }}\" data-callback=\"onRecaptchaSuccess\" data-action=\"submitContact\">@lang('website.button-send-message')</button>");
    </script>
    <noscript>Do poprawnego działania, JavaScript musi być włączony.</noscript>
</form>

@include('layouts.partials.ip-form-scripts', ['formId' => $formId])
