<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function login($username, $password) {
        $this->db->select('user_id, user_username, user_password,group_id');
        $this->db->from('users');
        $this->db->where('user_username', $username);
        $this->db->where('user_password', ($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}

?>