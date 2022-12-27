<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\Http\Requests\signupRequest;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;
use App\Mail\new_account;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Exception;

class login extends Controller
{
    public function loginView(Request $data)
    {
        if(Auth::check())
           return redirect()->route('user_home');
        else
        {
              $header = '<title>Payowire - Login </title>';

                return view('frontend/login')
                ->with('header',$header);
        }
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
          'password' => $password,
          'status' => '1'
        );


            if (Auth::attempt($userdata,$remember))

          return '<div class="alert alert-success alert-dismissible" role="alert">Login Successfull<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><script>window.location.replace("./user")</script>';

          else
          
          return '<div class="alert alert-danger alert-dismissible" role="alert">Login failed! Please check your credential<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';


        
    }

    public function signupdo(signupRequest $request)
    {

    
        $accountType = $request->accountType;
        $userFname = $request->userFname;
        $userLname = $request->userLname;
        $userEmail = $request->userEmail;
        $userNewpass = $request->userNewpass;
        $userDob = $request->userDob;
        $status = md5(time());

        $user_table = parent::get_mod_User();

        $check_email = $user_table->where('email',$userEmail)->first();

        if(isset($check_email->id))
            return parent::get_error_msg('Another account already exists with this email address.');



        $create_new_user = $user_table->create([
                'account_type'=> $accountType, 
                'firstname'=>$userFname,
                'lastname'=>$userLname,
                'email' => $userEmail,
                'password' => bcrypt($userNewpass),
                'dob' => $userDob,
                'status' => $status
            ]);

        if($create_new_user->wasRecentlyCreated)
        {

                try
        {

         $send_email =   Mail::mailer('noreply')->to($userEmail)->send(new new_account($userFname.' '.$userLname,$status,'noreply@payowire.com','Your new payowire account'));
     }
     catch(Exception $e)
     {
        
     }

            return '<script>swal({
          title: "Registration Complete",
          text: "Please check your email inbox/spam folder for the account activation emails.",
          type: "success",
          confirmButtonText: "Login Now",
      preConfirm: () => {
        window.location.href = "'.route('user_logout').'";
      return false; // Prevent confirmed
  }});
  $("#loginform").trigger("reset");
  </script>';

        }
        else
            return parent::get_error_msg('We are unable to process your request at the moment. Please try again later.');

    }


    public function activate_account($code)
    {

        $user_table = parent::get_mod_User();

         $check_email = $user_table->where('status',$code)->first();

        if(!isset($check_email->id))
            return redirect()->route('homeview');
        else
            $user_table->where('status',$code)->update(['status' => '1']);


          $header = '<title>Payowire - Activate Account </title>';

        return view('frontend/activate_account')
        ->with('header',$header);

    }


    // frontend pages


    public function homeView()
    {

        $header = '  <title>Global Payment Platform For Send,Receive & Cards - Payowire</title>
<meta name="description" content="Global Payment Platfrom for receive and send money internationally and card provider.">
      <meta name="keywords" content="Global Payment Platfrom,payment receive from freelancer, global us account, global euro account, global gbp account, virtual bank account for freelancer payment receive,virtual visa and mastercard for freelancer, physical visa and mastercard for online payment. ">';

        return view('frontend/home')
        ->with('header',$header);

    }

    public function global_account_view()
    {

          $header = '<title>Payowire - Multi Currency Bank Account </title>';

        return view('frontend/global_account')
        ->with('header',$header);

    }

     public function receive_money_view()
    {

          $header = '<title>Payowire - Receive Money Globally </title>';

        return view('frontend/receive_money')
        ->with('header',$header);

    }

    public function send_money_view()
    {

          $header = '<title>Payowire - Send Money Globally </title>';

        return view('frontend/send_money')
        ->with('header',$header);

    }

    public function bank_withdraw_view()
    {

          $header = ' <title>Payowire - Bank Withdraw </title>';

        return view('frontend/bank_withdraw')
        ->with('header',$header);

    }

    public function virtualcard_view()
    {

          $header = ' <title>Payowire - Virtual Cards</title>';

        return view('frontend/virtualcard')
        ->with('header',$header);

    }

     public function virtual_mastercard_view()
    {

          $header = ' <title>Payowire - Virtual Mastercard</title>';

        return view('frontend/virtual_mastercard')
        ->with('header',$header);

    }

      public function virtual_visacard_view()
    {

          $header = ' <title>Payowire - Virtual Visacard</title>';

        return view('frontend/virtual_visacard')
        ->with('header',$header);

    }

       public function physical_card_view()
    {

          $header = ' <title>Payowire - Physical Cards</title>';

        return view('frontend/physical_card')
        ->with('header',$header);

    }

       public function pricing_view()
    {

          $header = '<title>Pricing our services - Payowire </title>';

        return view('frontend/pricing')
        ->with('header',$header);

    }

       public function about_view()
    {

          $header = '<title>Payowire - About Us</title>';

        return view('frontend/about')
        ->with('header',$header);

    }

       public function contact_view()
    {

          $header = ' <title>Payowire - contact us</title>';

        return view('frontend/contact')
        ->with('header',$header);

    }

      public function cards_view()
    {

          $header = '<title>Payowire - cards</title>';

        return view('frontend/cards')
        ->with('header',$header);

    }

       public function payment_view()
    {

          $header = '<title>Payowire - payments</title>';

        return view('frontend/cards')
        ->with('header',$header);

    }

      public function faq_view()
    {

          $header = '<title>Payowire - Faq</title>';

        return view('frontend/faq')
        ->with('header',$header);

    }

      public function terms_view()
    {

          $header = '<title>Payowire - Terms and Conditions</title>';

        return view('frontend/terms')
        ->with('header',$header);

    }
    

      public function policy_view()
    {

          $header = '<title>Payowire - Terms and Conditions</title>';

        return view('frontend/policy')
        ->with('header',$header);

    }


      public function aml_view()
    {

          $header = '<title>Payowire - Anti Money Laundering</title>';

        return view('frontend/aml')
        ->with('header',$header);

    }

     public function unsubscribe_view()
    {

          $header = '<title>Payowire - Unsubscribe</title>';

        return view('frontend/unsubscribe')
        ->with('header',$header);

    }

    
}
