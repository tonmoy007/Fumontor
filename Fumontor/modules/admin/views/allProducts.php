
<!-- Resource style -->
<link rel="stylesheet" type="text/css" href="assets/css/ns-style-attached.css">
<link rel="stylesheet" type="text/css" href="assets/css/ns-default.css">
<script src="assets/js/admin/dirPagination.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/2.3.0/ng-tags-input.js"></script>
<link rel="stylesheet" href="assets/css/fu-modal.css">
<link rel="stylesheet" type="text/css" href="assets/css/allTable.css">
<link rel=stylesheet href="https://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/2.3.0/ng-tags-input.min.css">

<script src="assets/js/admin/admin-allProducts.js"></script>


 <div class="content-wrapper">
    <div class="" ng-app="allProductsApp" >
        <div class="data-list" ng-controller="adminAllProductCtrl as allCook">
        <fu-notification></fu-notification>
        <h2 class="text-center text-theme">All Products Details</h2>
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
                    <th><a href="" ng-click="sortField='title'; reverse=!reverse">Title<span class="glyphicon sort-icon" ng-show="sortField=='title'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='catagoryList'; reverse=!reverse">Catagories<span class="glyphicon sort-icon" ng-show="sortField=='catagoryList'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th ><a href="" ng-click="sortField='description'; reverse=!reverse">Description<span class="glyphicon sort-icon" ng-show="sortField=='description'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='feature_img'; reverse=!reverse">Feature Image<span class="glyphicon sort-icon" ng-show="sortField=='feature_img'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='price'; reverse=!reverse">Price<span class="glyphicon sort-icon" ng-show="sortField=='price'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='cusines'; reverse=!reverse">Cusine<span class="glyphicon sort-icon" ng-show="sortField=='cusines'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th><a href="" ng-click="sortField='todays_menu'; reverse=!reverse">Todays menu?<span class="glyphicon sort-icon" ng-show="sortField=='todays_menu'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></a></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-body">
                
           
        
                
                <tr  class="animate-table" dir-paginate="(key,item) in products | filter:search |itemsPerPage:5 |orderBy:sortField:reverse">
                <td>{{item.id}}</td>
                <td>{{item.title}}</td>
                <td><catagories></catagories></td>
                <td>{{item.description}}</td>
                <td><img ng-show="item.feature_img" class="img-responsive" ng-src="assets/uploads/{{item.cooksID}}/{{item.id}}/{{item.feature_img}}" alt="Feature Image">
                <img ng-show="!item.feature_img" class="img-responsive" src="assets/uploads/default/thumb.jpg" alt="Feature Image"></td>
                <td>
                    BDT-{{item.price}}৳
                </td>
                <td>
                    {{item.cusines}}
                </td>
                <td> <label class="label label-pill label-danger" ng-show="item.todays_menu">Cooking today</label> <label ng-show="!item.todays_menu" class="label label-pill label-warning"> Pre Order</label> </td>
                <td class="action">
                    <a href="" ng-click="fetchEditPanel(item.id)"
                     class="btn btn-danger btn-embossed"><i class="fa fa-pencil">
                     </i></a>
                     <product-edit-form></product-edit-form>
                    <a href=""
                    class="btn btn-danger btn-embossed"><i class="fa fa-times" ng-click="deleteProduct(item.id)">
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

