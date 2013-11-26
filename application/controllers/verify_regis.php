<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verify_regis extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('regis_model', '', TRUE);
    }

    function index() {


        $this->load->helper('date');

        $date = date("Y-m-d");
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|required|xss_clean|callback_check_database');
        $this->form_validation->set_rules('repassword', 'ยืนยันรหัสผ่าน', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'ชื่อ', 'trim|required|xss_clean');
        $this->form_validation->set_rules('surname', 'นามสกุล', 'trim|required|xss_clean');
        $this->form_validation->set_rules('birthday', 'วันเกิด', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'อีเมล', 'trim|required|valid_email');
        $this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'ที่อยู่', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fackbook', 'ที่อยู่ Facebook', 'trim|required|xss_clean');
        $this->form_validation->set_rules('avatar', 'รูปภาพ', '');


        $this->form_validation->set_message('required', 'คุณยังไม่ได้กรอก %s !!');
        $this->form_validation->set_message('min_length', 'คุณกรอก %s ไม่เป็นไปตามที่กำหนด อาจสั้นเกินไป หรือ กรอกไม่ครบ !!');
        $this->form_validation->set_message('max_length', 'คุณกรอก %s ไม่เป็นไปตามที่กำหนด อาจยาวเกินไป หรือ กรอกเกิน !!');
        $this->form_validation->set_message('valid_email', 'คุณกรอก %s ไม่ถูกต้อง !! ');

        if ($this->form_validation->run() == FALSE) {
            //echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";

            $this->load->view('index_view');
        } else {
            $data = array
                (
                'user_username' => $this->input->post("username"),
                'user_password' => $this->input->post("password"),
                'user_name' => $this->input->post("name"),
                'user_surname' => $this->input->post("surname"),
                'user_birthday' => $this->input->post("birthday"),
                'user_email' => $this->input->post("email"),
                'user_phone' => $this->input->post("tel"),
                'user_address' => $this->input->post("address"),
                'user_fb' => $this->input->post("fackbook"),
                'user_logo_avatar' => $this->input->post("avatar"),
                'user_into_date' => $date,
                'group_id'=>2,
                'user_status_id'=>1,
            );
            if ($this->regis_model->insert($data)) {//เช็คเงื่อนไข พร้อม ส่งค่าตัวแปร data ไปยัง page_model ฟังชั่น insert
                echo "<script type=\"text/javascript\">alert('Saved  !!')</script>";
                $this->load->view('index_view');
                //$this->load->view('admin_view');
                // print "<meta http-equiv=refresh content=2;URL=http://localhost/CI/index.php/Welcome/pageAdmin>";
            }
        }
    }

}

?>