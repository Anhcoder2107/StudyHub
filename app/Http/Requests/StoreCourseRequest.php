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
            'category_id.required' => 'Trường danh mục là bắt buộc.',
            'user_id.required' => 'Trường người dùng là bắt buộc.',
            'course_name.required' => 'Tên khóa học là bắt buộc.',
            'course_description.required' => 'Mô tả khóa học là bắt buộc.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'category_id.integer' => 'Danh mục phải là một số nguyên.',
            'user_id.integer' => 'Người dùng phải là một số nguyên.',
            'course_name.string' => 'Tên khóa học phải là chuỗi ký tự.',
            'course_name.max' => 'Tên khóa học không được vượt quá 255 ký tự.',
            'course_description.string' => 'Mô tả khóa học phải là chuỗi ký tự.',
        ];
    }


}
