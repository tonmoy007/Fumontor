
<div class="container">
    <div class="center" >
        <h1 class="form-heading text-theme2">Cook Registration</h1>
    </div>
    <div class="register-form-container">
    <div class="alert-error" id="error">
        <?php if(!empty($message))echo $message;?>
    </div>
        <?php echo form_open("index.php/cooks/cook_registration",array("id"=>"CookRegistrationForm","data-action"=>"index.php/cooks/cook_registration"));?>
        <div class="form-group">
            <label class="form-label">Basic Info</label>
        
        <div class="form-block">
            <div class="col-md-6 form-half">
            
            <div class="half-block"></div>
            <div class="center">
                <div class="form-group">

                    <label class="input-label control-label" for="name">
                        Full Name <small> <strong>required*</strong></small>
                    </label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="Address" class="input-label control-label">
                        Address <small> required*</small>
                    </label>
                    <input type="text" name="address" class="form-control" id="address" required>
                </div>
                <div class="form-group">
                    <label for="City" class="input-label control-label">
                        City <small> required*</small>
                    </label>
                    <input type="text" name="city" class="form-control" id="city" required>
                </div>
                <div class="form-group">
                    
                    <div class="inline-block">
                        <label for="delivery-method" class="input-label control-label">Delivery method <small> (Optional)</small></label>
                        <label class="checkbox" for="pick_up">
                          <input type="checkbox" name="pick_up" value="true" id="pick_up" data-toggle="checkbox">
                          Pick up
                        </label>
                        <label class="checkbox" for="delivery-method2">
                            <input type="checkbox" name="home_delivery" value="true" id="delivery-method2" data-toggle="checkbox">
                        Home delivery
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="delivery-charge" class="input-label control-label">Delivery Charge</label>
                    <input class="form-control" type="number" name="delivery_charge" value="" placeholder="">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 form-half">
            <div class="center">
                <div class="form-group">
                    <label for="servicezone" class="input-label control-label">
                        Service Zones <small> select as many areas as you can cover (optional)</small>
                    </label>
                    <input type="text" name="servicezone" class="form-control tagsinput" id="service_zone" required>
                </div>
                <div class="form-group">
                    <label for="Phone Number" class="input-label control-label">
                        Phone Number <small> required* </small>
                    </label>
                    <input type="number" name="phoneNumber" class="form-control" id="phoneNumber" required>
                </div>
                <div class="form-group">
                    <label for="email" class="input-label control-label">
                        Email <small> required*</small>
                    </label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label class="input-label control-label" for="password">Password <small> required*</small></label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label class="input-label control-label" for="password">Confirm Password <small> required*</small></label>
                    <input type="password" class="form-control" name="confirmpassword" id="coonfirmpassword" required>
                </div>
            </div>
        </div>
        </div>
        </div>
        <div class="form-group">
            <label class="form-label">

            When haricots are cooked, the liquid is often thrown away, and the beans served nearly dry? </label>
            <div class=" inline-block">
            
            <label class="radio" >
              <input type="radio" name="group1" value="1" data-toggle="radio"> Answer 1
            </label>
            <label class="radio" >
              <input type="radio" name="group1" value="1" data-toggle="radio"> Answer 2
            </label>
            <label class="radio" >
              <input type="radio" name="group1" value="1" data-toggle="radio"> Answer 3
            </label>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">When haricots are cooked, the liquid is often?</label>
            <div class="inline-block">
                <label class="checkbox" for="checkbox1">
                  <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
                  Anything
                </label>
                <label class="checkbox" for="checkbox1">
                  <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
                  Anything
                </label>
                <label class="checkbox" for="checkbox1">
                  <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
                  Anything
                </label>
                <label class="checkbox" for="checkbox1">
                  <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
                  Anything
                </label>
                <label class="checkbox" for="checkbox1">
                  <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
                  Anything
                </label>
            </div>
        </div>
        <div class=" form-group">
            <label class="form-label">Yes No Questions? </label>
            <div class="inline-block">
                <div class="form-group questions">
                    <label class="question-label">Are you a Foodie ? &nbsp;</label>
                    <div class="switch switch-square"
                      data-on-label="yes"
                      data-off-label="no">
                      <input type="checkbox" />
                    </div>
                </div>
                <div class="form-group questions">
                    <label class="question-label">Are you a Foodie ? &nbsp;</label>
                    <div class="switch switch-square"
                      data-on-label="yes"
                      data-off-label="no">
                      <input type="checkbox" />
                    </div>
                </div>
                <div class="form-group questions">
                    <label class="question-label">Are you a Foodie ? &nbsp;</label>
                    <div class="switch switch-square"
                      data-on-label="yes"
                      data-off-label="no">
                      <input type="checkbox" />
                    </div>
                </div>
                <div class="form-group questions">
                    <label class="question-label">Are you a Foodie ? &nbsp;</label>
                    <div class="switch switch-square"
                      data-on-label="yes"
                      data-off-label="no">
                      <input type="checkbox" />
                    </div>
                </div>
            </div>
        </div>
        <div class="form-bottom">
            <div class="form-hr"></div>
            <div class="center">
                <input type="submit" class="btn btn-danger btn-wide btn-embossed" id="submit">
                <div id="spinner"></div>
            </div>
        </div>
        <?php echo form_close();?>
        <div class=""></div>
    </div>
</div>
<script type="text/javascript" src="assets/js/notificationFx.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/cookReg.js"></script>