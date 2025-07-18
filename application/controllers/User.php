<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // Cek apakah user sudah login dan level user
        if (!$this->session->userdata('user_id') || $this->session->userdata('level') != 'user') {
            redirect('auth/login');
        }
    }

    public function home()
    {
        $this->load->view('user/home');
    }

    public function admin_access()
    {
        if ($this->input->post('admin_password') === '868686') {
            $this->session->set_userdata('level', 'admin');
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Password admin salah!');
            redirect('user/home');
        }
    }
} 