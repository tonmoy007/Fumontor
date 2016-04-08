<?php  defined('BASEPATH') OR exit('No direct script access allowed');


class social extends CI_Controller {
  public function __construct() {
     parent::__construct();
       $this->load->helper('form');

       
        $this->load->library(array('ion_auth','session'));
        $this->load->helper('url');
        $this->load->model('common');
        $this->load->model('ion_auth_model');
       
    }//end __construct()

    public function session($provider) { 
        
         $this->load->helper('url_helper');
         //facebook
         if($provider == 'facebook') {
                $app_id = $this->config->item('fb_appid');
        $app_secret = $this->config->item('fb_appsecret');      
        $provider   = $this->oauth2->provider($provider, array(
            'id' => $app_id,
            'secret' => $app_secret,
            ));         
        }
    //google
        else if($provider == 'google'){
            
            $app_id         = "889351609137-jo5ev9e8dgd91esqghsiap8t9dfffrur.apps.googleusercontent.com";
            $app_secret     = "UauheU6M2rYvBddU-PLBycRR";
            $provider       = $this->oauth2->provider($provider, array(
                'id' => $app_id,
                'secret' => $app_secret
            ));             
        }

    //foursquare
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
                $token = $provider->access($_GET['code']);
                $user = $provider->get_user_info($token);

                if($this->uri->segment(3) == 'google'){
                     //Your code stuff here 
                     //print_r($user);
                     $nickname= $user["nickname"];
                     $email=$user["email"];
            if(!empty($user['email'])){
                if(!$this->ion_auth_model->identity_check($email)){

                    
                    $register = $this->ion_auth->register($nickname, 'fumontor123^&*%', $email, array('first_name' => $user['first_name'], 'last_name' => $user['last_name']));
                    
                        $login = $this->ion_auth->login($email, 'fumontor123^&*%', 1);
                        
                            $user_info = $this->ion_auth->user()->row(); 
                            $uid =$user_info->id;
                            redirect("users");
                        
                    
                } else {
                    $login = $this->ion_auth->login($email, 'fumontor123^&*%', 1);
                    
                            $user_info = $this->ion_auth->user()->row(); 
                            $uid =$user_info->id;
                            redirect("users");
                        
                }   
                }else{
                    if($this->ion_auth_model->username_check($nickname)){
                        $email=$this->ion_auth_model->getUserEmail($nickname);
                        if ($email==null) {
                            exit();
                        }
                        $login = $this->ion_auth->login($email, 'fumontor123^&*%', 1);
                        if($login){
                            $user_info = $this->ion_auth->user()->row(); 
                            $uid =$user_info->id;
                        redirect("users");                       
                            }
                    }else{
                        echo "error";
                    }
                    
                }

                }

                elseif($this->uri->segment(3) == 'facebook'){
                    //your facebook stuff here         

                }elseif($this->uri->segment(3) == 'foursquare'){
                    // your code stuff here
                }

            // $this->session->set_flashdata('info',$message);
            //     redirect('social?tabindex=s&status=sucess');

            }

            catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }

        }
    }}