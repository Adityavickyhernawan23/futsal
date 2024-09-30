<!-- INI HANYA TEMPLATE -->
<h1 style="font-weight: bold;font-size: 15pt;text-align: center;">SISTEM PENGGAJIAN</h1>
<h1 style="font-weight: bold;font-size: 15pt;text-align: center;">PT. PROCOM PERSADA INDONESIA</h1>
<h1 style="font-weight: bold;font-size: 15pt;text-align: center;">LAPORAN DATA KARYAWAN</h1>
<hr>
<table style="border-collapse: collapse;width: 100%; margin-bottom: 10px;">
    <thead>
        <tr>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">NO</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">NIP</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Nama</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Tanggal Lahir</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">NIK</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Tanggal Masuk</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">JK</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Bagian</th>
            <th style="padding: 8px 8px;border: 1px solid #000000;text-align: center; background:gold">Jabatan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($dataku as $well) : ?>
            <tr>
                <th style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $no++ ?></th>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $well->id_karyawan ?></td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $well->nama_karyawan ?></td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo date('d-m-Y', strtotime($well->tanggal_lahir)) ?></td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $well->nik ?></td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo date('d-m-Y', strtotime($well->tanggal_masuk)) ?></td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo substr($well->jenis_kelamin, 0, 1) ?></td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $well->divisi ?></td>
                <td style="padding: 3px 3px;border: 1px solid #000000;text-align: center;"><?php echo $well->nama_jabatan ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<p>Tgl Cetak : <?php echo date('d-m-Y') ?></p>
<p>Admin : <?php echo $admin ?></p>