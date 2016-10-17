

<!-- Start FOOTER -->
<!-- <div class="page-footer">
<div class="container">
    <div class="row ">
        <div class="row wow slideInUp">
        <div class="col-md-4 address">
            <div class="row">
                <div class="col-md-12 text-left">
                <span class="small-title  ">Address</span>
                    <address>
                        <span><i class="chat-box fa fa-home"></i> <strong>Address :</strong> H:47,R:15, Nikunja-2 Dhaka –1212</span>
                        <span><i class="chat-box fa fa-envelope-o"></i> <strong>E-mail :</strong>info@fumontor.com</span>
                        <span><i class="chat-box fa fa-phone"></i> <strong>Telephone :</strong>+8801684536534</span>
                        <span><i class="chat-box fa fa-fax"></i> <strong>Fax :</strong> 88-2-8819921</span> 
                         
                    </address>
                </div>
                <div class="col-md-6">
                    <div class="map-container">
                        <div class="map">
                            <div id="googleMap" style="width:100%;height:200px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 contact text-center">
            <span class="small-title">Ask A Question</span>
            <div class="row">
                <form class="contact-form cool-shadow">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="" value="" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="" class="form-control" value="" placeholder="Phone Number">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="" rows="2" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="center ">
                        <input type="submit" class="btn btn-danger cool-shadow btn-emboshed btn-wide" name="" value="SEND">
                    </div>
                    <span class="question fa fa-question-circle cool-shadow"></span>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <span class="small-title text-left">Links</span>
            <ul class="foot-links">
                <li class=""><a   href="">Home</a></li>
                <li class=""><a   href="">About Us</a></li>
                <li class=""><a   href="">Contact</a></li>
                <li class=""><a   href="">Terms & Conditions</a></li>
                <li class=""><a   href="">How it works</a></li>
                <li class=""><a   href="">FAQ</a></li>
                <li class=""><a   href="">Signin</a></li>
            </ul>
        </div>
    </div>
            
        </div>
</div>    
</div> -->
<div class="footer-container " >
    <div class="container">
        <div class="footer-links ">
            <ul>
                <li class="wow slideInLeft" data-wow-duration=".1s" data-wow-delay=".1s"><a class="cool-shadow" ng-click="shareLink()" href=""><i class="fa fa-facebook"></i></a></li>
                <li class="wow slideInLeft" data-wow-duration=".3s" data-wow-delay=".1s"><a class="cool-shadow" href=""><i class="fa fa-linkedin"></i></a></li>
                <li class="wow slideInLeft" data-wow-duration=".6s" data-wow-delay=".1s"><a class="cool-shadow" href=""><i class="fa fa-twitter"></i></a></li>
                <li class="wow slideInLeft" data-wow-duration=".9s" data-wow-delay=".1s"><a class="cool-shadow" href=""><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <ul class="foot-links text-center">
                <li class="cool-shadow"><a   href="">About Us</a></li>
                <li class="cool-shadow"><a   href="">Terms & Conditions</a></li>
                <li class="cool-shadow"><a   href="">FAQ</a></li>
                <li class="cool-shadow"><a   href="">Privacy</a></li>
                <li class="cool-shadow"><a   href="">Career</a></li>
            </ul>
        <div class="alert center text-muted">&copy;2016 <a href=" "><strong>fumontor</strong></a>&nbsp; powered by <a href="http://binarycraft.org"><strong>Binary Craft</strong></a></div>
    </div>
</div>  

    <!-- <div class="go-top bounceIn animated" id="go-top">
        <a href="" ng-click="gotop()"><i class="fa fa-chevron-up"></i></a>
    </div> -->
    <div id="go-top">
    <div class="support bounceIn animated bg-theme text-white cool-shadow" ng-show="!showSupport" >
        
       <a href="" ng-click="showSupport=!showSupport"> <strong ng-if="!showSupport">Support</strong></a>
    </div>
    <div class="contact cool-shadow floating slideInUp animated bg-theme text-theme2" ng-show="showSupport">
    
        <div class="form-group text-left">
            <label class="text-theme"><strong >Leave a message</strong></label>
        </div>
        <div class="close-btn icon-close" ng-click="showSupport=!showSupport">
            
        </div>
        <form  name="contactForm" ng-submit="sendMail(contactForm)" accept-charset="utf-8">
            <div class="form-group">
                <labe class="text-theme2">Name</label>
                <input type="text" required name="name" value="" ng-model="user.name" placeholder="Your name" class="form-control">
            </div>
            <div class="form-group">
                <label class="text-theme2">Email</label>
                <input type="email" required name="email" value="" ng-model="user.email" placeholder="Your name" class="form-control">
            </div>
            <div class="form-group">
                <label class="text-theme2">Message</label>
                <textarea name="" rows="2" ng-model="message" class="form-control"></textarea>
            </div>
            <div class="full-width text-center " >
                <input type="submit" name=""  value="Send" class="btn btn-danger cool-shadow ">
                <span class="refress mail-spinner" ng-if="mailSending"><i class="fa fa-refresh fa-spin fa-2x fa-fw"></i></span>
            </div>
            <address>
                <span class="text-theme2"><i class="chat-box fa fa-phone text-white"></i> <strong>Hotline :</strong>+8801684536534</span>
            </address>
        </form>
    </div>
    </div>

<!-- End FOOTER -->
<!-- Start Javasceipt -->
<!-- Start Common Script For All System -->
        <script src="assets/js/home/jquery-2.1.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/essentials/angular.min.js"></script>
        <script src="assets/node_modules/oclazyload/dist/ocLazyLoad.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="assets/js/essentials/locationSearch.js"></script>
        <script src="assets/js/essentials/disable-scroll.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/bgloaded.js"></script>
        <!-- <script src="assets/js/lightslider.min.js"></script>  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.4/angular-route.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.3/angular-animate.js"></script> -->
        <!-- <script src="assets/js/essentials/ui-bootstrap-tpls-1.3.3.min.js"></script> -->
        <!-- <script src="assets/js/home/rzslider.min.js"></script> -->
        <!-- <script src="assets/js/essentials/switch.min.js"></script> -->
        <!-- <script id="digits-sdk" src="https://cdn.digits.com/1/sdk.js" async></script> -->
        <!-- <script  src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script> -->
        <!-- <script src="assets/js/essentials/angular-slick.min.js"></script> -->
        <!-- <script src="assets/js/essentials/typehead-focus.js"></script> -->
    

</body>
</html>