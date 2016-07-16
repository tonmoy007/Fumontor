<div class="all-kitchen  container " id="all-kitchen-page">

    <div class="clearfix">
        
    </div>
    <product-loading></product-loading>
    <div class="row" >
        <div class="col-md-3">
        </div>
        <div class="col-md-6" id="all-kitchen" ng-if="kitchensLoaded">
            <div class="product-or-kitchen all-page" ng-if="location!=undefined">
                <div class="pro-or-kit-container">

                    <a href="#/location/{{location}}/{{orderType}}" class="btn cool-shadow btn-default btn-emboshed ">Products</a>
                    <a href="#/all-kitchen/{{location}}" class="btn cool-shadow btn-emboshed btn-danger not-active">Kithcens</a>
                </div>
            </div>
            <search-filter type="kitchen" items="null"></search-filter>
            <div class="all-kitchen-card-container row" ng-class="{all:location==undefined}" ng-show="kitchensLoaded">
            <!-- <div id="demo-2">
                <input type="search" ng-model="searchKitchen" class="form-control cool-shadow" name="" value="" placeholder="Search Kithcen">

            </div> -->

            
                <div ng-if="location!=undefined" class="text-theme2 text-right ">
                    {{location}} areas Kithcens 
                </div>
                <div ng-if="location==undefined" class="text-theme2 form-heading ">
                    All Kithcens 
                </div>
                <div class="horizontal-card kitchen-card cool-shadow bg-white fadeIn animated space" ng-repeat="(key,kitchen) in allKitchens|filter:search" >
                    <div class="card-container row ">
                        <div class="kitchen-logo col-sm-4">
                            <img class="img-responsive" src="assets/img/f6.jpg" alt="{{kitchen.kitchename}}">
                        </div>
                        <div class="description col-sm-8">
                            <div class="kitchen title slider-title " ng-if="!kithcen.kitchename">
                                <a href="#/kitchen/{{kitchen.user_id}}">{{kitchen.kitchename}}</a>
                            </div>
                            <div class="kitchen title slider-title " ng-if="kithcen.kitchename">
                                <a href="#/kitchen/{{kitchen.user_id}}">Fumontor Kitchen</a>
                            </div>
                            <div class="kitchen address ">
                                 <strong>Address:</strong> {{kitchen.address}}
                            </div>
                            <!-- <div class="kitchen address ">
                                <strong>Location:</strong> {{kitchen.location}}
                            </div> -->
                            <!-- <div class="kitchen service">
                                <strong>Service Areas :</strong>
                                <span class="label label-info" ng-repeat="area in kitchen.service_areas">{{area}}</span>
                            </div> -->
                            <div class="kitchen delivery">
                                <strong>Delivery Methods: </strong>
                                <span class="label label-info" ng-if="kitchen.pickup">Pick Up</span>
                                <span class="label label-info" ng-if="kitchen.home_delivery">Home Delivery</span>
                            </div>
                            
                            <div class="kitchen total-menuiitems ">
                                <strong>Total Menu Items</strong> <span class="badge">{{kitchen.total_items}}</span>
                            </div>
                            <div class="kitchen total-todays-menu">
                                <strong>Todays menu item </strong> <span class="badge">{{kitchen.total_todays_menu}}</span>
                            </div>
                            <div class="kitchen contact ">
                                <span class=" icons"> <i class="fa fa-phone"></i></span>
                                <span>{{kitchen.phone}}</span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="text-center" ng-show="kitchensLoaded">

                <div  class="more-loading" id="more-loading" ng-show="kithenloading">
                    
                </div>
                <span class="alert bg-trans-gray text-theme2 cool-shadow space text-center" ng-if="endedLoading"> no more kitchens found</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="all-kitchen-side-bar-container" ng-show="kitchensLoaded">
                <label class="text-theme2 form-heading small">Trending Kitchens</label>
                <div class="sidebar-container">
                    <a href="#/kitchen/{{slide.user_id}}"  ng-repeat="slide in trendingKitchen">
                        <div class="horizontal-card cool-shadow fadeIn animated sidebar-card space bg-white">
                            <div class="slidebar-card-image">
                                <img ng-src="assets/img/f8.jpg" class=" top img-responsive">
                            </div>
                            <h2 ng-if="slide.kitchename!=''" class="sidebar-card-title text-theme2">{{slide.kitchename}}</h2>
                            <h2 ng-if="slide.kitchename==''" class="sidebar-card-title text-theme2">    Fumontor Kitchen</h2>
                                          
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>