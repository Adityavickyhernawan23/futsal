<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_features extends CI_Model
{
    //function kode otomatis
    public function buat_kode()
    {

        $this->db->select('RIGHT(tbl_jabatan.id_jabatan,4) as kode', FALSE);
        $this->db->order_by('id_jabatan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_jabatan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // 0 nya ada 4
        $kodejadi = "JB" . $kodemax;
        return $kodejadi;
    }

    public function kodeuser()
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

    public function kodetunjangan()
    {

        $this->db->select('RIGHT(tbl_tunjangan.id_tunjangan,3) as kode', FALSE);
        $this->db->order_by('id_tunjangan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_tunjangan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // 0 nya ada 4
        $kodejadi = "T" . $kodemax;
        return $kodejadi;
    }

    public function kodeshift()
    {

        $this->db->select('RIGHT(tbl_shift.id_shift,3) as kode', FALSE);
        $this->db->order_by('id_shift', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_shift');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // 0 nya ada 4
        $kodejadi = "S" . $kodemax;
        return $kodejadi;
    }

    public function kodedivisi()
    {

        $this->db->select('RIGHT(tbl_divisi.id_divisi,2) as kode', FALSE);
        $this->db->order_by('id_divisi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_divisi');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // 0 nya ada 4
        $kodejadi = "D" . $kodemax;
        return $kodejadi;
    }

    public function kodestatus()
    {

        $this->db->select('RIGHT(tbl_pernikahan.id_status,2) as kode', FALSE);
        $this->db->order_by('id_status', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_pernikahan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // 0 nya ada 4
        $kodejadi = "K" . $kodemax;
        return $kodejadi;
    }
    public function kode_karyawan()
    {

        $this->db->select('RIGHT(tbl_datakaryawan.id_karyawan,5) as kode', FALSE);
        $this->db->order_by('id_karyawan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_datakaryawan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodejadi = "PG" . date("Ym") . $kodemax;
        return $kodejadi;
    }

    //function hitung-hitungan
    public function hitungjabatan()
    {
        $query = $this->db->get('tbl_jabatan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function hitunguser()
    {
        $query = $this->db->get('tbl_users');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function hitungkaryawan()
    {
        $query = $this->db->get('tbl_datakaryawan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function hitungtunjangan()
    {
        $query = $this->db->get('tbl_divisi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    //karyawan
    public function tampil_data()
    {
        return $this->db->get('tbl_datakaryawan')->result();
    }
    //user
    public function ambildatauser()
    {
        return $this->db->get('tbl_users')->result();
    }

    //fungsi untuk jabatan
    public function ambildatajabatan()
    {
        return $this->db->get('tbl_jabatan')->result();
    }

    public function ambildatatunjangan()
    {
        return $this->db->get('tbl_tunjangan')->result();
    }

    public function ambildatashift()
    {
        return $this->db->get('tbl_shift')->result();
    }

    public function inputjabatan()
    {
        $id = $this->input->post('idjabatan');
        $nama = $this->input->post('namajabatan');
        $gaji = $this->input->post('gajipokokjabatan');
        $tunjangan = $this->input->post('tunjanganjabatan');
        $data = array(
            'id_jabatan' => $id,
            'nama_jabatan' => $nama,
            'gaji_pokok' => $gaji,
            'tunjangan' => $tunjangan
        );
        return $this->db->insert('tbl_jabatan', $data);
    }

    public function updatejabatan()
    {
        $id = $this->input->post('idjabatan');
        $nama = $this->input->post('namajabatan');
        $gaji = $this->input->post('gajipokokjabatan');
        $tunjangan = $this->input->post('tunjanganjabatan');
        $data = array(
            'id_jabatan' => $id,
            'nama_jabatan' => $nama,
            'gaji_pokok' => $gaji,
            'tunjangan' => $tunjangan
        );
        $this->db->where('id_jabatan', $this->input->post('idjabatan'));
        $this->db->update('tbl_jabatan', $data);
    }

    public function updateuser()
    {
        $id = $this->input->post('iduser');
        $Username = $this->input->post('username');
        $Status = $this->input->post('status');
        $data = array(
            'id_user' => $id,
            'username' => $Username,
            'status' => $Status
        );
        $this->db->where('id_user', $this->input->post('iduser'));
        $this->db->update('tbl_users', $data);
    }

    public function inputtunjangan()
    {
        $id = $this->input->post('idtunjangan');
        $nama = $this->input->post('namatunjangan');
        $jenis = $this->input->post('jenistunjangan');
        $nominal = $this->input->post('nominaltunjangan');
        $data = array(
            'id_tunjangan' => $id,
            'nama_tunjangan' => $nama,
            'nominal' => $nominal,
            'jenis' => $jenis
        );
        return $this->db->insert('tbl_tunjangan', $data);
    }

    public function edittunjangan()
    {
        $id = $this->input->post('idtunjangan');
        $nama = $this->input->post('namatunjangan');
        $jenis = $this->input->post('jenistunjangan');
        $nominal = $this->input->post('nominaltunjangan');
        $data = array(
            'id_tunjangan' => $id,
            'nama_tunjangan' => $nama,
            'nominal' => $nominal,
            'jenis' => $jenis
        );
        $this->db->where('id_tunjangan', $this->input->post('idtunjangan'));
        $this->db->update('tbl_tunjangan', $data);
    }

    public function inputstatus()
    {
        $id = $this->input->post('idstatus');
        $nama = $this->input->post('namastatus');
        $jumlah = $this->input->post('jumlahtanggungan');
        $data = array(
            'id_status' => $id,
            'status' => $nama,
            'jumlah_tanggungan' => $jumlah
        );
        return $this->db->insert('tbl_pernikahan', $data);
    }

    public function editstatus()
    {
        $id = $this->input->post('idstatus');
        $nama = $this->input->post('namastatus');
        $jumlah = $this->input->post('jumlahtanggungan');
        $data = array(
            'id_status' => $id,
            'status' => $nama,
            'jumlah_tanggungan' => $jumlah
        );
        $this->db->where('id_status', $this->input->post('idstatus'));
        $this->db->update('tbl_pernikahan', $data);
    }

    public function input($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update($table, $data, $id, $tes)
    {
        $this->db->where($tes, $id);
        $this->db->update($table, $data);
    }

    //status
    public function profil()
    {
        return $this->db->get('tbl_users')->result();
    }

    public function datastatus()
    {
        return $this->db->get('tbl_pernikahan')->result();
    }

    public function jabatan()
    {
        return $this->db->get('tbl_jabatan')->result();
    }
    //inputkaryawan
    public function input_datakaryawan($data, $table)
    {
        $this->db->insert($table, $data);
    }
    //editkaryawan
    public function edit_datakaryawan($data, $table, $id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->update($table, $data);
    }
}
