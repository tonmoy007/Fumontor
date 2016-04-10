
<div id="editCook{{cook.id}}" class="fu-modal">
<div class="overlay"></div>
<div id="fu-loader"><i class="fa fa-spinner fa-pulse"></i></div>
    <div class="fu-modal-container">
    <a href="" title="" ng-click="closeModel(cook.id)" class="fu-modal-close">Close</a>
        <div class="fu-modal-header">
            <h2 class="modal-header">Edit {{cook.name}}'s Details</h2>
        </div>
        <div class="fu-modal-body">
            <div class="modal-form-container">
            <div class="form-container">
                <form name="cooksEditForm" ng-submit="cookEditFormSubmit(cook)"  method="get" novalidate accept-charset="utf-8">
                <div class="form-group" ng-form="nameForm">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" name="name" ng-model="cook.name" class="form-control" placeholder="Name(4 to 100 char)" required minlength="4" maxlength="100">
                    <span  ng-show="nameForm.name.$error.required" class="form-error-message nameError" >Name is required.</span>
                    <span  class="nameError form-error-message" ng-show="nameForm.name.$error.minlength">Minimum 4 Charecter Required</span>
                </div>
                <div class="form-group" ng-form="KitchenNameForm">
                    <label for="kitchenName" class="form-label">Kitchen Name</label>
                    <input type="text" name="kitchenName" ng-model="cook.kitchename" class="form-control" placeholder="Kitchen Name(4 to 150 char)" required minlength="4" maxlength="150">
                    <span  ng-show="KitchenNameForm.kitchenName.$error.required" class="form-error-message nameError" >Kitchen Name is required.</span>
                    <span  class="nameError form-error-message" ng-show="KitchenNameForm.kitchenName.$error.minlength">Minimum 4 Charecter Required</span>
                </div>

                <div class="form-group" ng-form="addressForm">
                    <label for="address">Address</label>
                    <input type="text" name="address" ng-model="cook.address" value="" class="form-control" placeholder="Address" required>
                    <span  ng-show="addressForm.address.$error.required" class="form-error-message nameError" >Address is required.</span>                    
                </div>
                <div class="form-group" ng-form="locationForm">
                    <label for="location">Location</label>
                    <input type="text" name="location" ng-model="cook.location" value="" class="form-control" placeholder="Location">
                    <span  ng-show="locationForm.location.$error.required" class="form-error-message nameError" >Location is required.</span>
                </div>
                <div class="form-group">
                <label class="form-label">Service Areas</label>
                    <tags-input ng-model="cook.serviceTags">
                        
                    </tags-input>
                </div>
                <div class="form-group">
                    <label class="form-label">Delivery Methods</label>
                    <label class="checkbox" for="pickUp" ng-click="toggleInput('pickup',cook.id)" >
                        <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
                          <input type="checkbox" delivery-data name="pickUpInput"  id="pickUpInput" data-toggle="checkbox">
                          Pick up {{cook.pickup}}
                        </label>
                        <label class="checkbox" for="homeDelivery" ng-click="toggleInput('homeDelivery',cook.id)">
                        <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
                          <input type="checkbox" delivery-data name="homeDelivery" id="homeDelivery" data-toggle="checkbox" value="true"  >
                          Home Delivery {{cook.home_delivery}}
                        </label>
                </div>
                <div ng-show="cook.home_delivery" ng-form="deliveryChargeForm" class="form-group">
                    <div class="" >
                        <label class="form-label">Delivery Charge</label>
                        <input  name="delivery_charge" class="form-control" ng-model="cook.delivery_charge" placeholder="Delivery Charge" required>
                        <span  ng-show="deliveryChargeForm.delivery_charge.$error.required && cook.home_delivery" class="form-error-message nameError" >Delivery Charge is required.</span>
                    </div>
                </div>

                <div class="form-bottom">
                    <div class="center">
                        <input ng-disabled="cooksEditForm.$invalid" type="submit" name="submit" class="btn btn-danger btn-wide btn-embossed" id="submit" >
                        <loading></loading>
                    </div>
                </div>
                
                </form>
            </div>
            </div>
        </div>
        <div class="home-signup-modal-footer"></div>
    </div>
</div>
