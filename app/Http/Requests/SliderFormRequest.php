<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:100',
            'file_alt' => '',
            'link' => 'nullable|string|max:255',
            'link_button' => 'nullable|string|max:100',
            'link_target' => 'nullable|in:_self,_blank',
            'opacity' => '',
            'active' => '',
            'color' => '',
            'sort' => '',

            /* Pliki nie mialy zadnej reguly — do uploads/slider szedl dowolny
               plik, a Intervention wywracal sie dopiero przy przetwarzaniu. */
            'file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
            'file_mobile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'To pole jest wymagane',
            'title.max.string' => 'Maksymalna ilość znaków: 100',
            'title.min.string' => 'Minimalna ilość znaków: 5',

            'file.image' => 'Plik musi być obrazkiem',
            'file.mimes' => 'Dozwolone formaty: JPG, PNG, WEBP',
            'file.max' => 'Maksymalny rozmiar zdjęcia: 12 MB',
            'file_mobile.image' => 'Plik musi być obrazkiem',
            'file_mobile.mimes' => 'Dozwolone formaty: JPG, PNG, WEBP',
            'file_mobile.max' => 'Maksymalny rozmiar zdjęcia: 8 MB',
        ];
    }
}
