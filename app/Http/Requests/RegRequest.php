<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users',
            'password' => 'required|min:5',
            'password_confirmation' => 'same:password',
            'login' => 'required|unique:users',
            'name' => 'required',
            'lastname' => 'required'
        ];
    }
}
