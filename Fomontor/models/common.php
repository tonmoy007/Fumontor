<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Common extends CI_Model
    {

    function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->dbforge();
        }

   

    //This function will return time and date as a string
    public function iceTime()
        {
        $data = 'UP6';
        $ip     = $_SERVER['REMOTE_ADDR']; // means we got user's IP address 
        $json   = file_get_contents( 'http://smart-ip.net/geoip-json/' . $ip); // this one service we gonna use to obtain timezone by IP
        // maybe it's good to add some checks (if/else you've got an answer and if json could be decoded, etc.)
        $ipData = json_decode( $json, true);

        if ($ipData['timezone']) {
            $tz = new DateTimeZone( $ipData['timezone']);
            $now = new DateTime( 'now', $tz); // DateTime object corellated to user's timezone
            $datestring = "<i class=\"glyphicon mdi-device-access-time\"></i> %h:%i %a  <i class=\"glyphicon glyphicon-calendar\"></i>  %d %M, %Y ";
            $now = time();
            $timezone = $data;
            $time = gmt_to_local($now, $tz);
            echo mdate($datestring, $time);
            return $time;
        } else {
           // we can't determine a timezone - do something else...
            $datestring = "<i class=\"glyphicon mdi-device-access-time\"></i> %h:%i %a  <i class=\"glyphicon glyphicon-calendar\"></i>  %d %M, %Y ";
            $now = time();
            $timezone = $data;
            $time = gmt_to_local($now, $timezone);
            echo mdate($datestring, $time);
            return $time;
        }
        
        }
    public function getlastUserID($table){
               $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `'.$table.'`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }
        return $maxid ;
        }
        
    public function getWhere($a, $b, $c)
        {
        $data = array();
        $query = $this->db->get_where($a, array($b => strval($c)));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    public function getWhere22($a, $b, $c, $d, $e)
        {
        $data = array();
        $query = $this->db->get_where($a, array($b => $c, $d => $e));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    public function getProductImg($productId,$userid){
        $this->load->helper('directory');
        
        $map = directory_map('assets/uploads/'.$userid.'/'.$productId.'/', FALSE, TRUE);
        return $map;
    }

    function split_name($name)
    {
        $name = trim($name);
        if (strpos($name, ' ') === false) {
            // you can return the firstname with no last name
            return array('first_name' => $name, 'last_name' => '');

            // or you could also throw an exception
            // throw Exception('Invalid name specified.');
        }

        $parts     = explode(" ", $name);
        $lastname  = array_pop($parts);
        $firstname = implode(" ", $parts);

        return array('first_name' => $firstname, 'last_name' => $lastname);
    }
    function getAll($table){
         $data = array();
        $query = $this->db->get($table);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
    }

    function getdate(){
        $this->load->helper('date');
        $now = time();

        

        $human = unix_to_human($now);
        $unix = human_to_unix($human);
        $timezone = 'UP5';
        $daylight_saving = FALSE;
        $now=gmt_to_local($unix, $timezone, $daylight_saving);
        echo $now;
        $human = unix_to_human($now);
        echo '  '.$human;
}
    function AllInnerjoin2($table1,$table2,$col1,$col2){
            
            $data = array();

            $this->db->select('*');
            $this->db->from($table1); 
            $this->db->join($table2, $table1.'.'.$col1.'='.$table2.'.'.$col2, 'inner');        
            $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {   
                foreach($query->result_array() as $row){
                    $data[]=$row;
                }
                return $data; 
            }
            else
            {
                return false;
            }
    }





 


 }

