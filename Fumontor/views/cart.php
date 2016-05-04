<div id="cd-shadow-layer"></div>

<div id="cd-cart" ng-class="{'speed-in':showCart}">
<h1 class="cart-logo">Cart  &nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i></h1>
  <a id="dismiss-cart"  class="pull-right" ng-click="showCart=!showCart"></a>
  <div id="cart-form">
  <div class="cart-form-head" style="padding: 20px">
    Total <span class="cool-shadow badge">{{cartTotalItems}}</span>  Items In the Cart 
    <div class="">
      <a href="" ng-if="cartTotalItems>0" ng-click="clearCart()" class="btn btn-danger btn-emboshed"><i class="fa fa-trash"></i> &nbsp; clear cart</a>
    </div>
  </div>
      
<div ng-show="!cartItems.length&&false" class=" cart-empty alert alert-info "> No items in the cart </div>
    <ul class="cd-cart-items" ng-repeat="(cid,kichenCartItem) in cartItems" >
    
          
          <a href="#/kitchen/{{kichenCartItem.cooksId}}" class="text-theme form-header" >{{kichenCartItem.kitchenName}} </a>
          
          <li class="cart-item" ng-repeat='(key,cartItem) in kichenCartItem' ng-if='!isString(cartItem)&& key!="subtotal"&&key!="min_order"' >

            <div class="item-title">
              <span class="cd-qty">{{cartItem.qty}} x</span> 
              {{cartItem.name}}
              
            </div>
            <div class="cd-price"  >{{cartItem.price}}<small>/u</small></div>
            <div class="cd-subtotal">
              {{cartItem.subtotal}}
            </div>
            <a  href="" class="cd-item-remove cd-img-replace" ng-click="removeCartItem(cid,cartItem)" >Remove</a>
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

    <a href="#0" ng-if="cartSubTotal>200" class=" checkout btn btn-danger btn-wide">Proceed to Checkout</a>
    
    <p ng-if="cartSubTotal>200" class="cd-go-to-cart"><a href="#0">Go to cart page</a></p>
  </div>
  </div> <!-- cd-cart -->
       
  

     


