    <?php $user = $this->ion_auth->user()->row(); ?>

    <li>
        <label class="label-user"><?php echo $user->username; ?></label> 
       
    </li>

    <li class="dropdown">
        <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><span>Menu </span>&nbsp;<i class="mdi-navigation-apps"></i> </a>
        <ul class="dropdown-menu">
            <li><a href="javascript:void(0)">Action</a></li>
            <li><a href="javascript:void(0)">Another action</a></li>
            <li><a href="javascript:void(0)">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="javascript:void(0)">Separated link</a></li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><span>My Shop</span>&nbsp;<i class="mdi-action-face-unlock"></i> </a>
        <ul class="dropdown-menu">
            <li><a href="index.php/cooks/addMenuItem"><i class="fa fa-plus"></i>&nbsp; New menu item</a></li>
            <li><a href="index.php/cooks/allProducts?userid=<?php echo $user->id;?>"><i class="fa fa-cutlery"></i>&nbsp; My Items</a></li>
            <li><a href="javascript:void(0)">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="index.php/auth/logout"><i class="fa fa-sign-out"></i>&nbsp;logout</a></li>
        </ul>
    </li>
    