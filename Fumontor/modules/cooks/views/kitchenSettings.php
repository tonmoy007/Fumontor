<ul class="settingslist {{visible}}" ng-repeat="kitn in kitchenInfo">
                    <li>
                    <form name="kitchenameForm" ng-show='kitchename_show'
                    ng-submit="submitKitchen(kitchenameForm,'kitchename',kitn.kitchename)" novalidate>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" ng-model="kitn.kitchename" required placeholder="Kitche Name" class="form-control">
                            <span ng-class="nameError" class="form-error-message" ng-show="kitchenameForm.$error.required">Kitchen name is required</span>
                            <button class="input-group-left" ng-disabled="kitchenameForm.$invalid" ><i class="fa fa-save"></i></button>
                        </div>

                    </div>
                    </form>
                    <span class="option-title">Kitchen Name</span><span class="option-value">{{kitn.kitchename}}</span><a class="cool-shadow"  ng-class="{'active':kitchename_show}"href="javascript:void(0)" title="" ng-click="formShowing(kitchenameForm,true)"><i class="fa fa-pencil" ng-hide="kitchename_show"></i><i class="fa fa-times" ng-show="kitchename_show"></i></a>
                    </li>
                    <li>
                    <form name="kitchenSubForm" ng-show='kitchenSubShow'
                    ng-submit="submitKitchen(kitchenSubForm,'kitchen_sub_title',kitn.kitchen_sub_title)" novalidate>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" ng-model="kitn.kitchen_sub_title" required placeholder="Kitchen Subtitle" class="form-control">
                            <span ng-class="nameError" class="form-error-message" ng-show="kitchenSubForm.$error.required">Kitchen Sub title is required</span>
                            <button class="input-group-left" ng-disabled="kitchenSubForm.$invalid" ><i class="fa fa-save"></i></button>
                        </div>

                    </div>
                    </form>
                    <span class="option-title">Kitchen Subtitle</span><span class="option-value">{{kitn.kitchen_sub_title}}</span><a class="cool-shadow"  ng-class="{'active':kitchenSubShow}"href="javascript:void(0)" title="" ng-click="formShowing(kitchenSubForm,true)"><i class="fa fa-pencil" ng-hide="kitchenSubShow"></i><i class="fa fa-times" ng-show="kitchenSubShow"></i></a>
                    </li>
                    <li>
                    <form novalidate name="addressForm" ng-show="address_show" ng-submit="submitKitchen(addressForm,'address',kitn.address)">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" required ng-model="kitn.address">
                            <span ng-class="nameError" class="form-error-message" ng-show="addressForm.$error.required">Address is required</span>
                            <button type="submit" class="input-group-left"><i class="fa fa-save"></i></button>
                        </div>
                    </div>
                    </form>
                    <span class="option-title">Address</span><span class="option-value">{{kitn.address}}</span><a class="cool-shadow"  ng-class="{'active':address_show}"href="javascript:void(0)" title="" ng-click="formShowing(addressForm,true)"><i class="fa fa-pencil" ng-hide="address_show"></i><i class="fa fa-times" ng-show="address_show"></i></a>
                    </li>
                    <li>
                        <form name="locationForm" ng-show="location_show" method="get" accept-charset="utf-8" novalidate="true" ng-submit="submitKitchen(locationForm,'location',kitn.location)">
                        <div class="form-group">
                            <div class="input-group">
                            <input type="text" name="location" ng-model="kitn.location"class="form-control" placeholder="Location" required="true" >
                            <span class="form-error" ng-class="name-error" ng-show="locationForm.$error.required">Location is required</span>
                            <button type="submit" class="input-group-left"><i class="fa fa-save"></i></button>
                            </div>
                        </div>   
                        </form>

                        <span class="option-title">Location</span><span class="option-value">{{kitn.location}}</span>
                        <a class="cool-shadow"  ng-class="{'active': location_show}"href="javascript:void(0)" title="edit" ng-click="formShowing(locationForm,true)"><i class="fa fa-pencil" ng-hide="location_show"></i><i class="fa fa-times" ng-show="location_show"></i></a>
                    </li>
                    <li>

                        <form name="minOrderForm" ng-show="minOrder_show" method="get" accept-charset="utf-8" novalidate="true" ng-submit="submitKitchen(minOrderForm,'min_order',kitn.min_order)">
                        <div class="form-group">
                        <label class="form-label">Minimum Order Amount</label>
                            <input type="number" name="" value="" placeholder="Minimum Order amount" class="form-control" ng-model="kitn.min_order">
                            <input type="submit" name="" value="Change" class="btn btn-default">
                        </div>   
                        </form>
                        <span class="option-title">Minimum Order Amount</span>
                        <span class="option-value">{{kitn.min_order}}</span>
                        <a class="cool-shadow"  ng-class="{'active': minOrder_show}"href="javascript:void(0)" title="edit" ng-click="formShowing(minOrderForm,true)"><i class="fa fa-pencil" ng-hide="minOrder_show"></i><i class="fa fa-times" ng-show="minOrder_show"></i></a>
                    </li>
                    <li>
                    <form name="serviceAreaForm" ng-show="serviceArea_show" method="get" accept-charset="utf-8" novalidate="true" ng-submit="submitKitchen(serviceAreaForm,'service_areas',kitn.serviceList)">
                        <div class="form-group">
                        <label class="form-label">Service Areas</label>
                            <tags-input ng-model="kitn.serviceList" placeholder="add a service area" ></tags-input>
                            <input type="submit" name="" value="Change" class="btn btn-default">
                        </div>   
                        </form>
                        <span class="option-title">Service Areas </span>
                        <span class="option-value">
                            <ul class="service_areas">
                                <li class="badge bg-theme" ng-repeat="area in kitn.serviceList">{{area.text}}</li>
                                
                            </ul>
                        </span>
                        <a class="cool-shadow"  ng-class="{'active': serviceArea_show}"href="javascript:void(0)" title="edit" ng-click="formShowing(serviceAreaForm,true)"><i class="fa fa-pencil" ng-hide="serviceArea_show"></i><i class="fa fa-times" ng-show="serviceArea_show"></i></a>
                    </li>
                    <li>
                        <form name="deliveryOptionsForm" ng-show="deliveryOptions_show" ng-submit="submitDeliveryOptions(deliveryOptionsForm,kitn.pickup,kitn.home_delivery)" accept-charset="utf-8">
                        <label for="deliverySelect"  class="form-label">Change Delivery Options</label>
                        <label class="checkbox" for="pickUp" ng-click="toggleInput('pickup')" >
                        <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
                          <input type="checkbox" delivery-methods name="pickUpInput" id="pickUpInput" data-toggle="checkbox">
                          Pick up 
                        </label>
                        <label class="checkbox" for="homeDelivery" ng-click="toggleInput('homeDelivery')">
                        <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
                          <input type="checkbox" delivery-methods name="homeDelivery" id="homeDelivery" data-toggle="checkbox" >
                          Home Delivery 
                        </label>
                        
                      
                        

                        <button type="submit" class="btn btn-default" ng-disabled="deliveryOptionsForm.$invalid">Submit</button>    
                        </form>
                        <span class="option-title" >Delivery Options</span>
                        <span ng-show="kitn.pickup" class="option-value delivery-options">Pick Up </span><span ng-show="kitn.pickup&&kitn.home_delivery">||</span>
                        <span ng-show="kitn.home_delivery" class="option-value delivery-options">Home delivery</span>

                        <a class="cool-shadow"  ng-class="{'active':deliveryOptions_show}"href="javascript:void(0)" title="edit" ng-click="formShowing(deliveryOptionsForm,true)"><i class="fa fa-pencil" ng-hide="deliveryOptions_show"></i><i class="fa fa-times" ng-show="deliveryOptions_show"></i></a>
                        

                    </li>
                    <li ng-show="kitn.home_delivery">
                        <form name="deliveryChargeForm" ng-show="deliveryChargeFormShow" method="get" accept-charset="utf-8" ng-submit="submitKitchen(deliveryChargeForm,'delivery_charge',kitn.delivery_charge)">
                            <div class="form-group">
                            <label for="deliveryCharge" class="form-label">Delivery Charge</label>
                            
                                <div class="input-group">
                                <input type="text" name="deliveryCharge" ng-model="kitn.delivery_charge"class="form-control" placeholder="delivery charge" required="true" >
                                <span class="form-error" ng-class="name-error" ng-show="deliveryChargeForm.$error.required">Location is required</span>
                                <button type="submit" class="input-group-left"><i class="fa fa-save"></i></button>
                                </div>
                            </div>                   
                        </form>
                        <span class="option-title" ng-show="kitn.home_delivery&&kitn.delivery_charge">Delivery Charge</span>
                        <span class="option-value" ng-show="kitn.home_delivery&&kitn.delivery_charge">BDT: {{kitn.delivery_charge}}</span>
                        <a class="cool-shadow"  ng-class="{'active':deliveryChargeFormShow}"href="javascript:void(0)" title="edit" ng-click="formShowing(deliveryChargeForm,true)"><i class="fa fa-pencil" ng-hide="deliveryChargeFormShow"></i><i class="fa fa-times" ng-show="deliveryChargeFormShow"></i></a>
                    </li>
                    <li >
                        <form name="KitchenStartForm" ng-show="kitche_start_form_show" method="get" accept-charset="utf-8" ng-submit="submitKitchen(KitchenStartForm,'kitchen_start_time',kitn.kitchen_start_time)">
                            <div class="form-group">
                                <label for="KitcheStartime" class="form-label">Kitchen Start time</label>
                                <ng-timepicker init-time="{{kitn.kitchen_start_time}}" ng-model="kitn.kitchen_start_time" ></ng-timepicker>

                                
                            </div>
                            <div class="form-group">
                                <label for="KitcheEndtime" class="form-label">Kitchen End time</label>
                                <ng-timepicker init-time="{{kitn.kitchen_end_time}}" ng-model="kitn.kitchen_end_time" ></ng-timepicker>

                                
                            </div>
                            <button type="submit" ng-click="submitKitchen(KitchenStartForm,'kitchen_end_time',kitn.kitchen_end_time)" class="btn btn-default"><i class="fa fa-save"></i>&nbsp;Submit</button>
                                               
                        </form>
                        <span class="option-title" ng-show="kitn.kitchen_start_time&&kitn.kitchen_end_time">Kitchen Scedule</span>
                        <span class="option-value" ng-show="kitn.kitchen_start_time&&kitn.kitchen_end_time">{{kitn.kitchen_start_time}} -  {{kitn.kitchen_end_time}} </span>
                        <a class="cool-shadow"  ng-class="{'active':kitche_start_form_show}"href="javascript:void(0)" title="edit" ng-click="formShowing(KitchenStartForm,true)"><i class="fa fa-pencil" ng-hide="kitche_start_form_show"></i><i class="fa fa-times" ng-show="kitche_start_form_show"></i></a>
                    </li>
                    
                        
                   
                </ul>