          $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
          

    $('.all_amount').on('input',function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^-?0-9\.]/g,'');

         if(val.split('.').length>1)
     {
             val =val.replace(/\.[0-9]+$/,"");
       val =val.replace(/\.+$/,"");
     }

          if(val.split('-').length>2)
     {
        val =val.replace(/\-[0-9]+$/,"");
       val =val.replace(/\-+$/,"");
     }


    }
    $(this).val(val); 
});


        $('.amount').on('input',function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>1)
     {
             val =val.replace(/\.[0-9]+$/,"");
       val =val.replace(/\.+$/,"");
     }
    }
    $(this).val(val); 
});


      function close_sendmoney_preview(confirm)
                                         {

                                            if($("[name='confirm']").length)
                                            $("[name='confirm']").remove();

                                            $('#sendmoneyPreview').modal('hide');

                                            if(confirm==1)
                                            {
                                                $('#sendmoneyForm').trigger("reset");
                                                $('#sendmoneyMsg').html('');
                                            }


                                         }


    function remove_confirm()
    {
        if($("[name='confirm']").length)
            $("[name='confirm']").remove();

    }