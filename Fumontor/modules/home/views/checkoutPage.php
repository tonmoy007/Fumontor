

<product-loading></product-loading>
<div class="main-div" ng-show="checkoutShow">
<link rel="stylesheet" href="assets/css/home/checkout.css">
    <div class="container">
    <div class="checkout-container">
    <div class="header" ng-if="!user.id">
        <div class="loginBox">
            <div class="login-container cool-shadow ">
                <label class="form-label">You have to login to make the order. use any of the following method to login</label>
                <a href="social/session/facebook?from=checkout" class="loginBtn loginBtn--facebook slideInRight animated" >Login with Facebook</a>
                <div class="clearfix">
                    
                </div>
                <a href="social/session/google?from=checkout" class="loginBtn loginBtn--google slideInLeft animated" >Login with Google</a>
        
            </div>
        </div>
    </div>
        <div class="" ng-if="user.id&&cartSubTotal>=200&&checkOutValid">
                <h2 class="heading header logo" style="font-size: 2em">Checkout</h2>

            <small>Hi <strong>{{user.name}}</strong> !! You are about to checkout from <strong>fumontor</strong> please fullfill the following steps to place the order.</small>
                
        <div class="row checkout-div">
        <nav>
                    <ol class="cd-multi-steps text-bottom count">
                        <li class="" ng-class="{'current':checkout[0].current,'visited':checkout[0].visited}"><a href="" ng-click="showProcess(0)">Address</a></li>
                        <li class="" ng-class="{current:checkout[1].current,visited:checkout[1].visited}" ><a href="" ng-class="{disabled:!checkout[0].visited}" ng-click="showProcess(1)">Delivery Methods</a></li>
                        <li class="" ng-class="{current:checkout[2].current,visited:checkout[2].visited}"><a href="" ng-class="{disabled:!checkout[1].visited}" ng-click="showProcess(2)"><em>Billing</em></a></li>
                        <li class="" ng-class="{current:checkout[3].current,visited:checkout[3].visited}"><a href="" ng-class="{disabled:!checkout[2].visited}" ng-disabled="!checkout[2].visited" ng-click="showProcess(3)"><em>Confirm Checkout</em></a></li>
                    </ol>
            </nav>
            <div class="clearfix"></div>
            <div class="checkout-process col-md-8 ">
                
                <checkout-address></checkout-address>
               <checkout-delivery-method></checkout-delivery-method>
                <checkout-billing></checkout-billing>
                <checkout-confirm></checkout-confirm>
                
            </div>
            <div class="col-md-4 invoice ">
                <invoice></invoice>
            </div>
            
        </div>
        </div>
        <div ng-if="!checkOutValid&&cartTotal>0" class="alert alert-info cool-shadow text-theme2 bg-white space">
            Sorry looks like you did't fullfil some kithcen's requrement !! Please visit the kitchen's Page, Link available in the cart's warning block.<a href="" ng-click="toggleCart()"><strong>See Cart</strong></a>
        </div>
        <div class="space bg-white alert cool-shadow text-theme2" ng-if="cartTotal<=0">
            Your <strong>Cart</strong> is empty please add Items to the cart <a href="#/all-kitchen"><strong>View All Kitchen</strong></a>
        </div>
    </div>
</div>
</div>