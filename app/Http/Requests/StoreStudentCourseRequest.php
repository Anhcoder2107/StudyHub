<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentCourseRequest extends FormRequest
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
            'course_id' => ['required', 'integer'],
            'status' => ['required', 'string'],
            'start_time' => ['required', 'string'],
            'progress' => ['required', 'integer']
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
            'course_id.required' => 'The course ID is required.',
            'status.required' => 'The status is required.',
            'start_time.required' => 'The start time is required.',
            'progress.required' => 'The progress is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'course_id.integer' => 'The course ID must be an integer.',
            'status.string' => 'The status must be a string.',
            'start_time.string' => 'The start time must be a string.',
            'progress.integer' => 'The progress must be an integer.'
        ];
    }
}
