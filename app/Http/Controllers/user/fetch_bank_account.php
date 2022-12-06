<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user\BankAccount;

class fetch_bank_account extends Controller
{
    public function get_bank_account($bankid)
    {


        $myid = parent::get_auth_user()->id;

        $get_bank_details = BankAccount::where('id',$bankid)->where('refer',$myid)->first();

        if(empty($get_bank_details))
            return redirect()->route('user.bank_account')
                    ->with('error','We are unable to process your request at the moment.');

                    if (preg_match_all('~\(\K[^()]*(?=\))~', $get_bank_details->cc_name, $matches)) {
                            $bank_account = $matches[0];

                             $cur_code = $bank_account[0];

                            $bank_account = $cur_code.' Account';


                    }

                    else 
                        {
                            $bank_account = 'Bank Details';
                            $cur_code = '';
                        }



                $usa_bank = '<div class="col-md-6 ms-3 mt-2 me-3">

                               <ul class="card-list mt-4">
                                            <li>Bank name
                                                <span>'.$get_bank_details->name.'
                                                <i id="test" onclick="click_to_copy(this,\''.$get_bank_details->name.'\')" data-toggle="tooltip" data-placement="top" title="Click to copy" class="fa fa-copy pointer"></i>
                                                </span>
                                            </li>
                                            <li>Routing(ABA)<span>'.$get_bank_details->routing.'
                                            <i id="test" onclick="click_to_copy(this,\''.$get_bank_details->routing.'\')" data-toggle="tooltip" data-placement="top" title="Click to copy" class="fa fa-copy pointer"></i>
                                            </span></li>
                                            <li>Account number<span>'.$get_bank_details->account_number.'
                                            <i id="test" onclick="click_to_copy(this,\''.$get_bank_details->account_number.'\')" data-toggle="tooltip" data-placement="top" title="Click to copy" class="fa fa-copy pointer"></i>
                                            </span></li>
                                            <li>Account type<span>'.$get_bank_details->account_type.'
                                            <i id="test" onclick="click_to_copy(this,\''.$get_bank_details->account_type.'\')" data-toggle="tooltip" data-placement="top" title="Click to copy" class="fa fa-copy pointer"></i>
                                            </span></li>
                                            <li>Beneficiary name<span>'.$get_bank_details->beneficiary_name.'
                                            <i id="test" onclick="click_to_copy(this,\''.$get_bank_details->beneficiary_name.'\')" data-toggle="tooltip" data-placement="top" title="Click to copy" class="fa fa-copy pointer"></i>
                                            </span></li>
                                        </ul>

                            </div>';



                    return parent::get_view('user/bankview','Bank Details | Payowire',$bank_account)
                    ->with('bank_details',$get_bank_details)
                    ->with('cur_code',$cur_code)
                    ->with('bank_collaps',$usa_bank);


        return '
                                    

                             <div class="mt-3">


                            <button type="button" class="btn btn-rounded btn-primary ms-2 mr-2"><span class="btn-icon-start text-primary"><i class="fa fa-money-bill"></i>
                                    </span>Manage Currency</button>
                                    </div>
                                    ';

    }
}
