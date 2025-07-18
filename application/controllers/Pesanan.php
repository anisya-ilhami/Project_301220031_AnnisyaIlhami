<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Pesanan_model');
        $this->load->model('Konfirmasi_model');
        if (!$this->session->userdata('user_id') || $this->session->userdata('level') != 'admin') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['pesanan'] = $this->Pesanan_model->get_all();
        $data['konfirmasi'] = $this->Konfirmasi_model->get_all();
        $this->load->view('admin/pesanan', $data);
    }

    public function konfirmasi($id)
    {
        $this->Pesanan_model->update_status($id, 'selesai');
        redirect('pesanan');
    }

    public function hapus($id)
    {
        $this->Pesanan_model->delete($id);
        redirect('pesanan');
    }

    public function konfirmasi_pembayaran()
    {
        $data['konfirmasi'] = $this->Konfirmasi_model->get_all();
        $this->load->view('admin/konfirmasi_pembayaran', $data);
    }

    public function konfirmasi_pesanan($id)
    {
        $this->Pesanan_model->update_status($id, 'selesai');
        redirect('pesanan');
    }
} 