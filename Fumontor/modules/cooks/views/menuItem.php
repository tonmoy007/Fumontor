<div class="menuItem" ng-repeat="(key,item) in menuItems | orderBy:'-id'">

<div class="col-sm-2 grid fadeIn animated">
    <div class="grid-lg">
        <div class="grid-img">
        <!-- <div class="grid-side-banner cool-shadow" ng-class="{now:item.todays_menu}">
            <label ng-show='!item.todays_menu' class=" tag banner-label">Not today's menu</label>
            <label ng-show="item.todays_menu" class="tag banner-label">Today's menu</label>
        </div> -->
            <a href="" ng-click="singleItemDisplay(item.id)" class="img-overlay block-link"><i class="fa fa-pencil"></i></a>
            
            <img ng-if="item.feature_img" ng-show="item.feature_img" ng-src="assets/uploads/{{item.cooksID}}/{{item.id}}/{{item.feature_img}}" title="{{item.title}}" alt="{{item.title}}">
            
            <img ng-show="!item.feature_img" src="assets/uploads/default/thumb.jpg" title="khichuri" alt="khichuri">
            
            <li ng-show="user" class="dropdown grid-option">
                <a href=""  ng-click="deleteItemPopup(item.id,key,item.title)" class="dropdown-toggle bg-red cool-shadow" ><i class="fa fa-trash-o"></i></a>
                
            </li>
        </div>
        <div class="grid-description">
            <div class="description-body">
                <a href="javascript:void(0)" class="main-url cool-shadow "><h4>{{item.title}}</h4></a>
                <!-- <label class="secendery-url">by 
                    <a href="cooks?id={{item.cooksID}}" class=" small">  {{item.kitchename}} </a>
                </label> -->
                
                
                <label for="" class="hidden cID">{{item.cooksID}}</label>
                

            </div>
            <div class="description-foot">
                
                <div class="rating-div">
                    <div class="rating-stars tiny-star">
                        <div class="current-rating" style="{{item.reviews[0].totalmark/item.reviews.length*20}}"></div>
                    </div>
                </div>
                <span class="rate">৳ <label class="price">{{item.price}}</label></span>
               <small class="text-muted" ng-if="item.todays_menu">Order before {{item.ordernow_time_text}}</small>
               <small class="text-muted" ng-if="!item.todays_menu">Order before {{item.preorder_time_text}}</small>
               <small class="text-muted" ng-if="item.stock_quantity!=0">{{item.stock_quantity}} available</small>

               <small class="text-red" ng-if="item.stock_quantity==0">not available</small>
            </div>
            <!-- <div class="cd-customization cd-action">
                <a ng-if="!item.todays_menu" href="" class="btn btn-danger btn-emboshed btn-wide" ng-click="singleItemDisplay('setQuantity'+item.id)">Set  As  Today's  Menu</a>
                
                <a href="" ng-if="item.todays_menu" class="btn bg-red btn-emboshed " ng-click="setAsTodaysMenu(item)">remove  from  today's  menu</a>
             </div> --> <!-- .cd-customization -->
        
        </div>
    </div>
</div>

</div>