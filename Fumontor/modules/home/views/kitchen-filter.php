
<div class="kitchen-filter bg-trans-gray cool-shadow">
   <div class="kitchen-filter-container text-left">
       <!-- <div class="filter-search"><input type="search" name="" ng-model="search" value="" placeholder="Search Kitchen"></div> -->
       <div class="filter-logo logo ">Filter Your Search</div>

       <div class="search-filter-list" ng-if="type=='food'||type=='all'">
            <!-- <label class="filter-label">Order Type</label>
            <label class="checkbox" ng-class="{checked:ordertype.checked}"  ng-repeat="ordertype in filter.orderTypes" >
                <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span>
                <span class="second-icon fui-checkbox-checked"></span></span>
                <input type="checkbox" ng-model="ordertype.checked" ng-change="searchQuery('orderType')"  data-toggle="checkbox"/> {{ordertype.name}}
             </label> -->
             <label class="filter-label">Catagories</label>
            <ul class="catagoryList">
            <li ng-repeat="catagory in filter.catagories">
            <label class="checkbox" 
            ng-class="{checked:catagory.checked}">
            <span class="icons"><span class="first-icon 
            fui-checkbox-unchecked"></span><span class="second-icon
             fui-checkbox-checked"></span></span>
            <input type="checkbox" ng-model="catagory.checked"

            ng-change="searchQuery('catagory')" 
            data-toggle="checkbox"/>{{catagory.name}}</label>
            </li>
            </ul>
            <label class="filter-label text-theme">Cuisine</label>
            <select name="cusine" ng-model="filter.cusine" ng-change="searchQuery('cusine')" class="form-control" ng-options="cusineFilter.value for cusineFilter in filter.cusineFilters" ng-init="filter.cusine=filter.cusineFilter[0].value">
            <option value="">--Select--</option>        
            </select>
            <label class="filter-label text-theme">Sort by Price</label>
            <rzslider
                rz-slider-model="filter.PriceRangeSlider.min"
                rz-slider-high="filter.PriceRangeSlider.max"
                rz-slider-options="filter.PriceRangeSlider.options">
            </rzslider>
        </div>
        <div class="search-filter-list" ng-if="type=='kitchen'">
            <label class="filter-label">Delivery Type</label>
            <label class="checkbox" ng-class="{checked:deliverytype.checked}"  ng-repeat="deliverytype in filter.deliveryTypes" >
                <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span>
                <span class="second-icon fui-checkbox-checked"></span></span>
                <input type="checkbox" ng-model="deliverytype.checked" ng-change="searchQueryKitchen('deliveryType')"  data-toggle="checkbox"/> {{deliverytype.name}}
             </label>
        </div>

        <div class="searc-filter-list" ng-if="type==null">
        <label class="filter-label">Delivery Type</label>
            <label class="checkbox" ng-class="{checked:deliverytype.checked}"  ng-repeat="deliverytype in filter.deliveryTypes" >
                <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span>
                <span class="second-icon fui-checkbox-checked"></span></span>
                <input type="checkbox" ng-model="deliverytype.checked" ng-change="searchQueryAllKitchen('deliveryType')"  data-toggle="checkbox"/> {{deliverytype.name}}{{allKitn}}
             </label>
        </div>

   </div>
    
       
</div>