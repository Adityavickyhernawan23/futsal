<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Komponen Gaji Karyawan</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active my-auto"><a href="<?php echo base_url(); ?>features/komponenkaryawan" style="text-decoration: none;">Data Komponen</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Komponen Gaji Karyawan</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Komponen Gaji Karyawan</h6>
            <?php if ($this->session->userdata('status') == 'Admin') : ?>
                <a href="<?php echo base_url(); ?>features/slipgaji/<?php echo $this->uri->segment(3) ?>" class="btn btn-sm btn-primary btn-icon-split ml-auto" target="_blank">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print</span>
                </a>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 text-center">
                    <img src="<?php echo base_url(); ?>assets/foto/<?php echo $biodata['foto'] ?>" alt="" class="img-thumbnail mb-3 mt-3" style="max-width: 70%;">
                    <p class="text-gray-900"><b><?php echo $biodata['nama_karyawan'] ?></b></p>
                </div>
                <div class="col-lg-9">
                    <?php if ($this->session->userdata('status') == 'Admin') : ?>
                        <form action="<?php echo base_url(); ?>features/inputkomponen" method="post" id="tambahkomponen">
                            <input type="hidden" name="idkaryawan" value="<?php echo $this->uri->segment(3) ?>" readonly>
                            <div class="form-group row p-3">
                                <select type="text" name="tunjangan" class="form-control col-lg-4">
                                    <?php foreach ($tunjangan as $dt) {
                                    ?>
                                        <option value="<?php echo $dt->id_tunjangan ?>"> <?php echo $dt->nama_tunjangan ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>&nbsp <button type="submit" form="tambahkomponen" class="btn btn-primary col-lg-2">Tambah Komponen</button>
                            </div>
                        </form>
                    <?php endif; ?>
                    <hr>
                    <h4>Komponen Gaji <?php echo $biodata['nama_karyawan'] ?></h4>
                    <div class="table-responsive mb-3 mt-3">
                        <table class="table table-row-striped table-hover" id="" width="100%" cellspacing="0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Komponen</th>
                                    <th>Nominal</th>
                                    <th>Jenis</th>
                                    <?php if ($this->session->userdata('status') == 'Admin') : ?>
                                        <th>More</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($komponen as $kp) {
                                ?>
                                    <tr>
                                        <td><?php echo $kp->nama_tunjangan ?></td>
                                        <td>Rp <?php echo number_format($kp->nominal) ?></td>
                                        <td><?php echo $kp->jenis ?></td>
                                        <?php if ($this->session->userdata('status') == 'Admin') : ?>
                                            <td>
                                                <a href="<?php echo base_url(); ?>features/deletekomponen/<?php echo $kp->id_komponen; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <form action="<?php echo base_url(); ?>features/inputgajian" method="post" id="inputkomponen">
                        <div class="row">

                            <div class="col-lg-2">
                                <label for="">Jumlah Tunjangan</label>
                                <input type="text" class="form-control" name="tunjangan" value="<?php echo number_format($jmlt['jml']) ?>" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="">Jumlah Potongan</label>
                                <input type="text" class="form-control" name="potongan" value="<?php echo number_format($jmlp['jml']) ?>" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="">Gaji Pokok</label>
                                <input type="text" class="form-control" name="gajipokok" value="<?php echo number_format($gaji['gaji_pokok']) ?>" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="">Tunjangan Jabatan</label>
                                <input type="text" class="form-control" name="tjabatan" value="<?php echo number_format($gaji['tunjangan']) ?>" readonly>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Hitung Gaji Bersih</label>
                                    <input type="text" class="form-control" name="gaji" value="<?= number_format($total); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <input type="hidden" class="form-control" name="idkaryawan" value="<?php echo $this->uri->segment(3) ?>">
                            </div>
                            <?php if ($this->session->userdata('status') == 'Admin') { ?>
                                <?php
                                if ($gettgl != date('Ym')) :
                                ?>
                                    <button type="submit" form="inputkomponen" id="submit " class="btn btn-primary" style="margin-left: 10px">Simpan</button>
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    </form>
                    <h5 class="mt-3"><b>Total Gaji</b>:&nbsp Rp <?= number_format($total); ?></h5>
                    <?php if ($this->session->userdata('status') == 'Admin') : ?>
                        <p class="text-danger font-weight-bold font-italic">Catatan: Simpan data gaji kedalam database hanya bisa dilakukan 1 kali perbulan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    $(document).ready(function() {
        $("#inputkomponen").submit(function() {
            $("#submit").attr("disabled", true);
            return true;
        });
    });
</script> -->