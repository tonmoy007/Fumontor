<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class CommonController extends CI_Controller
    {

    /**
     * This controller is using as a common controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/commonController
     * 	- or -  
     * 		http://example.com/index.php/commonController/<method_name>
     */
    function __construct()
        {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        }

    //This function will return class section by class title.
    //If thst class do not have any class section then return a message "This class has no section."
    public function ajaxClassInfo()
        {
        $classTitle = $this->input->get('q',TRUE);
        $query = $this->common->getWhere('class', 'class_title', $classTitle);
        foreach ($query as $row) {
            $data = $row;
        }
        echo '<input type="hidden" name="class" value="' . $classTitle . '">';
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);
            echo '<div class="form-group">
                        <label class="col-md-3 control-label">Section <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="section" class="form-control">
                                <option value="all">All Section</option>';
            foreach ($sectionArray as $sec) {
                echo '<option value="' . $sec . '">' . $sec . '</option>';
            }
            echo '</select></div>
                    </div>';
        } else {
            $section = 'This class has no section.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>Info!</strong> ' . $section . '
                        </div></div></div>';
        }
        }

    }
