<div class="login-container cool-border">
            
              <!-- <a href=" " class="">
                <div class="logo">
                  <img class="img-responsive" src="assets/img/home-logo-black.png" alt="fumontor logo">
                </div>
              </a> -->
              <div class="space text-center text-red">You need to login to fullfill the order</div>
                <p class=" register-link">
                         

                      
                      <a href="{{'social/session/facebook?from='+redir}}" id="" class="cool-shadow  loginBtn--facebook loginBtn host-btn ">Signin with facebook</a>
                     
                </p>
                <label class="or"></label>
              <div id="infoMessage" class="login-info"></div>
            
              <form action="{{'auth/login?from='+redir}}" method="post" accept-charset="utf-8" class="loginForm ">

               
               

                
          <div class="login-form-input">
              <div class="form-group ">
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" name="identity" id="identity" placeholder="Email or Phone Number" >
                  
                </div>
                <span class="help-block"> </span>
                
              
              </div>
               <div class="form-group">
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" placeholder="password" name="password" value="" id="password" class="form-control">
                  
                </div>
                <span class="help-block"> </span>
                
              
              </div>

                    <div class="text-center">
                      <div class="form-group">
                        <label class="checkbox" ng-class="{checked:remember}" for="remember">
                        <span class="icons"><span class="first-icon 
            fui-checkbox-unchecked"></span><span class="second-icon
             fui-checkbox-checked"></span></span>
                          <input type="checkbox" name="remember" ng-model="remember" value="1" id="remember" data-toggle="checkbox"> 
                          Remember me </label>

                    </div>
                      <a href="index.php/auth/forgot_password" class="text-theme forgot">forgot password ? </a>
                    </div>
            </div>
                           
                                 
                        <div class="center login-form-submit">
                            <input type="submit" class=" loginBtn loginBtn--email host-btn bg-theme cool-shadow " name="submit" value="Signin with email/phone">
                            <span class="icon mail-icon"></span>
                        </div>
                        
                       <div class="clearfix"></div>
              <?php echo form_close();?>

              <div class="login-footer">
                
                

                <div class="alert text-center">  
                not a fumontor user? &nbsp;
                        <a href="auth/signup" id="register-link" class="text-theme "><strong>Signup</strong></a>
                </div>
                 <!-- <div class="page-footer-inner ">
                  &copy; 2016  <a href="http://fumontor.com"><strong>Fumontor</strong></a>&nbsp; All Rights Reserved.
                </div> -->
              </div>
              
              

                     <!-- END COPYRIGHT -->
            </div>