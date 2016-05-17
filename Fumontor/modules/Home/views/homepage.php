

<link rel="stylesheet" type="text/css" href="assets/css/home-signup-modal.css">

<script type="text/javascript" src="assets/js/notificationFx.js"></script>

<section id="homepage" class="homepage">
    <div class="container ">
        <div class="row">
            <div class="intro-block col-md-4">
            <h1 class="intro-head text-theme2">Welcome to <span>Fum<b class="logo-o">o</b>nt<b class="logo-o">o</b>r</span></h1>
            <div class=" center">
                <h3 class="intro-sub">
                    Morbi nec metus. Fusce vel dui.In turpis.
                    Curabitur ullamcorper ultricies nisi. 
                    Pellentesque habitant morbi tristique senectus
                    et netus et malesuada fames ac turpis egestas. 
                    Sed libero. Cras ultricies mi eu turpis hendrerit fringilla.
                </h3>
            </div>
            <div class="clearfix"></div>
            <div class="space"></div>
            <?php echo form_open('user/signup',array('class'=>'home-signup-form'));?>
            <div class="form-group form-group-lg ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required="name is required">
                          
                        </div><span class="form-error-message"></span>
                          <span class="required-mark"><i class="fa fa-asterisk"></i></span>
                        
            </div>
            <??>
            <div class="form-group form-group-lg ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="number" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" required="">
                          
                        </div><span class="form-error-message"></span>
                          <span class="required-mark"><i class="fa fa-asterisk"></i></span>

                        
            </div>
            <div class="form-btn center main-nav">
                <button href="#0" type="submit" name="submit" class="btn btn-danger btn-wide btn-embossed" value="">Register Now <span class="btn-tip">( Its Free )</span></button>
                <div id="result"></div>
            </div>
            <?php echo form_close();  ?>
            <script src="assets/js/home/jquery.validate.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/home/home-signup.js"></script>
        </div>
        <div class="col-md-8">
            <div class="video-block center">
                <div class="video-block2">
                    <video class="video-player" controls>
                    <source src="assets/video/how.ogv" type="video/ogv">
                    <source src="assets/video/how.mp4" type="video/mp4">
                    <source src="assets/video/how.webm" type="video/webm">
                      Your browser does not support the <code>video</code> element.
                    </video>
                </div>
            </div>
        </div> 
        </div>
    </div>
</section>
<section id="about" class="about">
    <div class="container">
        <h1 class="section-head text-theme2">About Fumontor</h1>
        <p class="sub-head text-muted">Lorem ipsum dolor sit amet,
         consectetur adipisicing elit</p>
        
        <div class="row">
            <div class="col-md-4">
                <h2 class="col-header text-center form-head text-muted">Any Heading</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            </div>
            <div class="col-md-4">
                <h2 class="col-header text-center form-head text-muted">Any Heading</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            </div>
            <div class="col-md-4">
                <h2 class="col-header text-center form-head text-muted">Any Heading</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            </div>
        </div>
        <!-- <div class="slide-show-container box1">
            <ul class="cb-slideshow">
                    <li><span>Image 01</span><div><h3>re·lax·a·tion</h3><a href="" class="btn btn-danger btn-wide btn-emboshed"> Join Us</a></div></li>
                    <li><span>Image 02</span><div><h3>qui·e·tude</h3></div></li>
                    <li><span>Image 03</span><div><h3>bal·ance</h3></div></li>
                    <li><span>Image 04</span><div><h3>e·qua·nim·i·ty</h3></div></li>
                    <li><span>Image 05</span><div><h3>com·po·sure</h3></div></li>
                    <li><span>Image 06</span><div><h3>se·ren·i·ty</h3></div></li>
            </ul>
        </div> -->
    </div>
</section>

<!-- <section id="story" class="story">
    <div class="container">
    <h1 class="section-header text-theme2">Stories</h1>
    <p class="sub-head text-muted">Select a logo or suggest any other color combination</p>

        <div class="row">
            <div class="col-md-4 mg-btm"><img src="assets/img/fu-logo.png" alt="" class="img-responsive mg-btm"><img src="assets/img/fu-logo2.png" alt="" class="img-responsive mg-btm"></div>
            <div class="col-md-4 mg-btm"><img src="assets/img/fu-logo3.png" alt="" class="img-responsive mg-btm"><img src="assets/img/fu-logo4.png" alt="" class="img-responsive mg-btm"></div>
            <div class="col-md-4 mg-btm"><img src="assets/img/fu-logo5.png" alt="" class="img-responsive mg-btm"><img src="assets/img/fu-logo6.png" alt="" class="img-responsive mg-btm"></div>
            <div class="col-md-4 mg-btm"><img src="assets/img/fu-logo7.png" alt="" class="img-responsive mg-btm"><img src="assets/img/fu-logo8.png" alt="" class="img-responsive mg-btm"></div>
            <div class="col-md-4 mg-btm"><img src="assets/img/fu-logo9.png" alt="" class="img-responsive mg-btm"><img src="assets/img/fu-logo10.png" alt="" class="img-responsive mg-btm"></div>
            <div class="col-md-4 mg-btm"><img src="assets/img/fu-logo11.png" alt="" class="img-responsive mg-btm"><img src="assets/img/fu-logo12.png" alt="" class="img-responsive mg-btm"></div>
        </div>
    </div>
</section>
 -->
<section id="register" class="register">
    <div class="container">
        <h1 class="section-head text-theme2">Join Us</h1>
        <div class="row">
            <div class="col-md-6 center">
            <div class="half-block"></div>
            <h2 class="text-center form-head text-muted">Register As a Cook</h2>
                <div class="form-container">
                   
                    <div class="form-logo center">
                        <div class="register-logo"></div>
                    </div>
                    <div class="form-btn center">
                        <a href="#fullbody" class="btn btn-danger btn-wide btn-embossed"> Register Now <span class="btn-tip">( Its Free!!)</span></a>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
             <h2 class="text-center form-head text-muted">Login</h2>
                <div class="form-container">
                <?php echo form_open("auth/login");?>
                    <div class="form-group form-group-lg ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" name="identity" id="identity" placeholder="User Name or Email" >
                          
                        </div>
                        <span class="help-block"> </span>
                        
                    </div>
                    <div class="form-group form-group-lg ">
                
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          <input type="password" placeholder="password" name="password" value="" id="password" class="form-control">
                          
                        </div>
                        <span class="help-block"> </span>

                    </div>
                      
                        <label class="checkbox" for="remember">
                          <input type="checkbox" name="remember" value="1" id="remember" data-toggle="checkbox"> 
                          Remember me </label>

                      <a href="index.php/auth/forgot_password" class="text-theme">forgot password ? </a>
                                       
                        <div class="center">
                            <input type="submit" class=" btn btn-danger btn-embossed btn-wide" name="submit" value="Login">
                        </div>
                       <div class="clearfix"></div>
              <?php echo form_close();?>
                </div>

                <div class="social-login">
                    <label>Social Login Options</label>
                    <div class="social-btn-container center">
                        <a href="index.php/auth/loginfacebook" 
                        id="register-link" class="btn bg-facebook text-white btn-embossed  ">
                        <i class="fa fa-facebook"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="home-signup-modal">
<div class="overlay"></div>
<div id="home-signup-loader"><i class="fa fa-spinner fa-pulse"></i></div>
    <div class="home-signup-modal-container">
    <a href="#0" title="" class="home-signup-modal-close">Close</a>
        <div class="home-signip-modal-header">
            <h2 class="modal-header">Fumontor Kitchen Registration</h2>
        </div>
        <div class="home-signup-modal-body">
            <div class="modal-form-container">
                <?php echo form_open('users/ajaxRegAsCook',array('id'=>'signupForm','class'=>'signupForm'))?>
                    <div class="form-message">Hello <span id="user" class="modal-strong"></span> you are about to register into <span class="modal-strong">fumontor</span> as a cook<br> We need the following information to make your kitchen ready. <span class="bg-red">*</span> marked fields are required!!</div>

                    <div class="form-body">
                    <input type="hidden" name="username" value="" id="username">
                        <div class="form-group ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-home"></i></span>
                          <input type="text" class="form-control" name="kitchenName" id="kitchenName" placeholder="Kitchen Name ( This will be shown to the user )" >
                          
                        </div>
                        <span class="required-mark"><i class="fa fa-asterisk"></i></span>
                        <span class="form-error-message"></span>
                        
                    </div>
                    <div class="form-group ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email (fumontor needs this to cotanct with you)" >
                          
                        </div>
                        <span class="form-error-message"></span>
                        
                    </div>
                    <div class="form-group ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          <input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Password ( minimum 8 character)" >
                        </div>
        
                          <span class="form-error-message"></span>
                          <span class="required-mark"><i class="fa fa-asterisk"></i></span>
                        
                    </div>
                    <div class="form-group ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" >
                        </div>
        
                          <span class="form-error-message"></span>
                          <span class="required-mark"><i class="fa fa-asterisk"></i></span>
                        
                    </div>
                    <div class="form-group ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                          <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number" >
                        </div>

                          <span class="form-error-message"></span>
                          <span class="required-mark"><i class="fa fa-asterisk"></i></span>
                        
                    </div>
                    <div class="form-group ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                          <input type="text" class="form-control" name="location" id="location" placeholder="Location (i.e. Mirpur,Dhanmondi)" >
                        </div>

                          <span class="form-error-message"></span>
                        
                    </div>
                    <div class="form-group ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                          <input type="text" class="form-control" name="address" id="address" placeholder="Address (Your full address here)" >
                        </div>

                          <span class="form-error-message"></span>
                        
                    </div>
                    <div class="form-bottom">
                        <div class="center">
                            <input type="submit" class="btn btn-danger btn-wide btn-embossed" id="submit">
                            <div id="spinner"></div>
                        </div>
                    </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
        <div class="home-signup-modal-footer">fumontor</div>
    </div>
</div>
