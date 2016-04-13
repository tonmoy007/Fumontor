<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/oredermanage.css">

<div class="content-wrapper">
    <div class="content">
        <div class="content-label">
            <h2>Order Transections</h2>
        </div>
        <div class="content-body" ng-app="ManageOrderTransactions">
            <div class="horizontal-card" >
                <div class="card-title text-theme">
                    <i class="fa fa-money"></i> Transection Manager
                </div>
                <div class="card-body">
                    <div class=" card-half">
                <ul class="card-column">
                <li class="card-column-list-item">
                    <div class="card-column-list-item-head"><span class="delivered"></span><strong>Delivered Orders</strong></div>
                    <div  class="card-column-list-item-body" ng-controller="deliverdOrder">
                        <loading></loading>
                        <order-cards></order-cards>
                    </div>
                    <div class="card-column-list-item-foot"> </div>
                </li>
            </ul>
</div>
                </div>
            </div>
        </div>
        <div class="content-footer">
            
        </div>
    </div>
</div>
<script src="assets/js/admin/admin-cookAccounts.js"></script>