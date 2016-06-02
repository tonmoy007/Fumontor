<div id="{{item.id}}" class="fu-modal">
<div class="overlay"></div>
<div id="fu-loader"><i class="fa fa-spinner fa-pulse"></i></div>
    <div class="fu-modal-container">
    <a href="" title="" ng-click="closeModel(item.id)" class="fu-modal-close alter">Close</a>
        
        <div class="fu-modal-body">
                <div class="row">
                <div class="col-md-6 model-column img-column">
                    <img class="img-responsive feature_img full-width" ng-if="item.feature_img" ng-show="item.feature_img" ng-src="assets/uploads/{{item.cooksID}}/{{item.id}}/{{item.feature_img}}" title="{{item.title}}" alt="{{item.title}}">
                
                    <img ng-show="!item.feature_img" class="img-responsive full-width" src="assets/uploads/default/thumb.jpg" title="{{item.title}}" alt="{{item.title}}">
                    <form name="upload-feather-image" method="get" ng-submit="changeFeatureImage(item)" accept-charset="utf-8">
                        <div class="update-fimage">
                            <i class="fa fa-camera-retro"></i>
                            <input type="file"  ngf-select ng-model="item.feature_img_temp" class="form-control" name="featureImage"    
                                 accept="image/*" ngf-max-size="2MB" required
                                 ngf-model-invalid="errorFile">

                        </div>
                        <input type="submit" ng-show="item.feature_img_temp"  value="change" class="btn btn-default feature_img_submit">
                    </form>
                    <div class="temp-upload-img"  ng-show="item.feature_img_temp">
                        <img ng-show="upload-feather-image.featureImage.$valid" class=" img-responsive grid-lg" ngf-thumbnail="item.feature_img_temp" > <button class="feature-img-remove" ng-click="item.feature_img_temp=''" ng-show="item.feature_img_temp"><i class="fa fa-trash-o"></i></button>
                        <div class="progress fimage-progress" style="background: transparent; height: .8em">
                              <div class="progress-bar" role="progressbar" aria-valuenow="{{fimage_progress}"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{fimage_progress}}%">
                              </div>
                            </div>
                        <div class="alert alert-danger" ng-show="errorMsg">
                            {{errorMsg}}
                        </div>     
                    </div>
                </div>
                <div class="col-md-6 model-column description">
                    <div class="product title">
                        <form class="item-edit-form cool-border" name="titleEditForm" ng-show="titleEditFormShow" ng-submit="changeItem(item.id,'title',item.title)">
                            <div class="form-group">
                            <label for="" class="control-label">Title</label>
                            <input type="text" name="" class="form-control" value="" ng-model="item.title" placeholder="Title">

                            <input type="submit" ng-click="titleEditFormShow=!titleEditFormShow" name="" class="btn btn-default" value="Change">
                            </div>
                        </form>
                        <div class="product-data">
                            <strong>{{item.title}}</strong>
                        </div>
                        <a href="" class="item-edit-trigger" ng-click="titleEditFormShow=!titleEditFormShow" title="edit"><i ng-if="!titleEditFormShow" class="fa fa-pencil"></i> <i ng-if="titleEditFormShow" class="fa fa-times"></i></a>
                    </div>
                    <div class="product stock">

                        <form class="item-edit-form cool-border" name="stockEditForm" ng-show="stockEditFormShow" ng-submit="changeItem(item.id,'stock_quantity',item.stock_quantity)">
                            <div class="form-group">
                            <label for="" class="control-label">Stock</label>
                            <input type="text" name="" class="form-control" value="" ng-model="item.stock_quantity" placeholder="Stock">

                            <input type="submit" ng-click="stockEditFormShow=!stockEditFormShow" name="" class="btn btn-default" value="Change">
                            </div>
                        </form>
                          <div class="product-data">
                              <strong>Stock :</strong> {{item.stock_quantity}}
                          </div>
                          <a href="" class="item-edit-trigger" ng-click="stockEditFormShow=!stockEditFormShow" title="edit"><i ng-if="!stockEditFormShow" class="fa fa-pencil"></i> <i ng-if="stockEditFormShow" class="fa fa-times"></i></a>
                    </div>
                    <div class="product price">

                        <form class="item-edit-form cool-border" name="priceEditForm" ng-show="priceEditFormShow" ng-submit="changeItem(item.id,'price',item.price)">
                            <div class="form-group">
                            <label for="" class="control-label">Price</label>
                            <input type="text" name="" class="form-control" value="" ng-model="item.price" placeholder="Price">

                            <input type="submit" ng-click="priceEditFormShow=!priceEditFormShow" name="" class="btn btn-default" value="Change">
                            </div>
                        </form>
                           <div class="product-data">
                               <strong>Price : </strong>{{item.price}} ৳
                           </div>
                           <a href="" class="item-edit-trigger" ng-click="priceEditFormShow=!priceEditFormShow" title="edit"><i ng-if="!priceEditFormShow" class="fa fa-pencil"></i> <i ng-if="priceEditFormShow" class="fa fa-times"></i></a>
                    </div>
                    
                    

                    <div class="product cusine">

                        <form class="item-edit-form cool-border" name="cusineEditForm" ng-show="cusineEditFormShow" ng-submit="changeItem(item.id,'cusines',item.cusines)">
                            <div class="form-group">
                            <label for="" class="control-label">Cusine</label>
                            <select class="form-control" required="true" ng-model="item.cusines" name="cusine" id="cusine" >
                                    <option value="">Select Cusine</option>
                                    <option value="Bangla">Bangla</option>
                                    <option value="Chinise">Chinise</option>
                                    <option value="Indian">Indian</option>
                                    <option value="French">French</option>
                                    
                            </select>

                            <input type="submit" ng-click="cusineEditFormShow=!cusineEditFormShow" name="" class="btn btn-default" value="Change">
                            </div>
                        </form>

                        <strong>Cusine</strong><br>
                        <div class="product-data">
                            {{item.cusines}} 
                        </div>
                        <a href="" class="item-edit-trigger" ng-click="cusineEditFormShow=!cusineEditFormShow" title="edit"><i ng-if="!cusineEditFormShow" class="fa fa-pencil"></i> <i ng-if="cusineEditFormShow" class="fa fa-times"></i></a>
                    </div>
                    <div class="product minQuantity">
                        <form class="item-edit-form cool-border" name="minQuantityEditForm" ng-show="minQuantityEditFormShow" ng-submit="changeItem(item.id,'min_quantity',item.min_quantity)">
                            <div class="form-group">
                            <label for="" class="control-label">Minimum Order Quantity</label>
                            
                            <input class="form-control" type="number" name="" value="" ng-model="item.min_quantity" placeholder="">
                            <input type="submit" ng-click="minQuantityEditFormShow=!minQuantityEditFormShow" name="" class="btn btn-default" value="Change">
                            </div>
                        </form>
                        <div class="prodct-data">
                            <strong>Minimum Order Quantity : </strong>{{item.min_quantity}}
                        </div>
                        <a href="" class="item-edit-trigger" ng-click="minQuantityEditFormShow=!minQuantityEditFormShow" title="edit"><i ng-if="!minQuantityEditFormShow" class="fa fa-pencil"></i> <i ng-if="minQuantityEditFormShow" class="fa fa-times"></i></a>
                    </div>
                    <div class="product servicetag">
                        <form class="item-edit-form cool-border" name="catagoriesEditForm" ng-show="catagoriesEditFormShow" ng-submit="changeItem(item.id,'catagories',item.catagoryList)">
                            <div class="form-group">
                            <label for="" class="control-label">Minimum Order Quantity</label>
                            
                            <tags-input ng-model="item.catagoryList" placeholder="add a catagory">
        
                            </tags-input>
                            <input type="submit" ng-click="catagoriesEditFormShow=!catagoriesEditFormShow" name="" class="btn btn-default" value="Change">
                            </div>
                        </form>
                        <div class="product-data">
                        <label><strong>Catagories</strong></label>
                        <div class="clearfix"></div>
                        
                            <label class="badge bg-theme catagory" ng-repeat="catagory in item.catagoryList">{{catagory.text}}</label>
                        
                        </div>
                        <div class="clearfix"></div>
                        <a href="" class="item-edit-trigger" ng-click="catagoriesEditFormShow=!catagoriesEditFormShow" title="edit"><i ng-if="!catagoriesEditFormShow" class="fa fa-pencil"></i> <i ng-if="catagoriesEditFormShow" class="fa fa-times"></i></a>
                    </div>

                    <div class="product description">
                        <form class="item-edit-form cool-border" name="descriptionEditForm" ng-show="descriptionEditFormShow" ng-submit="changeItem(item.id,'description',item.description)">
                            <div class="form-group">
                            <label for="" class="control-label">Description</label>
                            
                            <textarea name="description" rows="2" class="form-control" placeholder="Description" ng-model="item.description" required></textarea>
                            <input type="submit" ng-click="descriptionEditFormShow=!descriptionEditFormShow" name="" class="btn btn-default" value="Change">
                            </div>
                        </form>
                        <div class="product-data">
                            <strong>Description </strong>
                            <br>
                            {{item.description}}
                        </div>
                        <a href="" class="item-edit-trigger" ng-click="descriptionEditFormShow=!descriptionEditFormShow" title="edit"><i ng-if="!descriptionEditFormShow" class="fa fa-pencil"></i> <i ng-if="descriptionEditFormShow" class="fa fa-times"></i></a>
                    </div>
                <div class="menutype">
                    <label class="badge bg-theme" ng-show='!item.todays_menu' class=" tag banner-label">Not Added in today's menu</label>
                    <label class="badge bg-theme" ng-show="item.todays_menu" class="tag banner-label">Added to today's menu </label>
                </div>
                <div class="product scedule">
                    <form class="item-edit-form cool-border" name="sceduleEditForm" ng-show="sceduleEditFormShow" ng-submit="changeItemScedule(item)">
                    <label for="" class="control-label"><strong>Preparation time for</strong></label>
                            <div class="form-group ">
                            
                            <div class="form-inline">
                            <label for="" class="control-label"> <strong>Pre-order</strong></label>
                            <select  name="scedule" ng-model="item.preorder_time_for.hr" class="form-control" ng-options="hour as hour.value for hour in scedule.hours track by hour.value" >
                                    
                            </select>hours
                            <select  name="scedule" ng-model="item.preorder_time_for.min" class="form-control" ng-options="munite as munite.value for munite in scedule.munites track by munite.value" >
                                    
                            </select>munites
                            </div>
                            <div class="clearfix"> </div>
                            <div class="form-inline">
                            <label for="" class="control-label"> <strong>Today's menu</strong></label>
                            <select  name="scedule" ng-model="item.ordernow_time_for.hr" class="form-control" ng-options="hour as hour.value for hour in scedule.hours track by hour.value" >
                                    
                            </select>hours
                            <select  name="scedule" ng-model="item.ordernow_time_for.min" class="form-control" ng-options="munite as munite.value for munite in scedule.munites track by munite.value" >
                                    
                            </select>munites
                            </div>




                            <input type="submit" ng-click="sceduleEditFormShow=!sceduleEditFormShow" name="" class="btn btn-default" value="Change">
                            </div>
                    </form>
                    <div class="product-data">
                    <strong>Scedule :</strong><div class="clearfix"></div>
                        <label for="">Pre order process time :{{item.preorder_time_text}}</label>
                        <label class="">Todays Menu Process Time : {{item.ordernow_time_text}}</label>
                    </div>
                    <a href="" class="item-edit-trigger" ng-click="sceduleEditFormShow=!sceduleEditFormShow" title="edit"><i ng-if="!sceduleEditFormShow" class="fa fa-pencil"></i> <i ng-if="sceduleEditFormShow" class="fa fa-times"></i></a>
                    
                </div>
                <div class="cd-action">
                    <a ng-if="!item.todays_menu" href="" class="btn btn-danger btn-emboshed btn-wide" ng-click="singleItemDisplay('setQuantity'+item.id)">Set  As  Today's  Menu</a>
                    <a href="" ng-if="item.todays_menu" class="btn bg-red btn-emboshed btn-wide" ng-click="setAsTodaysMenu(item)">remove  from  today's  menu</a>
                </div> <!-- .cd-customization -->  
                </div>
            </div>
        </div>
        <div class="fu-modal-footer"></div>
    </div>
</div>
