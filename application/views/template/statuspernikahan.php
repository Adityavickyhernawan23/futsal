<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Status Pernikahan</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Status Pernikahan</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Status Pernikahan</h6>
            <a href="<?php echo base_url(); ?>features/formstatus" class="btn btn-sm btn-primary btn-icon-split ml-auto">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Status</span>
            </a>
        </div>
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-row-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width: 20px;">#</th>
                            <th>ID</th>
                            <th>Status</th>
                            <th style="width: 400px;">Jumlah Tanggungan</th>
                            <th style="width: 70px;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-light">
                        <tr>
                            <th class="text-center" style="width: 20px;">#</th>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Jumlah Tanggungan</th>
                            <th style="width: 70px;">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $dt) {
                        ?>
                            <tr>
                                <td class="text-center"><b><?php echo $no++ ?></b></td>
                                <td><?php echo $dt->id_status; ?></td>
                                <td><?php echo $dt->nama_status; ?></td>
                                <td><?php echo $dt->jumlah_tanggungan; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url(); ?>features/formeditstatus/<?php echo $dt->id_status; ?>" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?php echo base_url(); ?>features/hapusstatus/<?php echo $dt->id_status; ?>" class="btn btn-danger btn-circle btn-sm tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>