<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExaminationRequest extends FormRequest
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
            'start_time' => ['required', 'date'],
            'end_time' => ['required', 'date'],
            'duration' => ['required', 'integer'],
            'max_score' => ['required', 'integer'],
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
            'user_id.required' => 'The user ID is required.',
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
            'start_time.required' => 'The start time is required.',
            'end_time.required' => 'The end time is required.',
            'duration.required' => 'The duration is required.',
            'max_score.required' => 'The maximum score is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'title.string' => 'The title must be a string.',
            'description.string' => 'The description must be a string.',
            'start_time.date' => 'The start time must be a valid date.',
            'end_time.date' => 'The end time must be a valid date.',
            'duration.integer' => 'The duration must be an integer.',
            'max_score.integer' => 'The maximum score must be an integer.',
        ];
    }
}
