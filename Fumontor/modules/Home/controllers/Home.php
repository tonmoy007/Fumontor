<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller {

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
        $this->load->model('common');
        $this->load->helper('url');
        $this->load->library('cart');
        $this->load->model('homemodel');
        $this->load->model('filtermodel');
        $this->load->model('cartmodel');
        
    }

    public function index() {
        if (isset($_GET['code'])){
            $data['user_profile']=$this->facebook_ion_auth->login();
            if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()&&!empty($data))
                     {
                           
                        $this->load->view('auth/create_user',$data);
                        
                     }else{

        
     } 
 }else{
        $this->load->view('homeHead');
        $this->load->view('home');
        $this->load->view('homeFoot');

 }

 
     
    

     
    }


public function iceTime() {
    $time = $this->common->iceTime();
}

public function signin($user){

}




function latLong(){

    $ip_addr = $_SERVER['REMOTE_ADDR'];
    $ip_addr='220.158.204.106';
    $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip_addr) );

    if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {
        $lat = $geoplugin['geoplugin_latitude'];
        $long = $geoplugin['geoplugin_longitude'];
        echo 'latitude::'.$lat.'\t';
        echo 'Longitude::'.$long.'\n';
    }

}


public function insertPlaces(){

$user=$this->ion_auth->user()->row();
    
    // $postdata = file_get_contents("php://input");
    // $request = json_decode($postdata);
    // $places='';
    // $i=0;
    // foreach($request as $place){
    //     $data=array('name'=>$place);
    //     if($i>640){
    //         $this->db->insert('places',$data);
    //     }
    //     $i++;
    // }
    // echo count($i);

}

function getTamplate($page){

    $this->load->view($page);


}

function getHomeData(){
    $data=array(
        'places'=>$this->homemodel->getPlaces(),
        'products'=>$this->homemodel->getAllProducts(),
        'cartSubTotal'=>$this->cartmodel->getCartTotalAmount(),
        'cartTotal'=>$this->cartmodel->getTotalCartRow(),
        'cartTotalItems'=>$this->cartmodel->getCartTotal(),
        'cartContents'=>$this->cartmodel->getCartContent()
        );
    echo json_encode($data);
}

function getProduct(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
    if(!empty($request->location)){
        echo 'location';
    }
    
    elseif(!empty($request->catagories)){
        $data=$this->homemodel->getCatagoryProducts($request->catagories);
        if($data){
            echo json_encode($data);
        }else{
            echo "false";
        }
    }
    elseif(!empty($request->delivery_method)){
        $data=$this->homemodel->getOrderTypeProduct($request->delivery_method);
        if($data){
            echo json_encode($data);
        }else{
            echo "false";
        }
    }elseif(!empty($request->cusine)){
        $data=$this->homemodel->getCusineQuery($request->cusine);
        if($data){
            echo json_encode($data);
        }else{
            echo "false";
        }
    }elseif(!empty($request->priceRange)){
        $data=$this->homemodel->getPriceRangeProducts($request->priceRange);
        if($data){
            echo json_encode($data);
        }else{
            echo "false";
        }
    }elseif(!empty($request->orderType)){
        $data=$this->homemodel->getOrderTypeProducts($request->orderType);
        if($data){
            echo json_encode($data);
        }else{
            echo "false";
        }
    }else{
        echo "wrong query";
        echo json_encode($request);

    }
 }

function getFilterData(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
    $data=$this->filtermodel->getFilteredProducts($request);
        if($data){
            echo json_encode($data);
        }else{
            echo "false";
        }
}

function getKitchenPageData($id){
    $data['kitchenInfo']=$this->common->getWhere('cooks','user_id',$id);
    $this->homemodel->selectProduct();
    $this->db->where('cooksID',$id);
    $query=$this->db->get();

    $data['products']=$this->homemodel->getProductJson($query);
    // print_r($data);
    echo json_encode($data);
}













}
