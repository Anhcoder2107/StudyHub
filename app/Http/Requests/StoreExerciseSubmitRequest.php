<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExerciseSubmitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'exercise_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'submit_time' => ['required', 'date'],
            'file_url' => ['required', 'string'],
        ];
    }

    /**
     * Get custom error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'exercise_id.required' => 'The exercise ID is required.',
            'user_id.required' => 'The user ID is required.',
            'submit_time.required' => 'The submit time is required.',
            'file_url.required' => 'The file URL is required.',
            'exercise_id.integer' => 'The exercise ID must be an integer.',
            'user_id.integer' => 'The user ID must be an integer.',
            'submit_time.date' => 'The submit time must be a valid date.',
            'file_url.string' => 'The file URL must be a string.',
        ];
    }
}
