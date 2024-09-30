<!-- INI HANYA TEMPLATE -->
<h1 style="font-weight: bold;font-size: 15pt;text-align: center;">SISTEM PENGGAJIAN</h1>
<h1 style="font-weight: bold;font-size: 15pt;text-align: center;">PT PROCOM PERSADA INDONESIA</h1>
<h1 style="font-weight: bold;font-size: 15pt;text-align: center;">LAPORAN DATA ABSENSI</h1>
<hr>
<table style="border-collapse: collapse;width: 100%; margin-bottom: 10px;">
    <thead>
        <tr>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">No</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Tanggal</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Nama</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Hari</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Shift</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        $hari = array(
            'Monday'  => 'Senin',
            'Tuesday'  => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu'
        );
        foreach ($naon as $dt) : ?>
            <tr>
                <th style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $no++ ?></th>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo date('d-m-Y', strtotime($dt->tgl_kerja)); ?></td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $dt->nama_karyawan; ?></td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;">
                    <?php
                    $tgl = $dt->tgl_kerja;
                    $day = date('l', strtotime($tgl));
                    echo $hari[$day];
                    ?>
                </td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $dt->nama_shift; ?></td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $dt->status; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<p>Tgl Cetak : <?php echo date('d-m-Y') ?></p>
<p>Admin : <?php echo $admin ?></p>