<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoxFormRequest extends FormRequest
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
     * Wersja EN edytuje tylko pola tlumaczone — metrazu i obrazka w niej nie ma,
     * wiec obrazek jest wymagany wylacznie przy dodawaniu boksu po polsku.
     *
     * @return array
     */
    public function rules()
    {
        $isTranslation = $this->get('lang') === 'en';
        $isCreate = $this->isMethod('post');

        return [
            'badge' => 'required|string|max:60',
            'location' => 'required|string|max:120',
            'name' => 'required|string|max:120',
            'description' => 'required|string|max:300',
            'area' => 'nullable|string|max:50',
            'handover' => 'nullable|string|max:60',
            'advantage' => 'nullable|string|max:120',
            'link_apartments' => 'nullable|string|max:255',
            'link_description' => 'nullable|string|max:255',
            'file' => $isTranslation
                ? 'nullable'
                : ($isCreate ? 'required|image|max:10240' : 'nullable|image|max:10240'),
        ];
    }

    public function messages()
    {
        return [
            'required' => 'To pole jest wymagane',
            'max' => 'Maksymalna liczba znaków: :max',
            'file.required' => 'Dodaj obrazek',
            'file.image' => 'Plik musi być obrazkiem (jpg, png, webp)',
            'file.max' => 'Obrazek może mieć maksymalnie 10 MB',
        ];
    }
}
