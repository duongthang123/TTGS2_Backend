<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'id' => 'exists:users,id',
            'code' => 'unique:users,code,' . $this->user,
            'name' => 'required',
            'gender' => 'required|in:0,1',
            'citizen_number' => 'required|unique:users,citizen_number,' . $this->user,
            'date' => 'required',
            'old_address' => 'nullable',
            'new_address' => 'nullable',
            'email' => [
                'required',
                'unique:users,email,' . $this->user,
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'phone' => [
                'required',
                'max:15',
                'regex:/^(0)(3|5|7|8|9)[0-9]{8}$/',
                'unique:users,phone,' . $this->user
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
}
