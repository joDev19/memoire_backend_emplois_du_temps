<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUe extends FormRequest
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
            "label" => ['required'],
            "code" => ['required'],
            "filiere_id" => ['required', 'exists:filieres,id'],
            "semestre_id" => ['required', 'exists:semestres,id'],
        ];
    }
}
