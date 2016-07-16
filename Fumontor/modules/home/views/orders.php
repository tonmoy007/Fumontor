<link rel="stylesheet" href="assets/css/oredermanage.css">
<div class="page-head">
    <div class="container">
        <div class="page-cover">
            
        </div>
    </div>
</div>
<div class="page-body space">
    <div class="container">
    <h1 class="card-title text-left">My Orders</h1>
        <span class="more-loading" ng-show='orderLoading'></span>
        <div class="form-bottom">
            <div class="col-md-6">
                <order-card items="orders" class="space"></order-card>

            </div>
        </div>
    </div>
</div>