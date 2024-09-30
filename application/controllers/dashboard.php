<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
    }

    public function index()
    {
        if ($this->admin->logged_id()) {
            $data['judul'] = 'Dashboard';
            $data['jabatan'] = $this->m_features->hitungjabatan();
            $data['user'] = $this->m_features->hitunguser();
            $data['karyawan'] = $this->m_features->hitungkaryawan();
            $data['tunjangan'] = $this->m_features->hitungtunjangan();
            $this->load->view('template/header', $data);
            $this->load->view('template/dashboard', $data);
            $this->load->view('template/footer');
        } else {
            redirect("Login");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
