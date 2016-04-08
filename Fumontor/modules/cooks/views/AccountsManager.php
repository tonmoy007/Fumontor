<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/oredermanage.css">
<link rel="stylesheet" type="text/css" href="assets/css/tooltip-bloated.css">


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


<?php 
    $this->load->model('cooks_model');
    $tdelivered=$this->cooks_model->getTotalOrders($id,'delivered');
    $tdue=$this->cooks_model->getTotalDue($id);
    $tpaid=$this->cooks_model->getTotalPaid($id);

    ?>
<div class="component-container">
    <div class="horizontal-card">
        <div class="card-title"><i class="fa fa-pie-chart"></i> Account Summery</div>
        <div class="card-body">
            <ul class="card-column total">
                <li class="card-column-list-item "><label for="">Total Delivered Order </label><span class="badge bg-delivered"><?php echo $tdelivered;?></span>
                </li>
                <li class="card-column-list-item"><label for="">Total Due</label><span class="badge bg-due"><?php echo $tdue;?></span>
                </li>
                <li class="card-column-list-item"><label for="">Total Paid</label><span class="badge bg-paid"><?php echo $tpaid;?></span>
                </li>
                
            </ul>
             
            
        </div>
        <div class="card-foot"></div>
    </div>
    <div class="horizontal-card">
        <div class="card-title"> <i class="fa fa-star"></i> Order Account Status</div>
        <div class="card-body">
                   <table id="cooks-table" class=" display table table-striped table-bordered "  cellspacing="0" width="100%" data-page-length="10" data-order="[[ 1, &quot;asc&quot; ]]">
            <thead class="cool-border">
                <tr class="cool-border">
                    <th>Delivered Order Id</th>
                    <th>Due</th>
                    <th>Paid</th>
                    
                </tr>
            </thead>
            <tbody class="table-body">
                
           
    
                <?php
                foreach ($allDelivered as $data) {?>
                <tr>
                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['paid'];?></td>
                <td><?php echo $data['due'];?></td>
                
                </tr>
                <?php } ?>
            </tbody>

        </table>
        </div>
        <div class="card-foot"></div>
    </div>
    </div>