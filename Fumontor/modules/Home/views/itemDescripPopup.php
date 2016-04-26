
<div id="{{item.id}}" class="fu-modal">
<div class="overlay"></div>
<div id="fu-loader"><i class="fa fa-spinner fa-pulse"></i></div>
    <div class="fu-modal-container">
    <a href="" title="" ng-click="closeModel(item.id)" class="fu-modal-close alter">Close</a>
        
        <div class="fu-modal-body">
                <div class="row">
                <div class="col-md-6 model-column img-column">
                    <img class="img-responsive" ng-if="item.feature_img" ng-show="item.feature_img" ng-src="assets/uploads/{{item.cooksID}}/{{item.id}}/{{item.feature_img}}" title="{{item.title}}" alt="{{item.title}}">
                
                    <img ng-show="!item.feature_img" class="img-responsive" src="assets/uploads/default/thumb.jpg" title="khichuri" alt="khichuri">
                    
                </div>
                <div class="col-md-6 model-column">
                    <div class="product-title">
                        <strong>{{item.title}}</strong>
                    </div>
                    <div class="product-status">
                          {{item.status}}
                    </div>
                    <div class="product-price">
                           BDT : <strong>{{item.price}} ৳</strong>
                    </div>
                    <div class="product-cooksName">
                              Cooked by <strong>{{item.kitchename}}</strong>
                    </div>
                    <div class="product-address">
                        <strong>Address</strong><br>
                        <div class="addressField">
                            {{item.address}}
                        </div>
                    </div>

                    <div class="product-cusine">
                        <strong>Cusine</strong><br>
                        <div class="cusineField">
                            {{item.cusines}}
                        </div>
                    </div>
                    <div class="servicetag">
                    <label><strong>Catagories</strong></label><div class="clearfix">
                        
                    </div>
                        <label class="tag catagory" ng-repeat="catagory in item.catagoryList">{{catagory}}</label>
                    </div>
                    <div class="clearfix">
                        
                    </div>
                    <div class="product-description">
                        <strong>Description </strong>
                        <br>
                        <div class="product-description">
                            {{item.description}}
                        </div>
                    </div>
                <label class="tag" ng-show="item.pickup">Pick up</label>
                <label class="tag" ng-show='item.home_delivery'>Home Delivery</label>

                <div class="cd-customization active details" >
                
                <div class="quantity">
                    <button href="#0" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                    <span class="quantity-amount">1</span>
                    <button href="#0" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                    
                </div>
                <button  class="add-to-cart btn btn-embossed btn-wide btn-danger pull-right">
                    <em><i class="fa fa-shopping-cart"></i></em>
                    <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                    </svg>
                </button>
            </div> <!-- .cd-customization -->  
                </div>
            </div>
        </div>
        <div class="fu-modal-footer"></div>
    </div>
</div>
