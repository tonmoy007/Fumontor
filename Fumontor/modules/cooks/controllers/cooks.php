<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cooks extends MX_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/home
     * 	- or -  
     * 		http://example.com/index.php/home/index
     */
    function __construct() {
        parent::__construct();
        $this->load->model(array('cooks_model','homemodel','common'));
        $this->load->database();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
             

        
    }
    public function index(){
        $id=$this->input->get('id');

        $user = $this->ion_auth->user()->row(); 
       if(!empty($id)&&$this->ion_auth->logged_in()){

                $uid =$user->id;
                if(strcmp($id,$uid)!=0){
                    $data['title']=$user->first_name." ".$user->last_name;
                    $cook=$this->common->getAll('cooks','id',$user->id);
                    $data['user'] =$user->username;
                    $data['id']=$user->id;
                    $data['userKitchenName']=$this->cooks_model->getKitchenName($user->id);
                    $uData['id']=$id;
                    $uData['menu']='current';
                    $this->load->view('temp/profileHeader',$data);
                    $this->load->view('profile',$uData);
                    $this->load->view('temp/profileFooter');
                }else{
                    $data['title']=$user->first_name." ".$user->last_name;

                    $data['userKitchenName']=$this->cooks_model->getKitchenName($user->id);
                    $data['user'] =$user->username;
                    $data['id']=$user->id;
                    $uData['id']=$id;
                    $uData['menu']='current';
                    $this->load->view('temp/profileHeader',$data);
                    $this->load->view('profile',$uData);
                    $this->load->view('temp/profileFooter');
                }
       }else if($this->ion_auth->logged_in()){

        $user = $this->ion_auth->user()->row(); 
        $data['title']=$user->first_name." ".$user->last_name;

                    $data['userKitchenName']=$this->cooks_model->getKitchenName($user->id);
                    $data['user'] =$user->username;
                    $data['id']=$user->id;
                    $uData['id']=$user->id;
                    $uData['menu']='current';
                    $this->load->view('temp/profileHeader',$data);
                    $this->load->view('profile',$uData);
                    $this->load->view('temp/profileFooter');
       }else{
        redirect('auth/login');
       }

    }
    public function registerCook(){
        $data['title']="Cooks Registration";
        $this->load->view('temp/headerHome',$data);
        $this->load->view('homepage');
        $this->load->view('temp/homeFooter');
    }

    public function addMenuItem() {
        $userId=$this->input->get('id');

        if($this->ion_auth->logged_in()){

             $user = $this->ion_auth->user()->row();
             $uId=$user->id;

            if(IS_AJAX){

                 $this->form_validation->set_rules('item_title', $this->lang->line('create_user_validation_ititle_label'), 'required');
                $this->form_validation->set_rules('price', $this->lang->line('create_user_validation_price_label'), 'required');
                $this->form_validation->set_rules('description', $this->lang->line('create_user_validation_description_label'), 'required');
                $this->form_validation->set_rules('catagories', $this->lang->line('create_user_validation_catagories_label'), 'required');
                $this->form_validation->set_rules('cusine', $this->lang->line('create_user_validation_cusine_label'), 'required');

                if ($this->form_validation->run()==true) {
                    
                    $title=$this->input->post('item_title');
                    $price=$this->input->post('price');
                    $cusine=$this->input->post('cusine');
                    $description=$this->input->post('description');
                    $catagories=$this->input->post('catagories');
                    //$user=$this->ion_auth->user()->row();
                    $cooksID=$user->id;


                    if($this->cooks_model->addItem($title, $price,$cusine,$catagories,$description,$cooksID)){

                       $message='<div class="alert alert-success">Item is Successfully Added</div>';
                       
                       
                       $result["0"]=array(
                        'message'=> $message ,
                        'status'=>'true',
                        'ntype'=>  'notice',
                        'redirect'=>$this->common->getlastUserID('menuitem'),
                        );
                        header('Content-Type: application/json');
                       
                       echo json_encode($result) ;
                    }else{
                        $message="Some error occured!!";
                        $result["0"]=array(
                        'message'=> $message ,
                        'status'=>'false',
                        'ntype'=>  'error',
                        'redirect'=>'false'
                        );
                        header('Content-Type: application/json');
                        
                       echo json_encode($result) ;
                    }
                }else{
                     $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
                        $result["0"]=array(
                            'message'=> validation_errors(),
                            'status'=>'false',
                            'ntype'=>  'error',
                            'redirect'=>'false'
                            );
                        header('Content-Type: application/json');
                        echo json_encode($result);

                }
            }else{

                if($this->input->post('submit', TRUE)){
                
                $this->form_validation->set_rules('item_title', $this->lang->line('create_user_validation_ititle_label'), 'required');
                $this->form_validation->set_rules('price', $this->lang->line('create_user_validation_price_label'), 'required');
                $this->form_validation->set_rules('description', $this->lang->line('create_user_validation_description_label'), 'required');
                $this->form_validation->set_rules('catagories', $this->lang->line('create_user_validation_catagories_label'), 'required');
                $this->form_validation->set_rules('cusine', $this->lang->line('create_user_validation_cusine_label'), 'required');
                
                if ($this->form_validation->run()==true) {
                    
                    $title=$this->input->post('item_title');
                    $price=$this->input->post('price');
                    $cusine=$this->input->post('cusine');
                    $description=$this->input->post('description');
                    $catagories=$this->input->post('catagories');
                    //$user=$this->ion_auth->user()->row();
                    $cooksID=$user->id;


                    if($this->cooks_model->addItem($title, $price,$cusine,$catagories,$description,$cooksID)){

                       $message="Item is Successfully Added";
                       $data['message']=$message;
                       $data['mode']='new';

                       $data['productId']=$this->common->getlastUserID('menuitem');
                       
                        $this->load->view('temp/header');
                        $this->load->view('imgUploader',$data);
                        $this->load->view('temp/footer'); 
                       
                    }
            


                }else{
                  
                        $message=(validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                        $data['message']=$message;
                        $data['title']="Add Menu Item Error";
                        $data['userId']=$userId;

                    $data['userKitchenName']=$this->cooks_model->getKitchenName($user->id);

                        $data['user']=$user->first_name;
                        $this->load->view('temp/profileHeader',$data);
                        $this->load->view('addRestaurents',$data);
                        $this->load->view('temp/profileFooter');
                      
                    }


            }else{
                    $data['title']="Add New Menu Item ";
                    $data['userId']=$userId;
                    $data['id']=$user->id;
                    $data['user']=$user->first_name;

                    $data['userKitchenName']=$this->cooks_model->getKitchenName($user->id);
                    $this->load->view('temp/profileHeader',$data);
                    $this->load->view('addRestaurents',$data);
                    $this->load->view('temp/profileFooter');
                }

            }

        } else{
            redirect('auth/login');
        }
    }

    public function imgUploaderajax(){
        $message="Insert a feature Image for for the item!!";
        $data['message']=$message;

        $data['mode']='new';

                    
        $data['productId']=$this->common->getlastUserID('menuitem');
        $Products=$this->common->getWhere('menuitem','id',$data['productId']);
        foreach ($Products as $Product) {
            $data['ProductName']=$Product['title'];
        }
              $luser = $this->ion_auth->user()->row();
                   $head['userKitchenName']=$this->cooks_model->getKitchenName($user->id);
                    $head['title']="Add Images";
                    $head['id']=$luser->id;
                    $head['user']=$luser->first_name;
        $this->load->view('temp/profileHeader',$head);
        $this->load->view('imgUploader',$data);
        $this->load->view('temp/profileFooter');
    }

    public function imgUploader(){
           $luser = $this->ion_auth->user()->row();
           $data['productId']=$this->input->get('productId');
           $message="Upload Slider Images";
           $data['mode']='old';
           $data['message']=$message;
           $Products=$this->common->getWhere('menuitem','id',$data['productId']);
            foreach ($Products as $Product) {
                $data['ProductName']=$Product['title'];
            }
            $head['title']="Add Images";
       
        $head['id']=$luser->id;
        $head['user']=$luser->first_name;
        $head['userKitchenName']=$this->cooks_model->getKitchenName($user->id);
           $this->load->view('temp/profileHeader',$head);
           $this->load->view('imgUploader',$data);
           $this->load->view('temp/profileFooter');
    }

    public function allProducts(){
        $id=$this->input->get('userid');
        $data['products']=$this->cooks_model->allProducts($id);
        $this->load->view('temp/header');
        $this->load->view('allMyProducts',$data);
        $this->load->view('temp/footer');
    }

// (((((((((((((((((((((((((((Menu Page Apis)))))))))))))))))))))))))))



public function getMenuPageData(){
    if($this->ion_auth->logged_in()){
        if($this->ion_auth->is_cook()){
            $user=$this->ion_auth->user()->row();
            $this->homemodel->selectProduct();
            $this->db->where('cooksID',$user->id);
            $query=$this->db->get();
            $send=array(
                'menuItems'=>$this->homemodel->getProductJson($query),
                'userid'=>$user->id
                );
            echo json_encode($send) ;
        }else{
            echo 'bad request';
        }
    }else{
            echo 'not logged_in';
    }
}

function submitNewMenuItem(){

     if($this->ion_auth->logged_in()){
        if($this->ion_auth->is_cook()){
            
            $request = file_get_contents("php://input");
            $postdata=$this->input->post();
            // $data=$request['title'];
            // echo $data;
            // return;
            //$postdata = json_decode($request);
            $this->load->model('uploadmodel');
            $ppt=$postdata['preorder_start']['_hr'].':'.$postdata['preorder_start']['_min'];
            $onpt=$postdata['ordernow_start']['_hr'].':'.$postdata['ordernow_start']['_min'];
           
            // echo $postdata['title'];

            // return;
            $data=array(
                'title'=>$postdata['title'],
                'price'=>$postdata['price'],
                'description'=>$postdata['description'],
                'cooksID'=>$postdata['cooksID'],
                'cusines'=>$postdata['cusines'],
                'min_quantity'=>$postdata['min_quantity'],
                'catagories'=>$postdata['catagories'],
                'preorder_process_time'=>$ppt,
                'ordernow_time'=>$onpt
                );

             
            if($this->db->insert('menuitem',$data)){
                $id=$this->common->getLastUserID('menuitem');
                //echo $id;
                $upload_info=$this->uploadmodel->upload_img($id);
                if($upload_info){
                    $this->db->where('id',$id);
                    $this->db->update('menuitem',array('feature_img'=>$upload_info->name));
                    // $upload_info['id']=$id;
                    $this->homemodel->selectProduct();
                    $this->db->where('menuitem.id',$id);
                    $query=$this->db->get();
                    $send=array(
                        'item'=>$this->homemodel->getProductJson($query),

                        );
                    echo json_encode($send);

                }else{
                    echo 'failed';
                }
            }
        }else{
            echo 'Access Denied!!';
        }
    }else{
        echo 'Need to Login!!';
    }
    

}

function setAsTodaysMenu(){
    if($this->ion_auth->logged_in()){
        if($this->ion_auth->is_cook()){

            $request = file_get_contents("php://input");
            
            $result=json_decode($request);
          
                $data=array('todays_menu'=>$result->todays_menu,'stock_quantity'=>$result->stock_quantity);
                $this->db->where('id',$result->id);
               if( $this->db->update('menuitem',$data)){
                echo 'success';
               }else{
                echo 'failed';
               }
                
            

        }else{
            echo 'Access Denied !! ';
        }
    }else{
        echo 'Not Logged in!!';
    }
}


function changeFeatureImage(){
    $this->load->model('uploadmodel');
    $data=$this->input->post();
    $upload_info=$this->uploadmodel->upload_img($data['id']);
    if($upload_info){
        $this->db->where('id',$data['id']);
        $this->db->update('menuitem',array('feature_img'=>$upload_info->name));
        }
    echo json_encode($upload_info);
}

function changeItem(){
    if($this->ion_auth->logged_in()) {
        
        if($this->ion_auth->is_cook()){
            $request = file_get_contents("php://input");
                    
            $data=json_decode($request);
            $update=array($data->key=>$data->value);
            $this->db->where('id',$data->id);
            if($this->db->update('menuitem',$update)){
                echo 'success';
        
            }else{
                echo 'failed';
            }
        }else{
            echo 'Access Denied !!!';
        }
    }else{
        echo 'not logged in';
    }
}

function deleteItem($id){
    
    if($this->ion_auth->logged_in()){
        if($this->ion_auth->is_cook()){
            if($this->db->delete('menuitem',array('id'=>$id))){
                echo 'success';
            }else{
                echo 'failed';
            }
        }else{
            echo "access denied!";
        }
    }else{
        echo 'not logged in';
    }
}


function changeItemScedule(){
    $request = file_get_contents("php://input");
    $data=json_decode($request);
    $send=array();
    if($this->ion_auth->logged_in()){
        if($this->ion_auth->is_cook()){
            $update=array(
                'preorder_process_time'=>$data->preordertime->hr->value.':'.$data->preordertime->min->value
                );
            $this->db->where('id',$data->id);
            $this->db->update('menuitem',$update);
            $send['preorder_time_text']=$this->homemodel->convertOrderTime($update['preorder_process_time']);
            echo json_encode($send);
        }
    }
}




















    public function cook_registration(){

        $tables = $this->config->item('tables', 'ion_auth');
        $this->form_validation->set_rules('name', $this->lang->line('create_user_validation_name_label'), 'required');
        $this->form_validation->set_rules('address', $this->lang->line('create_user_validation_address_label'), 'required');
        $this->form_validation->set_rules('city', $this->lang->line('create_user_validation_city_label'), 'required');
        $this->form_validation->set_rules('servicezone', $this->lang->line('create_user_validation_servicezone_label'), '');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'valid_email|is_unique[' . $tables['users'] . '.email]');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', $this->lang->line('create_user_validation_confirmpassword_label'));
        $this->form_validation->set_message('is_unique','The email address you provide is alreay used by another user');   
       
        if($this->form_validation->run()==true){

            $name=$this->input->post('name');
            $nArray=$this->common->split_name($name);
            $userName=$nArray['first_name'];
            $email = strtolower($this->input->post('email', TRUE));
            $password = $this->input->post('password', TRUE);
              $additional_data = array(
                'first_name' =>$this->db->escape_like_str( $nArray['first_name']),
                'last_name' =>$this->db->escape_like_str($nArray['last_name']) ,
                'phone' => $this->db->escape_like_str($this->input->post('phoneNumber', TRUE))
            );
            $group_ids = array('group_id' => 3);
            if($this->ion_auth->register($userName, $password, $email, $additional_data, $group_ids)){
                
                $nuid = $this->common->getlastUserID("users");
                $userid =  $nuid;
                $cooks_info=array(
                    'name'=>$name,
                    'user_id'=>$userid,
                    'address'=>$this->db->escape_like_str($this->input->post('address'),TRUE),
                    'service_areas'=>$this->db->escape_like_str($this->input->post('servicezone'),TRUE),
                    'city'=>$this->db->escape_like_str($this->input->post('city'),TRUE),
                    'delivery_charge'=>$this->input->post('delivery_charge'),
                    'pickup'=>$this->db->escape_like_str($this->input->post('pick_up'),TRUE),
                    'home_delivery'=>$this->db->escape_like_str($this->input->post('home_delivery'),TRUE),
                    );
                if($this->db->insert('cooks', $cooks_info)){
                     $result["0"]=array(
                    'message'=>'Successfully Submitted ! redirecting you to the dashbord',
                    'status'=>'true',
                    'errors'=>'false',
                    'ntype'=>'notice',
                    'redirect'=>$this->common->getlastUserID('cooks')
                    );
                    header('Content-Type: application/json');
                     echo json_encode($result);
                    $this->ion_auth->login($email,$password,false); 
                    
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
        }else{
            if(IS_AJAX){
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
                $result["0"]=array(
                    'message'=> validation_errors() ,
                    'status'=>'false',
                    'ntype'=>  'error'
                    );
                header('Content-Type: application/json');
                echo json_encode($result);
            }else{
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('index.php/cooks/register');
            }
        }
        
    
    }



// ((((((((((((((((((((((Order Manager))))))))))))))))))))))


public function orders(){
    if(!$this->ion_auth->logged_in()){
        redirect('auth/login','refresh');
    }else{
        if($this->ion_auth->is_cook()){
            $user=$this->ion_auth->user()->row();
            $data['title']=$user->first_name.' '.$user->last_name.' | Orders';
            $data['user']=$user->username;
            $data['id']=$user->id;
            $data['userKitchenName']=$this->cooks_model->getKitchenName($user->id);
            $pData['id']=$user->id;
            $this->cooks_model->clearUnseen($user->id);
            $pData['orders']='current';
            $this->load->view('temp/profileHeader',$data);
            $this->load->view('profile',$pData);
            $this->load->view('temp/profileFooter');
        }else{

        }
    }
}
function changeOrderStatus($orderId,$orderStatus){
    $status='';
    if(strcmp($orderStatus,'pending'==0)){
        $status='recived';
    }
    if(strcmp($orderStatus,'recived')==0){
        $status='ondelivery';
    }
    if(strcmp($orderStatus,'ondelivery')==0){
        $status='delivered';
    }
    if(strcmp($orderStatus,'delivered')==0){
        echo 'delete';
        return;
    }
    $this->db->where('id',$orderId);
    if($this->db->update('orders',array('orderstatus'=>$status))){
        if(IS_AJAX){

            echo $status;
        }else{
            return true;
        }
    }else{
        if(IS_AJAX){
            echo 'false';
        }else{
            return false;
        }
    }
}

public function countAllUnseen($id){
    if(IS_AJAX){
        echo $this->cooks_model->getTotalOrders($id,'unseen');
    }
}

public function getUnseenOrders($cooksId){
    $cooksId=$this->ion_auth->user()->row()->id;
    if(IS_AJAX){
        $unseenOrders=$this->cooks_model->getOrders($cooksId,'unseen');
        if(!empty($unseenOrders)){
            foreach ($unseenOrders as $order) {
                $orderDetails=$this->cooks_model->getOrderDetails($order['id']);
                $total=0;
                $orderDetailsDiv='';

            foreach($orderDetails as $orderDetail){
                            $total+=((int)$orderDetail['quantity']*(int)$orderDetail['price']);
                            $orderDetailsDiv.='<li><span class="quantity">'.$orderDetail['quantity'].'X</span><span class="product-name">'. $orderDetail['title'].'</span><span class="price">'. $orderDetail['price'].'</span></li>';
                        }
                                
                            $orderDetailsDiv.='<li> <span class="total">Total</span><span class="price total">'.$total.'</span></li>';
                            
                            
                             
                             
                             
                $orderDiv='
            <div class="order-card blinkRed">
                            <div class="order-icon"><img class="img-thumbnail img-circle" src="assets/img/avatar.png" alt=""></div>
                            <div class="hidden orderid">'. $order['id'].'</div>
                            <div class="order-label"><span class="order-sender-name"> '.$order['username'].'</span><span class="order-sender-locarion">'.$order['phone'].'</span>
                            <div class="order-type pre-order">'.$order['ordertype'].'</div></div>
                            <div class="order-action">
                            <span class="order-status text-pending">pending</span>
                            <a href="javascript:void(0)" title="" class="btn state-btn bg-pending text-white"><i class="fa fa-arrow-right"></i></a></div>
                            <div class="order-details">
                            <ul>
                        
                        
                   
                    '.$orderDetailsDiv.'
                            </ul>
                            </div>
                            <span class="down-arrow"></span>
                        </div>

                ';
                echo $orderDiv;
                $this->cooks_model->clearUnseen($cooksId);
            }
        }else{
            echo 'false';
        }
    }
}






public function accounts(){
    if(!$this->ion_auth->logged_in()){
        redirect('auth/login','refresh');
    }else{
        if($this->ion_auth->is_cook()){
            $user=$this->ion_auth->user()->row();
            $data['title']=$user->first_name.' '.$user->last_name.' | Orders';
            $data['user']=$user->username;
            $data['id']=$user->id;
            $data['userKitchenName']=$this->cooks_model->getKitchenName($user->id);
            $pData['id']=$user->id;
            $pData['accounts']='current';
            $this->load->view('temp/profileHeader',$data);
            $this->load->view('profile',$pData);
            $this->load->view('temp/profileFooter');
        }else{

        }
    }
}


public function settings(){
    if(!$this->ion_auth->logged_in()){
        redirect('auth/login','refresh');
    }else{
        if($this->ion_auth->is_cook()){
            $user=$this->ion_auth->user()->row();
            $head['title']=$user->first_name.' '.$user->last_name.' | Orders';
            $head['user']=$user->username;
            $head['id']=$user->id;
            $head['userKitchenName']=$this->cooks_model->getKitchenName($user->id);
            $this->load->view('temp/profileHeader',$head);

            $settings['userInfo']=$this->common->getWhere('users','id',$user->id);
            $settings['cookInfo']=$this->common->getWhere('cooks','user_id',$user->id);
            
            $pData['id']=$user->id;
            $pData['settings']='current';
            $this->load->view('profile',$pData);
            $foot['data']='';
            $this->load->view('temp/profileFooter',$foot);
        }else{

        }
    }
}



function getProfileInfo($userId){

        $profile['user']=$this->common->getWhere('users','id',$userId);
        $profile['kitchen']=$this->common->getWhere('cooks','user_id',$userId);

        echo ( json_encode($profile));
   
    
}
function updateUserData($data,$param){
    $user=$this->ion_auth->user()->row();

    $update=array($data=>urldecode($param));
    $this->cooks_model->updateUserData($update,$user->id);
}
function updateKitchenData(){
    $user=$this->ion_auth->user()->row();
    
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $data = $request->model;
    $param = $request->value;
    if(!empty($data)&&!empty($param)){

    $update=array($data=>$param);
    $this->cooks_model->updateKitchenData($update,$user->id);
    }else{
         echo 'failed';
    }
}

function updateDeliveryOptions(){
    $user=$this->ion_auth->user()->row();
    
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $pickup = $request->pickup;
    $dataPickup='';
    $dataHomeDelivery='';
    $homeDelivery = $request->homeDelivery;
    if($pickup){

        $dataPickup='true';
    }
	if($homeDelivery){
        $dataHomeDelivery='true';
    }
    $dataSend=array('pickup'=>$dataPickup,'home_delivery'=>$dataHomeDelivery);
    if($this->cooks_model->updateDeliveryOptions($dataSend,$user->id)){
        echo "success";
    }else{
        echo "error";
    }
}
function emailCheck($email){
    if($this->ion_auth->logged_in()){
        $user=$this->ion_auth->user()->row();
    if($user->email==$email){
        return false;
    }
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

function usernameCheck($username){
    if($this->ion_auth->logged_in()){
        $user=$this->ion_auth->user()->row();
    if($user->username==$username){
        return false;
    }
    $this->db->select('*');
    $this->db->from('users');

    $this->db->where('username',$username);
    $query = $this->db->get();
    $data=array();
    
    if($query->num_rows() != 0){
        echo 'success';
    }else{
        return false;
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


function getpage($pageName){
    $this->load->view($pageName);
}



function serviceAreas($parse=null){
    $this->db->select('name');
    $this->db->from('service_areas');
    $query=$this->db->get();
    $send = array();
    foreach($query->result_array() as $row){
        $send[]=array('text'=>$row['name']);
    }
    echo json_encode($send);
}

















}
