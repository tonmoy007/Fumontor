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
       
       
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/flat-ui.css" rel="stylesheet">
        <link rel=stylesheet href="assets/css/home/switch.css">
        <link rel="stylesheet" type="text/css" href="assets/css/roboto.min.css">
        <link href="assets/css/home.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/ns-style-bar.css">
        <link rel="stylesheet" type="text/css" href="assets/css/ns-default.css">
        <link rel="stylesheet" type="text/css" href="assets/css/cart.css">
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/kitchen-filter.css"> 
        <link rel="stylesheet" type="text/css" href="assets/css/home/homeUser.css">
        <link rel="stylesheet" href="assets/css/foot.css">
        <link type="text/css" rel="stylesheet" href="assets/css/lightslider.min.css" />

        
        <meta id="fbAppId" data-appid="<?php echo $this->config->item('facebook')['app_id'];?>">
    </head>
    <!-- END HEAD -->
    <body ng-app="homeApp" ng-controller="searchCtrl as mCtrl" class="{{bodyClass}}">
        <div id="fb-root"></div>
   
       
   
        <!-- <search-bar></search-bar> -->
        <fu-head></fu-head>
       <fu-notification></fu-notification>
 