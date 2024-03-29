<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\login;
use App\Http\Controllers\user\home;
use App\Http\Controllers\user\bank_account;
use App\Http\Controllers\user\fetch_bank_account;
use App\Http\Controllers\user\sendmoney;
use App\Http\Controllers\user\payment;
use App\Http\Controllers\user\create_card;
use App\Http\Controllers\user\cardlist;
use App\Http\Controllers\user\transaction;

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

Route::get('/', [login::class,'homeView'])->name('homeview');
Route::get('/globalAccount', [login::class,'global_account_view'])->name('globalAccount');
Route::get('/receiveMoney', [login::class,'receive_money_view'])->name('receiveMoney');
Route::get('/sendMoney', [login::class,'send_money_view'])->name('sendMoney');
Route::get('/bankWithdraw', [login::class,'bank_withdraw_view'])->name('bankWithdraw');
Route::get('/virtualcard', [login::class,'virtualcard_view'])->name('virtualcard');
Route::get('/virtualMastercard', [login::class,'virtual_mastercard_view'])->name('virtualMastercard');
Route::get('/virtualVisacard', [login::class,'virtual_visacard_view'])->name('virtualVisacard');
Route::get('/physicalcard', [login::class,'physical_card_view'])->name('physicalcard');
Route::get('/pricing', [login::class,'pricing_view'])->name('pricing');
Route::get('/about', [login::class,'about_view'])->name('about');
Route::get('/contact', [login::class,'contact_view'])->name('contact');
Route::get('/cards', [login::class,'cards_view'])->name('cards');
Route::get('/payment', [login::class,'payment_view'])->name('payment');
Route::get('/faq', [login::class,'faq_view'])->name('faq');
Route::get('/terms', [login::class,'terms_view'])->name('terms');
Route::get('/policy', [login::class,'policy_view'])->name('policy');
Route::get('/aml', [login::class,'aml_view'])->name('aml');
Route::get('/unsubscribe', [login::class,'unsubscribe_view'])->name('unsubscribe');


Route::get('/login', [login::class,'loginView'])->name('login');
Route::get('/register', [home::class,'signupView'])->name('signup');
Route::get('/user_logout', [home::class,'logout'])->name('user_logout');
Route::post('/logindo', [login::class,'logindo'])->middleware('XssProtection')->name('logindo');
Route::post('/signupdo', [login::class,'signupdo'])->middleware('XssProtection')->name('signupdo');
Route::get('/activate_account/{code}', [login::class,'activate_account'])->name('activate_account');

###################
#				  #
# User Portal	  #
#				  #
###################

Route::get('/user/home', [home::class,'viewHome'])->middleware('userAuth')->name('user_home');
Route::get('/user', [home::class,'viewHome'])->middleware('userAuth')->name('user_home');
Route::get('/user/bankAccount', [bank_account::class,'viewBankAccount'])->middleware('userAuth')->name('user.bank_account');
Route::get('/user/bankAccount/{id}', [fetch_bank_account::class,'get_bank_account'])->middleware('userAuth')->name('user.bankview');
Route::get('/user/sendmoney', [sendmoney::class,'sendmoneyView'])->middleware('userAuth')->name('user.sendmoney');
Route::get('/user/payment', [payment::class,'paymentView'])->middleware('userAuth')->name('user.payment');
Route::get('/user/createCard', [create_card::class,'create_cardView'])->middleware('userAuth')->name('user.create_card');
Route::get('/user/cardlist', [cardlist::class,'cardlistView'])->middleware('userAuth')->name('user.cardlist');
Route::get('/user/cardlist/{id}', [cardlist::class,'viewCardDetails'])->middleware('userAuth')->name('user.cardview');
Route::get('/user/transaction', [transaction::class,'transactionView'])->middleware('userAuth')->name('user.transaction');

###################
#				  #
# User Backend 	  #
#				  #
###################

Route::post('/user/bankAccount/get_bank', [bank_account::class,'request_bank'])->middleware('userAuth','XssProtection')->name('user.request_bank');
Route::post('/user/sendmoney/send', [sendmoney::class,'sendmoneyDo'])->middleware('userAuth','XssProtection')->name('user.sendmoneydo');
Route::post('/user/createCard/createVisaCard', [create_card::class,'craete_visa_card'])->middleware('userAuth','XssProtection')->name('user.new_visa_card');
Route::post('/user/createCard/createMasterCard', [create_card::class,'craete_master_card'])->middleware('userAuth','XssProtection')->name('user.new_master_card');
Route::get('/user/cardlist/freeze/{id}', [cardlist::class,'update_card'])->middleware('userAuth','XssProtection')->name('user.update_card.status');
Route::post('/user/cardlist/add_fund/{id}', [cardlist::class,'update_card'])->middleware('userAuth','XssProtection')->name('user.update_card.addfund');
Route::post('/user/cardlist/remove_fund/{id}', [cardlist::class,'update_card'])->middleware('userAuth','XssProtection')->name('user.update_card.removefund');
Route::post('/user/payment/make', [payment::class,'add_bank_payment'])->middleware('userAuth','XssProtection')->name('user.make_payment');
Route::post('/user/payment/fetch_bank/{id}', [payment::class,'fetch_payment_bank'])->middleware('userAuth','XssProtection')->name('user.payment.fetch_bank');
Route::post('/user/payment/sendpaymentdo', [payment::class,'send_paymentdo'])->middleware('userAuth','XssProtection')->name('user.payment.send');




