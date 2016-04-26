<ul id="orderTypeList" class="orderTypeList">
        <li>
        <label class="radio" ng-class="{checked:filter.orderTypes[0].checked}" 
        ng-click="submitFilterQuery('preorder')" 
        for="ordertype">
        <input type="radio" name="ordertype" class="custom-radio" ng-value="orderTypes[0].value" 
        
        data-toggle="radio" />
        <span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span> 
        {{filter.orderTypes[0].name}}</label>
        </li>
        <li>
        <label class="radio" ng-class="{checked:filter.orderTypes[1].checked}" 
        ng-click="order.checked=submitFilterQuery('ordernow')" 
        for="ordertype">
        <input type="radio" name="ordertype" class="custom-radio" ng-value="orderTypes[1].value" 
        
        data-toggle="radio" />
        <span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span> 
        {{filter.orderTypes[1].name}}</label>
        </li>
        </ul