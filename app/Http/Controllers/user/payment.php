<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\user\add_bank_payment;
use PHP_IBAN\IBANCountry;
use App\Http\Requests\user\send_payment;

class payment extends Controller
{
    public function paymentView()
    {

        $get_all_country = parent::get_payment_country_list();

        return view('user/payment')
        ->with('pageTitle','Payment | Payowire')
        ->with('pageName','Payment')
        ->with('userData',parent::get_auth_user())
        ->with('get_all_country',$get_all_country);
    }


    public function add_bank_payment(add_bank_payment $request)
    {

        $bank_type = $request->bank_type;

        $bank_country = $request->bank_country;

        $confirm = $request->confirm;

        $personal_common_data = '\'<div class="mb-3 row"><label class="form-label">First Name</label><input type="text" name="ben_firstname" class="form-control" placeholder="Enter beneficiary first name"></div>\' +
                                         \'<div class="mb-3 row"><label class="form-label">Last Name</label><input type="text" name="ben_lastname" class="form-control" placeholder="Enter beneficiary last name"></div>\' +
                                         \'<div class="row">\' +
                                            \'<div class="mb-3 col-md-4"><label class="form-label">City</label><input type="text" class="form-control" name="ben_city" placeholder="City"></div> \' +
                                            \'<div class="mb-3 col-md-4"><label class="form-label">Postal Code</label><input type="text" class="form-control" name="ben_postal" placeholder="Postal Code"></div>\' +
                                            \'<div class="mb-3 col-md-4"><label class="form-label">State</label><input type="text" class="form-control" name="ben_state" placeholder="State"></div>\' +
                                            \'</div>\' +
                                         \'<div class="mb-3 row"><label class="form-label">Beneficiary Address</label><input type="text" name="ben_address" class="form-control" placeholder="Enter beneficiary address"></div>\' +';

        if($confirm == 1)
        {

            $recipient_type = $request->recipient_type;
            $ben_firstname = $request->ben_firstname;
            $ben_lastname = $request->ben_lastname;
            $ben_city = $request->ben_city;
            $ben_postal = $request->ben_postal;
            $ben_state = $request->ben_state;
            $bank_name = $request->bank_name;
            $account_holder = $request->account_holder;
            $account_number = $request->account_number;
            $routing_number = $request->routing_number;
            $ben_address = $request->ben_address;
            $iban = $request->iban;
            $swift_code = $request->swift_code;

            $userdata = parent::get_auth_user();

            $add_bank = parent::insert_payment_bank($bank_type,$bank_country,$recipient_type,$ben_firstname,$ben_lastname,$ben_city,$ben_postal,$ben_state,$bank_name,$account_holder,$account_number,$routing_number,$ben_address,$iban,$swift_code,$userdata->id);

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

            if(isset(parent::get_payment_country_code()[$sepa_country]))

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
                                         $("#add_bank_step1").addClass("d-none");
                                         $("#add_bank_step2").html('.$personal_common_data.'\'<div class="mb-3 row"><label class="form-label">Bank Name</label><input type="text" name="bank_name" class="form-control" placeholder="Enter bank name"></div>\' +
                                         \'<div class="mb-3 row"><label class="form-label">Account Holder Name</label><input type="text" name="account_holder" class="form-control" placeholder="Enter account holder name"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">IBAN</label><input type="text" name="iban" class="form-control" placeholder="'.$iban_example.'"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">Swift Code</label><input type="text" name="swift_code" class="form-control" placeholder="Enter swift/bic"></div>\');
                                     </script>';

        }
        else if(isset(parent::nomral_payment_country()[$bank_country]))
        {

             return '<script>     $("#addBankCloseBtn").html("Back");
                                         $("#add_bank_step1").addClass("d-none");
                                         $("#addBankclick").html("Confirm");
                                         $("#add_bank_confirm").val(1);
                                         $("#add_bank_step2").html('.$personal_common_data.'\'<div class="mb-3 row"> <label class="form-label">Bank Name</label><input type="text" name="bank_name" class="form-control" placeholder="Enter bank name"></div>\' +
                                          \'<div class="mb-3 row"><label class="form-label">Account Holder Name</label><input type="text" name="account_holder" class="form-control" placeholder="Enter account holder name"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">Account Number</label><input type="text" name="account_number" class="form-control" placeholder="Enter account number"></div>\' +
                                    \'<div class="mb-3 row"><label class="form-label">Routing Number</label><input type="text" name="routing_number" class="form-control" placeholder="Enter routing number"></div>\');
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

                                            <select id="payment_country" name="bank_account" class="nice-select default-select default-select form-control wide mb-3" data-toggle="select2">
                                            <option value="" selected>Select Bank Account</option>';

            $my_bank_to_array = '{';

        foreach ($fetch_bank_account as $bank) {

            $bank_number = substr($bank->iban,-4) ?? substr($bank->account_number,-4);
            
            $bank_account = $bank_account . '<option value="'.$bank->id.'">'.$bank->bank_name.' ('.$bank_number.')</option>';
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




        return ' <form id="sendmoneyForm" method="POST" action="'.route('user.payment.send').'">
    <div class="row">

                                                     <input type="hidden" name="_token" value="'.csrf_token().'">
                                                     <input type="hidden" id="payment_confirm_input" name="confirm" value="0">

                                                      <div class="mb-3 col-md-6 ">
                                                <label class="form-label">Form</label>
                                                               <select name="whichBalance" class="default-select form-control wide mb-3" >
                                            <option value="1">USD Balance</option>
                                           
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
                                                            <label class="form-label">Purpose</label>
                                                                    <select name="purpose" class="default-select form-control wide mb-3">
                                            <option value="">Select Purpose</option>
                                            <option value="1">Salary</option>
                                            <option value="2">Personal Remittance</option>
                                            <option value="3">Family Support</option>
                                            <option value="4">Living Expenses</option>
                                            <option value="5">Travel</option>
                                            <option value="6">Good Purchased</option>
                                            <option value="7">Professional Business Services</option>
                                        </select>
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




            function euro_country()
    {
        return '.$my_bank_to_array.';
    }


          var payment_cur_rate = 1;


    $("#payment_country").change(function()
    {

        if(euro_country()[$(this).val()]!==undefined)
            payment_cur_rate = '.$euro_rate.';

            $("#payment_amount").trigger("input");

    });


    $("#payment_amount").on("input",function()
    {

        var val = $(this).val() * 100;
        var cur_code = "USD";

        if($("#payment_country").val()=="" && val>0)
        {
            $("#payment_amount_convert").removeClass("text-info");
            $("#payment_amount_convert").addClass("text-danger");
            $("#payment_amount_convert").html("Please choose bank account first");
        }

        else if(val>0)
        {

        if(val>'.$userdata->balance.')
        {
            $("#payment_amount_convert").removeClass("text-info");
            $("#payment_amount_convert").addClass("text-danger");
        $("#payment_amount_convert").html("The payment amount exceeds the balance");
        }
        else
        {
            if(payment_cur_rate != 1)
            cur_code = "EURO";



            $("#payment_amount_convert").removeClass("text-danger");
            $("#payment_amount_convert").addClass("text-info");
        $("#payment_amount_convert").html("Will receive: "+((val*payment_cur_rate)/100).toFixed(2) + " "+cur_code);
        }
    }
    else
    $("#payment_amount_convert").html("");

    });

        </script>
        ';
    }
    else
         return parent::get_error_msg('We are unable to process your request at the moment! Please try again later.');
    }

    }


    public function send_paymentdo(send_payment $request)
    {
        $whichBalance = $request->whichBalance;
        $bank_account = $request->bank_account;
        $sendAmount = $request->sendAmount;
        $purpose = $request->purpose;
        $confirm = $request->confirm;

        $mydata = parent::get_auth_user();

        $setting = parent::get_setting();


        $payment_bank_table = parent::get_paymentBank_table();

        $check_bank_account = $payment_bank_table->where('refer',$mydata->id)->where('id',$bank_account)->first();

        if(!isset($check_bank_account->id))
            return parent::get_error_msg('The bank account you used was not valid!');


          if(parent::currency_update() == 1)
            {

                $currency_data = json_decode(parent::get_setting()->currency_data);

                $euro_rate = $currency_data->quotes->USDEUR;

                 $unpack_sendAmount = parent::unpack_balance($sendAmount);


                if(isset(parent::sepa_payment_country()[$check_bank_account->bank_country]))
                {
                    $bank_currency = 'EUR';
                    $actual_send_amount = $unpack_sendAmount * $euro_rate;
                }
                else
                {
                    $bank_currency = 'USD';
                    $actual_send_amount = $unpack_sendAmount;
                }

                // fees
                $actual_send_amount = parent::fetch_balance($actual_send_amount);
                $send_fees = parent::fetch_balance($setting->payment_fees);
                $send_amount = parent::fetch_balance($unpack_sendAmount);
                $total_amount = parent::fetch_balance($setting->payment_fees + $unpack_sendAmount);

                 

                if($confirm!=1)

                   return '<script>
                $("#preview_result").html(\'<ul class="list-group list-group-flush">\' +
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Bank Name</strong>\'+
                                        \'<span class="mb-0">'.$check_bank_account->bank_name.'</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Bank Country</strong>\'+
                                        \'<span class="mb-0">'.$check_bank_account->bank_country.'</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Purpose</strong>\'+
                                        \'<span class="mb-0">'.parent::send_payment_purpose()[$purpose].'</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Amount:</strong>\'+
                                        \'<span class="mb-0">$'.$send_amount.' <i class="m-1 fa fa-arrow-right text-info"></i> '.$actual_send_amount.' '.$bank_currency.' </span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Fees</strong>\'+
                                        \'<span class="mb-0">$'.$send_fees.'</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Total</strong>\'+
                                        \'<span class="mb-0 text-success">$'.$total_amount.'</span>\'+
                                    \'</li>\'+

                                \'</ul>\');

                                        $("#payment_confirm_modal").modal("show");
                                         $("#previewMsg").html("");
                                        $("#payment_confirm_input").val("1");
                                      

                </script>';

                else
                {

                    $tran_details = array('bank'=>$check_bank_account,'purpose'=>$purpose,'send_amount'=>$send_amount,'actual_amount'=>$actual_send_amount,'send_currency'=>'USD','actual_send_currency'=>'EUR','fees'=>$send_fees,'total_amount'=>$total_amount);


                    

                    $unpack_total_amount = $setting->payment_fees + $unpack_sendAmount;

                     // adjust balance

                      $adjust_balance = parent::adjust_balance($mydata->id,2,$unpack_total_amount);

                      if($adjust_balance == 1)
                      {
                         

                         $send_payment_api = parent::airwallex_send_payment_api($check_bank_account,$actual_send_amount,$purpose);

                         if($send_payment_api ==1)
                         {

                         // insert transaction
                         parent::insert_transaction(7,$unpack_total_amount,$mydata->balance,($mydata->balance-$unpack_total_amount),1,$mydata->id,json_encode($tran_details));


                           return '<script>
                    
                $("#payment_confirm_input").val("0")
                $("#payment_confirm_modal").modal("hide");
                swal("Payment Sent", "You have sent '.$actual_send_amount.' '.$bank_currency.' successfully to '.$check_bank_account->bank_name.'", "success");
                </script>';
                    }
                    else
                    {
                        $adjust_balance = parent::adjust_balance($mydata->id,1,$unpack_total_amount);

                         return parent::get_error_msg('We are unable to process your request at the moment! Please try again later.');

                    }


                          }
                          else
                            return parent::get_error_msg('We are unable to process your request at the moment! Please try again later.');

                
                }
            }
                else
                    return parent::get_error_msg('We are unable to process your request at the moment! Please try again later.');


    }
}
