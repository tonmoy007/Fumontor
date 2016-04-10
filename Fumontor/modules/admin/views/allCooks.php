
<!-- Resource style -->
        <link rel="stylesheet" type="text/css" href="assets/css/ns-style-attached.css">
        <link rel="stylesheet" type="text/css" href="assets/css/ns-default.css">
<script src="assets/js/admin/dirPagination.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/2.3.0/ng-tags-input.js"></script>
<link rel="stylesheet" href="assets/css/fu-modal.css">
<link rel="stylesheet" type="text/css" href="assets/css/allTable.css">
<link rel=stylesheet href="https://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/2.3.0/ng-tags-input.min.css">
<script src="assets/js/admin-allCooks.js"></script>




 <div class="content-wrapper">
    <div class="" ng-app="allCookApp" >
        <div class="data-list" ng-controller="adminAllCookCtrl as allCook">
        <fu-notification></fu-notification>
        <h2 class="text-center text-theme">All Cooks Details</h2>
        <loading></loading>
        

       <div class="table-content {{visible}}">

       <div class="form-group">
            <div class="input-group">
                <input type="text" name="search" ng-model="search" value="" placeholder="Search in Table" class="form-control">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
            </div>
        </div>

            <table id="cooks-table"  class=" display table table-striped table-bordered "  >

            <thead class="cool-border">
                <tr class="cool-border">
                    <th><a href="" ng-click="sortField='id'; reverse=!reverse">ID<span class="glyphicon sort-icon" ng-show="sortField=='id'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='name'; reverse=!reverse">Name<span class="glyphicon sort-icon" ng-show="sortField=='name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='kitchename'; reverse=!reverse">Kitchen Name<span class="glyphicon sort-icon" ng-show="sortField=='kitchename'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='address'; reverse=!reverse">Address<span class="glyphicon sort-icon" ng-show="sortField=='address'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='location'; reverse=!reverse">Location<span class="glyphicon sort-icon" ng-show="sortField=='location'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='service_areas'; reverse=!reverse">Service Zones<span class="glyphicon sort-icon" ng-show="sortField=='service_areas'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='pickupValue'; reverse=!reverse">Delivery Method<span class="glyphicon sort-icon" ng-show="sortField=='pickupValue'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='delivery_charge'; reverse=!reverse">Delivery Charge<span class="glyphicon sort-icon" ng-show="sortField=='delivery_charge'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-body">
                
           
        
                
                <tr  class="animate-table" dir-paginate="(key,cook) in cooks | filter:search |itemsPerPage:5 |orderBy:sortField:reverse">
                <td>{{cook.id}}</td>
                <td>{{cook.name}}</td>
                <td>{{cook.kitchename}}</td>
                <td>{{cook.address}}</td>
                <td>{{cook.location}}</td>
                <td>
                    <service-zone></service-zone>
                </td>
                <td>
                    <delivery-options></delivery-options>
                </td>
                <td> ৳ {{cook.delivery_charge}}</td>
                <td class="action">
                    <a href="" ng-click="fetchEditPanel(cook)"
                     class="btn btn-danger btn-embossed"><i class="fa fa-pencil">
                     </i></a>
                     <cook-edit-form></cook-edit-form>
                    <a href=""
                    class="btn btn-danger btn-embossed"><i class="fa fa-times" ng-click="deleteCook(cook.id,cook.user_id)">
                    </i></a>
                
       
            </tbody>

        </table>
        <div class="table-page-info">
           
        </div>

        <!-- Paginations -->
            <dir-pagination-controls
               max-size="5"
               direction-links="true"
               boundary-links="true" template-url="admin/getTemplate/pagination-controls" >
            </dir-pagination-controls>   
       </div>
    </div> 
    </div>      
</div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->

