<div class="navbar navbar-right" ng-class="{'searched':searched}">
                <ul class=" right-nav">
                    <li><a href="" title="Signin/register" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in"></i></a>
                        <ul class="dropdown-menu cool-shadow">
                            <li><a href="auth/login">Signin</a></li>
                            <li><a href="">Register As Cook</a></li>
                            <li><a href="">Register As Foodie</a></li>
                            
                        
                        </ul>
                    </li>
                    <li><a href="" title="WHAT IS IT?>"> <small>How It Works</small> <i class="fa fa-question-circle"></i></a></li>
                    <li><a href="" id="cart-button" title="Cart"  ng-click="showCart=!showCart"><i class="fa fa-cart-arrow-down"></i><span ng-show='cartTotal' class="cool-shadow"><strong>{{cartTotal}}</strong></span></a></li>
                    
                </ul>


                <user-cart></user-cart>
</div>

