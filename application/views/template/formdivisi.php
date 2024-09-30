<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Divisi</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/jabatan" style="text-decoration: none;">Data Jabatan</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Divisi</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Divisi</h6>
        </div>
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="iddivisi" value="<?php echo $autonumber; ?>">
                <div class="form-inline">
                    <input type="text" name="divisi" class="form-control rounded-left" value="<?php echo set_value('divisi'); ?>" style="border-radius: 0px;" placeholder="Masukan nama divisi">
                    <button type="submit" class="btn btn-primary rounded-right mr-1" style="border-radius: 0px;">Simpan</button>
                    <?php echo form_error('divisi', '<i style="color:#a6230c;">', '</i>'); ?>
                </div>
            </form>
            <hr>
            <div class="table-responsive mt-3">
                <table class="table table-row-border table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width:40px;">#</th>
                            <th>ID</th>
                            <th>Divisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $dt) {
                        ?>
                            <tr>
                                <td class="text-center"><b><?php echo $no++ ?></b></td>
                                <td><?php echo $dt->id_divisi ?></td>
                                <td><?php echo $dt->divisi ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>