<?php

namespace App\Http\Requests\Prisoner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePrisonerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $prisonerId = $this->route('prisoner');

        return [
            'name' => 'required|string|max:150',
            'date' => 'nullable|date',
            'gender' => 'required|in:0,1',
            'citizen_number' => [
                'nullable',
                'string',
                Rule::unique('prisoners', 'citizen_number')->ignore($prisonerId),
            ],
            'address' => 'nullable|string|max:255',
            'permanent_address' => 'nullable|string|max:255',
            'crime' => 'required|string',
            'sentence' => 'required|string|max:255',
            'admitted_at' => 'required|date',
            'status' => [
                'required',
                Rule::in(array_values(config('const.PRISONER_STATUS'))),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên phạm nhân.',
            'name.string' => 'Họ tên phải là chuỗi ký tự.',
            'name.max' => 'Họ tên không được vượt quá 150 ký tự.',
            'date.date' => 'Ngày sinh không đúng định dạng ngày tháng.',
            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.in' => 'Giới tính không hợp lệ.',
            'citizen_number.string' => 'Số căn cước phải là chuỗi ký tự.',
            'citizen_number.unique' => 'Số căn cước này đã tồn tại.',
            'address.string' => 'Địa chỉ hiện tại phải là chuỗi ký tự.',
            'address.max' => 'Địa chỉ hiện tại không được vượt quá 255 ký tự.',
            'permanent_address.string' => 'Địa chỉ thường trú phải là chuỗi ký tự.',
            'permanent_address.max' => 'Địa chỉ thường trú không được vượt quá 255 ký tự.',
            'crime.required' => 'Vui lòng nhập thông tin tội danh.',
            'crime.string' => 'Thông tin tội danh không hợp lệ.',
            'sentence.required' => 'Vui lòng nhập mức án.',
            'sentence.string' => 'Mức án phải là chuỗi ký tự.',
            'sentence.max' => 'Mức án không được vượt quá 255 ký tự.',
            'admitted_at.required' => 'Vui lòng nhập ngày tiếp nhận phạm nhân.',
            'admitted_at.date' => 'Ngày tiếp nhận không đúng định dạng.',
            'status.required' => 'Vui lòng chọn trạng thái phạm nhân.',
            'status.in' => 'Trạng thái phạm nhân không hợp lệ.',
        ];
    }
}
