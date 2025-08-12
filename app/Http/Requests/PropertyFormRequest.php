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
        if (!$this->filled('window')) {
            $this->merge(['window' => null]);
        }

        $this->merge([
            'investment_id' => $this->route('investment')->id
        ]);

        if (!$this->filled('floor')) {
            $this->merge([
                'floor_id' => $this->route('floor')->id
            ]);
        }

        if ($this->has('area')) {
            $this->merge([
                'area' => str_replace(',', '.', $this->input('area')),
            ]);
        }
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
            'building_id' => 'nullable|integer',
            'floor_id' => 'nullable|integer',
            'status' => 'required',
            'name' => 'required|string|max:255',
            'name_list' => 'string|max:255',
            'number' => 'required|string|max:255',
            'number_order' => 'integer',
            'visitor_related_type' => 'integer',
            'visitor_related_ids' => 'required_if:visitor_related_type,3|array|min:1',
            'highlighted' => [
                'boolean',
                function ($attribute, $value, $fail) {
                    if ($this->boolean($attribute) && empty($this->input('promotion_price'))) {
                        $fail('Pole "Cena promocyjna" jest wymagane, jeśli nieruchomość ma być promowana.');
                    }
                },
            ],
            'homepage' => '',
            'type' => 'required|integer',
            'rooms' => 'required|integer',
            'virtual_walk' => '',
            'view_3d' => '',
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
            'price' => ['nullable', 'regex:/^\d+(\.\d{1,2})?$/'],
            'price_brutto' => ['nullable', 'regex:/^\d+(\.\d{1,2})?$/'],
            'price_30' => ['nullable', 'regex:/^\d+(\.\d{1,2})?$/'],
            'vat' => '',
            'cords' => '',
            'html' => '',
            'meta_title' => '',
            'meta_description' => '',
            'attributes_bg' => '',
            'attributes_text' => '',
            'attributes_content' => '',
            'active' => 'boolean',
            'promotion_price' => [
                'nullable',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (!empty($value) && !$this->boolean('highlighted')) {
                        $fail('Pole "Promocja" musi być zaznaczone, jeśli ustawiono cenę promocyjną.');
                    }
                },
            ],
            'promotion_end_date' => 'nullable|date|after:now',
            'promotion_price_show' => 'boolean',

            'price-component-type'     => 'array',
            'price-component-type.*'   => 'required|exists:property_price_components,id',

            'price-component-category'   => 'array',
            'price-component-category.*' => 'required|in:1,2,3',

            'price-component-value'     => 'array',
            'price-component-value.*'   => 'nullable',

            'price-component-m2-value'     => 'array',
            'price-component-m2-value.*'   => 'nullable'
        ];
    }
}
