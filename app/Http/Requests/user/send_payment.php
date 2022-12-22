<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class send_payment extends FormRequest
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
            'whichBalance' => 'required|numeric|between:1,2',
            'bank_account' => 'required|numeric',
            'sendAmount' => 'required|numeric|between:10,10000',
            'purpose' => 'required|numeric|between:1,7',
            'confirm' => 'nullable|numeric|between:0,1'


        ];
    }

         public function messages()
    {
         return [
            'whichBalance.required' => 'Please choose from balance',
            'bank_account.required' => 'Please choose bank account',
            'bank_account.numeric' => 'Please choose a valid bank account',
            'sendAmount.required' => 'Please enter send amount',
            'sendAmount.between' => 'Send amount should be between 10 to 10,000 USD',
            'sendAmount.numeric' => 'Please enter a valid amount',
            'purpose.required' => 'Please choose purpose',
            'purpose.numeric' => 'Please choose a valid purpose',
            'purpose.between' => 'Please choose a valid purpose',
        ];
    }

}
