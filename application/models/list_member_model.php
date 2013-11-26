<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class List_member_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_member($start, $limit) {

        $this->db->limit($limit, $start);
        //$this->db->where('users.group_id', 2);
        $this->db->where('deleted', 0);
        $this->db->join('groups', 'users.group_id =  groups.group_id');
        $this->db->join('users_status', 'users.user_status_id =  users_status.user_status_id');
        return $this->db->get('users')->result_array();
    }

    function groups() {
        return $this->db->get('groups')->result_array();
    }

    function update_group($group_id,$user_id) {
        $i=0;
        count($user_id);
        //echo count($user_id);
        
        while ($i<count($user_id)){
            
        //print_r($group_id);
        //print_r($user_id);
        $this->db->where('user_id', $user_id[$i]);
        $this->db->set('group_id',$group_id[$i]);
        $this->db->update('users');
        
        $i++;
        }
    }

}

?>