<!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
		
            <div class="copyright">
                <p>Copyright © Payowire {{date('Y')}}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

   
    <!-- Required vendors -->
    <script src="{{URL::asset('backend/vendor/global/global.min.js')}}"></script>
	<script src="{{URL::asset('backend/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{URL::asset('backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

          <!--  Select2 Js -->
        <script src="{{ URL::asset('backend/vendor/select2/js/select2.min.js') }}"></script>

	
   
	
	<!-- Dashboard 1 -->
	<script src="{{URL::asset('backend/js/dashboard/dashboard-1.js')}}"></script>

    <script src="{{URL::asset('backend/js/custom.min.js')}}"></script>
	<script src="{{URL::asset('backend/js/dlabnav-init.js')}}"></script>


    <!-- Toastr -->
    <script src="{{URL::asset('backend/vendor/toastr/js/toastr.min.js')}}"></script>

    <script src="{{URL::asset('backend/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>

     <!-- pooper -->
    <script src="{{URL::asset('backend/js/popper.min.js')}}"></script>


     <!-- My app js -->
    <script src="{{URL::asset('backend/js/myapp.js?v=1')}}"></script>

    @include('helper/header_toast')

    



	
</body>
</html>