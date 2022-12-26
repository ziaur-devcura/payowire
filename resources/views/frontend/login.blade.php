@include('frontend/header')
 <!-- Start Login Area -->
        <section class="login-area currency-transfer-provider-with-background-color">
            <div class="row m-0">
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-image">
                        <img src="{{URL::asset('frontend/assets/img/login-bg.jpg')}}" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="login-form text-start">
                                    <div class="logo black-logo">
                                        <a href="index.php"><img src="{{URL::asset('frontend/assets/img/black-logo.png')}}" alt="image"></a>
                                    </div>
                                    <div class="logo white-logo">
                                        <a href="index.php"><img src="{{URL::asset('frontend/assets/img/logo.png')}}" alt="image"></a>
                                    </div>

                                    <h3>Welcome back</h3>
                                    <p>Do You Want To Open An Account? <a href="{{route('signup')}}">Sign up</a></p>

                                    <form id="loginform" method="post" action="{{route('logindo')}}">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="email" name="userEmail" placeholder="Your email address" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="userPass"  placeholder="Your password" class="form-control">
                                        </div>

                                        <button id="loginClick" type="submit" class="btn btn-primary mt-3">Login</button>
                                        
                                        <div class="forgot-password">
                                            <a href="forgetpass.php">Forgot Password?</a>
                                        </div>

                                        <div class="form-group mt-2" id="msg">
                                        </div>

                                   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Area -->

        @include('helper/single_form_submit_nojs',['click' => 'loginClick','formid'=>'loginform','msg'=>'msg'])

            <!-- Start Footer Area -->
@include('frontend/footer')