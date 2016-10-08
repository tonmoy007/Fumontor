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
       
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" async defer>
        <link href="assets/css/flat-ui.css" rel="stylesheet" async defer>
        <link href="assets/css/home.min.css" rel="stylesheet" async defer>
        <link href="assets/css/home-icons.css" rel="stylesheet" async defer>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" async defer>
        
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
                          <li class="menu__item " ng-class="{'menu__item--current':menuList[0].current}" ng-click="setCurrent(0)" title="Home"><a href="" ng-click="moveto('home')" class="menu__link" ng-click="open=!open"><span class="home-icons home-icon"></span></a></li>
                          <li class="menu__item" ng-class="{'menu__item--current':menuList[1].current}"  ng-click="setCurrent(1)"><a href="" ng-click="moveto('dishes')" class="menu__link" ng-click="open=!open"><span class="home-icons dishes-icon"></span></a></li>
                          <li class="menu__item" ng-class="{'menu__item--current':menuList[2].current}"  ng-click="setCurrent(2)"><a href="" ng-click="moveto('weekly-menu')" class="menu__link" ng-click="open=!open"><span class="home-icons wdish-icon"></span></a></li>
                          <li class="menu__item" ng-class="{'menu__item--current':menuList[3].current}"><a href="#/all-kitchen" class="menu__link" ng-click="open=!open"><span class="home-icons kitchen-icon"></span></a></li>
                          <li class="menu__item"  ng-click="setCurrent(4)" ng-class="{'menu__item--current':menuList[4].current}" ><a href="recipes/#/"  class="menu__link" ><span class="home-icons recipe-icon"></span></a></li>
                          
                          
                      </ul>
                      <ul class="menu__list right">
                        <li class="menu__item"  ng-if="!loggedin"><a href="" class="menu__link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><span class="home-icons enter-icon"></span></a>
                          <ul class="dropdown-menu cool-shadow sign-drop">
                              <li><a href="auth/login">Signin</a></li>
                              
                              <li><a href="auth/signup/#/cook">Register As Cook</a></li>
                              <li><a href="auth/signup/#/foodie">Register As Foodie</a></li>
                              
                          
                          </ul>
                          </li>

                          <li ng-if="loggedin" class="menu__item" ><a href="" title="{{user.first_name}} {{user.last_name}}"  class="menu__link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span width="40px" ng-if="user.image" class="home-icons " style="background-image: url({{user.image}})" alt=""></span>
                            <span ng-if="!user.image"  class="home-icons  " style="background-image: url(../img/avatar.png );" alt="{{user.first_name}} {{user.last_name}}"></span><span class="home-icons large">{{user.first_name}}</span></a>
                          <ul class="dropdown-menu cool-shadow">
                              
                              <li><a href="recipes/#/myrecipe"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; My Recipes</a></li>
                              <li><a href="#/orders"><i class="fa fa-clock-o"></i>&nbsp;&nbsp; My Orders</a></li>
                              <li ng-if="user.has_kitchen"><a href="cooks" ><i class="fa fa-cutlery"></i>&nbsp;&nbsp; My kitchen</a></li>
                              <li ng-if="!user.has_kitchen"><a href="" ng-click="showOpenKitchenModule()"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; Open a kitchen</a></li>
                              <li><a href="auth/logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a></li>
                              
                          
                          </ul>
                         </li>
                          <li class="menu__item "><a href="" class="menu__link" id="cart-button" title="Cart"  ng-click="(showCart=!showCart)"><span class="home-icons cart-icon"></span><div ng-if='cartTotal' class="cool-shadow"><strong>{{cartTotal}}</strong></div></a></li>
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