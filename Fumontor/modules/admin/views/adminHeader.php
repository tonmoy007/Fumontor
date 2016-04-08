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

    </head>
<body>
    <header class="cd-main-header">
        <a href="#0" class="cd-logo"><img src="assets/img/fu-logo.png"></a>
        
        <div class="cd-search is-hidden">
            <form action="#0">
                <input type="search" placeholder="Search...">
            </form>
        </div> <!-- cd-search -->

        <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

        <nav class="cd-nav">
            <ul class="cd-top-nav">
                
                <li><a href="#0">Support</a></li>
                <li class="has-children account">
                    <a href="#0">
                        <img src="assets/img/cd-avatar.png" alt="avatar">
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
        $ViewAllCook="";
        if($cont=="cooks"){
            if($view=="all"){
                $Cooks=$s;
                $viewAllCook=$s;
            }elseif($view=="add"){
                $Cooks=$s;
                $AddCook=$s;
            }
        }
?>
    <main class="cd-main-content">
        <nav class="cd-side-nav">
            <ul>

                <li class="cd-label">Main</li>
                <li class="has-children overview <?php echo $Cooks?>">
                    <a href="#0">Cooks</a>
                    
                    <ul>
                        <li class="<?php echo $viewAllCook;?>"><a href="#0">View All</a></li>
                        <li class="<?php echo $AddCook;?>"><a href="#0">Add New Cook</a></li>
                        <li><a href="#0"></a></li>
                    </ul>
                </li>
                <li class="has-children notifications ">
                    <a href="#0">Orders <span class="badge"></span></a>
                    
                    <ul>
                        <li><a href="#0">All Notifications</a></li>
                        <li><a href="#0">Friends</a></li>
                        <li><a href="#0">Other</a></li>
                    </ul>
                </li>

                <li class="has-children comments ">
                    <a href="#0">Comments</a>
                    
                    <ul>
                        <li><a href="#0">All Comments</a></li>
                        <li><a href="#0">Edit Comment</a></li>
                        <li><a href="#0">Delete Comment</a></li>
                    </ul>
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

        
