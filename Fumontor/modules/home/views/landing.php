<div class="landing">
<section class="land-section">
    <video autobuffer autoloop loop autoplay="true" poster="assets/img/fu-logo.png" class="background-video">
        <source src="assets/video/how.mp4" type="video/mp4" media="">
        <source src="assets/video/how.ogg" type="video/ogg" media="">
        <source src="assets/video/how.webm" type="video/webm" media="">
    </video>
    <div class="background-video-overlay">
        
    </div>
    <div class="container">
        <div class="brand-container">
            <div class="brand-logo">
                <div class="logo text-white">
                    <img src="assets/img/home-logo.png" class="img-responsive" alt="Fumontor">
                </div>
            </div>
            
            <div class="brand-subtitle">
                <div class="text-white">
                    a yummy relationship
                </div>
            </div>
            <div class="brand-search">
                <div class="slideInLeft bounce text-white" ng-if="animated" ng-class="{animated:animated}">
                    কি খাবেন??
                </div>
                <search-bar></search-bar>
            </div>
            <div class="brand-action">
                <a href="" class="btn bg-red btn-emboshed btn-wide"> Get Started</a>
            </div>
        </div>
    </div>
</section>
    <section>
        <div class="container">
            <h1 class="section-head text-theme2 section-title">
                How It Works
            </h1>
            <div class="row how how-cooks">
                <div class="col-md-4">
                    <img class="img-responsive" src="assets/img/how-cooks.gif" alt="How it Works as cook">
                </div>
                <div class="col-md-8">
                    <div class=" text-center form-heading text-theme2">
                        You Know Cooking??
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
                
                <div class="col-md-8">
                    <div class=" text-center form-heading text-theme2">
                        Looking For Food??
                    </div>
                    <div class="row">
                        <div class="col-md-12 how-steps">
                            <span>Search</span>
                            <span>Order</span>
                            <span>Get and Eat</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="img-responsive" src="assets/img/how-cooks.gif" alt="How it Works as cook">
                </div>
            </div>
            </div>    
        </div>
    </section>
    <section>
        <h1 class="section-head text-theme2">Trending Kithcens</h1>
        <div class="container">
            <div class="kitchen-slider">
                <slick settings='slickConfig' id="carousel" >
                    <div class="slide cool-shadow" ng-repeat="(key,slide) in trendingKitchen">
                    
                      <div class="slide-container">
                          <div class="slider-overlay"> <a href="#/kitchen/{{slide.user_id}}"><i class="fa fa-search"></i></a></div>
                          <div class="slider-img">
                              <img ng-src="assets/img/f6.jpg" class=" top img-responsive">
                          </div>
                          <div class="description">
                              <h2 ng-if="slide.kitchename!=''" class="form-head text-theme2">{{slide.kitchename}}</h2>
                            <h2 ng-if="slide.kitchename==''" class="form-head text-theme2">Fumontor Kitchen</h2>
                              <label for="">by - {{slide.name}}</label>
                              <label for="">Location : {{slide.location}}</label>
                              
                              <label class="text-muted">{{slide.address}}</label>
                              
                              <!-- <p class="lead module pfade">
                                  In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Etiam iaculis nunc ac metus. Quisque malesuada placerat nisl.
                              </p> -->
                          </div>    
                      </div>
                      
                    </div>
                </slick>
            </div>    
        </div>
    </section>
    <section>
        <h1 class="section-head text-theme2">Trending Food</h1>
        <div class="container">
            <div class="kitchen-slider">
                <slick settings='slickConfig' id="carousel" >
                    <div class="slide cool-shadow" ng-repeat="(key,slide) in trendingFood">
                    
                      <div class="slide-container">
                          <div class="slider-img">
                              <img ng-src="assets/uploads/{{slide.cooksID}}/{{slide.id}}/{{slide.feature_img}}" class=" top img-responsive">
                          </div>
                          <div class="slider-overlay"> <a href="{{slide.href}}"><i class="fa fa-search"></i></a></div>
                          <div class="description">
                              <h2 class="desc-head form-head text-theme2">{{slide.title}}</h2>
               
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
                </slick>
            </div>    
        </div>
    </section>
</div>