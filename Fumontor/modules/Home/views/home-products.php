        
    <div >
    <a href="" id="filter-icon" class="filter-show cool-shadow " ng-click="hideFilterBar()"> <i class="fa fa-sliders" aria-hidden="true"></i> </a>
    <catagory-bar></catagory-bar>
        <div class="product-show-div"   ng-class="{'searched':searched}" >
        
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