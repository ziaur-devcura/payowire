@include('frontend/header')
          <!-- Start Page Title Area -->
        <div class="page-title-section">
            <div class="container">
                <div class="page-title-text">
                    <h2>Our Global Accounts Features</h2>
                    <p>Our Global Accounts Features</p>

                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>global account </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title Area --> 
        <!-- Start Money Transfer Area -->
            <div class="ctp-money-transfer-area pb-75">
                <div class="container">
                    <div class="section-title ctp-title">
                        <h2>How Does Money Transfer Work?</h2>
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="ctp-money-transfer-card">
                                <h3>Create a free account</h3>
                                <div class="image">
                                    <img src="{{URL::asset('frontend/assets/img/currency-transfer-provider/money-transfer/customer.png')}}" alt="image">
                                    <div class="number">01</div>
                                </div>
                                <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh.</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="ctp-money-transfer-card">
                                <h3>Send your funds</h3>
                                <div class="image">
                                    <img src="{{URL::asset('frontend/assets/img/currency-transfer-provider/money-transfer/profits.png')}}" alt="image">
                                    <div class="number">02</div>
                                </div>
                                <p>Vivamus suscipit tortor eget felis porttitor volutpat. sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada.</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="ctp-money-transfer-card">
                                <h3>Track your transfer</h3>
                                <div class="image">
                                    <img src="{{URL::asset('frontend/assets/img/currency-transfer-provider/money-transfer/data.png')}}" alt="image">
                                    <div class="number">03</div>
                                </div>
                                <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. vivamus suscipit tortor eget felis porttitor volutpat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Money Transfer Area -->
   

        <!-- Start Footer Area -->
        @include('frontend/footer')