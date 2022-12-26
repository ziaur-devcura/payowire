<?php

namespace App\Http\Controllers\user;

use all_api_interface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\user\card_add_fund;

class cardlist extends Controller
{
    public function cardlistView()
    {

        $cardTable = parent::get_card_table();

        $user = parent::get_auth_user();

        $get_all_card = $cardTable->where('refer',$user->id)->orderBy('id','DESC')->paginate(10);

        $count_total_card = $cardTable->where('refer',$user->id)->count();
        $count_visa_card = $cardTable->where('refer',$user->id)->where('type',1)->count();
        $count_master_card = $cardTable->where('refer',$user->id)->where('type',2)->count();

        foreach ($get_all_card as $card) {

            // card brand
            
            if($card->type == 1)
                $card->brand = '<img src="'.asset('backend/images/visa_color.png').'" height="auto" width="45px" alt="visa logo"></span>';
            else if($card->type == 2)
                $card->brand = '<img src="'.asset('backend/images/master_color.png').'" height="auto" width="45px" alt="visa logo"></span>';

            // card package
            if($card->package == 1)
            {
                $card->package = 'Debit';
                $card->bg_url = asset('backend/images/card/1.jpg');
            }
            else if($card->package == 2)
            {
                $card->package = 'Business Debit';
                $card->bg_url = asset('backend/images/card/4.jpg');
            }

            $card->last_4_digit = substr($card->card_number, -4);



        }

        return parent::get_view('user/cardlist','Card List | Payowire','Card List')
        ->with('get_all_card',$get_all_card)
        ->with('count_total_card',$count_total_card)
        ->with('count_visa_card',$count_visa_card)
        ->with('count_master_card',$count_master_card);
    }



    public function viewCardDetails($id)
    {

        $user = parent::get_auth_user();


        $card = parent::get_card_table()->where('id',$id)->where('refer',$user->id)->first();

        if(!isset($card->id))
            return redirect()->route('user.cardlist')
                    ->with('error','We are unable to process your request at the moment.');


                    //card info

        $response = parent::fetch_visa_card_data_karta_api($card->sid);
        $response= json_decode($response);


       


        if(!isset($response->id))
            return redirect()->route('user.cardlist')
                    ->with('error','We are unable to process your request at the moment.');


        $card_limit = $response->limits;


        $card->balance = parent::fetch_balance(parent::unpack_balance($card_limit[0]->value) - parent::unpack_balance($card_limit[0]->spend));

        $card->status_code = $response->status;

        $card->status = $response->status;


        


        //card brand

        if($card->type == 1)
            $card->brand = 'Visa Card';
        else if($card->type == 2)
            $card->brand = 'Master Card';


        //card status 

        if($card->status == 'ACTIVE')
        {
            $card->status = '<span class="badge light badge-success justify-content-center">ACTIVE</span>';
            $card->status_toollip = 'Freeze card';
        }
        else if($card->status == 'PAUSED')
        {
            $card->status = '<span class="badge light badge-warning justify-content-center">PAUSED</span>';
            $card->status_toollip = 'Unfreeze card';
        }

        //

        if($card->package == 1)
            $card->package = '<span class="badge badge-sm badge-info pb-1 ms-2">Debit</span>';
        else if($card->package == 2)
            $card->package = '<span class="badge badge-sm badge-info pb-1 ms-2">Business Debit</span>';

        $card->number =  wordwrap($card->card_number , 4 , ' ' , true);


        // card transaction

        $response = parent::card_transaction_karta_api($card->sid);
        $response= json_decode($response);


        foreach ($response->results as $transaction) {
            
            if(!empty($transaction->status))
            {

                switch ($transaction->status) {
                    case 'AUTHORIZED':
                        $transaction->status = '<span class="badge badge-warning">Pending</span>';
                        break;

                    case 'SETTLED':
                         $transaction->status = '<span class="badge badge-success">Completed</span>';
                         break;

                    case 'FAILED':
                         $transaction->status = '<span class="badge badge-danger">Failed</span>';
                         break;

                    
                    default:
                        $transaction->status = '<span class="badge badge-light">'.$transaction->status.'</span>';
                        break;
                }
            }
        }


        return parent::get_view('user/cardview','Card Details | Payowire','Card Details')
        ->with('card',$card)
        ->with('card_transaction',$response->results);



    }



    public function update_card($cardid, card_add_fund $request)
    {

        $status = $request->status;
        $cardAmount = $request->cardAmount;
        $cardAmountw = $request->cardAmountw;

        $user = parent::get_auth_user();


        $card = parent::get_card_table()->where('id',$cardid)->where('refer',$user->id)->first();

        if(!isset($card->id))
            return redirect()->route('user.cardview',$cardid)
                    ->with('error','We are unable to process your request at the moment. Try again later.');

        $my_balance = parent::unpack_balance($user->balance);


     // ######### UPDATE CARD STATUS ##################


        if(isset($status))
        {

        if($status == 'ACTIVE')
            $update_status = 'PAUSED';
        else if($status == 'PAUSED')
            $update_status = 'ACTIVE';
        else
            return redirect()->route('user.cardview',$cardid)
                    ->with('terror','We are unable to process your request at the moment. Try again later.');

        // update card

        $response = parent::update_card_karta_api($card->sid,$update_status,$cardAmount);
        $response= json_decode($response);


        if(isset($response->status))
            return redirect()->route('user.cardview',$cardid)
                    ->with('tsuccess','Your card was updated successfully!');

        else
            return redirect()->route('user.cardview',$cardid)
                    ->with('terror','We are unable to update your card at the moment. Try again later.');

        }


        // ######### UPDATE CARD BALANCE ##################

        else if(isset($cardAmount))
        {
            if($cardAmount<0 || !is_numeric($cardAmount) || !preg_match('/^[0-9]+(\\.[0-9]+)?$/', $cardAmount))
            return parent::get_error_msg('Please enter a valid usd amount!');

            $card_pack = $card->package;

            $remaining_limit = $card->load_amount;


            $now_card_load = parent::unpack_balance($cardAmount);

            $remaining_limit = parent::unpack_balance(5000) - $remaining_limit;

            if($remaining_limit<0)
                return parent::get_error_msg('Your card has reach top-up limit!');


            if($card_pack == 1 && $now_card_load>$remaining_limit)
                    return parent::get_error_msg('Card amount exceeding the spending limit');



            if($now_card_load>$my_balance)
                return parent::get_error_msg('You do not have sufficient funds to make this request!');


            // adjust balance


                    $adjust_balance = parent::adjust_balance($user->id,2,$now_card_load);

                    if($adjust_balance == 1)
                    {

                        $adjust_card_load = parent::adjust_card_load($cardid,1,$now_card_load);



                                   //card info

        $response = parent::fetch_visa_card_data_karta_api($card->sid);
        $response= json_decode($response);

        if(!isset($response->id))
        {
            parent::adjust_balance($user->id,1,$now_card_load);
            return parent::get_error_msg('We are unable to process your request at the moment.Try again later');
        }


        $card_limit = $response->limits;

        //$currenct_card_balance = parent::unpack_balance($card_limit[0]->value) - parent::unpack_balance($card_limit[0]->spend);

        $total_card_limit = parent::fetch_balance(parent::unpack_balance($card_limit[0]->value) + $now_card_load);


                        // update card limit


                 $response = parent::update_card_karta_api($card->sid,'',$total_card_limit);
                 $response= json_decode($response);
                
                 if(isset($response->limits))
                 {

                    // insert transaction
                    parent::insert_transaction(4,$now_card_load,$user->balance,($user->balance-$now_card_load),1,$user->id);

                    return parent::get_success_msg('The fund has been added to your card successfully!').'<script>
                                                            document.getElementById("addfundForm").reset();
                                                            location.reload();
                                                            </script>';

                                                        }
           

        else 
        {
            parent::adjust_balance($user->id,1,$now_card_load);
            parent::adjust_card_load($cardid,2,$now_card_load);

            return parent::get_error_msg('We are unable to process your request at the moment.Try again later.');
        }





                    }



        }

        // ######### Withdraw CARD BALANCE ##################

        else if(isset($cardAmountw))
        {

             if($cardAmountw<0 || !is_numeric($cardAmountw) || !preg_match('/^[0-9]+(\\.[0-9]+)?$/', $cardAmountw))
            return parent::get_error_msg('Please enter a valid usd amount!');

            $now_card_withdraw = parent::unpack_balance($cardAmountw);

                       //fetch card balance

        $response = parent::fetch_visa_card_data_karta_api($card->sid);
        $response= json_decode($response);

        if(!isset($response->id))
            return parent::get_error_msg('We are unable to process your request at the moment.Try again later.');

         $card_limit = $response->limits;

         $limit_value = $card_limit[0]->value;
         $spend_value = $card_limit[0]->spend;

         $card_balance = parent::unpack_balance($limit_value) - parent::unpack_balance($spend_value);

         if($now_card_withdraw>$card_balance)
            return parent::get_error_msg('Withdraw amount exceeding the withdraw limit');

        $new_card_limit = parent::unpack_balance($limit_value) - $now_card_withdraw;

        if($new_card_limit<0)
             return parent::get_error_msg('We are unable to process your request at the moment.Try again later.');

         $new_card_limit = parent::fetch_balance($new_card_limit);



        // adjust limit


                                $response = parent::update_card_karta_api($card->sid,'',$new_card_limit);
                 $response= json_decode($response);
                
                 if(isset($response->limits))
                 {

                    // adjust balance

                      $adjust_balance = parent::adjust_balance($user->id,1,$now_card_withdraw);

                    if($adjust_balance == 1)
                    {

                        // insert transaction
                    parent::insert_transaction(5,$now_card_withdraw,$user->balance,($user->balance+$now_card_withdraw),1,$user->id);
                    

                    return parent::get_success_msg('The fund has been withdraw to your account balance successfully!').'<script>
                                                            document.getElementById("withdrawfundForm").reset();
                                                            location.reload();
                                                            </script>';
                                                        }



                        else 
                            return parent::get_error_msg('We are unable to process your request at the moment.Try again later.');
                        

                 }
                 else
                    return parent::get_error_msg('We are unable to process your request at the moment.Try again later.');

        }

    }


}
