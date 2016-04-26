<link rel="stylesheet" href="assets/css/admin/gridProducts.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/fu-modal.css">
<link rel="stylesheet" href="assets/css/home/rzslider.min.css">


    
    

    <product-loading></product-loading>
    
    
    <div class="main-div">
        <div class="product-show-div"  ng-class="{'searched':searched}" >
        
            <div class="product-show-div-container" ng-show="menuItemsShow">
                <div class="product-container">
                    <not-found-message></not-found-message>
                    <menu-item ></menu-item>

                </div>        
            </div>

        </div>
    </div>
    <div class="item-description-popup" ng-repeat="item in menuItems | getqueryresults:query">
        <product-popup></product-popup>
    </div>
   



