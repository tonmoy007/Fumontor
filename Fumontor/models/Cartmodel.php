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





































}