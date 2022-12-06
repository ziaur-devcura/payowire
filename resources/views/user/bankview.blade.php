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


                                                    <h4 class="card-title align-items-center d-flex"> 
                                                        <a href="{{route('user.bank_account')}}" class="back-icon"><i class="las la-arrow-left"></i></a> Global Bank Accounts</h4>

                                            </div>

                                                        
                                        </div>

                                               
                                                <div class="row">

                                                    <div class="accordion-item">
                                                    <div class="accordion-header collapsed" data-bs-toggle="collapse" data-bs-target="#default_collapseOne2" aria-expanded="false">
                                                        <div class="d-flex align-items-center me-auto">
                                                           
                                                           <img src="{{URL::asset('backend/icons/country/'.$bank_details->flag_code.'.png')}}" height="40px" width="40px" alt="" class="rounded-circle me-3">

                                                        <div>
                                                             <h5><b>Your {{$cur_code}} Bank Account Details</b></h5>
                                                        <span>Routing, Account number</span>
                                                        </div>


                                                            
                                                        </div>
                                                        <span class="view-bank-indicator"></span>
                                                    </div>
                                                    <div id="default_collapseOne2" class="accordion_body collapse" data-bs-parent="#accordion-one">
                                                       {!!$bank_collaps!!}
                                                    </div>
                                                </div>
                                                    
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





		
@include('user/footer')		