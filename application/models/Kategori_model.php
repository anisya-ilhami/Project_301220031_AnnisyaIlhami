<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    public function get_all() {
        return $this->db->get('kategori')->result_array();
    }
    public function get($id) {
        return $this->db->get_where('kategori', ['kategori_id' => $id])->row_array();
    }
    public function insert($data) {
        return $this->db->insert('kategori', $data);
    }
    public function update($id, $data) {
        $this->db->where('kategori_id', $id);
        return $this->db->update('kategori', $data);
    }
    public function delete($id) {
        $this->db->where('kategori_id', $id);
        return $this->db->delete('kategori');
    }
} 