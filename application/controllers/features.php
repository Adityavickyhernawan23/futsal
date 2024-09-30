<?php
defined('BASEPATH') or exit('No direct script access allowed');

class features extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
		$this->load->library('form_validation');
		$this->load->helper('tgl_indo');
		require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
	}

	//function untuk halaman
	public function profile($id)
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Profil';
			$id = $this->uri->segment(3);
			$data['profil'] = $this->db->query("SELECT tbl_users.id_user, tbl_datakaryawan.* FROM tbl_users INNER JOIN tbl_datakaryawan ON tbl_users.id_karyawan = tbl_datakaryawan.id_karyawan WHERE tbl_users.id_user = '$id'")->row_array();
			$this->load->view('template/header', $data);
			$this->load->view('template/profil');
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function datauser()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Data User';
			$data['data'] = $this->db->query("SELECT tbl_users.*, tbl_datakaryawan.nama_karyawan, tbl_divisi.* FROM tbl_users INNER JOIN tbl_datakaryawan ON tbl_users.id_karyawan = tbl_datakaryawan.id_karyawan INNER JOIN tbl_divisi ON tbl_datakaryawan.bagian = tbl_divisi.id_divisi")->result();
			$this->load->view('template/header', $data);
			$this->load->view('template/datauser', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function edituser()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Form Edit User';
			$id = $this->uri->segment(3);
			$data['usr'] = $this->db->get_where('tbl_users', ['id_user' => $id])->row_array();

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_message('required', '<i style="color:#a6230c;">{field} tidak boleh kosong.</i>');

			if ($this->form_validation->run() != false) {
				$this->m_features->updateuser();
				$this->session->set_flashdata('flash', 'telah berhasil diubah.');
				redirect('features/datauser');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formuser', $data);
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function polashift($id)
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Pola Shift Karyawan';
			$data['shift'] = $this->db->get('tbl_shift')->result();
			$data['karyawan'] = $this->db->get_where('tbl_datakaryawan', ['id_karyawan' => $id])->row_array();
			$data['biodata'] = $this->db->get_where('tbl_datakaryawan', ['id_karyawan' => $id])->row_array();

			$id = $this->uri->segment(3);

			$day   = date('l');
			$hari = array(
				'Monday'  => 'Senin',
				'Tuesday'  => 'Selasa',
				'Wednesday' => 'Rabu',
				'Thursday' => 'Kamis',
				'Friday' => 'Jumat',
				'Saturday' => 'Sabtu',
				'Sunday' => 'Minggu'
			);

			$data['jadwal'] = $this->db->query("SELECT tbl_pola.*, tbl_shift.nama_shift, tbl_datakaryawan.nama_karyawan FROM tbl_pola INNER JOIN tbl_shift ON tbl_shift.id_shift = tbl_pola.id_shift INNER JOIN tbl_datakaryawan ON tbl_datakaryawan.id_karyawan = tbl_pola.id_karyawan WHERE tbl_pola.id_karyawan = '$id' ")->result();
			// $data['hitung'] = $this->db->query('SELECT * FROM tbl_pola, datediff(tgl_awal, tgl_akhir) AS periode ')
			// $tgl1 = new DateTime("2019-11-01");
			// $tgl2 = new DateTime("2019-12-31");
			// $d = $tgl2->diff($tgl1)->days;
			// echo $id;
			$this->load->view('template/header', $data);
			$this->load->view('template/pola', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function hapusjadwal($id)
	{
		# code...
	}

	public function hitunghari()
	{
		$tgl1 = new DateTime($this->input->post('tgl1'));
		$tgl2 = new DateTime($this->input->post('tgl2'));
		$d = $tgl2->diff($tgl1)->days;
		// echo $d;
		$tgl3 = '';
		for ($i = 0; $i <= $d; $i++) {
			// $days = 'days';
			// $naon = "$i $days";
			$tgl3 = date('Y-m-d', strtotime("$i days",  strtotime($this->input->post('tgl1'))));
			echo " " . $tgl3;
			$data = [
				'tgl_kerja' => $tgl3,
				'id_karyawan' => $this->input->post('idkaryawan'),
				'id_shift' => $this->input->post('shift')
			];
			$id = $this->input->post('idkaryawan');
			$this->m_features->input('tbl_pola', $data);
		}
		redirect("features/polashift/$id");
	}

	public function dataabsen()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Data Shift Karyawan';
			$tgl = date('Y-m-d');
			// $data['naon'] = $this->db->query("SELECT * FROM tbl_pola")->result();
			//SELECT tbl_jabatan.nama_jabatan, tbl_datakaryawan.* FROM tbl_jabatan INNER JOIN tbl_datakaryawan ON tbl_datakaryawan.jabatan = tbl_jabatan.id_jabatan'
			$data['naon'] = $this->db->query("SELECT tbl_pola.*, tbl_datakaryawan.nama_karyawan, tbl_shift.nama_shift FROM tbl_pola INNER JOIN tbl_datakaryawan ON tbl_datakaryawan.id_karyawan = tbl_pola.id_karyawan INNER JOIN tbl_shift ON tbl_shift.id_shift = tbl_pola.id_shift WHERE tgl_kerja = '$tgl' ORDER BY tgl_kerja ASC")->result();
			// $data['tabel'] = $this->db->getwhere('tbl_absensi', ['tgl_masuk' => $tgl])->row_array();	
			$this->load->view('template/header', $data);
			$this->load->view('template/dataabsen', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function dataabsenkaryawan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Data Shift Karyawan';
			$tgl = date('Y-m');
			$id = $this->uri->segment(3);
			// $data['naon'] = $this->db->query("SELECT * FROM tbl_pola")->result();
			//SELECT tbl_jabatan.nama_jabatan, tbl_datakaryawan.* FROM tbl_jabatan INNER JOIN tbl_datakaryawan ON tbl_datakaryawan.jabatan = tbl_jabatan.id_jabatan'
			$data['naon'] = $this->db->query("SELECT tbl_pola.*, tbl_datakaryawan.nama_karyawan, tbl_shift.nama_shift FROM tbl_pola INNER JOIN tbl_datakaryawan ON tbl_datakaryawan.id_karyawan = tbl_pola.id_karyawan INNER JOIN tbl_shift ON tbl_shift.id_shift = tbl_pola.id_shift WHERE tbl_pola.id_karyawan = '$id' ")->result();
			// $data['tabel'] = $this->db->getwhere('tbl_absensi', ['tgl_masuk' => $tgl])->row_array();	
			$this->load->view('template/header', $data);
			$this->load->view('template/dataabsen', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function absen()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Absen Harian';
			$tgl = date('Y-m-d');
			$data['presensi'] = $this->db->query("SELECT tbl_pola.*, tbl_shift.nama_shift FROM tbl_pola INNER JOIN tbl_shift ON tbl_pola.id_shift = tbl_shift.id_shift WHERE tgl_kerja = '$tgl' AND status = ''")->result();
			// $data['tabel'] = $this->db->getwhere('tbl_absensi', ['tgl_masuk' => $tgl])->row_array();	
			$this->load->view('template/header', $data);
			$this->load->view('template/absen', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function inputabsen($id)
	{
		$tgl = date('Y-m-d');
		$data = [
			'status' => $this->input->post('hadir')
		];
		$where = [
			'id_karyawan' => $this->input->post('kry'),
			'tgl_kerja' => $tgl
		];
		$this->db->where('id_karyawan', $this->uri->segment(3));
		$this->db->where('tgl_kerja', $tgl);
		$this->db->update('tbl_pola', $data);

		redirect('features/absen');
	}

	public function karyawan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Data Karyawan';
			$data['karyawan'] = $this->m_features->tampil_data();
			$data['jabatan'] = $this->db->query('SELECT tbl_datakaryawan.*, tbl_jabatan.nama_jabatan, tbl_divisi.divisi FROM tbl_datakaryawan INNER JOIN tbl_jabatan ON tbl_datakaryawan.jabatan = tbl_jabatan.id_jabatan INNER JOIN tbl_divisi ON tbl_datakaryawan.bagian = tbl_divisi.id_divisi ORDER BY tbl_datakaryawan.id_karyawan ASC')->result();
			$this->load->view('template/header', $data);
			$this->load->view('template/karyawan');
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}
	//tampil form karyawan
	public function formkaryawan()
	{

		if ($this->admin->logged_id()) {
			$data['judul'] = 'Form Input Karyawan';
			$data['autonumber'] = $this->m_features->kode_karyawan();
			$data['jabatan'] = $this->m_features->jabatan();
			$data['divisi'] = $this->db->get('tbl_divisi')->result();

			$this->form_validation->set_rules('NamaKaryawan', 'Nama Lengkap', 'required|trim|regex_match[/^([a-z ])+$/i]');
			$this->form_validation->set_rules('Nik', 'NIK', 'required|trim|numeric|min_length[16]|max_length[16]|is_unique[tbl_datakaryawan.nik]');
			$this->form_validation->set_rules('NoTelp', 'No. Telp', 'required|trim|numeric|min_length[12]|max_length[13]|is_unique[tbl_datakaryawan.no_telp]');
			$this->form_validation->set_rules('Email', 'Email', 'required|trim|valid_email|is_unique[tbl_datakaryawan.email]');
			$this->form_validation->set_rules('Alamat', 'Alamat', 'required|trim');
			$this->form_validation->set_rules('Tempatlahir', 'Tempat Lahir', 'required|trim');
			$this->form_validation->set_rules('Tanggallahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('Tanggalmasuk', 'Tanggal Masuk', 'required');
			$this->form_validation->set_rules('Status', 'Status', 'required');

			$this->form_validation->set_message('valid_email', '{field} harus diisi dengan alamat email yang benar.');
			$this->form_validation->set_message('required', '{field} tidak boleh kosong.');
			$this->form_validation->set_message('regex_match', '{field} harus diisi dengan huruf.');
			$this->form_validation->set_message('is_unique', '{field} sudah terdaftar.');
			$this->form_validation->set_message('numeric', '{field} harus diisi dengan angka.');
			$this->form_validation->set_message('max_length', '{field} harus diisi dengan jumlah yang benar.');
			$this->form_validation->set_message('min_length', '{field} harus diisi dengan jumlah yang benar.');


			if ($this->form_validation->run() != false) {
				if ($_FILES['gambar']['name'] != "") {
					$temp = explode(".", $_FILES['gambar']['name']);
					$foto = round(microtime(true)) . '.' . end($temp);
					$config['file_name'] = $foto;
					$config['upload_path'] = './assets/foto';
					$config['allowed_types'] = 'png|jpg|jpeg';
					$config['max_size'] = '1024000';
					$config['max_filename'] = '5000000';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('gambar')) {
						$error = array('error' => $this->upload->display_errors());
						var_dump($error);
					} else {
						$data = [
							'id_karyawan'		=> $this->input->post('IdKaryawan'),
							'nama_karyawan'		=> $this->input->post('NamaKaryawan'),
							'nik'				=> $this->input->post('Nik'),
							'status'			=> $this->input->post('Status'),
							'agama'				=> $this->input->post('Agama'),
							'pendidikan'		=> $this->input->post('Pendidikan'),
							'jabatan'			=> $this->input->post('Jabatan'),
							'bagian'			=> $this->input->post('Bagian'),
							'no_telp'			=> $this->input->post('NoTelp'),
							'email'				=> $this->input->post('Email'),
							'alamat'			=> $this->input->post('Alamat'),
							'jenis_kelamin'		=> $this->input->post('Jeniskelamin'),
							'tempat_lahir'		=> $this->input->post('Tempatlahir'),
							'tanggal_lahir'		=> $this->input->post('Tanggallahir'),
							'tanggal_masuk'		=> $this->input->post('Tanggalmasuk'),
							'foto'				=> $this->upload->data('file_name'),
						];
						// var_dump($data);
					}
				} else {
					$data = [
						'id_karyawan'		=> $this->input->post('IdKaryawan'),
						'nama_karyawan'		=> $this->input->post('NamaKaryawan'),
						'nik'				=> $this->input->post('Nik'),
						'status'			=> $this->input->post('Status'),
						'agama'				=> $this->input->post('Agama'),
						'pendidikan'		=> $this->input->post('Pendidikan'),
						'jabatan'			=> $this->input->post('Jabatan'),
						'bagian'			=> $this->input->post('Bagian'),
						'no_telp'			=> $this->input->post('NoTelp'),
						'email'				=> $this->input->post('Email'),
						'alamat'			=> $this->input->post('Alamat'),
						'jenis_kelamin'		=> $this->input->post('Jeniskelamin'),
						'tempat_lahir'		=> $this->input->post('Tempatlahir'),
						'tanggal_lahir'		=> $this->input->post('Tanggallahir'),
						'tanggal_masuk'		=> $this->input->post('Tanggalmasuk'),
						'foto'				=> 'default.png'

					];
					// var_dump($data);
				}
				$this->m_features->input('tbl_datakaryawan', $data);
				$this->session->set_flashdata('flash', 'telah berhasil ditambahkan.');
				redirect("features/karyawan");
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formkaryawan');
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}
	//tambahkaryawan

	//tampil data di form edit
	public function formeditkaryawan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Form Edit Karyawan';
			$id = $this->uri->segment(3);
			$data['divisi'] = $this->db->get('tbl_divisi')->result();
			$data['jabatan'] = $this->db->get('tbl_jabatan')->result();
			$data['karyawan'] = $this->db->query("SELECT tbl_datakaryawan.*, tbl_jabatan.*, tbl_divisi.* FROM tbl_datakaryawan INNER JOIN tbl_jabatan ON tbl_datakaryawan.jabatan = tbl_jabatan.id_jabatan INNER JOIN tbl_divisi ON tbl_datakaryawan.bagian = tbl_divisi.id_divisi WHERE tbl_datakaryawan.id_karyawan = '$id'")->row_array();

			$this->load->view('template/header', $data);
			$this->load->view('template/formeditkaryawan', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function simpaneditkaryawan()
	{
		if ($_FILES['gambar']['name'] != "") {
			$temp = explode(".", $_FILES['gambar']['name']);
			$foto = round(microtime(true)) . '.' . end($temp);
			$config['file_name'] = $foto;
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'png|jpg|jpeg';
			$config['max_size'] = '1024000';
			$config['max_filename'] = '5000000';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				$data = [
					'id_karyawan'		=> $this->input->post('IdKaryawan'),
					'nama_karyawan'		=> $this->input->post('NamaKaryawan'),
					'nik'				=> $this->input->post('Nik'),
					'status'			=> $this->input->post('Status'),
					'agama'				=> $this->input->post('Agama'),
					'pendidikan'		=> $this->input->post('Pendidikan'),
					'jabatan'			=> $this->input->post('Jabatan'),
					'bagian'			=> $this->input->post('Bagian'),
					'no_telp'			=> $this->input->post('NoTelp'),
					'email'				=> $this->input->post('Email'),
					'alamat'			=> $this->input->post('Alamat'),
					'jenis_kelamin'		=> $this->input->post('Jeniskelamin'),
					'tempat_lahir'		=> $this->input->post('Tempatlahir'),
					'tanggal_lahir'		=> $this->input->post('Tanggallahir'),
					'tanggal_masuk'		=> $this->input->post('Tanggalmasuk'),
					'foto'				=> $this->upload->data('file_name'),
				];
				var_dump($data);
			}
		} else {
			$data = [
				'id_karyawan'		=> $this->input->post('IdKaryawan'),
				'nama_karyawan'		=> $this->input->post('NamaKaryawan'),
				'nik'				=> $this->input->post('Nik'),
				'status'			=> $this->input->post('Status'),
				'agama'				=> $this->input->post('Agama'),
				'pendidikan'		=> $this->input->post('Pendidikan'),
				'jabatan'			=> $this->input->post('Jabatan'),
				'bagian'			=> $this->input->post('Bagian'),
				'no_telp'			=> $this->input->post('NoTelp'),
				'email'				=> $this->input->post('Email'),
				'alamat'			=> $this->input->post('Alamat'),
				'jenis_kelamin'		=> $this->input->post('Jeniskelamin'),
				'tempat_lahir'		=> $this->input->post('Tempatlahir'),
				'tanggal_lahir'		=> $this->input->post('Tanggallahir'),
				'tanggal_masuk'		=> $this->input->post('Tanggalmasuk'),

			];
			var_dump($data);
		}
		$this->m_features->edit_datakaryawan($data, 'tbl_datakaryawan', $this->input->post('IdKaryawan'));
		$this->session->set_flashdata('flash', 'telah berhasil diubah.');

		redirect("features/karyawan");
	}

	public function biodatakaryawan($id)
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Biodata Karyawan';
			// $data['biodata'] = $this->db->get_where('tbl_datakaryawan', ['id_karyawan' => $id])->row_array();
			$data['biodata'] = $this->db->query("SELECT tbl_datakaryawan.*, tbl_jabatan.nama_jabatan, tbl_divisi.divisi FROM tbl_datakaryawan INNER JOIN tbl_jabatan ON tbl_datakaryawan.jabatan = tbl_jabatan.id_jabatan INNER JOIN tbl_divisi ON tbl_datakaryawan.bagian = tbl_divisi.id_divisi WHERE tbl_datakaryawan.id_karyawan = '$id'")->row_array();
			$this->load->view('template/header', $data);
			$this->load->view('template/biodatakaryawan');
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function komponenkaryawan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Komponen Karyawan';
			$data['karyawan'] = $this->db->query('SELECT tbl_jabatan.nama_jabatan, tbl_divisi.divisi, tbl_datakaryawan.* FROM tbl_datakaryawan INNER JOIN tbl_jabatan ON tbl_datakaryawan.jabatan = tbl_jabatan.id_jabatan INNER JOIN tbl_divisi ON tbl_datakaryawan.bagian = tbl_divisi.id_divisi ORDER BY tbl_datakaryawan.id_karyawan ASC')->result();

			$this->load->view('template/header', $data);
			$this->load->view('template/komponenkaryawan', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}
	public function komponengaji()
	{
		if ($this->admin->logged_id()) {
			$id = $this->uri->segment(3);

			$tabel = $this->db->query("SELECT year(tgl_gajian) AS tahun, DATE_FORMAT(tgl_gajian, '%m') AS bulan FROM tbl_gajian WHERE id_karyawan = '$id' ORDER BY tgl_gajian DESC")->row_array();

			@$data['gettgl'] = $tabel['tahun'] . $tabel['bulan'];

			$data['judul'] = 'Komponen Gaji';

			$data['biodata'] = $this->db->get_where('tbl_datakaryawan', ['id_karyawan' => $id])->row_array();

			$data['tunjangan'] = $this->db->get('tbl_tunjangan')->result();

			$id_jabatan = $data['biodata']['jabatan'];

			$data['komponen'] = $this->db->query("SELECT tbl_tunjangan.* , tbl_komponen.id_komponen FROM tbl_tunjangan INNER JOIN tbl_komponen ON tbl_komponen.id_tunjangan = tbl_tunjangan.id_tunjangan WHERE tbl_komponen.id_karyawan = '$id'")->result();
			$data['gaji'] = $this->db->get_where('tbl_jabatan', ['id_jabatan' => $id_jabatan])->row_array();

			$data['jmlt'] = $this->db->query("SELECT SUM(tbl_tunjangan.nominal) as jml FROM tbl_tunjangan INNER JOIN tbl_komponen ON tbl_komponen.id_tunjangan = tbl_tunjangan.id_tunjangan WHERE tbl_komponen.id_karyawan = '$id' AND tbl_tunjangan.jenis = 'Tunjangan'")->row_array();

			$data['jmlp'] = $this->db->query("SELECT SUM(tbl_tunjangan.nominal) as jml FROM tbl_tunjangan INNER JOIN tbl_komponen ON tbl_komponen.id_tunjangan = tbl_tunjangan.id_tunjangan WHERE tbl_komponen.id_karyawan = '$id' AND tbl_tunjangan.jenis = 'Potongan'")->row_array();

			$data['total'] = $data['gaji']['gaji_pokok'] + $data['gaji']['tunjangan'] + $data['jmlt']['jml'] - $data['jmlp']['jml'];
			// $this->form_validation->set_rules('idkaryawan', 'ID Karyawan', 'is_unique[tbl_gajian.id_karyawan]');
			// $this->form_validation->set_message('is_unique', '{field} sudah ada di dalam database.');
			if ($this->form_validation->run() != false) {
				$data = [
					'gaji_pokok' => $this->input->post('gajipokok'),
					'tunjangan_jabatan' => $this->input->post('tjabatan'),
					'tunjangan' => $this->input->post('tunjangan'),
					'potongan' => $this->input->post('potongan'),
					'gaji_bersih' => $this->input->post('gaji'),
					'tgl_gajian' => date('Y-m') . '-28',
					'id_karyawan' => $this->input->post('idkaryawan')
				];
				$id = $this->input->post('idkaryawan');
				$this->m_features->input('tbl_gajian', $data);
				redirect("features/komponengaji/$id");
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/komponengaji', $data);
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function adduser()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Tambah User';
			$data['autonumber'] = $this->m_features->kodeuser();
			$data['karyawan'] = $this->m_features->tampil_data();
			$divisi = $this->db->query("SELECT * FROM tbl_divisi where id_divisi = 'D01'")->row_array();
			// $dv = $divisi['id_divisi'];
			// $data['karyawan'] = $this->db->query("select tbl_users.*,tbl_datakaryawan.* from  tbl_datakaryawan left join tbl_users on tbl_users.id_karyawan=tbl_datakaryawan.id_karyawan where tbl_datakaryawan.bagian = '$dv' AND tbl_users.username is null")->result();
			$this->form_validation->set_rules('namauser', 'Nama', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_message('required', '<i style="color:#a6230c;">{field} tidak boleh kosong.</i>');

			if ($this->form_validation->run() != false) {
				$data = [
					'id_user' => $this->input->post('iduser'),
					'id_karyawan' => $this->input->post('namauser'),
					'username' => $this->input->post('username'),
					'status' => $this->input->post('status'),
					'password' => MD5($this->input->post('password')),
				];
				$this->m_features->input('tbl_users', $data);
				$this->session->set_flashdata('flash', 'telah berhasil ditambahkan.');
				redirect('features/datauser');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formuser', $data);
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function jabatan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Data Jabatan';
			$data['data'] = $this->m_features->ambildatajabatan();

			$data['autonumber'] = $this->m_features->buat_kode();
			$this->form_validation->set_rules('namajabatan', 'Nama Jabatan', 'required|trim|regex_match[/^([a-z ])+$/i]|is_unique[tbl_jabatan.nama_jabatan]');
			$this->form_validation->set_rules('gajipokokjabatan', 'Gaji Pokok', 'required|trim');
			$this->form_validation->set_rules('tunjanganjabatan', 'Tunjangan', 'required|trim');
			$this->form_validation->set_message('required', '{field} tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '{field} sudah ada di dalam database.');
			$this->form_validation->set_message('regex_match', '{field} harus diisi dengan huruf.');

			if ($this->form_validation->run() != false) {
				$this->m_features->inputjabatan();
				$this->session->set_flashdata('flash', 'telah berhasil ditambahkan.');
				redirect('features/jabatan');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/jabatan', $data);
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function formdivisi()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Input Divisi';
			$data['data'] = $this->db->get('tbl_divisi')->result();
			$data['autonumber'] = $this->m_features->kodedivisi();

			$this->form_validation->set_rules('divisi', 'Divisi', 'required|trim|regex_match[/^([a-z ])+$/i]|is_unique[tbl_divisi.divisi]');
			$this->form_validation->set_message('required', '{field} tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', 'Data {field} sudah ada di dalam database.');
			$this->form_validation->set_message('regex_match', 'Data {field} harus diisi dengan huruf.');

			if ($this->form_validation->run() != false) {
				$data = [
					'id_divisi' => $this->input->post('iddivisi'),
					'divisi' => $this->input->post('divisi')
				];
				$this->m_features->input('tbl_divisi', $data);
				$this->session->set_flashdata('flash', 'telah berhasil ditambahkan.');
				redirect('features/formdivisi');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formdivisi', $data);
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}


	public function formjabatan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Input Data Jabatan';
			$data['autonumber'] = $this->m_features->buat_kode();
			$this->form_validation->set_rules('namajabatan', 'Nama Jabatan', 'required|trim|regex_match[/^([a-z ])+$/i]|is_unique[tbl_jabatan.nama_jabatan]');
			$this->form_validation->set_rules('gajipokokjabatan', 'Gaji Pokok', 'required|trim');
			$this->form_validation->set_rules('tunjanganjabatan', 'Tunjangan', 'required|trim');
			$this->form_validation->set_message('required', '{field} tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '{field} sudah ada di dalam database.');
			$this->form_validation->set_message('regex_match', '{field} harus diisi dengan huruf.');

			if ($this->form_validation->run() != false) {
				$this->m_features->inputjabatan();
				$this->session->set_flashdata('flash', 'telah berhasil ditambahkan.');
				redirect('features/jabatan');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formjabatan');
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function formeditjabatan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Form Edit abatan';
			$id = $this->uri->segment(3);
			$data['test'] = $this->db->get_where('tbl_jabatan', ['id_jabatan' => $id])->row_array();

			$this->form_validation->set_rules('namajabatan', 'Nama Jabatan', 'required');
			$this->form_validation->set_rules('gajipokokjabatan', 'Gaji Pokok', 'required');
			$this->form_validation->set_rules('tunjanganjabatan', 'Tunjangan', 'required');
			$this->form_validation->set_message('required', '<i style="color:#a6230c;">{field} tidak boleh kosong.</i>');

			if ($this->form_validation->run() != false) {
				$this->m_features->updatejabatan();
				$this->session->set_flashdata('flash', 'telah berhasil diubah.');
				redirect('features/jabatan');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formjabatan', $data);
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function tunjangan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Data Tunjangan';
			$data['data'] = $this->m_features->ambildatatunjangan();
			$this->load->view('template/header', $data);
			$this->load->view('template/tunjangan', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function formtunjangan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Input Data Tunjangan';
			$data['autonumber'] = $this->m_features->kodetunjangan();

			$this->form_validation->set_rules('namatunjangan', 'Nama Tunjangan', 'required|trim|regex_match[/^([a-z ])+$/i]|is_unique[tbl_tunjangan.nama_tunjangan]');
			$this->form_validation->set_rules('jenistunjangan', 'Jenis Tunjangan', 'required');
			$this->form_validation->set_rules('nominaltunjangan', 'Nominal Tunjangan', 'required');
			$this->form_validation->set_message('required', '{field} tidak boleh kosong.');
			$this->form_validation->set_message('is_unique', '{field} sudah ada di dalam database.');
			$this->form_validation->set_message('regex_match', '{field} harus diisi dengan huruf.');

			if ($this->form_validation->run() != false) {
				$this->m_features->inputtunjangan();
				$this->session->set_flashdata('flash', 'telah berhasil ditambahkan.');
				redirect('features/tunjangan');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formtunjangan');
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function formedittunjangan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Input Data Tunjangan';
			$id = $this->uri->segment(3);
			$data['dt'] = $this->db->get_where('tbl_tunjangan', ['id_tunjangan' => $id])->row_array();

			$this->form_validation->set_rules('namatunjangan', 'Nama Tunjangan', 'required|trim|regex_match[/^([a-z ])+$/i]');
			$this->form_validation->set_rules('jenistunjangan', 'Jenis Tunjangan', 'required');
			$this->form_validation->set_rules('nominaltunjangan', 'Nominal Tunjangan', 'required');
			$this->form_validation->set_message('required', '{field} tidak boleh kosong.');
			$this->form_validation->set_message('regex_match', '{field} harus diisi dengan huruf.');

			if ($this->form_validation->run() != false) {
				$this->m_features->edittunjangan();
				$this->session->set_flashdata('flash', 'telah berhasil diubah.');
				redirect('features/tunjangan');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formtunjangan');
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function datajamkerja()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Data Jam Kerja';
			$data['data'] = $this->m_features->ambildatashift();
			$this->load->view('template/header', $data);
			$this->load->view('template/datashift');
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function formjamkerja()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Form Jam Kerja';
			$data['autonumber'] = $this->m_features->kodeshift();

			$this->form_validation->set_rules('namashift', 'Nama Shift', 'required|trim|is_unique[tbl_shift.nama_shift]');
			$this->form_validation->set_rules('masuk', 'Jam Masuk', 'required');
			$this->form_validation->set_rules('keluar', 'Jam Keluar', 'required');
			// $this->form_validation->set_rules('toleransi', 'Jam Toleransi', 'required');
			$this->form_validation->set_message('required', '<i style="color:#a6230c;">{field} tidak boleh kosong.</i>');
			$this->form_validation->set_message('is_unique', '<i style="color:#a6230c;">{field} sudah ada di dalam database.</i>');


			if ($this->form_validation->run() != false) {
				$data = [
					'id_shift' => $this->input->post('idshift'),
					'nama_shift' => $this->input->post('namashift'),
					'jam_masuk' => $this->input->post('masuk'),
					'jam_keluar' => $this->input->post('keluar')
					// 'jam_toleransi' => $this->input->post('toleransi')
				];
				// var_dump($data);
				$this->m_features->input('tbl_shift', $data);
				$this->session->set_flashdata('flash', 'telah berhasil ditambahkan.');
				redirect('features/datajamkerja');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formshift', $data);
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function formeditshift()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Form Edit Shift';
			$id = $this->uri->segment(3);
			$data['data'] = $this->db->get_where('tbl_shift', ['id_shift' => $id])->row_array();

			$this->load->view('template/header', $data);
			$this->load->view('template/formshift', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function updateshift()
	{
		$id = $this->uri->segment(3);

		$data = [
			'nama_shift' => $this->input->post('namashift'),
			'jam_masuk' => $this->input->post('masuk'),
			'jam_keluar' => $this->input->post('keluar')
			// 'jam_toleransi' => $this->input->post('toleransi')
		];
		$this->m_features->update('tbl_shift', $data, $id, 'id_shift');
		$this->session->set_flashdata('flash', 'telah berhasil diubah.');
		redirect('features/datashift');
	}

	//statuspernikahan
	public function statuspernikahan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Status Pernikahan';
			$data['data'] = $this->m_features->datastatus();

			$this->load->view('template/header', $data);
			$this->load->view('template/statuspernikahan', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function formstatus()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Form Input Status';
			$data['autonumber'] = $this->m_features->kodestatus();

			$this->form_validation->set_rules('namastatus', 'Nama Status', 'required|trim|is_unique[tbl_pernikahan.divisi]');
			$this->form_validation->set_rules('jumlahtanggungan', 'Jumlah Tanggungan', 'required');
			$this->form_validation->set_message('required', '<i style="color:#a6230c;">{field} tidak boleh kosong.</i>');
			$this->form_validation->set_message('is_unique', '<i style="color:#a6230c;">{field} sudah ada dalam database.</i>');

			if ($this->form_validation->run() != false) {
				$this->m_features->inputstatus();
				$this->session->set_flashdata('flash', 'telah berhasil ditambahkan.');
				redirect('features/statuspernikahan');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formstatus', $data);
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function formeditstatus()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Form Input Status';
			$id = $this->uri->segment(3);
			$data['dt'] = $this->db->get_where('tbl_pernikahan', ['id_status' => $id])->row_array();

			$this->form_validation->set_rules('namastatus', 'Nama Status', 'required|trim');
			$this->form_validation->set_rules('jumlahtanggungan', 'Jumlah Tanggungan', 'required');
			$this->form_validation->set_message('required', '<i style="color:#a6230c;">{field} tidak boleh kosong.</i>');

			if ($this->form_validation->run() != false) {
				$this->m_features->editstatus();
				$this->session->set_flashdata('flash', 'telah berhasil diubah.');
				redirect('features/statuspernikahan');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('template/formstatus', $data);
				$this->load->view('template/footer');
			}
		} else {
			redirect("Login");
		}
	}

	public function inputkomponen()
	{
		$data = [
			'id_tunjangan' => $this->input->post('tunjangan'),
			'id_karyawan' => $this->input->post('idkaryawan')
		];
		$id = $this->input->post('idkaryawan');
		$this->m_features->input('tbl_komponen', $data);
		redirect("features/komponengaji/$id");
	}

	public function deletekomponen($id)
	{
		$getid = $this->db->get_where('tbl_komponen', ['id_komponen' => $id])->row_array();
		$getkaryawan = $getid['id_karyawan'];
		$this->db->where('id_komponen', $id);
		$this->db->delete('tbl_komponen');
		redirect("features/komponengaji/$getkaryawan");
	}

	public function inputgajian()
	{
		$data = [
			'gaji_pokok' => $this->input->post('gajipokok'),
			'tunjangan_jabatan' => $this->input->post('tjabatan'),
			'tunjangan' => $this->input->post('tunjangan'),
			'potongan' => $this->input->post('potongan'),
			'gaji_bersih' => $this->input->post('gaji'),
			'tgl_gajian' => date('Y-m') . '-25',
			'id_karyawan' => $this->input->post('idkaryawan')
		];
		$id = $this->input->post('idkaryawan');
		$this->m_features->input('tbl_gajian', $data);
		redirect("features/komponengaji/$id");
	}

	public function polakerja()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Pola Kerja';
			// $data['karyawan'] = $this->m_features->tampil_data();
			$data['karyawan'] = $this->db->query('SELECT tbl_jabatan.*, tbl_divisi.*, tbl_datakaryawan.* FROM tbl_datakaryawan INNER JOIN tbl_jabatan ON tbl_datakaryawan.jabatan = tbl_jabatan.id_jabatan INNER JOIN tbl_divisi ON tbl_datakaryawan.bagian = tbl_divisi.id_divisi')->result();
			$this->load->view('template/header', $data);
			$this->load->view('template/polakerja', $data);
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}

	public function updateprofile()
	{
		$id = $this->input->post('id');
		$pw = MD5($this->input->post('lama'));
		$pwbaru = MD5($this->input->post('baru'));

		$pwlama = $this->db->query("SELECT * FROM tbl_users WHERE id_user = '$id'")->row_array();

		if ($this->input->post('lama') == "") {
			echo json_encode("kosong");
		} else if ($this->input->post('baru') == "") {
			echo json_encode("ksg");
		} else if (MD5($this->input->post('lama')) != $pwlama['password']) {
			echo json_encode("salah");
		} else if (MD5($this->input->post('lama')) == $pwlama['password']) {
			if ($this->input->post('baru') == "") {
				echo json_encode("ksg");
			} else {
				$datauser = [
					'password' => MD5($this->input->post('baru'))
				];
				$this->m_features->update('tbl_users', $datauser, $id, 'id_user');
				echo json_encode("berhasil");
			}
		}
	}

	public function datagaji()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'Data Gaji Karyawan';

			$thn = date('Y');
			$bln = date('m');

			$this->form_validation->set_rules('bulan', 'bulan', 'required');

			if ($this->form_validation->run() != false) {
				$tgl = $this->input->post('bulan');
				$thn = date('Y', strtotime($tgl));
				$bln = date('m', strtotime($tgl));
			}
			$data['gaji'] = $this->db->query("SELECT tbl_datakaryawan.*, tbl_gajian.*, tbl_jabatan.*, tbl_divisi.* FROM tbl_datakaryawan INNER JOIN tbl_gajian ON tbl_gajian.id_karyawan = tbl_datakaryawan.id_karyawan INNER JOIN tbl_jabatan ON tbl_jabatan.id_jabatan = tbl_datakaryawan.jabatan INNER JOIN tbl_divisi ON tbl_divisi.id_divisi = tbl_datakaryawan.bagian WHERE year(tbl_gajian.tgl_gajian) = '$thn' AND month(tbl_gajian.tgl_gajian) = '$bln' ")->result();

			$this->load->view('template/header', $data);
			$this->load->view('template/datagaji', $data);
			$this->load->view('template/footer');
		} else {
			redirect("login");
		}
	}


	//function selain halaman

	public function hapusjabatan($id)
	{
		$this->db->where('id_jabatan', $id);
		$this->db->delete('tbl_jabatan');
		$this->session->set_flashdata('flash', 'telah berhasil dihapus.');
		redirect('features/jabatan');
	}
	public function hapuskaryawan($id)
	{
		$this->db->where('id_karyawan', $id);
		$this->db->delete('tbl_datakaryawan');
		$this->session->set_flashdata('flash', 'telah berhasil dihapus.');
		redirect('features/karyawan');
	}
	public function hapustunjangan($id)
	{
		$this->db->where('id_tunjangan', $id);
		$this->db->delete('tbl_tunjangan');
		$this->session->set_flashdata('flash', 'telah berhasil dihapus.');
		redirect('features/tunjangan');
	}

	public function hapusstatus($id)
	{
		// $id = $this->input->get('data');
		$this->db->where('id_status', $id);
		$this->db->delete('tbl_pernikahan');
		$this->session->set_flashdata('flash', 'telah berhasil dihapus.');
		redirect('features/statuspernikahan');
	}

	public function hapusshift($id)
	{
		// $id = $this->input->get('data');
		$this->db->where('id_shift', $id);
		$this->db->delete('tbl_shift');
		$this->session->set_flashdata('flash', 'telah berhasil dihapus.');
		redirect('features/datashift');
	}
	public function hapususer($id)
	{
		// $id = $this->input->get('data');
		$this->db->where('id_user', $id);
		$this->db->delete('tbl_users');
		$this->session->set_flashdata('flash', 'telah berhasil dihapus.');
		redirect('features/datauser');
	}

	//laporam
	public function laporan_pdf()
	{
		$tgl = date('d-m-Y');
		$dompdf = new Dompdf();
		$data['dataku'] = $this->db->query("SELECT tbl_datakaryawan.*, tbl_jabatan.nama_jabatan, tbl_divisi.divisi FROM tbl_datakaryawan INNER JOIN tbl_jabatan ON tbl_datakaryawan.jabatan = tbl_jabatan.id_jabatan INNER JOIN tbl_divisi ON tbl_datakaryawan.bagian = tbl_divisi.id_divisi")->result();
		$data['tgl'] = shortdate_indo($tgl);
		$data['admin'] = $this->session->userdata('nama');


		$html = $this->load->view('template/laporan_pdf', $data, TRUE);
		$dompdf->load_html($html);
		$dompdf->set_Paper('A4', 'landscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan.pdf', array("Attachment" => FALSE));
	}

	public function laporan_absensi()
	{
		$bln = date('m');
		$thn = date('Y');
		$dompdf = new Dompdf();
		$data['naon'] = $this->db->query("SELECT tbl_pola.*, tbl_datakaryawan.nama_karyawan, tbl_shift.nama_shift FROM tbl_pola INNER JOIN tbl_datakaryawan ON tbl_datakaryawan.id_karyawan = tbl_pola.id_karyawan INNER JOIN tbl_shift ON tbl_shift.id_shift = tbl_pola.id_shift WHERE year(tbl_pola.tgl_kerja) = '$thn' AND month(tbl_pola.tgl_kerja) = '$bln' ORDER BY tgl_kerja ASC")->result();

		$data['absen'] = $this->db->query("SELECT status, COUNT(*) as Jumlah FROM tbl_pola WHERE status = 'Alpa'GROUP BY STATUS")->result();

		$data['admin'] = $this->session->userdata('nama');


		$html = $this->load->view('template/laporanabsensi', $data, TRUE);
		$dompdf->load_html($html);
		$dompdf->set_Paper('A4', 'landscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan.pdf', array("Attachment" => FALSE));
	}

	public function laporan_gaji()
	{
		$bln = date('m');
		$thn = date('Y');
		$dompdf = new Dompdf();
		$data['gaji'] = $this->db->query("SELECT tbl_datakaryawan.*, tbl_gajian.*, tbl_jabatan.*, tbl_divisi.* FROM tbl_datakaryawan INNER JOIN tbl_gajian ON tbl_gajian.id_karyawan = tbl_datakaryawan.id_karyawan INNER JOIN tbl_jabatan ON tbl_jabatan.id_jabatan = tbl_datakaryawan.jabatan INNER JOIN tbl_divisi ON tbl_divisi.id_divisi = tbl_datakaryawan.bagian")->result();


		$data['admin'] = $this->session->userdata('nama');


		$html = $this->load->view('template/laporangaji', $data, TRUE);
		$dompdf->load_html($html);
		$dompdf->set_Paper('A4', 'landscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan.pdf', array("Attachment" => FALSE));
	}

	public function printpola()
	{
		$dompdf = new Dompdf();
		$id = $this->uri->segment(3);
		$data['admin'] = $this->session->userdata('nama');
		$data['jadwal'] = $this->db->query("SELECT tbl_pola.*, tbl_shift.nama_shift, tbl_datakaryawan.nama_karyawan FROM tbl_pola INNER JOIN tbl_shift ON tbl_shift.id_shift = tbl_pola.id_shift INNER JOIN tbl_datakaryawan ON tbl_datakaryawan.id_karyawan = tbl_pola.id_karyawan WHERE tbl_pola.id_karyawan = '$id' ")->result();
		$data['karyawan'] = $this->db->get_where('tbl_datakaryawan', ['id_karyawan' => $id])->row_array();
		$data['biodata'] = $this->db->get_where('tbl_datakaryawan', ['id_karyawan' => $id])->row_array();

		$html = $this->load->view('template/laporanpola', $data, TRUE);
		$dompdf->load_html($html);
		$dompdf->set_Paper('A4', 'landscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan.pdf', array("Attachment" => FALSE));
	}

	public function slipgaji()
	{
		$data['admin'] = $this->session->userdata('nama');
		$data['judul'] = 'Slip Gaji';
		$id = $this->uri->segment(3);
		$tgl = date('-m-');
		$dompdf = new Dompdf();
		$data['karyawan'] = $this->db->query("SELECT tbl_datakaryawan.*, tbl_jabatan.*, tbl_divisi.* FROM tbl_datakaryawan INNER JOIN tbl_jabatan on tbl_datakaryawan.jabatan = tbl_jabatan.id_jabatan INNER JOIN tbl_divisi on tbl_datakaryawan.bagian = tbl_divisi.id_divisi WHERE tbl_datakaryawan.id_karyawan = '$id'")->row_array();
		$data['gaji'] = $this->db->get_where('tbl_gajian', ['id_karyawan' => $id])->row_array();
		$data['komponen'] = $this->db->query("SELECT tbl_komponen.*, tbl_tunjangan.* FROM tbl_komponen INNER JOIN tbl_tunjangan ON tbl_komponen.id_tunjangan = tbl_tunjangan.id_tunjangan WHERE tbl_komponen.id_karyawan = '$id'")->result();
		$data['tgl'] = date_indo($tgl);

		$html = $this->load->view('template/slipgaji', $data, TRUE);
		$dompdf->load_html($html);
		$dompdf->set_Paper('A4', 'portrait');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream("laporan.pdf", array("Attachment" => FALSE));
	}
	public function filterlapkaryawan()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'filter laporan karyawan';
			$this->load->view('template/header', $data);
			$this->load->view('template/filterlapkaryawan');
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}
	public function filterlapabsensi()
	{
		if ($this->admin->logged_id()) {
			$data['judul'] = 'filter laporan karyawan';
			$this->load->view('template/header', $data);
			$this->load->view('template/filterlapabsensi');
			$this->load->view('template/footer');
		} else {
			redirect("Login");
		}
	}
}
