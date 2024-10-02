<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourse extends FormRequest
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
            "ec_id" => ['required', 'exists:ecs,id'],
            "day" => ['required', 'date'],
            "start" => ['required'],
            "end" => ['required'],
            "filieres_id" => ['required', 'array'],
            "filieres_id.*" => ['exists:filieres,id'],
            "classe_id" => ['exists:classes,id'],
            'course_week_id' => ['required', 'exists:course_weeks,id']
        ];
    }
}
