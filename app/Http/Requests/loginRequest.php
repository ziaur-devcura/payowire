<?php

namespace App\Http\Requests;

use App\Rules\gcaptcha_verify;
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
            'userPass' => 'required',
            'gcap_token' => 'required', new gcaptcha_verify('6LdjaLAjAAAAABBP-rDdpWOCWJ-HxP6ae_6xwxjL')

        ];
    }

        public function messages()
    {
         return [
            'userEmail.required' => 'Please enter your email adddress',
            'userEmail.email' => 'Please enter a valid email adddress',
            'userPass.required' => 'Please enter your password',
            'userPass.required' => 'Please enter your password',
            'gcap_token.required' => 'Please complete captcha verification'
        ];
    }
}
