<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class req_new_card extends FormRequest
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
            'cardpack' => 'required|numeric|between:1,2',
            'cardAmount' => 'required|numeric|exclude_if:cardpack,2|between:5,5000'
        ];
    }


       public function messages()
    {
         return [
            'cardAmount.required' => 'Please enter USD amount to craete new card',
            'cardAmount.numeric' => 'Please enter a valid usd amount',
            'cardAmount.between' => 'Card amount should be between 5 to 5,000 USD',
            'cardpack.required' => 'Please choose card type',
            'cardpack.numeric' => 'Please choose valid card type',
            'cardpack.between' => 'Please choose valid card type'
        ];
    }
}
