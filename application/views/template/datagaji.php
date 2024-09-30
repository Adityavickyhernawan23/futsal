<div class="container-fluid">
    <h1 class="h3 mb-4 ml-1 text-gray-900">Data Gaji Karyawan</h1>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item my-auto"><a href="<?php echo base_url(); ?>dashboard" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active my-auto" aria-current="page">Data Gaji Karyawan</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Gaji Karyawan</h6>
        </div>
        <div class="card-body">
            <form action="<?php base_url() ?>" method="post">
                <div class="form-inline">
                    <input type="month" name="bulan" class="form-control rounded-left" style="border-radius: 0px;" required>
                    <button type="submit" class="btn btn-primary rounded-right mr-1" style="border-radius: 0px;"><span class="fas fa-search"></span></button>
                </div>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table table-row-border table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th>NO</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th>Tanggal Gajian</th>
                            <th class="text-center">Slip Gaji</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($gaji as $g) : ?>
                            <tr>
                                <th><?php echo $no++ ?></th>
                                <td><?php echo $g->id_karyawan ?></td>
                                <td><?php echo $g->nama_karyawan ?></td>
                                <td><?php echo $g->nama_jabatan ?></td>
                                <td><?php echo $g->divisi ?></td>
                                <td><?php echo date('d-m-Y', strtotime($g->tgl_gajian)) ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url(); ?>features/slipgaji/<?php echo $g->id_karyawan ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Print" target="_blank">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>