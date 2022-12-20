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


function amount_input()
{

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
    }


             $('.only-digit').on('input',function(){
    var val = $(this).val();
    
    val = val.replace(/[^0-9]/g,'');
    $(this).val(val); 
});


             $(".btn").mousedown(function(e) { // handle the mousedown event
    e.preventDefault(); // prevent the textarea to loose focus!
}); 

               $(".btn").focus(function(e){
    $('button').blur();
  });

    $("a").mousedown(function(e) { // handle the mousedown event
    e.preventDefault(); // prevent the textarea to loose focus!
}); 

               $("a").focus(function(e){
    $('a').blur();
  });


 // Select2
        //if (jQuery().select2) {

         /*$('[data-toggle="select2"]').each(function()
         {
            $(this).select2({
                dropdownParent: $(this).parent()
            })
         })*/

            /*$('[data-toggle="select2"]').select2({
                    dropdownParent: $('[data-toggle="select2"]').parent()
                  dropdownParent: $('.modal-content')
                   });*/
        //}



    $('.select2').each(function () {
            $(this).select2({
                dropdownParent: $(this).parent()
            });
        });





    function euro_country()
    {
        return {
    "Austria": "Austria",
    "Belgium": "Belgium",
    "Uruguey": "Uruguey",
    "United Kingdom": "United Kingdom",
    "Vietnum": "Vietnum",
    "Turkey": "Turkey",
    "Thailand": "Thailand",
    "Chile": "Chile",
    "Canada": "Canada",
    "Bulgaria": "Bulgaria",
    "Brazil": "Brazil",
    "Croatia": "Croatia",
    "Cyprus": "Cyprus",
    "Czech republic": "Czech republic",
    "Denmark": "Denmark",
    "Egypt": "Egypt",
    "Estonia": "Estonia",
    "Finland": "Finland",
    "France": "France",
    "Germany": "Germany",
    "Greece": "Greece",
    "Hong kong": "Hong kong",
    "Hungry": "Hungry",
    "Iceland": "Iceland",
    "India": "India",
    "Indonesia": "Indonesia",
    "Ireland": "Ireland",
    "Japan": "Japan",
    "Italy": "Italy",
    "Korea": "Korea",
    "Lativa": "Lativa",
    "Liechtenstein": "Liechtenstein",
    "Lithnia": "Lithnia",
    "Luxembourg": "Luxembourg",
    "Malaysia": "Malaysia",
    "Malta": "Malta",
    "Martinique": "Martinique",
    "Mayotte": "Mayotte",
    "Mexico": "Mexico",
    "Monaco": "Monaco",
    "Nepal": "Nepal",
    "Netherlands": "Netherlands",
    "Newzeland": "Newzeland",
    "Norway": "Norway",
    "Pakistan": "Pakistan",
    "Peru": "Peru",
    "Philippines": "Philippines",
    "Poland": "Poland",
    "Portugal": "Portugal",
    "Romania": "Romania",
    "Saint Pierre and Miquelon": "Saint Pierre and Miquelon",
    "Singapore": "Singapore",
    "Slovakia": "Slovakia",
    "Spain": "Spain",
    "Srilanka": "Srilanka",
    "Sween": "Sween"
};
    }



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


function close_tooltip()
{
     $('[data-toggle="tooltip"]').tooltip("hide");
}

function clear_card_addFund()
{
    $('#cardAmount').val('');
    $('#addfundMsg').html('');
}


     function check_bank_req(elm)
                                    {

                                        var close = $(elm).html();

                                        if(close == 'Cancel')
                                        {
                                            $('#req_bank_confirm').remove();
                                            $("#req_bank_select").removeClass("d-none");
                                            $(elm).html('Close');
                                            $('#reqMsg').html('');


                                        }
                                        else
                                             $('#get_bank_model').modal('hide');



                                    }


                                    function clear_bank_req()
                                    {
                                        $('#reqMsg').html('');

                                         if($('#req_bank_confirm').length)
                                            $('#req_bank_confirm').remove();

                                        $('#reqBankCloseBtn').html('Close');

                                    }


function clear_card_withdrawFund()
{
    $('#cardAmountw').val('');
    $('#withdrawfundMsg').html('');
}

function payment_add_bank_backBtn(elm){

    var close = $(elm).html();

    if(close == 'Close')
        $('#add_bank_modal').modal('hide');
    else if(close == 'Back')
    {
        $(elm).html('Close');
        $("#addBankclick").html("Next");
        $("#addBankMsg").html('');
        $("#add_bank_confirm").val(0);
        $('#step2').html('');
        $('#step1').removeClass('d-none');

    }
}

// init

amount_input();

    