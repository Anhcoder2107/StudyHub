<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExerciseRequest extends FormRequest
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
            'user_id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'due_date' => ['required', 'date'],
            'max_score' => ['required', 'integer'],
        ];
    }

    /**
     * Get custom error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array{
        return [
            'user_id.required' => 'The user ID is required.',
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
            'due_date.required' => 'The due date is required.',
            'max_score.required' => 'The maximum score is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'title.string' => 'The title must be a string.',
            'description.string' => 'The description must be a string.',
            'due_date.date' => 'The due date must be a valid date.',
            'max_score.integer' => 'The maximum score must be an integer.',
        ];
    }
}
