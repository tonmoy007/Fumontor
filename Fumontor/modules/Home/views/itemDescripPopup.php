
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
                        <div class="rating-div">
                            <div class="rating-stars tiny-star">
                                <div class="current-rating" style="width:{{item.reviews[0].totalmark/item.reviews[0].total_review*20}}%"></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="product rating small">
                          {{item.reviews[0].totalmark/item.reviews.length|number:1}}
                    </div> -->
                    <div class="product price">
                            <strong></strong> <strong class="text-theme">{{item.price}}৳</strong>
                    </div>
                    <div class="product cooksName">
                             <strong><a href="#/kitchen/{{item.cooksID}}">{{item.kitchename}}</a></strong>
                    </div>
                    <!-- <div class="product address">
                        <strong>Address</strong><br>
                        <div class="addressField">
                            {{item.address}}
                        </div>
                    </div> -->

                    <div class="product cusine">
                        <strong>Cusine</strong><br>
                        <div class="cusineField">
                            {{item.cusines}}
                        </div>
                    </div>
                    <div class="product servicetag">
                    <label><strong>Categories</strong></label><div class="clearfix">
                        
                    </div>
                        <label class="badge bg-theme catagory" ng-repeat="catagory in item.catagoryList">{{catagory}}</label>
                    </div>
                    <div class="clearfix">
                        
                    </div>
                    
                    <div class="product delivery-options">
                        <label><strong>Delivery Options :</strong></label><div class="clearfix"></div>
                        <label class="badge bg-theme" ng-show="item.pickup">Pick up</label>
                        <label class="badge bg-theme" ng-show='item.home_delivery'>Home Delivery</label>
                    </div>
                    
                <div class="product action row">
                    
                    <div class="col-md-12 text-left">
                            <div  class="cd-customization active full" >
                        
                            <form name="itemForm"><div class="quantity"  ng-init="item.quantity=item.min_quantity">
                                <button href="#0" ng-if="item.quantity>item.min_quantity" ng-click="item.quantity=item.quantity-1" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                                <input type="number" name="price" price ng-pattern="/^\d{0,9}(\.\d{1,9})?$/" class="quantity-amount" min-quantity="item.min_quantity" ng-pattern="onlyNumbers" ng-model="item.quantity">
                                <button href="#0" ng-if="true" ng-click="item.quantity=item.quantity+1" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                                
                            </div></form>

                            <button id="cartBtnBig{{item.id}}" ng-disabled="itemForm.price.$error.number" type="button"  class="cool-shadow add-to-cart-full" ng-click="addToCart(item,'cartBtnBig'+item.id)">
                            <!-- <span class="fa-stack fa-1x ">
                              <i class="fa fa-circle fa-stack-2x "></i>
                              <i class="fa fa-cart fa-stack-1x fa-inverse"></i>
                            </span> -->
                                <!-- <em><i class="fa fa-shopping-cart"></i></em> -->
                                
                                Add to cart
                                <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                    <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                                </svg>
                            </button>
                        </div> 
                    </div>    
                    <!-- .cd-customization -->
                    <div class="share-buttons-block  ">
                        <a href="" class="share-button " title="event">
                            <span class="fa-stack fa-1x ">
                              <i class="fa fa-circle fa-stack-2x "></i>
                              <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <a href="" class="share-button " ng-click="shareLink('http://fumontor.com/#/kitchen/'+item.cooksID+'/'+item.id,item.title,item.kitchename,'http://fumontor.com/assets/uploads/'+item.cooksID+'/'+item.id+'/'+item.feature_img,item.description)" title="Share this in facebook"><span class="fa-stack  fa-1x ">
                              <i class="fa fa-circle text-facebook fa-stack-2x "></i>
                              <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                          <a href="" class="share-button" title="lock"><span class="fa-stack  fa-1x ">
                              <i class="fa fa-circle fa-stack-2x "></i>
                              <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </span></a>

                    </div>
                </div>
                <div class="clearfix"></div> <!-- .cd-customization -->  
                </div>
            </div>
            <div class="clearfix">
                
            </div>
            <div class="form-bottom">

                <div class="product description space text-left">
                        <h2 class="up-heading">Description </h2>
                        <br>
                        <div class="product-description">
                            {{item.description}}
                        </div>
                    </div>
            </div>
            <div class="clearfix">
                <reviews ></reviews>
            </div>

            <!-- <div class="form-bottom  no-top no-bottom" ng-if="item.title">
                <div class="fb-share-button" fb-share-button page-href="http://fumontor.com/#/kitchen/{{item.cooksID}}/{{item.id}}" 
                                data-layout="button_count">
                            </div>
            </div> -->
            
        </div>
        <div class="fu-modal-footer">
            <span class="text-muted ">&copy; Fumontor 2016</span>
        </div>
    </div>
</div>
