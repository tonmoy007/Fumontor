<!DOCTYPE html>
<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="Md Saddam Hossain"/>
        <meta name="author" content="Fumontor" />
        
        <!--Base tag start-->
        <base href="<?php echo $this->config->base_url(); ?>">
        <!--Base tag end-->
        <link rel="shortcut icon" href="assets/img/favicon.png"> 
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/flat-ui.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/roboto.min.css">
        <link href="assets/css/home.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="assets/css/admin.css"> 
        <!-- Resource style -->
        
        <script src="assets/js/home/jquery-2.1.1.js"></script>
        <script src="assets/js/modernizr.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/bootstrap/js/google-code-prettify/prettify.js"></script>
         <script src="assets/js/home/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="assets/js/home/jquery.ui.touch-punch.min.js"></script>
        <script src="assets/js/home/bootstrap-select.js"></script>
        <script src="assets/js/home/bootstrap-switch.js"></script>
        
        <script src="assets/js/home/flatui-radio.js"></script>
        <script type="text/javascript" src="assets/js/notificationFx.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.3/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.3/angular-animate.js"></script>
        <script src="assets/js/fileUpload/ng-file-upload.min.js"></script>
        <script src="assets/js/fileUpload/ng-file-upload-shim.min.js"></script>
        <script src="assets/js/home/flatui-checkbox.js"></script>
    </head>
        
    </head>
<body>
    <header class="cd-main-header">
        <a href="#/" class="cd-logo"><img class="img-responsive" src="assets/img/home-logo-black.png"></a>
        

        <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

        <nav class="cd-nav">
            <ul class="cd-top-nav">
                
                <li><a href="#0">Support</a></li>
                <li class="has-children account">
                    <a href="#0">
                        <img src="assets/img/avatar.png" alt="avatar">
                        <?php 
                            echo $user;
                         ?>
                    </a>

                    <ul>

                        <li><a href="#0">My Account</a></li>
                        <li><a href="#0">Edit Account</a></li>
                        <li><a href="index.php/auth/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header> <!-- .cd-main-header -->
<?php
$cont = "";
        $cont = $this->router->fetch_class();
        $view = "";
        $view = $this->router->fetch_method();
        $s = "start";
        $a = "active";
        $o = "open";
        $Cooks="";
        $AddCook="";
        $AllCooks="";
        $orders='';
        $allOrders='';
        $pendingOrders='';
        $recivedOrders='';
        $ondeliveryOrders='';
        $deliveredOrders='';
        $Accounts='';
        $allProducts='';
        if($cont=="admin"){
            if($view=="allCooks"){
                $Cooks=$a;
                $AllCooks=$a;
            }elseif($view=="add"){
                $Cooks=$a;
                $AddCook=$a;
            }elseif($view=='allOrders'){
                $allOrders=$a;
                $orders=$a;
            }elseif ($view=='pendingOrders') {
                $pendingOrders=$a;
                $orders=$a;
            }elseif ($view=='recivedOrders') {
                $recivedOrders=$a;
                $orders=$a;
            }elseif ($view=='ondeliveryOrders') {
                $ondeliveryOrders=$a;
                $orders=$a;
            }elseif ($view=='deliverdOrders') {
                $deliveredOrders=$a;
                $orders=$a;
            }elseif($view=='cookAccounts'){
                $Accounts=$a;
            }elseif($view=='allProducts'){
                $allProducts=$a;
            }
        }
?>
    <main class="cd-main-content">
        <nav class="cd-side-nav">
            <ul>

                <li class="cd-label">Main</li>
                <li class="has-children overview <?php echo $Cooks?>">
                    <a href="javascript:void(0)">Cooks</a>
                    
                    <ul>
                        <li class="<?php echo $AllCooks;?>"><a href="admin/allCooks"><i class="fa fa-group"></i>&nbsp; View All</a></li>
                        <li class="<?php echo $AddCook;?>"><a href="#0"> <i class="fa fa-plus-circle"></i>&nbsp; Add New Cook</a></li>
                        <li><a href="#0"></a></li>
                    </ul>
                </li>
                <li class="has-children notifications <?php echo $orders;?> ">
                    <a href="admin/allOrders">Orders<span class="count"><?php echo $totalOrders?></span></a>
                    
                    <ul>
                        <li class="<?php echo $allOrders;?>"><a href="admin/allOrders">All Orders</a></li>
                        <li class="<?php echo $pendingOrders;?>"><a href="#0">Pending Orders</a></li>
                        <li class="<?php echo $recivedOrders;?>"><a href="#0">Recived Orders</a></li>
                        <li class="<?php echo $ondeliveryOrders;?>"><a href="#0">On Delivery Orders</a></li>
                        <li class="<?php echo $deliveredOrders;?>"><a href="#0">Delivered Orders</a></li>
                    </ul>
                </li>

                <li class="comments <?php echo $Accounts;?> ">
                    <a href="admin/cookAccounts">Cook Accounts</a>
                    
                    
                </li>
                <li class="<?php echo $allProducts;?> ">
                    <a href="admin/allProducts">All Products</a>
                    
                    
                </li>
            </ul>

            <ul>
                <li class="cd-label">Secondary</li>
                <li class="has-children bookmarks">
                    <a href="#0">Bookmarks</a>
                    
                    <ul>
                        <li><a href="#0">All Bookmarks</a></li>
                        <li><a href="#0">Edit Bookmark</a></li>
                        <li><a href="#0">Import Bookmark</a></li>
                    </ul>
                </li>
                <li class="has-children images">
                    <a href="#0">Images</a>
                    
                    <ul>
                        <li><a href="#0">All Images</a></li>
                        <li><a href="#0">Edit Image</a></li>
                    </ul>
                </li>

                <li class="has-children users">
                    <a href="#0">Users</a>
                    
                    <ul>
                        <li><a href="#0">All Users</a></li>
                        <li><a href="#0">Edit User</a></li>
                        <li><a href="#0">Add User</a></li>
                    </ul>
                </li>
            </ul>

            <ul>
                <li class="cd-label">Action</li>
                <li class="action-btn"><a href="#0" class="btn btn-danger btn-embossed">+ Button</a></li>
            </ul>
        </nav>

        
