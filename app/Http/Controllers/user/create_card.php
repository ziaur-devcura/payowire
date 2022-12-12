<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\user\req_new_card;

class create_card extends Controller
{
    public function create_cardView()
    {
        return parent::get_view('user/create_card','Create Card | Payowire','Create Card');
    }

    public function craete_visa_card(req_new_card $request)
    {

        $cardAmount = $request->cardAmount;
        $cardpack = $request->cardpack;
        $confirm = $request->confirm;

        
        if($cardAmount<0 || !is_numeric($cardAmount) || !preg_match('/^[0-9]+(\\.[0-9]+)?$/', $cardAmount))
            return parent::get_error_msg('Please enter a valid usd amount!');



            $setting = parent::get_setting();

            if($cardpack==1)
            {
                $card_price = parent::unpack_balance($setting->visa_debit_price);
                $card_type= '<span class="badge badge-sm badge-info">Debit</span>';
                $fees = $setting->visa_debit_price;
                $cardPackage = 'Debit';

            }
            else if($cardpack==2)
            {
                $card_price = parent::unpack_balance($setting->visa_business_debit_price);
                $card_type= '<span class="badge badge-sm badge-info">Business Debit</span>';
                $fees = $setting->visa_business_debit_price;
                $cardPackage = 'Business Debit';
            }


            $cardload = parent::unpack_balance($cardAmount);

            $total = $card_price + $cardload;


        if(isset($confirm) && $confirm==1)
        {

            $create_card = $this->karta_visa_card($cardpack,$cardAmount,parent::fetch_balance($total));

        if(!empty($create_card))
        {


            if($create_card == '1')
            {
                // success

                 return '<script>
                         close_preview(1,"#createCardPreview","#visacreateForm","#visaMsg");
                         $("#success_modal_message").html("Your visa <b>'.$cardPackage.'</b> card has been created");
                         $("#successModal").modal("show");
                         </script>';
            }

            else if($create_card == '3')
                return parent::get_error_msg('You do not have sufficient funds to make this request!');
            else if($create_card == '2')
                return parent::get_error_msg('We are unable to process your request at the moment. Please try again later.');
            else
                return parent::karta_gateway_api_exception($create_card);

        }
        else
            return parent::get_error_msg('We are unable to process your request at the moment. Please try again later.');

        }
        else
        {

                   return '<script>
                $("#sendmoneyPreview").modal("hide");
                $("#preview_result").html(\'<ul class="list-group list-group-flush">\' +
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Card Brand:</strong>\'+
                                        \'<span class="mb-0"><img src="'.asset('backend/images/visa_color.png').'" height="auto" width="45px" alt="visa logo"></span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Card Type:</strong>\'+
                                        \'<span class="mb-0">'.$card_type.'</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Amount:</strong>\'+
                                        \'<span class="mb-0">'.$cardAmount.' USD</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Fees</strong>\'+
                                        \'<span class="mb-0">'.$fees.' USD</span>\'+
                                    \'</li>\'+
                                    \'<li class="list-group-item d-flex px-0 justify-content-between">\'+
                                        \'<strong>Total</strong>\'+
                                        \'<span class="mb-0 text-success">'.parent::fetch_balance($total).' USD</span>\'+
                                    \'</li>\'+

                                \'</ul>\');

                                        $("#createCardPreview").modal("show");
                                         $("#previewMsg").html("");

                                        $("#visacreateForm").prepend(\'<input type="hidden" name="confirm" value="1">\');
                                        $("#previewClick1").removeClass("d-none");
                                        $("#previewClick2").addClass("d-none");

                </script>';
            }



    }

    public function craete_master_card(req_new_card $request)
    {
        $cardAmount = $request->cardAmount;
        $cardpack = $request->cardpack;
    }

    private function karta_visa_card($cardpack,$cardAmount,$totalAmount)
    {

        $gateway = parent::get_karta_gateway();

         $user = parent::get_auth_user();


        $data['limits'] = [array('type'=> 'LIFETIME_LIMIT', 'value' => $cardAmount)];
        $data['name'] = $user->name.' '.substr(str_shuffle("abcdefghijklmopqrstuvwxyz"),0,5);
        $data['budget_id'] = $gateway->budget_id;


        // balance check

                $userTable = parent::get_mod_User()->where('id',$user->id);

                $userTableData = $userTable->first();

                $get_my_balance = parent::fetch_balance($userTableData->balance);

                if(!$get_my_balance>0)
                    return 3;

                else if($get_my_balance<$totalAmount)
                    return 3;


        
        $response = parent::create_visa_card_karta_api($data);
        $response= json_decode($response);


        if(isset($response->id))
        {
            $cardid = $response->id;

            $response = parent::get_visa_card_karta_api($cardid,$data);
            $response= json_decode($response);


            if(isset($response->pan))
            {

               $pan = $response->pan; 
               $expiration = $response->expiration; 
               $cvc = $response->cvc;

               $cardload = parent::unpack_balance($cardAmount);

               // balance adjustment

                $adjust_balance = ($userTableData->balance) - parent::unpack_balance($totalAmount);


                    $balance_adj_query = tap($userTable)->update(['balance' => $adjust_balance])->first();

                    if($adjust_balance == $balance_adj_query->balance)
                    {
                

               $create_card = $this->inser_card_database($pan,$expiration,$cvc,1,$cardpack,$user->id,$cardload,1,$cardid);

               if($create_card)
               {
                    // transaction query

                         parent::insert_transaction(3,parent::unpack_balance($totalAmount),parent::unpack_balance($get_my_balance),$adjust_balance,1,$user->id);

                    return 1;
               }
               else
                return 2;
           }
           else
            return 2;

            }
            else
                return $response;

        }

        else
            return $response;

    }

    private function inser_card_database($pan,$expiration,$cvc,$cardtype,$cardpack,$refer,$loadamount,$gateway,$sid)
    {


        return parent::get_card_table()->create([
                'card_number'=> $pan, 
                'card_expire'=>$expiration,
                'card_cvv'=>$cvc,
                'type' => $cardtype,
                'package' => $cardpack,
                'refer' => $refer,
                'load_amount' => $loadamount,
                'gateway' => $gateway,
                'sid'=>$sid
            ]);;

    }
}
