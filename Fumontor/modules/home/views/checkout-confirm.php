<div class="checkout-tab cool-shadow" ng-show="checkout[3].current">

    <span class="form-heading text-theme">Cofirm Your order</span>
    <form ng-submit="checkoutNext(confirmForm,3)" name="confirmForm">
    <div class="form-group">
        <label class="form-label text-theme"><strong>Delivery Details</strong></label>
    </div>
    <div class=" col-md-8 text-left col-md-offset-2">
        <div class="checkout-confirm-block text-red"><strong>Name:</strong> <strong class="text-theme">{{user.first_name}} {{user.last_name}}</strong></div>
        <div class="checkout-confirm-block  text-theme"><strong class="text-red">Delivery Address:</strong> {{user.address}}</div>
        <div class="checkout-confirm-block  text-theme"><strong class="text-red">Phone:</strong> {{user.phone}}</div>
        <div class="checkout-confirm-block  text-theme"><strong class="text-red">Order Type:</strong> <span ng-if="cartOrderType=='preorder'">Pre Order</span> <span ng-if="cartOrderType=='todays_menu'">Instant Order</span></div>
        <div class="checkout-confirm-block  text-red" ng-repeat="(key,item) in cartItems">
            <small>Minimum delivery time required for </small><strong>{{item.kitchenName}}:</strong> <strong class="text-theme">{{item.mindtime}}</strong> 
        </div>
        <div class="checkout-confirm-block  text-red"><strong>Total amount to pay :</strong> <strong class="text-theme">৳{{cartSubTotal+deliveryCharge+transactionCharge}}</strong></div>

    </div>

    <!-- <div class="form-group col-md-6 col-md-offset-3 text-left">
        <label class="checkbox" for="terms" ng-class="{checked:accept}" >
            <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
              <input type="checkbox"  name="terms" id="terms" ng-model="accept" data-toggle="checkbox" >
               I accept the <a href="#/trems-and-policies">terms and policies</a> of <strong>Fumontor</strong>
        </label>
    </div> -->
        <div class="clearfix"></div>
                    <div class="form-bottom">
                        <input type="submit"  value="confirm" class="btn cool-shadow btn-danger btn-emboshed btn-wide" />
                    </div>
    </form>
    
</div>