           <script  type="text/javascript">

                            window.onload = function() {


$("#{{$click}}").click(function(){$("#{{$msg}}").html('<div class="spinner-border text-primary" role="status"></div>');
$.post($("#{{$formid}}").attr("action"),$("#{{$formid}} :input").serializeArray(),function(info){
  
    
    $("#{{$msg}}").html(info);
    $("#{{$click}}").attr("disabled", false);
    //clearInput();
  })
  .fail( function(xhr, textStatus, errorThrown) {

      $("#{{$msg}}").html("");

      $("#{{$click}}").attr("disabled", false);

       
           $.each(xhr.responseJSON.errors, function (key, value) {

                var error_msg='<li>'+value+'</li>';

                if(value!="")
            $("#{{$msg}}").html($("#{{$msg}}").html()+error_msg);

                    });

           if($("#{{$msg}}").html() == "")

            $("#{{$msg}}").html('<div class="alert alert-danger alert-dismissible text-start" role="alert"><ul class="mb-0">Connection error! Please try again.</ul><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        else
            $("#{{$msg}}").html('<div class="alert alert-danger alert-dismissible text-start" role="alert"><ul class="mb-0">'+$("#{{$msg}}").html()+'</ul><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
      


    });

});

$("#{{$formid}}").submit( function(){
    $("#{{$click}}").attr("disabled", true);
  return false;
});

}


  </script>