<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'url' => ['required', 'string'],
            'duration' => ['required', 'string'],
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
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
            'url.required' => 'The URL is required.',
            'duration.required' => 'The duration is required.',
            'title.string' => 'The title must be a string.',
            'description.string' => 'The description must be a string.',
            'url.string' => 'The URL must be a string.',
            'duration.string' => 'The duration must be a string.',
        ];
    }
}
