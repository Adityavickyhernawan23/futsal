<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Absensi Harian</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Absensi Harian</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Absensi Harian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-row-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th style="max-width: 30px;">No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Hari</th>
                            <th>Nama Jam kerja</th>
                            <th style="max-width: 50px;">Masuk</th>
                            <th style="max-width: 50px;">Ijin</th>
                            <th style="max-width: 50px;">Alpa</th>
                            <th style="max-width: 60px;">Absen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($presensi as $dt) {
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
                                <form action="<?php echo base_url() ?>features/inputabsen/<?php echo $dt->id_karyawan; ?>" id="absen" method="post">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $dt->id_karyawan; ?><input type="hidden" name="kry" value="<?php echo $dt->id_karyawan; ?>"><input type="hidden" name="shift" value="<?php echo $dt->id_shift; ?>"></td>
                                    <td><?php echo $dt->tgl_kerja; ?></td>
                                    <td>
                                        <?php
                                        $tgl = $dt->tgl_kerja;
                                        $day = date('l', strtotime($tgl));
                                        echo $hari[$day];
                                        ?>
                                    </td>
                                    <td><?php echo $dt->nama_shift; ?></td>
                                    <td class="text-center"><input type="checkbox" name="hadir" value="Hadir"></td>
                                    <td class="text-center"><input type="checkbox" name="hadir" value="Ijin"></td>
                                    <td class="text-center"><input type="checkbox" name="hadir" value="Alpa"></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm">Absen</button>
                                    </td>
                            </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>