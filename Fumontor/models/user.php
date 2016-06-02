<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends CI_Model
    {

    function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->dbforge();
        }
function changeTempUserStatus($number){
        $data=array(
            'status'=>'registered'
            );
        $this->db->where('phone',$number);
        $this->db->update('tempusers',$data);
    }

function placeOrder($userid,$cooksid,$orderType,$deliveryType,$paymentMethod){
        $data=array(
            'user_id'=>$userid,
            'cooksid'=>$cooksid,
            'ordertype'=>$orderType,
            'orderstatus'=>'unseen',
            'delivery_type'=>$deliveryType,
            'payment_method'=>$paymentMethod,
            'submit_time'=>time(),
            );
        if($this->db->insert('orders',$data)){
            $orderid=$this->common->getlastUserID('orders');
            $data2=array(
                'orderid'=>$orderid,
                'checkout'=>'true'
                );
            $update=array('user_id'=>$userid,'cooksid'=>$cooksid,'checkout'=>'false');
            $this->db->where($update);
            if($this->db->update('cart',$data2)){
                return true;

            }else{
                return false;
            }
        }else{
            return false;
        }

    }

function makeOrders($userid,$deliveryType,$paymentMethod){
    $data=array();
    $flag=false;
    $delivery='';

    $query=$this->db->query('select * from cart where user_id='.$userid.' and checkout=false group by cooksid');
    
    foreach($query->result_array() as $row){
        $options=json_decode(json_decode($row['options']));
        // $dType=json_decode($deliveryType);
        // echo $options->orderType;
        // print_r($deliveryType->{$options->cooksid});
        // return;
       foreach ($deliveryType as $key => $value) {
           if($key==$options->cooksid){
            if($value){
                $delivery='pickup';
            }else{
                $delivery='home_delivery';
            }
           }
       }

        // print_r($delivery);
        // print_r($paymentMethod.'');
        // return;

        if($this->placeOrder($userid,$row['cooksid'],$options->orderType,$delivery,$paymentMethod)){
            $flag= true;
        }else{
            $flag=false;
        }

    }
    if($flag){
            echo 'success';
        }else{
            echo 'failed';
        }
    
}





















}