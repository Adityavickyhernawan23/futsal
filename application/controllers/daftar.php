<?php
defined('BASEPATH') or exit('No direct script access allowed');

class daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
    }

    public function index()
    {
        if ($this->admin->logged_id()) {
            redirect("dashboard");
        } else {
            $data['judul'] = 'Buat Akun';
            $data['id'] = $this->admin->buatkode();
            $idk = $this->input->post('nip');
            $nip = $this->db->query("SELECT tbl_datakaryawan.id_karyawan FROM tbl_datakaryawan WHERE tbl_datakaryawan.id_karyawan = '$idk'")->row_array();
            $user = $this->db->query("SELECT tbl_users.id_karyawan FROM tbl_users WHERE tbl_users.id_karyawan = '$idk'")->row_array();

            $this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric|max_length[15]|is_unique[tbl_users.username]');
            $this->form_validation->set_rules('nip', 'NIP', 'required|trim|alpha_numeric|min_length[13]|max_length[15]|is_unique[tbl_users.id_karyawan]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[15]|matches[password1]');
            $this->form_validation->set_rules('password1', 'Konfirmasi Password', 'required|trim|matches[password]');
            $this->form_validation->set_message('regex_match', '{field} harus diisi dengan huruf.');
            $this->form_validation->set_message('alpha_numeric', '{field} harus diisi dengan huruf dan angka.');
            $this->form_validation->set_message('required', '{field} tidak boleh kosong.');
            $this->form_validation->set_message('is_unique', '{field} sudah terdaftar.');
            $this->form_validation->set_message('valid_email', '{field} harus diisi dengan alamat email yang benar.');
            $this->form_validation->set_message('max_length', '{field} harus diisi maksimal 15 karakter.');
            $this->form_validation->set_message('min_length', '{field} harus diisi minimal 13 karakter.');
            $this->form_validation->set_message('matches', 'Password tidak sesuai satu sama lain.');

            if ($this->form_validation->run() == TRUE) {
                $nip = $this->input->post('nip', TRUE);
                $checking = $this->db->get_where('tbl_datakaryawan', ['id_karyawan' => $nip])->row_array();
                if ($checking) {
                    $data = [
                        'id_user' => $this->input->post('iduser'),
                        'id_karyawan' => $this->input->post('nip'),
                        'username' => $this->input->post('username'),
                        'password' => MD5($this->input->post('password')),
                        'status' => 'Member'
                    ];
                    $this->admin->input('tbl_users', $data);
                    $this->session->set_flashdata('flash', 'akun telah terdaftar. Silahkan masuk menggunakan akun anda.');
                    redirect('login');
                } else {
                    $data['judul'] = 'Buat Akun';
                    $this->session->set_flashdata('error', 'NIP yang anda input tidak terdaftar sebagai karyawan.');
                    $this->load->view('template/daftar', $data);
                }
            } else {
                $this->load->view('template/daftar', $data);
            }
        }
    }
}
