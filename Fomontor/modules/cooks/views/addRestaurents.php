   <link href="assets/css/profile.css" rel="stylesheet">
   <link href="assets/css/register.css" rel="stylesheet">
    <div class="content-wrapper">
        <div class="content__header cool-border text-theme">
            <h2 class="content__header__text"><strong>Fumontor</strong></h2>
            <h4 class="content__header__text__sub text-muted">Your food bussiness manager</h4>
        </div>
        <div class="content__body">
            <div class="view__container text-theme cool-border">
                <h3 class="view__header">Add Menu Item</h3>
                
                <div class="row view__body">
                    <div class="view__form">
                        <div class="view__form__container">
                            <div class="inner-form">
                            <div id="errors"></div>
                                
                               
                                  <div id="infoMessage" class="submit-info">
                                  <?php if (!empty($message)) {
                                      echo $message;
                                  } ?></div>
                                <?php echo form_open("cooks/addMenuItem?id=".$userId,array("id"=>"addMenuForm","data-action"=>"cooks/addMenuItem?id=".$userId));?>

                                    
                                        <div class="form-group">
                                            <div class="input-group">
                                                
                                                <input class="form-control empty " placeholder="Item Title" id="item_title" name="item_title" type="text" data-hint="Item Name">                  
                                                
                                                
                                                <div class="help-text"></div>

                                                
                                                <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                                            </div>
                                        </div>
                                   

                                  
                                        <div class="form-group form-inline">
                                            <div class="input-group ">
                                                
                                                <input class="form-control  " placeholder="Price" id="price" name="price" type="number" data-hint="Item Name">                  
                                                
                                                <div class="help-text"></div>
                                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                            </div>
                                            <div class="input-group">
                                                <select class="form-control" name="cusine" id="cusine" >
                                                    <option value="">Select Cusine</option>
                                                    <option value="Bangla">Bangla</option>
                                                    <option value="Chinise">Chinise</option>
                                                    <option value="Indian">Indian</option>
                                                    <option value="French">French</option>
                                                    
                                                </select>
                                                <div class="help-text"></div>
                                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                            </div>
                                        </div>
                                
                            <div class="form-group">
                                
                                <label for="servicezone" class="input-label control-label">
                                Catagories <small> input all the catagory list </small>
                                </label>

                                
                                        
                                        <input class="form-control tagsinput " placeholder="Catagories" name="catagories" id="catagories" type="text" data-hint="Item Name">

                                </div>

                                    
                                        
                                   <div class="form-group">
                                   <label for="description">Description</label>
                                   
                                       <textarea name="description" rows="4" class="form-control" placeholder="Description" required></textarea>
                                   </div>
 
                                        
                                         <div class="form-bottom">
                                            <div class="form-hr"></div>
                                            <div class="center">
                                                <input type="submit" name="submit" class="btn btn-danger btn-wide btn-embossed" id="submit" >
                                                <div id="spinner"></div>
                                            </div>
                                        </div>

                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->
<script type="text/javascript" src="assets/js/notificationFx.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/addMenu.js"></script>