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

                                             <button data-bs-toggle="modal" data-bs-target="#add_bank_modal" type="button" class="btn btn-primary">Add Bank</button>


                                                        
                                        </div>

                                               
                                        <div class="row justify-content-center">


                    <div  class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="" class="card bank">
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

                    <div  class="col-6 col-md-4 col-lg-4 col-xl-2 justify-content-center mt-3 pointer">
                        <div onclick="" class="card bank">
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
                                    <div class="modal fade" tabindex="-1"  style="overflow:hidden;" data-bs-backdrop="static" data-bs-keyboard="false" id="add_bank_modal">
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


                                                        <div id="step1">

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

                                            <select  name="bank_country" class="nice-select default-select default-select form-control wide mb-3" data-toggle="select2">
                                            <option value="" selected>Select Country</option>
                                         @foreach ($get_all_country as $country)
                                         <option value="{{$country}}">{{$country}}</option>
                                         @endforeach
                                        </select>

                                                        </div>

                                                    </div>

                                                    <div id="step2"></div>


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

                                   



		
@include('user/footer')		