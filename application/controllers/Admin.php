<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // Cek apakah user sudah login dan level admin
        if (!$this->session->userdata('user_id') || $this->session->userdata('level') != 'admin') {
            redirect('auth/login');
        }
    }

    public function dashboard()
    {
        $this->load->view('admin/dashboard');
    }

    public function to_user_dashboard()
    {
        $this->session->set_userdata('level', 'user');
        redirect('user/home');
    }
} 