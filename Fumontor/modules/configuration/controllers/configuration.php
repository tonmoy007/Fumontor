<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Configuration extends MX_Controller
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
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        }

    //This function is useing for control the weekly holyday.
    public function conWeeklyDay()
        {
        if ($this->input->post('submit',TRUE)) {
            $dayId_1 = $this->input->post('dayID1',TRUE);
            $status_1 = $this->input->post('status1',TRUE);
            $data = array(
                'status' => $this->db->escape_like_str($status_1),
            );
            $this->db->where('day_name', $dayId_1);
            $this->db->update('config_week_day', $data);

            $dayId_2 = $this->input->post('dayID2',TRUE);
            $status_2 = $this->input->post('status2',TRUE);
            $data2 = array(
                'status' => $this->db->escape_like_str($status_2),
            );
            $this->db->where('day_name', $dayId_2);
            $this->db->update('config_week_day', $data2);

            $dayId_3 = $this->input->post('dayID3',TRUE);
            $status_3 = $this->input->post('status3',TRUE);
            $data3 = array(
                'status' => $this->db->escape_like_str($status_3),
            );
            $this->db->where('day_name', $dayId_3);
            $this->db->update('config_week_day', $data3);

            $dayId_4 = $this->input->post('dayID4',TRUE);
            $status_4 = $this->input->post('status4',TRUE);
            $data4 = array(
                'status' => $this->db->escape_like_str($status_4),
            );
            $this->db->where('day_name', $dayId_4);
            $this->db->update('config_week_day', $data4);

            $dayId_5 = $this->input->post('dayID5',TRUE);
            $status_5 = $this->input->post('status5',TRUE);
            $data5 = array(
                'status' => $this->db->escape_like_str($status_5),
            );
            $this->db->where('day_name', $dayId_5);
            $this->db->update('config_week_day', $data5);

            $dayId_6 = $this->input->post('dayID6',TRUE);
            $status_6 = $this->input->post('status6',TRUE);
            $data6 = array(
                'status' => $this->db->escape_like_str($status_6),
            );
            $this->db->where('day_name', $dayId_6);
            $this->db->update('config_week_day', $data6);

            $dayId_7 = $this->input->post('dayID7',TRUE);
            $status_7 = $this->input->post('status7',TRUE);
            $data7 = array(
                'status' => $this->db->escape_like_str($status_7),
            );
            $this->db->where('day_name', $dayId_7);
            $this->db->update('config_week_day', $data7);
            redirect('configuration/conWeeklyDay', 'refresh');
        } else {
            $data['WeeklyDay'] = $this->common->getAllData('config_week_day');
            $this->load->view('temp/header');
            $this->load->view('configurWeeklyDay', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function is setting the examination seatting
    public function generalSetting()
        {

        if ($this->input->post('submit',TRUE)) {
            //here is checking that configuration table is empty or not.
            if ($this->db->empty_table('configuration')) {
                
                $insertArray = array(
                    'school_name' => $this->db->escape_like_str($this->input->post('schoolName',TRUE)),
                    'starting_year' => $this->db->escape_like_str($this->input->post('startingDate',TRUE)),
                    'headmaster_name' => $this->db->escape_like_str($this->input->post('headmasterName',TRUE)),
                    'address' => $this->db->escape_like_str($this->input->post('address',TRUE)),
                    'phone' => $this->db->escape_like_str($this->input->post('phone',TRUE)),
                    'email' => $this->db->escape_like_str($this->input->post('email',TRUE)),
                    'currenct' => $this->db->escape_like_str($this->input->post('currency',TRUE)),
                    'country' => $this->db->escape_like_str($this->input->post('country',TRUE)),
                    'time_zone' => $this->db->escape_like_str($this->input->post('timeZone',TRUE))
                );
                $this->db->insert('configuration', $insertArray);
                $data['message'] = "This system's settings is completed Now.<br><h3>Thank You</h3>";

                $data['info'] = $this->common->getAllData('configuration');
                //Now lode view with success message
                $this->load->view('temp/header');
                $this->load->view('generalSettings', $data);
                $this->load->view('temp/footer');
                
                
                
//                echo 'ok';
            } else {
                $insertArray = array(
                    'school_name' => $this->db->escape_like_str($this->input->post('schoolName',TRUE)),
                    'starting_year' => $this->db->escape_like_str($this->input->post('startingDate',TRUE)),
                    'headmaster_name' => $this->db->escape_like_str($this->input->post('headmasterName',TRUE)),
                    'address' => $this->db->escape_like_str($this->input->post('address',TRUE)),
                    'phone' => $this->db->escape_like_str($this->input->post('phone',TRUE)),
                    'email' => $this->db->escape_like_str($this->input->post('email',TRUE)),
                    'currenct' => $this->db->escape_like_str($this->input->post('currency',TRUE)),
                    'country' => $this->db->escape_like_str($this->input->post('country',TRUE)),
                    'time_zone' => $this->db->escape_like_str($this->input->post('timeZone',TRUE))
                );

                $this->db->where('id', '0');
                $this->db->update('configuration', $insertArray);
                $data['message'] = "This system\s settings is completed Now.<br><h3>Thank You</h3>";
                $data['info'] = $this->common->getAllData('configuration');
                //Now lode view with success message
                $this->load->view('temp/header');
                $this->load->view('generalSettings', $data);
                $this->load->view('temp/footer');
                
//                echo 'tttt ok';
            }
        } else {
            $data['info'] = $this->common->getAllData('configuration');
            $this->load->view('temp/header');
            $this->load->view('generalSettings', $data);
            $this->load->view('temp/footer');
        }
        }

    }
