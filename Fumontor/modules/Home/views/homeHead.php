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
<!--         <script >
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id))
                return;
              js = d.createElement(s);
              js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=<?php echo $this->config->item('facebook')['app_id'];?>";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
    </script> -->
       
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/flat-ui.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="assets/css/roboto.min.css">
        <link href="assets/css/home.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/ns-style-bar.css">
        <link rel="stylesheet" type="text/css" href="assets/css/ns-default.css">
        <link rel="stylesheet" type="text/css" href="assets/css/cart.css">
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/kitchen-filter.css"> 
        <link rel="stylesheet" type="text/css" href="assets/css/home/homeUser.css">
        <script src="assets/js/home/jquery-2.1.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/essentials/disable-scroll.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/bgloaded.js"></script>
       <link type="text/css" rel="stylesheet" href="assets/css/lightslider.min.css" />

        <script src="assets/js/lightslider.min.js"></script> 
        <script src="assets/js/essentials/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.4/angular-route.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.3/angular-animate.js"></script>
        <script src="assets/js/essentials/ui-bootstrap-tpls-1.3.3.min.js"></script>
        <script src="assets/js/home/rzslider.min.js"></script>
        <script src="assets/js/essentials/switch.min.js"></script>
        <!-- <script id="digits-sdk" src="https://cdn.digits.com/1/sdk.js" async></script> -->
        <script  src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
        <script src="assets/js/essentials/angular-slick.min.js"></script>
        <script src="assets/js/essentials/typehead-focus.js"></script>
        <script src="assets/js/essentials/locationSearch.js"></script>
    
        <meta id="fbAppId" data-appid="<?php echo $this->config->item('facebook')['app_id'];?>">
    </head>
    <!-- END HEAD -->
    <body ng-app="homeApp" ng-controller="searchCtrl as mCtrl" class="{{bodyClass}}">
        <div id="fb-root"></div>
   
       
   
        <!-- <search-bar></search-bar> -->
        <fu-head></fu-head>
       <fu-notification></fu-notification>
 