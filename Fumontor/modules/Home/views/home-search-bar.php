<div class="top-head">


    <div class="search-form-container cool-shadow" id="searchForm"  >
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
                    <form name="Location" method="get" accept-charset="utf-8" ng-submit="submitQuery(query.city,query.location,Location)">
                        
                        <div class="findCatagory">
                            <div class="row">
                                <div class="col-xs-3 " ng-class="{active:type.checked}" ng-repeat="type in searchedFoodTypes">
                                    <label class="radio" ng-click="setActive(type.value)" ng-class="{active:type.checked}">
                                        <input type="radio" name="" ng-model="foodtype.name" ng-value="type.value"><i class="col-xs-12 fa fa-diamond"></i><span>{{type.value}}</span>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tab-div "  >
                            <ul class="search-list ">
                            <li class="form-list"><label>I am in </label></li>

                                <li class="form-list"><select required="true" name="city" ng-init="query.city=cities[0].name" ng-model="query.city" ng-options="city.name for city in cities" class="form-control select select-primary select-block mbl">
                                <option value="">City?</option>
                                    
                                </select></li>
                                           
                                <li class="form-list"><input required="true" type="text"  placeholder="Area/Location" typeahead="c as c.name for c in places | filter:$viewValue | limitTo:10" typeahead-min-length='1' typeahead-on-select='onSelectPart($item, $model, $label)' ng-model="query.location" typeahead-template-url="home/getTamplate/searchTemplate" class="form-control" ></li>
                           

                                <li class="form-list"><button type="submit" class="btn btn-danger btn-emboshed btn-wide">Find ME FOOD </button></li>

                                
                        </ul>
                        </div>
                    </form>
                </div>
                
                
            </div>
            

        </div>
        
    </div>
</div>