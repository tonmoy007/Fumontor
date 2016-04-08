<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart extends CI_Controller {

      function __construct() {
        parent::__construct();
        $this->load->helper(array('url','html','form'));

  }
  function index(){
    $id=$this->input->get('id');
    $title=$this->input->get('title');
    $price=$this->input->get('price');
    $userID=$this->input->get('uid');
    $quantity=$this->input->get('quantity');
    $cooksid=$this->input->get('cooksID');
    $data=array(
        'product_id'=>$id,
        'title'=>$title,
        'price'=>$price,
        'quantity'=>$quantity,
        'user_id'=>$userID,
        'cooksid'=>$cooksid,
        'checkout'=>'false'
        ); 
        $this->db->insert('cart',$data);
        return true;   
  }
  
}