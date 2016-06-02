<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart extends CI_Controller {

      function __construct() {
        parent::__construct();
        $this->load->helper(array('url','html','form'));
        $this->load->library('cart');
        $this->load->model('cartmodel');

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
function addItem(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    

       
        $insert=array('id'=>$request->id,'name'=>$request->name,'price'=>$request->price,'qty'=>$request->qty,'options'=>json_encode($request->options));
               
               $id=$this->cartmodel->insertItem($insert);
               if($id){
                   echo $id;
               }else{
                   echo "failed";
               }
           
}
  
function destroy(){
    $this->cartmodel->destroy();
}
function deleteItem(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    if($this->cartmodel->deleteItem($request->rowid)){
        echo 'success';
    }else{
        echo 'failed';
    }
}

function checkProductAvailability($id,$quantity){
    $this->db->select('stock_quantity');
    $this->db->from('menuitem');
    $this->db->where('id',$id);
    $query=$this->db->get();
    $data=array();
    foreach($query->result_array() as $row){
        $data[]=$row;
    }
    if($data['stock_quantity']>=$quantity){
        return true;
    }else{
        return false;
    }
    
}
























  
}