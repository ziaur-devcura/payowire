<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class home extends Controller
{
    public function viewHome()
    {

        $getUser = parent::get_auth_user();

        $setting = parent::get_setting();

        return view('user/dashboard')
        ->with('userData',$getUser)
        ->with('pageTitle','Dashboard | Payowire')
        ->with('pageName','Dashboard')
        ->with('setting',$setting)
        ->with('userBalance',parent::fetch_balance($getUser->balance));
    }

    public function signupView()
    {

        $header = '<title>Payowire - Registration </title>';

                return view('frontend/signup')
                ->with('header',$header);
    }

    public function logout(Request $request)
    {

        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->route('login');

    }
}
