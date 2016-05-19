<?php 
$user=$this->ion_auth->user()->row();
$data['userId']=$user->id;

?>
<link rel="stylesheet" href="assets/css/additem.css">

<div class="col-md-3 col-lg-3 col-sm-4 col-xs-6  grid">
    <div class="grid-lg">
        <div class="additem-block">
        <a href="#0" title="add new item" class="fu-modal-trigger" modal-id="#addNewItem">
        <i class="fa fa-plus"></i>
        <strong>add new item</strong>
        </a>            
        </div>
    </div>
</div>

<link rel="stylesheet" href="assets/css/fu-modal.css">
<div id="addNewItem" class="fu-modal">
<div class="overlay"></div>
<div id="fu-loader"><i class="fa fa-spinner fa-pulse"></i></div>
    <div class="fu-modal-container">
    <a href="#0" title="" class="fu-modal-close">Close</a>
        <div class="fu-modal-header">
            <h2 class="modal-header">Add New Menu Item</h2>
        </div>
        <div class="fu-modal-body">
            <div class="modal-form-container">
            <?php $this->load->view('addMenu',$data)?>
            </div>
        </div>
        <div class="home-signup-modal-footer"></div>
    </div>
</div>
<script type="text/javascript" src="assets/js/fu-modal.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.fu-modal-trigger').fumodal();
    });
</script>