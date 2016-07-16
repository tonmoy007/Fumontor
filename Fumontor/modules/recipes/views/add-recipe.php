<div class="fu-modal " ng-class="{'is-visible':showAddRecipe}" id="addRecipe">
<div class="overlay"></div>
    <div class="fu-modal-container" ng-class="{'is-visible':showAddRecipe}">

    <a href="" title="" ng-click="showAddRecipe=false" class="fu-modal-close alter">Close</a>
        <div class="content-head"><h2>Add New Recipe</h2></div>
        <div class="fu-modal-body text-left">
            
                <form name="recipeDetailsFrom" no-validate>
                    <div class="update-fimage cool-shadow" ng-form="featureImageForm">
                        <div class="add-image-btn">
                            <span class="fa-stack fa-lg fa-3x">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-camera-retro fa-stack-1x fa-inverse"></i>
                            </span>
                            Add images (max 4MB)
                        </div>
                        <input type="file"  ngf-select ngf-multiple="true" ng-model="newrecipe.feature_img_temp" class="" name="featureImage"    
                             accept="image/*" ngf-max-size="4MB" required
                             ngf-model-invalid="errorFile">

                    </div>
    
                    <div class="temp-upload-img"  ng-show="newrecipe.feature_img_temp" ng-repeat="(key,f_img) in newrecipe.feature_img_temp track by $index" >
                        <img ng-show="featureImageForm.featureImage.$valid" class="center-img img-responsive " ngf-thumbnail="f_img" > <button class="feature-img-remove" ng-click="removeFeatureImage(newrecipe.feature_img_temp,key)" ng-show="newrecipe.feature_img_temp[key]"><i class="fa fa-trash-o"></i></button>
                        <!-- <div class="progress fimage-progress" style="background: transparent; height: .8em">
                              <div class="progress-bar" role="progressbar" aria-valuenow="{{fimage_progress}"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{fimage_progress}}%">
                              </div>
                        </div> -->
                          

                    </div>
                   <!-- {{errorFile[0].$errorMessages}} -->
                    <span class="text-red" ng-if="errorFile[0].$errorMessages.maxSize"><small>Maximum size (4MB) limit exceeded :: input image must be less than 4MB</small></span>
                    <span class="text-red" ng-if="featureImageForm.featureImage.$error.required&&featureImageForm.featureImage.$invalid"><small>A feature image is required ( you can add more than one )</small></span>
                    <div class="space"> </div>
                    <div class="form-group" ng-form="titleForm">
                        <input type="text" name="title" minlength="4" maxlength="400" value="" placeholder="Recipe title" ng-model="newrecipe.title" required class="form-control">
                        <div class="form-group-info text-danger" ng-if="titleForm.title.$error.required&&titleForm.title.$dirty">
                            A title for the recipe is required
                        </div>
                        <div class="form-group-info text-danger" ng-if="titleForm.title.$error.minlength&&titleForm.title.$dirty">
                            A minimum of 4 character required for title
                        </div>
                        <div class="form-group-info text-danger" ng-if="titleForm.title.$error.maxlength&&titleForm.title.$dirty">
                            A title must not exceed 400 character
                        </div>
                    </div>
                    <div class="form-bottom">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="" value="" class="form-control" placeholder="Time required" ng-model="newrecipe.time">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="" value="" class="form-control" placeholder="For ? Person" ng-model="newrecipe.person">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="" value="" class="form-control" placeholder="Cusine" ng-model="newrecipe.cusine">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="" value="" class="form-control" placeholder="Price Estimation" ng-model="newrecipe.price">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="form-bottom no-top">
                    <h1 class="form-center-label"> Add Ingredients</h1>
                    <div class="ingredients">
                        <ul>
                            <li ng-repeat="ing in newrecipe.ingredients track by $index" class="cool-shadow">
                                <span>{{ing.name}}</span>-<span>{{ing.quantity}}</span>
                            </li>
                            <li ng-if="!newrecipe.ingredients.length" class="text-danger cool-shadow">A Recipe must have some ingredients</li>
                        </ul>
                    </div>
                    <form name="ingredientForm" ng-submit="addIngredients(ingredientForm,name,quantity)">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="ingredient" name="" required value="" placeholder="Ingredient Name" ng-model="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="" required value="" placeholder="Quantity" ng-model="quantity" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-danger cool-shadow no-mr" ng-disabled="ingredientForm.$invalid" value="add">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-bottom no-top">
                    <h1 class="form-center-label">Add Directions</h1>
                    <div class="directions">
                        <ul>
                            <li ng-repeat="(key,step) in newrecipe.directions track by $index">
                                <strong>Step: <span class="badge">{{key+1}}</span></strong>
                                <p class="lead">{{step}}</p>
                            </li>
                            <li ng-if="!newrecipe.directions.length" class="text-danger cool-shadow">Give directions to the recipe step by step</li>
                        </ul>
                    </div>
                    <label>Step <span class="badge">{{newrecipe.directions.length+1}}</span></label>
                    <form name="directionsForm" ng-keyup="$event.keyCode == 13&& !$event.shiftKey && addDirections(directionsForm,steps)" id="direction-form" ng-submit="addDirections(directionsForm,steps)">
                        <div class="form-group">
                            <textarea name="" id="steps" required placeholder="Add Steps" ng-model="steps" class="form-control" cols="2"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit"  name="" class="btn btn-danger cool-shadow no-mr" value="add" ng-disabled="directionsForm.$invalid">
                        </div>
                    </form>

                </div>
                <div class="form-bottom no-top no-bottom text-center">
                    <a href="" ng-click="addNewRecipe(recipeDetailsFrom,newrecipe)" ng-class="{disabled:recipeDetailsFrom.$invalid||!newrecipe.directions.length||!newrecipe.ingredients.length}" class="btn btn-danger cool-shadow no-mr">publish</a>
                </div>
                <div class="view_bottom space" ng-show="newrecipe.progress">
                    <div class="progress" style="background: #fff; height: 1.3em">
                          <div class="progress-bar  bg-theme" role="progressbar" aria-valuenow="{{newrecipe.progress}}"
                          aria-valuemin="0" aria-valuemax="100" style="width:{{newrecipe.progress}}%">
                            {{newrecipe.progress}}%
                          </div>
                        </div>
                    <div class="alert alert-danger" ng-show="errorMsg">
                        {{errorMsg}}
                    </div>
                </div>
            
        </div>
    </div>
</div>