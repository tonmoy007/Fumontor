<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Recipes extends MX_Controller {

    /**
     * 
     */
   

    function __construct() {
        parent::__construct();
        $this->load->model('common');
        $this->load->library('ion_auth');
        $this->load->model('homemodel');
        }

    function index(){

        $this->load->view('recipe-head');
        $this->load->view('recipe-foot');
    }

    function getTemplate($name){
       $this->load->view($name);
    }

    function addNewRecipe(){
        if($this->ion_auth->logged_in()){
            $user=$this->ion_auth->user()->row();
            $data=$this->input->post();

              
              
            // print_r($data['feature_img_temp']);
            foreach($_FILES['feature_img_temp'] as $key=>$val)
            {

                $i = 1;
              
                foreach($val as $v)
                {

                    $field_name = "file_".$i;
                    $_FILES[$field_name][$key] = $v;
                    $i++;
                    // $total++; 

                     
                     
                }
                // print_r($val);  
                // $upload_info=$this->uploadmodel->upload_img(2,'assets/recipes','file_'.$j);
                
            }
            
            // echo $total-1;/


            
            // return;
            $send=array(
                'user_id'=>$user->id,
                'title'=>$this->db->escape_like_str($data['title']),
                'prepare_time'=>$data['time'],
                'person'=>$data['person'],
                'cusine'=>$data['cusine'],
                'cost'=>$data['price'],
                'directions'=>json_encode($data['directions']),
                'ingredients'=>json_encode($data['ingredients']),
                'published'=>time(),
                );
            if($this->db->insert('recipes',$send)){
                $id=$this->common->getLastUserID('recipes');
                $this->load->model('uploadmodel');

                $upload_info='';
                $edited=false;
                $this->load->model('uploadmodel');
                    foreach($_FILES as $key=>$file){
                        if($key!='feature_img_temp'){
                            $info=$this->uploadmodel->upload_img($id,'assets/recipes',$key);
                            if(!$edited&&$info){
                                $upload_info=$info;
                                $edited=true;
                            }
                        }
                    }
                // echo json_encode($upload_info);
                if($upload_info){
                    $this->db->where('id',$id);
                    $this->db->update('recipes',array('image'=>$upload_info->name));
                    $response=array(
                        'upload'=>'success',
                        'image'=>$upload_info->name,
                        'id'=>$id,
                        );

                    echo json_encode($response);

                }else{
                    $response=array(
                        'upload'=>'success',
                        'image'=>$upload_info->name,
                        'id'=>$id,
                        'message'=>'image is not inserted properly'
                        );
                    echo json_encode($response);
                }
            }else{
                echo 'false';
            }
        }else{
            echo 'not loggedin';
        }
        
        
    }

function getAllRecipes($limStart=0,$limEnd=18){
    $this->homemodel->selectRecipies();
    $this->db->limit($limEnd,$limStart);
    $query=$this->db->get();
    if($query->num_rows()>0){
       echo json_encode($this->homemodel->getRecipesJson($query)); 
   }else{
        echo 'false';
   }
    
}
function getRecipe($id){
    
    $this->homemodel->selectRecipies(false);
    $this->db->where('recipes.id',$id);
    $query=$this->db->get();
    if($query->num_rows()>0){
        echo json_encode($this->homemodel->getRecipesJson($query,false));
    }else{
        echo 'false';
    }

}

function getMyRecipes(){
    if(!$this->ion_auth->logged_in()){
        $send=array('status'=>'nologin','success'=>false);
        echo json_encode($send);
        return;
    }else{
        $user=$this->ion_auth->user()->row();
        $this->homemodel->selectRecipies();
        $this->db->where('user_id',$user->id);
        $query=$this->db->get();
        if($query->num_rows()>0){
            $send=array('status'=>'alright','success'=>true,'recipes'=>$this->homemodel->getRecipesJson($query));
            echo json_encode($send);
        }else{
            $send=array('status'=>'norecipe','success'=>false);
            echo json_encode($send);
        }
    }

}













    }