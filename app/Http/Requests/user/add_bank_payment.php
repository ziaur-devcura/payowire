<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Rules\iban_validation;
use App\Rules\swift_bic_validation;

class add_bank_payment extends FormRequest
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



        $additionalRules = [];

           $rules1 =  [
            'bank_type' => 'required|numeric|between:1,2',
            'bank_country' => 'required',
            'recipient_type' => 'required|numeric|between:1,2',
            'confirm' => 'nullable|integer|digits_between:0,1',
            'ben_firstname' => 'required_if:confirm,1|max:255',
            'ben_lastname' => 'required_if:confirm,1|max:255',
            'ben_address' => 'required_if:confirm,1|max:255',
            'bank_name' => 'required_if:confirm,1|max:255'
        ];




        $controller = new Controller();

        if(isset(request()->bank_country))
      {

        if(isset($controller->sepa_payment_country()[request()->bank_country]))
        {
             $additionalRules = [

            'iban' => 'required_if:confirm,1|max:40',new iban_validation(request()->bank_country),
            'swift_code' => 'required_if:confirm,1|max:12',new swift_bic_validation
          ];

        }
        else if(isset($controller->nomral_payment_country()[request()->bank_country]))
        {
              $additionalRules = [
            'account_number' => 'required_if:confirm,1|integer|max:22',
            'routing_number' => 'required_if:confirm,1|integer|max:22',
          ];

        }

      }



         return $rules1+$additionalRules;
    }


      public function messages()
    {
         return [
            'bank_type.required' => 'Please choose bank type',
            'bank_type.numeric' => 'Sorry, something went wrong. Try again later.',
            'bank_type.between' => 'Please choose bank type',
            'bank_country.required' => 'Please choose bank country',
            'recipient_type.required' => 'Please choose recipient type',
            'recipient_type.numeric' => 'Sorry, something went wrong. Try again later.',
            'recipient_type.between' => 'Please choose recipient type',
            'ben_firstname.required_if' => 'Please enter beneficiary first name',
            'ben_firstname.max' => 'Beneficiary first name reach max lenght',
            'ben_lastname.required_if' => 'Please enter beneficiary last name',
            'ben_lastname.max' => 'Beneficiary last name reach max lenght',
            'bank_name.required_if' => 'Please enter bank name',
            'bank_name.max' => 'Bank name reach max lenght',
            'ben_address.required_if' => 'Please enter beneficiary address',
            'ben_address.max' => 'Beneficiary address reach max lenght',

            // addtional field
            'iban.required_if' => 'Please enter IBAN',
            'iban.max' => 'IBAN reach max lenght',
            'swift_code.required_if' => 'Please enter swift code',
            'swift_code.max' => 'Swift code reach max lenght',
            'account_number.required_if' => 'Please enter bank account number',
            'account_number.max' => 'Account number reach max lenght',
            'routing_number.required_if' => 'Please enter bank routing number',
            'routing_number.max' => 'Routing number reach max lenght',

        ];
    }
}
