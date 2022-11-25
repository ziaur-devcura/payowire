<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Payowire" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>{{$pageTitle}}</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{URL::asset('backend/images/favicon.png')}}" />
	
	<link href="{{URL::asset('backend/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{URL::asset('backend/vendor/nouislider/nouislider.min.css')}}">
	<link href="{{URL::asset('backend/icons/material-design-iconic-font/css/materialdesignicons.min.css')}}" rel="stylesheet">
	<!-- Style css -->
    <link href="{{URL::asset('backend/css/style.css')}}" rel="stylesheet">

    <style type="text/css">
    	.pointer {cursor: pointer;}

    	.bank_select
    	{
    		transform: translateY(4px);
    		background: var(--rgba-primary-1);
    	}

    	.bank:hover
    	{
    		background: var(--rgba-primary-1);
    	}
    	
    </style>
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
		   <span style="--i:1">L</span>
		   <span style="--i:2">o</span>
		   <span style="--i:3">a</span>
		   <span style="--i:4">d</span>
		   <span style="--i:5">i</span>
		   <span style="--i:6">n</span>
		   <span style="--i:7">g</span>
		   <span style="--i:8">.</span>
		   <span style="--i:9">.</span>
		   <span style="--i:10">.</span>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->

       
        <div class="nav-header">

        	   <div class="nav-control start-0 nav-control start-0 ms-3 d-flex">
                <div class="hamburger d-xl-none d-lg-none">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>

                 <a href="{{route('user_home')}}" class="brand-logo ms-3">
		<img src="{{URL::asset('frontend/assets/img/black-logo.png')}}" height="33px" width="auto" alt="logo">
            </a>


            </div>	

          
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                {{$pageName}} 
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							
							<li class="nav-item dropdown notification_dropdown">
                               <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 24" fill="none" stroke-width="2.4" stroke="#4f7086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
							
							</li>
                          
                            
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->