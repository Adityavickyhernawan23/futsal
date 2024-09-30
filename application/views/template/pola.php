<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Pola Kerja <?php echo $karyawan['nama_karyawan'] ?></h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>features/polakerja" style="text-decoration: none;">Pola Kerja Karyawan</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Pola Kerja <?php echo $karyawan['nama_karyawan'] ?></li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pola Kerja</h6>
            <a href="<?php echo base_url(); ?>features/printpola/<?php echo $this->uri->segment(3) ?>" class="btn btn-sm btn-primary btn-icon-split ml-auto" target="_blank">
                <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                </span>
                <span class="text">Print</span>
            </a>
        </div>
        <div class="card-body p-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <?php if ($this->session->userdata('status') == 'Admin') : ?>
                            <form action="<?php echo base_url() ?>features/hitunghari" method="POST">
                                <input type="hidden" name="idkaryawan" value="<?php echo $this->uri->segment(3) ?>">
                                <div class="form-group">
                                    <label for="tgl1">Dari Tanggal</label>
                                    <input type="date" name="tgl1" id="tgl1" class="form-control" min="">
                                </div>
                                <div class="form-group">
                                    <label for="tgl2">Sampai Tanggal</label>
                                    <input type="date" name="tgl2" id="tgl2" class="form-control" required>
                                </div>
                                <label for="shift">Jam Kerja</label>
                                <select name="shift" id="shift" class="form-control" required>
                                    <?php
                                    foreach ($shift as $a) {
                                    ?>
                                        <option value="<?php echo $a->id_shift ?>"><?php echo $a->nama_shift ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </form>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('status') == 'Member') : ?>
                            <img src="<?php echo base_url(); ?>assets/foto/<?php echo $biodata['foto'] ?>" alt="" class="img-thumbnail mb-3 mt-3" style="max-width: 70%;">
                            <h5 class="text-gray-900"><b><?php echo $biodata['nama_karyawan'] ?></b></h5>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-8">
                        <div class="table-responsive">
                            <table class="table table-row-striped table-hover border mt-5" id="dataTable" width="100%" cellspacing="0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Hari</th>
                                        <th>Jam kerja</th>
                                        <?php if ($this->session->userdata('status') == 'Admin') : ?>
                                            <th style="max-width: 10px;">Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($jadwal as $dt) {
                                        $hari = array(
                                            'Monday'  => 'Senin',
                                            'Tuesday'  => 'Selasa',
                                            'Wednesday' => 'Rabu',
                                            'Thursday' => 'Kamis',
                                            'Friday' => 'Jumat',
                                            'Saturday' => 'Sabtu',
                                            'Sunday' => 'Minggu'
                                        );
                                    ?>
                                        <tr>
                                            <td><?php echo $dt->nama_karyawan ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($dt->tgl_kerja)) ?></td>
                                            <td><?php
                                                $tgl = $dt->tgl_kerja;
                                                $day = date('l', strtotime($tgl));
                                                echo $hari[$day];
                                                ?>
                                            </td>
                                            <td><?php echo $dt->nama_shift ?></td>
                                            <?php if ($this->session->userdata('status') == 'Admin') : ?>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>features/hapusjadwal/<?php echo $dt->id_karyawan; ?>" id="hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
    document.getElementById("tgl1").setAttribute("min", today);
</script>