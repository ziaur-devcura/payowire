<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bank_account extends Controller
{
     public function viewBankAccount()
    {
        $getUser = Auth::user();

        return view('user/bank_account')
        ->with('userData',$getUser)
        ->with('pageTitle','Bank Account | Payowire')
        ->with('pageName','Bank Account');
    }
}
