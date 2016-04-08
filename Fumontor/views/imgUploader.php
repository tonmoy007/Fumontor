            
<script src="assets/js/dropzone.js"></script>
<link rel="stylesheet" href="assets/css/dropzone.css">

 <link href="assets/css/profile.css" rel="stylesheet">
 <link href="assets/css/imageUploader.css" rel="stylesheet">
<script type="text/javascript" src="assets/js/fumontor.js"></script>
    
<div class="content-wrapper">
        <div class="content__header cool-border text-theme">
            <h2 class="content__header__text"><strong>Fumontor</strong></h2>
            <h4 class="content__header__text__sub text-muted">Your food bussiness manager</h4>
        </div>
        <div class="content__body">
            <div class="view__container text-theme cool-border">
                <h3 class="view__header">Upload a Feature image of <?php 
        if(isset($ProductName)){
          echo $ProductName." !!";
        }else{
          echo " the Item !!";
        }
        ?></h3>
                
                <div class="row view__body">
        

                  <div id="infoMessage" class="submit-info  text-success">
                  <?php if (isset($message)) {
                      echo $message;
                  } ?></div>
            <div class="alert alert-info text-center" id="statusBox">
                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button>
                    <div class="" id="status"></div>
                
            </div>
            <?php echo form_open("upload/upload_img?productId=".$productId."&mode=0",array('class'=>'dropzone','id'=>'myDropzone'));?>
              <div class="fallback">
                <input name="file" type="file"  />
              </div>

            <?php echo form_close();?>
            <button class="btn btn-info pull-right" id="cancel"> Cancel </button>
            <button class="btn btn-info pull-right" id="upload"> Upload </button>
            
            <input type="hidden" id="baseUrl" value="<?php echo site_url();?>">
            <input type="hidden" id="productId" value="<?php echo $productId;?>">
            <input type="hidden" id="mode" value="<?php echo $mode;?>">
            
        </div>
    </div>


        </div>
    </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->