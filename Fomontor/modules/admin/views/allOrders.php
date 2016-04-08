
<link rel="stylesheet" type="text/css" href="assets/css/admin/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/admin/scroller.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/admin/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/admin/dataTables.tableTools.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/allTable.css">
<script type="text/javascript" src="assets/js/admin/select2.min.js"></script>
<script src="assets/js/admin/jquery.dataTables.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="assets/js/admin/dataTables.tableTools.min.js"></script>
<script src="assets/js/admin/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="assets/js/admin/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<?php $this->load->model('adminmodel');?>
<div class="content-wrapper">
          <div class="">
        <div class="data-list">
        <h2 class="text-center text-theme">All Order Details</h2>
        

        <table id="cooks-table" class=" display table table-striped table-bordered "  cellspacing="0" width="100%" data-page-length="10" data-order="[[ 1, &quot;asc&quot; ]]">
            <thead class="cool-border">
                <tr class="cool-border">
                    <th>Order Id</th>
                    <th>Cooks Name</th>
                    <th>Address</th>
                    <th>Location</th>
                    <th>Order Status</th>
                    <th>Order Type</th>
                    <th>Customer Name</th>
                    <th>Customer Phone</th>
                </tr>
            </thead>
            <tbody class="table-body">
                
           
    
                <?php
                foreach ($AllOrders as $data) {
                    $cooksData=$this->adminmodel->getCooksDetails($data['cooksid']);

                    ?>
                <tr>
                <td><?php echo $data['id'];?></td>
                <td><?php echo $cooksData['name'];?></td>
                <td><?php echo $cooksData['address'];?></td>
                <td><?php echo $cooksData['location'];?></td>
                <td><?php echo $data['orderstatus'];?></td>
                <td><?php echo $data['ordertype'];?></td>
                <td><?php echo $data['first_name'].' '.$data['last_name'];?></td>
                <td><?php echo $data['phone'];?></td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div> 
    </div>        
        </div> <!-- .content-wrapper -->
    </main> <!-- .cd-main-content -->