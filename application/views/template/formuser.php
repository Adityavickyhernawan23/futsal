<?php
if ($this->uri->segment(2) == "adduser") {
?>
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
    <div id="flash-data" data-flashdata="<?php echo $this->session->flashdata('error') ?>"></div>
    <div class="container">
        <div class="text-center mt-5">
            <div class="card shadow mx-auto">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Admin</h6>
                </div>
                <form action="<?php echo base_url() ?>features/adduser" id="formuser" method="post">
                    <div class="card-body">
                        <div class="container text-left mt-4 mb-4">
                            <div class="form-group row d-none">
                                <label for="iduser" class="col-lg-3 col-form-label">ID User</label>
                                <div class="col-lg-9">
                                    <input type="text" name="iduser" class="form-control" value="<?php echo $autonumber ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namauser" class="col-lg-3 col-form-label">Nama User</label>
                                <div class="col-lg-9 text-left">
                                    <select name="namauser" id="" class="form-control">
                                        <?php foreach ($karyawan as $kr) : ?>
                                            <option value="<?php echo $kr->id_karyawan ?>"><?php echo $kr->nama_karyawan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-lg-3 col-form-label">Username</label>
                                <div class="col-lg-9 text-left">
                                    <input type="text" name="username" id="username" class="form-control">
                                    <?php echo form_error('username') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-lg-3 col-form-label">Password</label>
                                <div class="col-lg-9 text-left">
                                    <input type="password" name="password" id="password" class="form-control" readonly>
                                    <span toggle="#password" class="toggle-password fa fa-fw fa-eye field-icon"></span>
                                    <?php echo form_error('password') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-lg-3 col-form-label">Status</label>
                                <div class="col-lg-9 text-left">
                                    <select type="text" name="status" id="status" class="form-control">
                                        <option>Admin</option>
                                        <option>Member</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="container text-right">
                            <button form="formuser" type="reset" class="btn btn-secondary">Reset</button>
                            <button form="formuser" type="submit" id="btnSubmit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btnSubmit').attr('disabled', true);
        $('.form-group input').keyup(function() {
            $('.form-group input').each(function() {
                if ($(this).val().length != 0)
                    $('#btnSubmit').attr('disabled', false);
                else
                    $('#btnSubmit').attr('disabled', true);
            });
        });

        $("#username").on("input", function() {
            // Print entered value in a div box
            $("#password").val($(this).val());
        });

        $(function() {
            $("#btnSubmit").click(function() {
                var password = $("#password").val();
                var confirmPassword = $("#ulangpassword").val();
                if (password != confirmPassword) {
                    swal({
                        title: "Password Tidak Sama!",
                        text: "Pastikan password yang diisi sama.",
                        icon: "error",
                        button: "OK",
                    });
                    return false;
                }
                return true;
            });
        });

        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>

<?php
if ($this->uri->segment(2) == "edituser") {
?>
    <div class="container">
        <div class="text-center mt-5">
            <div class="card shadow mx-auto">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
                </div>
                <form action="<?php echo base_url() ?>features/edituser" id="formuser" method="post">
                    <div class="card-body">
                        <div class="container text-left mt-4 mb-4">
                            <div class="form-group row d-none">
                                <label for="iduser" class="col-lg-3 col-form-label">ID User</label>
                                <div class="col-lg-9">
                                    <input type="text" name="iduser" class="form-control" value="<?php echo $usr['id_user']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-lg-3 col-form-label">Username</label>
                                <div class="col-lg-9 text-left">
                                    <input type="text" name="username" id="username" class="form-control" value="<?php echo $usr['username']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-lg-3 col-form-label">Status</label>
                                <div class="col-lg-9 text-left">
                                    <select type="text" name="status" id="status" class="form-control">
                                        <option value="<?php echo $usr['status']; ?>"><?php echo $usr['status']; ?></option>
                                        <option>Admin</option>
                                        <option>Member</option>
                                        <option>Owner</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="container text-right">
                            <button form="formuser" type="reset" class="btn btn-secondary">Reset</button>
                            <button form="formuser" type="submit" id="" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php
    }
        ?>