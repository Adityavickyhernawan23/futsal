<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Form Input Karyawan</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/karyawan" style="text-decoration: none;">Data Karyawan</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Form Input Karyawan</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Form Input Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="container mt-4 mb-4">
                <p class="text-danger">Note : Saat validasi berjalan data pada option akan kembali pada posisi default.</p>
                <form method="post" id="inputkaryawan" action="<?php echo base_url() . 'features/formkaryawan'; ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="IdKaryawan" class="col-lg-2 col-form-label">NIP</label>
                        <div class="col-lg-10 text-left">
                            <input type="text" name="IdKaryawan" id="" class="form-control" value="<?php echo $autonumber; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NamaKaryawan" class="col-lg-2 col-form-label">Nama Lengkap</label>
                        <div class="col-lg-10 text-left">
                            <input type="text" name="NamaKaryawan" id="NamaKaryawan" value="<?php echo set_value('NamaKaryawan'); ?>" class="form-control">
                            <?php echo form_error('NamaKaryawan', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tempatlahir" class="col-lg-2 col-form-label">Tempat Lahir</label>
                        <div class="col-lg-10 text-left">
                            <input type="text" name="Tempatlahir" id="" value="<?php echo set_value('Tempatlahir'); ?>" class="form-control">
                            <?php echo form_error('Tempatlahir', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tanggallahir" class="col-lg-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-lg-10 text-left">
                            <input type="date" name="Tanggallahir" id="" value="<?php echo set_value('Tanggallahir'); ?>" class="form-control" max="2001-12-31">
                            <?php echo form_error('Tanggallahir', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Nik" class="col-lg-2 col-form-label">NIK</label>
                        <div class="col-lg-10 text-left">
                            <input type="number" name="Nik" id="" value="<?php echo set_value('Nik'); ?>" class="form-control">
                            <?php echo form_error('Nik', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NoTelp" class="col-lg-2 col-form-label">No Telp</label>
                        <div class="col-lg-10 text-number-left">
                            <input type="number" name="NoTelp" id="NoTelp" value="<?php echo set_value('NoTelp'); ?>" class="form-control">
                            <?php echo form_error('NoTelp', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Email" class="col-lg-2 col-form-label">Email</label>
                        <div class="col-lg-10 text-left">
                            <input type="text" name="Email" id="" value="<?php echo set_value('Email'); ?>" class="form-control">
                            <?php echo form_error('Email', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Alamat" class="col-lg-2 col-form-label">Alamat</label>
                        <div class="col-lg-10 text-left">
                            <textarea type="text" name="Alamat" id="" class="form-control"><?php echo set_value('Alamat'); ?></textarea>
                            <?php echo form_error('Alamat', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Jeniskelamin" class="col-lg-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-lg-10 text-left">
                            <select type="text" name="Jeniskelamin" id="" class="form-control">
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Status" class="col-lg-2 col-form-label">Status Menikah</label>
                        <div class="col-lg-10 text-left">
                            <select type="text" name="Status" id="" class="form-control">
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Agama" class="col-lg-2 col-form-label">Agama</label>
                        <div class="col-lg-10 text-left">
                            <select type="text" name="Agama" id="" class="form-control">
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Budha</option>
                                <option>Hindu</option>
                                <option>Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Pendidikan" class="col-lg-2 col-form-label">Pendidikan</label>
                        <div class="col-lg-10 text-left">
                            <select name="Pendidikan" id="Pendidikan" class="form-control">
                                <option value="S3">S3</option>
                                <option value="S2">S2</option>
                                <option value="S1">S1</option>
                                <option value="SMK">SMK</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Jabatan" class="col-lg-2 col-form-label">Jabatan</label>
                        <div class="col-lg-10 text-left">
                            <select type="text" name="Jabatan" id="" class="form-control">
                                <?php
                                foreach ($jabatan as $dj) {
                                ?>
                                    <option value="<?php echo $dj->id_jabatan; ?>"><?php echo $dj->nama_jabatan; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Bagian" class="col-lg-2 col-form-label">Bagian</label>
                        <div class="col-lg-10 text-left">
                            <select name="Bagian" id="Bagian" class="form-control">
                                <?php foreach ($divisi as $dv) : ?>
                                    <option value="<?php echo $dv->id_divisi ?>"><?php echo $dv->divisi ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tanggalmasuk" class="col-lg-2 col-form-label">Tanggal Masuk</label>
                        <div class="col-lg-10 text-left">
                            <input type="date" name="Tanggalmasuk" id="datefield" value="<?php echo set_value('Tanggalmasuk'); ?>" class="form-control">
                            <?php echo form_error('Tanggalmasuk', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-lg-2 col-form-label">Foto</label>
                        <div class="col-lg-10 text-left">
                            <input type="file" name="gambar" id="gambar" class="form-control-file">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <div class="container text-right">
                <button form="inputkaryawan" type="reset" class="btn btn-secondary">Reset</button>
                <button form="inputkaryawan" type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("datefield").setAttribute("min", today);
</script> -->