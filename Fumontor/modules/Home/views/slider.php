            <slick settings='slickConfig' class="todays-menu-slider" id="carousel" ng-if="todayLoaded" >
                
                    <div class="slide todays-menu cool-shadow" ng-repeat="slide in todaysMenuItems">
                        <div class="slide-container">
                            <div class="slider-img">
                                <img class="img-responsive" ng-src="assets/uploads/{{slide.cooksID}}/{{slide.id}}/{{slide.feature_img}}" alt="">
                            </div>
                            <div class="slider-overlay"> <a href="#/kitchen/{{slide.cooksID}}/{{slide.id}}"><i class="fa fa-search"></i></a></div>
                            <div class="description">
                                <h2 class="slider-title text-theme2">{{slide.title}}</h2>
                                <span class="text-theme">Price : <strong class="text-theme2">{{slide.price}}tk</strong></span>
                          </div>
                           <div class="">
                                <div ng-if="slide.stock_quantity>0" class="cd-customization home-grid-action active">
                                
                                    <div class="quantity"  ng-init="slide.quantity=slide.min_quantity">
                                        <button href="#0" ng-if="slide.quantity>slide.min_quantity" ng-click="slide.quantity=slide.quantity-1" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                                        <span class="quantity-amount">{{slide.quantity}}</span>
                                        <button href="#0" ng-if="true" ng-click="slide.quantity=slide.quantity+1" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                                        
                                    </div>
                                    <button id="cartBtn{{slide.id}}"  class="add-to-cart btn btn-danger pull-right" ng-click="addToCart(slide)">
                                        <em><i class="fa fa-shopping-cart"></i></em>
                                        <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                            <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                                        </svg>
                                    </button>
                                </div> <!-- .cd-customization -->
                                <div class="item-out-of-stock  cd-customization home-grid-action active" ng-if="slide.stock_quantity==0">
                                    <div class="quantity" ng-init="slide.quantity=slide.min_quantity">
                                        <button href="#0" ng-if="slide.quantity>slide.min_quantity" ng-click="slide.quantity=slide.quantity-1" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                                        <span class="quantity-amount">{{slide.quantity}}</span>
                                        <button href="#0" ng-if="true" ng-click="slide.quantity=slide.quantity+1" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                                        
                                    </div>
                                    <a id="cartBtn{{slide.id}}"  class=" add-to-cart btn btn-danger pull-right" ng-click="addToCart(slide)">
                                        <em><i class="fa fa-shopping-cart"></i></em>
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                
            </slick>
