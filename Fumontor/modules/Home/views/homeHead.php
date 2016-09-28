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
        
       <fu-notification></fu-notification>
 <div id="header" class="fu-head " fu-head>
 <header>
       <div id="main-header" class="head " ng-class="{'bg-white':open}">
         <a href="#/"><div class="small-logo ">
            F
           </div></a>  
        <div class="navigation navigation-main">
            <div id="nav-icon" ng-click="open=!open" ng-class="{open:open}">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="container text-left">
              <div class="menu-container" id="showme" ng-class="{showme:open}">
                  <nav class="menu menu--prospero" id="navbar">
                      <ul class="menu__list">
                          <li class="menu__item " ng-class="{'menu__item--current':menuList[0].current}" ng-click="setCurrent(0)" title="Home"><a href="" ng-click="moveto('home')" class="menu__link" ng-click="open=!open"><i class="fa fa-home"></i> <span>Home</span></a></li>
                          <li class="menu__item" ng-class="{'menu__item--current':menuList[1].current}"  ng-click="setCurrent(1)"><a href="" ng-click="moveto('dishes')" class="menu__link" ng-click="open=!open"><i class="fa fa-question-circle" ></i> <span>All Dishes</span></a></li>
                          <li class="menu__item" ng-class="{'menu__item--current':menuList[2].current}"  ng-click="setCurrent(2)"><a href="" ng-click="moveto('weekly-menu')" class="menu__link" ng-click="open=!open"><i class="fa fa-question-circle" ></i> <span>Weekly Menu</span></a></li>
                          <li class="menu__item" ng-class="{'menu__item--current':menuList[3].current}"><a href="#/all-kitchen" class="menu__link" ng-click="open=!open"><i class="fa fa-cutlery" title="All Kithcens" ></i> <span>Kitchens</span></a></li>
                          <li class="menu__item"  ng-click="setCurrent(4)" ng-class="{'menu__item--current':menuList[4].current}" ><a href="recipes/#/"  class="menu__link" ><i class="fa fa-cutlery" title="Recipes" ></i> <span>Recipes</span></a></li>
                          
                          
                      </ul>
                      <ul class="menu__list right">
                        <li class="menu__item"  ng-if="!loggedin"><a href="" class="menu__link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-sign-in"></i> <span>SignIn</span></a>
                          <ul class="dropdown-menu cool-shadow">
                              <li><a href="auth/login">Signin</a></li>
                              
                              <li><a href="auth/signup/#/cook">Register As Cook</a></li>
                              <li><a href="auth/signup/#/foodie">Register As Foodie</a></li>
                              
                          
                          </ul>
                          </li>

                          <li ng-if="loggedin" class="menu__item" ><a href="" title="{{user.first_name}} {{user.last_name}}"  class="menu__link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i><img width="25px" ng-if="user.image" class="img-responsive cool-shadow user-image img-circle" ng-src="{{user.image}}" alt="{{user.first_name}} {{user.last_name}}">
                            <img ng-if="!user.image" width="25px" class="img-responsive cool-shadow  user-image img-circle" src="assets/img/avatar.png" alt="{{user.first_name}} {{user.last_name}}"></i><span>{{user.first_name}}</span></a>
                          <ul class="dropdown-menu cool-shadow">
                              
                              <li><a href="recipes/#/myrecipe"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; My Recipes</a></li>
                              <li><a href="#/orders"><i class="fa fa-clock-o"></i>&nbsp;&nbsp; My Orders</a></li>
                              <li ng-if="user.has_kitchen"><a href="cooks" ><i class="fa fa-cutlery"></i>&nbsp;&nbsp; My kitchen</a></li>
                              <li ng-if="!user.has_kitchen"><a href="" ng-click="showOpenKitchenModule()"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; Open a kitchen</a></li>
                              <li><a href="auth/logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a></li>
                              
                          
                          </ul>
                         </li>
                          <li class="menu__item "><a href="" class="menu__link" id="cart-button" title="Cart"  ng-click="(showCart=!showCart)"><i class="fa fa-cart-arrow-down"></i><div ng-if='cartTotal' class="cool-shadow"><strong>{{cartTotal}}</strong></div><span>Cart</span></a></li>
                      </ul>
                  </nav>
                  
              </div>
              <form class="main-search" name="searchForm" ng-if="popup||notlandingSearch" ng-submit="allSearch(searchquery)">
              <input type="search" name="mainSearch" autocomplete="off" class="cool-shadow" value="" id="search" placeholder="{{placeholder}}" ng-model="searchquery" >
              <span class="clear-search" ng-if="searchForm.mainSearch.$viewValue" ng-click="clearSearch()"><i class="fa fa-times text-theme"></i></span>
              </form>
                <!-- <li class="menu__item pull-right" ng-class="{'menumenu__item--current':menuList[4].current}"><a href="" class="menu__link" id="cart-button" title="Cart"  ng-click="(showCart=!showCart)&&setCurrent(4)"><i class="fa fa-cart-arrow-down"></i><div ng-show='cartTotal' class="cool-shadow"><strong>{{cartTotal}}</strong></div><span>Cart</span></a></li> -->
            </div>
        </div>
       
       </div>
      
   </header>
   <user-cart></user-cart>
   <cook-signup-form ng-if="!user.has_kitchen"></cook-signup-form>
</div><!-- /header -->