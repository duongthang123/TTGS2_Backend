<?php

namespace App\Http\Requests\Role;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'name' => 'required|string',
            'display_name' => 'required|string',
            'group' => 'required|string',
            'permission_ids' => 'nullable|array',
            'permission_ids.*' => 'distinct|exists:permissions,id'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Hãy nhập tên vai trò!',
            'display_name.required' => 'Hãy nhập tên hiển thị vai trò!',
            'group.required' => 'Hãy nhập tên nhóm vai trò!',
            'permission_ids.*.distinct' => 'Quyền đã bị trùng',
            'permission_ids.*.exists' => 'Quyền không tồn tại'
        ];
    }
}
