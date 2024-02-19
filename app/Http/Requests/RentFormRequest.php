<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentFormRequest extends FormRequest
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
        return [
            'name' => 'required|string|min:5|max:100|unique:rents,name,'.$this->route()->rent,
            'area' => 'string',
            'text' => 'required',
            'type' => '',
            'active' => '',
            'meta_title' => '',
            'meta_description' => '',
            'meta_robots' => ''
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'To pole jest wymagane',
            'name.unique' => 'Taki wpis już istnieje',
            'name.max.string' => 'Maksymalna ilość znaków: 100',
            'name.min.string' => 'Minimalna ilość znaków: 5',
            'area.required' => 'To pole jest wymagane',
            'text.required' => 'To pole jest wymagane'
        ];
    }
}
