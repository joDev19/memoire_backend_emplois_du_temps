<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CreateUser extends FormRequest
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
            "email" => ['required', 'email', 'unique:users,email'],
            "matricule" => ['nullable', 'numeric', 'unique:users,matricule'],
            "roles_id" => ['required', 'array'],
            "roles_id*" => ['required', 'exists:roles,id'],
            "year_id" => ['nullable', 'exists:years,id'],
            "telephone" => ['nullable', 'min:8', 'unique:users,telephone'],
            "filiere_id" => ['nullable', 'exists:filieres,id'],
            "password" => ['required'],
        ];
    }
}
