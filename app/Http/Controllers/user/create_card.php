<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class create_card extends Controller
{
    public function create_cardView()
    {
        return parent::get_view('user/create_card','Create Card | Payowire','Create Card');
    }
}
