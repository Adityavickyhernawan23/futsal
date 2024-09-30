<!-- INI HANYA TEMPLATE -->
<!-- <html>

<head>
    <title> Judul </title>
</head>

<body> -->
<!-- <p><img src="assets/img/ppi.png; si""></p> -->
<h1 style=" padding: 3px 3px;border: 1px solid #000000;font-weight: bold;font-size: 15pt;text-align: center;">PT PROCOM PERSADA INDONESIA<br>SLIP GAJI BULAN <?php echo $tgl . date('Y') ?></h1>
<table style="width: 100%; padding:3px; border: 1px solid #000000; border-top:0px;font-weight: bold; text-transform: capitalize;">
    <tr>
        <!-- <td style="width: 350px">Perusahaan : PT. PROCOM PERSADA INDONESIA</td> -->
        <td>Data Pekerja<br>NIP : <?php echo $karyawan['id_karyawan'] ?></td>
    </tr>
    <tr>
        <!-- <td>Periode : <?php echo $tgl . date('Y') ?></td> -->
        <td>Nama Karyawan : <?php echo $karyawan['nama_karyawan'] ?></td>
    </tr>
    <tr>
        <!-- <td>Divisi : <?php echo $karyawan['divisi'] ?></td> -->
        <td>Jabatan : <?php echo $karyawan['nama_jabatan'] ?></td>
    </tr>
</table>
<table style="width: 100%; padding:3px; border: 1px solid #000000; border-top:0px;font-weight: bold;">
    <!-- <table border=1> -->
    <!-- <tr>
        <td></td>
    </tr> -->
    <tr>
        <td style="text-align: left;">Penerimaan</td>
        <!-- <td></td> -->
        <td style="text-align: left;">Potongan</td>
    </tr>
    <!-- <tr>
        <td style="width: 200px;">Penerimaan (+)</td>
    </tr> -->
    <tr>
        <td style="width: 350px;">Gaji Pokok :Rp<?php echo $gaji['gaji_pokok'] ?></td>
        <!-- <td style="text-align: right;">: </td> -->
        <td>Kasbon :Rp -</td>
    </tr>
    <tr>
        <td>Tunjangan Jabatan :Rp<?php echo $gaji['tunjangan_jabatan'] ?></td>
        <!-- <td style="text-align: right;">: </td> -->
        <td>Ketidakhadiran :Rp -</td>
    </tr>
    <tr>
        <td>Tunjangan Transport :Rp -</td>
        <!-- <td style="text-align: right;">: </td> -->
        <td>BPJS Kesehatan :Rp -</td>
    </tr>
    <?php foreach ($komponen as $kp) { ?>
        <tr>
            <td><?php echo $kp->nama_tunjangan ?> (<?php echo $kp->jenis ?>) :Rp<?php echo number_format($kp->nominal) ?></td>
            <!-- <td style="text-align: right;">:</td> -->
            <td>BPJS Ketenagakerjaan :Rp -</td>
        </tr>
    <?php } ?>
    <tr>
        <td>Lain - lain :Rp -</td>
        <!-- <td style="text-align: right;">: </td> -->
        <td>Lain - lain :Rp -</td>
    </tr>
    <tr>
        <td>---------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
    <tr>
        <td>Jumlah Penghasilan : Rp<?php echo $gaji['gaji_bersih'] ?></td>
        <td>Jumlah Potongan : Rp -</td>
    </tr>
    <tr>
        <td style="text-align: right;">Take Home Pay : Rp<?php echo $gaji['gaji_bersih'] ?></td>
    </tr>

    <tr>
        <td>---------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
    <tr>
        <td></td>
        <td style="text-align: center;">Tgl Cetak: <?php echo date('d-m-Y') ?></td>
    </tr>
    <tr>
        <td style="text-align: center;">Diterima oleh</td>
        <!-- <td></td> -->
        <td style="text-align: center;">Dibuat oleh</td>
    </tr>
    <tr>
        <td style="height: 10%"></td>
        <!-- <td></td> -->
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center;"><?php echo $karyawan['nama_karyawan'] ?></td>
        <!-- <td></td> -->
        <td style="text-align: center;"><?php echo $admin ?></td>
    </tr>
</table>
<!-- </body>

</html> -->