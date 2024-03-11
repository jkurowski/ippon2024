<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'form_name' => 'required',
            'form_surname' => '',
            'form_email' => 'required|email:rfc',
            'form_message' => 'required',
            'form_phone' => 'required',
            'form_city' => '',
            'form_street' => '',
            'form_price' => '',
            'form_date' => '',
            'form_book' => '',
            'form_land' => '',
            'form_page' => '',
            'rule_1' => 'required',
            'rule_2' => 'required'
        ];

        return $rules;
    }
}
