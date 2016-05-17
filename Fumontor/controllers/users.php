<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Users extends CI_Controller {

    /**
     * This controller is using for add new users (New Student,Teacher and Parents) in this system 
     *
     * Maps to the following URL
     * 		http://example.com/index.php/users
     * 	- or -  
     * 		http://example.com/index.php/users/<method_name>
     */
    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation','ion_auth'));
        $this->load->model(array('common','user','cartmodel'));

        $this->load->helper('date');
    }

    function index(){
        $user_info = $this->ion_auth->user()->row(); 

        $data['title']=$user_info->username;
        $this->load->view('temp/header',$data);
        $this->load->view('temp/footer');
    }

    function matchPhoneNumber(){
        $number=$this->input->get('phone');
        $flag=false;
        $data=$this->common->getAll('users');
        foreach($data as $user){
            if(strcmp($number,$user['phone'])==0){

            echo 'false';
            return;
            }
        }
        echo 'true';
        
    }
    function matchEmail(){
        $email=$this->input->get('email');
        $flag=false;
        if(!empty($email)){

            $data=$this->common->getAll('users');
            foreach($data as $user){
            if(strcmp($email,$user['email'])==0){

            echo 'false';
            return;
            }
        }
        }
        echo 'true';
        
    }

function insertTempData(){
        $name=$this->input->get('name');
        $phone=$this->input->get('phone');

        $data2=$this->common->getAll('tempusers');

        foreach($data2 as $users){
            if(strcmp($users['phone'],$phone)==0){
                echo 'true';
                return;
            }
        }
        $data=array(
            'name'=>$name,
            'phone'=>$phone,
            'status'=>'visited'
            );
        if($this->db->insert('tempusers',$data)){
            echo 'true';
        }else{
            echo 'false';
        }

    }

    function ajaxRegAsCook(){

        if(IS_AJAX){
            $kitchenName=$this->input->post('kitchenName');
            $name=$this->input->post('username');
            $number=$this->input->post('phone', TRUE);
            $nArray=$this->common->split_name($name);
            $userName=$nArray['first_name'];
            $email=$this->input->post('email');
            $password=$this->input->post('userpassword');
            $additional_data = array(
                'first_name' =>$this->db->escape_like_str( $nArray['first_name']),
                'last_name' =>$this->db->escape_like_str($nArray['last_name']) ,
                'phone' => $this->db->escape_like_str($this->input->post('phone', TRUE))
            );
            $group_ids = array('group_id' => 3);
            if($this->ion_auth->register($userName, $password, $email, $additional_data, $group_ids)){
                $this->load->model('user');
                $this->user->changeTempUserStatus($number);
                $userid=$this->common->getlastUserID('users');
                $cooks_info=array(
                    'name'=>$name,
                    'user_id'=>$userid,
                    'kitchename'=>$kitchenName,
                    'location'=>$this->input->post('location'),
                    'address'=>$this->input->post('address')

                    );
                if($this->db->insert('cooks',$cooks_info)){
                     $result["0"]=array(
                    'message'=>'Successfully Submitted ! redirecting you to the dashbord',
                    'status'=>'true',
                    'errors'=>'false',
                    'ntype'=>'notice',
                    'redirect'=>'cooks'
                    );
                    header('Content-Type: application/json');
                     echo json_encode($result);
                    $this->ion_auth->login($number,$password,false); 
                    
                    }else{
                        $result["0"]=array(
                    'message'=>'Some error occurs',
                    'status'=>'false',
                    'errors'=>'false',
                    'ntype'=>'error',
                    'redirect'=>''
                    );
                    header('Content-Type: application/json');
                    echo json_encode($result); 
                    }
                }
            }
        }
  



function submitCart(){

    if($this->ion_auth->logged_in()){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $paymentType='';
    foreach($request->payment_type as $payment=>$status){
        if($status){
           $paymentType=$payment;
           break; 
        }
    }
    // print_r($request);
    // return;
        $user=$this->ion_auth->user()->row();
        $return=$this->cartmodel->transferCart($user->id);
        if($return){
            $this->cartmodel->destroy();
            $this->user->makeOrders($user->id,$request->delivery_type,$paymentType);
        }
    }

}
function updateUser(){
    if($this->ion_auth->logged_in()){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $user=$this->ion_auth->user()->row();
        $data=array();
        foreach($request as $key=>$value){
            $data[$key]=$value;
        }
        // print_r($data);
        $this->db->where('id',$user->id);
        if($this->db->update('users',$data)){
            echo 'success';
        }else{
            echo 'failed update';
        }

    }
}
function phoneCheck($phone){
    if($this->ion_auth->logged_in()){
        $user=$this->ion_auth->user()->row();
    if($user->phone==$phone){
        return false;
    }
    $this->db->select('*');
    $this->db->from('users');

    $this->db->where('phone',$phone);
    $query = $this->db->get();
    $data=array();
    
    if($query->num_rows() != 0){
        echo 'success';
    }else{
        return false;
    }
    }
}





















}
