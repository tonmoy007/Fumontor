        
    <div >
    <a href="" ng-class="{'searched':searched}" id="filter-icon" class="filter-show cool-shadow " ng-click="hideFilterBar()"> <i class="fa fa-sliders" aria-hidden="true"></i> </a>
    
    <div class="product-or-kitchen">
        <div class="pro-or-kit-container">
            <a href="#/search/{{filter.location}}/{{orderType}}" class="btn cool-shadow btn-danger btn-emboshed not-active">Products</a>
            <a href="#/all-kitchen/{{location}}" class="btn btn-emboshed cool-shadow btn-default ">Kithcens</a>
        </div>
    </div>
        <div class="product-show-div"   ng-class="{'searched':searched}" >
        <catagory-bar></catagory-bar>
            <div class="product-show-div-container" ng-show="menuItemsShow">
                <div class="product-container">
                    <not-found-message></not-found-message>
                    <menu-item items="filterdmenuItems" href1="true" ></menu-item>

                </div>        
            </div>

        </div>
        <div class="item-description-popup" ng-repeat="item in filterdmenuItems ">
            <product-popup></product-popup>
        </div>
    </div>