
<div class="kitchen-page start-page all">
<link rel="stylesheet" href="assets/css/home/kitchen.page.css">
<product-loading></product-loading>
    <div class="kitchen" ng-show="kitchenShow">
        <div class="container">
            <div class="kitchen-info-div ">
                <div class="row">
                <div class="col-md-4 kitchen-logo">
                    <div class="logo-overlay" ng-if="kitchen-logo">
                        <img src="" alt="">
                    </div>
                    <div class="logo-overlay" ng-if="!kitchen-logo">
                        <img class="img-responsive" ng-src="assets/img/thumb.jpg" alt="">
                    </div>
                </div>
                    <div class="col-md-8 text-left">
                        <div class="kitchen-name">
                            <h1 class="text-gray" ng-if="!kitchenData.kithcename"><strong>{{kitchenData.kitchename}}</strong></h1>
                            <h1 class="" ng-if="kitchenData.kithcename"><strong>Fumontor Kitchen</strong></h1>
                        </div>
                        <div class="kitchen-subtitle text-gray">
                            <blockquote cite="">
                                <p>{{kitchenData.kitchen_sub_title}}</p>
                            </blockquote>
                        </div>
                        
                        <div class="kitchen cook text-muted">
                            <strong>{{kitchenData.name}} </strong>
                        </div>
                        <div class="kitchen space">
                        <span class="text-gray">Service Areas</span>
                            <ul class="kitchen service-areas">
                                <li class="label bg-theme" ng-repeat="area in kitchenData.service_areas">{{area}}</li>
                            </ul>
                        </div>
                        <div class="social-share">
                            <ul class="share-links  text-left">
                            <li>
                                <a href="">
                                    <span class="fa-stack  fa-1x ">
                                      <i class="fa fa-circle text-theme fa-stack-2x "></i>
                                      <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="fa-stack  fa-1x ">
                                      <i class="fa fa-circle text-facebook fa-stack-2x "></i>
                                      <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="fa-stack  fa-1x ">
                                      <i class="fa fa-circle text-theme fa-stack-2x "></i>
                                      <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="todays-menu-slider " ng-show="todaysMenuItems.length">
                <div class="slider-container" >
                <div class="menu-title text-left text-gray">
                    Todays Menu<br>
                    <small>This items will be available today</small>
                </div>
                    <slider  ng-if="todayLoaded" ng-show="todaysMenuItems.length"></slider>
                    
                    <div class="alert alert-info bg-white text-theme2 cool-shadow" ng-if="!todaysMenuItems.length">
                        No Items in today's menu !!
                    </div>
                </div>
            </div> -->
            <div  class="more-loading" id="more-loading" ng-show="!todayLoaded"></div>

            <div class="kitchen-menu ">
            <div class="menu-title text-left text-gray ">
                Menu <br>
                <small>All available items</small>
            </div>
                <div class="kitchen-menu-container text-left">
                    <menu-item items="menuItems"  ng-if="menuItems.length"></menu-item>
                    <div class="alert alert-info bg-white text-theme2 cool-shadow" ng-if="!menuItems.length">
                        No Menu Items added yet !!
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="item-description-popup" ng-repeat="item in menuItems">
            <product-popup></product-popup>
        </div>
</div>