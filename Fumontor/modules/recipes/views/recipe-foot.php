<!-- <link rel="stylesheet" href="assets/css/foot.css"> -->

<div class="footer-container " >
    <div class="container">
        <div class="footer-links ">
            <ul>
                <li class="wow slideInLeft" data-wow-duration=".1s" data-wow-delay=".1s"><a class="cool-shadow" href="" ng-click="shareLink('http://fumontor.com/','Fumontor','Home','http://fumontor.com/assets/img/home-logo.png')"><i class="fa fa-facebook"></i></a></li>
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
                <li class="cool-shadow"><a   href="">Carrier</a></li>
            </ul>
        <div class="alert center">&copy;2016 <a href=" "><strong>fumontor</strong></a>&nbsp; powered by <a href="http://binarycraft.org"><strong>Binary Craft</strong></a></div>
    </div>
</div>  

    <!-- <div class="go-top bounceIn animated" id="go-top">
        <a href="" ng-click="gotop()"><i class="fa fa-chevron-up"></i></a>
    </div> -->
    <div id="go-top">
    <div class="support bounceIn animated bg-theme cool-shadow" ng-show="!showSupport" >
        <a href="" ng-click="showSupport=!showSupport"  ><strong ng-if="!showSupport">Support</strong></a>
    </div>
    <div class="contact cool-shadow floating slideInUp animated bg-theme text-theme2 text-white" ng-show="showSupport">
        <div class="form-group text-left">
            <label class="text-theme"><strong >Leave a message</strong></label>
        </div>
        <a href="" class="fu-modal-close alter" ng-click="showSupport=!showSupport">
            
        </a>
        <form  name="contactForm" ng-submit="sendMail(contactForm)" accept-charset="utf-8">
            <div class="form-group">
                <label>Name</label>
                <input type="text" required name="name" value="" ng-model="user.name" placeholder="Your name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" required name="email" value="" ng-model="user.email" placeholder="Your name" class="form-control">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="" rows="2" ng-model="message" class="form-control"></textarea>
            </div>
            <div class="full-width text-center " >
                <input type="submit" name=""  value="Send" class="btn btn-danger cool-shadow ">
                <span class="refress mail-spinner" ng-if="mailSending"><i class="fa fa-refresh fa-spin fa-2x fa-fw"></i></span>
            </div>
            <address>
                <span><i class="chat-box fa fa-phone"></i> <strong>Hotline :</strong>+8801684536534</span>
            </address>
        </form>
    </div>
    </div>

<!-- End FOOTER -->
<!-- Start Javasceipt -->
<!-- Start Common Script For All System -->
</div>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>