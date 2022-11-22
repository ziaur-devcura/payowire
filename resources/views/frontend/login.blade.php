@include('frontend/header')
 <!-- Start Login Area -->
        <section class="login-area">
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
                                <div class="login-form">
                                    <div class="logo black-logo">
                                        <a href="index.php"><img src="{{URL::asset('frontend/assets/img/black-logo.png')}}" alt="image"></a>
                                    </div>
                                    <div class="logo white-logo">
                                        <a href="index.php"><img src="{{URL::asset('frontend/assets/img/logo.png')}}" alt="image"></a>
                                    </div>

                                    <h3>Welcome back</h3>
                                    <p>Do You Want To Open An Account? <a href="signup.php">Sign up</a></p>

                                    <form id="loginform" method="post" action="#">
                                        <div class="form-group">
                                            <input type="email" name="userEmail" placeholder="Your email address" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="userPass"  placeholder="Your password" class="form-control">
                                        </div>

                                        <button id="loginClick" type="submit" class="btn btn-primary">Login</button>
                                        
                                        <div class="forgot-password">
                                            <a href="forgetpass.php">Forgot Password?</a>
                                        </div>

                                        <div class="form-group" id="msg">
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

                          <script  type="text/javascript">

                            window.onload = function() {


$("#loginClick").click(function(){$("#msg").html('<div class="spinner-border text-primary" role="status"></div>');
$.post($("#loginform").attr("action"),$("#loginform :input").serializeArray(),function(info){
  
    
    $("#msg").html(info);
    $("#loginClick").attr("disabled", false);
    //clearInput();
  })
  .fail( function(xhr, textStatus, errorThrown) {

      $("#msg").html("");

      $("#loginClick").attr("disabled", false);

       
           $.each(xhr.responseJSON.errors, function (key, value) {

                var error_msg='<li>'+value+'</li>';

                if(value!="")
            $("#msg").html($("#msg").html()+error_msg);

                    });

           if($("#msg").html() == "")

            $("#msg").html('<div class="alert alert-danger alert-dismissible text-start" role="alert"><ul class="mb-0">Connection error! Please try again.</ul><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        else
            $("#msg").html('<div class="alert alert-danger alert-dismissible text-start" role="alert"><ul class="mb-0">'+$("#msg").html()+'</ul><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
      


    });

});

$("#loginform").submit( function(){
    $("#loginClick").attr("disabled", true);
  return false;
});

}


  </script>

            <!-- Start Footer Area -->
@include('frontend/footer')