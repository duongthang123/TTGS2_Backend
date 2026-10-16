<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'code' => 'nullable|unique:users,code',
            'name' => 'required',
            'gender' => 'required|in:0,1',
            'citizen_number' => 'required|unique:users,citizen_number',
            'date' => 'required',
            'old_address' => 'nullable',
            'new_address' => 'nullable',
            'email' => [
                'required',
                'unique:users,email',
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'phone' => [
                'required',
                'max:15',
                'regex:/^(0)(3|5|7|8|9)[0-9]{8}$/',
                'unique:users,phone'
            ],
            'rank_id' => 'required|exists:ranks,id',
            'position_id' => 'required|exists:positions,id',
            'unit_id' => 'required|exists:units,id',
            'joined_date' => 'nullable|date',
            'unit_assigned_date' => 'nullable|date',
            'party_joined_date' => 'nullable|date',
            'status' => [
                'required',
                Rule::in(array_values(config('const.STATUS')))
            ],
            'password' => 'nullable|string|min:8|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'code.unique' => 'Số hiệu CAND này đã tồn tại',

            'name.required' => 'Hãy nhập tên CBCS',

            'gender.required' => 'Hãy chọn giới tính',
            'gender.in' => 'Giới tính chỉ được chọn 0 (Nữ) hoặc 1 (Nam)',

            'citizen_number.required' => 'Hãy nhập số CCCD',
            'citizen_number.unique' => 'Số CCCD này đã tồn tại',

            'date.required' => 'Hãy nhập ngày sinh',

            'email.required' => 'Hãy nhập địa chỉ email',
            'email.unique' => 'Email này đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được vượt quá 255 ký tự',
            'email.regex' => 'Email không hợp lệ',

            'phone.required' => 'Hãy nhập số điện thoại',
            'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự',
            'phone.regex' => 'Số điện thoại phải bắt đầu bằng 03, 05, 07, 08 hoặc 09 và có 10 chữ số',
            'phone.unique' => 'Số điện thoại này đã tồn tại',

            'rank_id.required' => 'Hãy chọn cấp bậc',
            'rank_id.exists' => 'Cấp bậc không tồn tại',

            'position_id.required' => 'Hãy chọn chức vụ',
            'position_id.exists' => 'Chức vụ không tồn tại',

            'unit_id.required' => 'Hãy chọn đơn vị',
            'unit_id.exists' => 'Đơn vị không tồn tại',

            'joined_date.date' => 'Ngày vào làm phải là định dạng ngày hợp lệ',
            'unit_assigned_date.date' => 'Ngày phân công đơn vị phải là định dạng ngày hợp lệ',
            'party_joined_date.date' => 'Ngày vào Đảng phải là định dạng ngày hợp lệ',

            'status.required' => 'Hãy chọn trạng thái',
            'status.in' => 'Trạng thái không hợp lệ',

            'password.string' => 'Mật khẩu phải là chuỗi ký tự',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.max' => 'Mật khẩu không được vượt quá 255 ký tự',
        ];
    }
}
