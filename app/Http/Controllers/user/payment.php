<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class payment extends Controller
{
    public function paymentView()
    {
        return view('user/payment')
        ->with('pageTitle','Payment | Payowire')
        ->with('pageName','Payment')
        ->with('userData',parent::get_auth_user());
    }
}
