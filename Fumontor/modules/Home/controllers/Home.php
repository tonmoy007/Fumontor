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
        $this->load->model('homemodel');
        
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
    public function signin(){
        $this->load->view('loginpage');
    }


    function detect_city($ip) {
        
        $default = 'UNKNOWN';

        if (!is_string($ip) || strlen($ip) < 1 || $ip == '127.0.0.1' || $ip == 'localhost')
            $ip = '8.8.8.8';

        $curlopt_useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)';
        
        $url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);
        $ch = curl_init();
        
        $curl_opt = array(
            CURLOPT_FOLLOWLOCATION  => 1,
            CURLOPT_HEADER      => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_USERAGENT   => $curlopt_useragent,
            CURLOPT_URL       => $url,
            CURLOPT_TIMEOUT         => 1,
            CURLOPT_REFERER         => 'http://' . $_SERVER['HTTP_HOST'],
        );
        
        curl_setopt_array($ch, $curl_opt);
        
        $content = curl_exec($ch);
        
        if (!is_null($curl_info)) {
            $curl_info = curl_getinfo($ch);
        }
        
        curl_close($ch);
        
        if ( preg_match('{<li>City : ([^<]*)</li>}i', $content, $regs) )  {
            $city = $regs[1];
        }
        if ( preg_match('{<li>State/Province : ([^<]*)</li>}i', $content, $regs) )  {
            $state = $regs[1];
        }

        if( $city!='' && $state!='' ){
          $location = $city . ', ' . $state;
          return $location;
        }else{
          return $default; 
        }
        
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

function detect_location($ip=NULL, $asArray=FALSE) {
    if (empty($ip)) {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) { $ip = $_SERVER['HTTP_CLIENT_IP']; }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
        else { $ip = $_SERVER['REMOTE_ADDR']; }
    }
    elseif (!is_string($ip) || strlen($ip) < 1 || $ip == '127.0.0.1' || $ip == 'localhost') {
        $ip = '8.8.8.8';
    }

    $url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);
    $i = 0; $content; $curl_info;

    while (empty($content) && $i < 5) {
        $ch = curl_init();
        $curl_opt = array(
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_URL => $url,
            CURLOPT_TIMEOUT => 1,
            CURLOPT_REFERER => 'http://' . $_SERVER['HTTP_HOST'],
        );
        if (isset($_SERVER['HTTP_USER_AGENT'])) $curl_opt[CURLOPT_USERAGENT] = $_SERVER['HTTP_USER_AGENT'];
        curl_setopt_array($ch, $curl_opt);
        $content = curl_exec($ch);
        if (!is_null($curl_info)) $curl_info = curl_getinfo($ch);
        curl_close($ch);
    }

    $araResp = array();
    if (preg_match('{<li>City : ([^<]*)</li>}i', $content, $regs)) $araResp['city'] = trim($regs[1]);
    if (preg_match('{<li>State/Province : ([^<]*)</li>}i', $content, $regs)) $araResp['state'] = trim($regs[1]);
    if (preg_match('{<li>Country : ([^<]*)}i', $content, $regs)) $araResp['country'] = trim($regs[1]);
    if (preg_match('{<li>Zip or postal code : ([^<]*)</li>}i', $content, $regs)) $araResp['zip'] = trim($regs[1]);
    if (preg_match('{<li>Latitude : ([^<]*)</li>}i', $content, $regs)) $araResp['latitude'] = trim($regs[1]);
    if (preg_match('{<li>Longitude : ([^<]*)</li>}i', $content, $regs)) $araResp['longitude'] = trim($regs[1]);
    if (preg_match('{<li>Timezone : ([^<]*)</li>}i', $content, $regs)) $araResp['timezone'] = trim($regs[1]);
    if (preg_match('{<li>Hostname : ([^<]*)</li>}i', $content, $regs)) $araResp['hostname'] = trim($regs[1]);

    $strResp = ($araResp['city'] != '' && $araResp['state'] != '') ? ($araResp['city'] . ', ' . $araResp['state']) : 'UNKNOWN';

    return $asArray ? $araResp : $strResp;
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
        'products'=>$this->homemodel->getProducts()
        );
    echo json_encode($data);
}
function fileReader(){
    $this->load->view('fileReader');
}




}
