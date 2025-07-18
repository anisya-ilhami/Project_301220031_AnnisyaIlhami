<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Kategori_model');
        if (!$this->session->userdata('user_id') || $this->session->userdata('level') != 'admin') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('admin/kategori', $data);
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status')
            ];
            $this->Kategori_model->insert($data);
            redirect('kategori');
        }
        $this->load->view('admin/kategori_form');
    }

    public function edit($id)
    {
        $kategori = $this->Kategori_model->get($id);
        if (!$kategori) redirect('kategori');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status')
            ];
            $this->Kategori_model->update($id, $data);
            redirect('kategori');
        }
        $data['kategori'] = $kategori;
        $this->load->view('admin/kategori_form', $data);
    }

    public function hapus($id)
    {
        $this->Kategori_model->delete($id);
        redirect('kategori');
    }
} 