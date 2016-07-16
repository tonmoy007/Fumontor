

<product-loading></product-loading>
<div class="main-div" ng-show="checkoutShow">
<link rel="stylesheet" href="assets/css/home/checkout.css">

<link rel="stylesheet" href="assets/css/login.css">
    <div class="container">
    <div class="checkout-container">
    <div class="" ng-if="!user.id">
        <login></login>
    </div>
        <div class="" ng-if="user.id&&cartSubTotal>=200&&checkOutValid">
                <h1 class="section-head  text-theme2" style="font-size: 2em">Checkout</h1>

            <div class="alert">Hi <strong class="text-theme">{{user.name}}</strong> !! You are about to checkout from <strong class="text-theme">fumontor</strong> please fullfill the following steps to place the order.</div>
                
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