<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required|confirmed|min:#',
            'name' => 'required',
            'contact' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username Required!',
            'password.required' => 'Password Required!',
            'password.confirmed' => 'Passwords do not match!',
            'password.min' => 'Password minimum 3 characters!',
            'name.required' => 'Username Required!',
            'contact.required' => 'Password Required!',
        ];
    }
}
