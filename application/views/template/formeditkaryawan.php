<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Form Edit Karyawan</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/karyawan" style="text-decoration: none;">Data Karyawan</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Form Edit Karyawan</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="container mt-4 mb-4">
                <form method="post" id="editkaryawan" action="<?php echo base_url() . 'features/simpaneditkaryawan'; ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="IdKaryawan" class="col-lg-2 col-form-label">NIP</label>
                        <div class="col-lg-10 text-left">
                            <input type="text" name="IdKaryawan" id="" class="form-control" value="<?php echo $karyawan['id_karyawan'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NamaKaryawan" class="col-lg-2 col-form-label">Nama Karyawan</label>
                        <div class="col-lg-10 text-left">
                            <input type="text" name="NamaKaryawan" id="" class="form-control" value="<?php echo $karyawan['nama_karyawan'] ?>" requaired>
                            <?php echo form_error('NamaKaryawan', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tempatlahir" class="col-lg-2 col-form-label">Tempat Lahir</label>
                        <div class="col-lg-10 text-left">
                            <input type="text" name="Tempatlahir" id="" class="form-control" value="<?php echo $karyawan['tempat_lahir'] ?>">
                            <?php echo form_error('Tempatlahir', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tanggallahir" class="col-lg-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-lg-10 text-left">
                            <input type="date" name="Tanggallahir" id="" class="form-control" value="<?php echo $karyawan['tanggal_lahir'] ?>" max="2001-12-31">
                            <?php echo form_error('Tanggallahir', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Nik" class="col-lg-2 col-form-label">NIK</label>
                        <div class="col-lg-10 text-left">
                            <input type="text" name="Nik" id="" class="form-control" value="<?php echo $karyawan['nik'] ?>" required>
                            <?php echo form_error('Nik', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NoTelp" class="col-lg-2 col-form-label">No Telp</label>
                        <div class="col-lg-10 text-number-left">
                            <input type="text" name="NoTelp" id="" class="form-control" value="<?php echo $karyawan['no_telp'] ?>" required>
                            <?php echo form_error('NoTelp', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Email" class="col-lg-2 col-form-label">Email</label>
                        <div class="col-lg-10 text-left">
                            <input type="text" name="Email" id="" class="form-control" value="<?php echo $karyawan['email'] ?>" required>
                            <?php echo form_error('Email', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Alamat" class="col-lg-2 col-form-label">Alamat</label>
                        <div class="col-lg-10 text-left">
                            <input type="text" name="Alamat" id="" class="form-control" value="<?php echo $karyawan['alamat'] ?>" required>
                            <?php echo form_error('Alamat', '<i style="color:#a6230c;">', '</i>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Jeniskelamin" class="col-lg-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-lg-10 text-left">
                            <select type="text" name="Jeniskelamin" id="" class="form-control">
                                <option value="<?php echo $karyawan['jenis_kelamin'] ?>"><?php echo $karyawan['jenis_kelamin'] ?></option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Status" class="col-lg-2 col-form-label">Status Menikah</label>
                        <div class="col-lg-10 text-left">
                            <select type="text" name="Status" id="" class="form-control" value="" required>
                                <option value="<?php echo $karyawan['status'] ?>"><?php echo $karyawan['status'] ?></option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Agama" class="col-lg-2 col-form-label">Agama</label>
                        <div class="col-lg-10 text-left">
                            <select type="text" name="Agama" id="" class="form-control" value="">
                                <option value="<?php echo $karyawan['agama'] ?>"><?php echo $karyawan['agama'] ?></option>
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
                            <select name="Pendidikan" id="" class="form-control">
                                <option value="<?php echo $karyawan['pendidikan'] ?>"><?php echo $karyawan['pendidikan'] ?></option>
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
                            <select type="text" name="Jabatan" id="" class="form-control" value="">
                                <option value="<?php echo $karyawan['jabatan'] ?>"><?php echo $karyawan['nama_jabatan'] ?></option>
                                <?php
                                foreach ($jabatan as $jb) {
                                ?>
                                    <option value="<?php echo $jb->id_jabatan ?>"><?php echo $jb->nama_jabatan ?></option>
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
                                <option value="<?php echo $karyawan['bagian'] ?>"><?php echo $karyawan['divisi'] ?></option>
                                <?php foreach ($divisi as $dv) : ?>
                                    <option value="<?php echo $dv->id_divisi ?>"><?php echo $dv->divisi ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Tanggalmasuk" class="col-lg-2 col-form-label">Tanggal Masuk</label>
                        <div class="col-lg-10 text-left">
                            <input type="date" name="Tanggalmasuk" id="datefield" class="form-control" value="<?php echo $karyawan['tanggal_masuk'] ?>" min="">
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
                <button form="editkaryawan" type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>