<div class="cart-form">
  <div class="cart-form-head text-center" style="padding: 20px">
    Total <span class="cool-shadow badge">{{cartTotalItems}}</span>  Items In the Cart 
    <div class="">
      <a href="" ng-if="cartTotalItems>0" ng-click="clearCart()" class="btn btn-danger btn-emboshed"><i class="fa fa-trash"></i> &nbsp; clear cart</a>
    </div>
  </div>
      
<div ng-show="!cartItems.length&&false" class=" cart-empty alert alert-info "> No items in the cart </div>
    <ul class="cd-cart-items" ng-repeat="(cid,kichenCartItem) in cartItems" >
    
          
          <a href="#/kitchen/{{kichenCartItem.cooksId}}" class="text-theme form-header" ><span class="kit-icon"><i class="fa fa-cutlery"></i></span>{{kichenCartItem.kitchenName}} </a>
          
          <li class="cart-item" ng-repeat='(key,cartItem) in kichenCartItem' ng-if='!isString(cartItem)&& key!="subtotal"&&key!="min_order"&&key!="orderType"&&key!="ordertime"&&key!="pickup"&&key!="home_delivery"&&key!="delivery_charge"' >

            <div class="item-title" title="{{cartItem.name}}">
              <span class="cd-qty">{{cartItem.qty}} x</span> 
              {{cartItem.name}}
              
            </div>
            <div class="cd-price"  >{{cartItem.price}}<small><span class="cd-qty">x{{cartItem.qty}} </span> </small></div>
            <div class="cd-subtotal">
              ৳{{cartItem.subtotal}}
            </div>
            <a  href="" class="cd-item-remove cd-img-replace" ng-click="removeCartItem(cid,cartItem)" >Remove</a>
            <div class="cd-order-description"><small ng-if="kichenCartItem.ordertime" class="cd-order-time">Delivered within {{kichenCartItem.ordertime}}</small>
              <small class="cd-order-type" ng-if="kichenCartItem.orderType">Order type - {{kichenCartItem.orderType}}</small>
            </div>

          </li>
          <div class="alert alert-info" ng-if="kichenCartItem.subtotal<kichenCartItem.min_order">
            This kitchen doesn't take orders if it is not eqal to or more than <strong>{{kichenCartItem.min_order}}</strong> tk so please fullfil the order by perchasing more from <a href="#/kitchen/{{kichenCartItem.cooksId}}" class="link" >{{kichenCartItem.kitchenName}} </a>
          </div>
          <div class="cd-cart-total sub" ng-if="kichenCartItem.subtotal>0">
          <p>Subtotal <span>৳ <label class="total"> {{kichenCartItem.subtotal}}</label></span></p>

          </div> 
       
  </ul> <!-- cd-cart-items -->

    <div class="cd-cart-total" ng-if="cartSubTotal>0">
      <p>Total Order Price <span>৳ <label class="total"> {{cartSubTotal}}</label></span></p>

    </div> <!-- cd-cart-total -->

    <div class="text-center">
      <a href="" ng-show="cartSubTotal>=200" ng-click="checkoutTriggered()" class="  btn btn-danger btn-wide" >Proceed to Checkout</a>
    </div>
    <div class="alert alert-info" ng-if="cartSubTotal<200&&cartSubTotal>0">
      You have to buy items cost atleast <strong>200 tk</strong> 
    </div>
    <!-- <a href="auth/login" ng-if='!user&&cartSubTotal>=200' class=" checkout btn btn-danger btn-wide">Login to checkout</a> -->
    <!-- <p ng-if="cartSubTotal>200" class="cd-go-to-cart"><a href="#0">Go to cart page</a></p> -->
  </div>