<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/oredermanage.css">
<link rel="stylesheet" type="text/css" href="assets/css/tooltip-bloated.css">
<?php 
    $this->load->model('cooks_model');
    $tPending=$this->cooks_model->getTotalOrders($cooksId,'pending');
    $trecived=$this->cooks_model->getTotalOrders($cooksId,'recived');
    $tonDelivery=$this->cooks_model->getTotalOrders($cooksId,'ondelivery');
    $tdelivered=$this->cooks_model->getTotalOrders($cooksId,'delivered');
    $pending['cooksId']=$cooksId;
    $pending['orderStaus']='pending';
    $recived['cooksId']=$cooksId;
    $recived['orderStatus']='recived';
    $onDelivery['cooksId']=$cooksId;
    $onDelivery['orderStatus']='ondelivery';
    $deliverd['cooksId']=$cooksId;
    $deliverd['orderStatus']='delivered';

?>
<div class="component-container">
    <div class="horizontal-card">
        <div class="card-title"><i class="fa fa-pie-chart"></i> Order Summery</div>
        <div  class="card-body" >
            <ul class="card-column total">
                <li class="card-column-list-item "><label for="">Total Order Pending</label><span class="badge bg-pending"><?php echo $tPending;?></span>
                </li>
                <li class="card-column-list-item"><label for="">Total Order Recived</label><span class="badge bg-recived"><?php echo $trecived;?></span>
                </li>
                <li class="card-column-list-item"><label for="">Total Order On Delivery</label><span class="badge bg-ondelivery"><?php echo $tonDelivery;?></span>
                </li>
                <li class="card-column-list-item"><label for="">Total Order Delivered</label><span class="badge bg-delivered"><?php echo $tdelivered;?></span>
                </li>
            </ul>

            
        </div>
        <div class="card-foot"></div>
    </div>
    <div class="horizontal-card">
        <div class="card-title"><i class="fa fa-bar-chart-o"></i> Order States</div>
        <div class="card-body">
            <div class=" card-half">
                <ul class="card-column">
                <li class="card-column-list-item">
                    <div class="card-column-list-item-head"><span class="pending"></span><strong>Pending Orders</strong></div>
                    <div id="pendingOrders" class="card-column-list-item-body">
                      <?php $this->load->view('orderCard',$pending);?>   
                    </div>
                    <div class="card-column-list-item-foot"> </div>
                </li>
            </ul>

            <ul class="card-column">
                <li class="card-column-list-item">
                    <div class="card-column-list-item-head"><span class="recived"></span><strong>Recived Orders</strong></div>
                    <div id="recivedOrders"  class="card-column-list-item-body">
                       <?php $this->load->view('orderCard',$recived);?>  
                    </div>
                    <div class="card-column-list-item-foot"> </div>
                </li>
            </ul>

            </div>
            <div class=" card-half">
                <ul class="card-column">
                <li class="card-column-list-item">
                    <div class="card-column-list-item-head"><span class="ondelivery"></span><strong>Orders On Delivery</strong></div>
                    <div id="ondeliveryOrders"  class="card-column-list-item-body">
                      <?php $this->load->view('orderCard',$onDelivery);?>   
                    </div>
                    <div class="card-column-list-item-foot"> </div>
                </li>
            </ul>
            <ul class="card-column">
                <li class="card-column-list-item">
                    <div class="card-column-list-item-head"><span class="delivered"></span><strong>Delivered Orders</strong></div>
                    <div id="deliveredOrders"  class="card-column-list-item-body">
                      <?php $this->load->view('orderCard',$deliverd);?>   
                    </div>
                    <div class="card-column-list-item-foot"> </div>
                </li>
            </ul>
            </div>
        </div>
        <div class="card-foot"></div>
    </div>
</div>

<script type="text/javascript" src="assets/js/orderManager.js"></script>                          
