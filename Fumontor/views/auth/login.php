<!DOCTYPE html>
<html lang="en" >
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Fumontor | Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <base href="<?php echo $this->config->base_url(); ?>">
  <!--Base tag end-->
        <link rel="shortcut icon" href="assets/img/favicon.png"> 
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet"><link rel="stylesheet" href="assets/css/reset.css">
        <link href="assets/css/flat-ui.css" rel="stylesheet">
        
        <link rel="stylesheet" href="assets/css/admin.css"> 
        <link href="assets/css/roboto.min.css" rel="stylesheet">
        <link href="assets/css/home.css" rel="stylesheet">
        
        <link href="assets/css/login.css" rel="stylesheet">

        <script src="assets/js/home/jquery-2.1.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/home/clipboard.min.js"></script>
        <script src="assets/js/home/scrollspy.js"></script>

      
    </head>
    <!-- BEGIN BODY -->
    <body class="login-body">
       <div id="fullpage" class="fullpage-container ">
            <div class="login-container cool-border">
            
              <a href="" class="">
                <div class="logo">
                  <img class="img-responsive" src="assets/img/fu-logo.png" alt="fumontor logo">
                </div>
              </a>
              <p class="sub-heading text-center"><?php echo "Please Login using email/Phone number and password";?></p>

              <div id="infoMessage" class="login-info"><?php echo $message;?></div>

              <?php echo form_open("auth/login",array("class"=>"loginForm"));?>

               
               

                
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

                     <div class="form-group">
                        <label class="checkbox " for="remember">
                          <input type="checkbox" name="remember" value="1" id="remember" data-toggle="checkbox"> 
                          Remember me </label>
                    </div>
                      <a href="index.php/auth/forgot_password" class="text-theme forgot">forgot password ? </a>
                           
                                 
                        <div class="center">
                            <input type="submit" class=" btn btn-danger btn-embossed btn-wide" name="submit" value="Login">
                        </div>
                       <div class="clearfix"></div>
              <?php echo form_close();?>

              <div class="login-footer">
                
                <p class=" register-link">
                           do not have an account? &nbsp;
                        <a href="index.php/auth/create_user" id="register-link" class="btn btn-raised btn-sm ">Register</a>

                      <label>Other Login Options :&nbsp;&nbsp;</label><a href="social/session/facebook" id="register-link" class="btn btn-raised btn-fb btn-sm "><i class="fa fa-facebook"></i> </a>
                      <a href="social/session/google" id="register-link" class="btn btn-raised btn-google btn-sm "><i class="fa fa-google"></i> </a>
                      <a href="social/session/linkedin" id="register-link" class="btn btn-raised btn-google btn-sm "><i class="fa fa-linkedin"></i> </a>
                     
                </p>
                <?php $this->view('temp/homeFooter')?>
              </div>
              
              

                     <!-- END COPYRIGHT -->
            </div>
            

       </div>



    </body>
    <!-- END BODY -->
</html>