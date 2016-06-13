<?php  defined('BASEPATH') OR exit('No direct script access allowed');


class Social extends CI_Controller {
    
    protected $page;
  
  public function __construct() {
     parent::__construct();
       $this->load->helper('form');

        
        $this->load->library(array('ion_auth','session','oauth2'));
        $this->load->helper('url');
        $this->load->model('common');
        $this->load->model('ion_auth_model');
        
        
       
    }//end __construct()

    public function session($provider) { 
            $from=$this->input->get('from');
            if(isset($from)){
                $this->page=$from;
            }else{
                $this->page='home';
            }
         $this->load->helper('url_helper');
         //facebook
         if($provider == 'facebook') {
        // $app_id = $this->config->item('fb_appid');
        // $app_secret = $this->config->item('fb_appsecret');      
        $provider   = $this->oauth2->provider($provider, array(
            'id' => '171939936496340',
            'secret' => '3d31ca1bb2f6b40ce34ace5ec283b2ed',
            'scope'=>array( 'email','public_profile','user_friends'),
            'redirect'=>$this->page

            ));         
        }
    //google
        else if($provider == 'google'){
            
            $app_id         = "889351609137-jo5ev9e8dgd91esqghsiap8t9dfffrur.apps.googleusercontent.com";
            $app_secret     = "UauheU6M2rYvBddU-PLBycRR";
            $provider       = $this->oauth2->provider($provider, array(
                'id' => $app_id,
                'secret' => $app_secret,
                'redirect'=>$this->page
            ));             
        }

    //foursquare
        else if($provider == 'linkedin'){

            $app_id     = '75yj56pgtwgexp';
            $app_secret = '7PmMB8Rq2CODae6k';
            $provider   = $this->oauth2->provider($provider, array(
                'id' => $app_id,
                'secret' => $app_secret,
                'redirect'=>$this->page,
            ));             
        }
        else if($provider == 'foursquare'){

            $app_id     = $this->config->item('foursquare_appid');
            $app_secret = $this->config->item('foursquare_appsecret');
            $provider   = $this->oauth2->provider($provider, array(
                'id' => $app_id,
                'secret' => $app_secret,

            ));             
        }

    if ( ! $this->input->get('code'))
        {  
            // By sending no options it'll come back here
            $provider->authorize();
            redirect('social?error');
        }
        else
        {
            // Howzit?
            try
            {
                $page='';
                 if($this->input->get('from')){
                    $page=$this->input->get('from');
                 }
                
                $token = $provider->access($_GET['code']);
                $user = $provider->get_user_info($token);
                // echo $page;
                // return;
                // print_r($user);
                // return;
                if($this->uri->segment(3) == 'google'){
                     //Your code stuff here 
                    // print_r($user);
                    // return;
                     $nickname= $user["nickname"];
                     $email=$user["email"];
                    if(!empty($user['email'])){
                        if(!$this->ion_auth_model->identity_check($email)){

                            // print_r($user);
                            // return;
                            $register = $this->ion_auth->register($nickname, $user['email'], $email, array('first_name' => $user['first_name'], 'last_name' => $user['last_name'],'name'=>$user['name']));
                            
                                $this->ion_auth->login($email, $user['email'], 1);
                                    
                                if(isset($user['image'])){
                                    $this->common->updateUserImage($email,$user['image']);
                                }else{
                                    $this->common->updateUserImage($email,'');
                                }
                                    // echo $login;
                                    // $user_info = $this->ion_auth->user()->row(); 
                                    // $uid =$user_info->id;
                                    if(!IS_AJAX){
                                       if(strcmp($page,'checkout')==0){
                                        redirect('#/checkout','refresh');
                                        
                                    }else redirect("",'refresh');
                                    
                                    }else{
                                        echo 'success';
                                    }
                                
                            
                        } else {
                            $login = $this->ion_auth->login($email, $user['email'], 1);
                                    // echo $login;
                                    // print_r($email);
                                    // $user_info = $this->ion_auth->user()->row(); 
                                    // $uid =$user_info->id;
                                    if(isset($user['image'])){
                                    $this->common->updateUserImage($email,$user['image']);
                                    }else{
                                        $this->common->updateUserImage($email,'');
                                    }
                                     if(!IS_AJAX){
                                        if(strcmp($page,'checkout')==0){
                                        redirect('#/checkout','refresh');
                                        
                                    }else redirect("",'refresh');

                                    }else{
                                        echo 'success';
                                    }
                                
                        }   
                        }else{
                            if($this->ion_auth_model->username_check($nickname)){
                                $email=$this->ion_auth_model->getUserEmail($nickname);
                                if ($email==null) {
                                    echo 'noemail';
                                    exit();
                                }
                                $login = $this->ion_auth->login($email, $user['email'], 1);
                                if(isset($user['image'])){
                                    $this->common->updateUserImage($email,$user['image']);
                                    }else{
                                        $this->common->updateUserImage($email,'');
                                    }
                                    // $user_info = $this->ion_auth->user()->row(); 
                                    // $uid =$user_info->id;
                                    if(!IS_AJAX){
                                    if(strcmp($page,'checkout')==0){
                                        redirect('#/checkout','refresh');
                                        
                                    }else redirect("",'refresh');

                                    }else{
                                        echo 'success';
                                    }                       
                                   
                            }else{
                                echo "noemail";
                            }
                            
                        }

                }

                elseif($this->uri->segment(3) == 'facebook'){
                    //your facebook stuff here         

                    //print_r($user);
                    $email=$user['email'];
                    if(!empty($user['email'])){
                    if(!$this->ion_auth_model->identity_check($email)){

                        // print_r($user);
                        // return;
                        $register = $this->ion_auth->register($user['first_name'], $user['email'], $email, array('first_name' => $user['first_name'], 'last_name' => $user['last_name'],'name'=>$user['name']));
                        
                            $login = $this->ion_auth->login($email, $user['email'], 1);
                          if(isset($user['image'])){
                                    $this->common->updateUserImage($email,$user['image']);
                                    }else{
                                        $this->common->updateUserImage($email,'');
                                    } 
                                // $user_info = $this->ion_auth->user()->row(); 
                                // $uid =$user_info->id;
                                 if(!IS_AJAX){
                                    if(strcmp($page,'checkout')==0){
                                        redirect('#/checkout');
                                        
                                    }else redirect("",'refresh');
                                    }else{
                                        echo 'success';
                                    }
                            
                        
                    } else {
                        $login = $this->ion_auth->login($email, $user['email'], 1);
                        if(isset($user['image'])){
                                    $this->common->updateUserImage($email,$user['image']);
                                    }else{
                                        $this->common->updateUserImage($email,'');
                                    }
                                // $user_info = $this->ion_auth->user()->row(); 
                                // $uid =$user_info->id;
                                 if(!IS_AJAX){
                                       if(strcmp($page,'checkout')==0){
                                        redirect('#/checkout');
                                        
                                    }else redirect("",'refresh');
                                    }else{
                                        echo 'success';
                                    }
                            
                    }   
                    }else{
                        if($this->ion_auth_model->username_check($nickname)){
                            $email=$this->ion_auth_model->getUserEmail($nickname);
                            if ($email==null) {
                                echo 'noemail';
                            }
                            $login = $this->ion_auth->login($email, $user['email'], 1);
                            
                            if(isset($user['image'])){
                                    $this->common->updateUserImage($email,$user['image']);
                                    }else{
                                        $this->common->updateUserImage($email,'');
                                    }

                             if(!IS_AJAX){
                                if(strcmp($page,'checkout')==0){
                                        redirect('#/checkout');
                                        
                                    }else redirect("",'refresh');

                                    }else{
                                        echo 'success';
                                    }
                        }else{
                            echo "noemail";
                        }
                        
                    }


                }elseif($this->uri->segment(3) == 'linkedin'){
                    // your code stuff here
                     $email=$user['email'];
                    if(!empty($user['email'])){
                    if(!$this->ion_auth_model->identity_check($email)){

                        // print_r($user);
                        // return;
                        $register = $this->ion_auth->register($user['first_name'], $user['email'], $email, array('first_name' => $user['first_name'], 'last_name' => $user['last_name'],'name'=>$user['name']));
                        
                            $login = $this->ion_auth->login($email, $user['email'], 1);
                          if(isset($user['image'])){
                                    $this->common->updateUserImage($email,$user['image']);
                                    }else{
                                        $this->common->updateUserImage($email,'');
                                    } 
                                // $user_info = $this->ion_auth->user()->row(); 
                                // $uid =$user_info->id;
                                 if(!IS_AJAX){
                                    if(strcmp($page,'checkout')==0){
                                        redirect('#/checkout');
                                        
                                    }else redirect("",'refresh');
                                    }else{
                                        echo 'success';
                                    }
                            
                        
                    } else {
                        $login = $this->ion_auth->login($email, $user['email'], 1);
                        if(isset($user['image'])){
                                    $this->common->updateUserImage($email,$user['image']);
                                    }else{
                                        $this->common->updateUserImage($email,'');
                                    }
                                // $user_info = $this->ion_auth->user()->row(); 
                                // $uid =$user_info->id;
                                 if(!IS_AJAX){
                                       if(strcmp($page,'checkout')==0){
                                        redirect('#/checkout');
                                        
                                    }else redirect("",'refresh');
                                    }else{
                                        echo 'success';
                                    }
                            
                    }   
                    }else{
                        if($this->ion_auth_model->username_check($nickname)){
                            $email=$this->ion_auth_model->getUserEmail($nickname);
                            if ($email==null) {
                                echo 'noemail';
                            }
                            $login = $this->ion_auth->login($email, $user['email'], 1);
                            
                            if(isset($user['image'])){
                                    $this->common->updateUserImage($email,$user['image']);
                                    }else{
                                        $this->common->updateUserImage($email,'');
                                    }

                             if(!IS_AJAX){
                                if(strcmp($page,'checkout')==0){
                                        redirect('#/checkout');
                                        
                                    }else redirect("",'refresh');

                                    }else{
                                        echo 'success';
                                    }
                        }else{
                            echo "noemail";
                        }
                }
            }

            // $this->session->set_flashdata('info',$message);
            //     redirect('social?tabindex=s&status=sucess');

            }

            catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }

        }
    }








}