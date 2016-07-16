<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Singleproduct extends MX_Controller {

    /**
     * This controller is using for controlling singleProduct 
     *
     * Maps to the following URL
     * 		http://example.com/index.php/singleProduct
     * 	- or -  
     * 		http://example.com/index.php/singleProduct/<method_name>
     */
    function __construct() {
        parent::__construct();
       $this->load->model('common');
       $this->load->library('ion_auth');
       if(!$this->ion_auth->logged_in()){
        redirect('','refresh');
       }
    }

    public function index(){
        $productId=$this->input->get('id');
        $user=$this->ion_auth->user()->row();
        $data['product']= $this->common->getWhere('menuitem','id',$productId);
        $data['sliderImg']=$this->common->getProductImg($productId,$user->id);
        $user = $this->ion_auth->user()->row();
        $head['title']=$user->first_name.' '.$user->last_name;
        $head['user']=$user->username;
        $head['id']=$user->id;
        $data['id']=$user->id; 
        $this->load->view('temp/profileHeader',$head);
        $this->load->view('singleproduct',$data);
        $this->load->view('temp/profileFooter');

    }

}