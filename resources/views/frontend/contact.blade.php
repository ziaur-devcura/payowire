 @include('frontend/header')  
        <!-- Start Page Banner Area -->
        <div class="ctp-page-banner-area" data-jarallax='{"speed": 0.3}'>
            <div class="container">
                <div class="ctp-page-banner-content">
                    <h3>Contact Us</h3>
                    <ul class="list">
                        <li>
                            <a href="index-7.html">Home</a>
                        </li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner Area -->

        <div class="currency-transfer-provider-with-background-color">
            
            <!-- Start Contact Area -->
            <div class="ctp-contact-area ptb-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12">
                            <div class="ctp-contact-form">
                                <h3>Get In Touch With Us</h3>

                                <form id="contactForm">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Sergio Laughlin">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Surname</label>
                                        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your surname" placeholder="George">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="luvion@gmail.com">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="+ (321) 984 754">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message" placeholder="Write message here"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Send Us Your Enquiry</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="ctp-contact-information">
                                <div class="information-box">
                                    <h3>Our Contact Address Details</h3>

                                    <ul class="contact-info">
                                        <li class="address">
                                            <span class="sub">US:</span>
                                            30 N Gould St Ste R Sheridan, WY 82801
                                        </li>
                                          <li class="address">
                                            <span class="sub">UK:</span>
                                            189 WHITECHAPEL ROAD LONDON ENGLAND E1 1DN
                                        </li>
                                        <li class="email">
                                            <span class="sub">Email:</span>
                                            <div class="info">
                                                <span>Contact Email</span>
                                                <a href="mailto:support@payowire.com">support@payowire.com</a>
                                            </div>
                                          
                                        </li>
                                        <li class="phone">
                                            <span class="sub">Phone:</span>
                                          
                                            <div class="info">
                                                <span>Business</span>
                                                <a href="tel:32154984">+13072698645</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="information-box">
                                    <h3>Office Hours</h3>

                                    <ul class="time-info">
                                        <li class="d-flex align-items-center justify-content-between">
                                            <span class="color">Monday - Thursday:</span>
                                            <span>8:00am - 8:00pm</span>
                                        </li>
                                        <li class="d-flex align-items-center justify-content-between">
                                            <span class="color">Friday:</span>
                                            <span>10:00am - 6:00pm</span>
                                        </li>
                                        <li class="d-flex align-items-center justify-content-between">
                                            <span class="color">Saturday:</span>
                                            <span>10:00am - 2:00pm</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="information-map">
                                   <div class="mapouter"><div class="gmap_canvas"><iframe width="404" height="345" id="gmap_canvas" src="https://maps.google.com/maps?q=30%20N%20Gould%20St%20Ste%20R%20Sheridan,%20WY%2082801&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:345px;width:404px;}</style><a href="https://www.embedgooglemap.net">google map embed code</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:345px;width:404px;}</style></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Contact Area -->

        </div>

        <!-- Start Footer Area -->
       
        <!-- Start Footer Area -->
         @include('frontend/footer')