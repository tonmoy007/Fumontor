<div id="header" class="fu-head ">
 <header >
       <div id="main-header" class="head " ng-class="{'bg-white':open}">
         <a href="#/"><div class="small-logo ">
             <img src="assets/img/home-logo-sm.png" class="img-responsive" alt="">
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
                        <li class="menu__item menu__item--current" ng-class="{'menu__item--current':menuList[0].current}" ng-click="setCurrent(0)" title="Home"><a href="#fullbody" class="menu__link"><i class="fa fa-home"></i> <span>Home</span></a></li>
                        <li class="menu__item" ng-class="{'menu__item--current':menuList[1].current}"  ng-click="setCurrent(1)"><a href="#about" class="menu__link"><i class="fa fa-question-circle"></i> <span>How</span></a></li>
                        
                        <li class="menu__item" ng-class="{'menu__item--current':menuList[2].current}"  ng-click="setCurrent(2)"><a href="#/all-kitchen" class="menu__link"><i class="fa fa-cutlery" title="All Kithcens"></i> <span>Kitchens</span></a></li>
                        <li class="menu__item" ng-class="{'menu__item--current':menuList[3].current}" ng-if="!loggedin"><a href="" class="menu__link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  ng-click="setCurrent(3)"><i class="fa fa-sign-in"></i> <span>SignIn</span></a>
                        <ul class="dropdown-menu cool-shadow">
                            <li><a href="auth/login">Signin</a></li>
                            <li><a href="cooks/registerCook">Register As Cook</a></li>
                            <li><a href="">Register As Foodie</a></li>
                            
                        
                        </ul>
                        </li>

                        <li ng-if="loggedin" class="menu__item" ><a href="" title="{{user.first_name}} {{user.last_name}}"  class="menu__link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i><img width="25px" ng-if="user.image" class="img-responsive user-image img-circle" ng-src="{{user.image}}" alt="{{user.first_name}} {{user.last_name}}">
                          <img ng-if="!user.image" width="25px" class="img-responsive img-thumbnail img-circle" src="assets/img/avatar.png" alt="{{user.first_name}} {{user.last_name}}"></i><span>{{user.first_name}}</span></a>
                        <ul class="dropdown-menu cool-shadow">
                            <li><a href="#/"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                            <li><a href="#/settings"><i class="fa fa-gear"></i>&nbsp;Settings</a></li>
                            <li><a href="auth/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
                            
                        
                        </ul>
                       </li>
                        <li class="menu__item  fixed" ng-class="{'menumenu__item--current':menuList[4].current}"><a href="" class="menu__link" id="cart-button" title="Cart"  ng-click="(showCart=!showCart)&&setCurrent(4)"><i class="fa fa-cart-arrow-down"></i><div ng-show='cartTotal' class="cool-shadow"><strong>{{cartTotal}}</strong></div><span>Cart</span></a></li>
                        
                    </ul>
                </nav>
                
            </div>
            <form class="main-search" ><input type="search" name="" value="" placeholder="Search Anything"></form>
            <!-- <li class="menu__item pull-right" ng-class="{'menumenu__item--current':menuList[4].current}"><a href="" class="menu__link" id="cart-button" title="Cart"  ng-click="(showCart=!showCart)&&setCurrent(4)"><i class="fa fa-cart-arrow-down"></i><div ng-show='cartTotal' class="cool-shadow"><strong>{{cartTotal}}</strong></div><span>Cart</span></a></li> -->
            </div>
        </div>
       
       </div>
       <div class="head-sub " ng-class="{'slideIn-top':slideNav}">
          <div class="navigation navigation-main">
            <div id="nav-icon" ng-click="open=!open" ng-class="{open:open}">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="container text-center">
            <div class="menu-container" id="showme" ng-class="{showme:open}">
                <nav class="menu menu--prospero" id="navbar">
                    <ul class="menu__list">
                        <li class="menu__item menumenu__item--current" ng-class="{'menu__item--current':menuList[0].current}" ng-click="setCurrent(0)" title="Home"><a href="#fullbody" class="menu__link"><i class="fa fa-home"></i> <span>Home</span></a></li>

                        <li class="menu__item" ng-class="{'menu__item--current':menuList[1].current}"  ng-click="setCurrent(1)"><a href="#about" class="menu__link"><i class="fa fa-question-circle"></i> <span>How</span></a></li>

                        <li class="menu__item" ng-class="{'menu__item--current':menuList[2].current}"  ng-click="setCurrent(2)"><a href="#story" class="menu__link"><i class="fa fa-cc"></i> <span>Example</span></a></li>

                        <li ng-if="loggedin" class="menu__item" ><a href="" title="{{user.first_name}} {{user.last_name}}"  class="menu__link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img width="25px" ng-if="user.image" class="img-responsive img-circle" ng-src="{{user.image}}" alt="{{user.first_name}} {{user.last_name}}">
                            <img ng-if="!user.image" width="25px" class="img-responsive img-thumbnail img-circle" src="assets/img/avatar.png" alt="{{user.first_name}} {{user.last_name}}"></a>
                          <ul class="dropdown-menu cool-shadow">
                              <li><a href="#/"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                              <li><a href="#/settings"><i class="fa fa-gear"></i>&nbsp;Settings</a></li>
                              <li><a href="auth/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
                              
                          
                          </ul>
                          
                      </li>
                        <li class="menu__item" ng-if="!loggedin" ng-class="{'menu__item--current':menuList[3].current}" ><a href="" class="menu__link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  ng-click="setCurrent(3)"><i class="fa fa-sign-in"></i> <span>SignIn</span></a>
                        <ul class="dropdown-menu cool-shadow">
                            <li><a href="auth/login">Signin</a></li>
                            <li><a href="cooks/registerCook">Register As Cook</a></li>
                            <li><a href="">Register As Foodie</a></li>
                            
                        
                        </ul>
                        </li>
                        <li class="menu__item" ng-class="{'menumenu__item--current':menuList[4].current}"><a href="" class="menu__link" id="cart-button" title="Cart"  ng-click="(showCart=!showCart)&&setCurrent(4)"><i class="fa fa-cart-arrow-down"></i><div ng-show='cartTotal' class="cool-shadow"><strong>{{cartTotal}}</strong></div><span>Cart</span></a></li>
                        
                    </ul>
                </nav>
            </div>
            </div>
        </div> 
       
       </div>
   </header>
   <user-cart></user-cart>
</div><!-- /header -->