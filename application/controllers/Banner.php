<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Banner_model');
        if (!$this->session->userdata('user_id') || $this->session->userdata('level') != 'admin') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['banner'] = $this->Banner_model->get_all();
        $this->load->view('admin/banner', $data);
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'banner' => $this->input->post('banner'),
                'gambar' => $this->input->post('gambar'),
                'link' => $this->input->post('link'),
                'status' => $this->input->post('status')
            ];
            $this->Banner_model->insert($data);
            redirect('banner');
        }
        $this->load->view('admin/banner_form');
    }

    public function edit($id)
    {
        $banner = $this->Banner_model->get($id);
        if (!$banner) redirect('banner');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'banner' => $this->input->post('banner'),
                'gambar' => $this->input->post('gambar'),
                'link' => $this->input->post('link'),
                'status' => $this->input->post('status')
            ];
            $this->Banner_model->update($id, $data);
            redirect('banner');
        }
        $data['banner'] = $banner;
        $this->load->view('admin/banner_form', $data);
    }

    public function hapus($id)
    {
        $this->Banner_model->delete($id);
        redirect('banner');
    }
} 