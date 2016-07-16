<div class="top-head">
<link rel=stylesheet href="assets/css/home/switch.css">

    <div class="search-form-container flipInX animated cool-shadow" id="searchForm"  >
        <div class="form-overlay" >
        <!-- <right-navigation></right-navigation>
        <catagory-bar></catagory-bar>
        <div class="header-logo">
            <a class="navbar-brand"  href="#/">
                <div class="logo" style="font-size: 1.3em">
                    Fumontor
                </div>
            </a>
        </div> -->
            <div class="form" >
                <div class="">
                    <form name="Location" method="get" accept-charset="utf-8" ng-submit="submitQuery(searchedOrderType,homequery.location,Location)">
                        
                        <div class="findCatagory">
                            <div class="row">
                                <div class="col-xs-3 " ng-class="{active:type.checked}" ng-repeat="type in searchedFoodTypes">
                                    <label class="radio" ng-click="setActive(type.value)" ng-class="{active:type.checked}">
                                        <input type="radio" name="" ng-model="foodtype.name" ng-value="type.value">
                                        <span><i class="fa fa-cutlery"></i></span>
                                        <span>{{type.value}}</span>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tab-div "  >
                        <div class="row search-switch">
                            <div class="col-xs-12">
                            <div class="search-order" ng-class="{active:!searchedOrderType}">
                                Pre Order
                            </div>
                            <switch id="enabled" name="enabled" ng-model="searchedOrderType" on="" off="" class="red"></switch>
                            <div class="search-order" ng-class="{active:searchedOrderType}">
                                Instant Order
                            </div>
                        </div>
                        </div>
                            <ul class="search-list ">
                            <li class="form-list"><label><i class="fa fa-location-arrow"></i></label></li>

                                <!-- <li class="form-list"><select required="true" name="city" ng-init="query.city=cities[0].name" ng-model="query.city" ng-options="city.name for city in cities" class="form-control select select-primary select-block mbl">
                                <option value="">City?</option>
                                    
                                </select></li> -->
                                           
                                <li class="form-list big">
                                <input id="searchLocation"  type="text"  placeholder="Area/Location(Only In Dhaka)" uib-typeahead="c as c.name for c in places | filter:$viewValue:emptyOrMatch "  typeahead-no-results="noresult"  ng-model="homequery.location" typeahead-template-url="home/getTamplate/searchTemplate" class="form-control" autocomplete="off" typeahead-focus typeahead-show-hint="true" typeahead-min-length="0"  >

                                <ul class="dropdown-menu" ng-if="noresult&&homequery.location">
                                    <li><a href="">Service not available there now please choose from the list</a></li>
                                </ul>
                                </li>
                                

                                <li class="form-list"><button type="submit" class="btn cool-shadow btn-danger  ">Find ME FOOD </button></li>

                                
                        </ul>
                        </div>

                    </form>
                </div>
                
                
            </div>
            

        </div>
        
    </div>
</div>
