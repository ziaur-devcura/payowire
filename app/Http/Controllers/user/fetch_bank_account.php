<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user\BankAccount;

class fetch_bank_account extends Controller
{
    public function get_bank_account(Request $request)
    {

        $get_bank_id = $request->bid;

        $myid = parent::get_auth_user()->id;

        $get_bank_details = BankAccount::where('id',$get_bank_id)->where('refer',$myid)->first();

        if(empty($get_bank_details))
            abort(503);


        return '
                                    <div class="col-md-6 m-auto">

                                <div class="border border-primary rounded">
                                    <div class="card-header border-0 pb-0">
                                        <div>
                                            <h4 class="card-title mb-2">Account Details ('.$get_bank_details->account.')</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
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
                                    </div>
                                </div>

                            </div>

                             <div class="mt-3">


                            <button type="button" class="btn btn-rounded btn-primary ms-2 mr-2"><span class="btn-icon-start text-primary"><i class="fa fa-money-bill"></i>
                                    </span>Manage Currency</button>
                                    </div>
                                    ';

    }
}
