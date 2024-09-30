<?php if ($this->session->userdata('status') == 'Admin') : ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 ml-1 text-gray-900">Biodata Karyawan</h1>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/karyawan" style="text-decoration: none;">Data Karyawan</a></li>
                <li class="breadcrumb-item active my-auto" aria-current="page">Biodata Karyawan</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Biodata Karyawan</h6>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content mt-4 text-gray-900 ml-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-3">
                                        <p>NIP</p>
                                        <p>NIK</p>
                                        <p>Nama</p>
                                        <p>Tempat, Tanggal Lahir</p>
                                        <p>Agama</p>
                                        <p>Jenis Kelamin</p>
                                        <p>Status Pernikahan</p>
                                        <p>Jabatan</p>
                                        <p>Bagian</p>
                                        <p>Alamat</p>
                                        <p>No. Telp</p>
                                        <p>Email</p>
                                    </div>
                                    <div class="col-9">
                                        <p>: <?php echo $biodata['id_karyawan'] ?></p>
                                        <p>: <?php echo $biodata['nik'] ?></p>
                                        <p>: <?php echo $biodata['nama_karyawan'] ?></p>
                                        <p>: <?php echo $biodata['tempat_lahir'] ?>, <?php echo date('d-m-Y', strtotime($biodata['tanggal_lahir'])) ?></p>
                                        <p>: <?php echo $biodata['agama'] ?></p>
                                        <p>: <?php echo $biodata['jenis_kelamin'] ?></p>
                                        <p>: <?php echo $biodata['status'] ?></p>
                                        <p>: <?php echo $biodata['nama_jabatan'] ?></p>
                                        <p>: <?php echo $biodata['divisi'] ?></p>
                                        <p>: <?php echo $biodata['alamat'] ?></p>
                                        <p>: <?php echo $biodata['no_telp'] ?></p>
                                        <p>: <?php echo $biodata['email'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>TTL</th>
                                                <th>Jenis Kelamin</th>
                                                <th>No. Telp</th>
                                                <th>More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>
                                                    <a href="#" class="btn btn-light btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Tentang</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center text-gray-900">
                            <img src="<?php echo base_url(); ?>assets/foto/<?php echo $biodata['foto'] ?>" class="img-thumbnail mb-3" alt="" style="max-width:50%;">
                            <h3><?php echo $biodata['nama_karyawan'] ?></h3>
                            <p><?php echo $biodata['id_karyawan'] ?></p>
                            <hr>
                            <i class="fas fa-phone-alt"></i><span> <?php echo $biodata['no_telp'] ?></span>
                            <hr>
                            <i class="fas fa-envelope"></i><span> <?php echo $biodata['email'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($this->session->userdata('status') == 'Member') : ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 ml-1 text-gray-900">Biodata Karyawan</h1>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item active my-auto" aria-current="page">Biodata Karyawan</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Biodata Karyawan</h6>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content mt-4 text-gray-900 ml-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-3">
                                        <p>NIP</p>
                                        <p>NIK</p>
                                        <p>Nama</p>
                                        <p>Tempat, Tanggal Lahir</p>
                                        <p>Agama</p>
                                        <p>Jenis Kelamin</p>
                                        <p>Status Pernikahan</p>
                                        <p>Jabatan</p>
                                        <p>Bagian</p>
                                        <p>Alamat</p>
                                        <p>No. Telp</p>
                                        <p>Email</p>
                                    </div>
                                    <div class="col-9">
                                        <p>: <?php echo $biodata['id_karyawan'] ?></p>
                                        <p>: <?php echo $biodata['nik'] ?></p>
                                        <p>: <?php echo $biodata['nama_karyawan'] ?></p>
                                        <p>: <?php echo $biodata['tempat_lahir'] ?>, <?php echo date('d-m-Y', strtotime($biodata['tanggal_lahir'])) ?></p>
                                        <p>: <?php echo $biodata['agama'] ?></p>
                                        <p>: <?php echo $biodata['jenis_kelamin'] ?></p>
                                        <p>: <?php echo $biodata['status'] ?></p>
                                        <p>: <?php echo $biodata['nama_jabatan'] ?></p>
                                        <p>: <?php echo $biodata['divisi'] ?></p>
                                        <p>: <?php echo $biodata['alamat'] ?></p>
                                        <p>: <?php echo $biodata['no_telp'] ?></p>
                                        <p>: <?php echo $biodata['email'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>TTL</th>
                                                <th>Jenis Kelamin</th>
                                                <th>No. Telp</th>
                                                <th>More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>
                                                    <a href="#" class="btn btn-light btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-light btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Tentang</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center text-gray-900">
                            <img src="<?php echo base_url(); ?>assets/foto/<?php echo $biodata['foto'] ?>" class="img-thumbnail mb-3" alt="" style="max-width:50%;">
                            <h3><?php echo $biodata['nama_karyawan'] ?></h3>
                            <p><?php echo $biodata['id_karyawan'] ?></p>
                            <hr>
                            <i class="fas fa-phone-alt"></i><span> <?php echo $biodata['no_telp'] ?></span>
                            <hr>
                            <i class="fas fa-envelope"></i><span> <?php echo $biodata['email'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>