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

										<h4 class="card-title">Global Bank Accounts</h4>
												<span>Manage your all global bank accounts here.</span>

												<div class="row">


											<div  class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_bank(this)" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/us.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>USA (USD)</h4>
                                      
                                        <span class="price">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    			<div class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_bank(this)" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/hk.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>Hongkong (HKD/EUR)</h4>
                                      
                                        <span class="price">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    	<div class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_bank(this)" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/gb.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>UK (GBP)</h4>
                                      
                                        <span class="price">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    	<div class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_bank(this)" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/jp.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>Japan (JPY)</h4>
                                      
                                        <span class="price">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    	<div class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_bank(this)" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/ca.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>Canada (CAD)</h4>
                                      
                                        <span class="price">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    	<div class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_bank(this)" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/au.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>Australia (AUD)</h4>
                                      
                                        <span class="price">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    	<div class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_bank(this)" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/sg.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>Singapore (SGD)</h4>
                                      
                                        <span class="price">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    	<div class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_bank(this)" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/ee.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>Estonia (EUR)</h4>
                                      
                                        <span class="price">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    	<div class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="choose_bank(this)" class="card bank">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="text-center">
                                        <img class="border" height="27px" width="40px" src="{{URL::asset('backend/icons/country/nz.png')}}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>New Zealand (NZD)</h4>
                                      
                                        <span class="price">0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



<script type="text/javascript">
	
	function choose_bank(selected)
	{
		$(".bank_select").removeClass( "bank_select" );
		$(selected).addClass( "bank_select" );
		$("#bank_selected_row").removeClass( "d-none" );


	}
</script>



			                </div> <!--row end-->


			                <div class="row mt-2 d-none" id="bank_selected_row">

			                	<div class="col-md-6 m-auto text-center">

			                		<button type="button" class="btn btn-rounded btn-primary ms-2 mr-2"><span class="btn-icon-start text-primary"><i class="fa fa-money-bill"></i>
                                    </span>Manage Currency</button>

                                    <button type="button" class="btn btn-rounded btn-primary ms-2 mr-2">Request Bank</button>

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
		
@include('user/footer')		