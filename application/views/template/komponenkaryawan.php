<div class="container-fluid">

    <h1 class="h3 mb-4 ml-1 text-gray-900">Data Komponen</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Data Komponen</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Komponen</h6>
        </div>
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
                            <th class="text-center" style="width: 70px;">Komponen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($karyawan as $kry) : ?>
                            <tr>
                                <th><?php echo $no++ ?></th>
                                <td><?php echo $kry->id_karyawan ?></td>
                                <td><?php echo $kry->nama_karyawan ?></td>
                                <td><?php echo $kry->nama_jabatan ?></td>
                                <td><?php echo $kry->divisi ?></td>
                                <td><?php echo $kry->no_telp ?></td>
                                <td><?php echo $kry->email ?></td>
                                <td><?php echo $kry->alamat ?></td>
                                <td class="text-center" style="width: 130px;">
                                    <a href="<?php echo base_url(); ?>features/komponengaji/<?php echo $kry->id_karyawan ?>" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Komponen Gaji">
                                        <i class="fas fa-pen"></i>
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