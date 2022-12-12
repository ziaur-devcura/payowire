<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class make_paymentReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();
        return $user;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'bank_type' => 'required|numeric|between:1,2',
            'bank_country' => 'required'
        ];
    }


      public function messages()
    {
         return [
            'bank_type.required' => 'Please choose bank type',
            'bank_type.numeric' => 'Sorry, something went wrong. Try again later.',
            'bank_type.between' => 'Please choose bank type',
            'bank_country.required' => 'Please choose bank country'
        ];
    }
}
