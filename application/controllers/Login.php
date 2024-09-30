<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_message('required', '<small class="text-danger"><i>{field} tidak boleh kosong.</i></small>');

            if ($this->form_validation->run() == TRUE) {

                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post("password", TRUE));

                // $checking = $this->admin->check_login('tbl_users', array('username' => $username), array('password' => $password));
                $checking = $this->db->get_where('tbl_users', ['username' => $username, 'password' => $password])->row_array();

                if ($checking) {
                    $id = $checking['id_user'];
                    $idk = $checking['id_karyawan'];
                    $status = $checking['status'];
                    $user = $this->db->query("SELECT tbl_datakaryawan.*, tbl_jabatan.nama_jabatan, tbl_divisi.divisi FROM tbl_datakaryawan INNER JOIN tbl_jabatan ON tbl_datakaryawan.jabatan = tbl_jabatan.id_jabatan INNER JOIN tbl_divisi ON tbl_datakaryawan.bagian = tbl_divisi.id_divisi WHERE id_karyawan = '$idk'")->row_array();

                    $session_data = [
                        'user_id'       => $id,
                        'id_karyawan'   => $idk,
                        'user_name'     => $username,
                        'user_pass'     => $password,
                        'status'        => $status,
                        'nama'          => $user['nama_karyawan'],
                        'jabatan'       => $user['nama_jabatan'],
                        'divisi'        => $user['divisi'],
                        'foto'          => $user['foto'],
                    ];

                    $this->session->set_userdata($session_data);

                    redirect('dashboard');
                } else {
                    $data['judul'] = 'Login';
                    $this->session->set_flashdata('error', 'Data yang anda masukan salah.');

                    // $data['error'] = '<div class="alert alert-danger mb-3" style="margin-top: 3px">
                    //     <div class="header"><a href="#" class="close" data-dismiss="alert">&times;</a><b><i class="fa fa-exclamation-circle"></i></b> Username atau Password salah.</div></div>';
                    $this->load->view('template/login', $data);
                }
            } else {
                $data['judul'] = 'Login';
                $this->load->view('template/login', $data);
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("Login");
    }
}
