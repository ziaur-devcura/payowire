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

                                                    <h4 class="card-title">Create virtual card</h4>
                                                <span>Virtual visas and master cards are just at your fingertip.</span>

                                            </div>


                                                        
                                        </div>

                                               
                                                
                                                    <div class="row">

                                                     
                                                        <div class="col-12 col-md-12  col-xl-6 justify-content-center m-auto mt-0 ">

                                                             <div class="col-11 col-md-6 col-lg-8 col-xl-10 m-auto">
                                                            

                                                            <div class="card-bx virtual_card_bg mb-3 m-auto card_min_width">
                                    <div class="card-info text-white">
                                        <div class="d-flex align-items-center">
                                              <div class="me-auto">
                                                <img  src="{{URL::asset('backend/images/chip.png')}}" height="auto" width="40px" class="mt-2 mb-3" alt="">
                                                <h3 class="fs-29 text-white mb-3">4865 XXXX XXXX XXXX</h3>
                                            </div>
                                          
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-sm-5 me-3">
                                                <p class="fs-14 mb-1">EXPIRY</p>
                                                <b>{{date('m/y', strtotime('-1 month',strtotime('+3 years')))}}</b>
                                            </div>
                                            <div>
                                                <p class="fs-14 mb-1">CARD HOLDER</p>
                                                <b>{{$userData->name}}</b>
                                            </div>
                                        </div>

                                          <img src="{{URL::asset('backend/images/visa.png')}}" height="auto" width="75px" class="mb-4 virtial_card_logo" alt="">

                                          <img class="com_logo_vcc" src="{{URL::asset('frontend/assets/img/logo.png')}}" height="33px" width="auto" alt="logo">

                                    </div>
                                </div>

                                <form class="card_min_width m-auto" method="POST" action="{{route('user.new_visa_card')}}" id="visacreateForm"> 

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                     <input type="hidden" id="visaCardPack" name="cardpack">

                                      <div class="mb-3 row ">
                                        <label class="form-label">Card Type</label>
                                        <div class="justify-content-center">
                                        <button  onclick="visa_card_pack_select(this,1)" type="button" class="btn btn-rounded btn-outline-info visatype">Debit</button>
                                        <button  onclick="visa_card_pack_select(this,2)" type="button" class="btn btn-rounded btn-outline-info visatype">Business Debit</button>
                                    </div>
                                </div>

                           

                                                         <div class="mb-3" id="visa_PackMsg">
                                                        </div>

                                <div class="justify-content-center mt-4">

                                                            <button type="button" onclick="set_card_amount_visa(5);" class="btn light btn-primary btn-md mb-2">$5</button>

                                                            <button type="button" onclick="set_card_amount_visa(10);" class="btn light btn-primary btn-md mb-2">$10</button>

                                                            <button type="button" onclick="set_card_amount_visa(20);" class="btn light btn-primary btn-md mb-2">$20</button>

                                                            <button type="button" onclick="set_card_amount_visa(50);" class="btn light btn-primary btn-md mb-2">$50</button>

                                                            <button type="button" onclick="set_card_amount_visa(100);" class="btn light btn-primary btn-md mb-2">$100</button>

                                                            <button type="button" onclick="set_card_amount_visa(200);" class="btn light btn-primary btn-md mb-2">$200</button>

                                                            <button type="button" onclick="set_card_amount_visa(500);" class="btn light btn-primary btn-md mb-2">$500</button>

                                                            <button type="button" onclick="set_card_amount_visa(1000);" class="btn light btn-primary btn-md mb-2">$1000</button>
                                                            

                                                        </div>

                                                        <div class="justify-content-center mt-4">

                                                            <div class="mb-3">
                                                <label class="form-label">Amount (USD)</label>
                                                <input type="text" id="visa_amount" name="cardAmount" class="form-control amount" placeholder="Enter usd amount">
                                            </div>
                                            <div class="mb-3">

                                            <button id="createVisaClick" type="button" class="btn btn-primary">Continue</button>
                                        </div>

                                        <div class="mb-3" id="visaMsg">
                                        </div>


                                                        </div>

                                                    </form>

                                                     @include('helper/basic_form_submit',['click' => 'createVisaClick','formid'=>'visacreateForm','msg'=>'visaMsg'])




                                                        </div>

                                                        

                                                    </div>


                                       


                                                        <div class="col-12 col-md-12  col-xl-6 justify-content-center m-auto mt-0">

                                                            <div class="col-11 col-md-6 col-lg-8 col-xl-10 m-auto">
                                                            


                                                                             <div class="card-bx virtual_card_bg mb-3 m-auto card_min_width">
                                    <div class="card-info text-white">
                                        <div class="d-flex align-items-center">
                                            <div class="me-auto">
                                                <img  src="{{URL::asset('backend/images/chip.png')}}" height="auto" width="40px" class="mt-2 mb-3" alt="">
                                                <h3 class="fs-29 text-white mb-3">5000 1234 5678 9876</h3>
                                            </div>
                                            
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-sm-5 me-3">
                                                <p class="fs-14 mb-1">EXPIRY</p>
                                                <b>08/21</b>
                                            </div>
                                            <div>
                                                <p class="fs-14 mb-1">CARD HOLDER</p>
                                                <b>{{$userData->name}}</b>
                                            </div>
                                        </div>

                                        <img src="{{URL::asset('backend/images/mastercard.png')}}" height="auto" width="58px" class="mb-2 virtial_card_logo" alt="">


                                          <img class="com_logo_vcc" src="{{URL::asset('frontend/assets/img/logo.png')}}" height="33px" width="auto" alt="logo">


                                    </div>
                                </div>

                                <form class="card_min_width m-auto" method="POST" action="{{route('user.new_master_card')}}" id="mastercreateForm"> 

                                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                                       <input type="hidden" id="masterCardPack" name="cardpack">



                                     <div class="mb-3 row">
                                        <label class="form-label">Card Type</label>
                                        <div class="justify-content-center">
                                        <button i onclick="master_card_pack_select(this,1);" type="button" class="btn btn-rounded btn-outline-info mastertype">Debit</button>
                                        <button  onclick="master_card_pack_select(this,2);" type="button" class="btn btn-rounded btn-outline-info mastertype">Business Debit</button>
                                    </div>
                                                        </div>

                                                        <div class="mb-3" id="master_PackMsg">
                                                        </div>




                                   <div class="justify-content-center mt-4">

                                                            <button type="button" onclick="set_card_amount_mastercard(5);" class="btn light btn-primary btn-md mb-2">$5</button>

                                                            <button type="button" onclick="set_card_amount_mastercard(10);" class="btn light btn-primary btn-md mb-2">$10</button>

                                                            <button type="button" onclick="set_card_amount_mastercard(20);" class="btn light btn-primary btn-md mb-2">$20</button>

                                                            <button type="button" onclick="set_card_amount_mastercard(50);" class="btn light btn-primary btn-md mb-2">$50</button>

                                                            <button type="button" onclick="set_card_amount_mastercard(100);" class="btn light btn-primary btn-md mb-2">$100</button>

                                                            <button type="button" onclick="set_card_amount_mastercard(200);" class="btn light btn-primary btn-md mb-2">$200</button>

                                                            <button type="button" onclick="set_card_amount_mastercard(500);" class="btn light btn-primary btn-md mb-2">$500</button>

                                                            <button type="button" onclick="set_card_amount_mastercard(1000);" class="btn light btn-primary btn-md mb-2">$1000</button>
                                                            


                                                        </div>

                                                        <div class="justify-content-center mt-4">

                                                            <div class="mb-3">
                                                <label class="form-label">Amount (USD)</label>
                                                <input type="text" id="mastercard_amount" name="cardAmount" class="form-control amount" placeholder="Enter usd amount">
                                            </div>
                                            <div class="mb-3">

                                            <button id="masterCreateClick" type="button" class="btn btn-primary">Continue</button>
                                        </div>

                                        <div class="mb-3" id="masterMsg">
                                        </div>

                                                        </div>

                                                    </form>

                                                     @include('helper/basic_form_submit',['click' => 'masterCreateClick','formid'=>'mastercreateForm','msg'=>'masterMsg'])





                                                        </div>
                                                    </div>


                                                       

                                                    </div> <!--row end-->



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



 <!-- preview modal -->
                                    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="createCardPreview">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Create Card (Preview)</h5>
                                                    <button onclick="close_preview(0,'#createCardPreview')" type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                  
                                                        <div class="mb-3 row" id="preview_result">

                                                   
                                                        </div>



                                        <div id="previewMsg" class="mb-3 text-center">
                                        </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button onclick="close_preview(0,'#createCardPreview')" type="button" class="btn btn-danger light">Close</button>
                                                    <button id="previewClick1" type="button" class="btn btn-primary d-none">Confirm</button>
                                                    <button id="previewClick2" type="button" class="btn btn-primary d-none">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                     @include('helper/basic_form_submit',['click' => 'previewClick1','formid'=>'visacreateForm','msg'=>'previewMsg'])

                                     @include('helper/basic_form_submit',['click' => 'previewClick2','formid'=>'mastercreateForm','msg'=>'previewMsg'])



                                        <!-- SUCCESS modal -->

                                        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="successModal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header success_modal">
                                                    <div class="modal-title text-white m-auto"><i class="bi bi-check-circle fa-7x"></i></div>
                                                     <button type="button" class="btn-close success_modal_closeBtn" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  
                                                        <div class="mb-3 row text-center">

                                                            <h4 class="text-success">Success!</h4> 
                                                <p id="success_modal_message"></p>
                                               
                                                        </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>




		
@include('user/footer')		