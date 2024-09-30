<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Data User</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Data User</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            <a href="<?php echo base_url(); ?>features/adduser" class="btn btn-sm btn-primary btn-icon-split ml-auto">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">User</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-row-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width: 20px;">#</th>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Divisi</th>
                            <th>Username</th>
                            <th>Status</th>
                            <?php if ($this->session->userdata('user_id') == 'U001') : ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $dt) {
                        ?>
                            <tr>
                                <td class="text-center"><b><?php echo $no++ ?></b></td>
                                <td><?php echo $dt->id_user; ?></td>
                                <td><?php echo $dt->nama_karyawan; ?></td>
                                <td><?php echo $dt->divisi; ?></td>
                                <td><?php echo $dt->username; ?></td>
                                <td><?php echo $dt->status; ?></td>
                                <?php if ($this->session->userdata('user_id') == 'U001') : ?>
                                    <td>
                                        <a href="<?php echo base_url(); ?>features/edituser/<?php echo $dt->id_user; ?>" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="<?php echo base_url() ?>features/hapususer/<?php echo $dt->id_user; ?>" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>