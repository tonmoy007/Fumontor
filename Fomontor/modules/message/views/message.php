<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN THEME STYLES -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Send Message <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Message
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Send Message
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXTRAS PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Send Your Massage.
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('message/sendMessage', $form_attributs);
                        ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Select Group</label>
                                    <div class="col-md-6">
                                        <select id="reseverGroup" onchange="selectReceiver(this.value)" class="form-control" name="receiverGroup" required>
                                            <option value="">Select Receiver</option>
                                            <option value="Student">Student</option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="Parents">Parents</option>
                                        </select>
                                    </div>
                                </div>
                                <?php $user = $this->ion_auth->user()->row(); ?>
                                <input type="hidden" name="senderId" value="<?php echo $user->id; ?>">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Receiver</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-cubes"></i>
                                            </span>
                                            <select id="ajaxResult" onchange="classStuAndPar(this.value)" name="receiver" class="form-control select2me" data-placeholder="Select..." required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> </label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <select  id="ajaxStuAndPar" name="receiver_2" class="form-control select2me" data-placeholder="Select...">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Subject</label>
                                    <div class="col-md-6">
                                        <input class="form-control"  type="text" name="subject" required>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <label class="control-label col-md-3">Massage</label>
                                    <div class="col-md-9">
                                        <textarea class="ckeditor form-control" name="message" rows="6" required></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green" name="submit" value="Submit"><i class="fa fa-send"></i> &nbsp;&nbsp;Send </button>
<!--                                            <button type="reset" class="btn default">Cancel</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END EXTRAS PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/ckeditor/ckeditor.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script>
    function selectReceiver(str) {
        var xmlhttp;
        if (str.length === 0) {
            document.getElementById("ajaxResult").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxResult").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/message/ajaxSelectReciver?q=" + str, true);
        xmlhttp.send();
    }
    
    
    function classStuAndPar(str) {
        var xmlhttp;        
        var sel = document.getElementById("reseverGroup");
        var val = sel.options[sel.selectedIndex].text;
        if (str.length === 0) {
            document.getElementById("ajaxStuAndPar").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("ajaxStuAndPar").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php/message/ajaxClassStuAndPar?p=" + str + "&g=" + val, true);
        xmlhttp.send();
    }
</script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php/home/iceTime");
        }, 1000));
    });
</script>

