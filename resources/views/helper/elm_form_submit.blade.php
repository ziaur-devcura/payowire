           <script  type="text/javascript">


$('#{{$parent}}').on('click', '#{{$click}}', function(){

    $("#{{$msg}}").html('<div class="spinner-border text-primary" role="status"></div>');
    
$.post($("#{{$formid}}").attr("action"),$("#{{$formid}} :input").serializeArray(),function(info){
  
    
    $("#{{$msg}}").html(info);
    $("#{{$click}}").attr("disabled", false);
    //clearInput();
  })
  .fail( function(xhr, textStatus, errorThrown) {

      $("#{{$msg}}").html("");

      $("#{{$click}}").attr("disabled", false);

      var count = 0;

       
           $.each(xhr.responseJSON.errors, function (key, value) {

                var error_msg='<li class="reponse_item">'+value+'</li>';

                if(value!="")
            $("#{{$msg}}").html($("#{{$msg}}").html()+error_msg);

                count++;



                    });

           if($("#{{$msg}}").html() == "")

            $("#{{$msg}}").html('<div class="alert alert-danger alert-dismissible text-start" role="alert"><ul>Connection error! Please try again.</ul><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        else
            $("#{{$msg}}").html('<div class="alert alert-danger alert-dismissible text-start" role="alert"><ul>'+$("#{{$msg}}").html()+'</ul><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

        if(count==1)
        {
            $('.reponse_item').removeClass('reponse_item');
            $('.text-start').addClass('text-center').removeClass('text-start');
        }
      


    });

});

$("#{{$formid}}").submit( function(){
    $("#{{$click}}").attr("disabled", true);
  return false;
});


  </script>