<div class=" start-page all ">
<div class="more-loading" ng-if="weeklyMenuLoading"></div>
<div class="space">
    
</div>
    <div class="weekly-menu container" ng-if="!weeklyMenuLoading">
        <div class="menu-item" ng-repeat="item in weeklyMenus">
            <div class="col-md-2 fadeIn animated grid ">
                <div class="grid-lg">
                    <div class="grid-img">
                    
                        <a ng-if="href1" href="" ng-click="singleItemDisplay(item.id)" class="img-overlay block-link"><i class="fa fa-eye"></i></a>
                        <a ng-if="!href1" href="#/weekly-menu/{{item.id}}"  class="img-overlay block-link"><i class="fa fa-eye"></i></a>
                        
                        <img ng-if="item.feature_img" ng-show="item.feature_img" ng-src="assets/uploads/{{item.cooksID}}/{{item.id}}/{{item.feature_img}}" title="{{item.title}}" alt="{{item.title}}">
                        
                        <img ng-show="!item.feature_img" src="assets/img/thumb.jpg" title="khichuri" alt="{{item.title}}">
                        
                        
                    </div>
                    <div class="grid-description">
                        <div class="description-body">
                            <a href="javascript:void(0)" class="main-url cool-shadow "><h4>{{item.title}}</h4></a>
                            <label class="secendery-url">by 
                                <a href="#/kitchen/{{item.cooks_id}}" class=" small">  {{item.kitchename}} </a>
                            </label>

                        </div>
                        <div class="description-foot">
                            <span class="rate">৳ <label class="price">{{item.price}}</label></span>
                           
                        </div>
                        <div  class="cd-customization active full-menu" ng-class="{active:item.active}" >
                            
                           <a href="#/checkout/weekly-menu/{{item.id}}" class="btn btn-danger order-btn cool-shadow">Place order</a>
                        </div> 
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>