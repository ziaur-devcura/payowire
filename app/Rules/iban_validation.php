<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use PHP_IBAN\IBAN;
use PHP_IBAN\IBANCountry;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\Object_;

class iban_validation implements Rule
{

    private $controller;
    private $country;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($country)
    {
        $this->country = $country;
        $this->controller = new Controller();
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

          
          if(isset($this->controller->sepa_payment_country()[$this->country]))
          {
            $sepa_country = $this->controller->sepa_payment_country()[$this->country];
          if(isset($this->controller->get_payment_country_code()[$sepa_country]))
             $iban_country = $this->controller->get_payment_country_code()[$sepa_country];
            }

            if(!empty($iban_country))
            {
                $iban_check = new IBAN($value);
                $iban_country = new IBANCountry($iban_country);

                if(!preg_match('/'.$iban_country->IBANFormatRegex().'/',$value) && !$iban_check->VerifyMachineFormatOnly())
                    return false;
                else
                    return true;
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
        return 'Please enter a valid IBAN';
    }
}
