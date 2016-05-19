<script src="assets/js/dropzone.js"></script>
<link rel="stylesheet" href="assets/css/dropzone.css">

<link rel="stylesheet" type="text/css" href="assets/css/addMenu.css">

<script type="text/javascript" src="assets/js/fumontor.js"></script>
    
    <div class="row main-component">
        <div class="content-area">
                
    <div class="form-container">
        <div class="inner-form">
        <h3 class="sub-heading text-center">Upload Photos to add to Product Img Slider</h3>

                  <div id="infoMessage" class="submit-info">
                  <?php if (isset($message)) {
                      echo $message;
                  } ?></div>
            <div class="alert alert-info text-center" id="statusBox">
                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></button>
                    <div class="" id="status"></div>
                
            </div>
            <?php echo form_open("upload/upload_img?productId=".$productId."&mode=1",array('class'=>'dropzone','id'=>'sliderDrop'));?>
              <div class="fallback">
                <input name="file" type="file"/>
              </div>

            <?php echo form_close();?>
            <button class="btn btn-info pull-right" id="cancel"> Cancel </button>
            <button class="btn btn-info pull-right" id="upload"> Upload </button>
            <input type="hidden" id="baseUrl" value="<?php echo site_url();?>">
            <input type="hidden" id="productId" value="<?php echo $productId;?>">

            
        </div>
    </div>


        </div>
    </div>