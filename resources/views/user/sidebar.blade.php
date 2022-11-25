
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					<li class="header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button">
							<img src="{{URL::asset('backend/images/profile/pic1.jpg')}}" width="20" alt=""/>
							<div class="header-info ms-3">
								<span class="font-w600 ">Hi,<b>{{ explode(" ",$userData->name)[0] }}</b></span>
								<small class="text-left font-w400 text-break">{{ $userData->email }}</small>
							</div>
						</a>
					
					</li>
                    <li>
                        <a class="ai-icon" href="{{route('user_home')}}">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li><a class="ai-icon" href="{{route('user.bank_account')}}">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">Bank Account</span>
						</a>
                     
                    </li>
                    <li><a class="ai-icon" href="javascript:void()">
							<i class="flaticon-041-graph"></i>
							<span class="nav-text">Add Fund</span>
						</a>
                     
                    </li>

                    <li><a class="ai-icon" href="javascript:void()">
							<i class="flaticon-086-star"></i>
							<span class="nav-text">Create Card</span>
						</a>
                    
                    </li>

                    <li><a class="ai-icon" href="javascript:void()">
							<i class="flaticon-086-star"></i>
							<span class="nav-text">Card List</span>
						</a>
                    
                    </li>
                    <li><a class="ai-icon" href="javascript:void()">
							<i class="flaticon-003-arrow-up"></i>
							<span class="nav-text">Send Money</span>
						</a>
                      
                    </li>
                    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
							<i class="flaticon-013-checkmark"></i>
							<span class="nav-text">Payment</span>
						</a>
					</li>
                  
                    <li><a class="ai-icon" href="javascript:void()">
							<i class="flaticon-043-menu"></i>
							<span class="nav-text">Transaction</span>
						</a>
                      
                    </li>
                   

                     <li><a class="ai-icon" href="javascript:void()">
                            <i class="flaticon-022-copy"></i>
                            <span class="nav-text">Statement</span>
                        </a>
                    
                    </li>

                     <li><a class="ai-icon" href="javascript:void()">
                            <i class="flaticon-022-copy"></i>
                            <span class="nav-text">Reffer</span>
                        </a>
                    
                    </li>

                     <li><a class="ai-icon" href="javascript:void()">
                            <i class="flaticon-022-copy"></i>
                            <span class="nav-text">Settings</span>
                        </a>
                    
                    </li>

                     <li><a class="ai-icon" href="javascript:void()">
                            <i class="flaticon-022-copy"></i>
                            <span class="nav-text">Logout</span>
                        </a>
                    
                    </li>
                </ul>
				<div class="copyright">
					<p>© 2022 All Rights Reserved</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->