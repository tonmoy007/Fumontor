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
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $data=$this->input->post();
    
      

       
            $kitchenName=$request->kitchenName;
            $name=$request->name;
            $number=$request->phone;
            $nArray=$this->common->split_name($name);
            $userName=$nArray['first_name'];
            $email=($request->email)?$request->email:'';
            $password=$request->password;
            $additional_data = array(
                'first_name' =>$this->db->escape_like_str( $nArray['first_name']),
                'last_name' =>$this->db->escape_like_str($nArray['last_name']) ,
                'phone' => $this->db->escape_like_str($request->phone)
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
                    'location'=>$request->location,
                    'address'=>$request->address

                    );
                if($this->db->insert('cooks',$cooks_info)){
                     $result["0"]=array(
                    'message'=>'Successfully Submitted ! redirecting you to the dashbord',
                    'status'=>true,
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
                    'status'=>false,
                    'errors'=>'false',
                    'ntype'=>'error',
                    'redirect'=>''
                    );
                    header('Content-Type: application/json');
                    echo json_encode($result); 
                    }
                }
            
        }
  
function ajaxRegUserAsCook(){
    if($this->ion_auth->logged_in()){
    $this->load->model('user');
    $user=$this->ion_auth->user()->row();
    if($this->user->hasKitchen($user->id)){
        $result["0"]=array(
                    'message'=>'You already have an account',
                    'status'=>false,
                    );
        echo json_encode($result);
        return;
    }
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
            $kitchenName=$request->kitchenName;
            $name=$request->name;
            $number=$request->phone;
            $email=($request->email)?$request->email:'';
            $additional_data = array(
                'location' =>$this->db->escape_like_str( $request->location),
                'address' =>$this->db->escape_like_str($request->address) ,
                'phone' => $this->db->escape_like_str($request->phone)
            );
            
            $group_ids = array('group_id' => 3);
                
            
                
                $this->user->updateUser($user->id,$additional_data);
                $this->user->updateGroup($user->id,$group_ids);
                $userid=$user->id;
                $cooks_info=array(
                    'name'=>$name,
                    'user_id'=>$userid,
                    'kitchename'=>$kitchenName,
                    'location'=>$request->location,
                    'address'=>$request->address

                    );
                if($this->db->insert('cooks',$cooks_info)){
                     $result=array('status'=>true);
                     echo json_encode($result);
                   

                    
                    }else{
                        $result["0"]=array(
                    'message'=>'Some error occurs',
                    'status'=>false,
                    );
                    echo json_encode($result); 
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
    }else{
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

function emailCheck($email=null){
    if($email!=null){
        $this->db->select('*');
        $this->db->from('users');

        $this->db->where('email',$email);
        $query = $this->db->get();
        $data=array();
        
        if($query->num_rows() != 0){
            echo 'success';
        }else{
            return false;
        }
    }
}
function sendMail(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    // $data=$this->input->post();
    // print_r($request);
    $success=$this->ion_auth->sendMail($request->name,$request->email,$request->message);
        if($success){
            echo 'true';
        }else{
            echo 'false';
        }
}


















}
