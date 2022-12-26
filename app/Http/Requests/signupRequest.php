<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class signupRequest extends FormRequest
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
            'accountType' => 'required|numeric|between:1,2',
            'userFname' => 'required|max:255',
            'userLname' => 'required|max:255',
            'userEmail' => 'required|email:rfc,dns,spoof,filter,filter_unicode',
            'userNewpass'=> 'required|string|min:8|confirmed', Password::min(8)
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised(),
            'userDob' => 'required|date_format:d/m/Y|before: 18 years ago'

        ];
    }

        public function messages()
    {
         return [
            'accountType.required' => 'Please choose account type',
            'accountType.numeric' => 'Please choose account type',
            'accountType.between' => 'Please choose account type',
            'userFname.required' => 'The first name field is required',
            'userFname.max' => 'first name maximum 255 character',
            'userLname.required' => 'The last name field is required',
            'userLname.max' => 'last name maximum 255 character',
            'userEmail.required' => 'The email address field is required',
            'userEmail.email' => 'enter a valid email address',
            'userNewpass.required' => 'The password field is required',
            'userNewpass.confirmed' => 'new password and confirm password is not matched',
            'userDob.required' => 'The date of birth field is required',
            'userDob.date_format' => 'The date of birth format was incorrect',
            'userDob.after' => 'You must be 18 years old or above'
        ];
    }
}
