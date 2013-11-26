<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class List_member extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pagination'); // ไลบารี่ใช้ทำ pagination 1 2 3 4 5 
        $this->load->library('form_validation');
        $this->load->model("list_member_model");
        $this->load->helper(array('form', 'url'));
    }

    function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $group = $session_data['group_id'];

            //print_r($session_data);
            if ($session_data['group_id'] == 1) {
                redirect('List_member/list_member', '');
            } else {
                $this->load->view('index_view');
            }
        } else {
            //If no session, redirect to login page
            redirect('', 'refresh');
        }
    }

    function list_member() {
        $this->load->model("list_member_model");

        $start = 0;
        $limit = 20;
        $param["list"] = $this->list_member_model->list_member($start, $limit);
        $param["groups"] = $this->list_member_model->groups();


        $session_data = $this->session->userdata('logged_in');
        $param['username'] = $session_data['username'];


        $config['base_url'] = base_url() . "/index.php/list_member/page/"; // ส่วนนี้ จะเป็น link ว่า จะให้ไปที่หน้าไหน ซึ่งเราจะให้ไปที่ method page ด้านล่าง
        $config['total_rows'] = $this->db->count_all("users"); // ส่วนนี้ จะนับว่า ฟิว ทั้งหมดที่อยู่ใน tb_user มีเท่าไหร่
        $config['per_page'] = '20'; // ให้แสดงหน้าละจำนวนเท่าไหร่
        $config['uri_segment'] = 20;
        $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา

        $this->load->view('list_member_view', $param);
    }

    public function page($start = 0) { // กำหนดค่าเริ่มต้นที่ 0
        $this->load->model("list_member_model");
        $limit = 20;
        $param["list"] = $this->list_member_model->list_member($start, $limit);
        $param["groups"] = $this->list_member_model->groups();

        $session_data = $this->session->userdata('logged_in');
        $param['username'] = $session_data['username'];

        $config['base_url'] = base_url() . "/index.php/list_member/page/"; // ส่วนนี้ จะเป็น link ว่า จะให้ไปที่หน้าไหน ซึ่งเราจะให้ไปที่ method page ด้านล่าง
        $config['total_rows'] = $this->db->count_all("users"); // ส่วนนี้ จะนับว่า ฟิว ทั้งหมดที่อยู่ใน tb_user มีเท่าไหร่
        $config['per_page'] = '20'; // ให้แสดงหน้าละจำนวนเท่าไหร่
        $this->pagination->initialize($config);   // จากกนั้น เอาค่า ไป config ใน object pagination ที่เรา load มา

        $this->load->view('list_member_view', $param); // load view index  เพราะใช้ ข้อมูลชุดเดียวกัน
    }

    public function update_member() {
        $user_id = $this->input->post('user_id');
        $group_id = $this->input->post('group_id');
        $this->list_member_model->update_group($group_id, $user_id);

       //echo "<script>alert('Updated');</script>";
        //echo anchor_popup('List_member/list_member', 'Click Me!');
       redirect('List_member/list_member', 'refresh');
    }

}

?>
