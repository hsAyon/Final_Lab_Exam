<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return MYSQLI_DATA_TRUNCATED;
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
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username Required!',
            'password.required' => 'Password Required!',
        ];
    }
}
