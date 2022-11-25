<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'userEmail' => 'required|email:rfc,dns,spoof,filter,filter_unicode',
            'userPass' => 'required'

        ];
    }

        public function messages()
    {
         return [
            'userEmail.required' => 'Please enter your email adddress',
            'userEmail.email' => 'Please enter a valid email adddress',
            'userPass.required' => 'Please enter your password'
        ];
    }
}
