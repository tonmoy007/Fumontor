    

    <link rel="stylesheet" href="assets/css/signup-model.css"> <!-- Gem style -->

    <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
        <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
            <ul class="cd-switcher">
                <li><a href="#0">Sign in</a></li>
                <li><a href="#0">Register</a></li>
            </ul>

            <div id="cd-login"> <!-- log in form -->
                <?php echo form_open("auth/login",array("class"=>"cd-form"));?>
                    
                
            <div class="form-group form-group-lg label-floating is-empty">
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" name="identity" id="identity" placeholder="User Email" >
                  <span class="cd-error-message">Error message here!</span>

                </div>
                
              
              </div>
               <div class="form-group form-group-lg label-floating is-empty">
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="text" placeholder="password" name="password" value="" id="password" class="form-control">
                  
                        <a href="#0" class="hide-password">Hide</a>
                </div>
                
              
              </div>

               <label class="checkbox text-left" for="remember">
                          <input type="checkbox" name="remember" value="1" id="remember" data-toggle="checkbox"> 
                          Remember me </label>
                    
                    <p class="fieldset">
                        <input class="btn btn-danger btn-embosshed btn-wide" type="submit" value="Login" >
                    </p>
                </form>
                
                <p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
                <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div> <!-- cd-login -->

            <div id="cd-signup"> <!-- sign up form -->
             <a href="#0" class="btn back-btn btn-danger btn-embosshed pull-right" title=""><i class="fa fa-backward"></i></a>
            <h2 class="text-center form-head text-muted">Register As a Foodie</h2>
           
                <form class="cd-form">
                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Username</label>
                        <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password">Password</label>
                        <input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
                        <a href="#0" class="hide-password">Hide</a>
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <input type="checkbox" id="accept-terms">
                        <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
                    </p>

                    <p class="fieldset">
                        <input class="btn btn-danger btn-wide btn-embosshed has-padding" type="submit" value="Create account">
                    </p>
                </form>

                <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div> <!-- cd-signup -->
            
            <div id="regiserSelect">
                <div class="cd-form">
                <div class="row">
                    <div class="col-sm-6 ">
                    <div class="half-block"></div>
                        <div class="user-select user">
                            <a href="#0" title="">Register as a Foodie</a>
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="user-select cook">
                            <a href="#0" title="">Register as a Cook</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div id="cd-cook-select">
            <a href="#0"  class="btn btn-danger back-btn pull-right btn-embosshed" title=""><i class="fa fa-backward"></i></a>
            <h2 class="text-center form-head text-muted">Register As a Cook</h2>
                <form class="cd-form">
                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Username</label>
                        <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password">Password</label>
                        <input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
                        <a href="#0" class="hide-password">Hide</a>
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <input type="checkbox" id="accept-terms">
                        <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
                    </p>

                    <p class="fieldset">
                        <input class="btn btn-danger btn-wide btn-embosshed has-padding" type="submit" value="Create account">
                    </p>
                </form>
            </div>

            <div id="cd-reset-password"> <!-- reset password form -->
                <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

                <?php echo form_open("auth/forgot_password",array("class"=>"cd-form"));?>
                    
                        <label class="image-replace cd-email" for="reset-email">E-mail</label>
                   <div class="form-group form-group-lg label-floating is-empty">
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                  <input type="email" class="form-control" name="email" id="identity" placeholder="Email " >
                  
                </div>
                <span class="cd-error-message"></span>
                
              
              </div>
                        
                    

                    <p class="fieldset">
                        <input class="btn btn-wide btn-danger btn-embosshed has-padding" type="submit" value="Reset password">
                    </p>
                </form>

                <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
            </div> <!-- cd-reset-password -->
            <a href="#0" class="cd-close-form">Close</a>
        </div> <!-- cd-user-modal-container -->
    </div> <!-- cd-user-modal -->

<script src="assets/js/signup-model.js"></script> <!-- Gem jQuery -->