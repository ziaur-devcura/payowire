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
use App\Models\cardModel;
use App\Models\gatewayModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $return_setting;
    private $return_auth_user;
    private $return_mod_BankAccount;
    private $return_mod_User;
    private $return_user_id;
    private $return_setting_table;
    private $return_card_table;
    private $return_gateway_table;
    private $return_karta_gateway;

    public function get_setting()
    {

        if($this->return_setting == null)
            $this->return_setting = setting::where('id','1')->first();

        return $this->return_setting;

    }

     public function get_setting_table()
    {

        if($this->return_setting_table == null)
            $this->return_setting_table = new setting();

        return $this->return_setting_table;

    }

    // gateway table


     public function get_gateway_table()
    {

        if($this->return_gateway_table == null)
            $this->return_gateway_table = new gatewayModel();

        return $this->return_gateway_table;

    }

    // karta gateway

    public function get_karta_gateway()
    {

        return $this->get_gateway_table()->where('name','karta')->first();

    }

     public function get_card_table()
    {

        if($this->return_card_table == null)
            $this->return_card_table = new cardModel();

        return $this->return_card_table;

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


    public function get_success_msg($msg,$extra='')
    {
        return ' <div class="alert alert-success  fade show">
                            
                                    <strong>Success!</strong> '.$msg.'
                                </div>'.$extra.'';
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


    public function call_curl($url,$header="",$method='POST',$data="")
    {

  
        $ch = curl_init($url);
        if(isset($data))
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        if(isset($method))
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if(isset($header))
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }


        public function create_visa_card_karta_api($data)
    {

        if($this->update_token())
        {

            $gateway = $this->get_karta_gateway();


        $url = 'https://api.karta.io/api/public/v1/card/';

         $headers = array(
        'Content-type: application/json',
        'accept: application/json',
        'Authorization: Bearer '.$gateway['access_token'].''
            );

        $response = $this->call_curl($url,$headers,'POST',$data);

        return $response;

        }
        else
            return null;

    }


         public function get_visa_card_karta_api($cardid,$data)
    {

         

        if($this->update_token())
        {

        $setting = $this->get_karta_gateway();
        

        $url = 'https://api.karta.io/api/public/v1/card/'.$cardid.'/credentials/';

         $headers = array(
        'Content-type: application/json',
        'accept: application/json',
        'Authorization: Bearer '.$setting['access_token'].''
            );

        return $this->call_curl($url,$headers,'GET','');

        }
        else
            return null;

    }

    public function karta_gateway_api_exception($exception)
    {

        
            if(isset($exception->details))
                return '<div class="alert alert-danger alert-dismissible" role="alert">'.$exception->details.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            else
                return '<div class="alert alert-danger alert-dismissible" role="alert">Something went wrong! Please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';


    }

    private function update_token()
    {
        $setting = $this->get_karta_gateway();
        
        if(isset($setting->refresh_token) && $this->check_token($setting->access_token))
        {

            $gateway_table = $this->get_gateway_table();

        $url = 'https://api.karta.io/api/v1/app/core/user/refresh_public_api_token/';

        $headers = array(
        'Content-type: application/json',
        'accept: application/json'
            );
        $data['refresh_token'] = $setting->refresh_token;
        
        $response= json_decode($this->call_curl($url,$headers,'POST',$data));


        if(isset($response->access_token))
        {
            if($gateway_table->where('name','karta')->update(['access_token' => $response->access_token]))
                return 1;
            else return 0;
        }
        else
            return 0;

        }
        else
            return 1;

    }

    private function check_token($access_token)
    {

        if(!empty($access_token))
        {

            $url = 'https://api.karta.io/api/public/v1/card/1/';

            $headers = array(
        'Content-type: application/json',
        'accept: application/json',
        'Authorization: Bearer '.$access_token.''
            );

            $result = json_decode($this->call_curl($url,$headers,'GET'));


        if(isset($result->detail) && $result->detail == 'Token has expired.')
            return 1;
        else
            return 0;

     }
     else
        return 1;


    }


}
