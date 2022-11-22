    <div class="ctp-footer-area pt-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="ctp-footer-widget">
                            <div class="logo">
								<a href="index.html"><img src="{{URL::asset('frontend/assets/img/logo.png')}}" alt="logo"></a>
							</div>
							<ul class="social-links">
                                <span>Find us on social media</span>
								<li><a href="https://www.facebook.com/100087202935067/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://www.twitter.com/payowire" target="_blank"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
								<li><a href="https://www.linkedin.com/company/payowire" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
							</ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="ctp-footer-widget">
                            <h3>Company</h3>

                            <ul class="links">
                                <li>
                                    <a href="about.php">About us</a>
                                </li>
                                <li>
                                    <a href="globalaccount.php">Global Account</a>
                                </li>
                                <li>
                                    <a href="cards.php">Cards</a>
                                </li>
                                <li>
                                    <a href="payment.php">Payment</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="ctp-footer-widget">
                            <h3>Support</h3>

                            <ul class="links">
                                <li>
                                    <a href="faq.php">Faq</a>
                                </li>
                                <li>
                                    <a href="terms.php">Terms and conditions</a>
                                </li>
                                <li>
                                    <a href="policy.php">Privacy policy</a>
                                </li>
                                <li>
                                    <a href="contact.php">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="ctp-footer-widget">
                            <h3>Need help?</h3>
                            
                            <ul class="info">
                                <li>
                                    <span>Location: </span>
                                    30 N Gould St Ste R
Sheridan, WY 82801, US
                                </li>
                                <li>
                                    <span>Email: </span>
                                    <a href="mailto:support@payowire.com">support@payowire.com</a>
                                </li>
                                <li>
                                    <span>Email: </span>
                                    <a href="tel:+1 7148459616">+1 7148459616</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="copyright-area">
                    <p>© 2022-2023 Copyright By <a href="https://payowire.com/" target="_blank"> PAYOWIRE</a>
                    All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
        <!-- End Footer Area -->

        <div class="go-top"><i class="fas fa-arrow-up"></i></div>

        <!-- Dark/Light Toggle -->
		<div class="dark-version">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider">
                <span class="slider round"></span>
            </label>
        </div>

        <!-- Links of JS files -->
        <script src="{{URL::asset('frontend/assets/js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/meanmenu.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/nice-select.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/slick.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/magnific-popup.min.js')}}"></script>
		<script src="{{URL::asset('frontend/assets/js/appear.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/odometer.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/parallax.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/wow.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/form-validator.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/contact-form-script.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{URL::asset('frontend/assets/js/main.js')}}"></script>
        
        <!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 14759844;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/14759844/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->
    </body>
</html>