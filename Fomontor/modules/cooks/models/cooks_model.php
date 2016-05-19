<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Cooks_model extends CI_Model {
     
    public function addItem($title, $price,$cusine,$catagories,$description,$cooksID){
         
        $date = date('d/m/y');
        $Itemtitle = $title;
        $ItemPrice=$price;
        $AddDescription = $description;
        $AddcooksID= $cooksID;
        $cusine=$cusine;
        $ItemCatagories=$catagories;
        $data = array('title'=> $Itemtitle,
            'description'=>$AddDescription,
            'created'=>$date,
            'price'=>$ItemPrice,
            'cusines'=>$cusine,
            'cooksID'=>$AddcooksID,
            'catagories'=>$ItemCatagories
            );
           if( $this->db->insert('menuitem', $data)){
            return true;
           }else{
            return false;
           }
    }
    public function allProducts($cooksId){
        $this->load->model('common');
        $data= $this->common->getWhere('menuitem','cooksID',$cooksId);
        return $data;
    }
    public function getKitchenName($cooksId){
        $kitchenName='Fumontor Kitchen';
        $query = $this->db->query('SELECT * FROM cooks where user_id='.$cooksId);
        foreach($query->result_array() as $row){
             $kitchenName=$row['kitchename'];
        }
        return $kitchenName;
    }
    public function getOrders($cooksId,$orderStatus){
        $data = array();

            $this->db->select('orders.id,orders.paid,orders.due,orders.ordertype,orders.time,users.username,users.phone');
            $this->db->from('orders'); 
            $this->db->join('users', 'orders.user_id=users.id', 'inner');
            $array = array('orders.orderstatus' => $orderStatus, 'orders.cooksid' => $cooksId);
            $this->db->where($array);
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
    public function getTotalOrders($cooksId,$orderType){
        $this->db->select(' *');
        $this->db->from('orders');
        $array=array('cooksid'=>$cooksId,'orderstatus'=>$orderType);
        $this->db->where($array);
        $query=$this->db->get();
        return $query->num_rows();
    }
    public function clearUnseen($cooksid){
        $data=array('orderstatus'=>'pending');
        $array=array('cooksid'=>$cooksid,'orderstatus'=>'unseen');
        $this->db->where($array);
        if($this->db->update('orders',$data)){
            return true;
        }else{
            return false;
        }
    }
    public function getTotalUnseen($id){
        $array=array('cooksid'=>$id,'orderstatus'=>'unseen');
        $this->db->select('*');
        $this->db->where($array);
        echo $this->db->count_all_results();
    }

    public function getOrderDetails($orderid){
        $data=array();
        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('orderid',$orderid);
        $query=$this->db->get();
        foreach($query->result_array() as $row){
            $data[]=$row;
        }
        return $data;
    }

    function getTotalDue($cooksid){
        $this->db->select('due');
        $this->db->from('orders');
        $array=array('cooksid'=>$cooksid,'orderstatus'=>'delivered');
        $this->db->where($array);
        $data=array();
        $tdue=0;
        $query=$this->db->get();
        foreach($query->result_array() as $row){
            $data[]=$row;
        }
        foreach($data as $due){
            $tdue+=(int)$due['due'];
        }
        return $tdue;
    }
        function getTotalPaid($cooksid){
        $this->db->select('paid');
        $this->db->from('orders');
        $array=array('cooksid'=>$cooksid,'orderstatus'=>'delivered');
        $this->db->where($array);
        $data=array();
        $tpaid=0;
        $query=$this->db->get();
        foreach($query->result_array() as $row){
            $data[]=$row;
        }
        foreach($data as $paid){
            $tpaid+=(int)$paid['paid'];
        }
        return $tpaid;
    }

function updateUserData($data,$id){
    $this->db->where('id',$id);
    if($this->db->update('users',$data)){
        echo 'success';
    }else{
        echo 'failed';
    }
}
function updateKitchenData($data,$id){
    $this->db->where('user_id',$id);
    if($this->db->update('cooks',$data)){
        echo 'success';
    }else{
        echo 'failed';
    }
}

function updateDeliveryOptions($data,$id){
    $this->db->where('user_id',$id);
    if($this->db->update('cooks',$data)){
        return true;
    }else{
        return false;
    }
}












     
}
  