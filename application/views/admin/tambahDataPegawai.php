<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <!-- Content Row -->
    <div class="card mb-5" style="width: 60%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/DataPegawai/dataTambahAksi') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" id="nik" class="form-control" autofocus required oninvalid="this.setCustomValidity('nik harus diisi')" oninput="this.setCustomValidity('')">
                    <?php echo form_error('nik', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control" autofocus required oninvalid="this.setCustomValidity('nama pegawai harus diisi')" oninput="this.setCustomValidity('')">
                    <?php echo form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" autofocus required oninvalid="this.setCustomValidity('jenis kelamin harus diisi')" oninput="this.setCustomValidity('')">
                        <option>--Pilih Jenis Kelamin--</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control" autofocus required oninvalid="this.setCustomValidity('jabatan harus diisi')" oninput="this.setCustomValidity('')">
                        <option>--Pilih Jabatan--</option>
                        <?php foreach ($jabatan as $j) : ?>
                            <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" autofocus required oninvalid="this.setCustomValidity('tanggal masuk harus diisi')" oninput="this.setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" autofocus required oninvalid="this.setCustomValidity('status harus diisi')" oninput="this.setCustomValidity('')">
                        <option>--Pilih Status--</option>
                        <option value="Pegawai Tetap">Pegawai Tetap</option>
                        <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" required oninvalid="this.setCustomValidity('silahkan masukkan foto')" oninput="this.setCustomValidity('')">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->