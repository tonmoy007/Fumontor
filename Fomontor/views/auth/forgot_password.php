
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
    <body class="login">
       <div id="fullpage" class="fullpage-container">
            <div class="login-container">

            <h1><?php echo lang('forgot_password_heading');?></h1>
            <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

            <div id="infoMessage"><?php echo $message;?></div>

            <?php echo form_open("auth/forgot_password");?>

            <div class="form-group form-group-lg label-floating is-empty">
                
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="email" class="form-control" name="email" id="identity" placeholder="Email " >
                  
                </div>
                <span class="help-block"> </span>
                
              
              </div>

                   <input type="submit" class="pull-right btn btn-raised btn-primary" name="submit" value="Reset">

            <?php echo form_close();?>
           <!-- END COPYRIGHT -->
            </div>

       </div>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/ripples.min.js"></script>
    <script src="assets/js/material.min.js"></script>
    
    </body>
    <!-- END BODY -->
</html>