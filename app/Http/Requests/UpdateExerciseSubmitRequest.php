<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExerciseSubmitRequest extends FormRequest
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
            'exercise_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'submit_time' => ['required', 'date'],
            'file_url' => ['required', 'string'],
        ];
    }
}
