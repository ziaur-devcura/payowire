<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user\BankAccount;

class bank_account extends Controller
{

     public function viewBankAccount()
    {
        $getUser = parent::get_auth_user();

        $bank_country = parent::get_all_bank_code();

        $myid = $getUser->id;

        $get_my_banks = parent::get_mod_BankAccount()->where('refer',$myid)->get();

        $my_pending_bank = [];


        foreach ($get_my_banks as $bank) {

            if($bank->status == '2')
                array_push($my_pending_bank, $bank);
        }




        foreach ($get_my_banks as $bank) {

            unset($bank_country[$bank->flag_code]);
            
        }
        


        return view('user/bank_account')
        ->with('userData',$getUser)
        ->with('pageTitle','Bank Account | Payowire')
        ->with('pageName','Bank Account')
        ->with('all_bank_country',$bank_country)
        ->with('my_banks',$get_my_banks)
        ->with('my_pending_banks',$my_pending_bank);
    }


    public function request_bank(Request $request)
    {

        $get_bank_code = $request->bcode;
        $confirm = $request->confirm;

        if(empty($get_bank_code))
            return parent::get_error_msg('Please select country to request the bank account.');

        $get_all_bank_code = parent::get_all_bank_code();

        if(!array_key_exists($get_bank_code, $get_all_bank_code))
            return parent::get_error_msg('We are unable to process your request. Please contact with support!');
         
        else
            {

                 $selected_bank_country = $get_all_bank_code[$get_bank_code];


                if(isset($confirm) && $confirm == '1')
                {

               
                $country = explode("(", $selected_bank_country);
                $country = trim($country[0]);

                $request_bank = parent::get_mod_BankAccount();

                $auth_user = parent::get_auth_user();

                $request_bank->account = $country;
                $request_bank->cc_name = $selected_bank_country;
                $request_bank->beneficiary_name = $auth_user->name;
                $request_bank->refer = $auth_user->id;
                $request_bank->flag_code = $get_bank_code;

                $userTable = parent::get_mod_User()->where('id',$auth_user->id);

                $userTableData = $userTable->first();

                $get_my_balance = parent::fetch_balance($userTableData->balance);

                if(!$get_my_balance>0)
                    return parent::get_error_msg('You do not have sufficient funds to make this request!');

                else if($get_my_balance<100)
                    return parent::get_error_msg('You do not have sufficient funds to make this request!');

                else
                {


                    $adjust_balance = ($userTableData->balance) - parent::unpack_balance(100);


                    $balance_adj_query = tap($userTable)->update(['balance' => $adjust_balance])->first();

                    if($adjust_balance == $balance_adj_query->balance)
                    {

                        
                          if($request_bank->save())
                          {

                            parent::insert_transaction(1,parent::unpack_balance(100),$userTableData->balance,$adjust_balance,1,$auth_user->id);

                    return parent::get_success_msg('We are processing your bank request!').'<script>
                                                            $("#req_bank_confirm").remove();
                                                            location.reload();

                                                        $("#reqBankclick").addClass("d-none");
                                                        $("#reqBankCloseBtn").html("Close");
                                                        
                                                    </script>';

                        }

                else
                    return parent::get_error_msg('We are unable to process your request. Please contact with support!');


                    }
                    else
                        return parent::get_error_msg('We are unable to process your request. Please contact with support!');

              
                }


                }

                else
                    return '<script>
                                                            $("#req_bank_select").addClass("d-none");
                                                            $("#reqBankForm").prepend(\'<div class="mb-3 row" id="req_bank_confirm"><input type="hidden" name="confirm" value="1"><h6 class="text-primary">Your requested <strong>'.$selected_bank_country.'</strong> bank will cost $100. Do you want to continue? </h6></div>\');

                                                        $("#reqBankclick").html("Confirm");
                                                        $("#reqBankCloseBtn").html("Cancel");
                                                        

                                                            $("#reqMsg").html("");
                                                    </script>';

                


            }



    }
}
