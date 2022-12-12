@include('user/header')
@include('user/sidebar')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

                 @include('helper/header_notify')
        
			
				<div class="row">

					<div class="col-xl-12 col-xxl-12">
						<div class="card">
							<div class="card-body">


								<div class="row align-items-center">
								
									<div class="col-xl-12">

										
                                                 <div class="d-flex flex-wrap align-items-center mb-3">

                                                    <div class="me-auto">

                                                    <h4 class="card-title">Global Bank Accounts</h4>
                                                <span>Manage your all global bank accounts here.</span>

                                            </div>


                                            @if (count($all_bank_country)>0)

                                           <button onclick="clear_bank_req();" data-bs-toggle="modal" data-bs-target="#get_bank_model" type="button" class="btn btn-primary">Get Bank</button>

                                           @endif

                                                        
                                        </div>

                                               
												<div class="row">


                                                    @if (empty($my_banks))
                                                    <strong class="text-primary text-center mt-4">You do not have any bank account yet. Please request one.</strong>
                                                    @else
                                                    @foreach ($my_banks as $bank)

                                                    @if ($bank->status == '1')

                                                                        <div  class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">

                        <div onclick="location.href = '{{route('user.bankview',$bank->id)}}';" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/'.$bank->flag_code.'.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>{{$bank->cc_name}}</h4>
                                      
                                        <span class="price">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                                                    @endif


                                                    @endforeach


                                                      @foreach ($my_pending_banks as $bank)


                                                                        <div  class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div  class="card  opacity-50 bank_pending" data-toggle="tooltip" data-placement="top" title="Request under review">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/'.$bank->flag_code.'.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>{{$bank->cc_name}}</h4>
                                      
                                        <strong class="text-primary">Processing</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                                                    @endforeach



                                                     @foreach ($all_bank_country as $inc_bkey => $inactive_bank)

                                                                            <div  class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3">
                        <div  class="card opacity-50">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/'.$inc_bkey.'.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>{{$inactive_bank}}</h4>
                                      
                                        <span class="price">--</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                                                     @endforeach

                                                    
                                                    <script type="text/javascript">
    
    function choose_bank(selected,bankid)
    {

        $(".bank_select").removeClass( "bank_select" );
        $(selected).addClass( "bank_select" );
        //$("#bank_selected_row").removeClass( "d-none" );

        $("#fetch_bank_result").html('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');


         $.ajax({
        type: "POST",
        url: "route",
        data: {_token: "{{ csrf_token() }}",
                bid: bankid

        },
        dataType: "html",
        success: function(response) {

          $("#fetch_bank_result").html(response);

           $('[data-toggle="tooltip"]').tooltip();

            
        },
         error: function(xhr, textStatus, thrownError) {

            
        }
    });

    }



</script>


                                                    @endif



										




</div> <!--row end-->


			                <div class="row mt-4">

			                	<div class="col-md-6 m-auto text-center" id="fetch_bank_result">

        

			                	</div>

			                </div>



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
                                    <div class="modal fade " data-bs-backdrop="static" data-bs-keyboard="false" id="get_bank_model">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Request for bank</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form  id="reqBankForm" method="POST" action="{{route('user.request_bank')}}">

                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                                        <div class="mb-3 row" id="req_bank_select">
                                                                    <select name="bcode" class="default-select form-control wide mb-3">
                                            <option value="">Select country</option>
                                            @foreach ($all_bank_country as $bank_key => $bank_account)
                                            <option value="{{$bank_key}}">{{$bank_account}}</option>
                                            @endforeach
                                        </select>
                                                        </div>



                                        <div id="reqMsg" class="mb-3 text-center">
                                        </div>

                                    </form>


                                                </div>
                                                <div class="modal-footer">
                                                    <button onclick="check_bank_req(this)" id="reqBankCloseBtn" type="button" class="btn btn-danger light">Close</button>
                                                    <button id="reqBankclick" type="button" class="btn btn-primary">Request Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            

                                    @include('helper/basic_form_submit',['click' => 'reqBankclick','formid'=>'reqBankForm','msg'=>'reqMsg'])



		
@include('user/footer')		