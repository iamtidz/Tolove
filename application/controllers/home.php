<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $session_data['group_id'];
           
            //print_r($session_data);
            if($session_data['group_id']==1){
                $this->load->view('admin_view',$data);
                  }else if($session_data['group_id']==2){
                   $this->load->view('member_view',$data);
                      
                  }
        
           
        } else {
            //If no session, redirect to login page
            redirect('', 'refresh');
        }
    }


    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('', 'refresh');
    }

}

?>
