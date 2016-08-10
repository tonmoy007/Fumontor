<link rel="stylesheet" type="text/css" href="assets/css/admin/gridProducts.css">
<script src="assets/js/fileUpload/ng-file-upload.min.js"></script>
<script src="assets/js/fileUpload/ng-file-upload-shim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/2.3.0/ng-tags-input.js"></script>
<link rel=stylesheet href="https://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/2.3.0/ng-tags-input.min.css">
<script src="assets/js/essentials/cooks.menu.js"></script>
<link rel="stylesheet" href="assets/css/additem.css">
<link rel="stylesheet" href="assets/css/fu-modal.css">
<link href="assets/css/register.css" rel="stylesheet">

<div class="row " ng-app="cooksMenu" ng-controller="menuCtrl">


            <div class="">

           <div class="">
                <product-loading></product-loading>
               
                <div class="grid-block" >
                
                   
                    <div class="grid-title">
                        <h1 class="menu-title">Daily Menu</h1>
                    </div>
                   
                    <div class="grid-area ">
                    
           <!-- /Load add new Item Block -->
                    <add-new-item-block type="'addNewItem'"></add-new-item-block>

                    <add-new-item-popup></add-new-item-popup>
             <!-- Product grid Start -->
                    <div class="product-container" ng-show="productFound">
                        <menu-item></menu-item>
                    </div>
                        <!-- No Menu Item Display -->
                    <not-found></not-found>
                        <!-- Edit Product -->
                    
                        <edit-menu-item-popup ng-repeat="(key,item) in menuItems |orderBy:id"></edit-menu-item-popup>
                        <!-- <quantity-pop ng-repeat="(key,item) in menuItems |orderBy:id"></quantity-pop> -->
                   
                        <!-- Show Product -->
                        <!-- Add Product -->
                       
                    
                   
                    </div>
                    
                </div>
                <hr class="cool-border co-md-8 col-offset-2">
                <div class="grid-block" >
                
                   
                    <div class="grid-title">
                        <h1 class="menu-title">Weekly Menu</h1>
                    </div>
                   
                    <div class="grid-area ">
                    
           <!-- /Load add new Item Block -->
                    <add-new-item-block type="'addWeeklyItem'"></add-new-item-block>

                    <add-weekly-item-popup></add-weekly-item-popup>
             <!-- Product grid Start -->
                    <div class="product-container" ng-if="weeklyMenuFound">
                        <weekly-menu-item ></weekly-menu-item>
                    </div>
                        <!-- No Menu Item Display -->
                    <not-found></not-found>
                        <!-- Edit Product -->
                    
                        <edit-weekly-item-popup ng-repeat="(key,item) in weeklyMenuItems "></edit-weekly-item-popup>
                        <!-- <quantity-pop ng-repeat="(key,item) in menuItems |orderBy:id"></quantity-pop> -->
                   
                        <!-- Show Product -->
                        <!-- Add Product -->
                       
                    
                   
                    </div>
                    
                </div>
                
           </div>
                
            </div>
<fu-notification></fu-notification>
        </div>
