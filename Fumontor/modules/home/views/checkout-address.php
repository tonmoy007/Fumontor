<div class="checkout-tab cool-shadow" ng-show="checkout[0].current">

                    <div class="form-heading">
                        Please Confirm your Contact Number and delivery Address
                    </div>
                    <form name="addressForm" ng-submit="checkoutNext(addressForm,0)" novalidate="">
                        <div class="form-group col-md-6 col-md-offset-3" ng-form="dAddress">
                            <label class="form-label pull-left">Delivery Address</label>
                            <input type="text" name="address" class="form-control" ng-model="user.address" value="" placeholder="exact location of the delivery place" required="true" minlength="6">
                            <span ng-class="{nameError:dAddress.$dirty&&dAddress.$error.required}" class="form-error-message" >You must provide a delivery address.</span>
                            <span ng-class="{nameError:dAddress.$dirty&&dAddress.$error.minlength}" class="form-error-message" >please try enter full address minimum 6 character.</span>
                           <!--  {{dAddress.$error.required|json}} -->
                        </div>
                        <div class="form-group col-md-6 col-md-offset-3" ng-form="phone">
                            <label class="form-label pull-left">Contact Number</label>
                            <input type="text" name="address" unique-phone class="form-control" ng-model="user.phone" value="" placeholder="Please enter a valid phone number" required="true" minlength="6">
                            <span ng-class="{nameError:phone.$dirty&&phone.$error.required}" class="form-error-message" >You must provide a contact number.</span>
                            <span ng-class="{nameError:phone.$dirty&&phone.$error.minlength}" class="form-error-message" >Please enter full contact Number.</span>
                            <span ng-class="{nameError:phone.$dirty&&phone.$error.checkPhone}" class="form-error-message" >This phone Number is used by another user .</span>
                           <!--  {{dAddress.$error.required|json}} -->
                        </div>
                        <div class="clearfix">
                            
                        </div>
                        <div class="form-bottom">
                            <input type="submit" ng-disabled="addressForm.$invalid" value="next" class="btn btn-danger btn-emboshed cool-shadow btn-wide" />
                        </div>
                
                    </form>
                </div>