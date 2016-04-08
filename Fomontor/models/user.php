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

function placeOrder($userid,$cooksid,$orderType){
        $data=array(
            'user_id'=>$userid,
            'cooksid'=>$cooksid,
            'ordertype'=>$orderType,
            'orderstatus'=>'unseen',
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























}