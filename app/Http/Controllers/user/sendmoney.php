<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\user\sendmoneyReq;


class sendmoney extends Controller
{
    public function sendmoneyView()
    {

        return view('user/sendmoney')
        ->with('pageTitle','Send Money | Payowire')
        ->with('pageName','Send Money')
        ->with('userData',parent::get_auth_user());
    }


    public function sendmoneyDo(sendmoneyReq $request)
    {
        $recipientEmail = $request->recipientEmail;
        $whichBalance = $request->whichBalance;
        $sendAmount = $request->sendAmount;
        $purpose = $request->purpose;
        $confirm = $request->confirm;

        if($sendAmount<0 || !is_numeric($sendAmount) || !preg_match('/^[0-9]+(\\.[0-9]+)?$/', $sendAmount))
            return parent::get_error_msg('Please enter a valid amount!');

        $userTable = parent::get_mod_User();

        $check_recipient = $userTable->where('email',$recipientEmail)->first();

        $my_email = parent::get_auth_user()->email;

        if($recipientEmail == $my_email)
            return parent::get_error_msg('You cannot send money to yourself');


        if(!isset($check_recipient->id)|| empty($check_recipient->id))
            return parent::get_error_msg('Recipient not found with given recipient email address');
        else
        {

            $my_user_table = $userTable->where('id',parent::get_auth_user()->id);

            $recipient_user_table = $userTable->where('email',$recipientEmail);


            $mydata = $my_user_table->first();

            $get_my_balance = parent::fetch_balance($mydata->balance);

                if(!$get_my_balance>0)
                    return parent::get_error_msg('You do not have sufficient funds to make this request!');

                else if($get_my_balance<$sendAmount)
                    return parent::get_error_msg('You do not have sufficient funds to make this request!');


            $payamount = parent::unpack_balance($sendAmount);

            $setting = parent::get_setting();

            if(isset($setting->send_money_fees) && $setting->send_money_fees >0)
            $fees = parent::unpack_balance($setting->send_money_fees);

            else
                return parent::get_error_msg('Something went wrong! Please try again later.');

            $fees = parent::fetch_balance(($payamount * $fees) /100);

            $total = parent::fetch_balance($payamount + $fees);



            if(isset($confirm) && $confirm==1)
            {

                $my_balance = $mydata->balance;

                $adjust_fund = $my_balance - parent::unpack_balance($total);



                $balance_adj_query = tap($my_user_table)->update(['balance' => $adjust_fund])->first();

                if($adjust_fund == $balance_adj_query->balance)
                    {

                        $recipient_balance = $check_recipient->balance;
                        $adjust_recipient_balance = $recipient_balance + parent::unpack_balance($sendAmount);
                        $balance_adj_query = tap($recipient_user_table)->update(['balance' => $adjust_recipient_balance])->first();

                        if($adjust_recipient_balance == $balance_adj_query->balance)
                        {

                         return '<script>
                         close_preview(1,"#sendmoneyPreview","#sendmoneyForm","#sendmoneyMsg");
                         $("#successModal").modal("show");
                         </script>';

                        }
                        else
                            return parent::get_error_msg('Something went wrong! Please try again.');
               
                }
            else
                return parent::get_error_msg('Something went wrong! Please try again.');


            }
            else
            {


                if(empty($purpose))
                    $purpose = '--';



                return '<script>
                $("#sendmoneyPreview").modal("hide");
                $("#preview_result").html(\'<ul class="list-group list-group-flush">\' +
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Recipient Name:</strong>\'+
                                        \'<span class="mb-0">'.$check_recipient->name.'</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Recipient Email:</strong>\'+
                                        \'<span class="mb-0">'.$check_recipient->email.'</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Amount:</strong>\'+
                                        \'<span class="mb-0">'.$sendAmount.' USD</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Fees</strong>\'+
                                        \'<span class="mb-0">'.$setting->send_money_fees.' USD</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Reference</strong>\'+
                                        \'<span class="mb-0">'.$purpose.'</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Total</strong>\'+
                                        \'<span class="mb-0">'.$total.' USD</span>\'+
                                    \'</li>\'+

                                \'</ul>\');

                                        $("#sendmoneyPreview").modal("show");
                                         $("#previewMsg").html("");

                                        $("#sendmoneyForm").prepend(\'<input type="hidden" name="confirm" value="1">\');

                </script>';
            }

        }

    }

}
