<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
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
            "name" => ['required'],
            // "email" => ['required', 'email', 'unique:users,email'],
            "matricule" => ['nullable', 'numeric'],
            "role" => ['required', Rule::in(['responsable', 'coordinateur', 'professeur']),],
            "semestre_id" => ['nullable', 'exists:semestres,id'],
            "filiere_id" => ['nullable', 'exists:filieres,id'],
        ];
    }
}
