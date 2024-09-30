<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Data Jabatan</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Data Jabatan</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
            <div class="ml-auto">
                <a href="<?php echo base_url(); ?>features/formjabatan" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Jabatan</span>
                </a>
                <a href="<?php echo base_url(); ?>features/formdivisi" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Divisi</span>
                </a>
            </div>
        </div>
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
        <div class="card-body">
            <!-- <form action="<?php //echo base_url(); 
                                ?>features/jabatan" id="inputjabatan" method="post">
                <div class="row">
                    <div class="col d-none">
                        <label for="idjabatan" class="col-lg-2 col-form-label">ID Jabatan</label>
                        <input type="text" name="idjabatan" id="" class="form-control" value="<?php //echo $autonumber; 
                                                                                                ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="namajabatan" class="col-lg-2 col-form-label">Nama Jabatan</label>
                        <input type="text" name="namajabatan" id="" class="form-control" value="<?php //echo set_value('namajabatan'); 
                                                                                                ?>" placeholder="Nama Jabatan" style="max-width: 500px;">
                        <button form="inputjabatan" type="submit" class="btn btn-primary mt-1">Simpan</button>
                        <?php //echo form_error('namajabatan', '<i style="color:#a6230c;">', '</i>'); 
                        ?>
                    </div>
                    <div class="col">
                        <label for="gajipokokjabatan" class="col-lg-2 col-form-label">Gaji Pokok</label>
                        <input type="number" name="gajipokokjabatan" id="" class="form-control" value="<?php //echo set_value('gajipokokjabatan'); 
                                                                                                        ?>" placeholder="Gaji Pokok Jabatan" style="max-width: 500px;">
                        <?php //echo form_error('gajipokokjabatan', '<i style="color:#a6230c;">', '</i>'); 
                        ?>
                    </div>
                    <div class="col">
                        <label for="tunjanganjabatan" class="col-lg-2 col-form-label">Jumlah Tunjangan</label>
                        <input type="number" name="tunjanganjabatan" id="" class="form-control" value="<?php //echo set_value('tunjanganjabatan'); 
                                                                                                        ?>" placeholder="Tunjangan Jabatan" style="max-width: 500px;">
                        <?php //echo form_error('tunjanganjabatan', '<i style="color:#a6230c;">', '</i>'); 
                        ?>
                    </div>
                </div>
            </form> -->
            <!-- <hr> -->
            <div class="table-responsive">
                <table class="table table-row-border table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width:40px;">#</th>
                            <th>ID</th>
                            <th>Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th class="text-center" style="width: 70px;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-light border">
                        <tr>
                            <th class="text-center" style="width:40px;">#</th>
                            <th>ID</th>
                            <th>Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th class="text-center" style="width: 70px;">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $dt) {
                        ?>
                            <tr>
                                <td class="text-center"><b><?php echo $no++ ?></b></td>
                                <td><?php echo $dt->id_jabatan; ?></td>
                                <td><?php echo $dt->nama_jabatan; ?></td>
                                <td>Rp <?php echo number_format($dt->gaji_pokok); ?></td>
                                <td>Rp <?php echo number_format($dt->tunjangan); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url(); ?>features/formeditjabatan/<?php echo $dt->id_jabatan; ?>" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?php echo base_url(); ?>features/hapusjabatan/<?php echo $dt->id_jabatan; ?>" id="hapus" class="btn btn-danger btn-circle btn-sm tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
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
<script>
    $(document).ready(function() {
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
    });
</script>