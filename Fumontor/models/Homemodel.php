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
        if(!empty($send[$i]['min_quantity'])){
            $send[$i]['min_quantity']=intval($send[$i]['min_quantity']);
        }else{
            $send[$i]['min_quantity']=1;
        }
        // if($send[$i]['stock_quantity']==0){
            
        //     $send[$i]['todays_menu']=false;
        // }
        
        $preorderTime=explode(':',$send[$i]['preorder_process_time']);
        $orderTime=explode(':',$send[$i]['ordernow_time']);
        
        $send[$i]['preorder_time_for']['hr']=array('value'=>$preorderTime[0]);
        $send[$i]['preorder_time_for']['min']=array('value'=>$preorderTime[1]);
        $send[$i]['ordernow_time_for']['hr']=array('value'=>$orderTime[0]);
        $send[$i]['ordernow_time_for']['min']=array('value'=>$orderTime[1]);

        $send[$i]['stock_quantity']=intval($send[$i]['stock_quantity']);
        
        $send[$i]['preorder_time_text']=$this->convertOrderTime($send[$i]['preorder_process_time']);
        $send[$i]['ordernow_time_text']=$this->convertOrderTime($send[$i]['ordernow_time']);
        
        $i++;
    
        }
    
       return $send ; 
    }else{
        return false;
    }
}
function convertOrderTime($time){
    $timeFormat=explode(':', $time);
    $output='';
    $hour=false;
    $minits=false;
    if(strcmp('00',$timeFormat[0])!=0){
        $val=' hours ';
        if(strcmp('01',$timeFormat[0])==0){
            $val=' hour ';
        }
        $output.=(intval($timeFormat[0]).$val);
        $hour=true;
    }
    if(strcmp('00',$timeFormat[1])!=0){
        $val=' minuites ';
        if(strcmp('01',$timeFormat[1])==0){
            $val=' minuite ';
        }
        $output.=(intval($timeFormat[1]).$val);
        $minits=true;
    }
    if(!$hour&&!$minits){
        $output='20 minuites';
    }
    return $output;
}
function getAllProducts(){
    $this->selectProduct();
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
    
    $this->selectProduct();
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
    $this->selectProduct();
    $i=0;
    $this->db->where('menuitem.price BETWEEN "'.$data->min.'" AND "'.$data->max.'"');
    $query=$this->db->get();
    return $this->getProductJson($query);
}


function getOrderTypeProduct($data){
    
    $this->selectProduct();
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
    $this->selectProduct();
    
    $query=$this->db->get();
    return $this->getProductJson($query);
}
function getOrderTypeProducts($orderTypes){

    $this->selectProduct();

    $query=$this->db->get();
    return $this->getProductJson($query);

}

function selectProduct(){
    $this->db->select('menuitem.id,menuitem.title,menuitem.catagories,menuitem.description,menuitem.todays_menu,menuitem.preorder_process_time,menuitem.ordernow_time,menuitem.price,menuitem.cooksID,menuitem.feature_img,menuitem.cusines,menuitem.min_quantity,menuitem.stock_quantity,cooks.name,cooks.kitchename,cooks.location,cooks.address,cooks.pickup,cooks.home_delivery,cooks.min_order,cooks.delivery_charge');
    $this->db->from('menuitem');
    $this->db->join('cooks','menuitem.cooksID=cooks.user_id','inner');
    $this->db->order_by('menuitem.created','desc');
    
}
function getUserPhone($id){
    $this->db->select('phone');
    $this->db->from('users');
    $this->db->where('id',$id);
    $query=$this->db->get();
    $rphone='';
    foreach($query->result_array() as $phone){
        $rphone=$phone['phone'];
    }
    return $rphone;
}
function getTotalKithcenItem($id){
    $this->db->select('*');
    $this->db->from('menuitem');
    $this->db->where('cooksID',$id);
    $count=$this->db->count_all_results();
    if($count>0){
      return $count;  
    }else{
        return 0 ;
    }
}
function getTotalTdaysMenu($id){
    $this->db->select('id');
    $data=array('cooksID'=>$id,'todays_menu'=>'1');
    $this->db->where($data);
    $this->db->from('menuitem');
    $count=$this->db->count_all_results();
    if($count>0){
        return $count;
    }else{
        return 0;
    }

}





























}