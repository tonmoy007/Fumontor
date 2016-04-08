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

    $data=array();
    $this->db->select('orders.id,orders.paid,orders.due,orders.ordertype,orders.time,orders.orderstatus,orders.cooksid,users.username,users.first_name,users.last_name,users.phone');
    $this->db->from('orders'); 
    $this->db->join('users', 'orders.user_id=users.id', 'inner');
    $this->db->order_by('orders.time','desc');        
    $query = $this->db->get();
    
    if($query->num_rows() != 0)
    {   
        foreach($query->result_array() as $row){
            $data[]=$row;
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










}