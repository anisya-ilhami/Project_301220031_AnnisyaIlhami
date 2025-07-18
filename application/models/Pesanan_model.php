<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {
    public function get_all() {
        return $this->db->get('pesanan')->result_array();
    }
    public function update_status($id, $status) {
        $this->db->where('pesanan_id', $id);
        return $this->db->update('pesanan', ['status' => $status]);
    }
    public function delete($id) {
        $this->db->where('pesanan_id', $id);
        return $this->db->delete('pesanan');
    }
} 