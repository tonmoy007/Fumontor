<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MX_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/home
     *  - or -  
     *      http://example.com/index.php/home/index
     */
    function __construct() {
        parent::__construct();
        $this->load->model('common');
        $this->load->helper('url');
        $this->load->library('cart','ion_auth');
        $this->load->model('homemodel');
        $this->load->model('cartmodel');
        if(!$this->ion_auth->logged_in()){
            redirect('auth/login','refresh');
        }

    }
    function index(){
        $user=$this->ion_auth->user()->row();
        $homepage['title']='Fumontor | '.$user->first_name.' '.$user->last_name;
        $homepage['user']=$user;
        $this->load->view('userHomepage',$homepage);
    }


}