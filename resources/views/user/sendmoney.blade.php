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

                                                    <h4 class="card-title">Instant Fund Transfer</h4>
                                                    <span>Pay to recipient's payowire account</span>

                                            </div>

                                                        
                                        </div>

                                               
                                        <div class="row justify-content-center">

                                            <div class="col-md-6 m-auto">

                                                <form id="sendmoneyForm" method="POST" action="{{route('user.sendmoneydo')}}">

                                                     <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            <div class="mb-3">
                                                <label class="form-label">Recipient Email</label>
                                                <input type="email" name="recipientEmail" class="form-control" name placeholder="Enter recipient email address">
                                            </div>

                                             <div class="mb-3">
                                                <label class="form-label">Form</label>
                                                               <select name="whichBalance" class="default-select form-control wide mb-3">
                                            <option value="usd">USD Balance</option>
                                           
                                        </select>
                                            </div>

                                             <div class="mb-3">
                                                <label class="form-label">Amount (USD)</label>
                                                <input type="text" name="sendAmount" class="form-control amount" placeholder="Enter usd amount">
                                            </div>

                                              <div class="mb-3">
                                                <label class="form-label">Purpose of payment</label>
                                                <input type="text" name="purpose" class="form-control" maxlength="100" placeholder="Enter purpose of payment">
                                            </div>

                                            <div class="mb-3 mt-3">

                                            <button id="sendmoneyCLick" type="button" class="btn btn-rounded btn-primary ms-2 mr-2">Review</button>

                                        </div>

                                        <div class="mt-4 text-center" id="sendmoneyMsg">

                                        </div>

                                        </form>

                                        @include('helper/basic_form_submit',['click' => 'sendmoneyCLick','formid'=>'sendmoneyForm','msg'=>'sendmoneyMsg'])

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
                                    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="sendmoneyPreview">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Send Money (Preview)</h5>
                                                    <button onclick="close_preview(0,'#sendmoneyPreview')" type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                  
                                                        <div class="mb-3 row" id="preview_result">

                                                   
                                                        </div>



                                        <div id="previewMsg" class="mb-3 text-center">
                                        </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button onclick="close_preview(0,'sendmoneyPreview')" type="button" class="btn btn-danger light">Close</button>
                                                    <button id="previewClick" type="button" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                     @include('helper/basic_form_submit',['click' => 'previewClick','formid'=>'sendmoneyForm','msg'=>'previewMsg'])


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
                                                <p>The fund has been successfully transferred.</p>
                                               
                                                        </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                  


		
@include('user/footer')		