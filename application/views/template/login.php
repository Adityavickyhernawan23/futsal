<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/pgn.png" type="image/x-icon">
    <meta name="author" content="">

    <title>PT Perusahaan Gas Negara - <?php echo $judul; ?></title>

    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

</head>

<body>

    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
    <div id="flash-data" data-flashdata="<?php echo $this->session->flashdata('error') ?>"></div>

    <div class="container-pluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 col-md-9">
                    <div class="card o-hidden border-1 my-5">
                        <div class="card-body p-0">
                            <div class="bg-primary">
                                <div class="col-lg-12 p-5 bg-white">
                                    <div class="p-3">
                                        <div class="text-center mb-4">
                                            <img class="p-2 ml-2" src="<?php echo base_url(); ?>assets/img/pgn.png" alt="" style=" width: 50%;">
                                            <?php if (isset($error)) {
                                                echo $error;
                                            }
                                            ?>
                                        </div>
                                        <form method="POST" action="<?php echo base_url(); ?>login">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
                                                <?php echo form_error('username'); ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" id="password-field" placeholder="Password">
                                                <span toggle="#password-field" class="toggle-password fa fa-fw fa-eye field-icon"></span>
                                                <?php echo form_error('password'); ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" href="" class="btn btn-primary btn-block">
                                                    <b>Masuk</b>
                                                </button>
                                            </div>
                                        </form>
                                        <!-- <div class="separator mb-3">atau</div>
                                        <a href="<?php echo base_url(); ?>daftar" style="text-decoration:none;"><button class="btn btn-success btn-block">
                                                <b>Daftar</b>
                                            </button></a> -->
                                    </div>
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
            <center><b>Copyright &copy; 2021 PT Perusahaan Gas Negara</b></center>
        </div>
    </footer>

    <script>
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/myscript.js"></script>
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