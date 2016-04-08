<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {
    
    
    protected $path_img_upload_folder;
    protected $path_img_thumb_upload_folder;
    protected $path_url_img_upload_folder;
    protected $path_url_img_thumb_upload_folder;
    protected $delete_img_url;

  function __construct() {
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


    public function index() {

      
   $this->load->view('temp/header');
    $this->load->view('imgUploader');
   $this->load->view('temp/footer');
     
   }

  

    public function upload_img() {
//         $name = $_FILES['file']['name'];
//         $name = strtr($name, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

// // remplacer les caracteres autres que lettres, chiffres et point par _

//          $name = preg_replace('/([^.a-z0-9]+)/i', '_', $name);
        

        $productID=$this->input->get('productId');
        $mode=(int)$this->input->get('mode');
        
        if(!empty($productID)){
            $path = $this->getPath_img_upload_folder().'/'.$productID.'/';
        

        if(!is_dir($path)) //create the folder if it's not already exists
        {
          mkdir($path,0755,TRUE);
          mkdir($path.'thumb',0755,TRUE);
        } 

        //Your upload directory, see CI user guide
        
        $config['upload_path'] =  $path;
  
        $config['allowed_types'] = 'gif|jpg|png|JPG|GIF|PNG';
        
        $config['max_size'] = '800000';
        $config['encrypt_name'] = TRUE;

       //Load the upload library
        $this->load->library('upload', $config);

       if ($this->do_upload('file')) {
            
            //If you want to resize 
            $data = $this->upload->data();
            if(!empty($productID)&&$mode==0){

                $this->db->where('id', $productID);
                $this->db->update('menuitem',  array('feature_img' => $this->db->escape_like_str($data['file_name']) ));
                

            }

            $config['new_image'] = $path.'thumb';
            $config['image_library'] = 'gd2';
            $config['source_image'] = $path.''.$data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 193;
            $config['height'] = 94;
            
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


           //Return JSON data
           if (IS_AJAX) {   //this is why we put this in the constants to pass only json data
                echo json_encode(array($info));
                //this has to be the only the only data returned or you will get an error.
                //if you don't give this a json array it will give you a Empty file upload result error
                //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
            } else {   // so that this will still work if javascript is not enabled
                $file_data['upload_data'] = $this->upload->data();
                echo json_encode(array($info));
            }
        } else {

           // the display_errors() function wraps error messages in <p> by default and these html chars don't parse in
           // default view on the forum so either set them to blank, or decide how you want them to display.  null is passed.
            $error = array('error' => $this->upload->display_errors('',''));

            echo json_encode(array($error));
        }

        }else{
            $error =array('error'=>'product invalid !');
            echo json_encode(array($error));
        }

       }
 


//Function for the upload : return true/false
  public function do_upload($str) {

        if (!$this->upload->do_upload($str)) {

            return false;
        } else {
            //$data = array('upload_data' => $this->upload->data());

            return true;
        }
     }

public function deleteImage() {

        //Get the name in the url
        $name=$this->input->post('fid');
        chown($this->getPath_img_upload_folder() . $name,666);
        chown($this->getPath_img_thumb_upload_folder() . $name,666);
        $success = unlink($this->getPath_img_upload_folder() . $name);
        $success_th = unlink($this->getPath_img_thumb_upload_folder() . $name);

        //info to see if it is doing what it is supposed to 
        $info = new stdClass();
        $info->sucess = $success;
        $info->path = $this->getPath_url_img_upload_folder() . $name;
        $info->file = is_file($this->getPath_img_upload_folder() . $name);
        if (IS_AJAX) {//I don't think it matters if this is set but good for error checking in the console/firebug
            
            echo $info;
        } else {     //here you will need to decide what you want to show for a successful delete
            var_dump($name);
        }
    }

    public function get_files() {

        $this->get_scan_files();
    }

    public function get_scan_files() {

        $file_name = isset($_REQUEST['file']) ?
                basename(stripslashes($_REQUEST['file'])) : null;
        if ($file_name) {
            $info = $this->get_file_object($file_name);
        } else {
            $info = $this->get_file_objects();
        }
        header('Content-type: application/json');
        echo json_encode($info);
    }

    protected function get_file_object($file_name) {
        $file_path = $this->getPath_img_upload_folder() . $file_name;
        if (is_file($file_path) && $file_name[0] !== '.') {

            $file = new stdClass();
            $file->name = $file_name;
            $file->size = filesize($file_path);
            $file->url = $this->getPath_url_img_upload_folder() . rawurlencode($file->name);
            $file->thumbnail_url = $this->getPath_url_img_thumb_upload_folder() . rawurlencode($file->name);
            //File name in the url to delete 
            $file->delete_url = $this->getDelete_img_url() . rawurlencode($file->name);
            $file->delete_type = 'DELETE';
            
            return $file;
        }
        return null;
    }

    protected function get_file_objects() {
        return array_values(array_filter(array_map(
             array($this, 'get_file_object'), scandir($this->getPath_img_upload_folder())
                   )));
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


public function uploadFeature(){
   
    if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $targetPath  = $_SERVER['DOCUMENT_ROOT'] . '/Fumontor/uploades/';
        $targetFile = $targetPath . $fileName ;
        move_uploaded_file($tempFile, $targetFile);
         echo '<pre>' . print_r($_FILES, true) . '</pre>'; // $_FILES is empty
        // if you want to save in db,where here
        // with out model just for example
        // $this->load->database(); // load database
    // $this->db->insert('file_table',array('file_name' => $fileName));
    }

}

public function delete_file(){
  $dir_url=$_GET['fid'];
  unlink($dir_url);
  $dir_url_array=explode('uploads',$dir_url);
  $url=base_url().'uploads'.$dir_url_array[1];
  $result=$this->user_model->delete_event_image($url);
  if($result){
   print_r("Successfully deleted.");
   // print_r($url);
  }
 }
 public function SliderImg(){
   $data['productId']=$this->input->get('productId');

   $this->load->view('temp/header'); 
   $this->load->view('sliderImgUpload',$data);
   $this->load->view('temp/footer');
    
}


}



?>
