<?php

namespace App\Http\Requests\SalaryCft;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSalaryCftRequest extends FormRequest
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
            'user_id' => [
                'required',
                'numeric',
                Rule::exists('users', 'id')
                    ->whereNull('deleted_at'),
            ],
            'rank_id' => [
                'required',
                'numeric',
                Rule::exists('ranks', 'id')
                    ->whereNull('deleted_at'),
            ],
            'salary' => 'required|numeric',
            'from_year' => 'required|date_format:Y',
            'to_year' => 'required|date_format:Y|after_or_equal:from_year',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Vui lòng chọn người dùng.',
            'user_id.numeric' => 'Mã người dùng phải là số.',
            'user_id.exists' => 'Người dùng không tồn tại hoặc đã bị xóa.',

            'rank_id.required' => 'Vui lòng chọn cấp bậc.',
            'rank_id.numeric' => 'Mã cấp bậc phải là số.',
            'rank_id.exists' => 'Cấp bậc không tồn tại hoặc đã bị xóa.',

            'salary.required' => 'Vui lòng nhập mức lương.',
            'salary.numeric' => 'Mức lương phải là số.',

            'from_year.required' => 'Vui lòng nhập năm bắt đầu.',
            'from_year.date_format' => 'Năm bắt đầu phải có định dạng YYYY (ví dụ: 2026).',

            'to_year.required' => 'Vui lòng nhập năm kết thúc.',
            'to_year.date_format' => 'Năm kết thúc phải có định dạng YYYY (ví dụ: 2027).',

            'to_year.after_or_equal' => 'Năm kết thúc không được nhỏ hơn năm bắt đầu.',
        ];
    }
}
