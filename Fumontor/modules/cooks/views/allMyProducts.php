<link rel="stylesheet" type="text/css" href="assets/css/admin/gridProducts.css">
<div class="row ">
<?php 
    $id=$this->input->get('id');
    $this->load->library('ion_auth');
    $users=$this->ion_auth->user()->row();
    $owner=false;
    if(!empty($id)){
        if(strcmp($id,$users->id)==0){
            $owner=true;
        }
    }else{
        $owner=true;
    }
    foreach($cooks_info as $data){
            $cook=$data;
    }

?>
            <div class="">

           <div class="">
                
               
                <div class="grid-block">
                
                    <?php if(!empty($products)){?>
                    <div class="grid-head ">
                    
                        <a href=""><h2>All Submitted Products</h2></a>
                        

                    </div>
                    <?php }?>
                    <div class="grid-area ">

            <?php

        if($owner){
                        $this->load->view("addNewItemBlock");
                    }

             if(!empty($products)){?>
                     <?php foreach($products as $product){ ?>

                        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-6  grid">
                            <div class="grid-lg">
                                <div class="grid-img">
                                    <a href="singleproduct?id=<?php echo $product['id']?>" class="img-overlay block-link"><i class="fa fa-search"></i></a>
                                    <?php if(!empty($product['feature_img'])){?>
                                    <img src="assets/uploads/<?php echo $user.'/'.$product['id']?>/<?php echo $product['feature_img']?>" title="khichuri" alt="khichuri">
                                    <?php }else{ ?>
                                    <img src="assets/uploads/<?php echo 'default'?>/<?php echo 'thumb.jpg'?>" title="khichuri" alt="khichuri">
                                    <?php }?>
                                    <li class="dropdown grid-option">
                                        <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><i class="   fa fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0)"><i class="fa fa-trash"></i>&nbsp; Delete</a></li>
                                            <li><a href="javascript:void(0)">Make available</a></li>
                                            <li><a href="javascript:void(0)">option3</a></li>
                                        </ul>
                                    </li>
                                </div>
                                <div class="grid-description">
                                    <div class="description-body">
                                        <a href="javascript:void(0)" class="main-url "><h4><?php echo $product['title']?></h4></a>
                                        <label class="secendery-url">by 
                                            <a href="cooks?id=<?php echo $product['cooksID'];?>" class=" small"><?php if(!empty($cook['kitchename'])){
                                            echo $cook['kitchename'];
                                            }elseif(!empty($cook['name'])){
                                                echo $cook['name'];
                                                }else{
                                                    echo 'fumontor kitchen';
                                                    } ?></a>
                                        </label>
                                        <label for="" class="hidden cID"><?php echo $product['cooksID'];?></label>
                                        

                                    </div>
                                    <div class="description-foot">
                                        
                                        <div class="rating-div">
                                            <div class="rating-stars tiny-star">
                                                <div class="current-rating" style="width:69%"></div>
                                            </div>
                                        </div>
                                        <span class="rate">৳ <label class="price"><?php echo $product['price']?></label></span>
                                       
                                    </div>
                                    <div class="cd-customization">
                                        
                                        <div class="quantity">
                                            <button href="#0" class="btn-minus btn btn-danger"><i class="fa fa-minus"></i></button>
                                            <span class="quantity-amount">1</span>
                                            <button href="#0" class="btn-plus btn btn-danger"><i class="fa fa-plus"></i></button>
                                            
                                        </div>
                                        <button  class="add-to-cart btn btn-danger pull-right">
                                            <em><i class="fa fa-shopping-cart"></i></em>
                                            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                                            </svg>
                                        </button>
                                    </div> <!-- .cd-customization -->
                                <div   class="pIDin hidden"><?php echo $product['id'];?></div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    }elseif(!$owner){
                    echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button> No menu Item Added</div>';
                    
                    }?>
                    </div>
                    
                </div>
                
                
           </div>
                
            </div>

        </div>
