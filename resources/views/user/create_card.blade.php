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

                                                     
                                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 justify-content-center m-auto">

                                                             <div class="col-11 col-md-8 col-lg-8 col-xl-8 m-auto">
                                                            

                                                            <div class="card-bx virtual_card_bg mb-3 m-auto">
                                    <div class="card-info text-white">
                                        <div class="d-flex align-items-center">
                                              <div class="me-auto">
                                                <img  src="{{URL::asset('backend/images/chip.png')}}" height="auto" width="40px" class="mt-2 mb-3" alt="">
                                                <h2 class="fs-35 text-white mb-3">5000 1234 5678 9876</h2>
                                            </div>
                                          
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-sm-5 me-3">
                                                <p class="fs-14 mb-1">VALID THRU</p>
                                                <b>08/21</b>
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


                                <div class="justify-content-center mt-4">

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$5</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$10</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$20</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$50</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$100</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$200</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$500</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$1000</button>
                                                            


                                                        </div>

                                                        <div class="justify-content-center mt-4">

                                                            <div class="mb-3">
                                                <label class="form-label">Amount (USD)</label>
                                                <input type="text" name="cardAmount" class="form-control amount" placeholder="Enter usd amount">
                                            </div>
                                            <div class="mb-3">

                                            <button type="button" class="btn btn-primary">Continue</button>
                                        </div>

                                                        </div>




                                                        </div>

                                                        

                                                    </div>



                                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 justify-content-center m-auto">

                                                            <div class="col-11 col-md-8 col-lg-8 col-xl-8 m-auto">
                                                            


                                                                             <div class="card-bx virtual_card_bg mb-3 m-auto">
                                    <div class="card-info text-white">
                                        <div class="d-flex align-items-center">
                                            <div class="me-auto">
                                                <img  src="{{URL::asset('backend/images/chip.png')}}" height="auto" width="40px" class="mt-2 mb-3" alt="">
                                                <h2 class="fs-35 text-white mb-3">5000 1234 5678 9876</h2>
                                            </div>
                                            
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-sm-5 me-3">
                                                <p class="fs-14 mb-1">VALID THRU</p>
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


                                   <div class="justify-content-center mt-4">

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$5</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$10</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$20</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$50</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$100</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$200</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$500</button>

                                                            <button type="button" class="btn light btn-primary btn-md mb-2">$1000</button>
                                                            


                                                        </div>

                                                        <div class="justify-content-center mt-4">

                                                            <div class="mb-3">
                                                <label class="form-label">Amount (USD)</label>
                                                <input type="text" name="cardAmount" class="form-control amount" placeholder="Enter usd amount">
                                            </div>
                                            <div class="mb-3">

                                            <button type="button" class="btn btn-primary">Continue</button>
                                        </div>

                                                        </div>




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





		
@include('user/footer')		