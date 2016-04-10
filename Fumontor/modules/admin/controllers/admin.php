<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller{
    
    function __construct()
        {
            parent::__construct();
            $this->load->library('ion_auth');
            $this->load->model('adminmodel');
        }
    public function index(){
        if ($this->ion_auth->logged_in())
            {
                if($this->ion_auth->is_admin()){
                    $user = $this->ion_auth->user()->row(); 
                    $data['user'] =$user->username;
                    $data['title']="Admin Dashboard";
                    $data['totalOrders']= $this->adminmodel->getTotalOrders();;
                    $this->load->view('temp/adminHeader',$data);
                    $this->load->view('adminDashbord');
                    $this->load->view('temp/adminFooter');  
                }else{
                    redirect('/','refresh');
                }
                
                
            }else{
                redirect("auth/login");
            }
        
    }
public function allCooks(){
   if($this->ion_auth->is_admin()){
        $user = $this->ion_auth->user()->row(); 
        $data['user'] =$user->username;
        $data['title']="Admin Dashboard ";
        $data['totalOrders']= $this->adminmodel->getTotalOrders();;
        $cooks['allCooks']=$this->common->getAll('cooks');
        $this->load->view('temp/adminHeader',$data);
        $this->load->view('allCooks',$cooks);
        $this->load->view('temp/adminFooter');
    
   }else{
        redirect("");
   }
}
    function allOrders(){
        if ($this->ion_auth->logged_in())
            {
                if($this->ion_auth->is_admin()){
                    $user = $this->ion_auth->user()->row(); 
                    $data['user'] =$user->username;
                    $data['title']="Admin Dashboard";
                    $data['totalOrders']= $this->adminmodel->getTotalOrders();
                    $allOrders=$this->adminmodel->getAllOrderInfo();
                    
                    $orders['AllOrders']=$allOrders;
                    $this->load->view('temp/adminHeader',$data);
                    $this->load->view('allOrders',$orders);
                    $this->load->view('temp/adminFooter');  
                }else{
                    redirect('','refresh');
                }
                
                
            }else{
                redirect("auth/login");
            }
    }


function allCooksInfo(){

    if($this->ion_auth->logged_in()){
        if($this->ion_auth->is_admin()){
            $query=$this->db->get('cooks');
            $cook=array();
            $count=0;
            foreach($query->result_array() as $row){
                $cook[]=$row;
                $servitags=array();
                $serviceTagHolder=array();
                $serviceZone=explode(',',$cook[$count]['service_areas']);
                foreach($serviceZone as $service){
                    $mdata=array('text'=>$service);
                    array_push($serviceTagHolder,$mdata);
                }
                $cook[$count]['serviceTags']=$serviceTagHolder;
                if(strcmp($cook[$count]['pickup'], 'true')==0){
                    $cook[$count]['pickup']=true;
                    $cook[$count]['pickupValue']='Pick Up';
                }else{
                    $cook[$count]['pickup']=false;
                }
                if(strcmp($cook[$count]['home_delivery'], 'true')==0){
                    $cook[$count]['home_delivery']=true;
                    $cook[$count]['hdValue']='Home Delivery';
                }else{
                    $cook[$count]['home_delivery']=false;
                }
                
                $count++;
            }
            echo json_encode($cook);
            
        }else{
            echo 'noAdmin';
        }
    }else{
        echo 'notLoggedIn';
    }
}
function submitCooksInfo(){
    $user=$this->ion_auth->user()->row();
    
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    if($request->pickup){
        $dataPickup='true';
    }
    if($request->home_delivery){
        $dataHomeDelivery='true';
    }
    $id=$request->id;
    $splitname=$this->common->split_name($request->name);
    $firstName=$splitname['first_name'];
    $lastName=$splitname['last_name'];
    $userData=array(
        'name'=>$request->name,
        'first_name'=>$firstName,
        'last_name'=>$lastName
        );
    $dataSend=array(
    'name'=>$request->name,
    'kitchename'=>$request->kitchename,
    'address'=>$request->address,
    'location'=>$request->location,
    'pickup'=>$dataPickup,
    'home_delivery'=>$dataHomeDelivery,
    'delivery_charge'=>$request->delivery_charge,
    'service_areas'=>$request->service_areas
        );
    if($this->adminmodel->updateCooksDetail($id,$dataSend)){
        if($this->adminmodel->updateUserName($request->user_id,$userData)){
            echo 'success';
        }else{
            echo "failed in user Update";
        }
    }else{
        echo "failed in Cooks Update";
    }
}
function deleteCook($id,$userid){
    if($this->ion_auth->logged_in()){
        if($this->ion_auth->is_admin()){
            if($this->adminmodel->deleteCook($id)){
                if($this->adminmodel->deleteUser($userid)){
                    echo 'sucessfully deleted !!';
                }else{
                    echo 'user cannot be deleted!!';
                }
            }else{
                echo 'Cook can not be deleted !!';
            }
        }
    }
}
function getTemplate($page){
    $this->load->view($page);

}

















}