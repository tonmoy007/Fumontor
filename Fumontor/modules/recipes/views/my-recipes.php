<div class="recipe-body space" >
    <div class="container" ng-if="loggedin">
    
        <h1 class="form-center-label text-left">My Recipes</h1>
    
        <recipe-items ng-if="myrecipeItems.length" items="myrecipeItems"></recipe-items>
        <div class="alert bg-white cool-shadow text-theme space" ng-if="!recipeLoading&&!myrecipeItems.length">
            No item added yet
        </div>
        <div  class="more-loading" id="more-loading" ng-show="recipeLoading"></div>
    </div>
    <div class="container" ng-if="!loggedin">
        <div class="alert bg-trans-gray text-danger text-center">
               
        <strong> You neeed to login see your recipes</strong>
                    
        </div>
                    <div>
                        <a href=""    ng-click="showLoginFrom()" class="btn  bg-red btn-wide cool-shadow ">
                        <i class="fa fa-sign-in"></i> Login  </a>
                    </div>
                    <div>
                        <a class="btn bg-trans-gray text-theme" href="recipes/#/"><span class="home-icons recipe-icon"></span><br> all recipes</a>
                    </div>
    </div>
</div>