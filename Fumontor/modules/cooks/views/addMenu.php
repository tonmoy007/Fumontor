
<div class="content__body">
    <div class="view__container text-theme cool-border">
        
        
        <div class="view__form__container">
            <div class="inner-form">
            <div id="errors"></div>
                
               
                  <div id="infoMessage" class="submit-info">
                  </div>
                

                  <form name="addNewForm"  method="get" accept-charset="utf-8" ng-submit="AddNewFormSubmit(newItem,addNewForm)" novalidate="true">
                
                       <h2>General Information</h2>
                        <div class="form-group">
                            <div class="input-group" ng-form="titleForm">
                                
                            <input class="form-control" placeholder="Item Title" id="item_title" ng-model="newItem.title" name="item_title" required="true" minlength="4" maxlength="100" type="text" data-hint="Item Name">
                            <span ng-class="{nameError:titleForm.item_title.$dirty&&titleForm.item_title.$error.required}" class="form-error-message" >Product Title is required.</span>
                            <span ng-class="{nameError:titleForm.item_title.$dirty&&titleForm.item_title.$error.minlength}" class="form-error-message" >Product Title must have atleast 4 character.</span>
                            <span ng-class="{nameError:titleForm.item_title.$dirty&&titleForm.item_title.$error.maxlength}" class="form-error-message" >Product Title must not have more than 100 character.</span>
                                                 
                                
                                

                                
                            <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                            </div>
                        </div>
                   

                  
                        <div class="form-group form-inline">
                            <div class="input-group " ng-form="priceForm">
                                
                                <input class="form-control" placeholder="Price" id="price" name="price" type="number" ng-model="newItem.price" data-hint="Item Name">
                                <span ng-class="{nameError:priceForm.price.$dirty&&priceForm.price.$error.required}" class="form-error-message" >Item Price is required.</span>
                                <span ng-class="{nameError:priceForm.price.$dirty&&newItem.price<=0}" class="form-error-message" >Item Price can not be less than or equal 0.</span>
                                <span ng-class="{nameError:priceForm.price.$dirty&&priceForm.price.$error.number}" class="form-error-message" >Invalid Amount</span>              
                                
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            </div>
                            <div class="input-group" ng-form="cusineForm">
                                <select class="form-control" required="true" ng-model="newItem.cusines" name="cusine" id="cusine">
                                    <option value="">Select Cusine</option>
                                    <option value="Bangla">Bangla</option>
                                    <option value="Chinise">Chinise</option>
                                    <option value="Indian">Indian</option>
                                    <option value="French">French</option>
                                    
                                </select>
                                <span ng-class="{nameError:cusineForm.cusine.$dirty&&cusineForm.cusine.$error.required}" class="form-error-message" >Item Cusine is required.</span>
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            </div>
                           
                        </div>
                        <div class="form-group">
                             <div class="input-group" ng-form="minQuantityForm">
                                <input type="number" name="minQuantity"  placeholder="Minimum Order Quantity" ng-model="newItem.min_quantity" class="form-control">
                                <span ng-class="{nameError:minQuantityForm.minQuantity.$dirty&&minQuantityForm.minQuantity.$error.required}" class="form-error-message" >Item Minimum Quantity is required.</span>
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                        <div class="form-group" ng-form="featureImgForm">
                          <div class="ImageUpload" ng-show="!newItem.feature_img">
                              <span class="btn btn-danger btn-emboshed ">Select  a  Feature  Image</span>
                              <input type="file"  ngf-select ng-model="newItem.feature_img" class="form-control" name="featureImage"    
                                 accept="image/*" ngf-max-size="2MB" required
                                 ngf-model-invalid="errorFile">
                          </div>

                          <i ng-show="featureImgForm.featureImage.$error.required">*required</i><br>
                          <i ng-show="featureImgForm.featureImage.$error.maxSize">File too large 
                              {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
                          <img ng-show="featureImgForm.featureImage.$valid" class="img-thumbnail grid-lg img-responsive" ngf-thumbnail="newItem.feature_img" > <button ng-click="newItem.feature_img =''" ng-show="newItem.feature_img">Remove</button>
                        </div>
                
            <div class="form-group">
                
                <label for="servicezone" class="input-label control-label">
                Catagories <small> input all the catagory list </small>
                </label>

                
                        
                <tags-input ng-model="newItem.catagoryList" placeholder="add a catagory">
        
                </tags-input>

                </div>

                    
                        
                       <div class="form-group">
                       <label for="description">Description</label>
                       
                           <textarea name="description" rows="2" class="form-control" placeholder="Description" ng-model="newItem.description" required></textarea>
                       </div>
                    <h2>Scheduling </h2>
                        <!-- <div class="form-group form-inline" ng-form="orderNowScheduleForm">
                            <label for=""><i class="fa fa-clock-o"></i> Time Required  to deliver when item in <strong>todays menu</strong> : </label>
                            <select name="" ng-init="newItem.ordernow_start._hr='01'" class="form-control" ng-model="newItem.ordernow_start._hr">
                                <option  value="00">0</option>
                                <option  value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                
                            </select>&nbsp;<span ng-if="newItem.ordernow_start._hr==='01'||newItem.ordernow_start._hr==='00'">hour</span>
                            <span ng-if="!(newItem.ordernow_start._hr==='01'||newItem.ordernow_start._hr==='00')">hours</span>
                            <select class="form-control" ng-init="newItem.ordernow_start._min='00'" name="" ng-model="newItem.ordernow_start._min">

                                <option value="00">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>&nbsp;<span ng-if="newItem.ordernow_start._min==='00'">Minute</span><span ng-if="!(newItem.ordernow_start._min==='00')">Minutes</span>
                        </div> -->
                        <div class="form-group form-inline" ng-form="orderNowScheduleForm">
                            <label for=""><i class="fa fa-clock-o"></i>Minimum time required to deliver the <strong>Pre Order</strong> : </label>
                            <select name="" ng-init="newItem.preorder_start._hr='06'" class="form-control" ng-model="newItem.preorder_start._hr">
                                <option  value="00">0</option>
                                <option  value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                
                            </select>&nbsp;<span ng-if="newItem.preorder_start._hr==='01'||newItem.preorder_start._hr==='00'">hour</span>
                            <span ng-if="!(newItem.preorder_start._hr==='01'||newItem.preorder_start._hr==='00')">hours</span>
                            <select class="form-control" ng-init="newItem.preorder_start._min='00'" name="" ng-model="newItem.preorder_start._min">

                                <option value="00">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>&nbsp;<span ng-if="newItem.preorder_start._min==='00'">Minute</span><span ng-if="!(newItem.preorder_start._min==='00')">Minutes</span>
                        </div>
                         <div class="form-bottom">
                            <div class="center">
                                <input ng-disabled="addNewForm.$invalid" type="submit" name="submit" class="btn btn-danger btn-wide btn-embossed" id="submit" >
                                <div id="spinner"></div>
                            </div>
                        </div>
                                                    
                </form>
            </div>
        </div>
    <div class="view_bottom">
        <div class="progress" style="background: #fff; height: 2em">
              <div class="progress-bar" role="progressbar" aria-valuenow="{{newItem.progress}}"
              aria-valuemin="0" aria-valuemax="100" style="width:{{newItem.progress}}%">
                {{newItem.progress}}%
              </div>
            </div>
        <div class="alert alert-danger" ng-show="errorMsg">
            {{errorMsg}}
        </div>
    </div>

    </div>
</div>

