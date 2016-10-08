    


    <div class="recipe-cover" ng-if="userLoaded">
    <add-recipe></add-recipe>
        <div class="container">
            <div class="recipe-head-overlay" ng-init="showAddRecipe=false">
                <div class="recipe-section text-center" ng-init="showLogin=false">
                    <div class="" ng-show="loggedin">
                        <a href=""  id="filter-icon"  style="font-size: 12px" ng-click="showAddRecipe=true" class="btn bg-red cool-shadow nav-action">
                        <i class="fa fa-plus-circle"></i> add new recipe </a>
                    </div>
                    <div ng-show="!loggedin">
                        <a href=""  id="topme-btn" style="font-size: 12px" ng-show="!loggedin" ng-click="showLogin=true" class="btn  bg-red  cool-shadow nav-action">
                        <i class="fa fa-sign-in"></i>  add recipe</a>
                    </div>
                </div>
            </div>
        </div>
    <div class="fu-modal" id="login-model" ng-class="{'is-visible':showLogin}">
        <div class="fu-modal-container bg-light" ng-class="{'is-visible':showLogin}">
        <a href="" title="" ng-click="showLogin=false" class="fu-modal-close alter">Close</a>
        <div class="content-head"><h2>Login to Fumontor</h2></div>
            <div class="fu-modal-body">
                <recipe-login></recipe-login>
            </div>
        </div>
    </div>
    </div>

    