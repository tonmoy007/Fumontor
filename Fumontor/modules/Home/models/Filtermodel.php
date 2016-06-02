<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Filtermodel extends CI_Model {



     function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->dbforge();
        $this->load->model('homemodel');
        }


function selectCatagory($data){
    $i=0;
    foreach ($data as $row) {
        # code...
        
        if($row->checked){
            
            if($i==0){
                $this->db->like('menuitem.catagories',$row->catagory,'both');
             
            }else{
                $this->db->or_like('menuitem.catagories',$row->catagory,'both');
             
            }
              
            $i++;
        }
        
    }
}
function selectCusine($data){
        // print_r($data);
        if(strcmp($data->value,'')!=0){
            $this->db->where('menuitem.cusines',$data->value);
        }
    
}
function selectLocation($data){
    // echo $data;
    $this->db->where('location',$data);
}
function selectOrderType($data){

    if($data[0]->checked||$data[1]->checked){
        $i=($data[0]->checked)?$this->db->where('menuitem.todays_menu','0'):$this->db->where('menuitem.todays_menu','1');
    }
   
}
function applyPriceFilter($data){
    $this->db->where('menuitem.price BETWEEN "'.$data->min.'" AND "'.$data->max.'"');
}
function selectDeliveryMethod($data){
    
    
    if($data[0]->checked){
        $this->db->where('cooks.pickup',"true"); 
    }
    if($data[1]->checked){
        $this->db->where('cooks.home_delivery',"true");
    }
}
function getFilteredProducts($data){
    // print_r($data);return;
    $this->homemodel->selectProduct();
    $this->selectLocation($data->location);
    $this->selectCatagory($data->catagories);
    if(!empty($data->cusine)){
        $this->selectCusine($data->cusine);
    }
    $this->selectOrderType($data->orderTypes);
    $this->applyPriceFilter($data->PriceRangeSlider);
    $this->selectDeliveryMethod($data->delivery_methods);
    $query=$this->db->get();
    return $this->homemodel->getProductJson($query);
    
}
























































}