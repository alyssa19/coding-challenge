<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'confirmed', 
                'unique',
                'Password::min(8)->mixedCase()'
            ]
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'users.required' => 'The users array is required.',
            'users.*.name.required' => 'The name field for all users is required.',
            'users.*.name.string' => 'The name field for all users must be a string.',
            'users.*.email.required' => 'The email field for all users is required.',
            'users.*.email.email' => 'The email field for all users must be a valid email address.',
            'users.*.email.unique' => 'The email address for all users must be unique.',
            'users.*.email.min' => 'The email field for all users must have minimum 8 character long.',
        ];
    }
}
