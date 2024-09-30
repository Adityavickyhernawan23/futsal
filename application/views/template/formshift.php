<?php if ($this->uri->segment(2) == "formjamkerja") : ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 ml-1 text-gray-900">Form Input Jam kerja</h1>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/datajamkerja" style="text-decoration: none;">Data Jam Kerja</a></li>
                <li class="breadcrumb-item active my-auto" aria-current="page">Form Input Jam Kerja</li>
            </ol>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Jam Kerja</h6>
            </div>
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <form action="<?php echo base_url(); ?>features/formjamkerja" id="inputshift" method="post">
                        <div class="form-group d-none row">
                            <label for="idshift" class="col-lg-2 col-form-label">ID Jam Kerja</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="idshift" id="" class="form-control" value="<?php echo $autonumber; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namashift" class="col-lg-2 col-form-label">Nama Jam Kerja</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="namashift" id="" class="form-control" placeholder="Masukan Nama Jam Kerja">
                                <?php echo form_error('namashift'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="masuk" class="col-lg-2 col-form-label">Jam Masuk</label>
                            <div class="col-lg-10 text-left">
                                <input type="time" name="masuk" id="" class="form-control" placeholder="Masukan Jam Masuk Kerja">
                                <?php echo form_error('masuk'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keluar" class="col-lg-2 col-form-label">Jam Keluar</label>
                            <div class="col-lg-10 text-left">
                                <input type="time" name="keluar" id="" class="form-control" placeholder="Masukan Jam Keluar Kerja">
                                <?php echo form_error('keluar'); ?>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="toleransi" class="col-lg-2 col-form-label">Jam Toleransi Masuk</label>
                            <div class="col-lg-10 text-left">
                                <input type="time" name="toleransi" id="" class="form-control" placeholder="Masukan Jam Toleransi Masuk">
                                <?php echo form_error('toleransi'); ?>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
            <div class=" card-footer">
                <div class="container text-right">
                    <button form="inputshift" type="reset" class="btn btn-secondary">Reset</button>
                    <button form="inputshift" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($this->uri->segment(2) == "formeditshift") : ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 ml-1 text-gray-900">Form Edit Shift</h1>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/datashift" style="text-decoration: none;">Data Shift</a></li>
                <li class="breadcrumb-item active my-auto" aria-current="page">Form Edit Shift</li>
            </ol>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Shift</h6>
            </div>
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <form action="<?php echo base_url(); ?>features/updateshift/<?php echo $this->uri->segment(3) ?>" id="inputshift" method="post">
                        <div class="form-group d-none row">
                            <label for="idshift" class="col-lg-2 col-form-label">ID Shift</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="idshift" id="" class="form-control" value="<?php echo $data['id_shift'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namashift" class="col-lg-2 col-form-label">Nama Shift</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="namashift" id="" class="form-control" value="<?php echo $data['nama_shift'] ?>" placeholder="Masukan Nama Shift" required>
                                <?php echo form_error('namashift'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="masuk" class="col-lg-2 col-form-label">Jam Masuk</label>
                            <div class="col-lg-10 text-left">
                                <input type="time" name="masuk" id="" class="form-control" value="<?php echo $data['jam_masuk'] ?>" placeholder="Masukan Jam Masuk Kerja" required>
                                <?php echo form_error('masuk'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keluar" class="col-lg-2 col-form-label">Jam Keluar</label>
                            <div class="col-lg-10 text-left">
                                <input type="time" name="keluar" id="" class="form-control" value="<?php echo $data['jam_keluar'] ?>" placeholder="Masukan Jam Keluar Kerja" required>
                                <?php echo form_error('keluar'); ?>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="toleransi" class="col-lg-2 col-form-label">Jam Toleransi Masuk</label>
                            <div class="col-lg-10 text-left">
                                <input type="time" name="toleransi" id="" class="form-control" value="<?php echo $data['jam_toleransi'] ?>" placeholder="Masukan Jam Toleransi Masuk" required>
                                <?php echo form_error('toleransi'); ?>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
            <div class=" card-footer">
                <div class="container text-right">
                    <button form="inputshift" type="reset" class="btn btn-secondary">Reset</button>
                    <button form="inputshift" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>