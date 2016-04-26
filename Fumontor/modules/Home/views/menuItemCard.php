<div class="menuItem" ng-repeat="(key,item) in menuItems | getqueryresults:query">

<div class="col-md-2  grid fadeIn animated">
    <div class="grid-lg">
        <div class="grid-img">
        <div class="grid-side-banner">
            <label ng-show='!item.todays_menu' class=" tag banner-label">Pre Order</label>
            <label ng-show="item.todays_menu" class="tag banner-label">Order Now</label>
        </div>
            <a href="" ng-click="singleItemDisplay(item.id)" class="img-overlay block-link"><i class="fa fa-search"></i></a>
            
            <img ng-if="item.feature_img" ng-show="item.feature_img" ng-src="assets/uploads/{{item.cooksID}}/{{item.id}}/{{item.feature_img}}" title="{{item.title}}" alt="{{item.title}}">
            
            <img ng-show="!item.feature_img" src="assets/uploads/default/thumb.jpg" title="khichuri" alt="khichuri">
            
            <li ng-show="item.admin" class="dropdown grid-option">
                <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><i class="   fa fa-caret-down"></i></a>
                <ul class="dropdown-menu ">
                    <li><a href="javascript:void(0)"><i class="fa fa-trash"></i>&nbsp; Delete</a></li>
                    <li><a href="javascript:void(0)">Make available</a></li>
                    <li><a href="javascript:void(0)">option3</a></li>
                </ul>
            </li>
        </div>
        <div class="grid-description">
            <div class="description-body">
                <a href="javascript:void(0)" class="main-url cool-shadow "><h4>{{item.title}}</h4></a>
                <label class="secendery-url">by 
                    <a href="cooks?id={{item.cooksID}}" class=" small">  {{item.kitchename}} </a>
                </label>
                <label for="" class="hidden cID">{{item.cooksID}}</label>
                

            </div>
            <div class="description-foot">
                
                <div class="rating-div">
                    <div class="rating-stars tiny-star">
                        <div class="current-rating" style="width:69%"></div>
                    </div>
                </div>
                <span class="rate">৳ <label class="price">{{item.price}}</label></span>
               
            </div>
            <div class="cd-customization" ng-class="{active:item.active}" ng-click="makeItemActive(key)">
                
                <div class="quantity">
                    <button href="#0" ng-if="item.quantity>1" ng-click="item.quantity=item.quantity" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                    <span class="quantity-amount">{{item.quantity}}</span>
                    <button href="#0" ng-click="item.quantity=item.quantity+1" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                    
                </div>
                <button id="cartBtn{{item.id}}"  class="add-to-cart btn btn-danger pull-right" ng-click="addToCart(item)">
                    <em><i class="fa fa-shopping-cart"></i></em>
                    <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                    </svg>
                </button>
            </div> <!-- .cd-customization -->
        <div    class="pIDin hidden">{{item.id}}</div>
        </div>
    </div>
</div>

</div>