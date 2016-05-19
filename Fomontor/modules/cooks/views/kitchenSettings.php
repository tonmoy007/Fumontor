<ul class="{{visible}}" ng-repeat="kitn in kitchenInfo">
                    <li>
                    <form name="kitchenameForm" ng-show='kitchename_show'
                    ng-submit="submitKitchen(kitchenameForm,'kitchename',kitn.kitchename)" novalidate>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" ng-model="kitn.kitchename" required placeholder="Kitche Name" class="form-control">
                            <span ng-class="nameError" class="form-error-message" ng-show="kitchenameForm.$error.required">Kitchen name is required</span>
                            <button class="input-group-left" ng-disabled="kitchenameForm.$invalid" >Submit</button>
                        </div>

                    </div>
                    </form>
                    <span class="option-title">Kitchen Name</span><span>{{kitn.kitchename}}</span><a ng-class="{'active':kitchename_show}"href="javascript:void(0)" title="" ng-click="formShowing(kitchenameForm,true)"><i class="fa fa-pencil" ng-hide="kitchename_show"></i><i class="fa fa-times" ng-show="kitchename_show"></i></a>
                    </li>

                    <li>
                    <form novalidate name="addressForm" ng-show="address_show" ng-submit="submitKitchen(addressForm,'address',kitn.address)">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" required ng-model="kitn.address">
                            <span ng-class="nameError" class="form-error-message" ng-show="addressForm.$error.required">Address is required</span>
                            <button type="submit" class="input-group-left">Submit</button>
                        </div>
                    </div>
                    </form>
                    <span class="option-title">Address</span><span>{{kitn.address}}</span><a ng-class="{'active':address_show}"href="javascript:void(0)" title="" ng-click="formShowing(addressForm,true)"><i class="fa fa-pencil" ng-hide="address_show"></i><i class="fa fa-times" ng-show="address_show"></i></a>
                    </li>
                    <li>
                        <form name="locationForm" ng-show="location_show" method="get" accept-charset="utf-8" novalidate="true" ng-submit="submitKitchen(locationForm,'location',kitn.location)">
                        <div class="form-group">
                            <div class="input-group">
                            <input type="text" name="location" ng-model="kitn.location"class="form-control" placeholder="Location" required="true" >
                            <span class="form-error" ng-class="name-error" ng-show="locationForm.$error.required">Location is required</span>
                            <button type="submit" class="input-group-left">Submit</button>
                            </div>
                        </div>   
                        </form>

                        <span class="option-title">Location</span><span>{{kitn.location}}</span>
                        <a ng-class="{'active': location_show}"href="javascript:void(0)" title="edit" ng-click="formShowing(locationForm,true)"><i class="fa fa-pencil" ng-hide="location_show"></i><i class="fa fa-times" ng-show="location_show"></i></a>
                    </li>
                    <li>
                        <form name="deliveryOptionsForm" ng-show="deliveryOptions_show" ng-submit="submitDeliveryOptions(deliveryOptionsForm,kitn.pickup,kitn.home_delivery)" accept-charset="utf-8">
                        <label for="deliverySelect"  class="form-label">Change Delivery Options</label>
                        <label class="checkbox" for="pickUp" ng-click="toggleInput('pickup')" >
                        
                          <input type="checkbox" delivery-methods name="pickUpInput" id="pickUpInput" data-toggle="checkbox">
                          Pick up 
                        </label>
                        <label class="checkbox" for="homeDelivery" ng-click="toggleInput('homeDelivery')">
                        
                          <input type="checkbox" delivery-methods name="homeDelivery" id="homeDelivery" data-toggle="checkbox" >
                          Home Delivery 
                        </label>
                        
                      
                        

                        <button type="submit" class="btn btn-default" ng-disabled="deliveryOptionsForm.$invalid">Submit</button>    
                        </form>
                        <label class="option-title" >Delivery Options</label><br>
                        <span ng-show="kitn.pickup">Pick Up </span>
                        <span ng-show="kitn.home_delivery">Home delivery</span>
                        <a ng-class="{'active':deliveryOptions_show}"href="javascript:void(0)" title="edit" ng-click="formShowing(deliveryOptionsForm,true)"><i class="fa fa-pencil" ng-hide="deliveryOptions_show"></i><i class="fa fa-times" ng-show="deliveryOptions_show"></i></a>
                        

                    </li>
                   
                </ul>