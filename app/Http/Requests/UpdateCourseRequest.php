<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'category_id' => ['sometimes', 'required', 'integer'],
            'user_id' => ['sometimes', 'required', 'integer'],
            'course_name' => ['sometimes', 'required', 'string', 'max:255'],
            'course_description' => ['sometimes', 'required', 'string'],
            'status' => ['sometimes', 'required'],
        ];
    }
}
