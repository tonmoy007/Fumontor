<div class="landing" >
<section class="land-section">
    <!-- <video autobuffer  loop autoplay poster="assets/img/fu-logo.jpg" class="background-video">
        <source src="assets/video/how.mp4" type="video/mp4" media="all">
        <source src="assets/video/how.ogg" type="video/ogg" media="all">
        <source src="assets/video/how.webm" type="video/webm" media="all">
        <object data="assets/video/how.flv" type="application/x-shockwave-flash">
            <param value="assets/video/how.flv" name="movie"/>
        </object>
        Your browser does not support the video tag. I suggest you upgrade your browser.
        <div class="poster"></div>        
    </video> -->
    <div class="background-video">
    <i class="fa fa-spinner" ng-if="!landingLoaded"></i>
        <div class="poster" background url="assets/img/fu-landing.jpg"id="poster">
            
        </div>
    </div>
    <div class="background-video-overlay">
        
    </div>
    <div class="container">
        <div class="brand-container" id="brand-container" >
            <div class="brand-logo" style="
    margin-bottom: 10px">
                <div class="fadeIn logo text-red"  ng-class="{animated:animated}">
                    Fumontor
                </div>
            </div>
            
            <div class="brand-label  text-white" >
                 <div class="zoomInLeft  search-title text-red"  ng-class="{animated:animated}">
                  <strong>  কি খাবেন??</strong>
                </div>
            </div>
            <div class="brand-search" id="brand-search">
               
                <search-bar></search-bar>
            </div>
            
        </div>
    </div>
</section>
    <section class="how-it-works rest-section" id="how">
        <div class="container">
            <h1 class="section-head text-theme2 section-title">
                How It Works
            </h1>
            <div class="sub-head text-left text-gray">
                Follow the step according to your need
            </div>
            <div class="row how how-cooks">
                <div class=" how-img cool-border">
                    <img class="img-responsive  text-center " src="assets/img/cook.png" alt="How it Works as cook">
                </div>
                <div class="how-text cool-border">
                    <div class=" text-center form-heading ">
                        <strong>You Know Cooking??</strong>
                        <a href="" class="short-video-link" title="Short video for Cook"><span class="fa-stack  fa-1x ">
                              <i class="fa fa-circle fa-stack-2x "></i>
                              <i class="fa fa-play fa-stack-1x fa-inverse"></i>
                            </span></a>
                    </div>
                    <div class="row">
                        <div class="col-md-12 how-steps">
                            <span>Register</span>
                            <span>Upload Dish</span>
                            <span>Sell</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                
            </div>
            <div class="space">
                
            </div>
            <div class="row how how-foodie">
                <div class=" how-img cool-border">
                    <img class="img-responsive text-center " src="assets/img/cutlery.png" alt="How it Works as cook">
                </div>
                <div class="how-text cool-border">
                    <div class=" text-center form-heading text-theme2">
                       <strong> Looking For Food??</strong>
                       <a href="" class="short-video-link" title="Short video for Foodie">
                            <span class="fa-stack  fa-1x ">
                              <i class="fa fa-circle fa-stack-2x "></i>
                              <i class="fa fa-play fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-12 how-steps">
                            <span>Search</span>
                            <span>Order</span>
                            <span>Get and Eat</span>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>    
       
    </section>
    <section class="rest-section trending-kitchen">
        
        <div class="container" ng-show="trendingKitchenShow">
        <h1 class="section-head  text-theme2">Trending Kithcens</h1>
        <div class="sub-head text-left text-gray">
                Select a kitchen to view kitchen page
            </div>
            <div class="kitchen-slider kitchen" >
                <slick settings='slickConfig' ng-if="trendingKitchenShow" id="carousel" >
                    <div class="slide cool-shadow" ng-repeat="(key,slide) in trendingKitchen">
                    
                      <div class="slide-container">
                          <div class="slider-overlay"> <a href="#/kitchen/{{slide.user_id}}"><i class="fa fa-eye"></i></a></div>
                          <div class="slider-img">
                              <img ng-src="assets/img/f6.jpg" class=" top img-responsive">
                          </div>
                          <div class="description">
                              <h2 ng-if="slide.kitchename!=''" class="slider-title text-theme2">{{slide.kitchename}}</h2>
                            <h2 ng-if="slide.kitchename==''" class="slider-title text-theme2">Fumontor Kitchen</h2>
                              <span for="">by - {{slide.name}}</span>
                              <span for="">Location : {{slide.location}}</span>
                              
                              <span class="text-muted">{{slide.address}}</span>
                              
                              <!-- <p class="lead module pfade">
                                  In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Etiam iaculis nunc ac metus. Quisque malesuada placerat nisl.
                              </p> -->
                          </div>    
                      </div>
                      
                    </div>
                </slick>
            </div>    
        </div>
        <div class="text-center">
            <a href="#/all-kitchen" class="btn btn-danger btn-emboshed cool-shadow btn-wide">See   All</a>
        </div>
    </section>
    <section class=" rest-section trending-food">
        
        <div class="container" ng-show="trendingFoodShow">
        <h1 class="section-head text-theme2">Trending Foods</h1>
        <div class="sub-head text-left text-gray">
                Set your location and go find food in your area
            </div>
            <div class="kitchen-slider" >
                <slick settings='slickConfig' id="carousel" ng-if="trendingFoodShow" >
                    <div class="slide cool-shadow" ng-repeat="(key,slide) in trendingFood">
                    
                      <div class="slide-container">
                          <div class="slider-img">
                              <img ng-src="assets/uploads/{{slide.cooksID}}/{{slide.id}}/{{slide.feature_img}}" class=" top img-responsive" ng-if="slide.feature_img">
                              <img ng-src="assets/img/thumb.jpg" class=" top img-responsive" ng-if="!slide.feature_img">
                              
                          </div>
                          <div class="slider-overlay"> <a href="#/kitchen/{{slide.cooksID}}/{{slide.id}}"><i class="fa fa-eye"></i></a></div>
                          <div class="description">
                              <h2 class="desc-head slider-title text-theme2">{{slide.title}}</h2>
                                <div class="rating-div">
                                    <div class="rating-stars tiny-star">
                                        <div class="current-rating" style="width:{{slide.reviews[0].totalmark/slide.reviews[0].total_review*20}}%"></div>
                                    </div>
                                </div>
                            <span class="text-info">Price : <strong class="text-theme2">{{slide.price}}৳</strong></span>
                            <span class="sub-title text-info">By <strong><a href="#/kitchen/{{slide.cooksID}}">{{slide.kitchename}}</a></strong></span>
                          </div>
                           <div class="">
                                <div  class="cd-customization home-grid-action active">
                                
                                    <div class="quantity"  ng-init="slide.quantity=slide.min_quantity">
                                        <button href="#0" ng-if="slide.quantity>slide.min_quantity" ng-click="slide.quantity=slide.quantity-1" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                                        <span class="quantity-amount">{{slide.quantity}}</span>
                                        <button href="#0" ng-if="true" ng-click="slide.quantity=slide.quantity+1" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                                        
                                    </div>
                                    <button id="cartBtn{{slide.id}}"  class="add-to-cart btn btn-danger pull-right" ng-click="addToCart(slide)">
                                        <em><i class="fa fa-shopping-cart"></i></em>
                                        <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                            <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#3bbad0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                                        </svg>
                                    </button>
                                </div> <!-- .cd-customization -->
                                <!-- <div class="item-out-of-stock  cd-customization home-grid-action active" ng-if="slide.stock_quantity==0">
                                    <div class="quantity" ng-init="slide.quantity=slide.min_quantity">
                                        <button href="#0" ng-if="slide.quantity>slide.min_quantity" ng-click="slide.quantity=slide.quantity-1" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                                        <span class="quantity-amount">{{slide.quantity}}</span>
                                        <button href="#0" ng-if="true" ng-click="slide.quantity=slide.quantity+1" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                                        
                                    </div>
                                    <a id="cartBtn{{slide.id}}"  class=" add-to-cart btn btn-danger pull-right" ng-click="addToCart(slide)">
                                        <em><i class="fa fa-shopping-cart"></i></em>
                                    </a>
                                </div> -->
                            </div>    
                      </div>
                    </div>
                </slick>
            </div>    
        </div>
    </section>
</div>