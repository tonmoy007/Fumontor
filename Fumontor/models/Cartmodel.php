<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Cartmodel extends CI_Model
    {

    function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->dbforge();
        $this->load->library('cart');
        }

    function getCartTotalAmount(){
        return $this->cart->total();
    }
    function getCartTotal(){
        return $this->cart->total_items();
    }
    function insertItem($data){
        $this->cart->product_name_rules = '[:print:]';
        return $this->cart->insert($data);
    }
    function getCartContent(){
        return $this->cart->contents();
    }
    function getTotalCartRow(){
        $i=0;
        $data=$this->cart->contents();
        foreach($data as $row){
            $i++;
        }
        return $i;
    }
    function destroy(){
        return $this->cart->destroy();
    }
    function deleteItem($rowid){
        $data = array(
        'rowid'   => $rowid.'',
        'qty'     => 0
        );
        

        return $this->cart->update($data);
    }

  function inserUsersItem($data){
     
        $this->db->insert('cart',$data);
        return true;   
  }

  function transferCart($userid){
    $cartItems=$this->cart->contents();
    // print_r($cartItems);
    $item=array();
    $flag=false;
    foreach($cartItems as $citem){
        $options=json_decode($citem['options']);
        $item['product_id']=$citem['id'];
        $item['title']=$citem['name'];
        $item['quantity']=$citem['qty'];
        $item['price']=$citem['price'];
        $item['user_id']=$userid;
        $item['cooksid']=$options->cooksid;
        $item['options']=json_encode($citem['options']);
        $item['subtotal']=$citem['subtotal'];
        $item['checkout']='false';
        $id=$this->db->insert('cart',$item);
        if($id){
            $flag=true;
        }else{
            $flag=false;
            break;
        }
        
    }
    return $flag;
  }



































}