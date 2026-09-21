<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqFormRequest extends FormRequest
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
     * Pytanie i odpowiedz leca jako pola tablicowe (question[pl], question[en]),
     * czyli oba jezyki jednym zapisem formularza — zamiast osobnej zakladki
     * ?lang=en. Przy zakladce wyczyszczenie pola w PL zostawia niewidoczna
     * wartosc w EN; tu widac obie naraz. HasTranslations::setAttribute
     * przyjmuje tablice i zapisuje obie wersje.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'question'    => ['required', 'array'],
            'question.pl' => ['nullable', 'string', 'max:500'],
            'question.en' => ['nullable', 'string', 'max:500'],
            'answer'      => ['required', 'array'],
            'answer.pl'   => ['nullable', 'string'],
            'answer.en'   => ['nullable', 'string'],
        ];
    }

    /**
     * Zadna z wersji jezykowych nie jest wymagana z osobna, ale wpis bez
     * zadnej tresci nie ma sensu. Osobna regula zamiast 'required' na PL, bo
     * 14 pytan angielskich od klienta nie ma jeszcze polskich odpowiednikow —
     * przy 'required' nie dalo by sie ich w ogole zapisac.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            foreach (['question' => 'pytania', 'answer' => 'odpowiedzi'] as $field => $label) {
                $filled = trim(strip_tags(implode('', (array) $this->input($field, []))));
                $filled = str_replace('&nbsp;', '', $filled);

                if ($filled === '') {
                    $validator->errors()->add(
                        $field.'.pl',
                        'Uzupełnij przynajmniej jedną wersję językową '.$label.'.'
                    );
                }
            }
        });
    }

    public function messages()
    {
        return [
            'question.*.max' => 'Maksymalna ilość znaków: 500',
        ];
    }
}
