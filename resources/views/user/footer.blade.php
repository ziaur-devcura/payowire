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

    <!-- pooper -->
    <script src="{{URL::asset('backend/js/popper.min.js')}}"></script>

    <!-- Required vendors -->
    <script src="{{URL::asset('backend/vendor/global/global.min.js')}}"></script>
	<script src="{{URL::asset('backend/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{URL::asset('backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	
	<!-- Apex Chart -->
	<script src="{{URL::asset('backend/vendor/apexchart/apexchart.js')}}"></script>
	<script src="{{URL::asset('backend/vendor/nouislider/nouislider.min.js')}}"></script>
	<script src="{{URL::asset('backend/vendor/wnumb/wNumb.js')}}"></script>

	<!-- Chart Morris plugin files -->
    <script src="{{URL::asset('backend/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{URL::asset('backend/vendor/morris/morris.min.js')}}"></script>
    <script src="{{URL::asset('backend/js/plugins-init/morris-init.js')}}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{URL::asset('backend/js/dashboard/dashboard-1.js')}}"></script>

    <script src="{{URL::asset('backend/js/custom.min.js')}}"></script>
	<script src="{{URL::asset('backend/js/dlabnav-init.js')}}"></script>


    <!-- Toastr -->
    <script src="{{URL::asset('backend/vendor/toastr/js/toastr.min.js')}}"></script>

     <!-- My app js -->
    <script src="{{URL::asset('backend/js/myapp.js')}}"></script>



	
</body>
</html>