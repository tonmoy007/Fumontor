
<div class="recipe-body">
    
    
    <div class="container">
    <a href="recipes/#/myrecipe" class="my-recipe-btn  ">
        <span class="fa-stack fa-lg fa-1x ">
          <i class="fa fa-circle fa-stack-2x "></i>
          <i class="fa fa-cutlery fa-stack-1x fa-inverse"></i>
        </span>
    </a>

        <div  class="more-loading" id="more-loading" ng-show="recipeLoading&&userLoaded"></div>
        <div class="single-recipe" ng-repeat="recipe in item" >
            <div class="single-recipe-container">
                <div class="single-recipe-head row">
                    <div class="single-recipe-img cool-border col-md-8">
                        <div class="single-recipe-img-container ">
                            <div class="image-viewer" ng-repeat="(k,image) in recipe.all_images"  ng-if="k==slider.index">
                                <div class="wrapper_img">
                                    <img ng-if="k!='thumb'" ng-src="{{image.relative_path}}/{{image.name}}"  class="img-responsive center-content" alt="{{recipe.title}}">
                                </div>
                            </div>
                        </div>
                        <div class="single-recipe-img-thumb-container">
                            <ul class="recipe-img-thumbs">
                                <li ng-repeat="(key,img) in recipe.all_images track by $index" ng-show="key!='thumb'" ng-class="{active:slider.index==key}">
                                    <a href="" ng-click="slider.index=key" >
                                    <img ng-src="{{img.relative_path}}/{{img.name}}" alt="{{recipe.title}}" class="img-responsive cool-shadow">
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="single-recipe-info col-md-4 text-left ">
                    <label class=" text-theme recipe-title main space"><strong>{{recipe.title}}</strong> </label>
                    <span class="small"></span><small class=" small text-black"><strong>{{recipe.name}}</strong></small>
                         <div class="form-bottom no-bottom">
                            <span class="detail-list col-sm-6"><strong>Cuisine : </strong> {{recipe.cusine}}</span>
                            <span class="detail-list col-sm-6"><strong>Prepare Time : </strong>{{recipe.prepare_time}}</span>
                            <span class="detail-list col-sm-6">For <span class="badge">{{recipe.person}}</span> Person</span>
                        </div>
                        <!-- <div class="form-bottom ">
                            <span class="detail-list col-sm-6"><strong>Cusine : </strong> {{recipe.cusine}}</span>
                            <span class="detail-list col-sm-6"><strong>Prepare Time : </strong>{{recipe.prepare_time}}</span>
                            <span class="detail-list col-sm-6"><strong>Cost : </strong>{{recipe.cost}}</span>
                            <span class="detail-list col-sm-6">For <span class="badge">{{recipe.person}}</span> Person</span>
                        </div> -->
                        <div class="form-bottom no-bottom">
                        <div class="share-buttons-block space ">
                            <a href="" class="share-button " title="event">
                                <span class="fa-stack fa-1x ">
                                  <i class="fa fa-circle fa-stack-2x "></i>
                                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>

                            <a href="" class="share-button " ng-click="shareLink('http://fumontor.com/recipes/#/s/'+recipe.id,recipe.title,recipe.name,'http://fumontor.com/assets/recipes/'+recipe.id+'/'+recipe.image,recipe.directions[0])" title="search"><span class="fa-stack  fa-1x ">
                                  <i class="fa fa-circle text-facebook fa-stack-2x "></i>
                                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                              <a href="" class="share-button" title="lock"><span class="fa-stack  fa-1x ">
                                  <i class="fa fa-circle fa-stack-2x "></i>
                                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span></a>

                        </div>
                        </div>
                    </div>
                </div>
                <div class="single-recipe-details text-left space">
                    
                        <label class="recipe-title space text-theme2"><strong>Ingredients</strong></label>
                        <div class="form-bottom no-bottom">
                            <div class="ingredients">
                                <ul>
                                    <li ng-repeat="ing in recipe.ingredients " class="cool-shadow">
                                        <span>{{ing.name}}</span>-<span>{{ing.quantity}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <label class="recipe-title space text-theme2"><strong>Directions</strong></label>
                        <div class="form-bottom ">
                            <div class="directions">
                                <ul>
                                    <li ng-repeat="(key,step) in recipe.directions track by $index">
                                        <strong class="light-span">Step: {{$index+1}}</strong>
                                        <p class="lead product-description">{{step}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <label class="recipe-title space"><strong></strong></label>
                        <div class="form-bottom no-top">
                            
                               <div  class="more-loading" id="more-loading" ng-show="commentLoading"></div>
                              <div ng-if="fbLink">
                                <div class="fb-comments" fb-comment-box page-href="{{fbLink}}" data-numposts="5" data-colorscheme="light" data-width="100%">
                                    
                                </div>
                              </div>
                        </div>
                        <div ng-if="fbLink" class="share-buttons-block text-center form-bottom no-top no-bottom">
                            <div class="fb-share-button" fb-share-button page-href="{{fbLink}}" 
                                data-layout="button_count">
                            </div>
                            <!-- <a href="" class="share-button" title="event"><i class="fa fa-linkedin"></i></a>
                            <a href="" class="share-button" title="search"><i class="fa fa-facebook"></i></a>
                            <a href="" class="share-button" title="lock"><i class="fa fa-twitter"></i></a> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

