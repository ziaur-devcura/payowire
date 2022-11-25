<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\login;
use App\Http\Controllers\user\home;
use App\Http\Controllers\user\bank_account;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


###################
#				  #
# Frontend pages  #
#				  #
###################

Route::get('/login', [login::class,'loginView'])->name('login');

Route::post('/logindo', [login::class,'logindo'])->name('logindo');


###################
#				  #
# User Portal	  #
#				  #
###################

Route::get('/user/home', [home::class,'viewHome'])->middleware('userAuth')->name('user_home');
Route::get('/user', [home::class,'viewHome'])->middleware('userAuth')->name('user_home');
Route::get('/bankAccount', [bank_account::class,'viewBankAccount'])->middleware('userAuth')->name('user.bank_account');


###################
#				  #
# User Backend 	  #
#				  #
###################


