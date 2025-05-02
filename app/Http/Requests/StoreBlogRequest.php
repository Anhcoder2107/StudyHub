<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'content' => ['required', 'string'],
            'image' => ['required', 'string'],
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
            'content.required' => 'The content is required.',
            'image.required' => 'The image is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'title.string' => 'The title must be a string.',
            'content.string' => 'The content must be a string.',
        ];
    }
}
