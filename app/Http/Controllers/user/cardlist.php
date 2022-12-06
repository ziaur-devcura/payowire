<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class cardlist extends Controller
{
    public function cardlistView()
    {

        $cardTable = parent::get_card_table();

        $user = parent::get_auth_user();

        $get_all_card = $cardTable->where('refer',$user->id)->paginate(10);

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
        ->with('get_all_card',$get_all_card);
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

        $card->status = $response->status;


        


        //card brand

        if($card->type == 1)
            $card->brand = 'Visa Card';
        else if($card->type == 2)
            $card->brand = 'Master Card';

        //

        if($card->package == 1)
            $card->package = '<span class="badge badge-sm badge-info pb-1">Debit</span>';
        else if($card->package == 2)
            $card->package = '<span class="badge badge-sm badge-info pb-1">Business Debit</span>';

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
}
