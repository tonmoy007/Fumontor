   
   <link rel="stylesheet" type="text/css" href="assets/css/tabs.css" />

<link rel="stylesheet" type="text/css" href="assets/css/ngTimepicker.css">

<link rel="stylesheet" type="text/css" href="assets/css/tabstyles.css" />
<link href="assets/css/profile.css" rel="stylesheet">
<script src="assets/js/essentials/ngTimepicker.min.js"></script>
<script type="text/javascript" src="assets/js/notificationFx.js"></script>

        <?php

            $this->load->library('ion_auth');

            $this->load->model('cooks_model');
            $this->load->model('common');
            $user=$this->ion_auth->user()->row();
            $totalOrders=$this->cooks_model->getTotalOrders($user->id,'unseen');
           
            $cooks=$this->common->getWhere('cooks','user_id',$id);
            foreach ($cooks as $data) {
                $cook=$data;
            }
            $data['user']=$id;
            $data['cooks_info']=$cooks;
            $data['products']=$this->cooks_model->allProducts($id);
  
           if(!empty($orders)){
            $pending['cooksId']= $user->id;
            $pending['orderStatus']='pending';
           }
           if(!empty($accounts)){
            $account['id']=$user->id;
            $account['allDelivered']=$this->cooks_model->getOrders($user->id,'delivered');
           }
           if(!empty($settings)){
            $setting['userInfo']=$this->common->getWhere('users','id',$user->id);
            $setting['cookInfo']=$this->common->getWhere('cooks','user_id',$user->id);
           }
        ?>
    <div class="container content__container">
        
        <div class="content__body">
            <div class="view__container text-theme cool-border">

                <div class="view__header">
                    <h2 class="content__header__text"> <strong><?php
            if(!empty($cook['kitchename'])){
                echo $cook['kitchename'];
            }else{
                echo 'Fumontor Kitchen';
            }

            ?></strong><small><?php if(!empty($cook['kitchen_sub_title'])) echo $cook['kitchen_sub_title']?></small></h2>
            <h4 class="content__header__text__sub text-muted"><em>by</em> <?php if(!empty($cook['name'])){
                echo $cook['name'];
                }else{
                    echo 'unknown';
                    }?></h4>
                    <div class="clearfix"></div>
                </div>
             <div class="view__body">
                    <div class="tabs tabs-style-topline view__tab">
                    <nav>
                        <ul class=" ">
                            <li href="" title="" class="<?php 
                            if(!empty($menu)){
                                echo 'tab-current';
                            }

                            ?>"><a href="cooks" title="" class=""><i class="fa fa-cutlery"></i><span>Menu</span> </a></li>
                            <li href="" title="" class="<?php 
                            if(!empty($orders)){
                                echo 'tab-current';
                            }

                            ?> "><a href="cooks/orders" title=""><i class="fa fa-briefcase"></i><span>Manage Orders</span> </a>
                            
                            <span class="badge bg-unseen <?php if($totalOrders==0) echo 'hidden';?>"><?php 
                            
                            echo $totalOrders;?></span>
                           
                            </li>
                            <li href="" title="" class="<?php 
                            if(!empty($accounts)){
                                echo 'tab-current';
                            }

                            ?>"><a href="cooks/accounts" title="" ><i class="fa fa-money"></i><span>Manage Accounts</span></a></li>
                            <li href="" title="" class="<?php 
                            if(!empty($settings)){
                                echo 'tab-current';
                            }

                            ?> "><a href="cooks/settings" title="" class=" "><i class="fa fa-cog"></i><span>Settings</span> </a></li>
                            </ul>
                    </nav>
                    <div class="content-wrap">
                        <section id="addMenu" class="<?php 
                            if(!empty($menu)){
                                echo 'content-current';
                            }

                            ?>"><?php
                            if(!empty($menu)){
                              $this->load->view('allMyProducts',$data);  
                            }
                             ?></section>
                        <section id="manageOrders" class="<?php 
                            if(!empty($orders)){
                                echo 'content-current';
                            }

                            ?>"><?php
                            if(!empty($orders)){
                              $this->load->view('OrderManage',$pending);  
                            }
                             ?></section>
                        <section id="manageAccounts" class="<?php 
                            if(!empty($accounts)){
                                echo 'content-current';
                            }

                            ?>"><?php
                            if(!empty($accounts)){
                              $this->load->view('AccountsManager',$account);  
                            }
                             ?></section>
                        <section id="settings" class="<?php 
                            if(!empty($settings)){
                                echo 'content-current';
                            }

                            ?>">

                            <?php if(!empty($settings)){
                                $this->load->view('settings',$setting);
                                };?>
                            </section>
                    </div><!-- /content -->
                </div>
               

                
             </div>
            <div class="slider cool-border " style="padding: 40px; margin: 20px">
                <ul id="lightSlider" class="view__slider">
                    <li><a href="javascript:void(0)" title=""><img src="assets/img/f6.jpg" alt=""></a></li>
                    <li><a href="javascript:void(0)" title=""><img src="assets/img/f6.jpg" alt=""></a></li>
                    <li><a href="javascript:void(0)" title=""><img src="assets/img/f6.jpg" alt=""></a></li>
                    <li><a href="javascript:void(0)" title=""><img src="assets/img/f6.jpg" alt=""></a></li>
                    <li><a href="javascript:void(0)" title=""><img src="assets/img/f6.jpg" alt=""></a></li>
                    <li><a href="javascript:void(0)" title=""><img src="assets/img/f6.jpg" alt=""></a></li>
                    <li><a href="javascript:void(0)" title=""><img src="assets/img/f6.jpg" alt=""></a></li>
                    <li><a href="javascript:void(0)" title=""><img src="assets/img/f6.jpg" alt=""></a></li>
                </ul>
            </div>
            </div>
        </div>
    </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->

<script type="text/javascript" src="assets/js/orderNotification.js"></script>
