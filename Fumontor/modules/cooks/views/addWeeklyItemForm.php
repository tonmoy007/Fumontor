<div class="add-weekly-item-form text-left">
        <div class="form-group">
            <label><strong>Title</strong></label>
            <input type="text" name="" value="" placeholder="" autofocus="true" class="form-control" ng-model="menu.title">
        </div>
        <label class=""><strong>Create Menu</strong> <small>add items for each day and each meal time</small></label>
        <div class="tabs tabs-style-topline view__tab cool-border">
        <nav>
            <ul>
                <li ng-class="{'tab-current':day.visible}" ng-repeat="(key,day) in days"><a href="" title="" ng-click="setVisible(key,days)" >{{day.name}}</a></li>
            </ul>
        </nav>
        <div class="content-wrap ">
            <section class="" ng-repeat="(key,day) in days" ng-class="{'content-current':day.visible}"> 
                <div class="col-sm-6 text-left">
                    <label class="small-block-title">Lunch Menu</label>
                    <div class="menu-add-form alert alert-info bg-white" ng-repeat="(index,item) in day.lunchMenuItems track by $index">
                        <label class="control-label">{{item.name}}</label>
                        <a href="" class=" text-theme pull-right" ng-click="deleteWeeklyItem(key,index,'lunchMenuItems')">&times;</a>
                       

                    </div>
                    <form name="{{day.name}}Form" ng-submit="addToDay(key,day.lunchitem,'lunch')">
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
                        <label>{{item.name}}</label>
                       <a href="" class=" text-theme pull-right" ng-click="deleteWeeklyItem(key,index,'dinnerMenuItems')">&times;</a>
                       

                    </div>
                    <form name="{{day.name}}Form" ng-submit="addToDay(key,day.dinneritem,'dinner')">
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
          <input type="text" name="" value="" placeholder="" ng-model="menu.price" class="form-control">
      </div>
      <div class="form-group">
          <label><strong>Minimum person to order</strong></label>
          <input type="text" name="" value="" placeholder="" ng-model="menu.min" class="form-control">
      </div>   
        <div class="form-bottom no-bottom text-center">
            <a href="" class="btn btn-danger cool-shadow" ng-click="submitWeeklyForm(days,menu.price,menu.title,menu.min)">Publish</a>
            <span class="refress mail-spinner" ng-if="formSubmitting"><i class="fa fa-refresh fa-spin fa-2x fa-fw"></i></span>
        </div>
</div>