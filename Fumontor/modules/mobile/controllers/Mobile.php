<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mobile extends MX_Controller
    {

    /**
     * This controller is using for configur this system
     *
     * Maps to the following URL
     * 		http://example.com/index.php/users
     * 	- or -  
     * 		http://example.com/index.php/users/<method_name>
     */
    function __construct()
        {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('ion_auth_model');
        }

    //This function is useing for control the weekly holyday.
    function index(){
        $data=$this->ion_auth_model->salt();
        echo $data;
    }
    function login(){
        $request=$this->input->post();
        echo json_encode($request);
    }
   






























    }
