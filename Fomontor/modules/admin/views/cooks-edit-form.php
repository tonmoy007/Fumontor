
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
                <form name="cooksEditForm"  method="get" accept-charset="utf-8">
                <div class="form-group" ng-form="nameForm">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" name="name" ng-model="cook.name" class="form-control" placeholder="Name(maximum 100 char)" required minlength="4" maxlength="100">
                    <span  ng-show="nameForm.name.$error.required" class="form-error-message nameError" >Name is required.</span>
                    <span  class="nameError form-error-message" ng-show="nameForm.name.$error.minlength">Minimum 4 Charecter Required</span>
                </div>
                <div class="form-group" ng-form="addressForm">
                    <label for="address">Address</label>
                    <input type="text" name="address" ng-model="cook.address" value="" class="form-control" placeholder="Address" required>
                    <span  ng-show="addressForm.address.$error.required" class="form-error-message nameError" >Address is required.</span>                    
                </div>
                <div class="form-group" ng-form="locationForm">
                    <label for="location">Location</label>
                    <input type="text" name="location" ng-model="cook.location" value="" class="form-control" placeholder="Location">
                    <span  ng-show="locationForm.address.$error.required" class="form-error-message nameError" >Location is required.</span>
                </div>
                <div class="form-group">
                <label class="form-label">Service Areas</label>
                    <tags-input ng-model="cook.serviceTags">
                        <auto-complete source="loadTags($query)"></auto-complete>
                    </tags-input>
                </div>
                <div class="form-group">
                    <label class="form-label">Delivery Methods</label>
                    <label class="checkbox" for="pickUp" ng-click="toggleInput('pickup')" >
                        <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
                          <input type="checkbox" delivery-methods name="pickUpInput" ng-model="cook.pickup" id="pickUpInput" data-toggle="checkbox">
                          Pick up 
                        </label>
                        <label class="checkbox" for="homeDelivery" ng-click="toggleInput('homeDelivery')">
                        <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
                          <input type="checkbox" delivery-methods name="homeDelivery" id="homeDelivery" data-toggle="checkbox" value="true" ng-model="cook.home_delivery" >
                          Home Delivery 
                        </label>
                </div>
                
                </form>
            </div>
            </div>
        </div>
        <div class="home-signup-modal-footer"></div>
    </div>
</div>
