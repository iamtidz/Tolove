<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verify_Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model', '', TRUE);
    }

    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|required|xss_clean|callback_check_database');

        $this->form_validation->set_message('required', 'คุณยังไม่ได้กรอก %s !!');
        $this->form_validation->set_message('min_length', 'คุณกรอก %s ไม่เป็นไปตามที่กำหนด อาจสั้นเกินไป หรือ กรอกไม่ครบ !!');
        $this->form_validation->set_message('max_length', 'คุณกรอก %s ไม่เป็นไปตามที่กำหนด อาจยาวเกินไป หรือ กรอกเกิน !!');
        $this->form_validation->set_message('valid_email', 'คุณกรอก %s ไม่ถูกต้อง !! ');

        if ($this->form_validation->run() == FALSE) {
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
            
          $this->load->view('index_view');
        } else {
            
            redirect('home', 'refresh');
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->users_model->login($username, $password);
        
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->user_id,
                    'username' => $row->user_username,
                        'group_id'=>$row->group_id,
                );
                        $this->session->set_userdata('logged_in', $sess_array);
                        //set ค่า session
                                               
            }
        $user_id =$sess_array['id']; 
        $date = date("Y-m-d");
        $data = array
            (
            'user_online_date' => $date,
        );
        $this->db->where('user_id', $user_id);
        return $this->db->update('users', $data);
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง');
            return false;
        }
        
    }

}
?>