<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BuildingFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'display_sold' => 'required',
            'investment_id' => [
                'required',
                'integer',
                Rule::exists('investments', 'id'), // Check if investment with the specified id exists
            ],
        ];
    }
}
