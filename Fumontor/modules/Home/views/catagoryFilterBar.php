<div class="catagory-bar cool-shadow bg-trans-gray" id="catagoryBar" ng-class='{searched:searched||hideCatagoryFilter,"top-me":slideNav}'>
<div class="logo-container">
            <div class="logo filter-logo">
                 Fiter Your Menu
            </div>
            <div class="cart-dismiss">
                <a href=""  class="text-theme2" ng-click="hideFilterBar()"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
    <div class="catagory-bar-container">
        
        <div class="filter-header">
            
        </div>
        <label class="filter-label text-theme">Catagories</label>
        <catagory></catagory>
        <offers></offers>
        <label class="filter-label text-theme">Cuisine</label>
        <select name="cusine" ng-model="filter.cusine" ng-change="submitFilterQuery('cusine')" class="form-control" ng-options="cusineFilter.value for cusineFilter in filter.cusineFilters" ng-init="filter.cusine=filter.cusineFilter[0].value">
        <option value="">--Select--</option>        
        </select>
        <!-- <label class="filter-label text-theme">Order Type</label> -->
        <!-- <order-type></order-type> -->
        
        <label class="filter-label text-theme">Sort by Price</label>
        <rzslider
            rz-slider-model="filter.PriceRangeSlider.min"
            rz-slider-high="filter.PriceRangeSlider.max"
            rz-slider-options="filter.PriceRangeSlider.options">
        </rzslider>
        <label class="filter-label text-theme">Delivery Methods</label>
        <delivery-methods></delivery-methods>
        <label class="filter-label text-theme">Tags</label>
        <tags></tags>
    </div>
</div>