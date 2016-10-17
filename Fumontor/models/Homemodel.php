<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Homemodel extends CI_Model {



     function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->dbforge();
        $this->load->library('ion_auth');

        }
function getProductJson($query){
    $i=0;
    $send=array();
    if($query->num_rows()>0){

    foreach($query->result_array() as $row){
        
        $send[]=$row;
        $send[$i]['reviews']=$this->getAllReviews($row['id']);
        if($this->ion_auth->logged_in()){
            $user=$this->ion_auth->user()->row();
            
            if($user!=null){
                $myreview=$this->getMyReview($user->id,$row['id']);
                $send[$i]['myreview']=$myreview;
            }
        }
        $catagories=explode(',',$send[$i]['catagories']);
        $send[$i]['catagoryList']=$catagories;
        $send[$i]['quantity']=1;
        if(intval($send[$i]['todays_menu'])==1){
            $send[$i]['todays_menu']=true;
        }else{
            $send[$i]['todays_menu']=false;
        }
        if(!file_exists('assets/uploads/'.$send[$i]['cooksID'].'/'.$send[$i]['id'].'/'.$send[$i]['feature_img'])){
            $send[$i]['feature_img']='';
        }
        if(strcmp($send[$i]['home_delivery'],'true')==0){
            $send[$i]['home_delivery']=true;
        }else{
            $send[$i]['home_delivery']=false;
        }
        if(strcmp($send[$i]['pickup'] ,'true')==0){
            $send[$i]['pickup']=true;
        }else{
            $send[$i]['pickup']=false;
        }
        if(!empty($send[$i]['min_quantity'])){
            $send[$i]['min_quantity']=intval($send[$i]['min_quantity']);
        }else{
            $send[$i]['min_quantity']=1;
        }
        // if($send[$i]['stock_quantity']==0){
            
        //     $send[$i]['todays_menu']=false;
        // }
        
        $preorderTime=explode(':',$send[$i]['preorder_process_time']);
        $orderTime=explode(':',$send[$i]['ordernow_time']);
        
        $send[$i]['preorder_time_for']['hr']=array('value'=>$preorderTime[0]);
        $send[$i]['preorder_time_for']['min']=array('value'=>$preorderTime[1]);
        $send[$i]['ordernow_time_for']['hr']=array('value'=>'');
        $send[$i]['ordernow_time_for']['min']=array('value'=>'');

        $send[$i]['stock_quantity']=intval($send[$i]['stock_quantity']);
        
        $send[$i]['preorder_time_text']=$this->convertOrderTime($send[$i]['preorder_process_time']);
        // $send[$i]['ordernow_time_text']=$this->convertOrderTime($send[$i]['ordernow_time']);
        
        $i++;
    
        }
    
       return $send ; 
    }else{
        return false;
    }
}
function convertOrderTime($time){
    $timeFormat=explode(':', $time);
    $output='';
    $hour=false;
    $minits=false;
    if(strcmp('00',$timeFormat[0])!=0){
        $val=' hours ';
        if(strcmp('01',$timeFormat[0])==0){
            $val=' hour ';
        }
        $output.=(intval($timeFormat[0]).$val);
        $hour=true;
    }
    if(strcmp('00',$timeFormat[1])!=0){
        $val=' minuites ';
        if(strcmp('01',$timeFormat[1])==0){
            $val=' minuite ';
        }
        $output.=(intval($timeFormat[1]).$val);
        $minits=true;
    }
    if(!$hour&&!$minits){
        $output='20 minuites';
    }
    return $output;
}
function getAllProducts(){
    $this->selectProduct();
    $query=$this->db->get();
    
    return $this->getProductJson($query);
}
function getPlaces(){
    $this->db->select('name,nearby_areas');
    $this->db->from('service_areas');
    $this->db->order_by('name','asc');
    $query=$this->db->get();
    $data=array();
    foreach($query->result_array() as $row){
        $data[]=$row;
    }
    return $data;
}
function getCatagoryProducts($data){
    
    $this->selectProduct();
    $i=0;
    foreach ($data as $row) {
        
        
        if($i==0&&!empty($row->checked)){
            $this->db->like('menuitem.catagories',$row->catagory);
           
        }elseif(!empty($row->checked)){
            $this->db->or_like('menuitem.catagories',$row->catagory);
        }
        $i++;
    }
    $query=$this->db->get();
    return $this->getProductJson($query);
}

function getPriceRangeProducts($data){
    $this->selectProduct();
    $i=0;
    $this->db->where('menuitem.price BETWEEN "'.$data->min.'" AND "'.$data->max.'"');
    $query=$this->db->get();
    return $this->getProductJson($query);
}


function getOrderTypeProduct($data){
    
    $this->selectProduct();
    $i=0;
    $p=($data[0]->checked)?"true":"false";
    $h=($data[1]->checked)?"true":"false";
    
    if($data[0]->checked){
        $this->db->where('cooks.pickup',$p); 
    }
    if($data[1]->checked){
        $this->db->where('cooks.home_delivery',$h);
    }
    $query=$this->db->get();
    return $this->getProductJson($query);
}
function getCusineQuery($cusine){
    $this->selectProduct();
    
    $query=$this->db->get();
    return $this->getProductJson($query);
}
function getOrderTypeProducts($orderTypes){

    $this->selectProduct();

    $query=$this->db->get();
    return $this->getProductJson($query);

}

function selectProduct(){
    $this->db->select('menuitem.id,menuitem.title,menuitem.catagories,menuitem.description,menuitem.todays_menu,menuitem.preorder_process_time,menuitem.ordernow_time,menuitem.price,menuitem.cooksID,menuitem.feature_img,menuitem.cusines,menuitem.min_quantity,menuitem.stock_quantity,cooks.name,cooks.kitchename,cooks.location,cooks.address,cooks.pickup,cooks.home_delivery,cooks.min_order,cooks.delivery_charge');
    $this->db->from('menuitem');
    $this->db->join('cooks','menuitem.cooksID=cooks.user_id','inner');
    $this->db->order_by('menuitem.created','desc');
    
}
function getUserPhone($id){
    $this->db->select('phone');
    $this->db->from('users');
    $this->db->where('id',$id);
    $query=$this->db->get();
    $rphone='';
    foreach($query->result_array() as $phone){
        $rphone=$phone['phone'];
    }
    return $rphone;
}
function getTotalKithcenItem($id){
    $this->db->select('*');
    $this->db->from('menuitem');
    $this->db->where('cooksID',$id);
    $count=$this->db->count_all_results();
    if($count>0){
      return $count;  
    }else{
        return 0 ;
    }
}
function getTotalTdaysMenu($id){
    $this->db->select('id');
    $data=array('cooksID'=>$id,'todays_menu'=>'1');
    $this->db->where($data);
    $this->db->from('menuitem');
    $count=$this->db->count_all_results();
    if($count>0){
        return $count;
    }else{
        return 0;
    }

}
function getKitchenInfo($id){
    $this->db->select('*');
    $this->db->from('cooks');
    $this->db->where('user_id',$id);
    $query=$this->db->get();
    return $this->getKitchenJson($query);
}
function getKitchenJson($query){
    $data=array();
    $i=0;
    foreach($query->result_array() as $row){
        
        // $service_areas=explode(',',$row['service_areas']);
        // $row['service_areas']=$service_areas;
        $date=date_create($row['createdon']);
        $row['createdon']=date_format($date,"l F Y ");;
        if(strcmp($row['pickup'],'true')==0){
            $row['pickup']=true;
        }else{
            $row['pickup']=false;
        }
        if(strcmp($row['home_delivery'],'true')==0){
            $row['home_delivery']=true;
        }else{
            $row['home_delivery']=false;
        }
        $service_areas=explode(',',$row['service_areas']);
        $row['service_areas']=$service_areas;
        $row['phone']=$this->homemodel->getUserPhone($row['user_id']);
        $row['total_items']=$this->homemodel->getTotalKithcenItem($row['user_id']);
        $row['total_todays_menu']=$this->homemodel->getTotalTdaysMenu($row['user_id']);

        $unique_cat=array();
        $query=$this->db->select('catagories')->where('cooksID',$row['user_id'])->from('menuitem')->get()->result_array();
        foreach($query as $cat){
            $allCat=explode(',',$cat['catagories']);
            foreach($allCat as $sCat){
                if(!$this->matchcat($unique_cat,$sCat)){
                    $unique_cat[]=$sCat;
                }
            }
        }
        $row['catagories']=$unique_cat;
        $data[$i]=$row;
        $i++;
    }
    return $data;
}



function getAllReviews($productId,$lim=10,$limStart=0){
    $this->db->select('*');
    $this->db->where('product_id',$productId);
    $this->db->limit($lim,$limStart);
    $this->db->from('reviews');
    $query=$this->db->get();
    if($query->num_rows()>0){
        $data=array();
        $totalmark=0;
        foreach($query->result_array() as $row){
            $data[]=$row;
            $totalmark+=$row['mark'];
        }
        $data[0]['totalmark']=$totalmark;
        $this->db->reset_query();
        $this->db->where('product_id',$productId);
        $data[0]['total_review']=$this->db->count_all_results('reviews');
        return $data;
    }else{
        return false;
    }

}


function getMyReview($userId,$productId){
    $this->db->select('*');
    $this->db->where(array('user_id'=>$userId,'product_id'=>$productId));
    $this->db->from('reviews');
    $query=$this->db->get();
    if($query->num_rows()>0){
        $data=array();
        foreach($query->result_array() as $row){
            $data[]=$row;

        }
        return $data;
    }else{
        return false;
    }
}

function getUserInfo($id=null){
    if($id==null){
        if($this->ion_auth->logged_in()){
            $user=$this->ion_auth->user()->row();
            $send=array(
                'id'=>$user->id,
                'username'=>$user->username,
                'email'=>$user->email,
                'phone'=>$user->phone,
                'image'=>$user->image,
                'first_name'=>$user->first_name,
                'last_name'=>$user->last_name,
                'name'=>$user->name,
                'address'=>$user->address,
                'location'=>$user->location,
                'has_kitchen'=>$this->hasKitchen($user->id),
                'access_token'=>$user->access_token
                );
            return $send;

        }else{
            return false;
        }
    }else{
        $send=array();
        $this->db->select('name,address,location,phone,image,first_name,last_name,email');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query=$this->db->get();
        foreach($query->result_array() as $row){
            $send=$row;
        }
        return $send;
    }
}

function selectRecipies($thumb=true){
    if(!$thumb){
        $this->db->select('recipes.id,recipes.title,recipes.user_id,recipes.prepare_time,recipes.person,recipes.cusine,recipes.cost,recipes.ingredients,recipes.directions,recipes.image,recipes.tags,recipes.published,users.name,users.phone,users.email');
    }else{
        $this->db->select('recipes.id,recipes.title,recipes.user_id,recipes.image,recipes.published,users.name');
    }
    $this->db->from('recipes');
    $this->db->join('users','users.id=recipes.user_id','inner');
    $this->db->order_by('recipes.published','desc');
}

function getRecipesJson($query,$thumb=true){
    $send=array();
    $i=0;
    foreach($query->result_array() as $recipe){
        $send[]=$recipe;
        $path='assets/recipes/'.$send[$i]['id'].'/'.$send[$i]['image'];
        // echo $path;
        if(!file_exists($path)){
                $send[$i]['image']=''; 
                // print_r($send[$i]);
                
            }

        if(!$thumb){

            $send[$i]['ingredients']=json_decode($recipe['ingredients']);
            $send[$i]['directions']=json_decode($recipe['directions']);
            $send[$i]['all_images']=$this->getFileNames('assets/recipes/'.$recipe['id']);
           
        }
         $i++;
    }
    return $send;
}

function getFileNames($path){

    $this->load->helper('file');
    $files=get_dir_file_info($path);
    if($files)
    return $files;
    else{
        return false;
    }


}

function hasKitchen($userid){
    $this->db->select('name');
    $this->db->where('user_id',$userid);
    $this->db->from('cooks');
    $query=$this->db->get();
    if($query->num_rows()>0){
        return true;
    }else{
        return false;
    }
}

function getOrders($id,$index=0){

    $this->db->select('orders.id,orders.cooksid,orders.ordertype,orders.orderstatus,orders.time,orders.delivery_type,orders.payment_method,orders.delivery_time,orders.submit_time,cooks.kitchename,cooks.address,cooks.location');
    $this->db->from('orders');
    $this->db->join('cooks','orders.cooksid=cooks.user_id','inner');
    $this->db->where('orders.user_id',$id);
    $this->db->order_by('orders.time','desc');
    $this->db->limit(5,$index);
    $query=$this->db->get();
    
    echo json_encode($this->getOrdersJson($query));

}

function getOrdersJson($query){
    $response=array();
    $i=0;
    foreach($query->result_array() as $row){

        $response[$i]=$row;
        $response[$i]['cooks_info']=$this->getUserInfo($row['cooksid']);
        $response[$i]['orderedProducts']=$this->getOrderedProducts($row['id']);
        $i++;
    }
    return $response;
}

function getOrderedProducts($orderid){

    $response=array();
    $this->db->select('*');
    $this->db->where(array('orderid'=>$orderid,'checkout'=>'true'));
    $this->db->from('cart');
    $query=$this->db->get();
    $i=0;
    $total=0;
    if($query->num_rows()>0){
        foreach($query->result_array() as $row){
            $response[]=$row;
            $response[$i]['options']=json_decode(json_decode($row['options']));
            $total+=$row['subtotal'];
            $i++;
        }
        $response[0]['total']=$total;
    }
    return $response;
}






function getTrandingKitchens(){

    $data2=array();
    $this->db->select('user_id,kitchename,location,name,address');
    $this->db->limit(10);
    $this->db->from('cooks');
    $query2=$this->db->get();
    foreach($query2->result_array() as $row){
        
        $unique_cat=array();
        $query=$this->db->select('catagories')->where('cooksID',$row['user_id'])->from('menuitem')->get()->result_array();
        foreach($query as $cat){
            $allCat=explode(',',$cat['catagories']);
            foreach($allCat as $sCat){
                if(!$this->matchcat($unique_cat,$sCat)){
                    $unique_cat[]=$sCat;
                }
            }
        }
        $row['catagories']=$unique_cat;
        $data2[]=$row;

    }
    return $data2;
}

function matchcat($data,$value){
    $hasvalue=false;
    foreach($data as $row){
        if($row===$value){
            return true;
        }
    }
    return false;
}
function getTrandingFoods(){
    $this->homemodel->selectProduct();
    $this->db->limit(10);
    $query=$this->db->get();
    return $this->homemodel->getProductJson($query);
}

function getWeeklyItemsInString($items,$hasname=true){
    $final=array();
    
    foreach($items as $item){
        $ldItems='';
        $i=0;
        foreach($item as $name){
            if($i<sizeof($item)-1){

                $ldItems.=($hasname)?$name->name.',':$name.',';
            }else{
                $ldItems.=($hasname)?$name->name:$name;
            }
            $i++;
            
        }
        $final[]=$ldItems;

        // $lunchItems+=$item->name.',';
    }
    return $final;
}

function addWeeklyMenuList($items,$type,$id){
    $i=0;
    foreach($items as $item){
        
        $data=array(
            'items'=>(!empty($item))?$item:'',
            'day'=>$i,
            'type'=>$type,
            'menuid'=>$id
            );
        $this->db->insert('w_item_list',$data);
        $i++;
       
    }
}

function getAllWeeklyMenu($cooksid=null,$id=null,$index=0,$menu=true){

    $this->db->select('*');
    $this->db->from('w_menuitem');

    if($cooksid!=null){
        $this->db->where('cooks_id',$cooksid);
    }
    if($id!=null){
        $this->db->where('id',$id);
    }
    $this->db->limit($index,10);
    $query=$this->db->get();
    // print_r($query->result_array());
   if($query->num_rows()>0){
     $send=$this->getWeeklyItemsJson($query,$menu);
     return $send;
 }else{
    $send=false;
    return $send;
 }
    
}

function getWeeklyItemsJson($query,$menu=true){
    $data=array();
    $i=0;
    foreach($query->result_array() as $item){
        $data[$i]=$item;
        $data[$i]['kitchename']=$this->getKitchenName($item['cooks_id']);
        if($menu){

            $data[$i]['menu']=$this->getWeeklyMenuLists($item['id']);
        }
        $i++;
    }
    // print_r($data);
    return $data;
}

function getWeeklyMenuLists($id){

    $send=array();
    $i=0;
    $days=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    $this->db->select('items,day,type');
    $this->db->where('menuid',$id);
    $this->db->from('w_item_list');
    $query=$this->db->get();
    // print_r($query->result_array());
    foreach($query->result_array() as $day){
        if($day['type']=='lunch'){
            $send[$day['day']]['lunchMenuItems']=explode(',',$day['items']);
        }else{
            $send[$day['day']]['dinnerMenuItems']=explode(',',$day['items']);
        }
        $send[$day['day']]['name']=$days[$day['day']];
        if($day['day']==0){
          $send[$day['day']]['visible']=true;  
        }else{
            $send[$day['day']]['visible']=false; 
        }
    }
    return $send;

}

function getKitchenName($id){
    $this->db->select('kitchename');
    $this->db->where('user_id',$id);
    $this->db->from('cooks');
    $query=$this->db->get();
    $name='';
    foreach($query->result_array() as $row){
        $name=$row['kitchename'];
    }
    return $name;
}










}