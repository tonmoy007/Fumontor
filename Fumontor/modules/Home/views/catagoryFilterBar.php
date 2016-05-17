<div class="catagory-bar cool-shadow" id="catagoryBar" ng-class='{searched:searched||hideCatagoryFilter}'>
<div class="logo-container">
            <div class="logo filter-logo">
                 Fumontor
            </div>
            <div class="cart-dismiss">
                <a href=""  class="dismiss-btn" ng-click="hideFilterBar()"></a>
            </div>
        </div>
    <div class="catagory-bar-container">
        
        <div class="filter-header">
            Fiter Your Menu
        </div>
        <label class="filter-label text-theme">Catagories</label>
        <catagory></catagory>
        <label class="filter-label text-theme">Offers</label>
        <offers></offers>
        <label class="filter-label text-theme">Cusine</label>
        <select name="cusine" ng-model="filter.cusine" ng-change="submitFilterQuery('cusine')" class="form-control" ng-options="cusineFilter.value for cusineFilter in filter.cusineFilters" ng-init="filter.cusine=filter.cusineFilter[0].value">
        <option value="">--Select--</option>        
        </select>
        <label class="filter-label text-theme">Order Type</label>
        <order-type></order-type>
        
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