<?php

namespace App\Http\Requests\Unit;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnitRequest extends FormRequest
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
            'id' => 'exists:units,id',
            'code' => 'required|unique:units,code,' . $this->unit,
            'name' => 'required',
            'leader_id' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Bộ phận không tồn tại',
            'code.required' => 'Hãy nhập mã bộ phận',
            'code.unique' => 'Mã bộ phận đã tồn tại',
            'name.required' => 'Hãy nhập tên bộ phận'
        ];
    }
}
