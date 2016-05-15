<div >
            
                <div class="invoice-container bg-white cool-shadow">
                    <h1 class="logo" style="font-size: 1.3em">Order Details</h1>
                    <div class="total">
                        Total <span class="badge badge-info">{{cartTotal}}</span> &nbsp;<span ng-if="cartTotal>1">Items</span><span ng-if="cartTotal<=1">Item</span>
                        <a href="" ng-click="toggleCart(true)"><i class="fa fa-edit"></i></a>
                    <div class="cd-cart-total" ng-if="cartSubTotal>0">
                    </div>
                         <p>Total Order Price <span class="price">৳ <label class="total"> {{cartSubTotal}}</label></span></p>
                    
                    </div>
                    <div class="invoice-data">
                        Orderer Name : {{user.name}}
                    </div>
                    <div class="invoice-data">
                        Orderer Address: {{user.address}}
                    </div>
                    <div class="invoice-data">
                        Orderer Contact Number: {{user.phone}}
                    </div>
                     <!-- {{cartItems|json}}    -->
                    <div ng-repeat="(k,item) in cartItems">
                        
                            <span >Delivery method for {{item.kitchenName}}<br>
                                <span ng-if="order[k]">Pickup</span>
                                <span ng-if="!order[k]">Home Delivery</span>
                            </span>
                            
                            
                        
                    </div>

                    <div class="invoice-billing" ng-show="showInvoiceDeliveryCharge">
                    <label class="form-label">Total Billing</label>
                    <div class="invoice-data">Total Items  <span class="badge">{{cartTotal}} </span></div>
                    <div class="invoice-data">Total Items Prize <span class="price">${{cartSubTotal}} </span></div>
                    <div class="invoice-data" ng-repeat="(key,item) in cartItems">
                        Delivery Charge for {{item.kitchenName}} <span class="price" ng-if="!order[item.cooksId]" >৳{{item.delivery_charge}}</span>
                        <span class="price" ng-if="order[item.cooksId]" >৳0</span>
                    </div>
                    <div class="invoice-data" ng-if="paymentSelected&&transactionCharge!=null">Transaction Charge <span class="price">৳{{transactionCharge}}</span></div>
                    <div class="invoice-data invoice-total">Total Amount to pay <span class="price">৳{{cartSubTotal+deliveryCharge+transactionCharge}}</span></div>

                </div>
                    <!-- {{cartItems}} -->
                </div>

            </div>