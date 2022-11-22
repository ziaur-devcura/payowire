<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class login extends Controller
{
    public function loginView()
    {
        return view('frontend/login');
    }

    public function logindo()
    {
        
    }
}
