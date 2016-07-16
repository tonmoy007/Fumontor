<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mobile_model extends CI_Model
    {

    function __construct()
        {
        parent::__construct();
        $this->load->dbforge();
        }


function selectCatagory($data){
    $data=json_decode($data);
    $i=0;
    print_r($data);
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
        $data=json_decode($data);
        // print_r($data['value']);
        if(strcmp($data->value,'')!=0){
            $this->db->where('menuitem.cusines',$data->value);
        }
    
}
function selectLocation($data){
    // echo $data;
    $this->db->where("CONCAT(`cooks`.`location`,`cooks`.`service_areas` ) LIKE '%".$data."%'",NULL,false);
    


}
function selectOrderType($data){
    $data=json_decode($data);
    
    if($data->preorder||$data->ordernow){
        print_r($data);
        $i=($data->preorder)?$this->db->where('menuitem.todays_menu','0'):$this->db->where('menuitem.todays_menu','1');
    }
   
}
function applyPriceFilter($data){
    $data=json_decode($data);
    $this->db->where('menuitem.price BETWEEN "'.$data->min.'" AND "'.$data->max.'"');
}
function selectDeliveryMethod($data){
    
    $data=json_decode($data);
    if($data->pickup){
        $this->db->where('cooks.pickup',"true"); 
    }
    if($data->home_delivery){
        $this->db->where('cooks.home_delivery',"true");
    }
}

function searchFood($query){
    $this->homemodel->selectProduct();
    $this->db->where("CONCAT(`menuitem`.`title`, `menuitem`.`catagories`,`menuitem`.`cusines`,`cooks`.`kitchename`,`cooks`.`location`,`cooks`.`service_areas` ) LIKE '%".$query."%'", NULL, FALSE);
    $retquery=$this->db->get();
    $response=array(
        'total'=>$retquery->num_rows(),
        'items'=>$this->homemodel->getProductJson($retquery),
        'success'=>true,
        );
    echo json_encode($response);
}

function searchKitchen($query){
    $this->db->select('name,kitchename,user_id,address,location,pickup,home_delivery,createdon');
    $this->db->from('cooks');
    $this->db->where("CONCAT(`name`,`kitchename`,`address`,`location`) LIKE '%".$this->db->escape_like_str($query)."%'",null,FALSE);
    $query=$this->db->get();
    $data['total']=$query->num_rows();
    $data['kitchens']=$this->homemodel->getKitchenJson($query);
    echo json_encode($data);
}

function getFilteredProducts($data,$limit=0){
    $data=json_decode(json_encode($data));
    print_r($data);
    $this->homemodel->selectProduct();
    if(!empty($data->location))$this->selectLocation($data->location);
    if(!empty($data->catagories))$this->selectCatagory($data->catagories);
    if(!empty($data->cusine)){
        $this->selectCusine($data->cusine);
    }
    if(!empty($data->orderTypes))$this->selectOrderType($data->orderTypes);
    if(!empty($data->delivery_methods))$this->selectDeliveryMethod($data->delivery_methods);
    if(!empty($data->PriceRange))$this->applyPriceFilter($data->PriceRange);
    $this->db->limit(8,$limit);
    $query=$this->db->get();
    return $this->homemodel->getProductJson($query);
}













    }
