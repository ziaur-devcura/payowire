<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class card_add_fund extends FormRequest
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
            'cardAmount' => 'nullable|numeric|min:5'
        ];
    }

     public function messages()
    {
         return [
            'cardAmount.numeric' => 'Please enter a valid USD amount',
            'cardAmount.min' => 'Card amount should be minimum 5 USD'
        ];
    }
}
