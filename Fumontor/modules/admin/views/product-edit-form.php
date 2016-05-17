
<div id="editProduct{{item.id}}" class="fu-modal">
<div class="overlay"></div>
<div id="fu-loader"><i class="fa fa-spinner fa-pulse"></i></div>
    <div class="fu-modal-container">
    <a href="" title="" ng-click="closeModel(item.id)" class="fu-modal-close">Close</a>
        <div class="fu-modal-header">
            <h2 class="modal-header">Edit {{item.title}}'s Details</h2>
        </div>
        <div class="fu-modal-body">
            <div class="modal-form-container">
            <div class="form-container">
                <form name="productEditForm" ng-submit="productEditFormSubmit(item,productEditForm)"  method="get" novalidate accept-charset="utf-8">
                <div class="form-group" ng-form="nameForm">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" ng-model="item.title" class="form-control" placeholder="Title(4 to 100 char)" required minlength="4" maxlength="100">
                    <span  ng-show="nameForm.title.$error.required" class="form-error-message nameError" >Title is required.</span>
                    <span  class="nameError form-error-message" ng-show="nameForm.title.$error.minlength">Minimum 4 Charecter Required</span>
                </div>
                <div class="form-group">
                <label class="form-label">Catagories</label>
                    <tags-input ng-model="item.catagoryList">
                        
                    </tags-input>
                </div>
                <div class="form-group" ng-form="DescriptionForm">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" name="description" ng-model="item.description" class="form-control" placeholder="Description(20 to 1000 char)" required minlength="20" maxlength="1000"></textarea>
                    <span  ng-show="DescriptionForm.description.$error.required" class="form-error-message nameError" >Description is required.</span>
                    <span  class="nameError form-error-message" ng-show="DescriptionForm.description.$error.minlength">Minimum 20 Charecter Required</span>
                </div>

                <div class="form-group" ng-form="priceForm">
                    <label for="price">Price</label>
                    <input type="text" name="price" ng-model="item.price" value="" class="form-control" placeholder="Address" required>
                    <span  ng-show="priceForm.price.$error.required" class="form-error-message nameError" >Price is required.</span>                    
                </div>
                <div class="form-group" ng-form="tMenuForm">
                    <label class="checkbox" ng-class="{checked:item.todays_menu}"ng-click="item.todays_menu=!item.todays_menu">
                    <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
                        <input type="checkbox" name="tMenu" value="" data-toggle="checkbox" ng-model="item.todays_menu"> In Todays Menu
                    </label>
                </div>
                <div class="form-group">
                    <label for="cusine" class="form-label">Cusine</label>
                    <select name="cusine" ng-model="item.cusines" class="form-control">
                        <option value="Bangla">Bangla</option>
                        <option value="Chinese">Chinese</option>
                        <option value="French">French</option>
                        
                    </select>
                </div>
                
                
                

                <div class="form-bottom">
                    <div class="center">
                        <input ng-disabled="productEditForm.$invalid" type="submit" name="submit" class="btn btn-danger btn-wide btn-embossed" id="submit" >
                        <loading></loading>
                    </div>
                </div>
                
                </form>
            </div>
            </div>
        </div>
        <div class="fu-modal-footer"></div>
    </div>
</div>
