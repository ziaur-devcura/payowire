<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class home extends Controller
{
    public function viewHome()
    {
        $getUser = Auth::user();

        return view('user/dashboard')
        ->with('userData',$getUser)
        ->with('pageTitle','Dashboard | Payowire')
        ->with('pageName','Dashboard');
    }
}
