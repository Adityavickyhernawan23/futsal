<!-- INI HANYA TEMPLATE -->
<h1 style="font-weight: bold;font-size: 15pt;text-align: center;">SISTEM PENGGAJIAN</h1>
<h1 style="font-weight: bold;font-size: 15pt;text-align: center;">PT. PROCOM PERSADA INDONESIA</h1>
<h1 style="font-weight: bold;font-size: 15pt;text-align: center;">LAPORAN DATA PENGGAJIAN</h1>
<hr>
<table style="border-collapse: collapse;width: 100%; margin-bottom: 10px;">
    <thead>
        <tr>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">No</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Nip</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Nama</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Tgl Gajian</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Gaji Pokok</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Gaji Bersih</th>
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
        foreach ($gaji as $dt) : ?>
            <tr>
                <th style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $no++ ?></th>
                <th style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $dt->id_karyawan ?></th>
                <th style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $dt->nama_karyawan ?></th>
                <th style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $dt->tgl_gajian ?></th>
                <th style="padding: 3px 3px;border: 1px solid #000000;text-align: center;">Rp<?php echo number_format($dt->gaji_pokok) ?></th>
                <th style="padding: 3px 3px;border: 1px solid #000000;text-align: center;">Rp<?php echo $dt->gaji_bersih ?></th>

            <?php endforeach; ?>
    </tbody>
</table>
<p>Tgl Cetak : <?php echo date('d-m-Y') ?></p>
<p>Admin : <?php echo $admin ?></p>