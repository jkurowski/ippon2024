<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyFormRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if($this->route('floor')->id){
            $this->merge([
                'floor_id' => $this->route('floor')->id
            ]);
        }

        $this->merge([
            'investment_id' => $this->route('investment')->id
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'investment_id' => [
                'required',
                'integer',
                Rule::exists('investments', 'id'), // Check if investment with the specified id exists
            ],
            'floor_id' => '',
            'status' => 'required',
            'name' => 'required|string|max:255',
            'name_list' => 'string|max:255',
            'number' => 'required|string|max:255',
            'number_order' => 'integer',
            'highlighted' => '',
            'homepage' => '',
            'rooms' => 'required|integer',
            'area' => '',
            'additional' => '',
            'garden_area' => '',
            'balcony_area' => '',
            'balcony_area_2' => '',
            'terrace_area' => '',
            'terrace_area_2' => '',
            'loggia_area' => '',
            'parking_space' => '',
            'garage' => '',
            'storeroom' => '',
            'deadline' => '',
            'kitchen_type' => 'integer',
            'price' => '',
            'cords' => '',
            'html' => '',
            'meta_title' => '',
            'meta_description' => ''
        ];
    }
}
