
<div class="kitchen-page">
<link rel="stylesheet" href="assets/css/home/kitchen.page.css">
<product-loading></product-loading>
    <div class="kitchen" ng-show="kitchenShow">
        <div class="container">
            <div class="kitchen-info-div bg-white cool-shadow">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 kitchen-info">
                        <div class="kitchen-name">
                            <h1 class="logo" ng-if="!kitchenData.kithcename">{{kitchenData.kitchename}}</h1>
                            <h1 class="logo" ng-if="kitchenData.kithcename">Fumontor Kitchen</h1>
                        </div>
                        <div class="kitchen-subtitle text-theme">
                            <blockquote cite="">
                                <p>{{kitchenData.kitchen_sub_title}}</p>
                            </blockquote>
                        </div>
                        <div class="kitchen-address text-muted">
                            {{kitchenData.address}}
                        </div>
                        <div class="kitchen-cook text-muted">
                            by- {{kitchenData.name}} 
                        </div>
                        <div class="kitchen-date text-muted">
                            Created on - {{kitchenData.createdon|date:"dd MMM yyyy 'at' h:mma"}}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="todays-menu-slider ">
                <div class="slider-container" >
                <div class="menu-title bg-white cool-shadow text-theme">
                    <strong>Todays Menu</strong>
                </div>
                    <slider  ng-if="todayLoaded" ng-show="todaysMenuItems.length"></slider>
                    <div class="alert alert-info bg-white text-theme2 cool-shadow" ng-if="!todaysMenuItems.length">
                        No Items in today's menu !!
                    </div>
                </div>
            </div>

            <div class="kitchen-menu ">
            <div class="menu-title bg-white cool-shadow text-theme ">
                <strong>Menu Items</strong>
            </div>
                <div class="kitchen-menu-container">
                    <menu-item items="menuItems" ng-if="menuItems.length"></menu-item>
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