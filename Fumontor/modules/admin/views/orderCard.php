<div class="order-card " ng-repeat='(key,order) in orders'  ng-class="{'is-selected':order.detailsShow}">
    <div class="order-icon">
        <img class="img-thumbnail img-circle" src="assets/img/avatar.png" alt="">
    </div>
    <div class="order-label">
        <span class="order-sender-name"> {{order.username}}</span><span class="order-sender-locarion">{{order.phone}}</span>
        <div class="order-type pre-order">{{order.ordertype}}</div>
    </div>
    <div class="order-action">
        <span class="order-status text-{{orderStatus}}">{{orderStatus}}</span>
        <a href="javascript:void(0)" ng-click="SubmitOrders(order)" title="" class="btn state-btn bg-{{orderStatus}} text-white"><i class="fa fa-arrow-right"></i>
        </a>
    </div>
    <div class="order-details">
        <ul>
            <li><span class="quantity">Quantity X</span><span class="title">Product Title</span><span class="price">Price/<small>piece</small></span>
            </li>
           
            <li ng-repeat="orderData in order.orderDetail"><span class="quantity">{{orderData.quantity}}X</span><span class="product-name">{{orderData.title}}</span><span class="price"> {{orderData.price}} </span></li>
                    
                    
             <li> <span class="total">Total</span><span class="price total">{{order.orderDetail[0].total}}</span></li>
             
                 
        </ul>
        <div class="paid">
                 <span class="total">Paid</span><span class="paid-input"><input type="text" class="" name="paid" ng-model="order.paid" value="" placeholder="Paid"></span>
             </div>
             <div class="paid">
                 <span class="total">Due</span><span class="paid-input">{{order.orderDetail[0].total-order.paid}}</span>
             </div>
    </div>
        <span class="down-arrow" ng-click="showDetails(key)"></span>
</div>
