<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tolove extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
    }

    /* ฟังชั่น __construct
     * ใช้ให้กระบวนการบางอย่างในคลาสทำงานโดยอัติโนมัติ constructor (ตัวควบคุม)นั้นมันไม่สามารถคืนค่าใดๆออกมาได้ 
     * มันแค่เอาไว้ทำงานโดยอัติโนมัติตอนเริ่มต้นเท่านั้น
     */

    public function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->view('index_view');
    }

}

/* End of file welcome.php */
        /* Location: ./application/controllers/welcome.php */        