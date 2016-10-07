<div class="menuItem" ng-repeat="(key,item) in items ">

<div class="col-md-2 fadeIn animated grid ">
    <div class="grid-lg">
        <div class="grid-img">
        <!-- <div class="grid-side-banner" ng-class="{now:item.todays_menu}">
            <label ng-show='!item.todays_menu' class="  banner-label">Pre Order</label>
            <label ng-show="item.todays_menu" class=" banner-label">Instant Order</label>
        </div> -->
            <a ng-if="href1" href="" ng-click="singleItemDisplay(item.id)" class="img-overlay block-link"><i class="fa fa-eye"></i></a>
            <a ng-if="!href1" href="#/kitchen/{{item.cooksID}}/{{item.id}}"  class="img-overlay block-link"><i class="fa fa-eye"></i></a>
            
            <img ng-if="item.feature_img" ng-show="item.feature_img" data-src-image="assets/uploads/{{item.cooksID}}/{{item.id}}/{{item.feature_img}}" bg-preload title="{{item.title}}" alt="{{item.title}}">
            <div class="img-loader">
                
            </div>
            <img ng-show="!item.feature_img" src="assets/img/thumb.jpg" title="khichuri" alt="{{item.title}}">
            
            
        </div>
        <div class="grid-description">
            <div class="description-body">
                <a href="javascript:void(0)" class="  text-theme2 "><h4>{{item.title}}</h4></a>
                <label class="secendery-url ">
                    <a href="#/kitchen/{{item.cooksID}}" class="text-black small">  {{item.kitchename}} </a>
                </label>
                <label for="" class="hidden cID">{{item.cooksID}}</label>
                

            </div>
            <div class="description-foot">
                
                <div class="rating-div hidden">
                    <div class="rating-stars tiny-star">
                        <div class="current-rating" style="width:{{item.reviews[0].totalmark/item.reviews[0].total_review*20}}%"></div>
                    </div>
                </div>
                <span class="rate">৳ <label class="price">{{item.price}}</label></span>
               <!-- <small class="text-muted" ng-if="item.todays_menu">Order before {{item.ordernow_time_text}}</small>
               <small class="text-muted" ng-if="!item.todays_menu">Order before {{item.preorder_time_text}}</small>
               <small class="text-muted" ng-if="item.stock_quantity>0">{{item.stock_quantity}} item available</small>
               <small class="text-danger" ng-if="item.stock_quantity<=0">out of stock </small> -->
            </div>
            <div  class="cd-customization hidden" ng-class="{active:item.active}" ng-click="makeItemActive(items,key)">
                
                <div class="quantity card"  ng-init="item.quantity=item.min_quantity">
                    
                    <input type="number" class="quantity-amount" ng-model="item.quantity">
                    <div class="plus-minus">
                        <span href="#0" ng-click="item.quantity=item.quantity+1" class="btn-tiny btn-plus  btn-light"><i class="fa fa-plus"></i></span>
                        <span   ng-click="item.quantity=item.quantity-1" ng-if="item.quantity>item.min_quantity" class="btn-tiny btn-minus  btn-light"><i class="fa fa-minus"></i></span>
                    </div>
                </div>
                <button id="cartBtn{{item.id}}"  class="add-to-cart btn btn-light pull-right" ng-click="addToCart(item,'cartBtn'+item.id)">
                    <em><i class="fa fa-shopping-cart"></i></em>
                    <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#3bbad0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                    </svg>
                </button>
            </div> <!-- .cd-customization -->
            <!-- <div class="item-out-of-stock  cd-customization" ng-if="item.stock_quantity==0">
                <div class="quantity">
                    <button href="#0" ng-if="item.quantity>item.min_quantity" ng-click="item.quantity=item.quantity-1" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                    <span class="quantity-amount">{{item.quantity}}</span>
                    <button href="#0" ng-if="true" ng-click="item.quantity=item.quantity+1" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                    
                </div>
                <a id="cartBtn{{item.id}}"  class=" add-to-cart btn btn-danger pull-right" ng-click="addToCart(item)">
                    <em><i class="fa fa-shopping-cart"></i></em>
                </a>
            </div> -->
        <div class="pIDin hidden">{{item.id}}</div>
        </div>
    </div>
</div>

</div>