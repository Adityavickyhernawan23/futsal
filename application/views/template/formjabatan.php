<?php
if ($this->uri->segment(2) == "formjabatan") {
?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 ml-1 text-gray-900">Form Input Jabatan</h1>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/jabatan" style="text-decoration: none;">Data Jabatan</a></li>
                <li class="breadcrumb-item active my-auto" aria-current="page">Form Input Jabatan</li>
            </ol>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Jabatan</h6>
            </div>
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <form action="<?php echo base_url(); ?>features/formjabatan" id="inputjabatan" method="post">
                        <div class="form-group row d-none">
                            <label for="idjabatan" class="col-lg-2 col-form-label">ID Jabatan</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="idjabatan" id="" class="form-control" value="<?php echo $autonumber; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namajabatan" class="col-lg-2 col-form-label">Nama Jabatan</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="namajabatan" id="" class="form-control" value="<?php echo set_value('namajabatan'); ?>" placeholder="Masukan Nama Jabatan">
                                <?php echo form_error('namajabatan', '<i style="color:#a6230c;">', '</i>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gajipokokjabatan" class="col-lg-2 col-form-label">Gaji Pokok</label>
                            <div class="col-lg-10 text-left">
                                <input type="number" name="gajipokokjabatan" id="" class="form-control" value="<?php echo set_value('gajipokokjabatan'); ?>" placeholder="Masukan Nominal Gaji Pokok Jabatan">
                                <?php echo form_error('gajipokokjabatan', '<i style="color:#a6230c;">', '</i>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tunjanganjabatan" class="col-lg-2 col-form-label">Jumlah Tunjangan</label>
                            <div class="col-lg-10 text-left">
                                <input type="number" name="tunjanganjabatan" id="" class="form-control" value="<?php echo set_value('tunjanganjabatan'); ?>" placeholder="Masukan Nominal Tunjangan Jabatan">
                                <?php echo form_error('tunjanganjabatan', '<i style="color:#a6230c;">', '</i>'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="container text-right">
                    <button form="inputjabatan" type="reset" class="btn btn-secondary">Reset</button>
                    <button form="inputjabatan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
if ($this->uri->segment(2) == "formeditjabatan") {
?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 ml-1 text-gray-900">Form Edit Jabatan</h1>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/jabatan" style="text-decoration: none;">Data Jabatan</a></li>
                <li class="breadcrumb-item active my-auto" aria-current="page">Form Edit Jabatan</li>
            </ol>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Jabatan</h6>
            </div>
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <form action="<?php echo base_url(); ?>features/formeditjabatan" id="editjabatan" method="post">
                        <div class="form-group row">
                            <div class="col-lg-10 text-left">
                                <input type="hidden" name="idjabatan" id="" class="form-control" value="<?php echo $test['id_jabatan']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namajabatan" class="col-lg-2 col-form-label">Nama Jabatan</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="namajabatan" id="" class="form-control" value="<?php echo $test['nama_jabatan']; ?>">
                                <?php echo form_error('namajabatan'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gajipokokjabatan" class="col-lg-2 col-form-label">Gaji Pokok</label>
                            <div class="col-lg-10 text-left">
                                <input type="number" name="gajipokokjabatan" id="" class="form-control" value="<?php echo $test['gaji_pokok']; ?>">
                                <?php echo form_error('gajipokokjabatan'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tunjanganjabatan" class="col-lg-2 col-form-label">Jumlah Tunjangan</label>
                            <div class="col-lg-10 text-left">
                                <input type="number" name="tunjanganjabatan" id="" class="form-control" value="<?php echo $test['tunjangan']; ?>">
                                <?php echo form_error('tunjanganjabatan'); ?>
                            </div>
                        </div>
                    </form>
                    <small style="color:#a6230c;">*Jika Data Tereset, Kembali Ke Halaman Sebelumnya</small>
                </div>
            </div>
            <div class="card-footer">
                <div class="container text-right">
                    <button form="editjabatan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>