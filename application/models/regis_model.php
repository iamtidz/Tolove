<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regis_model extends CI_Model 
{

    function __construct() 
    {
        parent::__construct();
    }

   
       
    function insert($data)
 {
        //print_r($data);
    return $this->db->insert('users', $data); 
    
}

}

?>