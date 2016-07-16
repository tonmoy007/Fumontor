<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mobile extends MX_Controller
    {

    /**
     * This controller is using for configur this system
     *
     * Maps to the following URL
     * 		http://example.com/index.php/users
     * 	- or -  
     * 		http://example.com/index.php/users/<method_name>
     */
    function __construct()
        {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('ion_auth_model');
        $this->load->model(array('common','homemodel','mobile_model'));
        $this->load->library('ion_auth');
        }

    //This function is useing for control the weekly holyday.
    function index(){
        
        $this->load->view('search-google');
    }

function login(){
    $request=$this->input->post();
    $response=array();
    // echo json_encode($request);
    $email=$request['email'];
    $success=false;
    $user_state='';
    $id=null;
    $token=null;
    $message='';

    if(!empty($email)){
        if(!$this->ion_auth->identity_check($email)){
            $register = $this->ion_auth->register($request['first_name'], $email, $email, array('first_name' => $request['first_name'], 'last_name' => $request['last_name'],'name'=>$request['first_name'].' '.$request['last_name'],'phone'=>$request['phone']));
                // $id=$this->db->insert_id();   
            if($this->ion_auth->login($email, $email, 1)){
                        $success=true;
                    }
            $user_state='new';                    
            if(isset($request['image'])){
                $this->common->updateUserImage($email,$request['image']);
            }else{
                $this->common->updateUserImage($email,'');
            }



        }else{
            if($this->ion_auth->login($email, $email, 1)){
                $success=true;
            }
            if(isset($request['image'])){
                $this->common->updateUserImage($email,$request['image']);
            }else{
                $this->common->updateUserImage($email,'');
            }
                $user_state='old';
        }


        $token=sha1(uniqid($email,true));
        $this->db->where('email',$email);       
        $this->db->update('users',array('access_token'=>$token));
        $this->db->select('id');
        $this->db->where('email',$email);
        $this->db->from('users');
        $qId=$this->db->get();

        foreach($qId->result_array() as $row){
            $id=$row['id'];
        }

        $response=[
        'success'=>$success,
        'user_state'=>$user_state,
        'user_id'=>$id,
        'access_token'=>$token,
        'message'=>$success?'Successfully logged in':'Login failed',
        ];

        echo json_encode($response);

    }else{
        $response=[
        'success'=>false,
        'user_state'=>$user_state,
        'user_id'=>$id,
        'access_token'=>$token,
        'message'=>'No email provided',
        ];
        echo json_encode($response);
    }
}


function googleSearch($path,$encode=''){


    $dom = new DOMDocument();

    $dom->preserveWhiteSpace = FALSE;
    // @$doc->loadHTMLFile($url);
    # Parse the HTML from Google.
    # The @ before the method call suppresses any warnings that
    # loadHTML might throw because of invalid HTML in the page.
    
    @$dom->loadHTMLFile('https://google.com/search?q='.$path.'&tbm=vid');

    # Iterate over all the <a> tags
    $response=array();
    $i=0;
    foreach($dom->getElementsByTagName('a') as $link) {
            # Show the <a href>
            
            $links=$link->getAttribute('href');
            $response[$i]['text']=$link->nodeValue;

            $response[$i]['link']=preg_replace("[^/url?q=]",'', $links);
            if(strcmp($link->nodeValue,'youtube.com')==0){
                $response[$i]['link']='http://youtube.com'.$response[$i]['link'];
            }
            $i++;
    }
    $i=0;

    echo json_encode($response);
    // echo json_encode($response);
    // fclose($file);
    // $send['data']=$content;
    // echo json_encode($send);
    // echo json_encode($this->output->set_output($send)) ;
    
}

// function config(){
//     echo json_encode($this->config->item('facebook')['app_id']);
// }

function homeData(){
    $places=$this->homemodel->getPlaces();
    $trendingKitchen=$this->homemodel->getTrandingKitchens();
    $trendingFood=$this->homemodel->getTrandingFoods();
    $loggedin=$this->ion_auth->logged_in();
    $response=array(
        'places'=>$places,
        'trendingFoods'=>$trendingFood,
        'trendingKitchens'=>$trendingKitchen,
        'logged_in'=>$loggedin,
        'success'=>true
        );
    echo json_encode($response);
}

function filteredProducts(){
    $postdata=$this->input->post();
    $data=$this->mobile_model->getFilteredProducts($postdata);
    if($data){
        echo json_encode(array('data'=>$data,'found'=>true));
    }else{
        echo json_encode(array('data'=>false,'found'=>false));
    }
}

function search($querytype,$query){

    if($querytype=='food'){
       return $this->mobile_model->searchFood($query);
    }else if($querytype=='kitchen'){
        return $this->mobile_model->searchKitchen($query);
    }else{
        echo 'false';
    }
}


























    }
