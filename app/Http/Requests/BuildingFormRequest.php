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
            'active' => 'required',
            'company_id' => ['nullable', 'integer', Rule::exists('investment_companies', 'id')],
            'sale_point_id' => ['nullable', 'integer', Rule::exists('investment_sale_points', 'id')],
            // raport cen (dane.gov.pl): numer nieruchomości i współrzędne WGS-84 budynku; puste = jak w inwestycji
            'inv_property_number' => ['nullable', 'string', 'max:50'],
            'inv_longitude' => ['nullable', 'numeric', 'between:14,25'],
            'inv_latitude' => ['nullable', 'numeric', 'between:49,55'],
            'investment_id' => [
                'required',
                'integer',
                Rule::exists('investments', 'id'), // Check if investment with the specified id exists
            ],
        ];
    }
}
