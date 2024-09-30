<div class="container-fluid">

    <h1 class="h3 mb-4 ml-1 text-gray-900">Data Karyawan</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Data Karyawan</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
            <a href="<?php echo base_url(); ?>features/formkaryawan" class="btn btn-sm btn-primary btn-icon-split ml-auto">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Karyawan</span>
            </a>
        </div>
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-row-border table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Bagian</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th class="text-center" style="width: 70px;">More</th>
                        </tr>
                    </thead>
                    <tbody class="my-auto">
                        <?php
                        $no = 1;
                        foreach ($jabatan as $kry) : ?>
                            <tr>
                                <th><?php echo $no++ ?></th>
                                <td>
                                    <a href="<?php echo base_url(); ?>features/biodatakaryawan/<?php echo $kry->id_karyawan ?>" data-toggle="tooltip" data-placement="top" title="Biodata" style="text-decoration: none;"><?php echo $kry->id_karyawan ?></a>
                                </td>
                                <td><?php echo $kry->nama_karyawan ?></td>
                                <td><?php echo $kry->nama_jabatan ?></td>
                                <td><?php echo $kry->divisi ?></td>
                                <td><?php echo $kry->no_telp ?></td>
                                <td><?php echo $kry->email ?></td>
                                <td><?php echo $kry->alamat ?></td>
                                <td style="max-width: 50px;"><img src="<?php echo base_url() ?>assets/foto/<?php echo $kry->foto ?>" alt="" style="max-width: 50%"></td>
                                <td class="text-center" style="width: 70px;">
                                    <a href="<?php echo base_url(); ?>features/formeditkaryawan/<?php echo $kry->id_karyawan; ?>" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?php echo base_url(); ?>features/hapuskaryawan/<?php echo $kry->id_karyawan; ?>" id="hapus" class="btn btn-danger btn-circle btn-sm tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>