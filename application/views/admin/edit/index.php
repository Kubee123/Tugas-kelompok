<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Siswa</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-5">Daftar Siswa Baru</h2>
                    <form method="post" enctype="multipart/form-data">
                        <hr>
                        <h4>Detail Siswa</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" class="form-control" value="<?= $siswa->name ?>">
                                    <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="asal_sekolah">Asal Sekolah</label>
                                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control " value="<?= $siswa->asal_sekolah ?>">
                                    <?php echo form_error('asal_sekolah', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="text" id="nisn" name="nisn" class="form-control " value="<?= $siswa->nisn ?>">
                                    <?php echo form_error('nisn', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" id="jurusan" name="jurusan" class="form-control " value="<?= $siswa->jurusan ?>">
                                    <?php echo form_error('jurusan', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" id="agama" class="form-control">
                                        <option value="">Select Agama</option>
                                        <option value="Islam" <?= $siswa->agama == "Islam" ? 'selected' : '' ?>>Islam</option>
                                        <option value="Hindu" <?= $siswa->agama == "Hindu" ? 'selected' : '' ?>>Hindu</option>
                                        <option value="Kristen" <?= $siswa->agama == "Kristen" ? 'selected' : '' ?>>Kristen</option>

                                    </select>
                                    <?php echo form_error('agama', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="">Select Jenis Kelamin</option>
                                        <option value="1" <?= $siswa->jenis_kelamin == 1 ? 'selected' : '' ?>>Pria</option>
                                        <option value="0" <?= $siswa->jenis_kelamin == 0 ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                    <?php echo form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>

                                    <!-- <input type="text" id="name" class="form-control "> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control " value="<?= $siswa->email ?>">
                                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control " value="<?= explode(' ', $siswa->tanggal_lahir)[0]  ?>">
                                    <?php echo form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>



                        </div>
                        <hr>
                        <h4>Detail Orang Tua</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_ortu">Nama Orang Tua</label>
                                    <input type="text" id="nama_ortu" name="nama_ortu" class="form-control " value="<?= $siswa->nama_ortu ?>">
                                    <?php echo form_error('nama_ortu', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telp_ortu">Nomor Telephone Orang Tua</label>
                                    <input type="text" id="no_telp_ortu" name="no_telp_ortu" class="form-control " value="<?= $siswa->no_telp_ortu ?>">
                                    <?php echo form_error('no_telp_ortu', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pekerjaan_ortu">Pekerjaan Orang Tua</label>
                                    <input type="text" id="pekerjaan_ortu" name="pekerjaan_ortu" class="form-control " value="<?= $siswa->pekerjaan_ortu ?>">
                                    <?php echo form_error('pekerjaan_ortu', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4>Dokument</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="foto_diri">Foto Diri</label><br>
                                    <a href="<?= base_url('uploads/data/' . $siswa->foto_diri) ?>" class="spotlight">
                                        <img src="<?= base_url('uploads/data/' . $siswa->foto_diri) ?>" alt="" width="200">
                                    </a>
                                    <!-- <input type="file" id="foto_diri" name="foto_diri" class="form-control " value="<?= set_value('foto_diri') ?>"> -->
                                    <?php echo form_error('foto_diri', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ijasah">Ijasah</label><br>
                                    <a href="<?= base_url('uploads/data/' . $siswa->ijasah) ?>" class="spotlight">
                                        <img src="<?= base_url('uploads/data/' . $siswa->ijasah) ?>" alt="" width="200">
                                    </a>

                                    <!-- <input type="file" id="ijasah" name="ijasah" class="form-control " value="<?= set_value('ijasah') ?>"> -->
                                    <?php echo form_error('ijasah', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="skhun">SKHUN</label><br>
                                    <a href="<?= base_url('uploads/data/' . $siswa->skhun) ?>" class="spotlight">
                                        <img src="<?= base_url('uploads/data/' . $siswa->skhun) ?>" alt="" width="200">
                                    </a>
                                    <!-- <input type="file" id="skhun" name="skhun" class="form-control " value="<?= set_value('skhun') ?>"> -->
                                    <?php echo form_error('skhun', '<small class="text-danger">', '</small>'); ?>

                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('/admin/list/calon_siswa') ?>" class="btn btn-dark">Back</a>
                            <button class="btn btn-primary">Save</button>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-6 form-group">
                                <button class="btn btn-primary">Daftar</button>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>