<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\user\setting;
use Illuminate\Support\Facades\Auth;
use App\Models\user\BankAccount;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $return_setting;
    private $return_auth_user;
    private $return_mod_BankAccount;
    private $return_mod_User;
    private $return_user_id;

    public function get_setting()
    {

        if($this->return_setting == null)
            $this->return_setting = setting::where('id','1')->first();

        return $this->return_setting;

    }

    public function get_auth_user()
    {

        if($this->return_auth_user == null)
            $this->return_auth_user = Auth::user();

        return $this->return_auth_user;

    }

    public function get_all_bank_code()
    {
        return array("us"=>"USA (USD)","hk"=>"Hongkong (HKD/EUR)","gb"=>"UK (GBP)","jp"=>"Japan (JPY)","ca"=>"Canada (CAD)","au"=>"Australia (AUD)","sg"=>"Singapore (SGD)","ee"=>"Estonia (EUR)","nz"=>"New Zealand (NZD)");
    }

    public function get_error_msg($msg)
    {
        return ' <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                    <strong>Sorry!</strong> '.$msg.'
                                </div>';
    }


    public function get_success_msg($msg)
    {
        return ' <div class="alert alert-success  fade show">
                            
                                    <strong>Success!</strong> '.$msg.'
                                </div>';
    }

    public function get_all_bank_info()
    {
        $bank_array = array(
        "us"=> array("name"=>"USA (USD)","flg"=>"us"),
        "eu"=> array("name"=>"Eurozone (EUR)","flg"=>"eu"),
        "gb"=> array("name"=>"UK (GBP)","flg"=>"gb"),
        "jp"=> array("name"=>"Japan (JPY)","flg"=>"jp"),
        "ca"=> array("name"=>"Canada (CAD)","flg"=>"ca"),
        "au"=> array("name"=>"Australia (AUD)","flg"=>"au"),
        "sg"=> array("name"=>"Singapore (SGD)","flg"=>"jp"),
        "jp"=> array("name"=>"Japan (JPY)","flg"=>"jp"),
        "jp"=> array("name"=>"Japan (JPY)","flg"=>"jp")

    );
        return array("us"=>"USA (USD)","hk"=>"Hongkong (HKD/EUR)","gb"=>"UK (GBP)","jp"=>"Japan (JPY)","ca"=>"Canada (CAD)","au"=>"Australia (AUD)","sg"=>"Singapore (SGD)","ee"=>"Estonia (EUR)","nz"=>"New Zealand (NZD)");
    }

    public function get_mod_BankAccount()
    {
         if($this->return_mod_BankAccount == null)
            $this->return_mod_BankAccount = new BankAccount();

        return $this->return_mod_BankAccount;
    }

    public function fetch_balance($amount)
    {

        if(!empty($amount))
        return $amount/100;
        else
            return null;
    }

    public function unpack_balance($amount)
    {
        if(!empty($amount))
        return $amount*100;
        else
            return null;
    }

    public function get_mod_User()
    {
         if($this->return_mod_User == null)
            $this->return_mod_User = new User();
        
        return $this->return_mod_User;
    }

    public function get_user_id()
    {
        if($this->return_user_id == null)
            $this->return_user_id = $this->get_auth_user()->id;

        return $this->return_user_id;
    }

    public function get_view($blade_file,$title,$header)
    {
        return view($blade_file)
        ->with('pageTitle',$title)
        ->with('pageName',$header)
        ->with('userData',$this->get_auth_user());
    }


}
