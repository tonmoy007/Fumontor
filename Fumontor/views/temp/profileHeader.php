<!DOCTYPE html>
<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="Md Saddam Hossain"/>
        <meta name="author" content="Fumontor" />
        
        <!--Base tag start-->
        <base href="<?php echo $this->config->base_url(); ?>">
        <!--Base tag end-->
        <link rel="shortcut icon" href="assets/img/favicon.png"> 
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/flat-ui.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/roboto.min.css">
        
        <link rel="stylesheet" href="assets/css/reset.css">
        <link href="assets/css/home.css" rel="stylesheet"> <!-- CSS reset -->
        <link rel="stylesheet" href="assets/css/admin.css"> 
        <!-- Resource style -->
        <link rel="stylesheet" type="text/css" href="assets/css/ns-style-attached.css">
        <link rel="stylesheet" type="text/css" href="assets/css/ns-default.css">
        <link href="assets/css/cart.css" rel="stylesheet">
        <script src="assets/js/home/jquery-2.1.1.js"></script>
        <script src="assets/js/modernizr.js"></script>
        
<link type="text/css" rel="stylesheet" href="assets/css/lightslider.min.css" />

        <script src="assets/js/lightslider.min.js"></script> 
        <script src="assets/js/home/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="assets/js/home/jquery.ui.touch-punch.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/home/bootstrap-select.js"></script>
        <script src="assets/js/home/bootstrap-switch.js"></script>
        <script src="assets/js/home/flatui-checkbox.js"></script>
        <script src="assets/js/home/flatui-radio.js"></script>
        <script src="assets/js/home/jquery.tagsinput.js"></script>


<script type="text/javascript" src="assets/js/fu-light-slider.js"></script> 


        <script src="assets/js/essentials/angular.min.js"></script>
        
        <script src="assets/js/essentials/ui-bootstrap-tpls-0.9.0.js"></script>
    </head>
<body>
<?php 
    $this->load->library('ion_auth');
    $user=$this->ion_auth->user()->row();
?>
    <header class="cd-main-header">
        <a href="<?php if(!$this->ion_auth->logged_in()){
            echo '';

            }else{
                if($this->ion_auth->is_admin()){
                    echo 'admin';
                }elseif($this->ion_auth->is_cook()){
                    echo 'cooks';
                }else{
                    echo 'user';
                }
                }?>" class="cd-logo"><img src="assets/img/fu-logo.png"></a>
        
        

        <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

        <nav class="cd-nav nav navbar navbar-right">
            <ul class="cd-top-nav">
                
                
                <li class="has-children account">
                    <a href="#0">
                        <img src="assets/img/avatar.png" alt="avatar">
                        <?php 
                            echo $user->first_name.' '.$user->last_name;
                         ?>
                    </a>

                    <ul>
                        <li><a href="cooks"><i class="fa fa-user"></i>&nbsp;<?php
                        if(!empty($userKitchenName)){
                            echo $userKitchenName;
                        }else{
                            echo 'profile';
                        }

                        ?></a></li>                         
                        <li><a href="auth/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
                    </ul>
                   

                        
                    
                </li>
            </ul>
        </nav>

    </header> <!-- .cd-main-header -->

    <main class="cd-main-content">
        <nav class="cd-side-nav">
            
        </nav>

        
  <?php
                        
                      
                         if ($this->ion_auth->logged_in())
                            {
                                 echo '<input type="hidden" id="userID" value="true" data-di="'.$id.'">';
                                
                            }
                        else{
                            echo '<input type="hidden" id="userID" value="false">';
                        }
                      
                        
                       ?>
<audio id="notiAudio">
    <source src="assets/video/Complete0.mp3" type="audio/mp3">
</audio>


                    