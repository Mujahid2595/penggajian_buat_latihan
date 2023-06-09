<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <a class="btn btn-sm btn-success mb-3 " href="<?php echo base_url('admin/DataPegawai/dataTambah') ?>"><i class="fas fa-plus"> Tambah Data </i></a>

    <?php echo $this->session->flashdata('pesan'); ?>

    <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center">Photo</th>
            <th class="text-center">Action</th>
        </tr>
        <?php $no = 1;
        foreach ($pegawai as $p) :    ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $p->nik ?></td>
                <td class="text-center"><?php echo $p->nama_pegawai ?></td>
                <td class="text-center"><?php echo $p->jenis_kelamin ?></td>
                <td class="text-center"><?php echo $p->jabatan ?></td>
                <td class="text-center"><?php echo $p->tanggal_masuk ?></td>
                <td class="text-center"><?php echo $p->status ?></td>
                <td><img src="<?php echo base_url() . 'assets/photo/' . $p->photo ?>" width="50px"></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/DataPegawai/updateDataPegawai/' . $p->id_pegawai) ?>"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/DataPegawai/deleteData/' . $p->id_pegawai) ?>"><i class="fas fa-trash"></i></a>
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