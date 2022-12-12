<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\user\make_paymentReq;

class payment extends Controller
{
    public function paymentView()
    {

        $date = '
                                                         <div class="mb-3 row">
                                                           <label class="form-label">Bank Name</label>
                                                <input type="text" name="bank_name" class="form-control" placeholder="Enter bank name">
                                                        </div>


                                                        <div class="mb-3 row">
                                                           <label class="form-label">Account Number</label>
                                                <input type="text" name="bank_ac_number" class="form-control" placeholder="Enter account number">
                                                        </div>


                                                         <div class="mb-3 row">
                                                           <label class="form-label">Routing Number</label>
                                                <input type="text" name="bank_routing_number" class="form-control" placeholder="Enter routing number">
                                                        </div>


                                                        <div class="mb-3 row">
                                                           <label class="form-label">IBAN</label>
                                                <input type="text" name="bank_iban" class="form-control" placeholder="Enter IBAN">
                                                        </div>



                                                         <div class="mb-3 row">
                                                           <label class="form-label">Swift Code</label>
                                                <input type="text" name="bank_swift" class="form-control" placeholder="Enter swift code">
                                                        </div>';

        $get_all_country = parent::get_payment_country_list();

        return view('user/payment')
        ->with('pageTitle','Payment | Payowire')
        ->with('pageName','Payment')
        ->with('userData',parent::get_auth_user())
        ->with('get_all_country',$get_all_country);
    }


    public function make_payment(make_paymentReq $request)
    {

        $bank_type = $request->bank_type;

        $bank_country = $request->bank_country;

        $confirm = $request->confirm;

        $personal_common_data = '\'<div class="mb-3 row"><label class="form-label">First Name</label><input type="text" name="holder_firstname" class="form-control" placeholder="Enter beneficiary first name"></div>\' +
                                         \'<div class="mb-3 row"><label class="form-label">Last Name</label><input type="text" name="holder_lastname" class="form-control" placeholder="Enter beneficiary last name"></div>\' +';

        if($confirm == 1)
        {

            return 'Confirm';


        }
        else
        {

        if(isset(parent::sepa_payment_country()[$bank_country]))
        {
            return '<script>          $("#addBankCloseBtn").html("Back");
                                         $("#addBankclick").html("Confirm");
                                         $("#add_bank_confirm").val(1);
                                         $("#step1").addClass("d-none");
                                         $("#step2").html('.$personal_common_data.'\'<div class="mb-3 row"><label class="form-label">Bank Name</label><input type="text" name="bank_name" class="form-control" placeholder="Enter bank name"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">IBAN</label><input type="text" name="bank_ac_number" class="form-control" placeholder="Enter IBAN number"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">Swift Code</label><input type="text" name="bank_swift" class="form-control" placeholder="Enter swift/bic"></div>\'+
                                    \'<div class="mb-3 row"><label class="form-label">Bank Address</label><input type="text" name="bank_address" class="form-control" placeholder="Enter bank address"></div>\');
                                     </script>';

        }
        else if(isset(parent::nomral_payment_country()[$bank_country]))
        {

             return '<script>     $("#addBankCloseBtn").html("Back");
                                         $("#step1").addClass("d-none");
                                         $("#addBankclick").html("Confirm");
                                         $("#add_bank_confirm").val(1);
                                         $("#step2").html('.$personal_common_data.'\'<div class="mb-3 row"> <label class="form-label">Bank Name</label><input type="text" name="bank_name" class="form-control" placeholder="Enter bank name"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">Account Number</label><input type="text" name="bank_ac_number" class="form-control" placeholder="Enter account number"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">Routing Number</label><input type="text" name="bank_routing_number" class="form-control" placeholder="Enter routing number"></div>\'+
                                    \'<div class="mb-3 row"><label class="form-label">Bank Address</label><input type="text" name="bank_address" class="form-control" placeholder="Enter bank address"></div>\');
                                     </script>';

        }
        else
            return parent::get_error_msg('We are unable to process your request. Please contact with support!');

    }
         




    }
}
