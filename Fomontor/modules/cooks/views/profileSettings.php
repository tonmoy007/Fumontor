<ul class="{{visible}}" ng-repeat="user in userInfo" ng-show="showDiv">
                
                <li class="user-img center">
                    <img class="img-thumbnail img-circle" src="assets/img/avatar.png" alt="">
                </li>
                <li>
                <form  ng-show='first_name_show' ng-submit="submitProfile(nameForm,'first_name',user.first_name)"  name="nameForm" novalidate method="get" accept-charset="utf-8">
                        <div class="form-group">
                            <div class="input-group">
                            <input type="text"  class="form-control" name="{{user.first_name}}" required ng-model="user.first_name" value="" placeholder="Name">
                            <span ng-class="nameError" class="form-error-message" ng-show="nameForm.$error.required">The name is required.</span>
                        <button ng-disabled="nameForm.$invalid" type="submit" name="submit" class="input-group-left "><i class="fa fa-save"></i></button>
                            
                            </div>
                        </div>
                    </form>
                    <span class="option-title">Name </span><span>{{user.first_name}} {{user.last_name}}</span><a ng-class="{'active':first_name_show}"href="javascript:void(0)" title="" ng-click="formShowing(nameForm,true)"><i class="fa fa-pencil" ng-hide="first_name_show"></i><i class="fa fa-times" ng-show="first_name_show"></i></a>
                    </li>

                    <li>
                    <form  ng-show='username_show' ng-submit="submitProfile(usernameForm,'username',user.username)"  name="usernameForm" novalidate method="get" accept-charset="utf-8">
                        <div class="form-group">
                            <div class="input-group">
                            <input type="text"  class="form-control" name="username" unique-username required ng-model="user.username" value="" placeholder="username">
                            <span ng-class="nameError" class="form-error-message" ng-show="usernameForm.$error.required">The name is required.</span>
                            <span ng-class="nameError" class="form-error-message" ng-show="usernameForm.$error.checkUsername">This username is used try a unique one.</span>
                        <button ng-disabled="usernameForm.$invalid"  type="submit" name="submit" class="input-group-left "><i class="fa fa-save"></i></button>
                            
                            </div>
                        </div>
                    </form><span class="option-title">UserName </span> <span>{{user.username}}</span><a ng-class="{'active':username_show}"href="javascript:void(0)" title="" ng-click="formShowing(usernameForm,true)"><i class="fa fa-pencil" ng-hide="username_show"></i><i class="fa fa-times" ng-show="username_show"></i></a>

                    </li>

                    <li>
                    <form  ng-show='email_show' name="emailForm" ng-submit="submitProfile(emailForm,'email',user.email)" novalidate accept-charset="utf-8">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" unique-email name="email" ng-model="user.email" class="form-control" value="" placeholder="email" required>
                            <span ng-class="nameError" class="form-error-message" ng-show="emailForm.$error.email">This is not a valid email Address.</span>
                            <span ng-class="nameError" class="form-error-message" ng-show="emailForm.$error.required">Email Address is required</span>
                            <span ng-class="nameError" class="form-error-message"  ng-show="emailForm.$error.checkMail&&!emailForm.$pristine">This email is already taken</span>

                     <button ng-disabled="emailForm.email.$invalid  || emailForm.email.$pending"  class="input-group-left ">Submit</button>
                        
                        </div>

                    </div>
                    </form><span class="option-title">Email</span><span>{{user.email}}</span>
                    <a ng-class="{'active':email_show}"href="javascript:void(0)" title="" ng-click="formShowing(emailForm,true)"><i class="fa fa-pencil" ng-hide="email_show"></i><i class="fa fa-times" ng-show="email_show"></i></a>
                    
                    </li>
                    <li>
                    <form  ng-show='phone_show' name="phoneForm" method="get" accept-charset="utf-8" ng-submit="submitProfile(phoneForm,'phone',user.phone)" novalidate>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="phone" ng-model="user.phone" unique-phone class="form-control" value="" placeholder="Phone Number" required>
                            <span ng-class="nameError" class="form-error-message" ng-show="phoneForm.$error.required">Phone Number is required</span>
                            <span ng-class="nameError" class="form-error-message" ng-show="phoneForm.$error.checkPhone">This Phone Number is used try a different one</span>
                    <button  ng-disabled="phoneForm.$invalid" class="input-group-left ">Submit</button>
                        
                        </div>
                    </div>
                    </form><span class="option-title">Phone Number</span><span>{{user.phone}}</span><a ng-class="{'active':phone_show}"href="javascript:void(0)" title="" ng-click="formShowing(phoneForm,true)"><i class="fa fa-pencil" ng-hide="phone_show"></i><i class="fa fa-times" ng-show="phone_show"></i></a>
                    </li>

                </ul>