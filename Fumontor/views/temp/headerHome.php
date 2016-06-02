<!DOCTYPE html>
<html lang="en" >
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Fumontor</title>
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
        <link href="assets/css/home.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/ns-style-attached.css">
        <link rel="stylesheet" type="text/css" href="assets/css/ns-default.css">
        <script src="assets/js/home/jquery-2.1.1.js"></script>
        <script src="assets/js/modernizr.js"></script>
        
    </head>
    <!-- END HEAD -->
    
    <!-- BEGIN BODY -->
    <body class="" id="fullbody">
   <header >
       <div class="head">
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
                }?>"><div class="logo">Fumontor</div>
           </a>
        <div class="navigation">
            <div id="nav-icon">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="menu-container" id="showme">
                <nav class="menu menu--sebastian" id="navbar">
                    <ul class="menu__list">
                        <li class="menu__item menu__item--current"><a href="#fullbody" class="menu__link">Home</a></li>
                        <li class="menu__item"><a href="#about" class="menu__link">About </a></li>
                        <!-- <li class="menu__item"><a href="#story" class="menu__link">Story </a></li> -->
                        <li class="menu__item"><a href="#register" class="menu__link">Join  Us</a></li>
                        
                    </ul>
                </nav>
            </div>
        </div>
       
       </div>
       
   </header>

<div>