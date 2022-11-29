<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\login;
use App\Http\Controllers\user\home;
use App\Http\Controllers\user\bank_account;
use App\Http\Controllers\user\fetch_bank_account;
use App\Http\Controllers\user\sendmoney;
use App\Http\Controllers\user\payment;
use App\Http\Controllers\user\create_card;

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

Route::post('/logindo', [login::class,'logindo'])->middleware('XssProtection')->name('logindo');


###################
#				  #
# User Portal	  #
#				  #
###################

Route::get('/user/home', [home::class,'viewHome'])->middleware('userAuth')->name('user_home');
Route::get('/user', [home::class,'viewHome'])->middleware('userAuth')->name('user_home');
Route::get('/user/bankAccount', [bank_account::class,'viewBankAccount'])->middleware('userAuth')->name('user.bank_account');
Route::get('/user/sendmoney', [sendmoney::class,'sendmoneyView'])->middleware('userAuth')->name('user.sendmoney');
Route::get('/user/payment', [payment::class,'paymentView'])->middleware('userAuth')->name('user.payment');
Route::get('/user/crateCard', [create_card::class,'create_cardView'])->middleware('userAuth')->name('user.create_card');


###################
#				  #
# User Backend 	  #
#				  #
###################

Route::post('/user/bankAccount/fetch_bank_account', [fetch_bank_account::class,'get_bank_account'])->middleware('userAuth','XssProtection')->name('user.get_bank');
Route::post('/user/bankAccount/get_bank', [bank_account::class,'request_bank'])->middleware('userAuth','XssProtection')->name('user.request_bank');
Route::post('/user/sendmoney/send', [sendmoney::class,'sendmoneyDo'])->middleware('userAuth','XssProtection')->name('user.sendmoneydo');



