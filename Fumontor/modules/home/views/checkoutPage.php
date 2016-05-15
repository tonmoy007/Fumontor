<link rel="stylesheet" href="assets/css/home/checkout.css">

<product-loading></product-loading>
<div class="main-div">
    <div class="container">
    <div class="checkout-container">
    <div class="header" ng-if="!user.id">
        <label class="form-label">You have to login to make the order. use any of the following method to login</label>
        <a href="social/session/facebook?from=checkout" class=" btn-default"><i class="fa fa-facebook"></i>acebok Login</a>
        <a href="social/session/google?from=checkout" class="btn-default"><i class="fa fa-google"></i>oogle Login</a>
        
    </div>
        <div class="" ng-if="user.id&&cartTotal>0">
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
        <div class="" ng-if="cartTotal<=0">
            You haven't added any item to the cart
        </div>
    </div>
</div>
</div>