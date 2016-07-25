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


function selectCatagory($data,$search=null){
    $i=0;
    foreach ($data as $row) {
        # code...
       
        if($row->checked){
            if($search=='ec'){
                 $this->db->or_like('menuitem.catagories',$row->catagory,'both');

            }else{

                if($i==0){

                    $this->db->like('menuitem.catagories',$row->catagory,'both');
                        }else{

                         $this->db->or_like('menuitem.catagories',$row->catagory,'both');
                        
                    }
                    $i++;
                }
            }

        
    }
}
function selectCusine($data,$search=null){
        
        if(strcmp($data->value,'')!=0){
            $this->db->where('menuitem.cusines',$data->value);
        }
    
}
function selectLocation($data){
    // echo $data;
    $this->db->where("CONCAT(`cooks`.`location`,`cooks`.`service_areas` ) LIKE '%".$data."%'",NULL,false);
    


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
function getFilteredProducts($data,$index=0){
    // print_r($data);return;
    
    $this->homemodel->selectProduct();
    $this->selectLocation($data->location);
    $this->selectCatagory($data->catagories);
    if(!empty($data->cusine)){
        $this->selectCusine($data->cusine);
    }
    $this->selectOrderType($data->orderTypes);
    $this->selectDeliveryMethod($data->delivery_methods);
    $this->applyPriceFilter($data->PriceRangeSlider);
    $this->db->limit(8,$index);
    $query=$this->db->get();
    return $this->homemodel->getProductJson($query);
    
}



function searchFood($query,$filter,$index=0){
    $query=urldecode($query);
    $index=($index!=0)?$index*20+1:$index;
    $this->homemodel->selectProduct();
    $this->db->where("CONCAT(`menuitem`.`title`, `menuitem`.`catagories`,`menuitem`.`cusines`,`cooks`.`kitchename`,`cooks`.`location`,`cooks`.`service_areas` ) LIKE '%".$query."%'", NULL, FALSE);
    $this->selectCatagory($filter->catagories,'search');
    if(!empty($filter->cusine)){
        $this->selectCusine($filter->cusine,'search');
    }
    $this->selectOrderType($filter->orderTypes);
    // $this->selectDeliveryMethod($filter->delivery_methods);
    $this->applyPriceFilter($filter->PriceRangeSlider);
    $this->db->limit(20,$index);
    $retquery=$this->db->get();
    $response=array(
        'total'=>$retquery->num_rows(),
        'items'=>$this->homemodel->getProductJson($retquery),
        'success'=>true,
        'filter'=>$filter
        );
    echo json_encode($response);
}

function searchKitchen($query){
    $query=urldecode($query);
    $this->db->select('name,kitchename,user_id,service_areas,address,location,pickup,home_delivery,createdon');
    $this->db->from('cooks');
    $this->db->where("CONCAT(`name`,`kitchename`,`address`,`location`) LIKE '%".$this->db->escape_like_str($query)."%'",null,FALSE);
    $query=$this->db->get();
    $data['total']=$query->num_rows();
    $data['kitchens']=$this->homemodel->getKitchenJson($query);
    echo json_encode($data);
}




















































}