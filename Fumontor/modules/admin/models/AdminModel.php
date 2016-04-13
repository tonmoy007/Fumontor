<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class AdminModel extends CI_Model {



     function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->dbforge();

        }

public function getTotalOrders(){
        return $this->db->count_all_results('orders');
    }

public function getAllOrderInfo(){
    $orderstatus=$this->input->get('orderStatus');
    $data=array();
    $this->db->select('orders.id,orders.paid,orders.due,orders.ordertype,orders.time,orders.orderstatus,orders.cooksid,users.username,users.first_name,users.last_name,users.phone');
    $this->db->from('orders'); 
    $this->db->join('users', 'orders.user_id=users.id', 'inner');
    $this->db->order_by('orders.time','desc');
    if(!empty($orderstatus)){

    $this->db->where('orders.orderstatus',$orderstatus);   
    }     
    $query = $this->db->get();
    
    if($query->num_rows() != 0)
    {   $i=0;
        foreach($query->result_array() as $row){
            $data[$i]=$row;
            $data[$i]['orderDetail']=$this->getOrderDetails($row['id']);
            $i++;
        }
        return $data;
    }
    else
    {
       return false;
    } 
}
function getCooksDetails($cooksId){
    
    $data=array();
    $this->db->select('*');
    $this->db->from('cooks');
    $this->db->where('user_id',$cooksId);
    $query=$this->db->get();
    foreach($query->result_array() as $row){
        $data[]=$row;
    }
    foreach($data as $set){

    return $set;
    }
}

function updateCooksDetail($id,$data){
    $this->db->where('id',$id);
    if($this->db->update('cooks',$data)){
        return true;
    }else{
        return false;
    }
}

function updateUserName($id,$data){
    $this->db->where('id',$id);
    if($this->db->update('users',$data)){
        return true;
    }else{
        return false;
    }
}

function deleteCook($id){

    if($this->db->delete('cooks',array('id'=>$id))){
        return true;
    }else{
        return false;
    }

}
function deleteUser($id){
    if($this->db->delete('users',array('id'=>$id))){
        return true;
    }else{
        return false;
    }
}

public function getOrderDetails($orderid){
        $data=array();
        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('orderid',$orderid);
        $query=$this->db->get();
        $i=0;
        foreach($query->result_array() as $row){
            $data[]=$row;
            $i+=intval($row['price']) * intval($row['quantity']) ;
        }
        if($query->num_rows()>0){
            $data[0]['total']=$i;
        }
        return $data;
    }















}