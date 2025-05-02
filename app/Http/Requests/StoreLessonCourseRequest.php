<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonCourseRequest extends FormRequest
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
            'course_id' => ['required', 'integer'],
            'video_id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
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
            'course_id.required' => 'The course ID is required.',
            'video_id.required' => 'The video ID is required.',
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
            'course_id.integer' => 'The course ID must be an integer.',
            'video_id.integer' => 'The video ID must be an integer.',
            'title.string' => 'The title must be a string.',
            'description.string' => 'The description must be a string.',
        ];
    }
}
