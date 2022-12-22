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
use App\Models\transactionModel;
use App\Models\user\payment_bank;

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
    private $return_transaction_table;
    private $return_paymentBank_table;

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


      public function get_transaction_table()
    {

        if($this->return_transaction_table == null)
            $this->return_transaction_table = new transactionModel();

        return $this->return_transaction_table;

    }


      public function get_paymentBank_table()
    {

        if($this->return_paymentBank_table == null)
            $this->return_paymentBank_table = new payment_bank();

        return $this->return_paymentBank_table;

    }

    // insert payment bank 

    public function insert_payment_bank($bank_type,$bank_country,$recipient_type,$ben_firstname,$ben_lastname,$bank_name,$account_number,$routing_number,$bank_address,$iban,$swift_code,$refer)
    {
        $payment_bank_table = $this->get_paymentBank_table();

         return $payment_bank_table->create([
                'bank_type'=> $bank_type, 
                'bank_country'=>$bank_country,
                'recipient_type'=>$recipient_type,
                'ben_firstname' => $ben_firstname,
                'ben_lastname' => $ben_lastname,
                'bank_name' => $bank_name,
                'account_number' => $account_number,
                'routing_number' => $routing_number,
                'bank_address' => $bank_address,
                'iban' => $iban,
                'swift_code' =>$swift_code,
                'refer' => $refer
            ]);

    }


    // transaction type 
     public function transaction_type($type)
     {
        $output = null;

        switch ($type) {
            case '1':
            $output = 'Bank Account';
                break;

            case '2':
            $output = 'Add Fund';
                break;

            case '3':
            $output = 'New Card';
                break;

            case '4':
            $output = 'Card Load';
                break;

            case '5':
            $output = 'Card Withdraw';
                break;

            case '6':
            $output = 'Send Money';
                break;

            case '7':
            $output = 'Payment';
                break;

            case '8':
            $output = 'Airtime';
                break;

            case '9':
            $output = 'Receive Money';
                break;

            default:
                null;
                break;
        }

        return $output;
     }


     // transaction status 

     public function transaction_status($status)
     {
        $output = null;

        switch ($status) {
            case '1':
                $output = '<span class="text-success fs-16 font-w500  d-block">Completed</span>';
                break;
            case '2':
                $output = '<span class="text-warning fs-16 font-w500  d-block">Pending</span>';
                break;
            case '3':
                $output = '<span class="text-danger fs-16 font-w500  d-block">Failed</span>';
                break;
            
            default:
                null;
                break;
        }

        return $output;
     }


     // transaction insert

     public function insert_transaction($type,$amount,$prev_bal,$next_bal,$status,$refer)
     {
        $transaction_table = $this->get_transaction_table();

        return $transaction_table->create([
                'type'=> $type, 
                'amount'=>$amount,
                'prev_balance'=>$prev_bal,
                'next_balance' => $next_bal,
                'status' => $status,
                'refer' => $refer
            ]);;

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
                            
                                    <h6><strong>Success!</strong> '.$msg.'</h6>
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

    // all payment country

    public function get_payment_country_list()
    {
              return array("United State"=>"United State","Austria"=>"Austria","Belgium"=>"Belgium","Bangladesh"=>"Bangladesh","Uruguey"=>"Uruguey","United Kingdom"=>"United Kingdom","Vietnum"=>"Vietnum","Turkey"=>"Turkey","Thailand"=>"Thailand","Chile"=>"Chile","Canada"=>"Canada","Bulgaria"=>"Bulgaria","Brazil"=>"Brazil","Croatia"=>"Croatia","Cyprus"=>"Cyprus","Czech republic"=>"Czech republic","Denmark"=>"Denmark","Egypt"=>"Egypt","Estonia"=>"Estonia","Finland"=>"Finland","France"=>"France","Germany"=>"Germany","Greece"=>"Greece","Hong kong"=>"Hong kong","Hungry"=>"Hungry","Iceland"=>"Iceland","India"=>"India","Indonesia"=>"Indonesia","Ireland"=>"Ireland","Japan"=>"Japan","Italy"=>"Italy","Korea"=>"Korea","Lativa"=>"Lativa","Liechtenstein"=>"Liechtenstein","Lithnia"=>"Lithnia","Luxembourg"=>"Luxembourg","Malaysia"=>"Malaysia","Malta"=>"Malta","Martinique"=>"Martinique","Mayotte"=>"Mayotte","Mexico"=>"Mexico","Monaco"=>"Monaco","Nepal"=>"Nepal","Netherlands"=>"Netherlands","Newzeland"=>"Newzeland","Norway"=>"Norway","Pakistan"=>"Pakistan","Peru"=>"Peru","Philippines"=>"Philippines","Poland"=>"Poland","Portugal"=>"Portugal","Romania"=>"Romania","Saint Pierre and Miquelon"=>"Saint Pierre and Miquelon","Singapore"=>"Singapore","Slovakia"=>"Slovakia","Spain"=>"Spain","Srilanka"=>"Srilanka","Sween"=>"Sween");
    }


    // sepa payment country


    public function sepa_payment_country()
    {

        return array("Austria"=>"Austria","Belgium"=>"Belgium","Uruguey"=>"Uruguey","United Kingdom"=>"United Kingdom","Vietnum"=>"Vietnum","Turkey"=>"Turkey","Thailand"=>"Thailand","Chile"=>"Chile","Canada"=>"Canada","Bulgaria"=>"Bulgaria","Brazil"=>"Brazil","Croatia"=>"Croatia","Cyprus"=>"Cyprus","Czech republic"=>"Czech republic","Denmark"=>"Denmark","Egypt"=>"Egypt","Estonia"=>"Estonia","Finland"=>"Finland","France"=>"France","Germany"=>"Germany","Greece"=>"Greece","Hong kong"=>"Hong kong","Hungry"=>"Hungry","Iceland"=>"Iceland","India"=>"India","Indonesia"=>"Indonesia","Ireland"=>"Ireland","Japan"=>"Japan","Italy"=>"Italy","Korea"=>"Korea","Lativa"=>"Lativa","Liechtenstein"=>"Liechtenstein","Lithnia"=>"Lithnia","Luxembourg"=>"Luxembourg","Malaysia"=>"Malaysia","Malta"=>"Malta","Martinique"=>"Martinique","Mayotte"=>"Mayotte","Mexico"=>"Mexico","Monaco"=>"Monaco","Nepal"=>"Nepal","Netherlands"=>"Netherlands","Newzeland"=>"Newzeland","Norway"=>"Norway","Pakistan"=>"Pakistan","Peru"=>"Peru","Philippines"=>"Philippines","Poland"=>"Poland","Portugal"=>"Portugal","Romania"=>"Romania","Saint Pierre and Miquelon"=>"Saint Pierre and Miquelon","Singapore"=>"Singapore","Slovakia"=>"Slovakia","Spain"=>"Spain","Srilanka"=>"Srilanka","Sween"=>"Sween");

    }

    //normal payment country

    public function nomral_payment_country()
    {

        return array("Bangladesh"=>"Bangladesh","United State"=>"United State");

    }

    // switft / bic validator

      public  function validate_swift_bic($swiftbic)
    {
        $regexp = '/^[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}$/i';

        return (bool) preg_match($regexp, $swiftbic);
    }


    // payment_get_all_ccode

    public function get_payment_country_code()
    {
        return array("Andorra"=>"AD","United Arab Emirates"=>"AE","Antigua and Barbuda"=>"AG","Anguilla"=>"AI","Albania"=>"AL","Armenia"=>"AM","Netherlands Antilles"=>"AN","Angola"=>"AO","Argentina"=>"AR","Austria"=>"AT","Australia"=>"AU","Aruba"=>"AW","Azerbaijan"=>"AZ","Bosnia and Herzegovina"=>"BA","Bangladesh"=>"BD","Belgium"=>"BE","Bulgaria"=>"BG","Bahrain"=>"BH","Saint Barthélemy"=>"BL","Bolivia (Plurinational State of)"=>"BO","Brazil"=>"BR","Belarus"=>"BY","Belize"=>"BZ","Canada"=>"CA","Switzerland"=>"CH","Chile"=>"CL","China"=>"CN","Colombia"=>"CO","Costa Rica"=>"CR","Curaçao"=>"CW","Cyprus"=>"CY","Czech Republic"=>"CZ","Germany"=>"DE","Denmark"=>"DK","Dominica"=>"DM","Dominican Republic"=>"DO","Algeria"=>"DZ","Ecuador"=>"EC","Estonia"=>"EE","Egypt"=>"EG","Spain"=>"ES","Finland"=>"FI","Fiji"=>"FJ","France"=>"FR","Faroe Islands"=>"FO","United Kingdom"=>"GB","Grenada"=>"GD","Georgia"=>"GE","French Guiana"=>"GF","Guernsey"=>"GG","Gibraltar"=>"GI","Greenland"=>"GL","Equatorial Guinea"=>"GQ","Greece"=>"GR","Guatemala"=>"GT","Guyana"=>"GY","Hong Kong SAR"=>"HK","Honduras"=>"HN","Croatia"=>"HR","Hungary"=>"HU","Canary Islands"=>"IC","Indonesia"=>"ID","Ireland"=>"IE","Israel"=>"IL","Isle of Man"=>"IM","India"=>"IN","Iceland"=>"IS","Italy"=>"IT","Jersey"=>"JE","Jamaica"=>"JM","Jordan"=>"JO","Japan"=>"JP","Kenya"=>"KE","Kyrgyzstan"=>"KG","Cambodia"=>"KH","Korea"=>"KR","Kazakhstan"=>"KZ","Kuwait"=>"KW","Saint Lucia"=>"LC","Liechtenstein"=>"LI","Sri Lanka"=>"LK","Lithuania"=>"LT","Luxembourg"=>"LU","Latvia"=>"LV","Morocco"=>"MA","Monaco"=>"MC","Moldova"=>"MD","Montenegro"=>"ME","Saint Martin (French part)"=>"MF","Macedonia"=>"MK","Macao SAR"=>"MO","Martinique"=>"MQ","Mauritania"=>"MR","Malta"=>"MT","Mauritius"=>"MU","Maldives"=>"MV","Mexico"=>"MX","Malaysia"=>"MY","Namibia"=>"NA","New Caledonia"=>"NC","Nigeria"=>"NG","Netherlands"=>"NL","Norway"=>"NO","Nepal"=>"NP","New Zealand"=>"NZ","Oman"=>"OM","Panama"=>"PA","Peru"=>"PE","French Polynesia"=>"PF","Philippines"=>"PH","Pakistan"=>"PK","Poland"=>"PL","Saint Pierre and Miquelon"=>"PM","Puerto Rico"=>"PR","Palestine"=>"PS","Portugal"=>"PT","Paraguay"=>"PY","Qatar"=>"QA","Réunion"=>"RE","Romania"=>"RO","Serbia"=>"RS","Saudi Arabia"=>"SA","Seychelles"=>"SC","Sweden"=>"SE","Singapore"=>"SG","Slovenia"=>"SI","Slovakia"=>"SK","San Marino"=>"SM","El Salvador"=>"SV","French Southern Territories"=>"TF","Thailand"=>"TH","Tajikistan"=>"TJ","Timor"=>"TL","Tunisia"=>"TN","Turkey"=>"TR","Tanzania"=>"TZ","Taiwan (China)"=>"TW","Ukraine"=>"UA","Uganda"=>"UG","United States of America"=>"US","Uruguay"=>"UY","Uzbekistan"=>"UZ","Virgin Islands (British)"=>"VG","Viet Nam"=>"VN","Vanuatu"=>"VU","Wallis and Futuna"=>"WF","Kosovo"=>"XK","Mayotte"=>"YT","South Africa"=>"ZA","Zambia"=>"ZM");
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
        return number_format($amount/100,2);
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


    public function adjust_balance($userid,$type,$amount)
    {
            $userTable = $this->get_mod_User()->where('id',$userid);
            $userTableData = $userTable->first();

            $my_balance = $userTableData->balance;

            if($type==1)
                $adjust_balance = $my_balance + $amount;
            else if($type==2)
                $adjust_balance = $my_balance - $amount;

            $balance_adj_query = tap($userTable)->update(['balance' => $adjust_balance])->first();

            if($adjust_balance == $balance_adj_query->balance)
                return 1;
            else
                return 0;


    }


    public function adjust_card_load($cardid,$type,$amount)
    {
            $cardTable = $this->get_card_table()->where('id',$cardid);
            $cardTableData = $cardTable->first();

            $my_balance = $cardTableData->load_amount;

            if($type==1)
                $adjust_balance = $my_balance + $amount;
            else if($type==2)
                $adjust_balance = $my_balance - $amount;

            $balance_adj_query = tap($cardTable)->update(['load_amount' => $adjust_balance])->first();

            if($adjust_balance == $balance_adj_query->load_amount)
                return 1;
            else
                return 0;


    }


    public function call_curl($url,$header="",$method='POST',$data="")
    {
   
        $ch = curl_init($url);
        if(isset($data) && !empty($data))
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        if(isset($method) && !empty($method))
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if(isset($header) && !empty($header))
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }


    // currency update

    public function currency_update()
    {
        $get_setting_table = $this->get_setting_table();
        $get_setting = $this->get_setting();

        $get_currency_data =  json_decode($get_setting->currency_data);

        $update = 0;

        if(!isset($get_currency_data->timestamp))
            $update = 1;

        else
        {

        $starttimestamp = strtotime($get_currency_data->timestamp);
        $endtimestamp = strtotime(time());
        $difference = abs($endtimestamp - $starttimestamp)/3600;

        if($difference>24)
            $update=1;
        }

        if($update==1)
        {
            $url = 'https://api.apilayer.com/currency_data/live';

            $headers = array(
    "Content-Type: text/plain",
    "apikey: BvU7zSn0jRb0XuQN6UMJ5pWuDfyNuDsv"
        );

    $raw_response = $this->call_curl($url,$headers,"GET",'');

    $response = json_decode($raw_response);


  
    if(isset($response->success) && $response->success == true)
    {
        $sql = $get_setting_table->where('id',1)->update((['currency_data' => $raw_response]));
        if($sql)
        return 1;
    else
        return 0;
    }
    else
        return 0;

        }
        else
            return 1;


    }



    // send_payment_purpose

    public function send_payment_purpose()
    {
        return array("","Salary","Personal Remittance","Family Support","Living Expenses","Travel","Good Purchased","Professional Business Services");
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



         public function card_transaction_karta_api($cardid)
    {

        if($this->update_token())
        {

            $gateway = $this->get_karta_gateway();


        $url = 'https://api.karta.io/api/public/v1/transaction/?card_id='.$cardid;

         $headers = array(
        'Content-type: application/json',
        'accept: application/json',
        'Authorization: Bearer '.$gateway['access_token'].''
            );

        $response = $this->call_curl($url,$headers,'GET','');

        return $response;

        }
        else
            return null;

    }


        public function fetch_visa_card_data_karta_api($cardid)
    {

        if($this->update_token())
        {

            $gateway = $this->get_karta_gateway();


        $url = 'https://api.karta.io/api/public/v1/card/'.$cardid.'/';

         $headers = array(
        'Content-type: application/json',
        'accept: application/json',
        'Authorization: Bearer '.$gateway['access_token'].''
            );

        $response = $this->call_curl($url,$headers,'GET','');

        return $response;

        }
        else
            return null;

    }


         public function update_card_karta_api($cardid,$status,$cardAmount)
    {

        if($this->update_token())
        {

            $gateway = $this->get_karta_gateway();


        $url = 'https://api.karta.io/api/public/v1/card/'.$cardid.'/';

         $headers = array(
        'Content-type: application/json',
        'accept: application/json',
        'Authorization: Bearer '.$gateway['access_token'].''
            );

         if(isset($status) && !empty($status))
         $data['status'] = $status;

        if(isset($cardAmount) && !empty($cardAmount))
               $data['limits'] = [array('type'=> 'LIFETIME_LIMIT', 'value' => $cardAmount)];

        

        $response = $this->call_curl($url,$headers,'PATCH',$data);

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
