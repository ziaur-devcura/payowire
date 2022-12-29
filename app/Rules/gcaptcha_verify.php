<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class gcaptcha_verify implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $secret;


    public function __construct($sec)
    {

        $this->secret = $sec;
    
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        if($_SERVER['SERVER_NAME'] == '127.0.0.1')
        $secret_key = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
      else
        $secret_key = $this->secret;



        if(isset($value) && !empty($value))
        {
          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$value);
        
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        return true;
        else
            return false;
        }
        else
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry, captcha validation failed. Please try again.';
    }
}
