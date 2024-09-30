<?php
if ($this->uri->segment(2) == "formtunjangan") {
?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 ml-1 text-gray-900">Form Input Tunjangan</h1>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/tunjangan" style="text-decoration: none;">Data Tunjangan</a></li>
                <li class="breadcrumb-item active my-auto" aria-current="page">Form Input Tunjangan</li>
            </ol>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Tunjangan</h6>
            </div>
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <form action="<?php echo base_url(); ?>features/formtunjangan" id="inputtunjangan" method="post">
                        <div class="form-group d-none row">
                            <label for="idtunjangan" class="col-lg-2 col-form-label">ID Tunjangan</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="idtunjangan" id="" class="form-control" value="<?php echo $autonumber; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namatunjangan" class="col-lg-2 col-form-label">Nama Tunjangan</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="namatunjangan" id="" class="form-control" placeholder="Masukan Nama tunjangan">
                                <?php echo form_error('namatunjangan', '<i style="color:#a6230c;">', '</i>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nominaltunjangan" class="col-lg-2 col-form-label">Nominal Tunjangan</label>
                            <div class="col-lg-10 text-left">
                                <input type="number" name="nominaltunjangan" id="" class="form-control" placeholder="Masukan Nominal">
                                <?php echo form_error('nominaltunjangan', '<i style="color:#a6230c;">', '</i>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenistunjangan" class="col-lg-2 col-form-label">Jenis Tunjangan</label>
                            <div class="col-lg-10 text-left">
                                <select type="text" name="jenistunjangan" id="" class="form-control" aria-placeholder="Masukan Jenis Tunjangan">
                                    <option value="Tunjangan">Tunjangan</option>
                                    <option value="Potongan">Potongan</option>
                                </select>
                                <?php echo form_error('jenistunjangan', '<i style="color:#a6230c;">', '</i>'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="container text-right">
                    <button form="inputtunjangan" type="reset" class="btn btn-secondary">Reset</button>
                    <button form="inputtunjangan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
if ($this->uri->segment(2) == "formedittunjangan") {
?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 ml-1 text-gray-900">Form Edit Tunjangan</h1>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/tunjangan" style="text-decoration: none;">Data Tunjangan</a></li>
                <li class="breadcrumb-item active my-auto" aria-current="page">Form Edit Tunjangan</li>
            </ol>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Tunjangan</h6>
            </div>
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <form action="<?php echo base_url(); ?>features/formedittunjangan" id="inputtunjangan" method="post">
                        <div class="form-group d-none row">
                            <label for="idtunjangan" class="col-lg-2 col-form-label">ID Tunjangan</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="idtunjangan" id="" class="form-control" value="<?php echo $dt['id_tunjangan']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namatunjangan" class="col-lg-2 col-form-label">Nama Tunjangan</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="namatunjangan" id="" class="form-control" value="<?php echo $dt['nama_tunjangan']; ?>" placeholder="Masukan Nama tunjangan">
                                <?php echo form_error('namatunjangan', '<i style="color:#a6230c;">', '</i>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nominaltunjangan" class="col-lg-2 col-form-label">Nominal Tunjangan</label>
                            <div class="col-lg-10 text-left">
                                <input type="number" name="nominaltunjangan" id="" class="form-control" value="<?php echo $dt['nominal']; ?>" placeholder="Masukan Nominal">
                                <?php echo form_error('nominaltunjangan', '<i style="color:#a6230c;">', '</i>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenistunjangan" class="col-lg-2 col-form-label">Jenis Tunjangan</label>
                            <div class="col-lg-10 text-left">
                                <select type="text" name="jenistunjangan" id="" class="form-control" aria-placeholder="Masukan Jenis Tunjangan">
                                    <option value="Tunjangan">Tunjangan</option>
                                    <option value="Potongan">Potongan</option>
                                </select>
                                <?php echo form_error('jenistunjangan', '<i style="color:#a6230c;">', '</i>'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="container text-right">
                    <button form="inputtunjangan" type="reset" class="btn btn-secondary">Reset</button>
                    <button form="inputtunjangan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>