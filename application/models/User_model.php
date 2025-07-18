<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function insert_user($data)
    {
        return $this->db->insert('user', $data);
    }

    public function get_user_by_email($email)
    {
        $this->db->where('LOWER(email)', strtolower($email));
        return $this->db->get('user')->row_array();
    }
} 