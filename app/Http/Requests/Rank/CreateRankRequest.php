<?php

namespace App\Http\Requests\Rank;

use Illuminate\Foundation\Http\FormRequest;

class CreateRankRequest extends FormRequest
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
            'code' => 'required|unique:ranks,code',
            'name' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'code.unique' => 'Mã cấp bậc này đã tồn tại',
            'code.required' => 'Hãy nhập mã cấp bậc',
            'name.required' => 'Hãy nhập tên cấp bậc'
        ];
    }
}
