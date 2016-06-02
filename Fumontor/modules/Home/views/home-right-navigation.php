<div class="navbar navbar-right" ng-class="{'searched':searched}">
                <ul class=" right-nav">
                    <li ng-if="!loggedin"><a href="" title="Signin/register" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in"></i></a>
                        <ul class="dropdown-menu cool-shadow">
                            <li><a href="auth/login">Signin</a></li>
                            <li><a href="cooks/registerCook">Register As Cook</a></li>
                            <li><a href="">Register As Foodie</a></li>
                            
                        
                        </ul>
                    </li>
                    <li ng-if="!loggedin"><a href="" title="WHAT IS IT?>"> <small>How It Works</small> <i class="fa fa-question-circle"></i></a></li>
                    
                    <li ng-if="loggedin" class="user-options"><a href="" title="{{user.first_name}} {{user.last_name}}"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img width="40px" ng-if="user.image" class="img-responsive img-circle" ng-src="{{user.image}}" alt="{{user.first_name}} {{user.last_name}}">
                    <img ng-if="!user.image" width="40px" class="img-responsive img-thumbnail img-circle" src="assets/img/avatar.png" alt="{{user.first_name}} {{user.last_name}}">{{user.name}}
                        <ul class="dropdown-menu cool-shadow">
                            <li><a href="#/"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                            <li><a href="#/settings"><i class="fa fa-gear"></i>&nbsp;Settings</a></li>
                            <li><a href="auth/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
                            
                        
                        </ul>
                    </a></li>
                    
                    <li><a href="" id="cart-button" title="Cart"  ng-click="showCart=!showCart"><i class="fa fa-cart-arrow-down"></i><span ng-show='cartTotal' class="cool-shadow"><strong>{{cartTotal}}</strong></span></a></li>
                    
                </ul>


                <user-cart></user-cart>
</div>

