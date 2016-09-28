  <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Fumontor | Recipes</title>
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
        
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/flat-ui.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="assets/css/roboto.min.css">
        <link href="assets/css/home.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/ns-style-bar.css">
        <link rel="stylesheet" type="text/css" href="assets/css/ns-default.css">
        <link rel="stylesheet" type="text/css" href="assets/css/fu-modal.css">
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/kitchen-filter.css"> 
        <link rel="stylesheet" type="text/css" href="assets/css/home/homeUser.css">

        <link rel="stylesheet" type="text/css" href="assets/css/login.css">
        <link rel="stylesheet" type="text/css" href="assets/css/recipe.css">
        
      <script >
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id))
                return;
              js = d.createElement(s);
              js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=<?php echo $this->config->item('facebook')['app_id'];?>";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
    </script>
        <script src="assets/js/home/jquery-2.1.1.js"></script>
        <script src="assets/js/essentials/disable-scroll.js"></script>
        <script src="assets/js/modernizr.js"></script>

        <script src="assets/js/essentials/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.4/angular-route.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.3/angular-animate.js"></script>
        <script src="assets/js/fileUpload/ng-file-upload.min.js"></script>
        <script src="assets/js/fileUpload/ng-file-upload-shim.min.js"></script>
        <script src="assets/js/essentials/ui-bootstrap-tpls-0.9.0.js"></script>
        <script src="assets/js/home/rzslider.min.js"></script>
        <script src="assets/js/essentials/switch.min.js"></script>
        <!-- <script id="digits-sdk" src="https://cdn.digits.com/1/sdk.js" async></script> -->
        <script  src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
        <script src="assets/js/essentials/angular-slick.min.js"></script>
        <script src="assets/js/essentials/recipes.js"></script>

        
    </head>

    <body ng-app="recipes" ng-controller="recipes as recipe">
    <div id="fb-root"></div>
    <fu-notification></fu-notification>
    <product-loading></product-loading>

    <div id="header" class="fu-head " recipe-navigation>
 <header >
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
                        <li class="menu__item " ng-class="{'menu__item--current':menuList[0].current}" ng-click="setCurrent(0)" title="Home"><a href="#home" class="menu__link" ng-click="open=!open"><i class="fa fa-home"></i> <span>Home</span></a></li>
                        <li class="menu__item" ng-class="{'menu__item--current':menuList[1].current}"  ng-click="setCurrent(1)"><a href="#/dishes" class="menu__link" ng-click="open=!open"><i class="fa fa-question-circle" ></i> <span>All Dishes</span></a></li>
                        <li class="menu__item" ng-class="{'menu__item--current':menuList[2].current}"  ng-click="setCurrent(2)"><a href="#/weekly-menu" ng-click="moveto('weekly-menu')" class="menu__link" ng-click="open=!open"><i class="fa fa-question-circle" ></i> <span>Weekly Menu</span></a></li>
                        <li class="menu__item" ng-class="{'menu__item--current':menuList[3].current}"  ng-click="setCurrent(3)"><a href="#/all-kitchen" class="menu__link" ng-click="open=!open"><i class="fa fa-cutlery" title="All Kithcens" ></i> <span>Kitchens</span></a></li>
                        <li class="menu__item menu__item--current"  ng-click="setCurrent(4)" ng-class="{'menu__item--current':menuList[4].current}" ><a href="recipes/#/"  class="menu__link" ><i class="fa fa-cutlery" title="All Kithcens" ></i> <span>Recipes</span></a></li>
                        
                    </ul>
                    <ul class="menu__list right">
                      <li class="menu__item" ng-class="{'menu__item--current':menuList[3].current}" ng-if="!loggedin"><a href="" class="menu__link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  ng-click="setCurrent(3)"><i class="fa fa-sign-in"></i> <span>SignIn</span></a>
                        <ul class="dropdown-menu cool-shadow">
                            <li><a href="auth/login/recipes">Signin</a></li>
                            
                            <li><a href="auth/signup/#/cook">Register As Cook</a></li>
                            <li><a href="auth/signup/#/foodie">Register As Foodie</a></li>
                            
                        
                        </ul>
                        </li>

                        <li ng-if="loggedin" class="menu__item" ><a href="" title="{{user.first_name}} {{user.last_name}}"  class="menu__link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i><img width="25px" ng-if="user.image" class="img-responsive cool-shadow user-image img-circle" ng-src="{{user.image}}" alt="{{user.first_name}} {{user.last_name}}">
                          <img ng-if="!user.image" width="25px" class="img-responsive cool-shadow  user-image img-circle" src="assets/img/avatar.png" alt="{{user.first_name}} {{user.last_name}}"></i><span>{{user.first_name}}</span></a>
                        <ul class="dropdown-menu cool-shadow">
                            
                            <li><a href="recipes/#/myrecipe"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; My &nbsp; Recipes</a></li>
                            <li><a href="#/orders"><i class="fa fa-clock-o"></i>&nbsp;&nbsp; My Orders</a></li>
                            <li ng-if="user.has_kitchen"><a href="cooks" ><i class="fa fa-cutlery"></i>&nbsp;&nbsp; My kitchen</a></li>
                            <li ng-if="!user.has_kitchen"><a href="" ng-click="showOpenKitchenModule()"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; Open a kitchen</a></li>
                            <li><a href="auth/logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a></li>
                            
                        
                        </ul>
                       </li>
                        
                    </ul>
                </nav>
                
            </div>
            <form class="main-search" name="searchForm" ng-submit="searchRecipe(searchquery)">
            <input type="search" name="mainSearch" class="cool-shadow" value="" id="search" placeholder="Search Recipe" ng-model="searchquery" >
            <span class="clear-search" ng-if="searchForm.mainSearch.$viewValue" ng-click="clearSearch()"><i class="fa fa-times text-theme"></i></span>
            </form>
           
            </div>
        </div>
       
       </div>
       
   </header>
   
   <cook-signup-form ng-if="!user.has_kitchen"></cook-signup-form>
</div><!-- /header -->













    <div class="recipe-head">
        
        <recipe-cover></recipe-cover>
        
    </div>
    
    <div class="main-div">
        <div ng-view ></div>
    </div>
        
 
        
