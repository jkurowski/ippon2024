<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class InvestmentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'integer',
            'status' => 'integer',
            'carousel_id' => 'integer',
            'name' => 'required|string|min:5|max:100',
            'contact_form' => 'boolean',
            'developro' => 'boolean',
            'marker' => 'boolean',
            'contact_form_text' => '',
            /* Adres URL wymuszany na listach inwestycji — oba jezyki leca
               jednym polem tablicowym (url[pl], url[en]), wiec jeden zapis
               formularza ustawia i kasuje obie wersje. Dopuszczamy tylko pelny
               adres (https://...) albo sciezke wewnetrzna od "/" — wpisane
               z palca "boxolsztyn.pl" przegladarka potraktowalaby jako
               podstrone serwisu. */
            'url' => ['nullable', 'array'],
            'url.pl' => ['nullable', 'string', 'max:230', 'regex:#^(https?://|/)#i'],
            'url.en' => ['nullable', 'string', 'max:230', 'regex:#^(https?://|/)#i'],
            'address' => '',
            'stage' => ['nullable', 'string', 'max:120'],
            'city' => '',
            'date_start' => '',
            'date_end' => '',
            'areas_amount' => '',
            'area_range' => '',
            'card_param' => ['nullable', 'string', 'max:60'],
            'card_badge' => ['nullable', 'string', 'max:40'],
            'office_address' => '',
            'meta_title' => '',
            'meta_description' => '',
            'meta_robots' => '',
            'entry_content' => '',
            'content' => '',
            'end_content' => '',
            'lat' => '',
            'lng' => '',
            'zoom' => 'integer',

            'inv_province' => ['nullable', 'string', 'max:100'],
            'inv_county' => ['nullable', 'string', 'max:100'],
            'inv_municipality' => ['nullable', 'string', 'max:100'],
            'inv_city' => ['nullable', 'string', 'max:100'],
            'inv_street' => ['nullable', 'string', 'max:150'],
            'inv_property_number' => ['nullable', 'string', 'max:50'],
            'inv_postal_code' => ['nullable', 'string', 'max:20', 'regex:/^\d{2}-\d{3}$/'], // matches 00-000 format

            /* 'sometimes', bo w trybie tlumaczenia (?lang=en) formularz renderuje
               same pola tekstowe — select "Spolka celowa" siedzi w bloku
               @if(!Request::get('lang')) i nie leci w POST. Przy zwyklym
               'required' zapis tlumaczenia przepadal za kazdym razem, w dodatku
               bez zadnego komunikatu. Gdy pole jest w formularzu, wymog dziala
               jak dotad. */
            'company_id' => ['sometimes', 'required', 'integer', 'exists:investment_companies,id'],
            'sale_point_id' => ['nullable', 'integer', 'exists:investment_sale_points,id'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'To pole jest wymagane',
            'name.max.string' => 'Maksymalna ilość znaków: 100',
            'name.min.string' => 'Minimalna ilość znaków: 5',
            'url.*.regex' => 'Adres musi zaczynać się od https:// (adres zewnętrzny) lub od / (podstrona serwisu)',
            'url.*.max' => 'Maksymalna ilość znaków: 230'
        ];
    }
}
