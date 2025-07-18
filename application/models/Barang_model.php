<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {
    public function get_all() {
        return $this->db->get('barang')->result_array();
    }
    public function get($id) {
        return $this->db->get_where('barang', ['barang_id' => $id])->row_array();
    }
    public function insert($data) {
        return $this->db->insert('barang', $data);
    }
    public function update($id, $data) {
        $this->db->where('barang_id', $id);
        return $this->db->update('barang', $data);
    }
    public function delete($id) {
        $this->db->where('barang_id', $id);
        return $this->db->delete('barang');
    }
} 