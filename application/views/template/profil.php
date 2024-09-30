<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Profile</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Data User</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
        </div>
        <div class="card-body">
            <div class="container mb-4 mt-4">
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <img src="<?php echo base_url(); ?>assets/foto/<?php echo $profil['foto']; ?>" class="img-thumbnail mb-3" alt="" style="max-width:70%;">
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group row">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>">
                        </div>
                        <div class="form-group row">
                            <label for="">Username</label>
                            <input type="text" class="form-control" value="<?php echo $this->session->userdata('user_name'); ?>" readonly>
                        </div>
                        <div class="form-group row">
                            <p class="text-danger font-italic"><b> *Abaikan jika tidak ingin mengganti password.</b></p>
                            <input type="text" class="form-control" placeholder="Password Baru"">
                        </div>
                        <div class=" form-group row">
                            <p class="text-danger font-italic"><b> *Masukan password anda untuk mengkonfirmasi update profil.</b></p>
                            <input type="password" class="form-control" placeholder="Konfirmasi Password">
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>