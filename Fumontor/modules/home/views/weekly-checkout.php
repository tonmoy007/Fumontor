
<product-loading></product-loading>
<div class="start-page" >
<link rel="stylesheet" href="assets/css/home/checkout.css">

<link rel="stylesheet" href="assets/css/login.css">
    <div class="container">
        <div class="checkout-container">
            <div class="" ng-if="!user.id">
                <login redir="'checkout/weekly-menu/'+id"></login>
            </div>
            <div class="checkout-process col-md-10 cool-border bg-white">
                <div class="text-left" >

                    <div class="form-heading text-left text-theme">
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
                        <div class="form-heading text-left text-theme">
                            Adjust order
                        </div>
                        <div class="text-left " ng-repeat="item in weeklyMenuItem">
                            <table class="table table-striped table-bordered table-responsive cool-border">
                                <thead class="bg-theme text-white">
                                    <tr>
                                        <th><strong class="text-white">Title</strong></th>
                                        <th><strong class="text-white">Kitchen</strong></th>
                                        <th><strong class="text-white">Price</strong></th>
                                        <th><strong class="text-white">how many Person?</strong></th>
                                        <th><strong class="text-white">how many days?</strong></th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{item.title}}</td>
                                        <td>{{item.kitchename}}</td>
                                        <td>{{item.price}}</td>
                                        <td><select name="" ng-model="item.person" ng-init="item.person=item.min_order">
                                            <option value="{{p}}" ng-repeat="p in getNumber(10)" ng-if="p>=item.min_order">{{p}}</option>
                                        </select></td>
                                        <td >
                                        <select name="" ng-model="item.days" ng-init="item.days=getNumber(1)[0]">
                                            <option value="{{q}}" ng-repeat="q in getNumber(10)">{{q}}</option>
                                            
                                        </select>
                                        <strong ng-if="item.days==1">week</strong><strong ng-if="item.days>1">weeks</strong>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        <div class="alert bg-trans-gray">
                            <strong>Total Price to pay to {{item.kitchename}}</strong> = {{numberformat(item.price)*item.person*item.days}}৳
                        </div>
                        </div>
                        
                        <div class="form-bottom text-center bg-white">
                            <input type="submit" ng-disabled="addressForm.$invalid" value="next" class="btn btn-danger btn-emboshed cool-shadow btn-wide" />
                        </div>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
