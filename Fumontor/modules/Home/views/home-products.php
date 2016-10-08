        
    <div class=" start-page all" >
    <!-- <a href="" ng-class="{'searched':searched}" id="filter-icon" class="filter-show cool-shadow " ng-click="hideFilterBar()"> <i class="fa fa-sliders" aria-hidden="true"></i> </a> -->
    
  <!--   <div class="product-or-kitchen">
        <div class="pro-or-kit-container">
            <a href="#/search/{{filter.location}}/{{orderType}}" class="btn cool-shadow btn-danger btn-emboshed not-active">Products</a>
            <a href="#/all-kitchen/{{location}}" class="btn btn-emboshed cool-shadow btn-default ">Kithcens</a>
        </div>
    </div> -->

        <div class="container">
        <div class="col-md-2">
            
        </div>
            <div class="col-md-10" >
        <search-filter type="'all'" items="'filterdmenuItems'"></search-filter>
       <!--  <div class="alert bg-trans-gray text-theme cool-shadow space" ng-show="!loading" ng-if="filterdmenuItems.length">
            Total <span class="badge bg-theme text-white">{{filterdmenuItems.length}}</span> items found
        </div> -->
             <div class="product-show-div"   >
            <!-- <catagory-bar></catagory-bar> -->
                <div class="product-show-div-container" id="product-div" style="min-height: calc(100vh - 200px)" ng-show="filterdmenuItems.length">
                    <div class="product-container">
                        
                        <menu-item items="filterdmenuItems" href1="true" ></menu-item>
                        <!-- <not-found-message></not-found-message> -->
                        <div class="space">
                    <div class="more-loading" ng-if="moreFoodloading" >
                    
                    </div>
                    </div>
                   <!--  <div class="alert bg-trans-gray text-theme" ng-if="productEnd">
                        No more item found
                    </div> -->
                <!-- <div class="space text-center" ng-if="!productEnd&&filterdmenuItems.length" >
                   <a href="" class="btn btn-danger btn-sm cool-shadow" ng-click="loadMoreFood(index)">Load More</a>
               </div> -->
                    </div>        
                </div>

            </div>
            

        </div>
        <div class="item-description-popup" ng-repeat="item in filterdmenuItems ">
            <product-popup></product-popup>
        </div>
    </div>
    </div>