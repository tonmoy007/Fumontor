<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Homemodel extends CI_Model {



     function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->dbforge();

        }
function getProductJson($query){
    $i=0;
    $send=array();
    if($query->num_rows()>0){

    foreach($query->result_array() as $row){
        $send[]=$row;
        $catagories=explode(',',$send[$i]['catagories']);
        $send[$i]['catagoryList']=$catagories;
        $send[$i]['quantity']=1;
        if(intval($send[$i]['todays_menu'])==1){
            $send[$i]['todays_menu']=true;
        }else{
            $send[$i]['todays_menu']=false;
        }

        if(strcmp($send[$i]['home_delivery'],'true')==0){
            $send[$i]['home_delivery']=true;
        }else{
            $send[$i]['home_delivery']=false;
        }
        if(strcmp($send[$i]['pickup'] ,'true')==0){
            $send[$i]['pickup']=true;
        }else{
            $send[$i]['pickup']=false;
        }
        $i++;
    
        }
    
       return $send ; 
    }else{
        return false;
    }
}
function getAllProducts(){
    $this->db->select('menuitem.id,menuitem.title,menuitem.catagories,menuitem.description,menuitem.todays_menu,menuitem.price,menuitem.cooksID,menuitem.feature_img,menuitem.cusines,cooks.name,cooks.kitchename,cooks.location,cooks.address,cooks.pickup,cooks.home_delivery');
    $this->db->from('menuitem');
    $this->db->join('cooks','menuitem.cooksID=cooks.user_id','inner');
    $this->db->order_by('menuitem.created','desc');
    $query=$this->db->get();
    
    return $this->getProductJson($query);
}
function getPlaces(){
    $this->db->select('name');
    $this->db->from('places');
    $this->db->order_by('name','asc');
    $query=$this->db->get();
    $data=array();
    foreach($query->result_array() as $row){
        $data[]=$row;
    }
    return $data;
}
function getCatagoryProducts($data){
    
    $this->db->select('menuitem.id,menuitem.title,menuitem.catagories,menuitem.description,menuitem.todays_menu,menuitem.price,menuitem.cooksID,menuitem.feature_img,menuitem.cusines,cooks.name,cooks.kitchename,cooks.location,cooks.address,cooks.pickup,cooks.home_delivery');
    $this->db->from('menuitem');
    $this->db->join('cooks','menuitem.cooksID=cooks.user_id','inner');
    $this->db->order_by('menuitem.created','desc');
    $i=0;
    foreach ($data as $row) {
        
        
        if($i==0&&!empty($row->checked)){
            $this->db->like('menuitem.catagories',$row->catagory);
           
        }elseif(!empty($row->checked)){
            $this->db->or_like('menuitem.catagories',$row->catagory);
        }
        $i++;
    }
    $query=$this->db->get();
    return $this->getProductJson($query);
}

function getPriceRangeProducts($data){
    $this->db->select('menuitem.id,menuitem.title,menuitem.catagories,menuitem.description,menuitem.todays_menu,menuitem.price,menuitem.cooksID,menuitem.feature_img,menuitem.cusines,cooks.name,cooks.kitchename,cooks.location,cooks.address,cooks.pickup,cooks.home_delivery');
    $this->db->from('menuitem');
    $this->db->join('cooks','menuitem.cooksID=cooks.user_id','inner');
    $this->db->order_by('menuitem.created','desc');
    $i=0;
    $this->db->where('menuitem.price BETWEEN "'.$data->min.'" AND "'.$data->max.'"');
    $query=$this->db->get();
    return $this->getProductJson($query);
}


function getOrderTypeProduct($data){
    
    $this->db->select('menuitem.id,menuitem.title,menuitem.catagories,menuitem.description,menuitem.todays_menu,menuitem.price,menuitem.cooksID,menuitem.feature_img,menuitem.cusines,cooks.name,cooks.kitchename,cooks.location,cooks.address,cooks.pickup,cooks.home_delivery');
    $this->db->from('menuitem');
    $this->db->join('cooks','menuitem.cooksID=cooks.user_id','inner');
    $this->db->order_by('menuitem.created','desc');
    $i=0;
    $p=($data[0]->checked)?"true":"false";
    $h=($data[1]->checked)?"true":"false";
    
    if($data[0]->checked){
        $this->db->where('cooks.pickup',$p); 
    }
    if($data[1]->checked){
        $this->db->where('cooks.home_delivery',$h);
    }
    $query=$this->db->get();
    return $this->getProductJson($query);
}
function getCusineQuery($cusine){
    $this->db->select('menuitem.id,menuitem.title,menuitem.catagories,menuitem.description,menuitem.todays_menu,menuitem.price,menuitem.cooksID,menuitem.feature_img,menuitem.cusines,cooks.name,cooks.kitchename,cooks.location,cooks.address,cooks.pickup,cooks.home_delivery');
    $this->db->from('menuitem');
    $this->db->join('cooks','menuitem.cooksID=cooks.user_id','inner');
    $this->db->order_by('menuitem.created','desc');
    
    $query=$this->db->get();
    return $this->getProductJson($query);
}
function getOrderTypeProducts($orderTypes){

    $this->db->select('menuitem.id,menuitem.title,menuitem.catagories,menuitem.description,menuitem.todays_menu,menuitem.price,menuitem.cooksID,menuitem.feature_img,menuitem.cusines,cooks.name,cooks.kitchename,cooks.location,cooks.address,cooks.pickup,cooks.home_delivery');
    $this->db->from('menuitem');
    $this->db->join('cooks','menuitem.cooksID=cooks.user_id','inner');
    $this->db->order_by('menuitem.created','desc');

    $query=$this->db->get();
    return $this->getProductJson($query);

}

function selectProduct(){
    $this->db->select('menuitem.id,menuitem.title,menuitem.catagories,menuitem.description,menuitem.todays_menu,menuitem.price,menuitem.cooksID,menuitem.feature_img,menuitem.cusines,cooks.name,cooks.kitchename,cooks.location,cooks.address,cooks.pickup,cooks.home_delivery');
    $this->db->from('menuitem');
    $this->db->join('cooks','menuitem.cooksID=cooks.user_id','inner');
    $this->db->order_by('menuitem.created','desc');
    
}































}