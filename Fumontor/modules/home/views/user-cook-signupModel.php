<div class="fu-modal " id="cook-signup-model" >
<div class="overlay"></div>

    <div class="fu-modal-container" ng-class="{'is-visible':showCookSignup}">
    <a href="" ng-click="closeOpenKitchenModule()" title="" class="fu-modal-close">Close</a>
        <div class="fu-modal-header bg-theme2">
            <h2 class="modal-header"><strong>Fumontor Kitchen Registration</strong></h2>
        </div>
        <div class="fu-modal-body" ng-init="cook=user">
            <div class="modal-form-container">
                <form name="cookRegForm" method="post" ng-submit="registerUserAsCook(cookRegForm,cook)" accept-charset="utf-8">
                                  
                
                    <div class="form-message">Hello <strong class="text-theme">{{cook.name}}</strong> you are about to register into <span class="modal-strong">fumontor</span> as a cook<br> We need the following information to make your kitchen ready. <span class="text-red">*</span> marked fields are required!!</div>

                    <div class="form-body">
                    <input type="hidden" name="username" value="" id="username">
                      <div class="form-group " >
                        
                        <div class="input-group" ng-form="kithcenNameForm" >
                          <span class="input-group-addon"><i class="fa fa-home"></i></span>
                          <input type="text" class="form-control" required name="kitchenName" ng-model="cook.kitchenName" id="kitchenName" minlength="4" maxlength="100" placeholder="Kitchen Name ( This will be shown to the user )" >
                          <span ng-class="{nameError:kithcenNameForm.kitchenName.$dirty&&kithcenNameForm.kitchenName.$error.required}"  class="form-error-message" ng-if="kithcenNameForm.kitchenName.$error.required">Kithcne Name is required</span>
                          <span ng-class="{nameError:kithcenNameForm.kitchenName.$dirty&&kithcenNameForm.kitchenName.$error.minlength}"  class="form-error-message" ng-if="kithcenNameForm.kitchenName.$error.minlength">Kitchen name must have atleast 4 character</span>
                          <span ng-class="{nameError:kithcenNameForm.kitchenName.$dirty&&kithcenNameForm.kitchenName.$error.maxlength}"  class="form-error-message" ng-if="kithcenNameForm.kitchenName.$error.maxlength">Kitchen Name must not have more than 100 character</span>
                        </div>
                        <span class="required-mark"><i class="fa fa-asterisk"></i></span>
                        
                        
                    </div>
                    <div class="form-group ">
                        
                        <div class="input-group" ng-form="cookEmailForm">
                          <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                          <input type="email" unique-email name="email" ng-model="cook.email" class="form-control"  placeholder="saddam.hossain@yahoo.com">
                              <span ng-class="{nameError:cookEmailForm.email.$dirty&&cookEmailForm.email.$error.email}"  class="form-error-message" ng-if="cookEmailForm.email.$error.email">Invalid Email address</span>
                              <span ng-class="{nameError:cookEmailForm.email.$dirty&&cookEmailForm.email.$error.checkMail}"  class="form-error-message" ng-if="cookEmailForm.email.$error.checkMail">This Email is used try a different one</span>
                        </div>
                       
                        
                    </div>
                
                    <div class="form-group ">
                        
                        <div class="input-group" ng-form="PhoneNumberForm">
                          <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                          <input type="text" class="form-control" minlength="13" maxlength="18" name="phoneCook" id="phone" phone-input placeholder="Phone Number" ng-model="cook.phone" phone-input >
                          <span class=" nameError form-error-message" ng-if="PhoneNumberForm.phoneCook.$error.required">Phone Number is required</span>
                              <span ng-class="{nameError:PhoneNumberForm.phoneCook.$dirty&&PhoneNumberForm.cookPhoned.$error.checkPhone}"  class="form-error-message" ng-if="PhoneNumberForm.cookPhoned.$error.checkPhone">This Phone Number is used try a different one</span>
                              <span ng-class="{nameError:PhoneNumberForm.phoneCook.$dirty&&PhoneNumberForm.cookPhoned.$error.minlength}"  class="form-error-message" ng-if="PhoneNumberForm.cookPhoned.$error.minlength">Invalid Phone Number</span>
                              <span ng-class="{nameError:PhoneNumberForm.phoneCook.$dirty&&PhoneNumberForm.cookPhoned.$error.maxlength}"  class="form-error-message" ng-if="PhoneNumberForm.cookPhoned.$error.maxlength">Invalid Phone Number</span>
                              <input type="hidden" unique-phone minlength="13" maxlength="13" ng-model="cook.phone" name="cookPhoned" value="{{cook.phone}}">
                        </div>

                          
                          <span class="required-mark"><i class="fa fa-asterisk"></i></span>
                        
                    </div>
                    <div class="form-group ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                          <input type="text" class="form-control" ng-model="cook.location" name="location" id="location" placeholder="Location (i.e. Mirpur,Dhanmondi)" >
                        </div>

                          <span class="form-error-message"></span>
                        
                    </div>
                    <div class="form-group ">
                        
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                          <input type="text" class="form-control " ng-model="cook.address" name="address" id="address" placeholder="Address (Your full address here)" >
                        </div>

                          <span class="form-error-message"></span>
                        
                    </div>
                    <div class="form-bottom no-bottom">
                        <div class="center">
                            <input type="submit" ng-disabled="cookRegForm.$invalid||cook.password!=cook.confirmpassword" class="btn btn-danger btn-wide cool-shadow submit" value="Create   Kitchen" id="submit">
                            <span class="refress mail-spinner" ng-if="formSubmitting"><i class="fa fa-refresh fa-spin fa-2x fa-fw"></i></span>
                        </div>
                    </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="fu-modal-footer">&copy; 2016 fumontor all rights resurved</div>
    </div>
</div>