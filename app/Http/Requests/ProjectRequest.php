<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:100',
            'img' => 'required|active_url',
            'description' => 'required|min:10',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Il titolo è obbligatorio',
            'name.min:3' => 'Il titolo deve avere almeno :min caratteri',
            'name.max:100' => 'Il titolo può avere massimo :max caratteri',
            'img.required' => 'L\'immagine è obbligatoria',
            'img.active_url' => 'L\'immagine deve essere un link valido',
            'description.required' => 'La descrizione è obbligatoria',
            'description.min:10' => 'La descrizione deve avere almeno :min caratteri',
        ];
    }
}
