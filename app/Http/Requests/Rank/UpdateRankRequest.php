<?php

namespace App\Http\Requests\Rank;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRankRequest extends FormRequest
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
            'id' => 'exists:ranks,id',
            'code' => 'required',
            'name' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists' => 'Cấp bậc không tồn tại',
            'code.required' => 'Hãy nhập mã cấp bậc',
            'name.required' => 'Hãy nhập tên cấp bậc'
        ];
    }
}
