@include('user/header')
@include('user/sidebar')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

                @include('helper/header_notify')
        

                <div class="col-xl-12">
                                <div class="card">
                                  
                                    <div class="card-body pb-0">

                                            <div class="d-flex flex-wrap align-items-center mb-5">

                                                    <div class="me-auto">
                                                    <h4 class="card-title">Your All Card </h4>
                                                <span>Manage your card details, transaction</span>
                                                <p class="mt-2"><span class="badge badge-pill badge-info">{{$get_all_card}}</span> <span class="badge badge-pill badge-info">Total card: {{$count_total_card}}</span> <span class="badge badge-pill badge-info">Total visa card: {{$count_visa_card}}</span> <span class="badge badge-pill badge-info">Total master card: {{$count_master_card}}</span></p>

                                            </div>


                                          @if (count($get_all_card)>0)
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#search_card_modal" class="btn btn-primary btn-rounded btn-md mx-3"><i class="flaticon-381-search-2"></i></a>
                                        @endif
                                                        
                                        </div>



                                         @if (count($get_all_card)>0)

                                         @foreach ($get_all_card as $card)


                                        <div class="d-flex mb-3 border-bottom justify-content-between flex-wrap align-items-center">
                                            <div class="d-flex pb-3 align-items-center col-md-2">
                                                <img src="{{$card->bg_url}}" alt="" class="rounded me-3 card-list-img" width="130">
                                                <div class="me-3">
                                                    <p class="fs-14 mb-1">Card Type</p>
                                                    <span class="text-black font-w500">{{$card->package}}</span>
                                                </div>
                                            </div>
                                            <div class="me-3 pb-3">
                                                <p class="fs-14 mb-1">Card Brand</p>
                                                <span class="text-black font-w500">{!!$card->brand!!}</span>
                                            </div>
                                            <div class="me-3 pb-3">
                                                <p class="fs-14 mb-1">Card Number</p>
                                                <span class="text-black font-w500">**** **** **** {{$card->last_4_digit}}</span>
                                            </div>
                                            <div class="me-3 pb-3">
                                                <p class="fs-14 mb-1">Name in Card</p>
                                                <span class="text-black font-w500">{{$userData->name}}</span>
                                            </div>
                                            <a href="{{route('user.cardview',$card->id)}}" class="fs-14 btn-link me-3 pb-3">See Details</a>
                                            <div class="dropdown pb-3">
                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0);">Freeze</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

                                        @else
                                        <hr class="mt-2">
                                        <center class="text-primary"><p>No Data Available</p></center>
                                        @endif

                                          <div class="row mt-3">
                                            <div class="col-md-12">

                                                {{$get_all_card->links()}}
            
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
                                    <div class="modal fade " data-bs-backdrop="static" data-bs-keyboard="false" id="search_card_modal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Search Card</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="GET" action="{{route('user.cardlist')}}">

                                                        <div class="mb-3 row">

                                                             <label class="form-label">Card Last 4 Digit</label>

                                                            <input name="last4" type="text" class="form-control input-default only-digit" placeholder="enter card last 4 digit" maxlength="4">
                                                 
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button data-bs-dismiss="modal" type="button" class="btn btn-danger light">Close</button>
                                                    <button  type="submit" class="btn btn-primary">Find</button>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>



		
@include('user/footer')		