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
            else if($card->type == 1)
                $card->brand = '<img src="'.asset('backend/images/visa_color.png').'" height="auto" width="45px" alt="visa logo"></span>';

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

        return parent::get_view('user/cardlist','Create List | Payowire','Card List')
        ->with('get_all_card',$get_all_card);
    }
}
