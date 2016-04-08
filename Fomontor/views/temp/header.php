<!DOCTYPE html>
<html lang="en" >
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Fumontor</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="Md Saddam Hossain"/>
        
        <!--Base tag start-->
        <base href="<?php echo $this->config->base_url(); ?>">
        <!--Base tag end-->
        
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/material.min.css" rel="stylesheet">
        <link href="assets/css/roboto.min.css" rel="stylesheet">
        <link href="assets/css/confirm.css" rel="stylesheet">
        <link href="assets/css/ripples.min.css" rel="stylesheet">
        <link href="assets/css/cart.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">

        <script src="assets/js/jquery.js"></script>

    </head>
    <!-- END HEAD -->
    
    <!-- BEGIN BODY -->
    <body class="">
        <!-- BEGIN HEADER -->

        <!-- Progress Bar Begin -->
        <div class="progress fullwidth main-progress">
            <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
        </div>
        <!-- Progress Bar End -->
        <!-- Logo Header -->
         
                      
                        
        <div class=" fullwidth">
        <div class="bs-component">
            <div class="navbar navbar-default static-nav">
                <div class="navbar-header logo">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">Fumontor</a>
                  <!--   <label class="smallsc">
                    <?php 
                     $this->load->library('ion_auth');
                      
                         if ($this->ion_auth->logged_in())
                            {
                                 $user = $this->ion_auth->user()->row(); 
                                 echo $user->username;
                                
                            }else{
                                
                            }?>
                    </label> -->
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                   
                    <form class="navbar-form navbar-left">
                        <div class="input-group form-group-lg search">
                            <input type="search" class="form-control " placeholder="Hungry ? Search your favourit food here!!" >
                            <span class="input-group-btn">
                            <button class="btn btn-info btn-raised" type="button" type="submit">
                            <i class="mdi-action-search"></i>
                            </button>
                            </span>
                        </div>
                    </form>

                    <ul id="right-nav" class="nav navbar-nav navbar-right">
                        

                       <?php
                        
                      
                         if ($this->ion_auth->logged_in())
                            {
                                 echo '<input type="hidden" id="userID" value="true" data-di="'.$user->id.'">';
                                $this->view('temp/loggedIn');
                            }
                        else{
                            $this->view('temp/withoutLogin');
                            echo '<input type="hidden" id="userID" value="false">';
                        }
                      
                        
                       ?>
                       
                    </ul>

                </div>
            </div>
        </div>

        <!-- Fixed Navbar -->
        <div id="scrollFixNav" class="full-width scrol-fix-nav ">
            <div class="sidebar-header navbar-left">
                <a href=""  title="dashboard">Sidebar Header</a>
            </div>
            <div class="sidebar bs-component">
                <ul class="sidebar-list-group horizontal">
                    <li><a href="javascript:void(0)"  title="home"><i class="fa fa-home"></i> <span>&nbsp;&nbsp; Home</span></a></li>
                    <li><a href="javascript:void(0)" title="Profile"><i class="fa fa-user-md"></i> <span>&nbsp;&nbsp; Profile</span></a></li>
                    <li><a href="javascript:void(0)" title="Products"><i class="fa fa-shopping-cart"></i> <span>&nbsp;&nbsp; Products</span></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-send"></i> <span>&nbsp;&nbsp; Sidebar</span></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-camera"></i> <span>&nbsp;&nbsp; Sidebar</span></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-gear"></i> <span>&nbsp;&nbsp; Settings</span></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav ">
                <li class="dropdown">
                    <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Catagories <i class="mdi-hardware-keyboard-arrow-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)">Action</a></li>
                        <li><a href="javascript:void(0)">Another action</a></li>
                        <li><a href="javascript:void(0)">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)">Separated link</a></li>
                    </ul>
                </li>
                
            </ul>
           <?php  if ($this->ion_auth->logged_in())
                            {
                                $this->load->model('common');
                                $cartItem=$this->common->getWhere('cart','user_id',$user->id);
                                $data['cartItem']=$cartItem;
                                $itemNo=count($cartItem);
                                $this->view('cart',$data);
                                ?>
                                <a href="#" id="cart-button" class="cd-cart <?php if ($itemNo>0) echo 'items-added';?>" data-target="#" class="dropdown-toggle " data-toggle="dropdown"><span>

                                <?php echo $itemNo; ?></span></a>
                            <?php }
                            ?>
                    
                    
                
            
        </div>
