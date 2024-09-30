<?php
if ($this->uri->segment(2) == "formstatus") {
?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 ml-1 text-gray-900">Form Input Status</h1>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/statuspernikahan" style="text-decoration: none;">Status Pernikahan</a></li>
                <li class="breadcrumb-item active my-auto" aria-current="page">Form Input Status</li>
            </ol>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Status</h6>
            </div>
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <form action="<?php echo base_url(); ?>features/formstatus" id="inputstatus" method="post">
                        <div class="form-group d-none row">
                            <label for="idstatus" class="col-lg-2 col-form-label">ID Status</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="idstatus" id="" class="form-control" value="<?php echo $autonumber; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namastatus" class="col-lg-2 col-form-label">Nama Status</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="namastatus" id="" class="form-control" value="<?php echo set_value('namastatus') ?>" placeholder="Masukan Nama Status">
                                <?php echo form_error('namastatus'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlahtanggungan" class="col-lg-2 col-form-label">Jumlah Tanggungan</label>
                            <div class="col-lg-10 text-left">
                                <input type="number" name="jumlahtanggungan" id="" class="form-control" placeholder="Masukan Jumlah Tanggungan" maxlength="1">
                                <?php echo form_error('jumlahtanggungan'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" card-footer">
                <div class="container text-right">
                    <button form="inputstatus" type="reset" class="btn btn-secondary">Reset</button>
                    <button form="inputstatus" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
if ($this->uri->segment(2) == "formeditstatus") {
?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 ml-1 text-gray-900">Form Input Status</h1>
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/statuspernikahan" style="text-decoration: none;">Status Pernikahan</a></li>
                <li class="breadcrumb-item active my-auto" aria-current="page">Form Input Status</li>
            </ol>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Status</h6>
            </div>
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <form action="<?php echo base_url(); ?>features/formeditstatus" id="inputstatus" method="post">
                        <div class="form-group d-none row">
                            <label for="idstatus" class="col-lg-2 col-form-label">ID Status</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="idstatus" id="" class="form-control" value="<?php echo $dt['id_status']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namastatus" class="col-lg-2 col-form-label">Nama Status</label>
                            <div class="col-lg-10 text-left">
                                <input type="text" name="namastatus" id="" class="form-control" value="<?php echo $dt['status'] ?>" placeholder="Masukan Nama Status">
                                <?php echo form_error('namastatus'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlahtanggungan" class="col-lg-2 col-form-label">Jumlah Tanggungan</label>
                            <div class="col-lg-10 text-left">
                                <input type="number" name="jumlahtanggungan" id="" class="form-control" value="<?php echo $dt['jumlah_tanggungan'] ?>" placeholder="Masukan Jumlah Tanggungan" maxlength="1">
                                <?php echo form_error('jumlahtanggungan'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" card-footer">
                <div class="container text-right">
                    <button form="inputstatus" type="reset" class="btn btn-secondary">Reset</button>
                    <button form="inputstatus" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>