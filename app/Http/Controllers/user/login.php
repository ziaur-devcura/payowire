<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class login extends Controller
{
    public function loginView(Request $data)
    {
        if(Auth::check())
           return redirect()->route('user_home');
        else
        return view('frontend/login');
    }

    public function logindo(loginRequest $request)
    {

        $username = $request->userEmail;
        $password = $request->userPass;

         if($request->has('remember')){
             $remember = true;
        }
        else
            $remember = false;


         $userdata = array(
          'email' => $username,
          'password' => $password
        );


            if (Auth::attempt($userdata,$remember))

          return '<div class="alert alert-success alert-dismissible" role="alert">Login Successfull<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><script>window.location.replace("./user")</script>';

          else
          
          return '<div class="alert alert-danger alert-dismissible" role="alert">Login failed! Please check your credential<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';


        
    }
}
