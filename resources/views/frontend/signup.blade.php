@include('frontend/header')
<script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>

 <!-- Start Login Area -->
        <section class="login-area currency-transfer-provider-with-background-color">
            <div class="container">
            <div class="row ps-3 pe-3" style="padding-top: 120px;
    padding-bottom: 100px;">
        
                <div class="col-md-7 p-4 m-auto" style="border: 1px solid #ff6a00;">
                 
                       
                                <div class="login-form col-md-10 m-auto">
                                

                                    <h3>Payowire Sign Up</h3>
                                    <p>Do you already had an account? <a href="{{route('login')}}">Login Here</a></p>

                                    <form class="mt-5" id="loginform" method="post" action="{{route('signupdo')}}">

                                       
                                        <div class="row justify-content-center">

                        <div class="col">
                            <div onclick="check_register(this,1);" class="account_type_inactive pointer">
                            <div class="account_type_btn m-0">
                                <span class="m-2">Personal</span>
                            </div>
                        </div>
                        </div>
                        <div class="col">
                            <div onclick="check_register(this,2);" class="account_type_inactive pointer">
                            <div class="account_type_btn m-0">
                                <span class="m-2">Business</span>
                            </div>
                            </div>
                        </div>
                    </div>



                                        <div id="account_info" class="d-none mt-5">

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" id="accountType" name="accountType" />


                                        <div class="form-group">
                                            <label>First name</label>
                                            
                                            <input type="text" name="userFname" placeholder="Your first name" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input type="text" name="userLname"  placeholder="Your last name" class="form-control">
                                        </div>



                                         <div class="form-group d-none">
                                            <label>Email address</label>
                                            <input type="text" name="userEmail1"  placeholder="Your email address" class="form-control">
                                        </div>

                                         <div class="form-group">
                                            <label>Email address</label>
                                            <input type="text" name="userEmail"  placeholder="Your email address" class="form-control">
                                        </div>

                                          <input class="d-none" type="text" name="email">


                                        <input type="password" name="password" style="display:none">


                                           <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="userNewpass"  placeholder="New password" class="form-control">
                                        </div>

                                         <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input type="password" name="userNewpass_confirmation" placeholder="Confirm new password" class="form-control">
                                        </div>

                                       

                                        <div class="form-group">
                                            <label>Date of birth</label>
                                            <input readonly id="datepicker" type="text" name="userDob"  placeholder="Your date of birth" class="form-control">
                                        </div>

                                         <div class="form-group mt-2">
                                                                         <label>
   
        <input name="agreement" type="checkbox" class="ant-checkbox-input" >
     
      <span>I agree with the <a  href="{{route('terms')}}" target="_blank" rel="noreferrer"><u>User Agreement</u></a> and <a href="{{route('policy')}}" target="_blank" rel="noreferrer"><u>Privacy Policy</u></a>
      </span>
    </label>
                                        </div>

          

                                        <div class="form-group">
                                           <input id="gcap_token" type="hidden" name="gcap_token">
                                    <div id="recaptcha-holder"></div>
                                        </div>

                                        <div class="form-group text-center">
                                           <button id="loginClick" type="submit" class="btn btn-primary mt-3">Register</button>
                                      
                                        </div>

                                      

                                       

                                        <div class="form-group mt-2 text-center" id="msg">
                                        </div>

                                        </div>

                                   
                                    </form>
                                
                          
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- End Login Area -->

        @include('helper/gcaptcha_form_submit',['click' => 'loginClick','formid'=>'loginform','msg'=>'msg','sitekey'=>'6LdjaLAjAAAAAMPKyoIFnPgc8p_yWGxuKSv6PvKg'])



        <script type="text/javascript">
            function check_register(elm,type)
            {

                $(".account_type_active").addClass("account_type_inactive");
                $(".account_type_active").removeClass("account_type_active");

                $(elm).removeClass("account_type_inactive");
                $(elm).addClass("account_type_active");
                $('#accountType').val(type);
                $('#account_info').removeClass('d-none');


            }

             $(function() {
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy',
        });
    });





        </script>

            <!-- Start Footer Area -->
@include('frontend/footer')