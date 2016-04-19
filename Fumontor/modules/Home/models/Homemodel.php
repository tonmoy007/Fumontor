<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Homemodel extends CI_Model {



     function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->dbforge();

        }

function getProducts(){
    $this->db->select('menuitem.id,menuitem.title,menuitem.catagories,menuitem.description,menuitem.todays_menu,menuitem.price,menuitem.cooksID,menuitem.feature_img,menuitem.cusines,cooks.name,cooks.kitchename,cooks.location,cooks.address');
    $this->db->from('menuitem');
    $this->db->join('cooks','menuitem.cooksID=cooks.user_id','inner');
    $this->db->order_by('menuitem.created','desc');
    $query=$this->db->get();
    $data=array();
    $i=0;
    foreach($query->result_array() as $row){
        $data[]=$row;
        $catagories=explode(',',$data[$i]['catagories']);
        $data[$i]['catagoryList']=$catagories;
        if(intval($data[$i]['todays_menu'])==1){
            $data[$i]['todays_menu']=true;
        }else{
            $data[$i]['todays_menu']=false;
        }
        $i++;
    
    };
    if($query->num_rows()>0){
        return $data; 
    }else{
        echo false;
    }
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








}