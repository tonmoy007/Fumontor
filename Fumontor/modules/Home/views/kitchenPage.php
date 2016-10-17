
<div class="kitchen-page start-page all">
<link rel="stylesheet" href="assets/css/home/kitchen.page.css">
<product-loading></product-loading>
    <div class="kitchen" ng-show="kitchenShow">
        <div class="container">
            <div class="kitchen-info-div ">
                <div class="row">
                <div class="col-md-2 kitchen-logo">
                    <div class="logo-overlay" ng-if="kitchen-logo">
                        <img src="" alt="">
                    </div>
                    <div class="logo-overlay" ng-if="!kitchen-logo">
                        <img class="img-responsive" ng-src="assets/img/thumb.jpg" alt="">
                    </div>
                </div>
                    <div class="col-md-6 text-left">
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
                         <span class="home-label cook text-muted">
                            <!-- <span class="fa-stack  fa-1x ">
                              <i class="fa fa-circle text-theme fa-stack-2x "></i>
                              <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                            </span> --> 
                            <span>{{kitchenData.address}}</span>
                        </span>
                        
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

            
            

        </div>
    </div>
    <div class="item-description-popup" ng-repeat="item in menuItems">
            <product-popup></product-popup>
    </div>
    <div class="" ng-show="kitchenShow">
        <div class="tabs tabs-style-topline view__tab">
            <nav>
                <ul class="">
                    <li href="" title="" class="" ng-click="setTab(0)" ng-class="{'tab-current':tabNav[0].current}"><a href="" title="" class=""><i class="fa fa-cutlery"></i> <span> Menu</span> </a></li>
                    <li href="" title="" class=" "  ng-click="setTab(1)" ng-class="{'tab-current':tabNav[1].current}"><a href="" title=""><i class="fa fa-cutlery"></i><span> Weekly Menu</span> </a>
                    
                    <span class="badge bg-unseen "></span>
                   
                    </li>
                    <li href="" title="" class="" ng-click="setTab(2)"  ng-class="{'tab-current':tabNav[2].current}"><a href="" title="" ><i class="fa fa-info"></i><span> Info</span></a></li>
                    </ul>
            </nav>
            <div class="content-wrap">
                <section id="addMenu" class=""  ng-class="{'content-current':tabNav[0].current}">
                    <div class="kitchen-menu ">
                    <div class="menu-title text-left text-gray ">
                        Menu <br>
                        <small>All available items</small>
                    </div>
                        <div class="kitchen-menu-container text-left">
                            <menu-item items="menuItems"  ng-if="menuItems.length"></menu-item>
                            <div class="alert  bg-trans-gray text-theme2 cool-shadow" ng-if="!menuItems.length">
                                No Menu Items added yet !!
                            </div>
                        </div>
                    </div>
                </section>
                <section id="weekly_menu" class=""  ng-class="{'content-current':tabNav[1].current}">
                    <div class="kitchen-menu ">
                    <div class="menu-title text-left text-gray ">
                       Weekly Menu <br>
                        <small>All available Weekly packages</small>
                    </div>
                        <div class="kitchen-menu-container text-left">
                            <div class="menu-item weekly" ng-repeat="item in weekly_menu">
                                <div class="col-md-2 fadeIn animated grid ">
                                    <div class="grid-lg">
                                        <div class="grid-img">
                                        
                                            <a ng-if="href1" href="" ng-click="singleItemDisplay(item.id)" class="img-overlay block-link"><i class="fa fa-eye"></i></a>
                                            <a ng-if="!href1" href="#/weekly-menu/{{item.id}}"  class="img-overlay block-link"><i class="fa fa-eye"></i></a>
                                            
                                            <img ng-if="item.feature_img" ng-show="item.feature_img" ng-src="assets/uploads/{{item.cooksID}}/{{item.id}}/{{item.feature_img}}" title="{{item.title}}" alt="{{item.title}}">
                                            
                                            <img ng-show="!item.feature_img" src="assets/img/thumb.jpg" title="khichuri" alt="{{item.title}}">
                                            
                                            
                                        </div>
                                        <div class="grid-description">
                                            <div class="description-body">
                                                <a href="javascript:void(0)" class=" "><h4>{{item.title}}</h4></a>
                                                <label class="secendery-url">
                                                    <a href="#/kitchen/{{item.cooks_id}}" class="text-black small">  {{item.kitchename}} </a>
                                                </label>

                                            </div>
                                            <div class="description-foot">
                                                <span class="rate">৳ <label class="price">{{item.price}}</label>/person</span>
                                               
                                            </div>
                                            <div  class="cd-customization active full-menu" ng-class="{active:item.active}" >
                                                
                                               <a href="#/checkout/weekly-menu/{{item.id}}" class="btn btn-danger order-btn cool-shadow">Place order</a>
                                            </div> 
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert  bg-trans-gray text-theme2 cool-shadow " ng-if="!weekly_menu.length">
                                No Weekly package available !!
                            </div>
                        </div>
                    </div>
                </section>
                <section id="manageAccounts" class=""   ng-class="{'content-current':tabNav[2].current}">
                    <div class="kitchen-info-div">
                        
                        <div class="col-md-6 text-left">
                        <!-- <span class="home-label cook text-gray">
                            <span class="fa-stack  fa-1x ">
                              <i class="fa fa-circle text-theme fa-stack-2x "></i>
                              <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                            </span> 
                            <span>{{kitchenData.address}}</span>
                        </span> -->
                        <div class="kitchen " ng-if="kitchenData.service_areas.length">
                        <span class="home-label">
                            <span class="fa-stack  fa-1x ">
                              <i class="fa fa-circle text-theme fa-stack-2x "></i>
                              <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                            </span>
                            <span>Service Areas 
                                <ul class="kitchen service-areas">
                                    <li class="label bg-theme" ng-repeat="area in kitchenData.service_areas">{{area}}</li>
                                </ul>
                            </span>
                        </span>
                            
                        </div>
                        <span class="home-label cook text-gray">
                            <span class="fa-stack  fa-1x ">
                              <i class="fa fa-circle text-theme fa-stack-2x "></i>
                              <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                            </span>
                            <span>Location: <br>{{kitchenData.location}}</span> 
                        </span>
                         <span class="home-label cook text-gray">
                            <span class="fa-stack  fa-1x ">
                              <i class="fa fa-circle text-theme fa-stack-2x "></i>
                              <i class="fa fa-cutlery fa-stack-1x fa-inverse"></i>
                            </span>
                            
                            <span>Delivery Methods <br>
                                <div ng-if="kitchenData.pickup||kitchenData.home_delivery">
                                    <span class="badge" ng-if="kitchenData.pickup">Pickup</span>
                                    <span class="badge" ng-if="kitchenData.home_delivery">Home Delivery</span>
                                </div>
                                <div ng-if="!kitchenData.pickup&&!kitchenData.home_delivery">
                                    <span class="badge" >Not Specified</span>
                                </div>
                            </span>
                        </span>
                        <span class="home-label cook text-gray">
                            <span class="fa-stack  fa-1x ">
                              <i class="fa fa-circle text-theme fa-stack-2x "></i>
                              <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                            </span> 
                            <span>Phone no: <br>{{kitchenData.phone}}</span>
                        </span>
                        
                    </div>
                    </div>
                </section>
            </div><!-- /content -->
    </div>
</div>