<div class="single-weekly-menu start-page" >
    <div class="container">
    <div class="more-loading" ng-if="singleWeeklyMenuLoading">
        
    </div>
        <div class="product-show-div space" ng-if="!singleWeeklyMenuLoading" ng-repeat="item in weeklyMenuItem ">
            <div class="row ">
                <div class="col-md-2">
                    <img src="assets/img/thumb.jpg" alt="{{item.title}}" class="img-responsive">
                </div>
                <div class="col-md-6 text-left product">
                    <div class="product title">
                        <strong>{{item.title}}</strong>
                    </div>
                    <div class="info">
                        <em>by</em> <a href="#/kitchen/{{item.cooks_id}}">{{item.kitchename}}</a>
                    </div>
                    <div class="info">
                        minimum order for <label class="badge">{{item.min_order}}</label> persons
                    </div>
                    <div class="price">
                        Price {{item.price}}৳
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#/checkout/weekly-menu/{{item.id}}" class="btn btn-danger cool-shadow" >Place Order</a>
                </div>
               
            </div>
            <div class="space">
                    
                </div>
            <div class="row">
            <div class="slider-title text-left">
                <h1 class="product title">Menu</h1>

            </div>
            <div class="space">
                    
                </div>
                <table class="table cool-shadow table-bordered table-striped product table-responsive text-left ">
                    
                    <thead class="bg-theme text-white">
                        <tr>
                            <th>Days</th>
                            <th>Lunch Menu</th>
                            <th>Dinner Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="menu in item.menu">

                            <td>{{menu.name}}</td>
                            <td>
                                <ul>
                                    <li ng-repeat="m_item in menu.lunchMenuItems">{{m_item}}</li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li ng-repeat="m_item in menu.dinnerMenuItems">{{m_item}}</li>
                                </ul>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-bottom cool-shadow">
                <a href="#/checkout/weekly-menu/{{item.id}}" class="btn btn-danger cool-shadow" >Place Order</a>
            </div>
        </div>
    </div>
</div>