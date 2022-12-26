@include('user/header')
@include('user/sidebar')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">


                    <div class="row">

                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="row align-items-center">
                                
                                    <div class="col-xl-12">

                                        
                                                 <div class="d-flex flex-wrap align-items-center mb-3">

                                                    <div class="me-auto">

                                                    <h4 class="card-title">Select for preview</h4>

                                            </div>

                                             <button onclick="payment_add_bank_backBtn('#addBankCloseBtn')" data-bs-toggle="modal" data-bs-target="#add_bank_modal" type="button" class="btn btn-primary">Add Bank</button>

                                                        
                                        </div>

                                               
                                        <div class="row justify-content-center">


                    <div  class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_payment_bank(this,1)"  class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <i class="fa fa-user text-primary fa-2x"></i>
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>Pay to recipient's bank account</h4>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_payment_bank(this,2)" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <i class="fa fa-landmark text-primary fa-2x"></i>
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>Send money to my bank</h4>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                                    </div> <!--row end-->


                            <div class="row mt-4">
                                 <div class="col-xl-12 col-md-12 m-auto">

                                         

                                            <div class="col-xl-8 col-md-12 m-auto" id="fetch_bank_result">


                                             </div>

                                       

                                    </div>
                            </div>

                             


                            <script type="text/javascript">
                                    function choose_payment_bank(selected,recipient_type)
    {
       

        $(".bank_select").removeClass( "bank_select" );
        $(selected).addClass( "bank_select" );
        //$("#bank_selected_row").removeClass( "d-none" );

        $("#fetch_bank_result").html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');


         $.ajax({
        type: "POST",
        url: "{{route('user.payment.fetch_bank','')}}"+'/'+recipient_type,
        data: {_token: "{{ csrf_token() }}"

        },
        dataType: "html",
        success: function(response) {

          $("#fetch_bank_result").html(response);
            
        },
         error: function(xhr, textStatus, thrownError) {

            
        }
    });

    }
                            </script>

                             @include('helper/elm_form_submit',['parent' => 'fetch_bank_result','click' => 'sendmoneyCLick','formid'=>'sendmoneyForm','msg'=>'sendmoneyMsg'])



                        </div>
                        </div>



                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->




            <!-- get Bank Modal -->
                                    <div class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="true" id="add_bank_modal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Bank Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form  id="addBankForm" method="POST" action="{{route('user.make_payment')}}">

                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                                        <input type="hidden" id="add_bank_confirm" name="confirm" value="0">


                                                        <div id="add_bank_step1">

                                                        <div class="mb-3 row">
                                                            <label class="form-label">Bank Type</label>
                                                                    <select name="bank_type" class="default-select form-control wide mb-3">
                                            <option value="">Select Type</option>
                                            <option value="1">Personal</option>
                                            <option value="2">Business</option>
                                        </select>
                                                        </div>


                                                        <div class="mb-3 row">
                                                            <label class="form-label">Bank Country</label>

                                            <select  name="bank_country" class="default-select form-control wide mb-3 select2">
                                            <option id="payment_country" value="" selected>Select Country</option>
                                         @foreach ($get_all_country as $country)
                                         <option value="{{$country}}">{{$country}}</option>
                                         @endforeach
                                        </select>

                                                        </div>


                                                         <div class="mb-3 row">
                                                            <label class="form-label">Recipient Type</label>
                                                                    <select name="recipient_type" class="default-select form-control wide mb-3">
                                            <option value="">Select Type</option>
                                            <option value="1">Myself</option>
                                            <option value="2">Someone else</option>
                                        </select>
                                                        </div>

                                                    </div>

                                                    <div id="add_bank_step2"></div>


                                        <div id="addBankMsg" class="mb-3 text-center">
                                        </div>

                                    </form>


                                                </div>
                                                <div class="modal-footer">
                                                    <button onclick="payment_add_bank_backBtn(this)" id="addBankCloseBtn" type="button" class="btn btn-danger light">Close</button>
                                                    <button id="addBankclick" type="button" class="btn btn-primary">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     @include('helper/basic_form_submit',['click' => 'addBankclick','formid'=>'addBankForm','msg'=>'addBankMsg'])




 <!-- preview modal -->
                                    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="payment_confirm_modal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Payment (Preview)</h5>
                                                    <button onclick="close_preview(0,'#payment_confirm_modal')" type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                  
                                                        <div class="mb-3 row" id="preview_result">

                                                   
                                                        </div>



                                        <div id="previewMsg" class="mb-3 text-center">
                                        </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button onclick="close_preview(0,'#payment_confirm_modal')" type="button" class="btn btn-danger light">Close</button>
                                                    <button id="previewClick" type="button" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                      @include('helper/basic_form_submit',['click' => 'previewClick','formid'=>'sendmoneyForm','msg'=>'previewMsg'])


                                   

                                   


		
@include('user/footer')		