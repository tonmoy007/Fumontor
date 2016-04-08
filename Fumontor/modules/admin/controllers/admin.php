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
                $cook[$count]['serviceZones']=$serviceZone;
                
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

function getTemplate($page){
    $this->load->view($page);

}

















}