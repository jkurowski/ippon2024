{{-- Formularz zgloszenia gruntu w oprawie ze strony glownej (.ip-form).
     Pod nazwy pol podpieta jest walidacja (LandFormRequest), mail LandSend
     i zapis klienta. Formularz leci POST-em na ten sam adres.
     09.2026: zdjete pola form_price i form_date (oczekiwana cena i data
     sprzedazy) — razem z nimi reguly w LandFormRequest i wiersze w mailu.
     Parametry:
       $page_name — nazwa formularza zapisywana przy zgloszeniu
       $obligation, $rules — z kontrolera (RodoSettings / RodoRules) --}}

@if (session('success'))
    <div class="alert alert-success border-0">{{ session('success') }}</div>
@endif
@if (session('warning'))
    <div class="alert alert-warning border-0">{{ session('warning') }}</div>
@endif

<form class="ip-form validateForm" method="post" id="land-form" action="">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="ip-field">
                <label for="form_name">@lang('website.form-label-name') <span class="text-danger">*</span></label>
                <input type="text" name="form_name" id="form_name" value="{{ old('form_name') }}"
                       class="validate[required] @error('form_name') is-invalid @enderror">
                @error('form_name')<span class="invalid-feedback d-block" role="alert">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="ip-field">
                <label for="form_surname">@lang('website.form-label-lastname')</label>
                <input type="text" name="form_surname" id="form_surname" value="{{ old('form_surname') }}">
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="ip-field">
                <label for="form_email">@lang('website.form-label-email') <span class="text-danger">*</span></label>
                <input type="text" name="form_email" id="form_email" value="{{ old('form_email') }}"
                       class="validate[required] @error('form_email') is-invalid @enderror">
                @error('form_email')<span class="invalid-feedback d-block" role="alert">{{ $message }}</span>@enderror
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

        <div class="col-12 col-sm-6">
            <div class="ip-field">
                <label for="form_city">@lang('website.form-label-city')</label>
                <input type="text" name="form_city" id="form_city" value="{{ old('form_city') }}">
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="ip-field">
                <label for="form_street">@lang('website.form-label-street')</label>
                <input type="text" name="form_street" id="form_street" value="{{ old('form_street') }}">
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="ip-field">
                <label for="form_book">@lang('website.form-label-mortgage-number')</label>
                <input type="text" name="form_book" id="form_book" value="{{ old('form_book') }}">
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="ip-field">
                <label for="form_land">@lang('website.form-label-land-designation')</label>
                <input type="text" name="form_land" id="form_land" value="{{ old('form_land') }}">
            </div>
        </div>
    </div>

    <div class="ip-field">
        <label for="form_message">@lang('website.form-label-additional-information') <span class="text-danger">*</span></label>
        <textarea name="form_message" id="form_message" rows="4"
                  class="validate[required] @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>
        @error('form_message')<span class="invalid-feedback d-block" role="alert">{{ $message }}</span>@enderror
    </div>

    @if($obligation)
        <div class="ip-form-note">{!! $current_locale == 'en' ? $obligation->obligation_en : $obligation->obligation !!}</div>
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
    <noscript>{{ app()->getLocale() == 'en' ? 'JavaScript must be enabled for the form to work.' : 'Do poprawnego działania, JavaScript musi być włączony.' }}</noscript>
</form>

@include('layouts.partials.ip-form-scripts', ['formId' => 'land-form'])
