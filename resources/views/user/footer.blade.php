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
	
    
	
</body>
</html>