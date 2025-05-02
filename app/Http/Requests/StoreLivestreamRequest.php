<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivestreamRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'livestream_url' => ['required', 'string'],
            'start_time' => ['required', 'date'],
            'end_time' => ['required', 'date'],
            'url' => ['required', 'string'],
            'recording_url' => ['required', 'string'],
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
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
            'livestream_url.required' => 'The livestream URL is required.',
            'start_time.required' => 'The start time is required.',
            'end_time.required' => 'The end time is required.',
            'url.required' => 'The URL is required.',
            'recording_url.required' => 'The recording URL is required.',
            'class_id.integer' => 'The class ID must be an integer.',
            'title.string' => 'The title must be a string.',
            'description.string' => 'The description must be a string.',
            'livestream_url.string' => 'The livestream URL must be a string.',
            'start_time.date' => 'The start time must be a valid date.',
            'end_time.date' => 'The end time must be a valid date.',
            'url.string' => 'The URL must be a string.',
            'recording_url.string' => 'The recording URL must be a string.',
        ];
    }
}
