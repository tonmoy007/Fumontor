
<div id="{{item.id}}" class="fu-modal">
<div class="overlay"></div>
<div id="fu-loader"><i class="fa fa-spinner fa-pulse"></i></div>
    <div class="fu-modal-container">
    <a href="" title="" ng-click="closeModel(item.id)" class="fu-modal-close alter">Close</a>
        
        <div class="fu-modal-body">
                <div class="row">
                <div class="col-md-6 model-column img-column">
                    <img class="img-responsive full-width" ng-if="item.feature_img" ng-show="item.feature_img" ng-src="assets/uploads/{{item.cooksID}}/{{item.id}}/{{item.feature_img}}" title="{{item.title}}" alt="{{item.title}}">
                
                    <img ng-show="!item.feature_img" class="img-responsive" src="assets/uploads/default/thumb.jpg" title="khichuri" alt="khichuri">
                    
                </div>
                <div class="col-md-6 model-column">
                    <div class="product title">
                        <strong>{{item.title}}</strong>
                    </div>
                    <div class="product status">
                          {{item.status}}
                    </div>
                    <div class="product price">
                            <strong>Price :</strong> {{item.price}} ৳
                    </div>
                    <div class="product cooksName">
                              Cooked by - <strong>&nbsp;<a href="#/kitchen/{{item.cooksID}}">{{item.kitchename}}</a></strong>
                    </div>
                    <div class="product address">
                        <strong>Address</strong><br>
                        <div class="addressField">
                            {{item.address}}
                        </div>
                    </div>

                    <div class="product cusine">
                        <strong>Cusine</strong><br>
                        <div class="cusineField">
                            {{item.cusines}}
                        </div>
                    </div>
                    <div class="product servicetag">
                    <label><strong>Catagories</strong></label><div class="clearfix">
                        
                    </div>
                        <label class="badge bg-theme catagory" ng-repeat="catagory in item.catagoryList">{{catagory}}</label>
                    </div>
                    <div class="clearfix">
                        
                    </div>
                    <div class="product description">
                        <strong>Description </strong>
                        <br>
                        <div class="product-description">
                            {{item.description}}
                        </div>
                    </div>
                    <div class="product delivery-options">
                        <label><strong>Delivery Options :</strong></label><div class="clearfix"></div>
                        <label class="badge bg-theme" ng-show="item.pickup">Pick up</label>
                        <label class="badge bg-theme" ng-show='item.home_delivery'>Home Delivery</label>
                    </div>

                <div class="product action">
                    <div ng-if="item.stock_quantity>0" class="cd-customization active" ng-class="{active:item.active}" ng-click="makeItemActive(key)">
                    
                        <div class="quantity"  ng-init="item.quantity=item.min_quantity">
                            <button href="#0" ng-if="item.quantity>item.min_quantity" ng-click="item.quantity=item.quantity-1" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                            <span class="quantity-amount">{{item.quantity}}</span>
                            <button href="#0" ng-if="true" ng-click="item.quantity=item.quantity+1" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                            
                        </div>
                        <button id="cartBtn{{item.id}}"  class="add-to-cart btn btn-danger pull-right" ng-click="addToCart(item)">
                            <em><i class="fa fa-shopping-cart"></i></em>
                            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                            </svg>
                        </button>
                    </div> <!-- .cd-customization -->
                    <div class="item-out-of-stock  cd-customization active" ng-if="item.stock_quantity==0">
                        <div class="quantity">
                            <button href="#0" ng-if="item.quantity>item.min_quantity" ng-click="item.quantity=item.quantity-1" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                            <span class="quantity-amount">{{item.quantity}}</span>
                            <button href="#0" ng-if="true" ng-click="item.quantity=item.quantity+1" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                            
                        </div>
                        <a id="cartBtn{{item.id}}"  class=" add-to-cart btn btn-danger pull-right" ng-click="addToCart(item)">
                            <em><i class="fa fa-shopping-cart"></i></em>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div> <!-- .cd-customization -->  
                </div>
            </div>
        </div>
        <div class="fu-modal-footer"></div>
    </div>
</div>
