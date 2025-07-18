<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {
    public function get_all() {
        return $this->db->get('banner')->result_array();
    }
    public function get($id) {
        return $this->db->get_where('banner', ['banner_id' => $id])->row_array();
    }
    public function insert($data) {
        return $this->db->insert('banner', $data);
    }
    public function update($id, $data) {
        $this->db->where('banner_id', $id);
        return $this->db->update('banner', $data);
    }
    public function delete($id) {
        $this->db->where('banner_id', $id);
        return $this->db->delete('banner');
    }
} 