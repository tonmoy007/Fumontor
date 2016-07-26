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
                           
                        $this->load->view('auth/signup',$data);
                        
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
    $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip_addr) );

    if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {
        $lat = $geoplugin['geoplugin_latitude'];
        $long = $geoplugin['geoplugin_longitude'];
       $response=array('latitude'=>$lat,'longitude'=>$long);
       echo json_encode($response);
    }

}


// public function insertPlaces(){

// $user=$this->ion_auth->user()->row();
    
//     // $postdata = file_get_contents("php://input");
//     // $request = json_decode($postdata);
//     // $places='';
//     // $i=0;
//     // foreach($request as $place){
//     //     $data=array('name'=>$place);
//     //     if($i>640){
//     //         $this->db->insert('places',$data);
//     //     }
//     //     $i++;
//     // }
//     // echo count($i);

// }

function getTamplate($page){

    $this->load->view($page);


}

function getHomeData(){
    
    $data1=array();
   
    
    $data=array(
        'places'=>$this->homemodel->getPlaces(),
        'cartSubTotal'=>$this->cartmodel->getCartTotalAmount(),
        'cartTotal'=>$this->cartmodel->getTotalCartRow(),
        'cartTotalItems'=>$this->cartmodel->getCartTotal(),
        'cartContents'=>$this->cartmodel->getCartContent()
        );
    $user=$this->homemodel->getUserInfo();
    if($user){
        $data['user']=$user;
    }
    echo json_encode($data);
}
function getTrandings(){
    $send =array(
        'trendingFood'=>$this->homemodel->getTrandingFoods(),
        'trendingKitchen'=>$this->homemodel->getTrandingKitchens(),
        'success'=>true
        );
    echo json_encode($send);
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
    $page=$this->input->get('load');
    $page=(!empty($page))?$page*8+1:0;
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
    
    $data=$this->filtermodel->getFilteredProducts($request,$page);
        if($data){
            echo json_encode(array('data'=>$data));
        }else{
            echo "false";
        }
}

function getKitchenPageData($id){


    $data['kitchenInfo']=$this->homemodel->getKitchenInfo($id);
    $this->homemodel->selectProduct();
    $this->db->where('cooksID',$id);
    $query=$this->db->get();

    $data['products']=$this->homemodel->getProductJson($query);
    // print_r($data);
    echo json_encode($data);
}

function getAllKitchen($limitStart=0,$limitEnd=6,$location=null){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
        // print_r($request);
   
    $this->db->select('*');
    if($location!=null){
        $this->db->like('service_areas',$location.'','both');
        $this->db->or_like('location',$location,'both');

    }else{
        $type=array();
        foreach($request->deliveryTypes as $row=>$data){
           // print_r($data);
                if($data->checked==1){
                $type[$data->value]='true';
            }
        }
        if($type){
            $this->db->where($type);
        }
    }

        $this->db->limit($limitEnd,$limitStart);
    
    

    $this->db->from('cooks');
    $query=$this->db->get();
    if($query->num_rows()>0){
        $data=$this->homemodel->getKitchenJson($query);
    
        echo json_encode($data);
    }
    else{
        echo 'false';
    }
}

function getItemData($kitchen_id,$product_id){
    $this->homemodel->selectProduct();
    $this->db->where('menuitem.id',$product_id);
    $query=$this->db->get();
    echo json_encode($this->homemodel->getProductJson($query));
}


function search($querytype,$query){
    $postdata=file_get_contents("php://input");
    $filter=json_decode($postdata);
    if($querytype=='food'){
       return $this->filtermodel->searchFood($query,$filter);
    }else if($querytype=='kitchen'){
        
        return $this->filtermodel->searchKitchen($query);
    }else{
        echo 'false';
    }
}

function addReview(){
    $postdata=file_get_contents("php://input");
    $review=json_decode($postdata);
    // print_r($review);
    if($this->ion_auth->logged_in()){

        $user=$this->ion_auth->user()->row();
        if($this->homemodel->getMyReview($user->id,$review->product_id)){
            echo 'failed';
            return;
        }
        $data = file_get_contents($review->image);
        $fileName = $user->id.'.jpg';
        $file = fopen('assets/reviews/'.$fileName, 'w+');
        fputs($file, $data);
        fclose($file);
        $reviewSend=array(
            'name'=>$user->name,
            'user_id'=>$user->id,
            'product_id'=>$review->product_id,
            'text'=>$review->text,
            'mark'=>$review->mark,
            'time'=>time()
            );
        if($this->db->insert('reviews',$reviewSend)){
            echo 'success';
        }else{
            echo 'failed';
        }
    }
    
}
function editReview(){


    if($this->ion_auth->logged_in()){
        $user=$this->ion_auth->user()->row();
        $postdata=file_get_contents('php://input');
        $review=json_decode($postdata);
        $data = file_get_contents($review->image);
        $fileName = $user->id.'.jpg';
        $file = fopen('assets/reviews/'.$fileName, 'w+');
        fputs($file, $data);
        fclose($file);
        $reviewSend=array(
            'name'=>$user->name,
            'text'=>$review->text,
            'mark'=>$review->mark,
            );
        $where=array('product_id'=>$review->product_id,'user_id'=>$user->id);
        $this->db->where($where);
        if($this->db->update('reviews',$reviewSend)){
            echo json_encode($this->homemodel->getAllReviews($review->product_id));
        }else{
            echo 'failed';
        }

    }
}

function deleteReview($productId){
    if($this->ion_auth->logged_in()){
        $user=$this->ion_auth->user()->row();
        $array=array('product_id'=>$productId,'user_id'=>$user->id);
        $this->db->where($array);
        if($this->db->delete('reviews')){
            echo json_encode($this->homemodel->getAllReviews($productId));
        }else{
            echo 'failed';
        }
    }
}
function getUserInfo(){
    $user=$this->homemodel->getUserInfo();
    if($user){
        echo json_encode($user);
    }else{
        echo 'false';
    }
}


function getMyOrders(){
    if($this->ion_auth->logged_in()){
        $user=$this->ion_auth->user()->row();

        $this->homemodel->getOrders($user->id);
    }else{
        echo 'not logged in';
    }
}


























}
