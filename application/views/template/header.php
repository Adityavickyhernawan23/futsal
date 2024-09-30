<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/pgn.png" type="image/x-icon">
  <meta name="author" content="">

  <title>PT Perusahaan Gas Negara - <?php echo $judul; ?></title>

  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Erica+One' rel='stylesheet' type='text/css'>
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
  <style>
    .sidebar .nav-item .nav-link span {
      font-size: .99rem;
      display: inline
    }

    .sidebar .nav-item .collapse .collapse-inner .collapse-item,
    .sidebar .nav-item .collapsing .collapse-inner .collapse-item {
      font-size: .95rem;
      padding: .5rem 1rem;
      margin: 0 .5rem;
      display: block;
      color: #3a3b45;
      text-decoration: none;
      border-radius: .35rem;
      white-space: nowrap
    }

    .form-control:focus {
      color: #495057;
      background-color: #fff;
      border: 2px solid #4E73DF;
      outline: 0;
      box-shadow: 0 0 0 .2rem rgba(0, 0, 0, .0);
    }

    .field-icon {
      float: right;
      margin-right: 10px;
      margin-top: -26px;
      position: relative;
      z-index: 2;
    }
  </style>

  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>


  <style>
    .text-primary {
      color: blue;
    }
  </style>

</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-white sidebar sidebar-primary border accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center mt-5" href="<?php echo base_url(); ?>dashboard" style="margin-top: 10px; margin-bottom: 10px; padding: 20px;">
        <div class="text-center mb-4">
          <img src="<?php echo base_url(); ?>assets/img/pgn.png" style="width: 100%;">
        </div>
      </a>
      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span class="font-weight-bold">Dashboard</span></a>
      </li>
      <?php if ($this->session->userdata('status') == 'Admin') : ?>
        <li class="nav-item">
          <a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-server"></i>
            <span class="font-weight-bold">Master Data</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/datauser">Data User</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/karyawan">Data Karyawan</a>
              <!-- <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/jabatan">Data Jabatan</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/tunjangan">Data Tunjangan</a> -->
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-link"></i>
            <span class="font-weight-bold">Jabatan</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

            </div>
          </div>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepola" aria-expanded="true" aria-controls="collapsepola">
            <i class="fas fa-fw fa-user-clock"></i>
            <span class="font-weight-bold">Jadwal</span>
          </a>
          <div id="collapsepola" class="collapse" aria-labelledby="headingpola" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/datajamkerja">Data Jam Kerja</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/polakerja">Pola Kerja</a>
            </div>
          </div>
        </li> -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapserefrences" aria-expanded="true" aria-controls="collapserefrences">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span class="font-weight-bold">Absensi</span>
          </a>
          <div id="collapserefrences" class="collapse" aria-labelledby="headingrefrences" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/dataabsen">Data Absensi</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/absen">Absen Harian</a>
            </div>
          </div>
        </li> -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepenggajian" aria-expanded="true" aria-controls="collapsepenggajian">
            <i class="fas fa-fw fa-money-check"></i>
            <span class="font-weight-bold">Penggajian</span>
          </a>
          <div id="collapsepenggajian" class="collapse" aria-labelledby="headingpenggajian" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/komponenkaryawan">Komponen Gaji</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/datagaji">Data Penggajian</a>
            </div>
          </div>
        </li> -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselaporan" aria-expanded="true" aria-controls="collapselaporan">
            <i class="fas fa-fw fa-book"></i>
            <span class="font-weight-bold">Laporan</span>
          </a>
          <div id="collapselaporan" class="collapse" aria-labelledby="headinglaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/filterlapkaryawan">Laporan Karyawan</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/filterlapabsensi">Laporan Absensi</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/laporan_gaji" target="_blank">Laporan Penggajian</a>
            </div>
          </div>
        </li> -->
      <?php endif; ?>
      <?php if ($this->session->userdata('status') == 'Member') : ?>
        <li class="nav-item">
          <a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-tie"></i>
            <span class="font-weight-bold">Karyawan</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/biodatakaryawan/<?php echo $this->session->userdata('id_karyawan') ?>">Biodata Karyawan</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/komponengaji/<?php echo $this->session->userdata('id_karyawan') ?>">Komponen Gaji</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepola" aria-expanded="true" aria-controls="collapsepola">
            <i class="fas fa-fw fa-user-clock"></i>
            <span class="font-weight-bold">Jadwal</span>
          </a>
          <div id="collapsepola" class="collapse" aria-labelledby="headingpola" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/polashift/<?php echo $this->session->userdata('id_karyawan') ?>">Pola Kerja</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapserefrences" aria-expanded="true" aria-controls="collapserefrences">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span class="font-weight-bold">Absensi</span>
          </a>
          <div id="collapserefrences" class="collapse" aria-labelledby="headingrefrences" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/dataabsenkaryawan/<?php echo $this->session->userdata('id_karyawan') ?>">Data Absensi</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/absen/<?php echo $this->session->userdata('id_karyawan') ?>">Absen Harian</a>
            </div>
          </div>
        </li>
      <?php endif; ?>
      <?php if ($this->session->userdata('status') == 'Owner') : ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselaporan" aria-expanded="true" aria-controls="collapselaporan">
            <i class="fas fa-fw fa-book"></i>
            <span class="font-weight-bold">Laporan</span>
          </a>
          <div id="collapselaporan" class="collapse" aria-labelledby="headinglaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/filterlapkaryawan">Laporan Karyawan</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/filterlapabsensi">Laporan Absensi</a>
              <a class="collapse-item text-primary font-weight-bold" href="<?php echo base_url(); ?>features/laporan_gaji" target="_blank">Laporan Penggajian</a>
            </div>
          </div>
        </li>
      <?php endif; ?>
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!--  -->

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar sticky-top mb-4 border">

          <div class="text-center d-md-none d-md-inline">
            <button class="btn btn-white rounded-circle mr-5" id="sidebarToggle"><i class="fa fa-bars text-primary"></i></button>
          </div>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-800 text-md">Hi,
                  <?php echo $this->session->userdata('nama'); ?> </span>
                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/foto/<?php echo $this->session->userdata('foto'); ?>">
              </a>

              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if ($this->session->userdata('status') == 'Member' or $this->session->userdata('status') == 'Admin') : ?>
                  <a class="dropdown-item text-md" href="#" data-toggle="modal" data-target="#modalForm">
                    <i class="fas fa-user-lock fa-sm fa-fw mr-2 text-gray-800 text-left"></i>
                    Edit Password
                  </a>
                <?php endif; ?>
                <?php if ($this->session->userdata('status') == 'Admin') : ?>

                  <!-- <a class="dropdown-item text-md" href="<?php echo base_url(); ?>features/adduser">
                    <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-800"></i>
                    Pengurus
                  </a> -->
                  <!-- <a class="dropdown-item text-md" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-800"></i>
                    Pengaturan
                  </a> -->
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-md" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-900"></i>
                  Sign Out
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Terima kasih semoga harimu menyenangkan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Pilih tombol "logout" untuk keluar dan cancel untuk kembali</div>
              <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>Login/logout">Logout</a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modalForm" role="dialog" aria-labelledby="labelModalKu" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="labelModalKu">Edit Password</h5>
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Tutup</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" id="form">
                  <input type="hidden" value="<?php echo $this->session->userdata('user_id') ?>" name="id">
                  <div class="form-group">
                    <label for="passwordlama">Password Lama</label>
                    <input type="text" class="form-control" id="passwordlama" name="lama">
                  </div>
                  <div class="form-group">
                    <label for="passwordbaru">Password Baru</label>
                    <input type="text" class="form-control" id="passwordbaru" maxlength="15" name="baru">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="tombol">Simpan</button>
              </div>
            </div>
          </div>
        </div>

        <script>
          $(document).ready(function() {
            $('#tombol').on('click', function(e) {
              e.preventDefault();
              let data = $('#form').serializeArray();
              // console.log(data);
              $.ajax({
                url: '<?php echo base_url() ?>features/updateprofile',
                method: 'post',
                data: data,
                dataType: 'json',
                success: function(a) {
                  // console.log(a)
                  if (a == "salah") {
                    Swal.fire(
                      'Gagal!',
                      'Password lama salah.',
                      'error'
                    )
                  } else if (a == "kosong") {
                    Swal.fire(
                      'Gagal!',
                      'Password lama tidak boleh kosong.',
                      'error'
                    )
                  } else if (a == "ksg") {
                    Swal.fire(
                      'Gagal!',
                      'Password baru tidak boleh kosong.',
                      'error'
                    )
                  } else {
                    Swal.fire(
                      'Berhasil!',
                      'Data berhasil diubah.',
                      'success'
                    )
                    $('#modalForm').modal('hide');
                  }
                }
              });
            });
          });
        </script>