<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimetables extends FormRequest
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
            "weekStartDate" => ['required','date',],
            "weekEndDate" => ['required','date','after:weekStartDate',],
            "courses" => ['array'],
            "courses.*.ec_id" => ['required', 'exists:ecs,id'],
            "courses.*.day" => ['required', 'date'],
            "courses.*.start" => ['required'],
            "courses.*.end" => ['required'],
            "courses.*.filieres_id" => ['required', 'array'],
            "courses.*.filieres_id.*" => ['exists:filieres,id'],
            "courses.*.classe_id" => ['exists:classes,id'],
            // 'courses.*.course_week_id' => ['required', 'exists:course_weeks,id']
        ];
    }
}
