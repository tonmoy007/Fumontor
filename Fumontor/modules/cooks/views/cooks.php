<link rel="stylesheet" type="text/css" href="assets/css/addMenu.css">


<div class="row main-component">
    <div class="content-area">
        <div class="form-container component-container">
            <div class="inner-form">
                
                <h3 class="sub-heading text-center">Add New Menu Item</h3>

                  <div id="infoMessage" class="submit-info">
                  <?php if (!empty($message)) {
                      echo $message;
                  } ?></div>
                <?php echo form_open_multipart("cooks/addMenuItem");?>

                    
                        <div class="form-group">
                            <div class="input-group">
                                
                                <input class="form-control empty input-lg" placeholder="Item Title" id="item_title" name="item_title" type="text" data-hint="Item Name">                  
                                
                                
                                <div class="help-text"></div>

                                
                                <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                            </div>
                        </div>
                   

                  
                        <div class="form-group ">
                            <div class="input-group col-md-6">
                                
                                <input class="form-control empty input-lg" placeholder="Price" id="price" name="price" type="number" data-hint="Item Name">                  
                                
                                <div class="help-text"></div>
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <div class="form-control-wrapper input-group">
                            
                                <input class="form-control empty input-lg" placeholder="Catagories" name="catagories" id="catagories" type="text" data-hint="Item Name">                  
                                
                                <div class="help-text">Give as many catagories as you want. Separate them with comas (,) </div>
                                <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                            </div>
                        </div>

                    
                        
                   <?php $this->view('texeditor');?>

                        
                         <input type="submit" id="submit" class="pull-right btn btn-raised btn-primary" name="submit" value="Add">

                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

