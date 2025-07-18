<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Barang_model');
        // Cek admin
        if (!$this->session->userdata('user_id') || $this->session->userdata('level') != 'admin') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['produk'] = $this->Barang_model->get_all();
        $this->load->view('admin/produk', $data);
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama_barang' => $this->input->post('nama_barang'),
                'kategori_id' => $this->input->post('kategori_id'),
                'stok' => $this->input->post('stok'),
                'status' => $this->input->post('status'),
                'gambar' => $this->input->post('gambar')
            ];
            $this->Barang_model->insert($data);
            redirect('produk');
        }
        $this->load->view('admin/produk_form');
    }

    public function edit($id)
    {
        $produk = $this->Barang_model->get($id);
        if (!$produk) redirect('produk');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama_barang' => $this->input->post('nama_barang'),
                'kategori_id' => $this->input->post('kategori_id'),
                'stok' => $this->input->post('stok'),
                'status' => $this->input->post('status'),
                'gambar' => $this->input->post('gambar')
            ];
            $this->Barang_model->update($id, $data);
            redirect('produk');
        }
        $data['produk'] = $produk;
        $this->load->view('admin/produk_form', $data);
    }

    public function hapus($id)
    {
        $this->Barang_model->delete($id);
        redirect('produk');
    }
} 