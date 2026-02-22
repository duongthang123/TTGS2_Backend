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
            'to_year' => 'required|date_format:Y',
            'note' => 'nullable|string'
        ];
    }
}
