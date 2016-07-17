<div class="container" >
    <!-- <a href="" ng-class="{'searched':searched}" id="filter-icon" class="filter-show cool-shadow " ng-click="hideFilterBar()"> <i class="fa fa-sliders" aria-hidden="true"></i> </a> -->
    <product-loading></product-loading>
    <div class="product-or-kitchen all-page space">
        <div class="pro-or-kit-container" ng-show="!loading">
            <a href="#/search/head/{{query}}" class="btn cool-shadow btn-danger not-active btn-emboshed ">Products</a>
            <a href="#/search/kitchen/{{query}}" class="btn  cool-shadowbtn-emboshed btn-default ">Kithcens</a>
        </div>
    </div>
    <div class="col-md-2">
        
    </div>
    <div class="col-md-10">
    <search-filter type="'food'" items="'searchedMenuItems'"></search-filter>
        <div class="alert bg-trans-gray text-theme cool-shadow space" ng-show="!loading" ng-if="!searchedMenuItems.length">
        No Match Found
        </div>
        <div class="alert bg-trans-gray text-theme cool-shadow space" ng-show="!loading" ng-if="searchedMenuItems.length">
            Total <span class="badge bg-theme text-white">{{searchedMenuItems.length}}</span> items found
        </div>
        <div class="product-show-div" id="product-div"   ng-class="{'searched':searched}" >
        <!-- <catagory-bar></catagory-bar> -->
            <div class="product-show-div-container" ng-show="searcedItemsShow">
                <div class="product-container">
                    
                    <menu-item items="searchedMenuItems" href1="true" ></menu-item>

                </div>        
            </div>

        </div>
    </div>
        <div class="item-description-popup" ng-repeat="item in searchedMenuItems ">
            <product-popup></product-popup>
        </div>
    </div>