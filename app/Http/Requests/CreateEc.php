<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEc extends FormRequest
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
            'label' => ['required'],
            'code' => ['required', 'unique:ecs,code'],
            'masse_horaire' => ['required', 'numeric'],
            'ue_id' => ['required', 'numeric', 'exists:ues,id'],
            'professeur_id' => ['required', 'numeric', 'exists:users,id'],
        ];
    }
}
