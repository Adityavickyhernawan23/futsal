<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/s.png" type="image/x-icon">
    <meta name="author" content="">

    <title>Sigaji - <?php echo $judul; ?></title>

    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/styledaftar.css" rel="stylesheet">


    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>


</head>

<body>
    <div id="flash-data" data-flashdata="<?php echo $this->session->flashdata('error') ?>"></div>

    <div class="container-pluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 col-md-9">
                    <div class="card o-hidden border-1 my-5">
                        <div class="card-body p-0">
                            <div class="col-lg-12 p-5">
                                <div class="p-3">
                                    <div class="text-center mb-4">
                                        <img class="p-2 ml-2" src="<?php echo base_url(); ?>assets/img/payroll2.png" alt="" style=" width: 50%;">

                                    </div>
                                    <form class="user" id="daftar" method="POST" action="<?php echo base_url(); ?>daftar">
                                        <input type="hidden" name="iduser" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nip" id="nip" maxlength="13" value="<?php echo set_value('nip'); ?>" placeholder="NIP">
                                            <?php echo form_error('nip', '<small class="text-danger"><i>', '</i></small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
                                            <?php echo form_error('username', '<small class="text-danger"><i>', '</i></small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                            <?php echo form_error('password', '<small class="text-danger"><i>', '</i></small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password1" id="password1" placeholder="Konfirmasi Password">
                                            <?php echo form_error('password1', '<small class="text-danger"><i>', '</i></small>'); ?>
                                        </div>
                                        <div class="form-group text-center mt-4">
                                            <button form="daftar" href="" type="submit" id="btnSubmit" class="btn btn-primary btn-block">
                                                <b>Daftar</b>
                                            </button>
                                        </div>
                                    </form>
                                    <div class="separator mb-3">atau</div>
                                    <a href="<?php echo base_url(); ?>Login" style="text-decoration:none;"><button class="btn btn-success btn-block">
                                            <b>Masuk</b>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="sticky-bottom py-5">
        <div class="container">
            <center><b>Copyright &copy; 2020 Karya1 | Powered by Bootrstrap</b></center>
        </div>
    </footer>

    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/myscript.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>

    <script>
        const flashData12 = $('#flash-data').data('flashdata');
        if (flashData12) {
            Swal.fire(
                'Gagal!',
                flashData12,
                'error'
            )
        }
    </script>

</body>

</html>