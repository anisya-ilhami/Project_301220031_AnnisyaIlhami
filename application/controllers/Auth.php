<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function register()
    {
        $this->form_validation->set_message('is_unique', 'Email sudah terdaftar, silakan gunakan email lain.');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => 'user',
                'status' => 'on',
                'kota' => $this->input->post('kota', true)
            ];
            $this->User_model->insert_user($data);
            $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
            redirect('auth/register');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $email = strtolower(trim($this->input->post('email', true)));
            $password = $this->input->post('password', true);
            $user = $this->User_model->get_user_by_email($email);
            if ($user) {
                if ($user['status'] == 'on' && password_verify($password, $user['password'])) {
                    $data = [
                        'user_id' => $user['user_id'],
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'level' => $user['level']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['level'] == 'admin') {
                        redirect('admin/dashboard');
                    } else {
                        redirect('user/home');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Password salah atau akun tidak aktif!');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Email tidak terdaftar!');
                redirect('auth/login');
            }
        }
    }
} 