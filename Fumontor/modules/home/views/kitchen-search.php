<div class="all-kitchen-card-container row"  ng-show="kitchensLoaded">
        <!-- <div id="demo-2">
            <input type="search" ng-model="searchKitchen" class="form-control cool-shadow" name="" value="" placeholder="Search Kithcen">

        </div> -->
        <div class="text-theme2 form-heading ">
            All Kithcens 
        </div>
        <div class="horizontal-card kitchen-card cool-shadow bg-white fadeIn animated space" ng-repeat="kitchen in allKitchens|filter:searchKitchen">
            <div class="card-container row ">
                <div class="kithcen-logo col-sm-4">
                    <img class="img-responsive" src="assets/img/f6.jpg" alt="{{kitchen.kitchename}}">
                </div>
                <div class="description col-sm-8">
                    <div class="kitchen title slider-title " ng-if="!kithcen.kitchename">
                        <a href="#/kitchen/{{kitchen.user_id}}">{{kitchen.kitchename}}</a>
                    </div>
                    <div class="kitchen title slider-title " ng-if="kithcen.kitchename">
                        <a href="#/kitchen/{{kitchen.user_id}}">Fumontor Kitchen</a>
                    </div>
                    <div class="kitchen address ">
                         <strong>Address:</strong> {{kitchen.address}}
                    </div>
                    <div class="kitchen address ">
                        <strong>Location:</strong> {{kitchen.location}}
                    </div>
                    <div class="kitchen service">
                        <strong>Service Areas :</strong>
                        <span class="label label-info" ng-repeat="area in kitchen.service_areas">{{area}}</span>
                    </div>
                    <div class="kitchen delivery">
                        <strong>Delivery Methods: </strong>
                        <span class="label label-info" ng-if="kitchen.pickup">Pick Up</span>
                        <span class="label label-info" ng-if="kitchen.home_delivery">Home Delivery</span>
                    </div>
                    <div class="kitchen contact">
                        <span class=" icon"> <i class="fa fa-phone"></i></span>
                        <strong>Phone Number:</strong>
                        <span>{{kitchen.phone}}</span>
                        
                    </div>

                </div>
            </div>
        </div>
        <div class="text-center" ng-show="kitchensLoaded">

        <div  class="more-loading" id="more-loading" ng-show="kithenloading">
            
        </div>
        <span class="alert bg-white text-theme2 cool-shadow space text-center" ng-if="endedLoading"> no more kitchens found</span>
    </div>
    </div>