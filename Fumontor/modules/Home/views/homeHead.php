<!DOCTYPE html>
<html lang="en"  ng-app="homeApp">
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
       
        
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" async>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" async>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" async >
        <link href="assets/css/flat-ui.css" rel="stylesheet" async>
        <link rel=stylesheet href="assets/css/home/switch.css" async>
        <link rel="stylesheet" type="text/css" href="assets/css/roboto.min.css" async>
        <link rel="stylesheet" href="assets/css/fu-modal.css" async>
        <link href="assets/css/home.css" rel="stylesheet" async>
        <link rel="stylesheet" type="text/css" href="assets/css/ns-style-bar.css" async>
        <link rel="stylesheet" type="text/css" href="assets/css/ns-default.css">
        <link rel="stylesheet" type="text/css" href="assets/css/cart.css" async>
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css" async>
        <link rel="stylesheet" href="assets/css/kitchen-filter.css" async> 
        <link rel="stylesheet" type="text/css" href="assets/css/home/homeUser.css" async>
        <link rel="stylesheet" href="assets/css/foot.css" async>

        <link rel="stylesheet" href="assets/css/admin/gridProducts.css" async>
        
        <meta id="fbAppId" data-appid="<?php echo $this->config->item('facebook')['app_id'];?>">
    </head>
    <!-- END HEAD -->
    <body  ng-controller="searchCtrl as mCtrl" class="{{bodyClass}}">
        <div id="fb-root"></div>
   
       
   
        <!-- <search-bar></search-bar> -->
        <fu-head></fu-head>
       <fu-notification></fu-notification>
 