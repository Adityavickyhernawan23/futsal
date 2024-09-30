<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Data Absensi</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Data Absensi</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-row-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Hari</th>
                            <th>Nama Jam Kerja</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($naon as $dt) {
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
                                <th><?php echo $no++ ?></th>
                                <td><?php echo $dt->nama_karyawan; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($dt->tgl_kerja)); ?></td>
                                <td>
                                    <?php
                                    $tgl = $dt->tgl_kerja;
                                    $day = date('l', strtotime($tgl));
                                    echo $hari[$day];
                                    ?>
                                </td>
                                <td><?php echo $dt->nama_shift; ?></td>
                                <td><?php echo $dt->status; ?></td>
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