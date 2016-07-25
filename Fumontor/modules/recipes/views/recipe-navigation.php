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
                        <li class="menu__item " ng-class="{'menu__item--current':menuList[0].current}" ng-click="setCurrent(0)" title="Home"><a href="#home" class="menu__link" ng-click="open=!open"><i class="fa fa-home"></i> <span>Home</span></a></li>
                        <li class="menu__item" ng-class="{'menu__item--current':menuList[1].current}"  ng-click="setCurrent(1)"><a href="" ng-click="moveto('dishes')" class="menu__link" ng-click="open=!open"><i class="fa fa-question-circle" ></i> <span>All Dishes</span></a></li>
                        
                        <li class="menu__item" ng-class="{'menu__item--current':menuList[2].current}"  ng-click="setCurrent(2)"><a href="#/all-kitchen" class="menu__link" ng-click="open=!open"><i class="fa fa-cutlery" title="All Kithcens" ></i> <span>Kitchens</span></a></li>
                        <li class="menu__item menu__item--current"  ng-click="setCurrent(3)" ng-class="{'menu__item--current':menuList[3].current}" ><a href="recipes/#/"  class="menu__link" ><i class="fa fa-cutlery" title="All Kithcens" ></i> <span>Recipes</span></a></li>
                        
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