<!DOCTYPE html>
<html lang="en" >
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Fumontor</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <base href="<?php echo $this->config->base_url(); ?>">
  <!--Base tag end-->
        
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/material.min.css" rel="stylesheet">
        <link href="assets/css/material-fullpalette.min.css" rel="stylesheet">
        <link href="assets/css/roboto.min.css" rel="stylesheet">
        
        <link href="assets/css/ripples.min.css" rel="stylesheet">
        <link href="assets/css/login.css" rel="stylesheet">

        <script src="assets/js/jquery.js"></script>
        

      
    </head>
    <!-- BEGIN BODY -->
    <?php 
    if (!empty($user_profile)) {
      $name=explode(" ", $user_profile->name);
    }

    ?>
    <body class="login">
       <div id="fullpage" class="fullpage-container">
          <div class="register-div">
                <div class="register-div-container">
                   <div class="logo">
                    <a href="index.php" class="navbar-brand">Fumontor</a>
                  </div>
                  <div id="infoMessage" class="login-info"><?php if(!empty($message)){echo $message;} ?></div>
            

            <?php echo form_open("auth/create_user");?>

                <div class="form-group form-group-lg form-inline">
                
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    
                    <?php if(!empty($user_profile)){?>

                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $name[0]?>" placeholder="First Name " >   

                    <?php }else{?>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name " >
                    <?php }?>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    
                    <?php if(!empty($user_profile)){?>

                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $name[1]?>" placeholder="Last Name" >
                    <?php }else{?>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" >
                    <?php }?>
                  </div>
                
              <span class="help-block"> </span>
              </div>
              
              <div class="form-group form-group-lg label-floating is-empty">
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                   
                   <?php if(!empty($user_profile)){?>

                       <input class="form-control input-lg empty" id="username" name="username" type="text" value="<?php echo $name[0]?>" placeholder="User Name" required>
                   </div>
                <span class="help-block">  </span>
                   <?php } else{ ?>
                    
                    <input class="form-control input-lg empty" id="username" name="username" type="text" placeholder="User Name" required>
                   </div>
                <span class="help-block"> </span>
                   <?php }?>
                
                
              
              </div>

              <div class="form-group form-group-lg label-floating is-empty">
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                   <input class="form-control input-lg empty" placeholder="Email" id="email" name="email" type="email" required>
                  
                </div>
                <span class="help-block pull-left">
                <?php if (!empty($user_profile)) {?>
                <strong>Your email id is required we can not retrive it from facebook</strong>
                  <?php }?>
                 </span>
                
              
              </div>

            <?php if (empty($user_profile)) {?>
                 <div class="form-group form-group-lg label-floating is-empty">
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="password" placeholder="password" name="password" value="" id="password" class="form-control" required>
                  
                </div>
                <span class="help-block"> </span>
                
              
              </div>
              <div class="form-group form-group-lg label-floating is-empty">
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="password" placeholder="confirm password" name="password_confirm" value="" id="password_confirm" class="form-control" required>
                  
                </div>
                <span class="help-block"> </span>
                
              
              </div>
            <?php }else{
              echo '<input type="password" placeholder="password" name="password" value="facebook123^&*%" id="password" class="hidden">';
              echo '<input type="password" placeholder="confirm password" name="password_confirm" value="facebook123^&*%" id="password_confirm" class="hidden">';
              }?>

             
                <input type="submit" class="btn btn-raised btn-info" name="submit" value="Register">
                <div class="clearfix"></div>
              <?php echo form_close();?>
              
              
              <?php $this->view('temp/footer')?>
              
                </div>
            </div>

       </div>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/ripples.min.js"></script>
    <script src="assets/js/material.min.js"></script>
    <script type="text/javascript">
    $('#register-link').on('click',function(){
      
    });
    </script>
    </body>
    <!-- END BODY -->
</html>