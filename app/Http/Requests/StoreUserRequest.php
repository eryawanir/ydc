<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|alpha:ascii',
            'phone_number' => ['regex:/^(62)8[1-9][0-9]{6,9}$/'],
            'username' => 'required|alpha_num:ascii',
            'role' => 'required',
            'password' => 'required|min:5'

        ];
    }
}
