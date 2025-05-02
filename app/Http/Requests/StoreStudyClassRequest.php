<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudyClassRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'start_time' => ['required', 'string'],
            'end_time' => ['required', 'string'],
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
            'name.required' => 'The name is required.',
            'description.required' => 'The description is required.',
            'start_time.required' => 'The start time is required.',
            'end_time.required' => 'The end time is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'name.string' => 'The name must be a string.',
            'description.string' => 'The description must be a string.',
            'start_time.string' => 'The start time must be a string.',
            'end_time.string' => 'The end time must be a string.',
        ];
    }
}
