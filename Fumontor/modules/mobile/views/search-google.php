
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
        <script >
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id))
                return;
              js = d.createElement(s);
              js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=171939936496340";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
    </script>
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
        <script src="assets/js/essentials/disable-scroll.js"></script>
        <script src="assets/js/modernizr.js"></script>
       <link type="text/css" rel="stylesheet" href="assets/css/lightslider.min.css" />

        <script src="assets/js/lightslider.min.js"></script> 
        <script src="assets/js/essentials/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.4/angular-route.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.3/angular-animate.js"></script>
        <script src="assets/js/essentials/ui-bootstrap-tpls-0.9.0.js"></script>
        <script src="assets/js/home/rzslider.min.js"></script>
        <script src="assets/js/essentials/switch.min.js"></script>
        <!-- <script id="digits-sdk" src="https://cdn.digits.com/1/sdk.js" async></script> -->
        <script  src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
        <script src="assets/js/essentials/angular-slick.min.js"></script>
        <script src="assets/js/essentials/locationSearch.js"></script>
    
        
    </head>
<script>
    var app=angular.module('googleSearch',[]);
    app.controller('googleSearchCtrl',function($scope,$http){
        $scope.query='';
        $scope.searchGoogle=function(query){
            $http({
                url:'mobile/googleSearch/'+query,
            }).success(function(response){
                console.log(response);
            }).error(function(response) {
                /* Act on the event */
                console.log(response);
            });;
        }
    });
</script>
    <body ng-app="googleSearch" ng-controller="googleSearchCtrl">
      <div class="container space">
          <form name="search-form" class="main-search space" ng-submit="searchGoogle(query)">
              <input type="search" name="searc" ng-model="query" name="" value="" placeholder="">
          </form>
      </div>
    </body>