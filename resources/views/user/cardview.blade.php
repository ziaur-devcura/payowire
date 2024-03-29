@include('user/header')
@include('user/sidebar')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

                 

                   <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="row align-items-center">
                                
                                    <div class="col-xl-12">

                                        
                                                 <div class="d-flex flex-wrap align-items-center mb-3">

                                                    <div class="me-auto">

                                                    <h4 class="card-title d-flex align-items-center">{{$card->brand}} {!!$card->package!!}</h4>
                                                <span>Manage your virtual card here.</span>

                                            </div>


                                                        
                                        </div>

                                               
                                                
                                                    <div class="row justify-content-center">

                                                        <div class="col-12 col-md-12  col-xl-6 justify-content-center m-auto mt-0 me-0">

                                                             <div class="col-11 col-md-6 col-lg-8 col-xl-10 m-auto">

                                                                 <div class="ms-auto card_min_width text-center mb-3">

                                                                <h5>Status: {!!$card->status!!}</h5>

                                                                
                                                            </div>
                                                            

                                                            <div class="card-bx virtual_card_bg mb-3 ms-auto card_min_width">
                                    <div class="card-info text-white">
                                        <div class="d-flex align-items-center">
                                              <div class="me-auto">
                                                <img  src="{{URL::asset('backend/images/chip.png')}}" height="auto" width="40px" class="mt-2 mb-3" alt="">
                                                <h3 data-toggle="tooltip" data-placement="top" title="Click to copy" onclick="click_to_copy(this,'{{$card->number}}')" class="fs-29 text-white mb-3 pointer">{{$card->number}}</h3>
                                            </div>
                                          
                                        </div>
                                        <div class="d-flex">

                                            <div class="me-sm-3 me-3">
                                                <p class="fs-12 mb-1">CARD HOLDER</p>
                                                <b class="mt-0 pointer" data-toggle="tooltip" data-placement="top" title="Click to copy" onclick="click_to_copy(this,'{{$userData->name}}')">{{substr($userData->name,0,16)}}</b>
                                            </div>


                                            <div class="me-sm-3 me-3">
                                                <p class="fs-12 mb-1">EXPIRY</p>
                                                <b class="mb-2 pointer" data-toggle="tooltip" data-placement="top" title="Click to copy" onclick="click_to_copy(this,'{{$card->card_expire}}')">{{$card->card_expire}}</b>
                                            </div>

                                            <div>
                                                <p class="fs-12 mb-1">CVC</p>
                                                <b class="mb-2 pointer" data-toggle="tooltip" data-placement="top" title="Click to copy" onclick="click_to_copy(this,'{{$card->card_cvv}}')">{{$card->card_cvv}}</b>
                                            </div>
                                            
                                        </div>

                                          <img src="{{URL::asset('backend/images/visa.png')}}" height="auto" width="75px" class="mb-4 virtial_card_logo" alt="">

                                          <img class="com_logo_vcc" src="{{URL::asset('frontend/assets/img/logo.png')}}" height="33px" width="auto" alt="logo">

                                    </div>
                                </div>

                                  <div class="ms-auto card_min_width text-center mb-3">
                                    <h4>
                                                                    <span class="badge light badge-primary justify-content-center">Balance: <b class="text-info">${{$card->balance}}</b></span>
                                                                    <button onclick="click_to_copy(this,'30 N Gould St Ste R Sheridan, WY 82801')" type="button" class="badge  badge-primary justify-content-center" data-toggle="tooltip" data-placement="top" title="Click to copy">Billing Address</button>
                                                                </h4>
                                                            </div>


                                                            <div class="ms-auto card_min_width text-center mb-4 mt-4">

                                                                <div class="btn-group ">
                                    <button onclick="clear_card_addFund();" data-toggle="tooltip" data-placement="top" title="Top-up fund" type="button" class="btn light btn-secondary" data-bs-toggle="modal" data-bs-target="#add_fund_modal"><i class="fa fa-plus"></i></button>

                                    <button onclick="clear_card_withdrawFund();" data-toggle="tooltip" data-placement="top" title="Withdraw fund" type="button" class="btn light btn-secondary" data-bs-toggle="modal" data-bs-target="#withdraw_fund_modal"><i class="fa fa-arrow-up"></i></button>

                                    <a href="{{route('user.update_card.status',$card->id)}}?status={{$card->status_code}}" data-toggle="tooltip" data-placement="top" title="{{$card->status_toollip}}" type="button" class="btn light btn-secondary"><i class="fa fa-snowflake"></i></a>

                                    <button  data-toggle="tooltip" data-placement="top" title="Get statement" type="button" class="btn light btn-secondary"><i class="fa fa-file-alt"></i></button>
                                </div>
                                    
                                                            </div>

                                
                                                            



                                 </div>

                               

                                    </div>



                                    <div class="col-12 col-md-12  col-xl-4 justify-content-center m-auto ms-0">

                                                             <div class="col-11 col-md-6 col-lg-8 col-xl-10 m-auto">

                                                                 <div class="chart-point m-auto ms-xl-0 col cardview_chart justify-content-center justify-content-xl-start">
                                            <div class="check-point-area">
                                                <canvas id="viewcard_chart"></canvas>
                                            </div>
                                            <ul class="chart-point-list">
                                                <li><i class="fa fa-circle text-primary me-1"></i> 40% Spend</li>
                                                <li><i class="fa fa-circle text-success me-1"></i> 35% Unused</li>
                                            </ul>
                                        </div>
                                                             </div>

                                                         </div>

                                                         <script type="text/javascript">
                                                             
                                                                if(jQuery('#viewcard_chart').length > 0 ){
            //doughut chart
            const doughnut_chart = document.getElementById("viewcard_chart").getContext('2d');
            // doughnut_chart.height = 100;
            new Chart(doughnut_chart, {
                type: 'doughnut',
                data: {
                    weight: 5,  
                    defaultFontFamily: 'Poppins',
                    datasets: [{
                        data: [45, 25],
                        borderWidth: 3, 
                        borderColor: "rgba(255,255,255,1)",
                        backgroundColor: [
                            "rgba(91, 207, 197, 1)",
                            "rgba(112, 159, 186, 1)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(91, 207, 197, 0.9)",
                            "rgba(112, 159, 186, .9)"
                        ]

                    }],
                    // labels: [
                    //     "green",
                    //     "green",
                    //     "green",
                    //     "green"
                    // ]
                },
                options: {
                    weight: 1,  
                     cutoutPercentage: 70,
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

        }


                                                         </script>



                                 
                                </div> <!--row end-->


                                <!-- card Transaction -->

                                @if (count($card_transaction)>0)
                                 


                                <div class="table-responsive mt-3">
                                    <table class="table header-border table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Merchant</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                             @foreach ($card_transaction as $transaction)

                                            <tr>
                                               
                                                <td>{{$transaction->merchant}}</td>
                                                <td>
                                                    <span class="text-muted">{{date('F d,Y', strtotime($transaction->authorized_at))}}</span>
                                                </td>
                                                <td>{{$transaction->amount}} USD</td>
                                                <td>
                                                    {!!$transaction->status!!}
                                                </td>
                                            </tr>

                                            @endforeach
                                          
                                         
                                          
                                        </tbody>
                                    </table>
                                </div>

                                 
                                     
                                        @endif

                                 



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


        <!-- Add Fund -->
                                    <div class="modal fade " data-bs-backdrop="static" data-bs-keyboard="false" id="add_fund_modal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Top-up card</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form id="addfundForm" method="POST" action="{{route('user.update_card.addfund',$card->id)}}">

                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                                       <div class="mb-3 row">

                                                            <label>Amount</label>

                                                            <input type="text" id="cardAmount" name="cardAmount" class="form-control amount" placeholder="Enter amount">
                                                   
                                                        </div>



                                        <div id="addfundMsg" class="mb-3 text-center">
                                        </div>

                                        </form>


                                                </div>
                                                <div class="modal-footer">
                                                    <button data-bs-dismiss="modal" type="button" class="btn btn-danger light">Close</button>
                                                    <button id="addfundClick" type="button" class="btn btn-primary">Add Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                      @include('helper/basic_form_submit',['click' => 'addfundClick','formid'=>'addfundForm','msg'=>'addfundMsg'])



                                      <!-- Add Fund -->
                                    <div class="modal fade " data-bs-backdrop="static" data-bs-keyboard="false" id="withdraw_fund_modal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Withdraw Fund</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form id="withdrawfundForm" method="POST" action="{{route('user.update_card.addfund',$card->id)}}">

                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                                       <div class="mb-3 row">

                                                            <label>Amount</label>

                                                            <input type="text" id="cardAmountw" name="cardAmountw" class="form-control amount" placeholder="Enter amount">
                                                   
                                                        </div>



                                        <div id="withdrawfundMsg" class="mb-3 text-center">
                                        </div>

                                        </form>


                                                </div>
                                                <div class="modal-footer">
                                                    <button data-bs-dismiss="modal" type="button" class="btn btn-danger light">Close</button>
                                                    <button id="withdrawfundClick" type="button" class="btn btn-primary">Withdraw Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                      @include('helper/basic_form_submit',['click' => 'withdrawfundClick','formid'=>'withdrawfundForm','msg'=>'withdrawfundMsg'])



		
@include('user/footer')		