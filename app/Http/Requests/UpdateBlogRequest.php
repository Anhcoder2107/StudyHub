<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'user_id.required' => json_encode(['message' => 'The user ID is required.']),
            'title.required' => json_encode(['message' => 'The title is required.']),
            'content.required' => json_encode(['message' => 'The content is required.']),
            'image.required' => json_encode(['message' => 'The image is required.']),
            'user_id.integer' => json_encode(['message' => 'The user ID must be an integer.']),
            'title.string' => json_encode(['message' => 'The title must be a string.']),
            'content.string' => json_encode(['message' => 'The content must be a string.']),
        ];
    }
}
