  @include('frontend/header')   
   <!-- Start Page Title Area -->
        <div class="page-title-section">
            <div class="container">
                <div class="page-title-text">
                    <h2>Our Cards Features</h2>
                    <p>Our Cards Features</p>

                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Cards</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title Area --> 
        
        <!-- Start Services Area -->
            <div class="ctp-services-area pb-75">
                <div class="container">
                    <div class="section-title ctp-title">
                        <h2>Personal Currency Transfers Services</h2>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-sm-6">
                            <div class="ctp-services-card">
                                <h3>
                                    <div class="icon">
                                        <img src="{{URL::asset('frontend/assets/img/currency-transfer-provider/services/mobile-payment.svg')}}" alt="image">
                                    </div>
                                    Regular Payments
                                </h3>
                                <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar. quisque velit nisi, pretium ut lacinia in, elementum id enim. proin eget tortor risus. proin eget tortor risus.</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="ctp-services-card">
                                <h3>
                                    <div class="icon">
                                        <img src="{{URL::asset('frontend/assets/img/currency-transfer-provider/services/warning.svg')}}" alt="image">
                                    </div>
                                    Rate Alerts
                                </h3>
                                <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar. quisque velit nisi, pretium ut lacinia in, elementum id enim. proin eget tortor risus. proin eget tortor risus.</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="ctp-services-card">
                                <h3>
                                    <div class="icon">
                                        <img src="{{URL::asset('frontend/assets/img/currency-transfer-provider/services/fluctuation.svg')}}" alt="image">
                                    </div>
                                    Market Analysis
                                </h3>
                                <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar. quisque velit nisi, pretium ut lacinia in, elementum id enim. proin eget tortor risus. proin eget tortor risus.</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="ctp-services-card">
                                <h3>
                                    <div class="icon">
                                        <img src="{{URL::asset('frontend/assets/img/currency-transfer-provider/services/contract.svg')}}" alt="image">
                                    </div>
                                    Spot Contracts
                                </h3>
                                <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar. quisque velit nisi, pretium ut lacinia in, elementum id enim. proin eget tortor risus. proin eget tortor risus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Services Area -->
        <!-- Start Services Area -->
        <section class="services-area ptb-70 bg-f7fafd">
            <div class="container-fluid p-0">
                <div class="overview-box">
                    <div class="overview-image">
                        <div class="image">
                            <img src="{{URL::asset('frontend/assets/img/5.png')}}" alt="image">

                            <div class="circle-img">
                                <img src="{{URL::asset('frontend/assets/img/circle.png')}}" alt="image">
                            </div>
                        </div>
                    </div>

                    <div class="overview-content">
                        <div class="content">
                            <span class="sub-title">Top Security</span>
                            <h2>Small- to medium-sized businesses</h2>
                            <div class="bar"></div>
                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                            <ul class="features-list">
                                <li><span><i class="flaticon-check-mark"></i> Easy transfers</span></li>
                                <li><span><i class="flaticon-check-mark"></i> Deposit checks instantly</span></li>
                                <li><span><i class="flaticon-check-mark"></i> A powerful open API</span></li>
                                <li><span><i class="flaticon-check-mark"></i> Coverage around the world</span></li>
                                <li><span><i class="flaticon-check-mark"></i> Business without borders</span></li>
                                <li><span><i class="flaticon-check-mark"></i> Affiliates and partnerships</span></li>
                            </ul>

                            <a href="#" class="btn btn-primary">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Area -->
     <!-- Start Services Area -->
        <section class="services-area ptb-70">
            <div class="container-fluid p-0">
                <div class="overview-box">
                    <div class="overview-content">
                        <div class="content left-content">
                            <span class="sub-title">Price Transparency</span>
                            <h2>Large or enterprise level businesses</h2>
                            <div class="bar"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                            <ul class="features-list">
                                <li><span><i class="flaticon-check-mark"></i> Corporate Cards</span></li>
                                <li><span><i class="flaticon-check-mark"></i> International Payments</span></li>
                                <li><span><i class="flaticon-check-mark"></i> Automated accounting</span></li>
                                <li><span><i class="flaticon-check-mark"></i> Request Features</span></li>
                                <li><span><i class="flaticon-check-mark"></i> Premium Support</span></li>
                                <li><span><i class="flaticon-check-mark"></i> Direct Debit</span></li>
                            </ul>

                            <a href="#" class="btn btn-primary">Create Account</a>
                        </div>
                    </div>

                    <div class="overview-image">
                        <div class="image">
                            <img src="{{URL::asset('frontend/assets/img/6.jpg')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Area -->

        <!-- Start Footer Area -->

        @include('frontend/footer')