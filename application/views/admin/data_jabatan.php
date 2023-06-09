<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <a class="btn btn-sm btn-success mb-3 " href="<?php echo base_url('admin/DataJabatan/tambah_data') ?>"><i class="fas fa-plus"> Tambah Data </i></a>
    <?php echo $this->session->flashdata('pesan'); ?>

    <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Jabatan</th>
            <th class="text-center">Gaji</th>
            <th class="text-center">Tj. Transport</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
        </tr>
        <?php $no = 1;
        foreach ($jabatan as $j) :    ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $j->nama_jabatan ?></td>
                <td class="text-center">Rp. <?php echo number_format($j->gaji_pokok, 0, ',', '.') ?></td>
                <td class="text-center">Rp. <?php echo number_format($j->tj_transport, 0, ',', '.') ?></td>
                <td class="text-center">Rp. <?php echo number_format($j->uang_makan, 0, ',', '.') ?></td>
                <td class="text-center">Rp. <?php echo number_format($j->gaji_pokok + $j->tj_transport + $j->uang_makan) ?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/DataJabatan/update_data/' . $j->id_jabatan) ?>"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/DataJabatan/deleteData/' . $j->id_jabatan) ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

    <!-- Content Row -->




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->