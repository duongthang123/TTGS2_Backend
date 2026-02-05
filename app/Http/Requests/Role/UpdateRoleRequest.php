<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'id' => 'exists:roles,id',
            'name' => 'required|string',
            'display_name' => 'required|string',
            'group' => 'required|string',
            'permission_ids' => 'nullable|array',
            'permission_ids.*' => 'exists:permissions,id'
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists' => 'Vai trò này không tồn tại',
            'name.required' => 'Hãy nhập tên vai trò!',
            'display_name.required' => 'Hãy nhập tên hiển thị vai trò!',
            'group.required' => 'Hãy nhập tên nhóm vai trò!',
            'permission_ids.*.exists' => 'Quyền không tồn tại'
        ];
    }
}
