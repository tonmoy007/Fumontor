<div class="recipe-items-container space " >

    <div class="col-md-2" ng-repeat="item in items|orderBy:item.published" >
        <a href="recipes/#/s/{{item.id}}" class="recipe-link" class="slideInUp animated">
            <div class="recipe-block bg-white cool-shadow text-left">
                <div class="recipe-img">
                <div class="img-overlay"></div>
                    <div class="recipe-img-container">
                        <img ng-if="item.image" ng-src="assets/recipes/{{item.id}}/{{item.image}}" alt="{{item.title}}" class="img-responsive center-img">
                        <img ng-src="assets/img/f6.jpg" class="img-responsive center-img" ng-if="!item.image" alt="thumbnail">
                    </div>
                </div>
                <div class="recipe-details">
                    <h2 class="recipe-title text-theme"><strong>{{item.title}}</strong></h2>
                    <span class="recipe-author">Author :<strong>{{item.name}}</strong></span>
                    <span class="recipe-time">{{item.published*1000|date}}</span>
                </div>
            </div>
        </a>
    </div>
</div>