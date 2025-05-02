<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLivestreamRequest extends FormRequest
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
}
