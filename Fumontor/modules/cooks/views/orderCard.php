


<?php 

$this->load->model('cooks_model');
$orders=$this->cooks_model->getOrders($cooksId,$orderStatus);
if($orders){
foreach($orders as $order){

?>
            <div class="order-card ">
                            <div class="order-icon"><img class="img-thumbnail img-circle" src="assets/img/avatar.png" alt=""></div>
                            <div class="hidden orderid"><?php echo $order['id'];?></div>
                            <div class="order-label"><span class="order-sender-name"><?php echo $order['username'];?></span><span class="order-sender-locarion"><?php echo  $order['phone'];?></span>
                            <div class="order-type pre-order"><?php echo $order['ordertype'];?></div></div>
                            <div class="order-action">
                            <span class="order-status text-<?php echo $orderStatus;?>"><?php echo $orderStatus;?></span>
                            <a href="javascript:void(0)" title="" class="btn state-btn bg-<?php echo $orderStatus;?> text-white"><i class="fa fa-arrow-right"></i></a></div>
                            <div class="order-details">
                            <ul>
                            <?php 
                        $total=0;
                        $orderDetails=$this->cooks_model->getOrderDetails($order['id']);
                    if(!empty($orderDetails)){?>
                    <li><span class="quantity">Quantity X</span><span class="title">Product Title</span><span class="price">Price/<small>piece</small></span></li>
                    <?php
                        foreach($orderDetails as $orderDetail){
                            ?>
                                <li><span class="quantity"><?php echo $orderDetail['quantity'];?>X</span><span class="product-name"><?php echo $orderDetail['title'];?></span><span class="price"><?php echo $orderDetail['price'];?></span></li>
                            
                            <?php
                            $week=((int)$orderDetail['week']!=0)?(int)$orderDetail['week']:1;
                            $total+=((int)$orderDetail['quantity']*(int)$orderDetail['price']*$week);
                            if($orderDetail['week']!=0){?>
                                <li><span class="total">for <span class="badge"><?php echo $orderDetail['week']?></span> week</span></li>
                            <?php }
                             }?>

                             <li> <span class="total">Total</span><span class="price total"><?php echo $total;?></span></li>
                             <?php 
                            }?>
                            </ul>
                            </div>
                            <span class="down-arrow"></span>
                        </div>

<?php
}
}
    ?>
    <div class="order-card  notfound">
                            
        <div class="order-label"><span class="order-sender-name">No Order !!</span>
        </div>
        <div class="order-action">
        <span class="order-status text-<?php echo $orderStatus;?>"><?php echo $orderStatus;?></span>
        <a href="javascript:void(0)" title="" class="btn dlt-btn bg-pending text-white"><i class="fa fa-trash"></i></a></div>
                            
    </div>

  