 <div class="checkout-tab cool-shadow" ng-show="checkout[1].current">
                <form ng-submit="checkoutNext(deliverMethodForm,1)" name="deliverMethodForm">
                    <label class="form-heading">Choose a delivery Method for Each Kitchen</label>
                    <div class="form-group col-md-6 col-md-offset-3" ng-repeat="(key,item) in cartItems">
                        
                            <span class="text-theme">Delivery method for <strong>{{item.kitchenName}}</strong></span><br>
                            <div class="text-left">
                            <label ng-if="item.pickup" class="radio" ng-class="{checked:order[item.cooksId]}"  ng-click="order[item.cooksId]=!order[item.cooksId]"
                                for="ordertype">
                                <input type="radio" name="ordertype{{item.cooksId}}" class="custom-radio" ng-model="order[item.cooksId]" data-toggle="radio" />
                                <span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span> 
                                Pick Up
                            </label>    
                            <label ng-if="item.home_delivery" class="radio" ng-class="{checked:!order[item.cooksId]}"  ng-click="order[item.cooksId]=!order[item.cooksId]"
                                for="ordertype">
                                <input type="radio" name="ordertype{{item.cooksId}}" class="custom-radio" ng-model="order[item.cooksId]" 
                                
                                data-toggle="radio" />
                                <span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span> 
                                Home Dilivery
                            </label>

                            </div>

                            <div class="alert bg-white text-theme cool-border" ng-if="!order[item.cooksId]">
                                Delivery Charge <strong>৳{{item.delivery_charge}}</strong> will be added
                            </div>
                            
                            
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-bottom">
                        <input type="submit" value="next" class="btn cool-shadow btn-danger btn-emboshed btn-wide" />
                    </div>
                
        
                </form>
    </div>