<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Uploadmodel extends CI_Model
    {

    protected $path_img_upload_folder;
    protected $path_img_thumb_upload_folder;
    protected $path_url_img_upload_folder;
    protected $path_url_img_thumb_upload_folder;
    protected $delete_img_url;

    function __construct()
        {
        
        parent::__construct();
        
        
        $this->load->library('ion_auth');
        $this->load->helper(array('url','html','form'));
        $user=$this->ion_auth->user()->row();
//Set relative Path with CI Constant
//          
        
        $this->setPath_img_upload_folder("assets/uploads/".$user->id."/");
        $this->setPath_img_thumb_upload_folder("assets/uploads/".$user->id."/"."thumbnails/");

        
//Delete img url
        $this->setDelete_img_url(base_url() . 'upload/deleteImage/');
 

//Set url img with Base_url()
        $this->setPath_url_img_upload_folder(base_url() . "assets/uploads/".$user->id."/");
        $this->setPath_url_img_thumb_upload_folder(base_url() ."assets/uploads/".$user->id."/"."thumbnails/");
         }

  


function upload_img($productID,$path=null,$name='feature_img') {


//         $name = $_FILES['file']['name'];
//         $name = strtr($name, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

// // remplacer les caracteres autres que lettres, chiffres et point par _

//          $name = preg_replace('/([^.a-z0-9]+)/i', '_', $name);
        

        
        
    if(!empty($productID)){
        
        if($path==null){
            $path = $this->getPath_img_upload_folder().'/'.$productID.'/';
        }else{
            $path = $path.'/'.$productID.'/';
        }
        

        if(!is_dir($path)) //create the folder if it's not already exists
        {
          mkdir($path,0755,TRUE);
          mkdir($path.'thumb',0755,TRUE);
        } 

        //Your upload directory, see CI user guide
        
        $config['upload_path'] =  $path;
  
        $config['allowed_types'] = 'gif|jpg|png|JPG|GIF|PNG';
        
        $config['max_size'] = '8000000';
        $config['encrypt_name'] = TRUE;

       //Load the upload library
        $this->load->library('upload', $config);

        if($this->do_upload($name)){
            $data = $this->upload->data();
            if(!empty($productID)&&$path==null){

                $this->db->where('id', $productID);
                $this->db->update('menuitem',  array('feature_img' => $this->db->escape_like_str($data['file_name']) ));
                

            }

            $config['new_image'] = $path.'thumb';
            $config['image_library'] = 'gd2';
            $config['source_image'] = $path.''.$data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 220;
            $config['height'] = 180;
            
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            

            //Get info 
            $info = new stdClass();
            
            $info->name = $data['file_name'];
            $info->size = $data['file_size'];
            $info->type = $data['file_type'];
            $info->url = $this->getPath_img_upload_folder() . $data['file_name'];
            $info->thumbnail_url = $this->getPath_img_thumb_upload_folder() . $data['file_name']; //I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$name
            $info->delete_url = $this->getDelete_img_url() . $data['file_name'];
            $info->delete_type = 'DELETE';
            return $info;

        }else{
            return false;
        }




    }
}
//Function for the upload : return true/false
public function do_upload($str) {
    // echo $str;
        if (!$this->upload->do_upload($str)) {

            return false;
        } else {
            //$data = array('upload_data' => $this->upload->data());

            return true;
        }
     }

public function getPath_img_upload_folder() {
        return $this->path_img_upload_folder;
    }

public function setPath_img_upload_folder($path_img_upload_folder) {
        $this->path_img_upload_folder = $path_img_upload_folder;
    }

public function getPath_img_thumb_upload_folder() {
        return $this->path_img_thumb_upload_folder;
    }

public function setPath_img_thumb_upload_folder($path_img_thumb_upload_folder) {
        $this->path_img_thumb_upload_folder = $path_img_thumb_upload_folder;
    }

public function getPath_url_img_upload_folder() {
        return $this->path_url_img_upload_folder;
    }

public function setPath_url_img_upload_folder($path_url_img_upload_folder) {
        $this->path_url_img_upload_folder = $path_url_img_upload_folder;
    }

public function getPath_url_img_thumb_upload_folder() {
        return $this->path_url_img_thumb_upload_folder;
    }

public function setPath_url_img_thumb_upload_folder($path_url_img_thumb_upload_folder) {
        $this->path_url_img_thumb_upload_folder = $path_url_img_thumb_upload_folder;
    }

public function getDelete_img_url() {
        return $this->delete_img_url;
    }

public function setDelete_img_url($delete_img_url) {
        $this->delete_img_url = $delete_img_url;
    }
public function getallFiles($path){
    $this->load->helper('file');
    $files=get_filenames($path);
    return $files;
}






































    }
