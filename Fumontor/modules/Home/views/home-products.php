<div class="product-show-div"   ng-class="{'searched':searched}" >
        
            <div class="product-show-div-container" ng-show="menuItemsShow">
                <div class="product-container">
                    <not-found-message></not-found-message>
                    <menu-item ></menu-item>

                </div>        
            </div>

        </div>
        <div class="item-description-popup" ng-repeat="item in menuItems | getqueryresults:query">
            <product-popup></product-popup>
        </div>