<div class="checkout-tab cool-shadow" ng-show="checkout[3].current">

    <span class="form-heading">Cofirm Your order</span>
    <form ng-submit="checkoutNext(confirmForm,3)" name="confirmForm">
    <div class="form-group">
        <label class="form-label">Check your order</label>
    </div>
    <div class="center col-md-8 col-md-offset-2">
        <invoice></invoice>
    </div>
    <div class="form-group col-md-6 col-md-offset-3 text-left">
        <label class="checkbox" for="terms" ng-class="{checked:accept}" >
            <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
              <input type="checkbox"  name="terms" id="terms" ng-model="accept" data-toggle="checkbox" >
               I accept the <a href="#/trems-and-policies">terms and policies</a> of <strong>Fumontor</strong>
        </label>
    </div>
        <div class="clearfix"></div>
                    <div class="form-bottom">
                        <input type="submit" ng-disabled="!accept" value="confirm" class="btn btn-danger btn-emboshed btn-wide" />
                    </div>
    </form>
    
</div>