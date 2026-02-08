<?php

namespace App\Http\Requests\Unit;

use Illuminate\Foundation\Http\FormRequest;

class CreateUnitRequest extends FormRequest
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
            'code' => 'required|unique:units,code',
            'name' => 'required',
            'leader_id' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Hãy nhập mã bộ phận',
            'code.unique' => 'Mã bộ phận đã tồn tại',
            'name.required' => 'Hãy nhập tên bộ phận',
        ];
    }
}
