<?php

namespace App\Http\Requests;

use App\Rules\ReCaptchaV3;
use Illuminate\Foundation\Http\FormRequest;

class LandFormRequest extends FormRequest
{
    /**
     * Perform any additional validation before the main validation rules.
     *
     * @return void
     */
    public function prepareForValidation()
    {
        //$requestData = $this->all();
        //dd($requestData);
    }

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
            'g-recaptcha-response' => ['required', new ReCaptchaV3()]
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'form_name.required' => 'To pole jest wymagane',
            'form_email.required' => 'To pole jest wymagane',
            'form_email.email' => 'Nieprawidłowy adres e-mail',
            'form_message.required' => 'To pole jest wymagane',
            'form_phone.required' => 'To pole jest wymagane'
        ];
    }
}
