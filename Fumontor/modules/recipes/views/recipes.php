<!-- <div class="recipe-head">
    <div class="recipe-cover">
        <div class="container">
            <div class="recipe-head-overlay" ng-init="showAddRecipe=false&&showLogin=false">
                <div class="recipe-section text-center">
                    <a href="" ng-show="loggedin" ng-click="showAddRecipe=true" class="btn btn-danger btn-wide cool-shadow">
                        <i class="fa fa-plus-circle"></i>&nbsp;&nbsp; add   &nbsp;&nbsp; new &nbsp;&nbsp;  recipe
                    </a>
                    <a href="" ng-show="!loggedin" ng-click="showLogin=true" class="btn btn-danger btn-wide cool-shadow">
                        <i class="fa fa-sign-in"></i>&nbsp;&nbsp; signin   &nbsp;&nbsp; to &nbsp;&nbsp; add &nbsp;&nbsp; recipe
                    </a>

                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="recipe-body">
    <!-- <add-recipe></add-recipe> -->
    
    <div class="container">
        <recipe-items ng-if="recipeItems.length" items="recipeItems"></recipe-items>
        <div  class="more-loading" id="more-loading" ng-show="recipeLoading&&userLoaded"></div>
    </div>
</div>
<!-- <div class="recipe-foot">
    <div class="fu-modal" id="login-model" ng-class="{'is-visible':showLogin}">
        <div class="fu-modal-container bg-light" ng-class="{'is-visible':showLogin}">
        <a href="" title="" ng-click="showLogin=false" class="fu-modal-close alter">Close</a>
        <div class="content-head"><h2>Login to Fumontor</h2></div>
            <div class="fu-modal-body">
                <recipe-login></recipe-login>
            </div>
        </div>
    </div>
</div> -->