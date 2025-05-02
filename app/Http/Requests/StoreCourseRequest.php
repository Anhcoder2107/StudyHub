<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'category_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'course_name' => ['required', 'string', 'max:255'],
            'course_description' => ['required', 'string'],
            'status' => ['required'],
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
            'category_id.required' => 'The category ID is required.',
            'user_id.required' => 'The user ID is required.',
            'course_name.required' => 'The course name is required.',
            'course_description.required' => 'The course description is required.',
            'status.required' => 'The status is required.',
            'category_id.integer' => 'The category ID must be an integer.',
            'user_id.integer' => 'The user ID must be an integer.',
            'course_name.string' => 'The course name must be a string.',
            'course_name.max' => 'The course name may not be greater than 255 characters.',
            'course_description.string' => 'The course description must be a string.',
        ];
    }


}
