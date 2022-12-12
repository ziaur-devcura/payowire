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

                          
                            <div class="card-body  p-0">


                                <div class="d-flex flex-wrap align-items-center m-4">

                                <div class="me-auto">
                                    <h4 class="card-title mb-2">All Transactions</h4>
                                    <span class="fs-12">You can view all your transactions</span>
                                </div>

                                 @if (count($all_transaction)>0)

                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#search_card_modal" class="btn btn-primary btn-rounded btn-md"><i class="flaticon-381-search-2"></i></a>
                                @endif

                            </div>

                               @if (count($all_transaction)>0)

                           

                                    <div class="table-responsive">
                                        <table class="table table-responsive-md card-table transactions-table table-fit">

                                            <thead>

                                        <tr role="row">
   <th class="sorting" style="width: 14rem;">Transaction ID</th>
   <th class="sorting">Date Time</th>
   <th class="sorting">Amount</th>
   <th class="sorting">Type</th>

   <th class="sorting" style="width: 13rem;">Previous Balance</th>

   <th class="sorting" style="width: 13rem;">Current Balance</th>


   <th class="sorting">Status</th>


 </tr>
                                    </thead>

                                            <tbody>

                                              

                                         @foreach ($all_transaction as $transaction)
                               
                              
                                                <tr>

                                                       <td class="text-nowrap">

                                                        <div class="d-flex flex-row bd-highlight align-items-center">
  <div class="bd-highlight">
       {!!$transaction->type_icon!!}
  </div>
  <div class="bd-highlight">
      <h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);" onclick="click_to_copy(this,'{{$transaction->id}}')" data-toggle="tooltip" data-placement="top" title="Click to copy" class="text-black">#{{$transaction->id}}</a></h6>
  </div>
</div>

                                                        
                                                    </td>

                                                     <td class="text-nowrap">
                                                        <h6 class="fs-16 text-black font-w600 mb-0">{{$transaction->date}}</h6>
                                                        <span class="fs-14">{{$transaction->time}}</span>
                                                    </td>

                                                     <td><span class="fs-16 text-black font-w600">{{$transaction->next_type}}{{$transaction->amount}}</span></td>

                                                     <td>
                                                        <h6 class="fs-16 font-w600 mb-0">{!!$transaction->type!!}</h6>
                                                    </td>


                                                    <td><span class="fs-16 text-black font-w600">${{$transaction->prev_balance}}</span></td>


                                                   
                                                    <td><span class="fs-16 text-black font-w600">${{$transaction->next_balance}}</span></td>


                                                   
                                                    <td>{!!$transaction->status!!}</td>
                                                </tr>

                                                @endforeach
                                       
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                      

                                        @else
                                        <hr class="mt-2">
                                        <center class="text-default"><p>You do not have any transaction yet.</p></center>
                                        @endif


                                           <div class="row mt-3">
                                            <div class="col-md-12 m-4">

                                                {{$all_transaction->links()}}
            
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