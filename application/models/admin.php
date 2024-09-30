<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Model
{
    //fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user_id');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function check($table, $field1)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function input($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function buatkode()
    {

        $this->db->select('RIGHT(tbl_users.id_user,3) as kode', FALSE);
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_users');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // 0 nya ada 4
        $kodejadi = "U" . $kodemax;
        return $kodejadi;
    }
}
