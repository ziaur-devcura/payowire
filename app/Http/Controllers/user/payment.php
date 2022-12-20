<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\user\make_paymentReq;
use PHP_IBAN\IBANCountry;

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
                                                        </div>

                                                 ';

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

        $personal_common_data = '\'<div class="mb-3 row"><label class="form-label">First Name</label><input type="text" name="ben_firstname" class="form-control" placeholder="Enter beneficiary first name"></div>\' +
                                         \'<div class="mb-3 row"><label class="form-label">Last Name</label><input type="text" name="ben_lastname" class="form-control" placeholder="Enter beneficiary last name"></div>\' +';

        if($confirm == 1)
        {

            $recipient_type = $request->recipient_type;
            $ben_firstname = $request->ben_firstname;
            $ben_lastname = $request->ben_lastname;
            $bank_name = $request->bank_name;
            $account_number = $request->account_number;
            $routing_number = $request->routing_number;
            $bank_address = $request->bank_address;
            $iban = $request->iban;
            $swift_code = $request->swift_code;

            $userdata = parent::get_auth_user();

            $add_bank = parent::insert_payment_bank($bank_type,$bank_country,$recipient_type,$ben_firstname,$ben_lastname,$bank_name,$account_number,$routing_number,$bank_address,$iban,$swift_code,$userdata->id);

            if(isset($add_bank->id))
                return '<script>
            $("#add_bank_modal").modal("hide");
            swal("New Bank Added", "You can now send payment to this recipient", "success");
            </script>';
            else
                return parent::get_error_msg('We are unable to add new bank account. Please try again later.');



        }
        else
        {

        if(isset(parent::sepa_payment_country()[$bank_country]))
        {
            $sepa_country = parent::sepa_payment_country()[$bank_country];
            $iban_country = parent::get_payment_country_code()[$sepa_country];

            if(!empty($iban_country))
            {
                $iban_country = new IBANCountry($iban_country);
                $iban_example = 'Example: '.$iban_country->IBANExample();
            }
            else
                $iban_example = 'Enter bank IBAN';


            return '<script>          $("#addBankCloseBtn").html("Back");
                                         $("#addBankclick").html("Confirm");
                                         $("#add_bank_confirm").val(1);
                                         $("#step1").addClass("d-none");
                                         $("#step2").html('.$personal_common_data.'\'<div class="mb-3 row"><label class="form-label">Bank Name</label><input type="text" name="bank_name" class="form-control" placeholder="Enter bank name"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">IBAN</label><input type="text" name="iban" class="form-control" placeholder="'.$iban_example.'"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">Swift Code</label><input type="text" name="swift_code" class="form-control" placeholder="Enter swift/bic"></div>\'+
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
                                    \'<div class="mb-3 row"><label class="form-label">Account Number</label><input type="text" name="account_number" class="form-control" placeholder="Enter account number"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">Routing Number</label><input type="text" name="routing_number" class="form-control" placeholder="Enter routing number"></div>\'+
                                    \'<div class="mb-3 row"><label class="form-label">Bank Address</label><input type="text" name="bank_address" class="form-control" placeholder="Enter bank address"></div>\');
                                     </script>';

        }
        else
            return parent::get_error_msg('We are unable to process your request. Please contact with support!');

    }
         
    }

    public function fetch_payment_bank($recipient_type)
    {

        $userdata = parent::get_auth_user();

        $payment_bank_table = parent::get_paymentBank_table();

        $fetch_bank_account = $payment_bank_table->where('refer',$userdata->id)->where('recipient_type',$recipient_type)->get();

        $bank_account = ' <div class="mb-3 col-md-6">
                                                            <label class="form-label">Bank Account</label>

                                            <select id="payment_country" name="bank_country" class="nice-select default-select default-select form-control wide mb-3" data-toggle="select2">
                                            <option value="" selected>Select Bank Account</option>';

            $my_bank_to_array = '{';

        foreach ($fetch_bank_account as $bank) {
            
            $bank_account = $bank_account . '<option value="'.$bank->id.'">'.$bank->bank_name.'</option>';
            $my_bank_to_array = $my_bank_to_array.'"'.$bank->id.'": "'.$bank->bank_country.'",';

        }

        $my_bank_to_array = $my_bank_to_array.'}';

        $bank_account = $bank_account . '</select></div>';

        $current_balance = parent::fetch_balance($userdata->balance);

        if($fetch_bank_account->isEmpty())
            return parent::get_error_msg('You do not have any recipient bank account yet. Please add one.');

        else
        {

            if(parent::currency_update() == 1)
            {

                $currency_data = json_decode(parent::get_setting()->currency_data);

                $euro_rate = $currency_data->quotes->USDEUR;




        return ' <form id="sendmoneyForm" method="POST" action="'.route('user.sendmoneydo').'">
    <div class="row">

                                                     <input type="hidden" name="_token" value="'.csrf_token().'">

                                                      <div class="mb-3 col-md-6 ">
                                                <label class="form-label">Form</label>
                                                               <select name="whichBalance" class="nice-select default-select default-select form-control wide mb-3" data-toggle="select2">
                                            <option value="usd">USD Balance</option>
                                           
                                        </select>
                                        <p class="text-info">Current Balance: '.$current_balance.' USD</p>
                                            </div>

                                           '.$bank_account.'


                                             <div class="mb-3 col-md-6">
                                                <label class="form-label">Amount (USD)</label>
                                                <input type="text" id="payment_amount" name="sendAmount" class="form-control amount" placeholder="Enter usd amount">

                                                <p class="text-info" id="payment_amount_convert"></p>
                                            </div>

                                              <div class="mb-3 col-md-6">
                                                <label class="form-label">Purpose of payment</label>
                                                <input type="text" name="purpose" class="form-control" maxlength="100" placeholder="Enter purpose of payment">
                                            </div>

                                                        <div class="mb-3 mt-3 text-center">

                                            <button id="sendmoneyCLick" type="button" class=" btn btn-rounded btn-primary ms-2 mr-2">Review</button>

                                        </div>
                                        </div>

                                        </form>

                                         <div class="mt-4 text-center" id="sendmoneyMsg">

                                        </div>
                                        <script>
                                          if (jQuery().select2) {
            $(\'[data-toggle="select2"]\').select2({
                    
                   });
        }

        amount_input();



            function euro_country()
    {
        return '.$my_bank_to_array.';
    }


          var payment_cur_rate = 1;


    $("#payment_country").change(function()
    {

        if(euro_country()[$(this).val()]!==undefined)
            payment_cur_rate = '.$euro_rate.';

    });


    $("#payment_amount").on("input",function()
    {

        var val = $(this).val() * 100;
        var cur_rate = payment_cur_rate * 100;

        if(val>'.$userdata->balance.')
        {
            $("#payment_amount_convert").removeClass("text-info");
            $("#payment_amount_convert").addClass("text-danger");
        $("#payment_amount_convert").html("The payment amount exceeds the balance");
        }
        else
        {
            $("#payment_amount_convert").removeClass("text-danger");
            $("#payment_amount_convert").addClass("text-info");
        $("#payment_amount_convert").html("Will receive: "+((val*payment_cur_rate)/100).toFixed(2) + " EURO");
        }

    });

        </script>';
    }
    else
         return parent::get_error_msg('We are unable to process your request at the moment! Please try again later.');
    }

    }


    public function send_paymentdo()
    {
        return 'ok;

    }
}
