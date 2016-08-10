<div id="editWeeklyItem{{item.id}}" class="fu-modal">
    <div class="overlay"></div>
    <div id="fu-loader"><i class="fa fa-spinner fa-pulse"></i></div>
    <div class="fu-modal-container">
        <a href="" title="" ng-click="closeModel('editWeeklyItem'+item.id)" class="fu-modal-close">Close</a>
        <div class="fu-modal-header">
            <h2 class="modal-header">Edit Weekly Menu Item</h2>
        </div>
        <div class="fu-modal-body">
        <div class="add-weekly-item-form text-left">
                <div class="form-group">
                    <label><strong>Title</strong></label>
                    <input type="text" name="" value="" placeholder="" autofocus="true" class="form-control" ng-model="item.title">
                </div>
                <label class=""><strong>Create Menu</strong> <small>add items for each day and each meal time</small></label>
                <div class="tabs tabs-style-topline view__tab cool-border">
                <nav>
                    <ul>
                        <li ng-class="{'tab-current':item.menu[key].visible}" ng-repeat="(key,day) in item.menu"><a href="" title="" ng-click="setVisible(key,item.menu)" >{{day.name}}</a></li>
                    </ul>
                </nav>
                <div class="content-wrap ">
                    <section class="" ng-repeat="(key,day) in item.menu" ng-class="{'content-current':item.menu[key].visible}"> 
                        <div class="col-sm-6 text-left">
                            <label class="small-block-title">Lunch Menu</label>
                            <div class="menu-add-form alert alert-info bg-white" ng-repeat="(index,item) in day.lunchMenuItems track by $index">
                                <label class="control-label">{{item}}</label>
                                <a href="" class=" text-theme pull-right" ng-click="deleteEditItems(index,day.lunchMenuItems)">&times;</a>
                               

                            </div>
                            <form name="{{day.name}}Form" ng-submit="addToItemsDay(key,day,'lunch')">
                                <div class=" form-group">
                                    
                                <input type="text" name="" class="form-control" value="" required placeholder="Item Name" ng-model="day.lunchitem.name">
                                
                                </div>
                                

                                <div class="">
                                
                                <input type="submit" name="" class="btn btn-default cool-border" value="add to menu">
                                </div>
                                
                            </form>
                        </div>
                        <div class="col-sm-6 text-left">
                            <label class="small-block-title">Dinner Menu</label>
                            <div class="menu-add-form alert alert-info bg-white" ng-repeat="(index,item) in day.dinnerMenuItems track by $index">
                                <label>{{item}}</label>
                               <a href="" class=" text-theme pull-right" ng-click="deleteEditItems(index,day.dinnerMenuItems)">&times;</a>
                               

                            </div>
                            <form name="{{day.name}}Form" ng-submit="addToItemsDay(key,day,'dinner')">
                                <div class=" form-group">
                                    
                                <input type="text" name="" class="form-control" required value="" placeholder="Item Name" ng-model="day.dinneritem.name">
                                
                                </div>

                                <div class=" ">
                                
                                <input type="submit" name="" class="btn btn-default cool-border" value="add to menu">
                                </div>
                                
                            </form>
                        </div>

                    </section>
                </div>
                </div>
                
              <div class="form-group">
                  <label><strong>Price</strong></label>
                  <input type="text" name="" value="" placeholder="" ng-model="item.price" class="form-control">
              </div>
              <div class="form-group">
                  <label><strong>Minimum person to order</strong></label>
                  <input type="text" name="" value="" placeholder="" ng-model="item.min_order" class="form-control">
              </div>   
                <div class="form-bottom no-bottom text-center">
                    <a href="" class="btn btn-danger cool-shadow" ng-click="editItems(item)">Update</a>
                    <span class="refress mail-spinner" ng-if="item.formUpdating"><i class="fa fa-refresh fa-spin fa-2x fa-fw"></i></span>

                </div>
        </div>
        </div>
    <div class="fu-modal-footer">
        <div class="alert alert-info bg-trans-gray" ng-if="item.message">{{item.message}}</div>
    </div>
    </div>
    
</div>