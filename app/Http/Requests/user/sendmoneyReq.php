<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class sendmoneyReq extends FormRequest
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
            'recipientEmail' => 'required|email:rfc,dns,spoof,filter,filter_unicode',
            'whichBalance' => 'required',
            'sendAmount' => 'required|regex:/^-?\d+(\.\d{1,2})?$/',
            'purpose' => 'nullable|max:100|regex:/^[a-zA-Z 0-9]+$/u'


        ];
    }

       public function messages()
    {
         return [
            'recipientEmail.required' => 'Please enter recipient email address',
            'recipientEmail.eamil' => 'Please enter a valid recipient email address',
            'whichBalance.required' => 'Please choose from balance',
            'sendAmount.required' => 'Please enter send amount',
            'sendAmount.regex' => 'please enter a valid send amount',
            'purpose.max' => 'Purpose limit to 100 character only',
            'purpose.regex' => 'You provide unsupported character on purpose'
        ];
    }
}
