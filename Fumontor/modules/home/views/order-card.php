            

            <div class="order-card big" ng-class="{'is-selected':item.productShow}" ng-repeat="item in items" ng-show="items.length">
                            <div class="order-icon"><img class="img-thumbnail img-circle" src="assets/img/avatar.png" alt=""></div>
                            <!-- <div class="hidden orderid"></div> -->
                            <div class="order-label">
                                <span class="order title"><strong>{{item.kitchename}}</strong></span>
                                <small class="order-sender-location order-type text-muted">{{item.location}}</small>
                                <span class="order-sender-name">
                                <span class="fa-stack">
                                  <i class="fa fa-circle fa-stack-2x "></i>
                                  <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                </span>{{item.cooks_info.phone}}</span>
                                <div class="order-type ">Total <span class="badge badge-info">{{item.orderedProducts.length}}</span> items ordered</div>
                                <div class="order-type ">{{item.ordertype}}</div>
                                <span class="order-type text-theme">{{item.payment_method}}</span>
                                <span class="order-type text-muted">{{item.submit_time*1000|date}}</span>
                            </div>
                            <div class="order-action">
                            <span class="order-status text-{{item.orderstatus}}">{{item.orderstatus}}</span>
                            <!-- <a href="javascript:void(0)" title="" class="btn state-btn bg-theme text-white" ><i class="fa fa-arrow-down"></i></a> -->
                            </div>
                            <div class="order-details" >
                            <ul>
                       
                    <li><span class="quantity">Quantity X</span><span class="title">Product Title</span><span class="price">Price/<small>piece</small></span></li>
                                
                                    <li ng-repeat="product in item.orderedProducts"><span class="quantity">{{product.price}}X{{product.quantity}}</span><span class="product-name">{{product.title}}</span><span class="price">{{product.subtotal}}</span></li>
                                    <li ng-if="parseInt(product.week)!=0&&item.ordertype=='Weekly Order'"><span class="total">for <span class="badge">{{product.week}}</span> week</span></li>
                                
                            
                             <li> <span class="total">Total</span><span class="price total">৳ {{item.orderedProducts[0].total}}</span></li>
                           
                            </ul>
                            </div>
                            <span class="down-arrow" ng-click="item.productShow=!item.productShow"></span>
                        </div>


    <div class="order-card  notfound" ng-if="!items.length">
                            
        <div class="order-label"><span class="order-sender-name">You didn't do any Order !!</span>
        </div>
        <div class="order-action">
        <span class="order-status text-danger"></span>
        <a href="javascript:void(0)" title="" class="btn dlt-btn bg-pending text-white"><i class="fa fa-trash"></i></a></div>
                            
    </div>
