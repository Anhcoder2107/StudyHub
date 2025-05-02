<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentClassRequest extends FormRequest
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
            'class_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'start_time' => ['required', 'string'],
            'description' => ['required', 'string'],
            'status' => ['required', 'string'],
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
            'class_id.required' => 'The class ID is required.',
            'user_id.required' => 'The user ID is required.',
            'start_time.required' => 'The start time is required.',
            'description.required' => 'The description is required.',
            'status.required' => 'The status is required.',
            'class_id.integer' => 'The class ID must be an integer.',
            'user_id.integer' => 'The user ID must be an integer.',
            'start_time.string' => 'The start time must be a string.',
            'description.string' => 'The description must be a string.',
            'status.string' => 'The status must be a string.',
        ];
    }
}
