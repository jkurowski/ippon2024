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
            'address' => '',
            'city' => '',
            'date_start' => '',
            'date_end' => '',
            'areas_amount' => '',
            'area_range' => '',
            'office_address' => '',
            'meta_title' => '',
            'meta_description' => '',
            'meta_robots' => '',
            'entry_content' => '',
            'content' => '',
            'end_content' => '',
            'lat' => '',
            'lng' => '',
            'zoom' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'To pole jest wymagane',
            'name.max.string' => 'Maksymalna ilość znaków: 100',
            'name.min.string' => 'Minimalna ilość znaków: 5'
        ];
    }
}
