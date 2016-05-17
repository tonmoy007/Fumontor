<div class="checkout-tab cool-shadow" ng-show="checkout[2].current">
    <span class="form-heading">Choose Your Billing Method</span>
    <form name="billingForm" ng-submit="checkoutNext(billingForm,2)" novalidate="true">
        <div class="form-group col-md-6 col-md-offset-3">
            <label class="form-label">Choose One</label>
            <div class="text-left">
                <label class="radio" ng-init="payment['cashPayment']=false" ng-class="{checked:payment['cashPayment']}"  ng-click="setPayment('cashPayment')"
                    for="ordertype">
                    <input type="radio" name="payment" class="custom-radio" ng-model="payment.cashPayment" data-toggle="radio" required />
                    <span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span> 
                    <i class="fa fa-money"></i> Cash On Delivery
                </label>
                <label class="radio" ng-class="{checked:payment['Bikash']}"  ng-click="setPayment('Bikash') " ng-init="payment['Bikash']=false" 
                    for="ordertype">
                    <input type="radio" name="payment" class="custom-radio" ng-model="payment.Bikash" data-toggle="radio" required />
                    <span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span> 
                    <i class="fa fa-money"></i> Bikash
                </label> 
            </div>
            <!-- {{payment}} -->
        </div>
<!-- {{billingForm}} -->
        <div class="form-bottom">
            <input type="submit" ng-disabled="!paymentSelected"  value="next" class="btn btn-danger btn-emboshed btn-wide" />
        </div>
    </form>
</div>