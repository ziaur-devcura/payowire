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


             $('.only-digit').on('input',function(){
    var val = $(this).val();
    
    val = val.replace(/[^0-9]/g,'');
    $(this).val(val); 
});


      function close_preview(confirm,modal_id,form_id='',msg_id='')
                                         {

                                            if($("[name='confirm']").length)
                                            $("[name='confirm']").remove();

                                            $(modal_id).modal('hide');

                                            if(confirm==1)
                                            {
                                                $(form_id).trigger("reset");
                                                $(msg_id).html('');
                                            }


                                         }


    function remove_confirm()
    {
        if($("[name='confirm']").length)
            $("[name='confirm']").remove();

    }

     function set_card_amount_visa(amount)
                                            {

                                                $('#visa_amount').val(amount);


                                            }

     function set_card_amount_mastercard(amount)
                                            {

                                                $('#mastercard_amount').val(amount);


                                            }

                                    function visa_card_pack_select(elm,pack)
                                    {
                                        $('.visatype').removeClass('active');
                                        $(elm).addClass('active');
                                       
                                         $("#visaCardPack").val(pack);

                                        if(pack == 1)
                                            $('#visa_PackMsg').html('<p class="text-info">Lifetime Transaction limit 5,000 USD</p>');
                                        else
                                            $('#visa_PackMsg').html('<p class="text-info">Lifetime Unlimited Transaction</p>');

                                    }

                                       function master_card_pack_select(elm,pack)
                                    {
                                        $('.mastertype').removeClass('active');
                                        $(elm).addClass('active');


                                         $("#masterCardPack").val(pack);

                                        if(pack == 1)
                                            $('#master_PackMsg').html('<p class="text-info">Lifetime Transaction limit 5,000 USD</p>');
                                        else
                                            $('#master_PackMsg').html('<p class="text-info">Lifetime Unlimited Transaction</p>');

                                    }


                                       function click_to_copy(elm,value) {

  // Copy the text inside the text field
  navigator.clipboard.writeText(value);


    elm.setAttribute("data-bs-original-title", "Copied!");
 
    let btn_tooltip = bootstrap.Tooltip.getInstance(elm);
 
    btn_tooltip.show();

    elm.setAttribute("data-bs-original-title", "Click to copy");

  
}