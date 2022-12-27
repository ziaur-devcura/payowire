<!doctype html>
<html lang="zxx" class="theme-light">
    <head>
        <!-- Required meta tags -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q20HQT932N"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Q20HQT932N');
</script>
<!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<script async defer src="https://tools.luckyorange.com/core/lo.js?site-id=4dccc130"></script>

        <!-- Links of CSS files -->
        
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/magnific-popup.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/slick.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/meanmenu.css')}}">
		<link rel="stylesheet" href="{{URL::asset('frontend/assets/css/odometer.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/responsive.css')}}">
        <link rel="stylesheet" href="{{URL::asset('frontend/assets/css/dark-style.css')}}">
        <link href="{{ URL::asset('backend/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
        <script src="{{URL::asset('frontend/assets/js/jquery.min.js')}}"></script>
        <script async defer src="https://tools.luckyorange.com/core/lo.js?site-id=4dccc130"></script>

        {!!$header!!}


        <link rel="icon" type="image/png" href="{{URL::asset('frontend/assets/img/favicon.png')}}">

        <style type="text/css">
            .account_type_active
            {
                position: relative;
                background: -webkit-gradient(linear, left top, right top, from(#ee0979), to(#ff6a00));
                background: linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
                border-radius: 200px;
                padding: 3px;
                -webkit-transition: 0.5s;
                transition: 0.5s;
            }

            .account_type_active:hover
            {
                transform: translateY(-5px);
            }

            .account_type_inactive
            {

                position: relative;
                background: transparent;
                border-radius: 200px;
                padding: 3px;

                -webkit-transition: 0.5s;
                transition: 0.5s;

            }

            .account_type_inactive:hover
            {

                position: relative;
                background: -webkit-gradient(linear, left top, right top, from(#ee0979), to(#ff6a00));
                background: linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
                border-radius: 200px;
                
                transform: translateY(-5px);
                
            }



            .account_type_btn
            {
                    background-color: #ffffff;
    -webkit-box-shadow: 0px 7px 15px rgb(0 0 0 / 5%);
    box-shadow: 0px 7px 15px rgb(0 0 0 / 5%);
    border-radius: 100px;
    padding: 10px 20px 10px 10px;
    margin-bottom: 25px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
            }

            .pointer {cursor: pointer;}


        </style>
    </head>

       <!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="wrap">
                  <div class="loading ">
                       <img class="rt_logos" width="64" src="{{URL::asset('frontend/assets/img/favicon.png')}}">
                    
                    <div class="text">Payowire</div>
                  </div>
                </div>
                <!--<div class="shadow"></div>-->
                <!--<div class="box"></div>-->
            </div>
        </div>
        <!-- End Preloader -->

        <!-- Start Navbar Area -->
        <div class="navbar-area currency-transfer-provider-navbar">
            <div class="luvion-responsive-nav">
                <div class="container">
                    <div class="luvion-responsive-menu">
                        <div class="logo">
                            <a href="{{route('homeview')}}">
                                <img src="{{URL::asset('frontend/assets/img/logo.png')}}" alt="logo">
                                <img src="{{URL::asset('frontend/assets/img/black-logo.png')}}" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="luvion-nav">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{route('homeview')}}">
                            <img src="{{URL::asset('frontend/assets/img/logo.png')}}" alt="logo">
                            <img src="{{URL::asset('frontend/assets/img/black-logo.png')}}" alt="logo">
                        </a>

                        <div class="navbar-list">
                            <ul>
                            </ul>
                        </div>


  
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">

                            <ul class="navbar-nav">
                                <li class="nav-item">
                                   <a href="{{route('homeview')}}" class="nav-link">Home</a></li>
                                   
                                <li class="nav-item"><a href="#" class="nav-link">Global Payment  <i class="fas fa-chevron-down"></i>
                                
                                </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{route('globalAccount')}}" class="nav-link">Multi Currency Bank Account USD, EURO, GBP </a></li>

                                        <li class="nav-item"><a href="{{route('receiveMoney')}}" class="nav-link">Receive Money Globally</a></li>

                                        <li class="nav-item"><a href="{{route('sendMoney')}}" class="nav-link">Send Money Globally</a></li>
                                        
                                        <li class="nav-item"><a href="{{route('bankWithdraw')}}" class="nav-link">ACH, SEPA, WIRE TRANSFER </a></li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item"><a href="#" class="nav-link x">Cards <i class="fas fa-chevron-down"></i>
                                
                                </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{route('virtualcard')}}" class="nav-link">Unlimited Virtual card</a></li>
                                        
                            <li class="nav-item"><a href="{{route('virtualMastercard')}}" class="nav-link">Virtual Mastercard Instantly</a></li>
                            
                               <li class="nav-item"><a href="{{route('virtualVisacard')}}" class="nav-link">Virtual Visacard Instantly</a></li>
                                                        
                                        <li class="nav-item"><a href="{{route('physicalcard')}}" class="nav-link">Physical Card For Payment</a></li>

                                    </ul>
                                </li>
                                
                              
                                
                                <li class="nav-item"><a href="{{route('pricing')}}" class="nav-link">Pricing</a></li>
                                
                                
                                <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About Us</a></li>

                                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact Us</a></li>
                            </ul>

                            <div class="others-options d-flex align-items-center">
                                
                                <div class="options-item">
                                    <a href="{{route('login')}}" class="btn btn-primary ">Log in</a>
                                </div>
                                <div class="options-item">
                                    <a href="{{route('signup')}}" class="btn btn-primary">Register</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                               
                                <div class="options-item">
                                    <a href="{{route('login')}}" class="btn btn-primary">Log in</a>
                                </div>
                                <div class="options-item">
                                    <a href="{{route('signup')}}" class="btn btn-primary">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>