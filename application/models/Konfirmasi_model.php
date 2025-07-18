<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_model extends CI_Model {
    public function get_all() {
        return $this->db->get('konfirmasi_pembayaran')->result_array();
    }
} 