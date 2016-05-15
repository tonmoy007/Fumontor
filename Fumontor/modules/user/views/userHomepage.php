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
        <link href="assets/css/home.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="assets/css/admin.css"> 
        <link rel="stylesheet" type="text/css" href="assets/css/cart.css">
        <link rel="stylesheet" href="assets/css/admin/gridProducts.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/fu-modal.css">
        <link rel="stylesheet" href="assets/css/home/rzslider.min.css">
        <!-- Resource style -->
        <link rel="stylesheet" type="text/css" href="assets/css/home/homeUser.css">
        <script src="assets/js/home/jquery-2.1.1.js"></script>
        <script src="assets/js/modernizr.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>
        

        <script type="text/javascript" src="assets/js/notificationFx.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.3/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.4/angular-route.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.3/angular-animate.js"></script>
        <script src="assets/js/essentials/ui-bootstrap-tpls-0.9.0.js"></script>
        <script src="assets/js/home/rzslider.min.js"></script>
        <script src="assets/js/fileUpload/ng-file-upload.min.js"></script>
        <script src="assets/js/fileUpload/ng-file-upload-shim.min.js"></script>
        <script src="assets/js/home/user.page.js"></script>
    </head>
        
    </head>
<body ng-app="homeUserApp" ng-controller="searchCtrl" style="padding-top: 70px">
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
                }?>" class="cd-logo logo">Fumontor</a>
        

        <a href="" class="cd-nav-trigger">Menu<span></span></a>

        <nav class="cd-nav">
            <ul class="cd-top-nav" >
                
                
                <li ng-click="active=!active" class="has-children account" ng-class="{selected:active}">
                    <a href="">
                        <img src="assets/img/avatar.png" alt="avatar">
                        <?php echo $user->first_name.' '.$user->last_name;?>
                    </a>

                    <ul>
                        <li><a href="user"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                        <li><a href="user/#/settings"><i class="fa fa-gear"></i>&nbsp;Settings</a></li>
                        
                        <li><a href="auth/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
                    </ul>
                </li>
                <li class=""><a href="" id="cart-button" title="Cart"  ng-click="showCart=!showCart"><i class="fa fa-cart-arrow-down"></i><span ng-show='cartTotal' class="cool-shadow"><strong>{{cartTotal}}</strong></span></a></li>
            </ul>
        </nav>
    </header> <!-- .cd-main-header -->
    <catagory-bar></catagory-bar>
    <user-cart></user-cart>
    <fu-notification></fu-notification>
    <product-loading></product-loading>
    <div class="main-div" >
        <div class="">
            <div class="products" ng-view>
                
            </div>
        </div>
    </div>
    </body>
    </html>
