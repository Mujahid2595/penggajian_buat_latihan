<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <!-- Content Row -->
    <div class="card" style="width: 60%">
        <div class="card-body">

            <?php foreach ($jabatan as $j) : ?>

                <form method="POST" action="<?php echo base_url('admin/DataJabatan/update_data_aksi') ?>">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="hidden" name="id_jabatan" class="form-control" value="<?php echo $j->id_jabatan ?>">
                        <input type="text" name="nama_jabatan" value="<?php echo $j->nama_jabatan ?>" class="form-control" autofocus required oninvalid="this.setCustomValidity('nama jabatan harus diisi')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Gaji Pokok</label>
                        <input type="number" name="gaji_pokok" value="<?php echo $j->gaji_pokok ?>" class="form-control" required oninvalid="this.setCustomValidity('gaji pokok harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Tunjangan Transport</label>
                        <input type="number" name="tj_transport" value="<?php echo $j->tj_transport ?>" class="form-control" required oninvalid="this.setCustomValidity('tunjangan transport harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Uang Makan</label>
                        <input type="number" name="uang_makan" value="<?php echo $j->uang_makan ?>" class="form-control" required oninvalid="this.setCustomValidity('uang makan harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </form>

            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->