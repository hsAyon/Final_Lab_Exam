<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class editReq extends FormRequest
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
            'username' => [
                'required',
                Rule::unique('logins')->ignore($this->route('id'))
            ],
            'name' => 'required',
            'contact' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username Required!',
            'username.unique' => 'Username already exists!',
            'name.required' => 'Name Required!',
            'contact.required' => 'Contact information Required!',
        ];
    }
}
